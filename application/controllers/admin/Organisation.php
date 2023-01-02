<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisation extends CI_Controller {

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
		$this->load->model('page_validation_model', 'obj_pvm', TRUE);

		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '2', 
			'submodule_id' => '2', 
			'user_id' => $user_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$sql="select org.*,st.staff_id,st.first_name,st.last_name,st.staff_email from organisation org JOIN org_staff_account as st on st.org_id=org.org_id where st.parent_id=0 AND org.org_id=$segment And org.is_deleted=0";
		$data['org_data'] = $this->obj_comman->get_query($sql);

		$data['category_data'] = $this->obj_comman->get('admin_category');
		$data['state_data'] = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		$data['district_data'] = $this->obj_comman->get_by('admin_district','', array('name' => 'asc'));
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
	    //if($return_val){
			$this->load->view('admin/pages/organisation/organisation_add',$data);
		//}else{
			//$this->load->view('error_msg');
		
		$this->load->view('admin/components/footer');
	}
	
	public function update_organisation_password() {
        //array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);
		
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
	
	public function update_organisation_add_task() {
        //array to store ajax responses
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$array_data = array(
			'task_type' => $_POST['task_type'],
			'task_position' => $_POST['task_position'],
			'task_label' => $_POST['task_label'],
			'view_file_name' => $_POST['view_file_name'],
			'is_cycle_start' => $_POST['is_cycle_start'],
			'org_id' => $_POST['org_id'],
		);
		
		if($_POST['is_add_edit'] == 'edit'){
			$return_val = $this->obj_comman->update_data('org_task_list',$array_data,array('task_id'=> $_POST['task_id'] ));
		}else{
			$return_val = $this->obj_comman->insert_data('org_task_list',$array_data); 
		}
		
		if ($return_val) {
			$arr_response['status'] = SUCCESS;
			$arr_response['message'] = 'Task Updated successfully';
		} else {
			$arr_response['status'] = DB_ERROR;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    }
	/**
	 * admin Add plan for this controller.
	*/
	public function update_organisation() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$user_id = $this->session->userdata('userID');
		$where = array('org_id' => $_POST['org_id']);
		$data=$_POST['table_field'];
		$owner_data=$_POST['owner_field'];

		$is_repeat='';
		$staff_data = $this->obj_comman->get_by('org_staff_account',array('staff_email'=> $owner_data['staff_email'],'is_deleted'=> '0'));
		if($_POST['org_id'] == 0){
			if($staff_data){
				$is_repeat='1';
			}else{
				$data['added_by'] = $user_id;
				$data['created_date'] = date('Y-m-d');
				$data['created_time'] = date('H:i:s');

			  	$return_val = $this->obj_comman->insert_data('organisation',$data); 
			  	$org_id=$return_val;
			  	$randam_no = rand(1111,999999);
				$staff_password = sha1('admin' . (md5('admin' . $randam_no)));
				$owner_data['staff_password'] = $staff_password;
			  	$owner_data['org_id'] = $org_id;
			  	$owner_data['parent_id'] = 0;
			  	$owner_data['staff_status'] = 'Active';
			  	$owner_data['staff_profile_image'] = 'default_profile.jpg';
				$owner_data['created_date'] = date('Y-m-d');
				$owner_data['created_time'] = date('H:i:s');

			  	$return_val = $this->obj_comman->insert_data('org_staff_account',$owner_data); 
				$message = 'Successfully added';
				$this->set_org_access_data($return_val,$org_id);
				$arrayName = array(
					'org_name' => $data['org_name'],
					'password' => $randam_no,
					'name' => $owner_data['first_name'].' '.$owner_data['last_name'],
					'email' => $owner_data['staff_email'],
				);
				$this->send_email_notification_mail($arrayName);
			}
		}else{
			$return_val = $this->obj_comman->update_data('organisation',$data,$where); 
			$return_val = $this->obj_comman->update_data('org_staff_account',$owner_data,array('staff_id' => $_POST['staff_id'])); 
			$message = 'Successfully updated';
	    }

		if ($is_repeat) {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Email already exist';
		}else if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }

    public function set_org_access_data($staff_id,$org_id) {
    	$data = array();
    	$this->load->model('Comman_model', 'obj_comman', TRUE);
    	$arrayName = array('role_name' => 'Owner','org_id'=>$org_id);
    	$return_val = $this->obj_comman->insert_data('organisation_roles',$arrayName);
    	$role_id=$return_val;

    	$arrayName = array('staff_role' => 'Owner','staff_role_id'=>$role_id);
    	$return_val = $this->obj_comman->update_data('org_staff_account',$arrayName,array('staff_id' => $staff_id));

    	$access_data = $this->obj_comman->get('organisation_submodule');
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
					'org_id' => $org_id, 
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
					'time' => date('H:i:s'), 
				);
				
				$return_val = $this->obj_comman->insert_data('organisation_roles_access',$data);
	    	}
	    }

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
		$message .= '<p>Your orginisation '.$data['org_name'].' are registered with us.</p><p>You are registered as owner of '.$data['org_name'].' organisation. <br>Hear are your login details : <br><br> Email Id :-'.$data['email'].' <br>Password :- '.$data['password'].' </p>';
		$message .= '<p>Please Click below to login</p>'; 
		$message .= '<a href="'.base_url().'organisation/login">Click Here</a>'; 

       	$this->load->model('Email_model', 'obj_email', TRUE);
        $array = array(
        	'subject' => 'Organisation Registration Email',
        	'msg' => $message,
        	'to' => $data['email'],// 'sharma.ambika98765@gmail.com',//
        	'to_name' => $data['name'],
        );
		
        //$this->obj_email->send_mail_in_ci($data);
        $this->obj_email->send_mail_in_sendinblue($array);

    }
    
	/**
	 * admin List of plans for this controller.
	*/
	public function organisation_list(){
		$this->load->model('page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '2', 
			'submodule_id' => '2', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$sql="select org.*,st.staff_id,st.first_name,st.last_name,st.staff_email from organisation org JOIN org_staff_account as st on st.org_id=org.org_id where st.parent_id=0 AND org.is_deleted=0";

		$data['table_name'] = 'organisation';
		$data['sql_query'] = $sql;
		$data['page_heading'] = 'Manage Organisation';
		$data['heading'] = 'Organisation List';
	    $data['table_header_column'] = array('Name','Owner First Name','Owner Email');
	    $data['table_body_column'] = array('org_name','first_name','staff_email');
	    $data['primary_column_name'] = 'org_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'admin/organisation/index';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'admin/organisation/index';
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		
		if($return_val){
			$this->load->view('admin/pages/organisation/organisation_list',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('admin/components/footer');
		
	}	
	public function organisation_task_list(){
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$this->load->model('page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '2', 
			'submodule_id' => '2', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
        $organisation_id=0;
		if(isset($_GET['id'])){
		$organisation_id=$_GET['id'];
		}else{
			$organisation_id=0;
		}
		$sql="SELECT * FROM `org_task_list` WHERE `org_id` = $organisation_id";

		$data['table_name'] = 'organisation';
		$data['sql_query'] = $sql;
		$data['page_heading'] = 'Manage Organisation';
		$data['heading'] = 'Organisation List';
	    $data['primary_column_name'] = 'org_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'admin/organisation/organisation_add_task?id='.$organisation_id;
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'admin/organisation/organisation_add_task?id='.$organisation_id;
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		
		if($return_val){
			$this->load->view('admin/pages/organisation/organisation_task_list',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('admin/components/footer');
		
	}
	public function financial_years(){
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$this->load->model('Page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '3', 
			'submodule_id' => '5', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
       
		$sql="SELECT * FROM `financial_years`";

		$data['sql_query'] = $sql;
		$data['page_heading'] = 'Financial Years';
		$data['heading'] = 'Financial Years List';
	   
		if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'admin/organisation/financial_years_add';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'admin/organisation/financial_years_add';
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		
		//if($return_val){
			$this->load->view('admin/pages/financial_years',$data);
		//}else{
			//$this->load->view('error_msg');
		
		$this->load->view('admin/components/footer');
		
	}
	  public function financial_years_add(){
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$this->load->model('Page_validation_model', 'obj_pvm', TRUE);
		if(isset($_GET['financial_id'])){
			$segment = $_GET['financial_id'];
			$page='edit';
		}else{
			$segment =0;
			$page='add';
		}
		
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '3', 
			'submodule_id' => '5', 
			'user_id' => $user_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'admin/organisation/financial_years_add';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'admin/organisation/financial_years_add';
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		
		$data['heading'] = 'Add Financial Years';
		$data['page_heading'] = 'Financial Years';
		
		//Load Required modal
		$data['records'] =$this->db->get_where('financial_years',array('financial_id'=>$segment))->result();
		//var_dump($data['records']);
	    $this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		
		//if($return_val){
		$this->load->view('admin/pages/financial_years_add',$data);
		//}else{
			//$this->load->view('error_msg');
		
		$this->load->view('admin/components/footer');
		
	}
	public function update_financialyears() {
        //array to store ajax responses
	$this->load->model('Comman_model', 'obj_comman', TRUE);
        $arr_response = array('status' => 500);
		$financial_id= $_POST['financial_id'];
		$array_data = array(
			 'start_year'=> $_POST['start_year'],
			 'name' => $_POST['name'],
			 'start_date' => $_POST['start_date'],
			 'end_date' => $_POST['end_date'],
		); 
		if($_POST['is_add_edit'] == 'edit'){
			$return_val = $this->obj_comman->update_data('financial_years',$array_data,array('financial_id'=> $_POST['financial_id'] ));
		}else{
			$return_val = $this->obj_comman->insert_data('financial_years',$array_data); 
		}
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    
	}

	  public function financial_remove(){
		  //remove financial years
		$financial_id=$_POST['id'];
		$return_val = $this->db->delete('financial_years',array('financial_id' => $financial_id));
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'deleted submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	} 
	public function status(){
 
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$this->load->model('page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '2', 
			'submodule_id' => '2', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
       
		$sql="SELECT * FROM `status`";
		$data['sql_query'] = $sql;
		$data['page_heading'] = 'Status List';
		$data['heading'] = 'Status';
	   
	   /* if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'admin/organisation/organisation_add_task?id='.$organisation_id;
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'admin/organisation/organisation_add_task?id='.$organisation_id;
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}*/
		
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		
		if($return_val){
			$this->load->view('admin/pages/status',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('admin/components/footer');
		
	}
	public function organisation_add_task(){
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$this->load->model('page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '2', 
			'submodule_id' => '2', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
      
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'admin/organisation/index';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'admin/organisation/index';
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		if(isset($_GET['id'])){
			$organisation_id = $_GET['id'];
		}else{
			$organisation_id =0;
		}
		
		if(isset($_GET['task_id'])){
			$task_id = $_GET['task_id'];
		}else{
			$task_id =0;
		}
		
		$data['organisation_id'] = $organisation_id;
		$sql="SELECT * FROM `org_task_list` WHERE `task_id` = $task_id";
		//SELECT * FROM `org_task_list` WHERE `task_id` = 7 AND `org_id` = 2
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    $data['task_data'] = $this->obj_comman->get_query($sql);
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		
		if($return_val){
			$this->load->view('admin/pages/organisation/organisation_add_task',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('admin/components/footer');
		
	}

	public function remove() {
		$this->load->model('Comman_model', 'obj_comman', TRUE);
        //array to store ajax responses
        $arr_response = array('status' => 500);

        $data = array('is_deleted' => '1' );
        $return_val = $this->obj_comman->update_data($_POST['table_name'],$data,array($_POST['primary_column_name']=>$_POST['id'])); 

        $return_val = $this->obj_comman->update_data('org_staff_account',$data,array('staff_id'=>$_POST['staff_id'])); 
		//$return_val = $this->db->update($_POST['table_name'],array($_POST['status_column_name']=>'Remove'),array($_POST['primary_column_name']=>$_POST['id']));
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Removed successfully';	
	    } else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }
}
