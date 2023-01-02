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
        if (!($this->session->userdata('loggedIN') == 1)) {
            redirect(base_url().'ngo/login');
        }		
    }
	
	/**
	 * Index Page(chnage Password) for this controller.
	 */
	public function profile()	{
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '0', 
			'submodule_id' => '0', 
			'staff_id' => $staff_id, 
			'page' => '', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['profile_data'] = $this->obj_comman->get_by('ngo_staff_account',array('ngo_staff_id'=> $this->session->userdata('ngo_staff_id')),false,true);
			
		$ngo_id=$data['profile_data']['ngo_id'];
		$staff_role_id=$data['profile_data']['staff_role_id'];
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('id'=>$ngo_id));
		$data['role_data'] = $this->obj_comman->get_by('ngo_roles',array('role_id'=>$staff_role_id));
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu' ,$data);
		$this->load->view('ngo/pages/profile_view',$data);
		$this->load->view('ngo/components/footer');
	}
	public function profile_edit()	{
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '0', 
			'submodule_id' => '0', 
			'staff_id' => $staff_id, 
			'page' => '', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['profile_data'] = $this->obj_comman->get_by('ngo_staff_account',array('ngo_staff_id'=> $this->session->userdata('ngo_staff_id')),false,true);
		
		
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu' ,$data);
		$this->load->view('ngo/pages/profile',$data);
		$this->load->view('ngo/components/footer');
	}
	

	public function update_profile_data() {
		$arr_response = array('status' => 500);

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$ngo_staff_id = $this->session->userdata('ngo_staff_id');
		$where = array('ngo_staff_id' => $ngo_staff_id);
		
		$return_val = $this->obj_comman->update_data('ngo_staff_account',$_POST['table_field'],$where); 
		$arr_response['message'] = 'Successfully updated';

	    $this->session->set_userdata('staff_profile_image',$_POST['table_field']['staff_profile_image']);
	    $this->session->set_userdata('first_name',$_POST['table_field']['first_name']);
	    $this->session->set_userdata('last_name',$_POST['table_field']['last_name']);
	 	
		if ($return_val) {
			$arr_response['status'] = 200;
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}

	/**
	 * Index Page(chnage Password) for this controller.
	 */
	public function change_password()	{
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '0', 
			'submodule_id' => '0', 
			'staff_id' => $staff_id, 
			'page' => '', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu' ,$data);
		$this->load->view('ngo/pages/change_password');
		$this->load->view('ngo/components/footer');
	}
	
	/**
	 * admin update password for this controller.
	 */
	public function update_password() {
        //array to store ajax responses
        $arr_response = array('status' => 500); /* 500 */
		$staff_email = $this->session->userdata('staff_email');
		$db_result = $this->db->get_where('ngo_staff_account', array('staff_email'=>$staff_email,'staff_password'=> sha1('ngo' . (md5('ngo' . $_POST['old_password'])))));
		if($db_result && $db_result->num_rows() == 1){
			$hashed_password = sha1('ngo' . (md5('ngo' . $_POST['new_password'])));
			$data = array(
				'staff_password' => $hashed_password,
				'password_creation_time' => date('Y-m-d H:m:s'),
			);
			$result = $this->db->update('ngo_staff_account', $data, array('staff_email'=>$staff_email));
			$arr_response['status'] = 200; /* 200 */
			$arr_response['message'] = 'Password Updated successfully';
		} else {
			$arr_response['status'] = 201; /* 201 */
			$arr_response['message'] = 'Old Password does not match ';
		}
        echo json_encode($arr_response);
    }

    public function logout() {
        $this->session->sess_destroy();
        //redirect(base_url().'ngo/login');
        $arr_response['status'] = 200;
        echo json_encode($arr_response);
    }
}
