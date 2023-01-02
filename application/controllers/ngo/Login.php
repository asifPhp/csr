<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * admin login Page for this controller.
	 */
	public function index()	{
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/pages/login');
		$this->load->view('ngo/components/footer');
	}
	
	/**
	 * admin login check for this controller.
	 */
	public function check_email_availability() {
		//array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$result = $this->obj_comman->get_by('ngo_staff_account',array('staff_email'=> $_POST['loginUserEmail']));
        if ($result) {
            echo 'true';
        } else {
            echo 'false';
        }
	}

	/**
	 * admin login check for this controller.
	 */
	public function check_login_credentials() {
        //array to store ajax responses
        $arr_response = array('status' => 500); /* 500 */
		

		$db_result = $this->db->get_where('ngo_staff_account', array('staff_email'=>$_POST['loginUserEmail'],'staff_password'=> sha1('ngo' . (md5('ngo' . $_POST['loginPassword']))),'is_deleted'=>0));
        if ($db_result && $db_result->num_rows() == 1) {
            
			$row = $db_result->row();
			$ngo_data = $this->db->get_where('superngo', array('id'=>$row->superngo_id,'is_deleted'=>0))->row();
			if($ngo_data){
					if($row->staff_status=='Active'){
						if($row->first_login){
							$arrayName = array(
								'last_login' => date('Y-m-d H:i:s'),
							);
							$result = $this->db->update('ngo_staff_account', $arrayName, array('ngo_staff_id' => $row->ngo_staff_id));
						}else{
							$arrayName = array(
								'first_login' => date('Y-m-d H:i:s'),
								'last_login' => date('Y-m-d H:i:s'),
							);
							$result = $this->db->update('ngo_staff_account', $arrayName, array('ngo_staff_id' => $row->ngo_staff_id));
						}
			            $this->session->set_userdata(array(
			                'superngo_id' => $row->superngo_id,
			                'superngo_name' => $ngo_data->brand_name,
			                'ngo_id' => $row->ngo_id,
			                'parent_id' => $row->parent_id,
			                'ngo_staff_id' => $row->ngo_staff_id,
			                'staff_email' => $row->staff_email,
			                'staff_profile_image' => $row->staff_profile_image,
			                'first_name' => $row->first_name,
			                'last_name' => $row->last_name,
			                'staff_role' => $row->staff_role,
			                //'login_tour' => $row->login_tour,
			                'loggedIN' => 1,
			                'role' => 'ngo',
			            ));
			            $arr_response['status'] = 200; /* 200 */
						$arr_response['message'] = 'NGO Credentials has been matched successfully';
						$arr_response['redirect']= 'configure';	
						$arr_response['last_password_change']= $row->password_creation_time;	
			        }else{
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
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/pages/change_password');
		$this->load->view('ngo/components/footer');
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
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/pages/forgot');
		$this->load->view('ngo/components/footer');
	}

    public function forgot_password_submit() {
    	$staff_email = $_POST['loginUserEmail'];
    	$db_result = $this->db->get_where('ngo_staff_account', array('staff_email'=>$staff_email,'is_deleted'=>0));
    	if ($db_result && $db_result->num_rows() == 1) {
    		$row = $db_result->row();
			$randam_no = rand(1111,99999999999);
			$verify_code = sha1('verify' . (md5('verify' . $randam_no)));
			$Array = array(
				'verify_code' => $verify_code,
			);
			$result = $this->db->update('ngo_staff_account', $Array, array('staff_email' => $staff_email));
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
		$message .= '<a href="'.base_url().'ngo/reset_password?e='.$data['email'].'&v='.$data['verify_code'].'">Click Here</a>'; 

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
	 * admin reset password Page for this controller.
	 */
	public function reset_password()	{
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/pages/reset_password');
		$this->load->view('ngo/components/footer');
	}

	public function reset_password_submit() {
		$arr_response = array('status' => 500); /* 500 */

		$staff_email = $_POST['email_data'];
		$verify_code = $_POST['verify_code'];
		$db_result = $this->db->get_where('ngo_staff_account', array('staff_email'=>$staff_email,'verify_code'=> $verify_code));
		if($db_result && $db_result->num_rows() == 1){
			$hashed_password = sha1('ngo' . (md5('ngo' . $_POST['staff_password'])));
			$data = array(
				'staff_password' => $hashed_password,
				'password_creation_time' => date('Y-m-d H:i:s'),
			);
			$result = $this->db->update('ngo_staff_account', $data, array('staff_email'=>$staff_email));
			$arr_response['status'] = 200; /* 200 */
			$arr_response['message'] = 'Password Changed successfully! now you may login with the new Password';
		} else {
			$arr_response['status'] = 201; /* 201 */
			$arr_response['message'] = 'Verification token might be expire. Try again';
		}
        echo json_encode($arr_response);
    }
}
