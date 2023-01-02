<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

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
	 * admin List of plans for this controller.
	*/
	public function manage(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '6', 
			'submodule_id' => '8', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		 if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/task/manage';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/task/manage';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');
		$data['heading'] = 'Task Manager';
		
		$sql1="SELECT * FROM `org_staff_account` WHERE `staff_status` = 'Active' AND `org_id` = ".$org_id."";
		$data['org_users'] = $this->db->query($sql1)->result_array();
		
		$where = '';
		$data['status'] = '';
		$data['sstatus'] = '';
		$data['assignee'] = '';
		$data['task_type_id'] = '';
		
		if(isset($_GET['status'])){
			$status = $_GET['status'];
			$data['status'] = $_GET['status'];
			
			if($status == 'Incomplete' ){
				$data['status'] = 'Incomplete';
				$status = 'Incomplete';
				if(isset($_GET['sstatus'])){
					$data['sstatus'] = $_GET['sstatus'];
					$sstatus = $_GET['sstatus'];
					$sstatus_arr = explode(",",$sstatus);
					$where .= '  AND  (';
					$array_length = count($sstatus_arr);
					$counter = 0;
					foreach($sstatus_arr as $item) {
						$counter++;
						$where .= ' status="'.trim($item).'" ';
						if($array_length != $counter){
							$where .= ' or ';
						}
					}
					$where .= ') ';
					
				}else{
					$where .= ' AND status != "Completed" ';
				}
				
				
				//
				//assignee_list
			}else{
				$data['status'] = 'Completed';
				$status = 'Completed';
				$where .= ' AND status = "Completed" ';
			}
			if(isset($_GET['assignee'])){
				$data['assignee'] = $_GET['assignee'];
				$assignee = $_GET['assignee'];
				$sstatus_arr = explode(",",$assignee);
				$where .= '  AND  (';
				$array_length = count($sstatus_arr);
				$counter = 0;
				foreach($sstatus_arr as $item) {
					$counter++;
					$where .= ' org_staff_id="'.trim($item).'" ';
					if($array_length != $counter){
						$where .= ' or ';
					}
				}
				$where .= ') ';
			
			}else{
			$data['assignee'] ='';
			}
			if(isset($_GET['task_type_id'])){
				$data['task_type_id'] = $_GET['task_type_id'];
				$task_type_id = $_GET['task_type_id'];
				$sstatus_arr = explode(",",$task_type_id);
				$where .= '  AND  (';
				$array_length = count($sstatus_arr);
				$counter = 0;
				foreach($sstatus_arr as $item) {
					$counter++;
					$where .= ' org_task_list_id="'.trim($item).'" ';
					if($array_length != $counter){
						$where .= ' or ';
					}
				}
				$where .= ') ';
			
			}else{
				$data['task_type_id']='';
			}
			
		}else{
			$data['status'] = 'Incomplete';
			$status = 'Incomplete';
			$where .= ' AND status != "Completed" ';
		}
		
		
		
		$org_staff_id = 0;
		if(isset($_GET['org_staff_id'])){
			if(($_GET['org_staff_id']) > 0){
				$org_staff_id = $_GET['org_staff_id'];
				$where .= ' AND org_staff_id = '.$org_staff_id .' ';
			}
		}
		//var_dump($where);
		$data['org_staff_id'] = $org_staff_id;
		$sql="SELECT * FROM `org_tasks` WHERE `org_id` = ".$org_id."  " .$where. "ORDER BY org_task_id DESC";
		$db_result = $this->db->query($sql);
		//var_dump($sql);
		$data_temp = array();
        $data_value = array();
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
                if (!array_key_exists($row->org_task_id, $data_temp)) {
                    $data_temp[$row->org_task_id] = array();
                }
				$prop_name = '';
				if($row->prop_id){
					$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$row->prop_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$prop_name = ($db_result1[0]['title']);
					}
				}
				$ngo_name = '';
				if($row->superngo_id){
					$sql1="SELECT * FROM `superngo` WHERE `id` =  ".$row->superngo_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$ngo_name = ($db_result1[0]['brand_name']);
					}
				}
				$assigned_to = '';
				if($row->org_staff_id){
					$sql1="SELECT * FROM `org_staff_account` WHERE `staff_id` =  ".$row->org_staff_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$assigned_to = $db_result1[0]['first_name'] .' '.$db_result1[0]['last_name'];
					}
				}
                if (array_key_exists($row->org_task_id, $data_temp)) {
                    $data_temp[$row->org_task_id] = array(
                        'org_task_id' => $row->org_task_id,
						'org_task_list_id' => $row->org_task_list_id,
						'org_task_label' => $row->org_task_label,
						'org_id'=> $row->org_id,
						'org_staff_id'=> $row->org_staff_id,
						'assigned_to'=> $assigned_to,
						'superngo_id'=> $row->superngo_id,
						'ngo_name'=> $ngo_name,
						'prop_id'=> $row->prop_id,
						'prop_name'=> $prop_name,
						'created_date'=> $row->created_date,
						'created_time'=> $row->created_time,
						'status'=> $row->status,
						'due_date'=> $row->due_date,
                    );
                    array_push($data_value, $data_temp[$row->org_task_id]);
                }
            }
		}
		$data['data_value'] = $data_value;
		$data['table_type'] = 'dataTables';
		
	    
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/task_manage',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	/**
	 * admin List of plans for this controller.
	*/
	public function mytasks(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '6', 
			'submodule_id' => '7', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		 if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/task/manage';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/task/manage';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');
		$staff_id = $this->session->userdata('staff_id');
		$data['heading'] = 'My Tasks';
		
		$sql1="SELECT * FROM `org_staff_account` WHERE `staff_status` = 'Active' AND `org_id` = ".$org_id." ";
		$data['org_users'] = $this->db->query($sql1)->result_array();
		
		
        $where = '';
		$data['status'] = '';
		$data['sstatus'] = '';
		$data['task_type_id'] = '';
		if(isset($_GET['status'])){
			$status = $_GET['status'];
			$data['status'] = $_GET['status'];
			
			
			if($status == 'New' ){
				$data['status'] = 'New';
				$status = 'New';
				
				if(isset($_GET['sstatus'])&& isset($_GET['sstatus'])!=''){
					$data['sstatus'] = $_GET['sstatus'];
					$sstatus = $_GET['sstatus'];
					$sstatus_arr = explode(",",$sstatus);
					$where .= '  AND  (';
					$array_length = count($sstatus_arr);
					$counter = 0;
						foreach($sstatus_arr as $item) {
							//var_dump($status);
							//var_dump($item);
							if($item=='New' || $item==' New'){	
								$item='New';
								if($status==$item){
									$where .= 'status != "Completed" AND ';
								}
							}
							$counter++;
							$where .=  'status="'.trim($item).'" ';
							if($array_length != $counter){
								$where .= ' or ';
							}
						}
						$where .= ') ';
						
			
				}else{
					$where .= ' AND status != "Completed" AND status != "In progress"';
				}
				
			}	
			else if($status=='Completed'){
				$data['status'] = 'Completed';
				$status = 'Completed';
				$where .= ' AND status = "Completed" ';
			}else{
				$where .= ' AND status != "Completed" AND status != "In progress"';
			}
			
			if(isset($_GET['task_type_id'])){
				$data['task_type_id'] = $_GET['task_type_id'];
				$task_type_id = $_GET['task_type_id'];
				$sstatus_arr = explode(",",$task_type_id);
				$where .= '  AND  (';
				$array_length = count($sstatus_arr);
				$counter = 0;
				foreach($sstatus_arr as $item) {
					$counter++;
					$where .= ' org_task_list_id="'.trim($item).'" ';
					if($array_length != $counter){
						$where .= ' or ';
					}
				}
				$where .= ') ';
			
			}else{
				$data['task_type_id']='';
			}
		}else{
			$data['status'] = 'New';
			$status = 'New';
			$where .= ' AND status != "Completed" AND status != "In progress"';
		}
		
		//var_dump($where);
		
		$sql="SELECT * FROM `org_tasks` WHERE `org_id` = ".$org_id."  AND `org_staff_id` = ".$staff_id." " .$where. "  ORDER BY `org_tasks`.`org_task_id` DESC";
		
		
		$db_result = $this->db->query($sql);
		
		
		
		$data_temp = array();
        $data_value = array();
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
                if (!array_key_exists($row->org_task_id, $data_temp)) {
                    $data_temp[$row->org_task_id] = array();
                }
				$prop_name = '';
				if($row->prop_id){
					$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$row->prop_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$prop_name = ($db_result1[0]['title']);
					}
				}
				$ngo_name = '';
				if($row->ngo_id){
					
					$sql1="SELECT * FROM `ngo` WHERE `id` =  ".$row->ngo_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$ngo_name = ($db_result1[0]['legal_name']);
					}
				}
                if (array_key_exists($row->org_task_id, $data_temp)) {
                    $data_temp[$row->org_task_id] = array(
                        'org_task_id' => $row->org_task_id,
						'org_task_list_id' => $row->org_task_list_id,
						'org_task_label' => $row->org_task_label,
						'org_id'=> $row->org_id,
						'org_staff_id'=> $row->org_staff_id,
						'assigned_to'=> '',
						'superngo_id'=> $row->superngo_id,
						'ngo_id'=> $row->ngo_id,
						'ngo_name'=> $ngo_name,
						'prop_id'=> $row->prop_id,
						'prop_name'=> $prop_name,
						'created_date'=> $row->created_date,
						'created_time'=> $row->created_time,
						'status'=> $row->status,
						'due_date'=> $row->due_date,
                    );
                    array_push($data_value, $data_temp[$row->org_task_id]);
                }
            }
		}
		$data['data_value'] = $data_value;
		$data['table_type'] = 'dataTables';
		/*
		$listdata = $this->db->query($sql_query)->result_array();
		$data['table_name'] = 'org_tasks';
		$data['sql_query'] = $sql;
		$data['heading'] = 'Task Manager';
	    $data['table_header_column'] = array('org_task_label','org_staff_id','superngo_id','prop_id','created_date','created_time','status');
	    $data['table_body_column'] = array('org_task_label','org_staff_id','superngo_id','prop_id','created_date','created_time','status');
	    $data['primary_column_name'] = 'org_task_id';
	   
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; *//* //dataTables //dataTables-example */
	    
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/mytasks',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	
	public function update_due_date() {
        $arr_response = array('status' => 500);
		$org_task_id = $_POST['org_task_id'];
		
		if($_POST['new_due_date']){
			$data = array(
				'due_date' => $_POST['new_due_date'],
			);            
			$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		}
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Due date updated successfully';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    }
	public function update_assignee() {
		
        $arr_response = array('status' => 500);
		$org_task_id = $_POST['org_task_id'];
		$prop_id = $_POST['prop_id'];
		$org_id = $_POST['org_id'];
		
			//var_dump($_POST);die;
		if($_POST['new_assignee']){
			$data = array(
				'org_staff_id' => $_POST['new_assignee'],
			);            
			$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
			 
			}
			//var_dump($return_val);die;
		if($return_val=='true'){
			$this->assignee_send_email($org_task_id,$prop_id,$org_id);
		}
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Assignee updated successfully';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    }
	
	
	public function assignee_send_email($org_task_id,$prop_id,$org_id){
		
		$sql_2 = 'SELECT title,ngo_id FROM `proposal` WHERE `prop_id` ='.$prop_id;
		$result_2 = $this->db->query($sql_2);
		if($result_2 && $result_2->num_rows()){
			$proposal_data = $result_2->result();
			$ngo_id = $proposal_data[0]->ngo_id;
		}else{
			$ngo_id = 0;
		}
		
		$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
		$result_3 = $this->db->query($sql_3);
		if($result_3 && $result_3->num_rows()){
			$org_data = $result_3->result();
			$org_name = $org_data[0]->org_name;
		}else{
			$org_name = '';
		}
		
		$sql_4 = 'SELECT * FROM `org_tasks` WHERE `org_task_id` = '.$org_task_id ;
		$result_4 = $this->db->query($sql_4);
		if($result_4 && $result_4->num_rows()){
			$org_tasks_data = $result_4->result();
			$org_staff_id = $org_tasks_data[0]->org_staff_id;
			$task_name = $org_tasks_data[0]->org_task_label;
			$task_type = $org_tasks_data[0]->task_type;
			if($org_tasks_data[0]->due_date){
				$due_date = $org_tasks_data[0]->due_date;
			}else{
				$due_date = '--';
			}
			$project_id = $org_tasks_data[0]->project_id;
			//$prop_id = $org_tasks_data[0]->prop_id;
		}else{
			//$prop_id = 0;
			$project_id = 0;
			$org_staff_id = 0;
			$task_name = '';
			$task_type = '';
			$due_date = '';
		}
		
		$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id ;
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$staff_data = $result_5->result();
			$staff_name = $staff_data[0]->first_name.' '.$staff_data[0]->last_name;
			$staff_email = $staff_data[0]->staff_email;
			
		}else{
			$staff_data = '';
			$staff_name = '';
			$staff_email = '';
		}
		
		$sql_6 = 'SELECT * FROM `ngo` WHERE `id` = '.$ngo_id ;
		$result_6 = $this->db->query($sql_6);
		if($result_6 && $result_6->num_rows()){
			$ngo_data = $result_6->result();
			$ngo_name = $ngo_data[0]->legal_name;
			
		}else{
			$ngo_name = '';
		}
		
		if($task_type == 'pmp'){ 
			$sql_7 = 'SELECT * FROM `project` WHERE `id` ='.$project_id ;
			$result_7 = $this->db->query($sql_7);
			if($result_7 && $result_7->num_rows()){
				$project_data = $result_7->result();
				$project_or_prop_name = $project_data[0]->title;
			}else{
				$project_or_prop_name = '';
			}
		}
		if($task_type == 'nrp' || $task_type == 'prp'){
			$sql_7 = 'SELECT * FROM `proposal` WHERE `prop_id` ='.$prop_id;
			$result_7 = $this->db->query($sql_7);
			if($result_7 && $result_7->num_rows()){
				$proposal_data = $result_7->result();
				$project_or_prop_name = $proposal_data[0]->title;
			}else{
				$project_or_prop_name = '';
			}
		}
		$message ='';
		$message .= 'Dear '.$staff_name.' <br>';
		$message .= '<p>You have been assigned a new task for '.$org_name.'.</p><br>';
		$message .= '<div>Task: '.$task_name.'</div>';
		$message .= '<div>NGO: '.$ngo_name.'</div>';
		$message .= '<div>Proposal/Project: '.$project_or_prop_name.'</div>';
		$message .= '<div>Due Date: '.$due_date.'</div><br>'; 
		$message .= '<div>Please click on the link below to see the task:</div><br>'; 
		$message .= '<a href="'.base_url().'organisation/tasks/detail?id='.$org_task_id.'&sourse=tasks">Go To Task</a>'; 
		//print_r($message);die;
		$this->load->model('Email_model', 'obj_email', TRUE);
		$array = array(
			'subject' => 'You have been assigned to the task: '.$task_name.' for '.$org_name ,
			'msg' => $message,
			'to' =>  'mdasifalam48@gmail',  //$staff_email, //'pradeepss269@gmail.com',
			'to_name' => $staff_name,
		);
		
		//$this->obj_email->send_mail_in_ci($data);
		$this->obj_email->send_mail_in_sendinblue($array);
	}
	
	
	
	public function details(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '6', 
			'submodule_id' => '6', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		 if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/task/manage';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/task/manage';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');
		$data['heading'] = 'Task Detail 123: ';
		
		$sql1="SELECT * FROM `org_staff_account` WHERE `staff_status` = 'Active' AND `org_id` = ".$org_id."";
		$data['org_users'] = $this->db->query($sql1)->result_array();
		
		if(isset($_GET['id'])){
			$org_task_id = $_GET['id'];
		}else{
			$org_task_id =0;
		}
		
		$sql="SELECT * FROM `org_tasks` WHERE `org_id` = ".$org_id." AND `org_task_id` = ".$org_task_id."";
		$db_result = $this->db->query($sql);
		
		$data_temp = array();
        $data_value = array();
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
                if (!array_key_exists($row->org_task_id, $data_temp)) {
                    $data_temp[$row->org_task_id] = array();
                }
				$prop_name = '';
				if($row->prop_id){
					$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$row->prop_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$prop_name = ($db_result1[0]['title']);
					}
				}
				$ngo_name = '';
				if($row->superngo_id){
					$sql1="SELECT * FROM `superngo` WHERE `id` =  ".$row->superngo_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$ngo_name = ($db_result1[0]['brand_name']);
					}
				}
				$assigned_to = '';
				if($row->org_staff_id){
					$sql1="SELECT * FROM `org_staff_account` WHERE `staff_id` =  ".$row->org_staff_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$assigned_to = $db_result1[0]['first_name'] .' '.$db_result1[0]['last_name'];
					}else{
						$assigned_to = '';
					}
				}
                if (array_key_exists($row->org_task_id, $data_temp)) {
                    $data_temp[$row->org_task_id] = array(
                        'org_task_id' => $row->org_task_id,
						'org_task_list_id' => $row->org_task_list_id,
						'org_task_label' => $row->org_task_label,
						'org_id'=> $row->org_id,
						'org_staff_id'=> $row->org_staff_id,
						'assigned_to'=> $assigned_to,
						'superngo_id'=> $row->superngo_id,
						'ngo_name'=> $ngo_name,
						'prop_id'=> $row->prop_id,
						'prop_name'=> $prop_name,
						'created_date'=> $row->created_date,
						'created_time'=> $row->created_time,
						'status'=> $row->status,
						'due_date'=> $row->due_date,
                    );
                    array_push($data_value, $data_temp[$row->org_task_id]);
                }
            }
		}
		$data['data_value'] = $data_value;
		$data['table_type'] = 'dataTables';
		$data['heading'] = 'Task Detail 122';
	    
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/task_manage_details',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	
	public function detail(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
			$arrayName = array(
			'module_id' => '6', 
			'submodule_id' => '6', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		 if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/task/manage';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/task/manage';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();



		$org_id = $this->session->userdata('org_id');
		$data['heading'] = 'Task Detail:hgh ';
		
		$sql1="SELECT * FROM `org_staff_account` WHERE `staff_status` = 'Active' AND `org_id` = ".$org_id."";
		$data['org_users'] = $this->db->query($sql1)->result_array();
		
		if(isset($_GET['id'])){
			$org_task_id = $_GET['id'];
		}else{
			$org_task_id =0;
		}
		
		$sql="SELECT * FROM `org_tasks` WHERE `org_id` = ".$org_id." AND `org_task_id` = ".$org_task_id." AND `org_staff_id` = " .$staff_id."";
		$db_result = $this->db->query($sql);
		if($db_result->result_array()){
			$data_temp = array();
			$data_value = array();
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
					if (!array_key_exists($row->org_task_id, $data_temp)) {
						$data_temp[$row->org_task_id] = array();
						$ngo_id=$row->ngo_id;
					}
					$prop_name = '';
					if($row->prop_id){
						$prop_id=$row->prop_id;
						$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$prop_id."";
						$db_result1 = $this->db->query($sql1)->result_array();
						if($db_result1){
							$prop_name = ($db_result1[0]['title']);
							
						}
						$sql="select *,(select org_name from organisation where org_id=proposal.organisation_id) as 'organisation',(select legal_name from ngo where id=proposal.ngo_id) as 'ngo' from proposal where prop_id=$prop_id AND is_deleted=0";
							$data['proposal_data'] = $this->obj_comman->get_query($sql);
							$data['is_ngo'] = 'yes';
							$data['admin_category_data'] = '';
							if($data['proposal_data']){
								if($data['proposal_data'][0]['focus_category']){
									$focus_category_id=$data['proposal_data'][0]['focus_category'];
									$data['admin_category_data'] = $this->obj_comman->get_by('admin_category',array('id'=>$focus_category_id));
								}
							}
							$data['admin_subcategory_data'] = '';
							if($data['proposal_data']){
								if($data['proposal_data'][0]['focus_subcategory']){
									$focus_subcategory_id=$data['proposal_data'][0]['focus_subcategory'];
									$data['admin_subcategory_data'] = $this->obj_comman->get_by('admin_subcategory',array('id'=>$focus_subcategory_id));
								}
							}
					}	
					//var_dump($row->prop_id);die;
					$legal_name='';					
					if($ngo_id){
						$sql2="SELECT legal_name,id FROM `ngo` WHERE `id` =  ".$ngo_id."";
						$db_result2 = $this->db->query($sql2)->result_array();
						if($db_result2){
							$legal_name = ($db_result2[0]['legal_name']);
							
						}
						
						$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$ngo_id),false,true);	
						$data['edit_hide']='yes';
						$data['page_heading_disp']='no';
						$data['hide_two_row']='yes';
						$data['page_splite']='yes';
						$data['page_col_md']='col-md-12';
						$data['superngo_data'] ='';
						
					}
					

					$ngo_name = '';
					if($row->superngo_id){
						$sql1="SELECT * FROM `superngo` WHERE `id` =  ".$row->superngo_id."";
						$db_result1 = $this->db->query($sql1)->result_array();
						if($db_result1){
							$ngo_name = ($db_result1[0]['brand_name']);
						}
					}
					$title='';
					if($row->project_id){
						$sql1="SELECT id,title FROM `project` WHERE `id` =  ".$row->project_id."";
						$db_result2 = $this->db->query($sql1)->result_array();
						if($db_result2){
							$title = ($db_result2[0]['title']);
						}
					}
					if (array_key_exists($row->org_task_id, $data_temp)) {
						$data_temp[$row->org_task_id] = array(
							'org_task_id' => $row->org_task_id,
							'org_task_list_id' => $row->org_task_list_id,
							'org_task_label' => $row->org_task_label,
							'org_id'=> $row->org_id,
							'project_id'=> $row->project_id,
							'org_staff_id'=> $row->org_staff_id,
							'assigned_to'=> '',
							'superngo_id'=> $row->superngo_id,
							'ngo_name'=> $legal_name,
							'ngo_id'=> $ngo_id,
							'prop_id'=> $row->prop_id,
							'prop_name'=> $prop_name,
							'created_date'=> $row->created_date,
							'created_time'=> $row->created_time,
							'status'=> $row->status,
							'due_date'=> $row->due_date,
							'comments'=> $row->comments,
							'view_file_name'=> $row->view_file_name,
							'additional_json'=> $row->additional_json,
							'project_id'=> $row->project_id,
							'task_type'=>$row->task_type,
							'legal_name'=>$legal_name,
							'title'=>$title,
							'last_updated_date'=>$row->last_updated_date,

						);
						array_push($data_value, $data_temp[$row->org_task_id]);
					}
				}
			}
			
			$data['data_value'] = $data_value;
			$data['table_type'] = 'dataTables';
			$data['heading'] = '';
			$sql3="SELECT first_name,last_name,staff_id,staff_role_id FROM `org_staff_account` GROUP BY  staff_role_id ";
			$data['focal_point_data'] = $this->db->query($sql3)->result_array();
						
			
			
			$this->load->view('organisation/components/header');
			$this->load->view('organisation/components/menu',$data);
		
			$this->load->view('organisation/pages/mytask_detail',$data);
		}else{
			
			$this->load->view('organisation/components/header');
			$this->load->view('organisation/components/menu',$data);
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}

	
	public function update_comment_ontask(){
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		//var_dump($additional_json);die;
		$data4 = array(
			'comments' => $_POST['comments'],
			'additional_json' => $additional_json,
			'status' => 'In progress',
			'last_updated_date'=>date('Y-m-d H:i:s'),
		); 
		
		$return_val4 = $this->db->update('org_tasks',$data4,array('org_task_id' => $org_task_id));
		
		if ($return_val4) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}

	public function update_onsave_task1(){
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_id=$_POST['org_id'];
		$ngo_id= $_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		$comments='';
		if(isset($_POST['comments'])){
			$comments=$_POST['comments'];	
		}
		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		//var_dump($_POST);die;
		if(isset($prop_id)){
			$data1=array(
				'proposal_status'=>'NGO Review Pending',
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
		}
		if(isset($ngo_id) AND isset($ngo_id)){
			$return_val2 = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
			$data3 = array(
				 'org_id' => $org_id,
				 'ngo_id' => $ngo_id,
				 'status'=> 'NGO Review Pending',
				 'org_last_updated_date'=>date('Y-m-d H:i:s'),				 
				); 
			$return_val3 = $this->db->insert('org_ngo_review_status',$data3);
		}
		$data4 = array(
			'additional_json' => $additional_json,
			'comments' => $comments,
			'status' => 'In progress',
			'last_updated_date'=>date('Y-m-d H:i:s'),
			);
		
		$return_val4 = $this->db->update('org_tasks',$data4,array('org_task_id' => $org_task_id));
		
		if ($return_val4) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	
	
	public function change_status_onsubmit_by_ngo_review(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		 $project_id=0;
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		$comments='';
		if(isset($_POST['comments'])){
			$comments=$_POST['comments'];	
		}
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		
		
		if($prop_id){
			$data1=array(
			'proposal_status'=>'NGO Decision Pending',
			'org_last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
		}

		if(isset($ngo_id) AND isset($org_id)){
			$return_val2 = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
				$data3 = array(
					'org_id' => $org_id,
					'ngo_id' => $ngo_id,
					'status'=> 'NGO Decision Pending',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),				 
				); 
			$return_val3 = $this->db->insert('org_ngo_review_status',$data3);
		}

		$data_task = array(
			'comments' => $comments,
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'project_id'=>$project_id,
			'last_updated_date'=>date('Y-m-d H:i:s'),
		);
		//var_dump($data_task);die;
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
				$data1 = array(	
					'comments' => '',		
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'org_task_list_id' => $org_task_list_id_increment,
					'org_staff_id'=> $org_staff_id,
					'created_date' => date('Y-m-d'),
					'created_time' => date('H:i:s'),
					'org_task_label' => $row->task_label,
					'task_type' => $row->task_type,
					'view_file_name' => $row->view_file_name,
					'project_id' => $project_id,					
					'additional_json' => $additional_json,
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val=$this->db->insert('org_tasks', $data1);
				$org_task_id = $this->db->insert_id();	
			}
		}
		if($org_task_id){
			$this->task_created_send_email($org_task_id,$prop_id,$org_id);
		}
		if($org_task_id){
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Status updated successfully.';
		}else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	
	public function change_status_onsubmit_by_ngo_desk_review(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		 $project_id=0;
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
	
		$was_review_radion=$_POST['was_review_radion'];
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		if(isset($_POST['prop_update'])){
			$prop_update = $_POST['prop_update'];
			$prop_data=array(
					'title'=>$prop_update,
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
					);
			$return_val1 = $this->db->update('proposal',$prop_data,array('prop_id' => $prop_id));
		}
		
		
		//var_dump($additional_json);die;
		if($was_review_radion=='Yes'){
			$my_final=$_POST['my_final'];
			if($my_final=='my_request'){
				
				if($prop_id){
				$data1=array(
					'proposal_status'=>'NGO Revision',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
				}

				if(isset($ngo_id) AND isset($org_id)){
					$return_val2 = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
						$data3 = array(
							'org_id' => $org_id,
							'ngo_id' => $ngo_id,
							'status'=> 'NGO Revision',
							'org_last_updated_date'=>date('Y-m-d H:i:s'),				 
						); 
					$return_val3 = $this->db->insert('org_ngo_review_status',$data3);
				}

				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'NGO Revision',
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				
					
				$ngo_cycle_detail_url=	base_url().'ngo/proposals/edit?id='.$prop_id;
				$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
				$result_3 = $this->db->query($sql_3);
				if($result_3 && $result_3->num_rows()){
					$org_data = $result_3->result();
					$org_name = $org_data[0]->org_name;
				}else{
					$org_data='';
					$org_name = '';
				}
			
				$sql_4 = 'SELECT first_name,last_name FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id ;
				$result_4 = $this->db->query($sql_4);
				if($result_4 && $result_4->num_rows()){
					$org_staff_data = $result_4->result();
					$staff_name = $org_staff_data[0]->first_name .' '. $org_staff_data[0]->last_name;
								
				}else{
					$org_staff_data ='';
					$cycle_name = '';
				}
				
				$desp= "$staff_name from $org_name is requesting you to update/revise some data of this proposal and/or the entity (for which this proposal was created) as per the details below:<br><br>ContentEnteredInDetailsBox
				";
			
				//print_r($desp);die;
				$notification_title="Entity/Proposal Revision Request";
				$data1 = array(	
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'proposal_id' => $prop_id,
					'org_id' => $org_id,
					'project_id' => $project_id,
					'org_task_id' => $org_task_id,
					'created_date' => date('Y-m-d'),
					'created_time' => date('H:i:s'),
					'url'=>$ngo_cycle_detail_url,
					'status'=>'Pending',
					'title'=>$notification_title,
					'description' =>$desp,
							
					);
					//var_dump($data1);die;			
					$return_val=$this->db->insert('ngo_notification', $data1);
					$notification_id = $this->db->insert_id();
					if($notification_id){
						$this->ngo_notification_send_email($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
					}
					
					
			}else if($my_final=='my_approve'){		
				if($prop_id){
					$data1=array(
					'proposal_status'=>'Approved',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
				}
				//var_dump($data1);die;
				if(isset($ngo_id) AND isset($org_id)){
					$return_val2 = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
						$data3 = array(
							'org_id' => $org_id,
							'ngo_id' => $ngo_id,
							'status'=> 'Approved',
							'org_last_updated_date'=>date('Y-m-d H:i:s'),				 
						); 
					$return_val3 = $this->db->insert('org_ngo_review_status',$data3);
				}

				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				$org_task_list_id_increment = $org_task_list_id+1;
				//var_dump($org_task_list_id_increment);die;
				$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $org_task_list_id_increment,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'created_time' => date('H:i:s'),
							'org_task_label' => $row->task_label,
							'task_type' => $row->task_type,
							'view_file_name' => $row->view_file_name,
							'project_id' => $project_id,					
							'additional_json' => $additional_json,
							'last_updated_date'=>date('Y-m-d H:i:s'),
						);
						$return_val=$this->db->insert('org_tasks', $data1);
						$org_task_id = $this->db->insert_id();	
					}
				}
				if($org_task_id){
					$this->task_created_send_email($org_task_id,$prop_id,$org_id);
				}
				
			}
			else if($my_final=='my_recommend'){
				
				if($prop_id){
					$data1=array(
					'proposal_status'=>'Approved',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
				}
				//var_dump($data1);die;
				if(isset($ngo_id) AND isset($org_id)){
					$return_val2 = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
						$data3 = array(
							'org_id' => $org_id,
							'ngo_id' => $ngo_id,
							'status'=> 'Approved',
							'org_last_updated_date'=>date('Y-m-d H:i:s'),				 
						); 
					$return_val3 = $this->db->insert('org_ngo_review_status',$data3);
				}

				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				$is_cycle_start='bord review';
				$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'is_cycle_start' => $is_cycle_start));
				//$org_task_list_id_increment = $org_task_list_id+1;
				//$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $row->task_id,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'created_time' => date('H:i:s'),
							'org_task_label' => $row->task_label,
							'task_type' => $row->task_type,
							'view_file_name' => $row->view_file_name,
							'project_id' => $project_id,					
							'additional_json' => $additional_json,
							'last_updated_date'=>date('Y-m-d H:i:s'),
						);
						$return_val=$this->db->insert('org_tasks', $data1);
						$org_task_id = $this->db->insert_id();	
					}
				}
				if($org_task_id){
					$this->task_created_send_email($org_task_id,$prop_id,$org_id);
				}
	
			}
			
			
			else if($my_final=='my_reject'){
				
				$data_proposal = array(
					'proposal_status'=> 'Rejected',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
			 
					);
				//var_dump($data_proposal);die;
				$return_val = $this->db->update('proposal',$data_proposal,array('prop_id'=>$prop_id));
				
					$data_ngo_review = array(
					'status' => 'Rejected',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
				); 
				$return_val1 = $this->db->update('org_ngo_review_status',$data_ngo_review,array('org_id' => $org_id,'ngo_id' => $ngo_id));
				
				
				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'project_id'=>$project_id,
					'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));	
			}
		
		}else{
			
			if($prop_id){
					$data1=array(
					'proposal_status'=>'Approved',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
				}
				//var_dump($data1);die;
				if(isset($ngo_id) AND isset($org_id)){
					$return_val2 = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
						$data3 = array(
							'org_id' => $org_id,
							'ngo_id' => $ngo_id,
							'status'=> 'Approved',
							'org_last_updated_date'=>date('Y-m-d H:i:s'),				 
						); 
					$return_val3 = $this->db->insert('org_ngo_review_status',$data3);
				}

				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				$org_task_list_id_decrement = $org_task_list_id-1;
				//var_dump($org_task_list_id_decrement);die;
				$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_decrement));
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $org_task_list_id_decrement,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'created_time' => date('H:i:s'),
							'org_task_label' => $row->task_label,
							'task_type' => $row->task_type,
							'view_file_name' => $row->view_file_name,
							'project_id' => $project_id,					
							'additional_json' => $additional_json,
							'last_updated_date'=>date('Y-m-d H:i:s'),
						);
						$return_val=$this->db->insert('org_tasks', $data1);
						$org_task_id = $this->db->insert_id();	
					}
				}
				if($org_task_id){
					$this->task_created_send_email($org_task_id,$prop_id,$org_id);
				}
				
		}
		//var_dump($org_task_id);
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}
	
	
	public function change_status_onsubmit_by_ngo_decission(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$project_id=0;
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$rejection_name=$_POST['rejection_name'];
		
		if($rejection_name=='Approved'){
			$data_task = array(
				'comments' => $_POST['comments'],
				'additional_json' => $additional_json,
				'status' => 'Completed',
				'project_id'=>$project_id,
				'last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
			
			$return_val = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
			$data_ngo_review = array(
				'org_id' => $org_id,
				'ngo_id' => $ngo_id,
				'status' => $rejection_name,
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			); 
			$return_val = $this->db->insert('org_ngo_review_status',$data_ngo_review);
			
			$data_p = array(
				'proposal_status' => 'Proposal Initial Review Pending',
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			); 
			$return_val = $this->db->update('proposal',$data_p,array('prop_id' => $prop_id));
			$data_ngo_review = array(
				'status' => $rejection_name,
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			); 
			$return_val_ngo = $this->db->update('org_ngo_review_status',$data_ngo_review,array('org_id' => $org_id,'ngo_id' => $ngo_id));
			
			$org_task_list_id_increment = $org_task_list_id+1;
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
			
			if ($db_result && $db_result->num_rows() > 0) {
	            foreach ($db_result->result() as $row) {
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $org_task_list_id_increment,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'project_id' => $project_id,					
						'additional_json' => $additional_json,
						'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val1=$this->db->insert('org_tasks', $data1);
					$org_task_id = $this->db->insert_id();
				}
			}
			if($return_val1){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}else{
			$data_task = array(
				'comments' => $_POST['comments'],
				'additional_json' => $additional_json,
				'status' => 'Completed',
				'project_id'=>$project_id,
				'last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
			
			$data_p = array(
				'proposal_status' => 'Rejected',
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			); 
			$return_val = $this->db->update('proposal',$data_p,array('prop_id' => $prop_id));
			$data_ngo_review = array(
				'status' => $rejection_name,
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			); 
			$return_val1 = $this->db->update('org_ngo_review_status',$data_ngo_review,array('org_id' => $org_id,'ngo_id' => $ngo_id));
		}

		$arr_response['status'] = 200;
		$arr_response['message'] = 'Status updated successfully.';
		echo json_encode($arr_response);
	}
	
	
	public function task_created_send_email($org_task_id,$prop_id,$org_id){
		
		$sql_2 = 'SELECT title,ngo_id FROM `proposal` WHERE `prop_id` ='.$prop_id;
		$result_2 = $this->db->query($sql_2);
		if($result_2 && $result_2->num_rows()){
			$proposal_data = $result_2->result();
			$ngo_id = $proposal_data[0]->ngo_id;
		}else{
			$ngo_id = 0;
		}
		
		$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
		$result_3 = $this->db->query($sql_3);
		if($result_3 && $result_3->num_rows()){
			$org_data = $result_3->result();
			$org_name = $org_data[0]->org_name;
		}else{
			$org_name = '';
		}
		
		$sql_4 = 'SELECT * FROM `org_tasks` WHERE `org_task_id` = '.$org_task_id ;
		$result_4 = $this->db->query($sql_4);
		if($result_4 && $result_4->num_rows()){
			$org_tasks_data = $result_4->result();
			$org_staff_id = $org_tasks_data[0]->org_staff_id;
			$task_name = $org_tasks_data[0]->org_task_label;
			$task_type = $org_tasks_data[0]->task_type;
			if($org_tasks_data[0]->due_date){
				$due_date = $org_tasks_data[0]->due_date;
			}else{
				$due_date = '--';
			}
			$project_id = $org_tasks_data[0]->project_id;
			//$prop_id = $org_tasks_data[0]->prop_id;
		}else{
			//$prop_id = 0;
			$project_id = 0;
			$org_staff_id = 0;
			$task_name = '';
			$task_type = '';
			$due_date = '';
		}
		
		$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id ;
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$staff_data = $result_5->result();
			$staff_name = $staff_data[0]->first_name.' '.$staff_data[0]->last_name;
			$staff_email = $staff_data[0]->staff_email;
			
		}else{
			$staff_data = '';
			$staff_name = '';
			$staff_email = '';
		}
		
		$sql_6 = 'SELECT * FROM `ngo` WHERE `id` = '.$ngo_id ;
		$result_6 = $this->db->query($sql_6);
		if($result_6 && $result_6->num_rows()){
			$ngo_data = $result_6->result();
			$ngo_name = $ngo_data[0]->legal_name;
			
		}else{
			$ngo_name = '';
		}
		
		if($task_type == 'pmp'){ 
			$sql_7 = 'SELECT * FROM `project` WHERE `id` ='.$project_id ;
			$result_7 = $this->db->query($sql_7);
			if($result_7 && $result_7->num_rows()){
				$project_data = $result_7->result();
				$project_or_prop_name = $project_data[0]->title;
			}else{
				$project_or_prop_name = '';
			}
		}
		if($task_type == 'nrp' || $task_type == 'prp'){
			$sql_7 = 'SELECT * FROM `proposal` WHERE `prop_id` ='.$prop_id;
			$result_7 = $this->db->query($sql_7);
			if($result_7 && $result_7->num_rows()){
				$proposal_data = $result_7->result();
				$project_or_prop_name = $proposal_data[0]->title;
			}else{
				$project_or_prop_name = '';
			}
		}
		$message ='';
		$message .= 'Dear '.$staff_name.' <br>';
		$message .= '<p>You have been assigned a new task for '.$org_name.'.</p><br>';
		$message .= '<div>Task: '.$task_name.'</div>';
		$message .= '<div>NGO: '.$ngo_name.'</div>';
		$message .= '<div>Proposal/Project: '.$project_or_prop_name.'</div>';
		$message .= '<div>Due Date: '.$due_date.'</div><br>'; 
		$message .= '<div>Please click on the link below to see the task:</div><br>'; 
		$message .= '<a href="'.base_url().'organisation/tasks/detail?id='.$org_task_id.'&sourse=tasks">Go To Task</a>'; 
		//print_r($staff_email);die;
		$this->load->model('Email_model', 'obj_email', TRUE);
		//print_r($return_val);
		$array = array(
			'subject' => 'You have been assigned to the task: '.$task_name.' for '.$org_name ,
			'msg' => $message,
			'to' =>   'pradeepss269@gmail.com',//$staff_email,
			'to_name' => $staff_name,
		);
		
		//var_dump($array);
		//$this->obj_email->send_mail_in_ci($data);
		$return_val= $this->obj_email->send_mail_in_sendinblue($array);
		//var_dump($return_val);
	}
	
	public function save_ngo_decission_data(){
		
		$arr_response = array('status' => 500);	
		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			
			$additional_json = json_encode($_POST['additional_json']);
		}
		//var_dump($_POST);die;
		$org_task_id=$_POST['org_task_id'];
			$data = array(
			'comments' => $_POST['comments'],
			'additional_json' => $additional_json,
			'status' => 'In progress',
			'last_updated_date'=>date('Y-m-d H:i:s'),
		); 
		
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
		
	}

	public function change_status_onsubmit_by_proposal_review(){ 
		$arr_response = array('status' => 500);
		$project_id=0;
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		//var_dump($_POST);die;
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		
		if($prop_id){
			$data1=array(
			'proposal_status'=>'Proposal Final Review Pending',
			'org_last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
		}
		
		$data_task = array(
			'comments' => $_POST['comments'],
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'project_id'=>$project_id,
			'last_updated_date'=>date('Y-m-d H:i:s'),
			
		);
		
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
				//var_dump($row->view_file_name);
				$data1 = array(	
					'comments' => '',		
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'org_task_list_id' => $org_task_list_id_increment,
					'org_staff_id'=> $org_staff_id,
					'created_date' => date('Y-m-d'),
					'created_time' => date('H:i:s'),
					'org_task_label' => $row->task_label,
					'task_type' => $row->task_type,
					'view_file_name' => $row->view_file_name,
					'project_id' => $project_id,					
					'additional_json' => $additional_json,
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val=$this->db->insert('org_tasks', $data1);
				$org_task_id = $this->db->insert_id();	
			}
			if($org_task_id){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}

		$arr_response['status'] = 200;
		$arr_response['message'] = 'Status updated successfully.';
		echo json_encode($arr_response);
	}


	 public function save_proposal_final_review(){
		$arr_response = array('status' => 500);	
		$org_task_id=$_POST['org_task_id'];
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		$data_task = array(
			'additional_json' => $additional_json,
			'status' => 'In progress',
			'last_updated_date'=>date('Y-m-d H:i:s'),
		); 
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
		
	}

	public function change_status_onsubmit_proposal_final_review(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$project_id=0;
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json'],true);
		}
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$ngo_id=$_POST['ngo_id'];
		$rejection_name=$_POST['rejection_name'];
		if($rejection_name=='Approved'){
				$project_title = '';
				$project_code = '';
				if($org_task_id){
					$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$prop_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$project_title = ($db_result1[0]['title']);
						$project_code = ($db_result1[0]['code']);
					}
				}
				$staff_id = $this->session->userdata('staff_id');
				/*now create project*/
				$data_project = array(
		
					 'prop_id'          => $prop_id,
					 'superngo_id'      => $superngo_id,
					 'ngo_id'           => $ngo_id,
					 'organisation_id'  => $org_id,
					 'created_time'     => date('Y-m-d H:i:s'),
					 'updated_datetime' => date('Y-m-d H:i:s'),
					 'project_status'   => 'New',
					 'is_deleted'		=> 0,
					 'generated_by'	    => $staff_id,
					 'title'	    => $project_title,
					 'code'	    => $project_code,
					);
			//var_dump($data_project);die;
			$return_val = $this->db->insert('project',$data_project);
			$project_id = $this->db->insert_id();
			$data_proposal = array(
				'proposal_status'=> 'Approved',
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			 
			);
			$return_val = $this->db->update('proposal',$data_proposal,array('prop_id'=>$prop_id));

			$data_task = array(
				'comments' => $_POST['comments'],
				'additional_json' => $additional_json,
				'status' => 'Completed',
				'project_id'=>$project_id,
				'last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));

			$org_task_list_id_increment = $org_task_list_id+1;
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
				if ($db_result && $db_result->num_rows() > 0) {
					 foreach ($db_result->result() as $row) {
						//var_dump($row->view_file_name);
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $org_task_list_id_increment,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'created_time' => date('H:i:s'),
							'org_task_label' => $row->task_label,
							'task_type' => $row->task_type,
							'view_file_name' => $row->view_file_name,
							'project_id' => $project_id,					
							'additional_json' => $additional_json,
							'last_updated_date'=>date('Y-m-d H:i:s'),
						);
						$return_val=$this->db->insert('org_tasks', $data1);
						$org_task_id = $this->db->insert_id();	
					}
				}
				if($org_task_id){
					$this->task_created_send_email($org_task_id,$prop_id,$org_id);
				}	
		}else{
			$data_proposal = array(
				'proposal_status'=> 'Rejected',
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
		 
				);
			$return_val = $this->db->update('proposal',$data_proposal,array('prop_id'=>$prop_id));
			
				$data_ngo_review = array(
				'status' => $rejection_name,
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			); 
			$return_val1 = $this->db->update('org_ngo_review_status',$data_ngo_review,array('org_id' => $org_id,'ngo_id' => $ngo_id));
			
			
			$data_task = array(
				'comments' => $_POST['comments'],
				'additional_json' => $additional_json,
				'status' => 'Completed',
				'project_id'=>$project_id,
				'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		}
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Status updated successfully.';
		echo json_encode($arr_response);
	}

	 public function change_status_onsubmit_by_cycle_creation(){ 
	 	//var_dump($_POST);die;
		 $project_id=0;
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		
		//var_dump($_POST);die;
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json'],true);
		}
		
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$ngo_id=$_POST['ngo_id'];
		
		$data = array(
			'comments' => $_POST['comments'],
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'project_id'=>$project_id,
			'last_updated_date'=>date('Y-m-d H:i:s'),
		);
			$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
			$org_task_list_id_increment = $org_task_list_id+1;
		
		$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
				//var_dump($row->view_file_name);
				$data1 = array(	
					'comments' => '',		
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'org_task_list_id' => $org_task_list_id_increment,
					'org_staff_id'=> $org_staff_id,
					'created_date' => date('Y-m-d'),
					'created_time' => date('H:i:s'),
					'org_task_label' => $row->task_label,
					'task_type' => $row->task_type,
					'view_file_name' => $row->view_file_name,
					'project_id' => $project_id,					
					'additional_json' => $additional_json,	
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val=$this->db->insert('org_tasks', $data1);
				$org_task_id = $this->db->insert_id();
				
			}
		}
		if($org_task_id){
			$this->task_created_send_email($org_task_id,$prop_id,$org_id);
		}
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Status updated successfully.';
		echo json_encode($arr_response);
	}
	public function change_status_onsubmit_by_cycle_accessment(){ 
		//var_dump($_POST);die;
		 $project_id=0;
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$ngo_id=$_POST['ngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json'],true);
		}
		$csr_list= $_POST['csr_list'];
			 if($csr_list){
			 foreach ($csr_list as  $value) {
			 	$id=$value['csr_id'];
			 	$data = array(
			 		'document_value'=>$value['csr_file_value'],
			 		'document_value_actual'=>$value['csr_file_value_actual'],
			 		'document_updated_date' => date('Y-m-d H:i:s'),
			 	);
			 	$return_val = $this->db->update('project_document',$data,array('id' => $id));
			   
			 }
		}
	
		$data_task = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'project_id'=>$project_id,
			'last_updated_date'=>date('Y-m-d H:i:s'),
		);
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
		
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
				$data1 = array(	
					'comments' => '',		
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'org_task_list_id' => $org_task_list_id_increment,
					'org_staff_id'=> $org_staff_id,
					'created_date' => date('Y-m-d'),
					'created_time' => date('H:i:s'),
					'org_task_label' => $row->task_label,
					'task_type' => $row->task_type,
					'view_file_name' => $row->view_file_name,
					'project_id' => $project_id,					
					'additional_json' => $additional_json,
					'last_updated_date'=>date('Y-m-d H:i:s'),					
				);
				$return_val=$this->db->insert('org_tasks', $data1);
				$org_task_id = $this->db->insert_id();
			}
		}
		if($org_task_id){
			$this->task_created_send_email($org_task_id,$prop_id,$org_id);
		}
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Status updated successfully.';
		echo json_encode($arr_response);
	}
	 
	public function approve_task(){
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		$org_id=$_POST['org_id'];
		$ngo_id=$_POST['ngo_id'];
		$data = array(
			'comments' => $_POST['comments'],
            //'status'=>'complete',
			
		); 
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		$return_val = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
		$data = array(
			 'org_id' => $_POST['org_id'],
			 'ngo_id' => $_POST['ngo_id'],
			 'status'=> 'Approved',	 
		); 
		$return_val = $this->db->insert('org_ngo_review_status',$data);
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	} 
	 
	public function reject_task(){
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		$org_id=$_POST['org_id'];
		$ngo_id=$_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		
		$data = array(
			'comments' => $_POST['comments'],
            //'status'=>'complete',
		); 
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		
		$return_val = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
	
		$data = array(
			 'org_id' => $_POST['org_id'],
			 'ngo_id' => $_POST['ngo_id'],
			 'status'=> 'Rejected',
			 
		); 
		$return_val = $this->db->insert('org_ngo_review_status',$data);
		
        if($prop_id > 0 ){
	     
		 $data=array(
		 
		 'proposal_status'=>'Rejected',
		 );
		 $return_val=$this->db->update('proposal',$data,array('prop_id'=>$prop_id));
	
        }
		
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully rejected';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	} 
	
	
	
	public function completed_task_onsubmit(){
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		$org_id=$_POST['org_id'];
		$ngo_id=$_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		
		$data = array(
			//'comments' => $_POST['comments'],
            'status'=>'Complete',
		); 
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	} 
	
	
	
	
	
	public function update_comment_on_org_task(){
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
	
		
		$data = array(
			'comments' => $_POST['comments'],
			'status'=> 'In progress',
			
		); 
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	public function  change_status_proposal_onsubmit(){ 

		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$data = array(
			'comments' => $_POST['comments'],
			'status' => 'Completed',
			
		);
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Successfully submitted';
		echo json_encode($arr_response);
	}
	
	
	public function update_status_on_proposal(){
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		//$org_id=$_POST['org_id'];
		//$ngo_id=$_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$ngo_id=$_POST['ngo_id'];
		$staff_id = $this->session->userdata('staff_id');
		
		$project_title = '';
		$project_code = '';
		if($org_task_id){
			$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$prop_id."";
			$db_result1 = $this->db->query($sql1)->result_array();
			if($db_result1){
				$project_title = ($db_result1[0]['title']);
				$project_code = ($db_result1[0]['code']);
			}
		}
		
		/*now create project*/
		$data = array(
		
			 'prop_id'          => $_POST['prop_id'],
			 'superngo_id'      => $_POST['superngo_id'],
			 'ngo_id'           => $_POST['ngo_id'],
			 'organisation_id'  => $_POST['org_id'],
			 'created_time'     => date('Y-m-d H:i:s'),
			 'updated_datetime' => date('Y-m-d H:i:s'),
			 'project_status'   => 'New',
			 'is_deleted'		=> 0,
			 'generated_by'	    => $staff_id,
			 'title'	    => $project_title,
			 'code'	    => $project_code,
		);
	    //var_dump($data);
		$return_val = $this->db->insert('project',$data);
		$project_id = $this->db->insert_id();
		
		$data = array(
			 'proposal_status'=> 'Approved',
			 
		);
		$return_val = $this->db->update('proposal',$data,array('prop_id'=>$prop_id));
		
		$data = array(
			'comments' => $_POST['comments'],
			'project_id' => $project_id,
		); 
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		//echo 'ok';
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['project_id'] = $project_id;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
    public function reject_status_on_proposal(){
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		//$org_id=$_POST['org_id'];
		//$ngo_id=$_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		$data = array(
			'comments' => $_POST['comments'],
		); 
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));

		$data = array(
			 'proposal_status'=> 'Rejected',
			 
		);
		$return_val = $this->db->update('proposal',$data,array('prop_id'=>$prop_id));
		//var_dump($this->db->last_query());
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	public function data_submission_on_proposal(){
		$arr_response = array('status' => 500);
		$org_task_id= $_POST['org_task_id'];
		//$org_id=$_POST['org_id'];
		//$ngo_id=$_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		
		$data = array(
			'comments' => $_POST['comments'],
            'status'=>'Complete',
		); 
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	} 
	
	public function get_cycle_data_of_documents() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);
		$doc_type = $_POST['doc_type'];
		
		$state_data = $this->obj_comman->get_by('org_documents_req_list', array('doc_type' => $doc_type));
		$state_array = array();
		foreach ($state_data as $key => $value) {
			$arrayName = array(
				'id' => $value['id'],
          		'title' => $value['doc_name'],
          		'doc_type'=>$value['doc_type'],
	        );
			array_push($state_array,$arrayName);
		}
		//$org_district = $this->obj_comman->get('org_district');
		$org_geo_array = array();/*
		foreach ($org_district as $key => $value) {
			array_push($org_geo_array,$value['district_id'].'-'.$value['state_id']);
		}*/
		$arr_response['status'] = 200;
		$arr_response['geoData'] = $state_array;			
		$arr_response['orgGeoData'] = $org_geo_array;
		$arr_response['message'] = 'Successfully';			
	    echo json_encode($arr_response);
    }
	
	public function post_cycle_data(){
		//echo 'ok';
		$arr_response = array('status' => 500);	
		 //var_dump($_POST);die;
		$project_id = $_POST['project_id'];
		$donor_list = $_POST['donor_list'];
		$cycle_list = $_POST['cycle_list'];
		$org_id = $_POST['org_id'];
		$superngo_id = $_POST['superngo_id'];
		$org_staff_id = $_POST['org_staff_id'];
		$org_task_id = $_POST['org_task_id'];
		$ngo_id = $_POST['ngo_id'];
		$project_start_date=$_POST['project_start_date']; 
		$project_end_date= $_POST['project_end_date'];
		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		$data1 = array(
			'additional_json' => $additional_json,
			'project_id'=>$project_id,
			'last_updated_date'=>date('Y-m-d H:i:s'),
			
		);
		//var_dump($_POST);die;
		//var_dump($additional_json);
		$return_val1 = $this->db->update('org_tasks',$data1,array('org_task_id' => $org_task_id));
		
		$data_project = array(
			'project_start_date' => $_POST['project_start_date'],
			'project_end_date' => $_POST['project_end_date'],
			'cycle_file_upload' => $_POST['cycle_file_upload'],
			'cycle_file_upload_actual' => $_POST['cycle_file_upload_actual'],
			'title' => $_POST['update_project_name'],
		);
		
		$return_val = $this->db->update('project',$data_project,array('id'=>$project_id));
		//var_dump($data_project);die;
		if($donor_list !=''){
			foreach($donor_list as $value){
				$data2 = array(
					'project_id' => $project_id ,
					'select_donor' => $value['select_donor'],
					'donor_amount' => $value['donor_amount'],
					'status' => 'New',
					'ngo_id' => $ngo_id,
					'org_id' => $org_id,
					'created_date' => date('Y-m-d H:i:s'),
				);
				//var_dump($data2);
				$result2 = $this->db->insert('project_donors', $data2);
			}
		}else{}
			
		if($cycle_list !=''){
			$i=0;
			foreach($cycle_list as $value){
				$i++;
				$data3 = array(
					'project_id' => $project_id ,
					'org_id' => $org_id ,
					'superngo_id' => $superngo_id ,
					'org_staff_id' => $org_staff_id ,
					'cycle_name' => $value['cycle_name'],
					'cycle_start_date1' => $value['cycle_start_date1'],
					'cycle_end_date2' => date('Y-m-d'),
					'is_payment' => $value['is_payment'],
					'donor_dropdown' => $value['donor_dropdown'],
					'donor_dropdown_id' => $value['donor_dropdown_id'],
					'cycle_donor_amount' => $value['cycle_donor_amount'],
					'ngo_payment' => $value['ngo_payment'],
					'ngo_doc' => $value['ngo_doc'],
					'csr_doc' => $value['csr_doc'],
					'created_time' => date('Y-m-d H:i:s'),
					'cycle_status' => 'New',
					'is_completed'=>'no',
					'no_of_cycle'=>$i,
						
				);
				$result3 = $this->db->insert('project_cycle_details', $data3);
				$project_cycle_id = $this->db->insert_id();
				//var_dump($project_cycle_id);die;
				$ngo_doc=$value['ngo_doc'];
				$rec=(explode(",",$ngo_doc));
				//var_dump($project_id);die();
				$project_id=$_POST['project_id'];
				//var_dump($project_id);
				foreach($rec as $val){
					//var_dump($val);
					$data4=array(
						'document_name'=>$val,
						'document_updated_date' => date('Y-m-d H:i:s'),
						'document_type'=>'ngo_document_list',
						'project_id' => $project_id,
						'project_cycle_id' => $project_cycle_id,

					);
					$result4 = $this->db->insert('project_document', $data4);
				}
				$csr_doc=$value['csr_doc'];
				$rec=(explode(",",$csr_doc));
				foreach($rec as $val1){
					//var_dump($val1);
					$data5=array(
						'document_name'=>$val1,
						'document_updated_date' => date('Y-m-d H:i:s'),
						'document_type'=>'csr_document_list',
						'project_id' => $project_id,
						'project_cycle_id' => $project_cycle_id,
					);
					$result5 = $this->db->insert('project_document', $data5);
				}
				$ngo_payment=$value['ngo_payment'];
				if($ngo_payment!=''){  //var_dump($ngo_payment);
				$rec=(explode(",",$ngo_payment));
				foreach($rec as $val2){
					//var_dump($val2);
					$data6=array(
						'document_name'=>$val2,
						'document_updated_date' => date('Y-m-d H:i:s'),
						'document_type'=>'payment_processing_doc',
						'project_id' => $project_id,
						'project_cycle_id' => $project_cycle_id,
					);
					$result6 = $this->db->insert('project_document', $data6);
				}
			}
		}
		}else{}
		
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
		
	}
	
	public function save_cycle_data(){
		
		$arr_response = array('status' => 500);	
		//var_dump($_POST);die;
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		$org_task_id=$_POST['org_task_id'];
			$data_task = array(
			'comments' => $_POST['comments'],
			'additional_json' => $additional_json,
			'status' => 'In progress',
			'last_updated_date'=>date('Y-m-d H:i:s'),

		); 
		
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		
		
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
		
	}
	public function save_cycle_data1(){
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		
		$org_task_id=$_POST['org_task_id'];
		$project_id=$_POST['project_id'];
			$data = array(
			'additional_json' => $additional_json,
			'project_id'=>$project_id,
			'status' => 'In progress',
			'last_updated_date'=>date('Y-m-d H:i:s'),

		); 
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	public function change_status_cycle_completion(){
		$arr_response = array('status' => 500);	
		//var_dump($_POST);die;
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		$org_task_id=$_POST['org_task_id'];
		$project_cycle_id=$_POST['project_cycle_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$ngo_id=$_POST['ngo_id'];
		$is_completed='';
		$project_id=$_POST['project_id'];
		//$comments=$_POST['comments'];
		$data = array(
			'is_completed'=>'yes',
		);
			
		$db_result2 = $this->db->update('project_cycle_details',$data,array('project_cycle_id' => $project_cycle_id));

		$data2 = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'project_id'=>$project_id,
			'last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val = $this->db->update('org_tasks',$data2,array('org_task_id' => $org_task_id));
		
		$sql1="SELECT * FROM `project_cycle_details` WHERE `project_id` =$project_id AND `is_completed`='no' ORDER BY project_cycle_id";
		$db_result1 = $this->db->query($sql1)->result_array();
		if($db_result1){
			$is_cycle_start='yes';
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'is_cycle_start' => $is_cycle_start));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
				
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $row->task_position,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'project_id' => $project_id,
						'last_updated_date'=>date('Y-m-d H:i:s'),
										
					);
					//var_dump($data1);die;
					$return_val=$this->db->insert('org_tasks', $data1);
					$org_task_id = $this->db->insert_id();
					//var_dump($return_val);
				}
			}
			if($org_task_id){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}

		$arr_response['status'] = 200;
		$arr_response['message'] = 'Successfully submitted';
	
		echo json_encode($arr_response);
	}
	
	public function send_notification_by_ngo_doc_request(){
		$arr_response = array('status' => 500);	
		//var_dump($_POST);die;
		$org_task_id=$_POST['org_task_id'];
		$document_type=$_POST['document_type'];
		$project_cycle_id=$_POST['project_cycle_id'];
		$project_document_id=$_POST['project_document_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$ngo_id=$_POST['ngo_id'];
		$project_id=$_POST['project_id'];
		$ngo_cycle_detail_url =	base_url().'ngo/project/project_cycle_detail?id='.$project_id;
		//$ngo_cycle_detail_url= "/ngo/project/project_cycle_detail?id=$project_id";
		
		$data2 = array(
			'status' => 'Ngo Document Request',
			);
		$return_val = $this->db->update('org_tasks',$data2,array('org_task_id' => $org_task_id));
			
		$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
		$result_3 = $this->db->query($sql_3);
		if($result_3 && $result_3->num_rows()){
			$org_data = $result_3->result();
			$org_name = $org_data[0]->org_name;
		}else{
			$org_name = '';
		}
		$sql_4 = 'SELECT * FROM `project_cycle_details` WHERE `project_cycle_id` = '.$project_cycle_id ;
		$result_4 = $this->db->query($sql_4);
		if($result_4 && $result_4->num_rows()){
			$cycle_data = $result_4->result();
			$cycle_name = $cycle_data[0]->cycle_name;
			$no_of_cycle = $cycle_data[0]->no_of_cycle;
			//var_dump($no_of_cycle);
			
		}else{
			$no_of_cycle ='';
			$cycle_name = '';
		}
		$sql_5 = "SELECT * FROM `project_document` WHERE `project_cycle_id`=$project_cycle_id and `document_type`='$document_type'";
		$arrayName= array();
		$arraydata = array();
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$project_document_data = $result_5->result();
			foreach($project_document_data as $val){
				$id=$val->id;
				$document_value=$val->document_value;
				$document_name=$val->document_name;
				if($document_value==''){
					$arrayName = array(
						'document_name' => $document_name=$val->document_name,
					);
					array_push($arraydata,$arrayName);
				}else{
					$document_name='';
				}
			}
			$result='';
			$i=0;
			if($arraydata){
				foreach($arraydata as $val1){
					$i++;
					$result .='['.$i.'] '. $val1['document_name'].', ';
					$document_name = rtrim($result, ", ");
				}
			}else{
				$document_name='';
			}
				
		}else{
			$document_name = '';
		}
		$desp= "$org_name is requesting you to upload the required document(s) for the current evaluation cycle($no_of_cycle): $document_name <br></br>Please upload these at the earliest.";
		
		//var_dump($d);die;
		$notification_title="Project Evaluation Document Request";
		$data1 = array(	
			'superngo_id' => $superngo_id,
			'ngo_id' => $ngo_id,
			'proposal_id' => $prop_id,
			'org_id' => $org_id,
			'project_id' => $project_id,
			'cycle_id' => $project_cycle_id,
			'org_task_id' => $org_task_id,
			'document_type' => $document_type,
			'created_date' => date('Y-m-d'),
			'created_time' => date('H:i:s'),
			'url'=>$ngo_cycle_detail_url,
			'status'=>'Pending',
			'title'=>$notification_title,
			'description' =>$desp,
			 		
			);
			//var_dump($data1);die;
			$return_val=$this->db->insert('ngo_notification', $data1);
			$notification_id = $this->db->insert_id();
			//var_dump($return_val);
			if($notification_id){
				$this->ngo_notification_send_email($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
			}
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Send Notification Successfully ';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	public function send_notification_by_payemnt_request(){
		$arr_response = array('status' => 500);	
		//var_dump($_POST);die;
		$org_task_id=$_POST['org_task_id'];
		$document_type=$_POST['document_type'];
		//var_dump($_POST);die;
		$project_cycle_id=$_POST['project_cycle_id'];
		$project_document_id=$_POST['project_document_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$ngo_id=$_POST['ngo_id'];
		$project_id=$_POST['project_id'];
		$ngo_cycle_detail_url =	base_url().'ngo/project/project_cycle_detail?id='.$project_id;
		$data2 = array(
			'status' => 'Ngo Payemnt Document Request',
			);
		//var_dump($data2);die;
		$return_val = $this->db->update('org_tasks',$data2,array('org_task_id' => $org_task_id));
			//var_dump($return_val);
		$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
		$result_3 = $this->db->query($sql_3);
		if($result_3 && $result_3->num_rows()){
			$org_data = $result_3->result();
			$org_name = $org_data[0]->org_name;
		}else{
			$org_name = '';
		}
		
		$sql_4 = 'SELECT * FROM `project_cycle_details` WHERE `project_cycle_id` = '.$project_cycle_id ;
		$result_4 = $this->db->query($sql_4);
		if($result_4 && $result_4->num_rows()){
			$cycle_data = $result_4->result();
			$cycle_name = $cycle_data[0]->cycle_name;
			$no_of_cycle = $cycle_data[0]->no_of_cycle;
			//var_dump($no_of_cycle);
		}else{
			$no_of_cycle = '';
			$cycle_name = '';
		}
		$sql_5 = "SELECT * FROM `project_document` WHERE `project_cycle_id`=$project_cycle_id and `document_type`='$document_type'";
		$arrayName= array();
		$arraydata = array();
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$project_document_data = $result_5->result();
			foreach($project_document_data as $val){
				$id=$val->id;
				$document_value=$val->document_value;
				$document_name=$val->document_name;
				if($document_value==''){
					$arrayName = array(
						'document_name' => $document_name=$val->document_name,
					);
					array_push($arraydata,$arrayName);
				}else{
					$document_name='';
				}
				 
			}
			$result='';
			$i=0;
			if($arraydata){
				foreach($arraydata as $val1){
					$i++;
					$result .='['.$i.'] ' . $val1['document_name'].', ';
					$document_name = rtrim($result, ", ");
				}
			}else{
				$document_name='';
			}
		}else{
			$document_name = '';
		}
		$desp= "$org_name is requesting you to upload the required document(s) for the current evaluation cycle($no_of_cycle): $document_name <br></br>Please upload these at the earliest.";
		$notification_title="Project Payment Document Request";
		$data1 = array(	
			'superngo_id' => $superngo_id,
			'ngo_id' => $ngo_id,
			'proposal_id' => $prop_id,
			'org_id' => $org_id,
			'project_id' => $project_id,
			'cycle_id' => $project_cycle_id,
			'org_task_id' => $org_task_id,
			'document_type' => $document_type,
			'created_date' => date('Y-m-d'),
			'created_time' => date('H:i:s'),
			'url'=>$ngo_cycle_detail_url,
			'status'=>'Pending',
			'title'=>$notification_title,
			'description' =>$desp,
			 		
			);
			//var_dump($data1);die;
			$return_val=$this->db->insert('ngo_notification', $data1);
			$notification_id = $this->db->insert_id();
			//var_dump($return_val);
			if($notification_id){
				$this->ngo_notification_send_email($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
			}
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Send Notification Successfully ';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	
	
	public function ngo_notification_send_email($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title){
		
		$sql_1 = 'SELECT id,brand_name FROM `superngo` WHERE `id` ='.$superngo_id;
		$result_1 = $this->db->query($sql_1);
		if($result_1 && $result_1->num_rows()){
			$superngo_data = $result_1->result();
			$brand_name = $superngo_data[0]->brand_name;
		}else{
			$brand_name = 0;
		}
		if($prop_id){
			if($project_id>0){
				$sql_2 = 'SELECT title,id FROM `project` WHERE `id` ='.$project_id;
				$p_name='Project';
			}else{
				$sql_2 = 'SELECT title,prop_id FROM `proposal` WHERE `prop_id` ='.$prop_id;
				$p_name='Proposal';
				
			}
			$result_2 = $this->db->query($sql_2);
				if($result_2 && $result_2->num_rows()){
					$project_data = $result_2->result();
					$title = $project_data[0]->title;	
				}else{
					$project_data='';
					$title = 0;
				}
		}
		
		$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
		$result_3 = $this->db->query($sql_3);
		if($result_3 && $result_3->num_rows()){
			$org_data = $result_3->result();
			$org_name = $org_data[0]->org_name;
		}else{
			$org_name = '';
		}
		
		$sql_4 = 'SELECT * FROM `org_tasks` WHERE `org_task_id` = '.$org_task_id ;
		$result_4 = $this->db->query($sql_4);
		if($result_4 && $result_4->num_rows()){
			$org_tasks_data = $result_4->result();
			$org_staff_id = $org_tasks_data[0]->org_staff_id;
					
			
		}else{
			$org_staff_id = 0;
			
		}
		$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id ;
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$staff_data = $result_5->result();
			$org_staff_name = $staff_data[0]->first_name.' '.$staff_data[0]->last_name;
			$org_staff_email = $staff_data[0]->staff_email;
			//var_dump($staff_data);
		}else{
			$staff_data = '';
			$staff_name = '';
			$staff_email = '';
		}
		
		$sql_6 = 'SELECT * FROM `ngo` WHERE `id` = '.$ngo_id ;
		$result_6 = $this->db->query($sql_6);
		if($result_6 && $result_6->num_rows()){
			$ngo_data = $result_6->result();
			$ngo_name = $ngo_data[0]->legal_name;
			$staff_id = $ngo_data[0]->staff_id;
			
		}else{
			$ngo_name = '';
			$staff_id = '';
			$ngo_data = '';
		}
		
		if($staff_id){ 
			$sql_7 = 'SELECT * FROM `ngo_staff_account` WHERE `ngo_staff_id` ='.$staff_id ;
			$result_7 = $this->db->query($sql_7);
			if($result_7 && $result_7->num_rows()){
				$ngo_staff_account_data = $result_7->result();
				$ngo_staff_name = $ngo_staff_account_data[0]->first_name.' '.$ngo_staff_account_data[0]->last_name;
				$ngo_staff_email = $ngo_staff_account_data[0]->staff_email;
				
			}else{
				$ngo_staff_name = '';
				$ngo_staff_account_data = '';
			}
		}
		
		$message ='';
		$message .= 'Dear '.$ngo_staff_name.' <br>';
		$message .= '<p>'.$org_staff_name.' from '.$org_name.' has sent you a notification regarding your "'.$p_name.'" '.$title.'</p><br>';
		$message .= '<div>Notification: '.$notification_title.'</div>';
		$message .= '<div>'.$p_name.': '.$title.'</div>';
		$message .= '<div>Details: '.$desp.'</div><br><br>';
		$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		//$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		
		$message .= '<a href="'.base_url().'ngo/project/detail?id='.$project_id.'">View Notification</a><br>'; 
		$message .= '<p>Regards,</p>';
		$message .= '<span>Team Compass</span>';
		//print_r($ngo_staff_email);
		//print_r($message);
		
		//die;	
		
		$this->load->model('Email_model', 'obj_email', TRUE);
		$array = array(
			'subject' =>''.$org_name. '  has sent you a notification regarding your  '. $title.'',
			'msg' => $message,
			'to' => $ngo_staff_email,
			'to_name' => $brand_name,
		);
		
		//$this->obj_email->send_mail_in_ci($data);
		$this->obj_email->send_mail_in_sendinblue($array);
	}
	
	
	
	
	
}
	



