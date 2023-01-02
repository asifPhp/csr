<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * admin login Page for this controller.
	 */
	public function index()	{
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$data['state_data'] = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		$data['district_data'] = $this->obj_comman->get_by('admin_district','', array('name' => 'asc'));

		$this->load->view('ngo/components/header');
		$this->load->view('ngo/pages/register_data',$data);
		$this->load->view('ngo/components/footer');
	}

	/**
	 * admin login check for this controller.
	 */
	public function register_submit() {
		//var_dump($_POST);die;
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model', 'obj_comman', TRUE);

		$password=$_POST['staff_password'];
		$super_ngo_data=$_POST['super_ngo'];
		//$data=$_POST['table_field'];
		$owner_data=$_POST['owner_field'];
		$staff_password = sha1('ngo' . (md5('ngo' . $password)));

		$result = $this->obj_comman->get_by('ngo_staff_account',array('staff_email'=> $owner_data['staff_email']));
		if($result){
			$arr_response['status'] = 201;
			$arr_response['message'] = 'This email is already registered.';
		}else{
			
			$super_ngo_data['created_time'] = date('Y-m-d H:i:s');

		  	$return_val = $this->obj_comman->insert_data('superngo',$super_ngo_data);
		  	$superngo_id=$return_val;

		  	/*$data['superngo_id'] = $superngo_id;
		  	$data['created_time'] = date('Y-m-d H:i:s');

		  	$return_val = $this->obj_comman->insert_data('ngo',$data); 
		  	$ngo_id=$return_val;*/

		  	$randam_no = rand(1111,99999999999);
			$verify_code = sha1('verify' . (md5('verify' . $randam_no)));

		  	$owner_data['verify_code'] = $verify_code;
		  	$owner_data['superngo_id'] = $superngo_id;
		  	//$owner_data['ngo_id'] = $ngo_id;
		  	$owner_data['staff_password'] = $staff_password;
		  	$owner_data['parent_id'] = 0;
		  	$owner_data['staff_status'] = 'Active';
		  	$owner_data['staff_profile_image'] = 'default_profile.jpg';
			$owner_data['created_time'] = date('Y-m-d H:i:s');
			$owner_data['password_creation_time'] = date('Y-m-d H:i:s');

			$return_val = $this->obj_comman->insert_data('ngo_staff_account',$owner_data); 
			$message = 'Successfully Registered! please login and proceed further';
			
			$this->set_access_data($return_val,$superngo_id);
            
			/* set login session data */
			$this->session->set_userdata(array(
                'superngo_id' => $superngo_id,
                'superngo_name' => $super_ngo_data['brand_name'],
                //'legal_name' => $data['legal_name'],
                'ngo_id' => 0,
                'parent_id' => 0,
                'ngo_staff_id' => $return_val,
                'staff_email' => $owner_data['staff_email'],
                'staff_profile_image' => 'default_profile.jpg',
                'first_name' => $owner_data['first_name'],
                'last_name' => $owner_data['last_name'],
                'staff_role' => 'Owner',
                'loggedIN' => 1,
                'role' => 'ngo',
            ));

			if ($return_val) {
				/*$arrayName = array(
					'verify_code' => $verify_code,
					'name' => $owner_data['first_name'].' '.$owner_data['last_name'],
					'email' => $owner_data['staff_email'],
				);*/
				//$this->send_email_verification_mail($arrayName);
				$arr_response['status'] = 200;
				$arr_response['message'] = $message;			
			} else {
				$arr_response['status'] = 201;
				$arr_response['message'] = 'Something went Wrong! Please try again';
			}
		}
			echo json_encode($arr_response);
		
    }

    public function send_email_verification_mail($data) {
    	/* main message set pending*/
    	$message ='';
		$message .= 'Dear '.$data['name'].' <br/><br/>';
		$message .= '<p>Please Click below to change your password</p>';
		$message .= '<a href="'.base_url().'ngo/reset_password?e='.$data['email'].'&v='.$data['verify_code'].'">Click Here</a>'; 

       	$this->load->model('Email_model', 'obj_email', TRUE);
        $array = array(
        	'subject' => 'Verify Email',
        	'msg' => $message,
        	'to' => 'sharma.ambika98765@gmail.com',//$data['email'],
        	'to_name' => $data['name'],
        );
		
        //$this->obj_email->send_mail_in_ci($data);
        $this->obj_email->send_mail_in_sendinblue($array);

    }

    public function set_access_data($staff_id,$superngo_id) {
    	$data = array();
    	$this->load->model('Comman_model', 'obj_comman', TRUE);
    	$arrayName = array('role_name' => 'Owner','superngo_id'=>$superngo_id);
    	$return_val = $this->obj_comman->insert_data('ngo_roles',$arrayName);
    	$role_id=$return_val;

    	$arrayName = array('staff_role' => 'Owner','staff_role_id'=>$role_id);
    	$return_val = $this->obj_comman->update_data('ngo_staff_account',$arrayName,array('ngo_staff_id' => $staff_id));

    	$access_data = $this->obj_comman->get_by('ngo_submodule',array('status' => 'active'));
	    if($access_data){
	    	foreach ($access_data as $key => $value) {
	    		
	    		$add_access='no';
	    		$edit_access='no';
	    		$list_access='no';
	    		$remove_access='no';
	    		$other_access_1='no';
	    		$other_access_2='no';
	    		$other_access_3='no';
	    		if($value['show_link']=='yes'){
	    			$add_access='yes';
	    		}
	    		if($value['show_edit']=='yes'){
	    			$edit_access='yes';
	    		}
	    		if($value['show_list']=='yes'){
	    			$list_access='yes';
	    		}
	    		if($value['show_remove']=='yes'){
	    			$remove_access='yes';
	    		}
	    		if($value['show_link1']=='yes'){
	    			$other_access_1='yes';
	    		}
	    		if($value['show_link2']=='yes'){
	    			$other_access_2='yes';
	    		}
	    		if($value['show_link3']=='yes'){
	    			$other_access_3='yes';
	    		}
				$data = array(
					'role_id' => $role_id, 
					'superngo_id' => $superngo_id, 
					'module_id' => $value['FK_module_id'], 
					'submodule_id' => $value['submodule_id'], 
					'add_access' => $add_access, 
					'edit_access' => $edit_access, 
					'list_access' => $list_access, 
					'remove_access' => $remove_access, 
					'other_access_1' => $other_access_1, 
					'other_access_2' => $other_access_2, 
					'other_access_3' => $other_access_3, 
					'date' => date('Y-m-d'), 
					'time' => date('H:m:s'), 
				);
				
				$return_val = $this->obj_comman->insert_data('ngo_roles_access',$data);
	    	}
	    }

	    $role_access_data = $this->obj_comman->get_by('ngo_roles_access', array('role_id' => $role_id));
	    if($role_access_data){
	    	$return_val = $this->db->delete('ngo_staff_access',array('staff_id' =>$staff_id));
	    	foreach ($role_access_data as $key => $value) {
	    		$value['staff_id']=$staff_id;
	    		unset($value['index_id']);
	    		unset($value['role_id']);
	    		//var_dump($value);
	    		$value['date'] = date('Y-m-d');
				$value['time'] = date('H:i:s');
				$return_val = $this->obj_comman->insert_data('ngo_staff_access',$value);
	    	}
	    }
	    //default role set
	    $arrayName = array('role_name' => 'Regular','superngo_id'=>$superngo_id);
    	$return_val = $this->obj_comman->insert_data('ngo_roles',$arrayName);
    	$role_id=$return_val;
    	$data = array(
			'role_id' => $role_id, 
			'superngo_id' => $superngo_id, 
			'module_id' => 3, 
			'submodule_id' => 3, 
			'add_access' => 'no', 
			'edit_access' => 'yes', 
			'list_access' => 'yes', 
			'remove_access' => 'no', 
			'other_access_1' => 'no', 
			'other_access_2' => 'no', 
			'other_access_3' => 'no', 
			'date' => date('Y-m-d'), 
			'time' => date('H:i:s'), 
		);
		
		$return_val = $this->obj_comman->insert_data('ngo_roles_access',$data);
    }
}
