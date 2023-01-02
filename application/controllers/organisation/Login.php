<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * admin login Page for this controller.
	 */
	public function index()	{
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/pages/login');
		$this->load->view('organisation/components/footer');
	}
	
	/**
	 * admin login check for this controller.
	 */
	public function check_login_credentials() {
        //array to store ajax responses
        $arr_response = array('status' => 500); /* 500 */
		
		$db_result = $this->db->get_where('org_staff_account', array('staff_email'=>$_POST['loginUserEmail'],'staff_password'=> sha1('admin' . (md5('admin' . $_POST['loginPassword']))),'is_deleted'=>0));
        if ($db_result && $db_result->num_rows() == 1) {
            
			$row = $db_result->row();
			$org_data = $this->db->get_where('organisation', array('org_id'=>$row->org_id,'is_deleted'=>0))->row();
			if($org_data){
				if($org_data->org_status=='Active'){
					if($row->staff_status=='Active'){

						if($row->first_login){
							$arrayName = array(
								'last_login' => date('Y-m-d H:i:s'),
							);
							$result = $this->db->update('org_staff_account', $arrayName, array('staff_id' => $row->staff_id));
						}else{
							$arrayName = array(
								'first_login' => date('Y-m-d H:i:s'),
								'last_login' => date('Y-m-d H:i:s'),
							);
							$result = $this->db->update('org_staff_account', $arrayName, array('staff_id' => $row->staff_id));
						}
			            $this->session->set_userdata(array(
			                'org_id' => $row->org_id,
			                'parent_id' => $row->parent_id,
			                'staff_id' => $row->staff_id,
			                'staff_email' => $row->staff_email,
			                'staff_profile_image' => $row->staff_profile_image,
			                'first_name' => $row->first_name,
			                'last_name' => $row->last_name,
			                'staff_role' => $row->staff_role,
			                'org_name' => $org_data->org_name,
			                'loggedIN' => 3,
			                'role' => 'organisation',
			            ));

			            $arr_response['status'] = 200; /* 200 */
						$arr_response['message'] = 'Organisation Credentials has been matched successfully';
						$arr_response['redirect']= 'configure';	
						$arr_response['last_password_change']= $row->last_password_change;	
					}else{
			        	$arr_response['status'] = 201; /* 201 */
						$arr_response['message'] = 'Please contact administrator for login permission';
			        }
			    }else {
			    	$arr_response['status'] = 201; /* 201 */
					$arr_response['message'] = 'Please contact administrator for login permission';
			    }
		    }else{
		    	$arr_response['status'] = 201; /* 201 */
				$arr_response['message'] = 'Your company account is deleted';
		    }
		}else {
			$arr_response['status'] = 201; /* 201 */
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }

	public function change_password()	{
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/pages/change_password');
		$this->load->view('organisation/components/footer');
	}

	/**
	 * admin Log out for this controller.
	 */
	public function logout() {
        $this->session->sess_destroy();
        $arr_response['status'] = 200;
        echo json_encode($arr_response);
    }
    /**
	 * admin forgot password Page for this controller.
	 */
	public function forgot()	{
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/pages/forgot');
		$this->load->view('organisation/components/footer');
	}

    public function forgot_password_submit() {
    	$staff_email = $_POST['loginUserEmail'];
    	$db_result = $this->db->get_where('org_staff_account', array('staff_email'=>$staff_email,'is_deleted'=>0));
    	if ($db_result && $db_result->num_rows() == 1) {
    		$row = $db_result->row();
			$randam_no = rand(1111,99999999999);
			$verify_code = sha1('verify' . (md5('verify' . $randam_no)));
			$Array = array(
				'verify_code' => $verify_code,
			);
			$result = $this->db->update('org_staff_account', $Array, array('staff_email' => $staff_email));
			if($result){
				$arrayName = array(
					'verify_code' => $verify_code,
					'name' => $row->first_name.' '.$row->last_name,
					'email' => $staff_email,
				);
				$this->send_forgot_password_mail($arrayName);

				$arr_response['status'] = 200; /* 201 */
				$arr_response['message'] = 'We have sent an email with a password reset link to the entered address.';
			}else{
				$arr_response['status'] = 201; /* 201 */
				$arr_response['message'] = 'Something went Wrong! Please try again';
			}
		}else {
			$arr_response['status'] = 201; /* 201 */
			$arr_response['message'] = 'Either your account is deleted or email is not registered';
			//$arr_response['message'] = 'Something went Wrong! Please try again';
		}
		echo json_encode($arr_response);
    }
    public function send_forgot_password_mail($data) {

    	$message ='';
		$message .= 'Dear '.$data['name'].' <br/><br/>';
		$message .= '<p>Please Click below to change your password</p>';
		$message .= '<a href="'.base_url().'organisation/reset_password?e='.$data['email'].'&v='.$data['verify_code'].'">Click Here</a>'; 

       	$this->load->model('Email_model', 'obj_email', TRUE);
        $array = array(
        	'subject' => 'Forget Password',
        	'msg' => $message,
        	'to' => $data['email'],
        	'to_name' => $data['name'],
        );
		
        //$this->obj_email->send_mail_in_ci($data);
        $this->obj_email->send_mail_in_sendinblue($array);

    }

	/**
	 * admin login check for this controller.
	 */
	public function check_email_availability() {
		//array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$result = $this->obj_comman->get_by('org_staff_account',array('staff_email'=> $_POST['loginUserEmail']));
        if ($result) {
            echo 'true';
        } else {
            echo 'false';
        }
	}
    /**
	 * admin reset password Page for this controller.
	 */
	public function reset_password()	{
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/pages/reset_password');
		$this->load->view('organisation/components/footer');
	}

	public function reset_password_submit() {
		$arr_response = array('status' => 500); /* 500 */

		$staff_email = $_POST['email_data'];
		$verify_code = $_POST['verify_code'];
		$db_result = $this->db->get_where('org_staff_account', array('staff_email'=>$staff_email,'verify_code'=> $verify_code));
		if($db_result && $db_result->num_rows() == 1){
			$hashed_password = sha1('admin' . (md5('admin' . $_POST['staff_password'])));
			$data = array(
				'staff_password' => $hashed_password,
				'last_password_change' => date('Y-m-d H:i:s'),
			);
			$result = $this->db->update('org_staff_account', $data, array('staff_email'=>$staff_email));
			$arr_response['status'] = 200; /* 200 */
			$arr_response['message'] = 'Password Changed successfully! now you may login with the new Password';
		} else {
			$arr_response['status'] = 201; /* 201 */
			$arr_response['message'] = 'Verification token might be expire. Try again';
		}
        echo json_encode($arr_response);
    }
}
