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
        if (!($this->session->userdata('loggedIN') == 3)) {
            redirect(base_url().'organisation/login');
        }		
    }

	/**
	 * Index Page(Profile) for this controller.
	 */
	public function profile()	{
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
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
		$data['profile_data'] = $this->obj_comman->get_by('org_staff_account',array('staff_id'=> $this->session->userdata('staff_id')),false,true);
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu' ,$data);
		$this->load->view('organisation/pages/profile_view',$data);
		$this->load->view('organisation/components/footer');
	}
	public function profile_edit()	{
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
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
		$data['profile_data'] = $this->obj_comman->get_by('org_staff_account',array('staff_id'=> $this->session->userdata('staff_id')),false,true);
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu' ,$data);
		$this->load->view('organisation/pages/profile',$data);
		$this->load->view('organisation/components/footer');
	}

	public function update_profile_data() {
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$staff_id = $this->session->userdata('staff_id');
		$where = array('staff_id' => $staff_id);
		
		$return_val = $this->obj_comman->update_data('org_staff_account',$_POST['table_field'],$where); 
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
	 * Index Page(Organisation Profile) for this controller.
	 */
	public function org_profile()	{
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
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
		$data['profile_data'] = $this->obj_comman->get_by('organisation',array('org_id'=> $this->session->userdata('org_id')),false,true);
		
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$data['state_data'] = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		$data['district_data'] = $this->obj_comman->get_by('admin_district','', array('name' => 'asc'));
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu' ,$data);
		$this->load->view('organisation/pages/org_profile',$data);
		$this->load->view('organisation/components/footer');
	}
	
	public function update_ngo_profile_data() {
		$arr_response = array('status' => 500);

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$org_id = $this->session->userdata('org_id');
		$where = array('org_id' => $org_id);
		
		$return_val = $this->obj_comman->update_data('organisation',$_POST['table_field'],$where); 
		$arr_response['message'] = 'Successfully updated';
	 	
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
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '0', 
			'submodule_id' => '0', 
			'staff_id' => $staff_id, 
			'page' => '', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu' ,$data);
		$this->load->view('organisation/pages/change_password');
		$this->load->view('organisation/components/footer');
	}
	
	/**
	 * admin update password for this controller.
	 */
	public function update_password() {
        //array to store ajax responses
        $arr_response = array('status' => 500); /* 500 */
		$staff_email = $this->session->userdata('staff_email');
		$db_result = $this->db->get_where('org_staff_account', array('staff_email'=>$staff_email,'staff_password'=> sha1('admin' . (md5('admin' . $_POST['old_password'])))));
		if($db_result && $db_result->num_rows() == 1){
			$hashed_password = sha1('admin' . (md5('admin' . $_POST['new_password'])));
			$data = array(
				'staff_password' => $hashed_password,
				'last_password_change' => date('Y-m-d H:m:s'),
			);
			$result = $this->db->update('org_staff_account', $data, array('staff_email'=>$staff_email));
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
        //redirect(base_url().'organisation/login');
        $arr_response['status'] = 200;
        echo json_encode($arr_response);
    }
}
