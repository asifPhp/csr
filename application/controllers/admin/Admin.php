<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * admin login Page for this controller.
	 */
	public function index()	{
		$this->load->view('admin/components/header');
		$this->load->view('admin/pages/admin_login');
		$this->load->view('admin/components/footer');
	}
	
	/**
	 * Index Page for this controller.
	 */
	public function index1()	{
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu');
		$this->load->view('admin/pages/welcome_message');
		$this->load->view('admin/components/footer');
	}
	
	/**
	 * admin login check for this controller.
	 */
	public function check_login_credentials() {
        //array to store ajax responses
        $arr_response = array('status' => 500); /* 500 */
		
		$db_result = $this->db->get_where('web_admin_login', array('is_deleted' => 0,'user_email'=>$_POST['loginUserEmail'],'passwd'=> sha1('admin' . (md5('admin' . $_POST['loginPassword'])))));
        if ($db_result && $db_result->num_rows() == 1) {
            
			$row = $db_result->row();
			
            $this->session->set_userdata(array(
                'userID' => $row->user_id,
                'userEmail' => $row->user_email,
                'profile_picture' => $row->profile_picture,
                'user_name' => $row->user_name,
                'loggedIN' => 2,
                'role' => 'admin',
           ));
		}	
		if ($db_result->num_rows() == 1) {
			$arr_response['status'] = 200; /* 200 */
			$arr_response['message'] = 'Admin Credentials has been matched successfully';
			$arr_response['redirect']= 'configure';				
		} else {
			$arr_response['status'] = 201; /* 201 */
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }
	
	/**
	 * admin Log out for this controller.
	 */
	public function logout() {
        $this->session->sess_destroy();
        $arr_response['status'] = 200;
        echo json_encode($arr_response);
    }
}
