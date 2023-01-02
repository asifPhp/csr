<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

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
	 * Index Page(plans) for this controller.
	 */
	public function index()	{
		$segment = 0;
		if(isset($_GET['id'])){
			$segment = $_GET['id'];
			$page='edit';
		}else{
			$segment =0;
			$page='add';
		}
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '3', 
			'submodule_id' => '6', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$org_id = $this->session->userdata('org_id');
		$data['staff_data'] =$this->obj_comman->get_by('org_staff_account',array('staff_id'=>$segment),false,true);
		$data['role_data'] = $this->obj_comman->get_by('organisation_roles',array('org_id'=>$org_id));
		$data['donor_data'] = $this->obj_comman->get_by('donor',array('org_id'=>$org_id));

		$this->load->view('organisation/components/header');
	
		$this->load->view('organisation/components/menu',$data);
	    if($return_val){
			$this->load->view('organisation/pages/staff/staff_add',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	public function edit_staff()	{
		$segment = 0;
		if(isset($_GET['id'])){
			$segment = $_GET['id'];
			$page='edit';
		}else{
			$segment =0;
			$page='add';
		}
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '3', 
			'submodule_id' => '6', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$org_id = $this->session->userdata('org_id');
		$data['staff_data'] =$this->obj_comman->get_by('org_staff_account',array('staff_id'=>$segment),false,true);
		$data['role_data'] = $this->obj_comman->get_by('organisation_roles',array('org_id'=>$org_id));
		$data['donor_data'] = $this->obj_comman->get_by('donor',array('org_id'=>$org_id));

		$this->load->view('organisation/components/header');
	
		$this->load->view('organisation/components/menu',$data);
	    if($return_val){
			$this->load->view('organisation/pages/staff/view_staff',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	
	public function update_staff_password() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		
        #load required model
		$staff_id  =$_POST['id'];
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$array_data = array(
			'staff_password' => sha1('admin' . (md5('admin' . $_POST['password']))),
		);
		$return_val = $this->obj_comman->update_data('org_staff_account',$array_data,array('staff_id'=> $staff_id ));
      
		if ($return_val) {
			$arr_response['status'] = SUCCESS;
			$arr_response['message'] = 'Member Password has been updated successfully';
		} else {
			$arr_response['status'] = DB_ERROR;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    }
	/**
	 * admin Add plan for this controller.
	*/
	public function update_staff() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal

		$this->load->model('Comman_model','obj_comman', TRUE);
		
		$staff_id=$_POST['staff_id'];
		
		//var_dump($_POST);die;
		$org_id = $this->session->userdata('org_id');
		$parent_id = $this->session->userdata('staff_id');
		
		$data=$_POST['table_field'];
		$is_repeat='';
		$staff_data = $this->obj_comman->get_by('org_staff_account',array('staff_email'=> $data['staff_email']),false,true);

		if($staff_id == 0){
			if($staff_data){
				$is_repeat='1';
			}else{
				$randam_no = rand(1111,999999);
				$staff_password = sha1('admin' . (md5('admin' . $randam_no)));
			  	$data['staff_password'] = $staff_password;
				$data['org_id'] = $org_id;
			  	$data['parent_id'] = $parent_id;
			  	$data['staff_profile_image'] = 'default_profile.jpg';
				$data['created_date'] = date('Y-m-d');
				$data['created_time'] = date('H:i:s');

			  	
				$return_val = $this->obj_comman->insert_data('org_staff_account',$data);
				$last_staff_id= $this->db->insert_id();
				//var_dump($last_staff_id);
				$message = 'Successfully added';
				$this->set_access_by_role($data['staff_role_id'],$return_val);
				$arrayName = array(
					'org_name' => $this->session->userdata('org_name'),
					'password' => $randam_no,
					'name' => $data['first_name'].' '.$data['last_name'],
					'email' => $data['staff_email'],
				);
				$this->send_email_notification_mail($arrayName);
			}
		} else{
			$return_val = $this->obj_comman->update_data('org_staff_account',$data,array('staff_id' => $_POST['staff_id']));
			$last_staff_id = $_POST['staff_id'];
			$message = 'Successfully updated';	
			$this->set_access_by_role($data['staff_role_id'],$staff_id);	
	    }

		if ($is_repeat) {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Email already exist';
		}else if ($return_val) {
			$arr_response['last_staff_id'] = $last_staff_id;
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }

    public function set_access_by_role($role_id,$staff_id) {
    	$role_access_data = $this->obj_comman->get_by('organisation_roles_access',array('role_id'=>$role_id));
	    if($role_access_data){
	    	$return_val=$this->db->delete('organisation_staff_access',array('staff_id' =>$staff_id));
	    	foreach ($role_access_data as $key => $value) {
	    		$value['staff_id']=$staff_id;
	    		unset($value['index_id']);
	    		unset($value['role_id']);
	    		//var_dump($value);
	    		$value['date'] = date('Y-m-d');
				$value['time'] = date('H:i:s');
				$return_val = $this->obj_comman->insert_data('organisation_staff_access',$value);
	    	}
	    }
    }

    public function send_email_notification_mail($data) {
    	/* main message set pending*/
    	$message ='';
		$message .= 'Dear '.$data['name'].' <br><br>';
		$message .= '<p>You are registered as member of '.$data['org_name'].' organisation. <br>Hear are your login details : <br><br> Email Id :-'.$data['email'].' <br>Password :- '.$data['password'].' </p>';
		$message .= '<p>Please Click below to login</p>'; 
		$message .= '<a href="'.base_url().'organisation/login">Click Here</a>'; 

       	$this->load->model('Email_model', 'obj_email', TRUE);
        $array = array(
        	'subject' => 'Registration Email',
        	'msg' => $message,
        	'to' => $data['email'],//'sharma.ambika98765@gmail.com',
        	'to_name' => $data['name'],
        );
		
        //$this->obj_email->send_mail_in_ci($data);
        $this->obj_email->send_mail_in_sendinblue($array);

    }
    
	/**
	 * admin List of plans for this controller.
	*/
	public function staff_list(){          
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '3', 
			'submodule_id' => '6', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');	
		
		$sql="select * from org_staff_account where org_id = $org_id and `is_deleted`=0";

		$data['table_name'] = 'org_staff_account';
		$data['sql_query'] = $sql;
		$data['heading'] = 'List of Users';
	    $data['table_header_column'] = array('Name','Email','user Type','Join Date','Last Login');
	    $data['table_body_column'] = array('first_name','staff_email','staff_role','created_time','last_login');
	    $data['primary_column_name'] = 'staff_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/staff/edit_staff';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/staff/index';
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
		
		$sql1="select * from organisation_roles where org_id=$org_id and `is_deleted`=0";
		$data['sql_query1'] = $sql1;
		$data['table_name1'] = 'organisation_roles';
		$data['heading1'] = 'Role List';
	    $data['table_header_column1'] = array('Name');
	    $data['table_body_column1'] = array('role_name');
	    $data['primary_column_name1'] = 'role_id';
	    if($return_val['is_edit']){
	    	$data['edit_url1'] = base_url().'organisation/role/index';
		}
	    if($return_val['is_add']){
	    	$data['add_url1'] = base_url().'organisation/role/index';
		}
		if($return_val['is_remove']){
	    	$data['is_remove1'] = true;
		}
		$data['table_body_column_count1'] = sizeof($data['table_body_column1']);;
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
	
		if($return_val){
			$this->load->view('organisation/pages/staff/staff_list',$data);
		}                   
		else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}

	public function get_emp_accessibility_detail() {
		//array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);
		
        #load required model
		$staff_id  =$_POST['staff_id'];
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$data =$this->obj_comman->get_by('organisation_staff_access',array('staff_id'=>$staff_id));
		if ($data) {
			$arr_response['status'] = SUCCESS;
			$arr_response['data'] = $data;
			$arr_response['message'] = 'successfully';
		} else {
			$arr_response['status'] = DB_ERROR;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}

	/**
	 * admin accessibility update for this controller.
	*/
	public function update_accessibility() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		//var_dump($_POST);die;
		$this->load->model('Comman_model', 'obj_comman', TRUE);

		$org_id = $this->session->userdata('org_id');
		$where = array('staff_id' => $_POST['staff_id']);
		
		$data=$_POST['access_define'];

		if($data){
			$return_val=$this->db->delete('organisation_staff_access',$where);
			foreach ($data as $key => $value) {
				$value['org_id'] = $org_id;
				$value['date'] = date('Y-m-d');
				$value['time'] = date('H:i:s');
				$return_val = $this->obj_comman->insert_data('organisation_staff_access',$value);
			}
		}

		$message = 'Accessiblity has been updated successfully!';
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }
	
	/**
	 * admin List of plans for this controller.
	*/
	public function get_staff_list(){    
		$org_id = $this->session->userdata('org_id');      
		$sql="select * from org_staff_account where org_id = $org_id and `is_deleted`=0";
		$listdata = $this->db->query($sql)->result_array();
		
		$data_value = array();
		foreach ($listdata as $row) {
			$data = array(
				'id' => $row['staff_id'],
				'title' => $row['first_name'] .' '.$row['last_name']
			);
			array_push($data_value, $data);
		}
		$arr_response['status'] = 200;
		$arr_response['listdata'] = $data_value;			
		
        echo json_encode($arr_response);
	}
	public function get_task_type(){    
		$org_id = $this->session->userdata('org_id');      
		$sql="select * from org_task_list where org_id = $org_id ORDER BY task_position ASC";
		$listdata = $this->db->query($sql)->result_array();
		
		$data_value = array();
		foreach ($listdata as $row) {
			$data = array(
				'id' => $row['task_position'],
				'title' => $row['task_label'],
			);
			array_push($data_value, $data);
		}
		$arr_response['status'] = 200;
		$arr_response['listdata'] = $data_value;			
		
        echo json_encode($arr_response);
	}
	
	 


}
