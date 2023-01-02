<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

	/**
     * Default constructor.
     * 
     * @access	public
     * @since	1.0.0
     */
    function __construct() {
        parent::__construct();
        if (!($this->session->userdata('loggedIN') == 2)) {
            redirect(base_url().'admin/admin');
        }		
    }
	
	/**
	 * Index Page(chnage Password) for this controller.
	 */
	public function change_password()	{
		$this->load->model('Page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '0', 
			'submodule_id' => '0', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu' ,$data);
		$this->load->view('admin/pages/change_password');
		$this->load->view('admin/components/footer');
	}
	
	/**
	 * admin update password for this controller.
	 */
	public function update_password() {
        //array to store ajax responses
        $arr_response = array('status' => 500); /* 500 */
		$user_email = $this->session->userdata('userEmail');
		$db_result = $this->db->get_where('web_admin_login', array('user_email'=>$user_email,'passwd'=> sha1('admin' . (md5('admin' . $_POST['old_password'])))));
		if($db_result && $db_result->num_rows() == 1){
			$hashed_password = sha1('admin' . (md5('admin' . $_POST['new_password'])));
			$data = array(
				'passwd' => $hashed_password,
			);
			$result = $this->db->update('web_admin_login', $data, array('user_email'=>$user_email));
			$arr_response['status'] = 200; /* 200 */
			$arr_response['message'] = 'Password Updated successfully';
		} else {
			$arr_response['status'] = 201; /* 201 */
			$arr_response['message'] = 'Old Password does not match ';
		}
        echo json_encode($arr_response);
    }
}
