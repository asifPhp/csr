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
		//var_dump($return_val);
		$data['is_permitted']=$return_val;
		 if($return_val['is_other1']){
	    	$data['is_other1'] = 'yes';
		}
	    if($return_val['is_other2']){
	    	$data['is_other2'] = 'yes';
		}if($return_val['is_other3']){
	    	$data['is_other3'] = 'yes';
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
			
			if($status == 'New' ){
				$data['status'] = 'New';
				$status = 'New';
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
					$where .= ' AND status != "Completed" AND status !="NGO Revision" AND status !="Task Revision" AND status !="NGO Document Request"' ;
				}
				
			}else if($status == 'Completed' ){
				$data['status'] = 'Completed';
				$status = 'Completed';
				$where .= ' AND status = "Completed" ';
			}else if($status == 'hold' ){
				$data['status'] = 'hold';
				$status = 'hold';
				$where .= ' AND status = "NGO Revision" OR status = "Task Revision" OR status ="NGO Document Request"';
			}else{
				
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
			$data['status'] = 'New';
			$status = 'New';
			$where .= ' AND status != "Completed" AND status !="NGO Revision" AND status !="Task Revision" AND status !="NGO Document Request"' ;
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
				$project_id = '';
				$proposal_title_org = '';
				if($row->prop_id){
					$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$row->prop_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$prop_name = ($db_result1[0]['title']);
						$project_id = ($db_result1[0]['new_prop_id']);
						$proposal_title_org = ($db_result1[0]['proposal_title_org']);
					}
				}
				//var_dump($project_id);
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
						'proposal_title_org'=> $proposal_title_org,
						'project_id'=> $project_id,
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
									$where .= ' AND status != "Completed" AND status !="NGO Revision" AND status !="Task Revision" AND status !="NGO Document Request"' ;
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
					$where .= ' AND status != "Completed" ';
				}
				
			}	
			else if($status=='Completed'){
				$data['status'] = 'Completed';
				$status = 'Completed';
				$where .= ' AND status = "Completed" ';
			}
			else if($status=='hold'){
				$data['status'] = 'hold';
				$status = 'hold';
				$where .= ' AND status = "NGO Revision" OR status="Task Revision" OR status ="NGO Document Request"';
			}else{
				$where .= ' AND status != "Completed" AND status !="NGO Revision" AND status !="Task Revision" AND status !="NGO Document Request"' ;
			}
			//var_dump($where);
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
			$where .= ' AND status != "Completed" AND status !="NGO Revision" AND status !="Task Revision" AND status !="NGO Document Request"' ;
		}
		
		//var_dump($where);
		
		$sql="SELECT * FROM `org_tasks` WHERE `org_id` = ".$org_id."  AND `org_staff_id` = ".$staff_id." " .$where. "  ORDER BY `org_tasks`.`created_time` DESC";
		$db_result = $this->db->query($sql);
		
		
		$data_temp = array();
        $data_value = array();
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
                if (!array_key_exists($row->org_task_id, $data_temp)) {
                    $data_temp[$row->org_task_id] = array();
                }
				$prop_name = '';
				$proposal_title_org = '';
				$project_id = '';
				if($row->prop_id){
					$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$row->prop_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$prop_name = ($db_result1[0]['title']);
						$project_id = ($db_result1[0]['new_prop_id']);
						$proposal_title_org = ($db_result1[0]['proposal_title_org']);
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
						'proposal_title_org'=> $proposal_title_org,
						'project_id'=> $project_id,
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
		//var_dump($_POST);
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
		$assigned_to='';
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		if($return_val){
			$data['is_permitted']=$return_val;
			if($return_val['is_edit']){
				$data['edit_url'] = base_url().'organisation/task/manage';
			}
			if($return_val['is_add']){
				$data['add_url'] = base_url().'organisation/task/manage';
			}if($return_val['is_remove']){
				$data['is_remove'] = true;
			}
		}
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();
		
		$org_id = $this->session->userdata('org_id');
		$data['heading'] = 'Task Detail:hgh ';
		
		$sql1="SELECT * FROM `org_staff_account` WHERE `staff_status` = 'Active' AND `org_id` = ".$org_id."";
		$data['org_users'] = $this->db->query($sql1)->result_array();
		$data['assigned_to'] = $data['org_users'][0]['first_name'] .' '.$data['org_users'][0]['last_name'];
		
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
				$data['org_tasks_data'] = $db_result->result();
				foreach ($db_result->result() as $row) {
					//var_dump($row);
					if (!array_key_exists($row->org_task_id, $data_temp)) {
						$data_temp[$row->org_task_id] = array();
						$ngo_id=$row->ngo_id;
						$project_id=$row->project_id;
					}
					$prop_name = '';
					$new_prop_id=0;
					if($row->superngo_id){
						$superngo_id=$row->superngo_id;
						$data['superngo_data'] = $this->obj_comman->get_by('superngo',array('id'=>$superngo_id),false,true);
						//var_dump($data['superngo_data']);
					}else{
						$data['superngo_data'] ='';
					}
					if($row->prop_id){
						$prop_id=$row->prop_id;
						//$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$prop_id."";
						$sql1="SELECT *, 
									(SELECT name FROM admin_category WHERE id=proposal.focus_category) AS 'admin_category' ,
									(SELECT name FROM admin_subcategory WHERE id=proposal.focus_subcategory) AS 'admin_subcategory',
									(SELECT registration_detail FROM ngo WHERE id=proposal.ngo_id) AS 'registration_detail',
									(SELECT category_array FROM ngo WHERE id=proposal.ngo_id) AS 'category_array', 
									(SELECT brand_name FROM superngo WHERE id=proposal.superngo_id) AS 'brand_name',
									(select legal_name from ngo where id=proposal.ngo_id) as 'ngo' FROM proposal
									WHERE proposal.prop_id=$prop_id" ;
									
						
						$data['prop_data'] = $this->db->query($sql1)->result_array();
						//var_dump($data['prop_data']);
						if($data['prop_data']){
							$prop_name = ($data['prop_data'][0]['proposal_title_org']);
							$new_prop_id = ($data['prop_data'][0]['new_prop_id']);
		
						}
						if($data['prop_data']){
							if($data['prop_data'][0]['gc_id']){
								$gc_id=$data['prop_data'][0]['gc_id'];
								$sql_gc_ticket="SELECT upload_grand_ticket_value,upload_grand_ticket_actual FROM gc_ticket WHERE prop_id=$prop_id AND  gc_id=$gc_id";
								$data['gc_data'] = $this->db->query($sql_gc_ticket)->result_array();
								//var_dump($data['gc_data']);
							}else{
								$data['gc_data']='';
							}	
						}
						
						
						
						$sql="select *,(select org_name from organisation where org_id=proposal.organisation_id) as 'organisation',
							(select legal_name from ngo where id=proposal.ngo_id) as 'ngo' from proposal where prop_id=$prop_id AND is_deleted=0";
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
							
						$org_district = $this->obj_comman->get_query("select state_id, (select name from admin_states where id=ngo_district.state_id) as 'state_name' from ngo_district where prop_id=$prop_id group by state_id");
						foreach ($org_district as $key => $value) {
							$state_id=$value['state_id'];
							$sql="select district_id,(select name from admin_district where id=ngo_district.district_id) as 'district_name' from ngo_district where prop_id=$prop_id AND state_id=$state_id";

							$district = $this->obj_comman->get_query($sql);
							$org_district[$key]['district']=$district;
						}
						$data['org_geo_location_data']=$org_district;
					}	
					//var_dump($row->prop_id);die;
					$legal_name='';					
					$entity_code='';					
					if($ngo_id){
						$sql2="SELECT legal_name,code,id FROM `ngo` WHERE `id` =  ".$ngo_id."";
						$db_result2 = $this->db->query($sql2)->result_array();
						if($db_result2){
							$legal_name = $db_result2[0]['legal_name'];
							$entity_code = $db_result2[0]['code'];
							//var_dump($entity_code);
							$sql2="SELECT status FROM `org_ngo_review_status` WHERE `ngo_id` = ".$ngo_id." ";
							$data['org_ngo_review_status_data'] = $this->db->query($sql2)->result_array();	
							if($data['org_ngo_review_status_data']){}else{
								$data['org_ngo_review_status_data']='';
							}
							
							$org_district = $this->obj_comman->get_query("select state_id, (select name from admin_states where id=ngo_district.state_id) as 'state_name' from ngo_district where ngo_id=$ngo_id group by state_id");
							foreach ($org_district as $key => $value) {
								$state_id=$value['state_id'];
								$sql="select district_id,(select name from admin_district where id=ngo_district.district_id) as 'district_name' from ngo_district where ngo_id=$ngo_id AND state_id=$state_id";

								$district = $this->obj_comman->get_query($sql);
								$org_district[$key]['district']=$district;
							}
							$data['ngo_geographies_data']=$org_district;
						
						}
						
						$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$ngo_id),false,true);	
						$data['edit_hide']='yes';
						$data['page_heading_disp']='no';
						$data['hide_two_row']='yes';
						$data['page_splite']='yes';
						$data['page_col_md']='col-md-12';
						$data['ngo_notification'] ='';
						$data['pro_ngo_hide'] ='yes';
						$data['project_detail_content_hide_left'] ='<!--';
						$data['project_detail_content_hide_right'] ='-->';
						$data['prop_id']=$prop_id;
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
					/*Start Projhect section */
					if($row->project_id){
						$sql1="SELECT * FROM `project` WHERE `id` =  ".$row->project_id."";
						$data['sql_query'] = $sql1;
						$data['edit_button_hide'] = 'yes';
						$data['project_list'] = $this->db->query($sql1)->result_array();
						//var_dump($data['project_list']);
						if($data['project_list']){
							$title = ($data['project_list'][0]['title']);
							$pject_ngo_id = ($data['project_list'][0]['ngo_id']);
							$pject_superngo_id = ($data['project_list'][0]['superngo_id']);
							//var_dump($title);
						}
						if($pject_ngo_id){
							$sql1="SELECT legal_name,id,code,registration_detail FROM `ngo` WHERE `id` =".$pject_ngo_id ;
							$result1 = $this->db->query($sql1); 
							if ($result1 && $result1->num_rows() > 0){
								$data['project_ngo_data'] = $result1->result();
							}else{
								$data['project_ngo_data'] ='';
							}
						}
						
						if($pject_superngo_id){
							$sql1="SELECT * FROM `superngo` WHERE `id` =  ".$pject_superngo_id."";
							$data['project_superngo_data'] = $this->db->query($sql1)->result_array();
							
						}
						
						$donor_data_value = array();
						$donor_data_temp = array();
						$sql3="SELECT * FROM `project_donors` WHERE `project_id` =".$project_id;
							
						$result3 = $this->db->query($sql3); 
						if ($result3 && $result3->num_rows() > 0){
							foreach ($result3->result() as $val) {
								//var_dump($val);
								$cycle_donor_amount_dis = 0;
								$allocate_cycle_donor_amount=0;
								$is_completed_cycle='';
								$cycle_donor_id=0;
								$main_donor_code='';
								$main_donor_id=$val->select_donor;
								if($main_donor_id){
										$sql_donor="SELECT legal_name,code FROM `donor` WHERE `donor_id` =".$main_donor_id;
										$db_donor_data = $this->db->query($sql_donor)->result_array();
										if($db_donor_data){
											$main_donor_code=$db_donor_data[0]['code'];
										}
								}
								
								$sql_cycle="SELECT * FROM `project_cycle_details` WHERE `project_id` =$project_id  AND `is_deleted`=0";
								$db_cycle_data = $this->db->query($sql_cycle)->result_array();
								
								if($db_cycle_data){
									foreach($db_cycle_data as $cycle_val){
										
										$project_cycle_id=$cycle_val['project_cycle_id'];
										$is_payment=$cycle_val['is_payment'];
										$is_completed_cycle=$cycle_val['is_completed'];
										if($project_cycle_id and $is_payment=='yes'){
											$sql_cycle_donor="SELECT * FROM `project_cycle_donor_details` WHERE `project_id` =$project_id AND project_cycle_id=$project_cycle_id " ;
											$db_cycle_donor_data = $this->db->query($sql_cycle_donor)->result_array();
											if($db_cycle_donor_data){
												foreach($db_cycle_donor_data as $cycle_donor_val){
													$cycle_donor_id=$cycle_donor_val['id'];
													$cycle_donor_amt=$cycle_donor_val['cycle_donor_amount'];
													if($cycle_donor_val['donor_dropdown_id']==$val->select_donor){
														$allocate_cycle_donor_amount=((int)$cycle_donor_amt + (int)$allocate_cycle_donor_amount);
													}
													//var_dump($allocate_cycle_donor_amount);
													if($is_completed_cycle=='yes'){
														if($cycle_donor_val['donor_dropdown_id']==$val->select_donor){
															$cycle_donor_amount_dis=((int)$cycle_donor_amt + (int)$cycle_donor_amount_dis);
														}
													}
												}
											}
										}
									}
								}
								if (!array_key_exists($val->project_donor_id, $donor_data_temp)) {
									$donor_data_temp[$val->project_donor_id] = array();
								}
								if (array_key_exists($val->project_donor_id, $donor_data_temp)) {
									$donor_data_temp[$val->project_donor_id] = array(
										'vendor_code' => $val->vendor_code ,
										'donor_amount' => $val->donor_amount ,
										'donor_id' => $val->select_donor,
										'ngo_id' => $val->ngo_id,
										'project_donor_id'=> $val->project_donor_id,
										'project_id'=> $project_id,
										'main_donor_code'=> $main_donor_code,
										
										'cycle_donor_amount' => $allocate_cycle_donor_amount,
										'cycle_donor_amount_dis' => $cycle_donor_amount_dis,
										'cycle_donor_id' => $cycle_donor_id,
										'pending'=> $allocate_cycle_donor_amount-$cycle_donor_amount_dis,
										
										
									);
									array_push($donor_data_value, $donor_data_temp[$val->project_donor_id]);
								}
								
							}
						}
						$data['donor_data'] = $donor_data_value;
					//$data['table_type'] = 'dataTables';
					//var_dump($project_id);
						$sql_cycle_data="SELECT * FROM `project_cycle_details` WHERE `project_id` =$project_id  AND is_completed='yes'  AND `is_deleted`=0 ORDER BY project_cycle_id DESC ";
						$data['project_cycle_details_data'] = $this->db->query($sql_cycle_data)->result_array(); 
						$sql_cycle_donor_data="SELECT * FROM `project_cycle_donor_details` WHERE `project_id` =$project_id ";
						$data['project_cycle_donor_details_data'] = $this->db->query($sql_cycle_donor_data)->result_array(); 
						// var_dump($data['project_cycle_donor_details_data']);
						 
						$sql_cycle_donor="SELECT project_donors.*,donor.legal_name,donor.code,project_cycle_donor_details.cycle_donor_amount,project_cycle_donor_details.donor_dropdown_id FROM `project_donors`
							INNER JOIN donor ON project_donors.select_donor=donor.donor_id
							LEFT JOIN project_cycle_donor_details ON project_donors.project_donor_id=project_cycle_donor_details.project_donor_id
							WHERE project_donors.project_id=$project_id AND project_donors.donor_amount>0";
						$data['project_cycle_donor_data'] = $this->db->query($sql_cycle_donor)->result_array(); 
						 
						//var_dump($data['project_cycle_donor_data']);
					
					}
					/*end  Project section */
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
							'entity_code'=> $entity_code,
							'ngo_id'=> $ngo_id,
							'prop_id'=> $row->prop_id,
							'prop_name'=> $prop_name,
							'new_prop_id'=> $new_prop_id,
							'created_date'=> $row->created_date,
							'created_time'=> $row->created_time,
							'status'=> $row->status,
							'due_date'=> $row->due_date,
							'comments'=> $row->comments,
							'view_file_name'=> $row->view_file_name,
							'additional_json'=> $row->additional_json,
							'project_id'=> $row->project_id,
							'task_type'=>$row->task_type,
							'title'=>$title,
							'last_updated_date'=>$row->last_updated_date,
							'requested_by'=>$row->requested_by,
							'requested_on'=>$row->requested_on,
							'requested_details'=>$row->requested_details,
							'project_cycle_id'=>$row->project_cycle_id,

						);
						array_push($data_value, $data_temp[$row->org_task_id]);
					}
				}
			}
			$data['data_value'] = $data_value;
			$data['table_type'] = 'dataTables';
			$data['heading'] = '';
			$data['current_task_data'] = '';
			//var_dump($org_id);
			
			$focal_point_array = array();
			
			$sql4="SELECT * FROM `organisation_roles` WHERE `is_deleted` = 0 ORDER BY `organisation_roles`.`role_name` ASC";
			$organisation_roles_data = $this->db->query($sql4)->result_array();
			//var_dump($organisation_roles_data);
			if($organisation_roles_data){
				foreach($organisation_roles_data as $val){
					$sql3="SELECT first_name,last_name,staff_id,staff_role_id FROM `org_staff_account` WHERE org_id=$org_id AND staff_status='Active' AND staff_role_id= ".$val['role_id']." ORDER BY `org_staff_account`.`first_name` ASC";
					$focal_point_data = $this->db->query($sql3)->result_array();
					
					if($focal_point_data){
						array_push($focal_point_array,$val);
						foreach($focal_point_data as $vals){
							array_push($focal_point_array,$vals);
						}
					}
				}
			}
			$sql_focal="SELECT org_staff_account.first_name,org_staff_account.last_name,org_assigner_mgmt.staff_id,org_assigner_mgmt.user_type 
						FROM `org_assigner_mgmt` 
						JOIN org_staff_account ON org_assigner_mgmt.staff_id=org_staff_account.staff_id
						WHERE org_assigner_mgmt.org_id=$org_id AND org_assigner_mgmt.ngo_id=$ngo_id AND org_assigner_mgmt.prop_id=$prop_id";
					$data['new_focal_point_data'] = $this->db->query($sql_focal)->result_array();
				//var_dump($new_focal_point_data);
				$data['sql_query1'] = '';
			//var_dump($focal_point_array);
			$data['focal_point_data'] = $focal_point_array;
			$this->load->view('organisation/components/header');
			$this->load->view('organisation/components/menu',$data);
			//var_dump($data);
			$this->load->view('organisation/pages/mytask_detail',$data);
		}else{
			
			$this->load->view('organisation/components/header');
			$this->load->view('organisation/components/menu',$data);
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	

	/*SATART ORG1 SECTION  HERE ============================================================================ */
		/**start save section ----------------------------------------------------------- */
	/*save org1 data page "ngo desk review" */
	public function update_onsave_ngo_desk_review_page(){
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
				'proposal_status'=>'NGO Desk Review',
				'org_last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
		}
		if(isset($ngo_id) AND isset($ngo_id)){
			$return_val2 = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
			$data3 = array(
				 'org_id' => $org_id,
				 'ngo_id' => $ngo_id,
				 'status'=> 'NGO Desk Review',
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
	/*save org1 data  "focal point reaview " & "Project Documents"*/
	public function update_onsave_org1(){
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
		if(isset($_POST['project_update'])){
			$project_update = $_POST['project_update'];
			$project_id=$_POST['project_id'];
			$data3 = array(
				'title' => $project_update,
				'project_status' => 'Setup In Progress',
				'project_status_for_ngo' => 'Setup In Progress',
			);
			$return_val4 = $this->db->update('project',$data3,array('id' => $project_id));
		}
		if(isset($_POST['csr_list'])){
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
		}
		//var_dump($_POST);die;
				
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
	
	/**Org1 Suubmit Cycle Popup data to page "Create Report Cycle"*/
	public function submit_cycle_popup_data_by_create_report(){
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_id=$_POST['org_id'];
		$superngo_id= $_POST['superngo_id'];
		$ngo_id= $_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		$project_id=$_POST['project_id'];
		$org_staff_id=$_POST['org_staff_id'];
		//var_dump($project_id);
		if(isset($_POST['cycle_list'])){
			$cycle_list=$_POST['cycle_list'];
			if($cycle_list !=''){
				$i=0;
				$is_payment=$cycle_list[0]['is_payment'];
				$cycle_name=$cycle_list[0]['cycle_name'];
				//$payment_list=$cycle_list[0]['payment_list'];
				$sql5="SELECT project_cycle_id FROM `project_cycle_details` WHERE `project_id` =$project_id AND is_completed='no'  AND `is_deleted`=0" ;
				$result4 = $this->db->query($sql5);
				if($result4 && $result4->num_rows()){
					$num_rows=$result4->num_rows();
					$i=$num_rows+1;
				}else{
					$i++;
				}	
				
				//var_dump($i);die;
					//var_dump($value);
						if(isset($cycle_list[0]['payment_list'])){
							$payment_list=$cycle_list[0]['payment_list'];
							//var_dump($payment_list);die;
							$additional_json = json_encode($payment_list);
							//var_dump($additional_json);die;
						}
						
					//die;
					$data3 = array(
						//'additional_json' => $additional_json ,
						'project_id' => $project_id ,
						'org_id' => $org_id ,
						'superngo_id' => $superngo_id ,
						'org_staff_id' => $org_staff_id ,
						'cycle_name' => $cycle_list[0]['cycle_name'],
						'cycle_start_date1' =>  date('Y-m-d'),
						'cycle_end_date2' => $cycle_list[0]['cycle_start_date1'],
						'is_payment' => $cycle_list[0]['is_payment'],
						
						'ngo_doc' => $cycle_list[0]['ngo_doc'],
						'csr_doc' => $cycle_list[0]['csr_doc'],
						'created_time' => date('Y-m-d H:i:s'),
						'cycle_status' => 'New',
						'is_completed'=>'no',
						'no_of_cycle'=>$i,
							
					);
					$result3 = $this->db->insert('project_cycle_details', $data3);
					$project_cycle_id = $this->db->insert_id();
					
					
					if($project_cycle_id){
						if($is_payment=='yes'){	
							if(isset($cycle_list[0]['payment_list'])){
								$payment_list=$cycle_list[0]['payment_list'];
								foreach($payment_list as $value1){
									//var_dump($value1);
									$data2 = array(
										//'additional_json' => $additional_json ,
										'project_id' => $project_id ,
										'project_cycle_id' => $project_cycle_id ,
										'org_id' => $org_id ,
										'superngo_id' => $superngo_id ,
										'org_staff_id' => $org_staff_id ,
										'cycle_name' => $cycle_name,
										'cycle_start_date1' =>  date('Y-m-d'),
										'cycle_end_date2' => $cycle_list[0]['cycle_start_date1'],
										'is_payment' => $is_payment,
										'donor_dropdown_id' => $value1['select_donor'],
										'donor_dropdown' => $value1['select_donor_text'],
										'cycle_donor_amount' => $value1['donor_amount'],
										//'ngo_payment' => $value1['ngo_payment'],
														
										'created_time' => date('Y-m-d H:i:s'),
										'cycle_status' => 'New',
										'is_completed'=>'no',
										'no_of_cycle'=>$i,
											
									);
									$result2 = $this->db->insert('project_cycle_donor_details', $data2);
									$project_cycle_donor_id = $this->db->insert_id();
									
									if(isset($_POST['ngo_payment'])){
										$ngo_payment=$_POST['ngo_payment'];
										if($ngo_payment!=''){ 
											$rec=(explode(",",$ngo_payment));
											foreach($rec as $val5){
												//var_dump($val2);
												$data6=array(
													'document_name'=>$val5,
													'document_updated_date' => date('Y-m-d H:i:s'),
													'document_type'=>'payment_processing_doc',
													'project_id' => $project_id,
													'project_cycle_id' => $project_cycle_id,
												);
												//var_dump("test");
											//	var_dump($data6);
												$result6 = $this->db->insert('project_document', $data6);
											}
										}
									}
								}
							}
						}
					}
					
				if(isset($cycle_list[0]['ngo_doc'])){
					//var_dump($project_cycle_id);die;
					$ngo_doc=$cycle_list[0]['ngo_doc'];
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
				}
				
				if(isset($cycle_list[0]['csr_doc'])){
					$csr_doc=$cycle_list[0]['csr_doc'];
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
				}
			}
		}
		//var_dump($_POST);die;
				
		
		//$return_val4 = $this->db->update('org_tasks',$data4,array('org_task_id' => $org_task_id));
		//die;
		if ($project_cycle_id) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	/*Save org1 data by page "payment Conformation in pmp"*/
	public function update_onsave_payment_conformation(){
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_id=$_POST['org_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$ngo_id= $_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		$project_id=$_POST['project_id'];
		$project_id=$_POST['project_id'];
		
		$this_project_cycle_id=$_POST['this_project_cycle_id'];
		
		$additional_json = '';
		
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		if(isset($_POST['payment_list'])){
			$payment_list=$_POST['payment_list'];
			//var_dump($payment_list);die;
			if($payment_list){
				foreach ($payment_list as  $value) {
					//var_dump($value);
					$project_cycle_donor_details_id=$value['project_cycle_donor_details_id'];
					if($project_cycle_donor_details_id){
						
						$data_update = array(
							'donor_dropdown_id'=>$value['donor_dropdown_id'],
							'donor_dropdown'=>$value['donor_dropdown'],
							'cycle_donor_amount'=>$value['cycle_donor_amount'],
							'payment_proof'=>$value['payment_proof'],
							'payment_proof_actual'=>$value['payment_proof_actual'],
							
						);
						$return_val = $this->db->update('project_cycle_donor_details',$data_update,array('id' => $project_cycle_donor_details_id));
				   
					}else{
						
						$data_insert = array(
						
							'project_id'=>$project_id,
							'project_cycle_id'=>$this_project_cycle_id,
							'org_id'=>$org_id,
							'superngo_id'=>$superngo_id,
							'org_staff_id'=>$org_staff_id,
							
							'no_of_cycle'=>$_POST['this_no_of_cycle'],
							'cycle_name'=>$_POST['this_cycle_name'],
							'is_payment'=>$_POST['this_is_payment'],
							
							'donor_dropdown_id'=>$value['donor_dropdown_id'],
							'donor_dropdown'=>$value['donor_dropdown'],
							'cycle_donor_amount'=>$value['cycle_donor_amount'],
							'payment_proof'=>$value['payment_proof'],
							'payment_proof_actual'=>$value['payment_proof_actual'],
							
						);
						
						$return_val = $this->db->insert('project_cycle_donor_details',$data_insert);
				   
					}
				}
			}
		}
		//die;
		
		
		
		$data4 = array(
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
	
	/*save org1 data normal only additional_json with page "proposal desk review"  & "Ngo Desk Review Approval",& "Field Visit Approval" & "Begin Proposal Processing" & 
	"Field Visit Report" & "Leadership" & "SC Review" & "Bord Review"*/
	public function save_org1_normal_all_pages(){
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_id=$_POST['org_id'];
		$ngo_id= $_POST['ngo_id'];
		$prop_id=$_POST['prop_id'];
		$additional_json = '';
		
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		$data4 = array(
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
	/**End save section------------------------------------------------------------------------ */

	/**Start submmit section ---------------------------------------------------------------------- */
	
	/*submit org1 data "ngo desk review "*/
	public function change_status_onsubmit_by_ngo_desk_review(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		//org_staff_account	
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		
		if($prop_id){
			$data1=array(
			'proposal_status'=>'Desk Review Approval',
			'org_last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
		}
	//var_dump($_POST);die;
		if(isset($ngo_id) AND isset($org_id)){
			$return_val2 = $this->db->delete('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id));
				$data3 = array(
					'org_id' => $org_id,
					'ngo_id' => $ngo_id,
					'status'=> 'Desk Review Approval',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),				 
				); 
			$return_val3 = $this->db->insert('org_ngo_review_status',$data3);
		}

		$data_task = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'last_updated_date'=>date('Y-m-d H:i:s'),
		);
		//var_dump($data_task);die;
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		
		$sql2="SELECT org_task_id FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
		$db_result2 = $this->db->query($sql2)->result_array();
		if($db_result2){
			$org_task_id_post = ($db_result2[0]['org_task_id']);
			$data_task1 = array(
				//'additional_json' => $additional_json,
				'status' => 'Revision Ready',
					
			);
			//var_dump($data_task1);die;
			$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
			if($return_val1){
				$this->send_email_task_revised($org_task_id_post,$org_task_id,$prop_id,$org_id);
			}
									
		}else{
		//var_dump($_POST);die;
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
					$due_date_count=$row->due_date_count;
					//var_dump($due_date_count);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $org_task_list_id_increment,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'due_date'=>$due_date,
						'due_date_count'=>$due_date_count,
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'additional_json' => $additional_json,
						
					);
					$return_val=$this->db->insert('org_tasks', $data1);
					$org_task_id = $this->db->insert_id();	
				}
			}
			if($org_task_id){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}
			
			
		if($org_task_id){
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		}else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	/*submit org1 data "proposal desk review"*/
	public function change_status_onsubmit_by_proposal_desk_review(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
			
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		
		$data_task = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'last_updated_date'=>date('Y-m-d H:i:s'),
		);
		//var_dump($data_task);die;
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		
		$sql2="SELECT org_task_id FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
		$db_result2 = $this->db->query($sql2)->result_array();
		if($db_result2){
			$org_task_id_post = ($db_result2[0]['org_task_id']);
			$data_task1 = array(
				//'additional_json' => $additional_json,
				'status' => 'Revision Ready',
			);
			//var_dump($data_task1);die;
			$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
			if($return_val1){
				$this->send_email_task_revised($org_task_id_post,$org_task_id,$prop_id,$org_id);
			}
									
		}else{
		
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
					$due_date_count=$row->due_date_count;
					//var_dump($due_date_count);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $org_task_list_id_increment,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'due_date'=>$due_date,
						'due_date_count'=>$due_date_count,
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'additional_json' => $additional_json,
						
					);
					$return_val=$this->db->insert('org_tasks', $data1);
					$org_task_id = $this->db->insert_id();	
				}
			}
			if($org_task_id){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}
			
			
		if($org_task_id){
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		}else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	/*submit org1 data "field visit"*/
	public function change_status_onsubmit_by_field_visit(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
			
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		
		if($prop_id){
			$data1=array(
			'proposal_status'=>'Field Visit Approval',
			'org_last_updated_date'=>date('Y-m-d H:i:s'),
			);
			$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
		}
		$data_task = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'last_updated_date'=>date('Y-m-d H:i:s'),
		);
		//var_dump($data_task);die;
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		
		$sql2="SELECT org_task_id FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
		$db_result2 = $this->db->query($sql2)->result_array();
		if($db_result2){
			$org_task_id_post = ($db_result2[0]['org_task_id']);
			$data_task1 = array(
				//'additional_json' => $additional_json,
				'status' => 'Revision Ready',
				//'created_date' => date('Y-m-d'),
				//'created_time' => date('H:i:s'),
				
			);
			//var_dump($data_task1);die;
			$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
			if($return_val1){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
									
		}else{
		
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
					$due_date_count=$row->due_date_count;
					//var_dump($due_date_count);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					$fetch_data = $this->db->get_where('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'user_type'=>'approver'));
						//var_dump($fetch_data->result());
						$result_data=$fetch_data->result();
						$staff_id=$result_data[0]->staff_id;
						//var_dump($staff_id);
						//die;
							
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $org_task_list_id_increment,
						'org_staff_id'=> $staff_id,
						'created_date' => date('Y-m-d'),
						'due_date'=>$due_date,
						'due_date_count'=>$due_date_count,
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'additional_json' => $additional_json,
						
					);
					$return_val=$this->db->insert('org_tasks', $data1);
					$org_task_id = $this->db->insert_id();	
				}
			}
			if($org_task_id){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}
			
			
		if($org_task_id){
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		}else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}
	
	/*submit rog1 data by "Field vist Approval"*/
	public function change_status_onsubmit_by_field_visit_approval(){ 
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
		if(isset($_POST['url_type'])){
			$url_type=$_POST['url_type'];
		}
		$was_review_radion=$_POST['was_review_radion'];
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		$comments_request='';
		$comments_no_approval='';
		$additional_json = '';
		//var_dump($_POST['additional_json']);die;
		if(isset($_POST['additional_json'])){
			if(isset($_POST['additional_json'][0]['comments_request'])){
				$comments_request = $_POST['additional_json'][0]['comments_request'];
			}
			if(isset($_POST['additional_json'][0]['comments_no_approval'])){
				$comments_no_approval = $_POST['additional_json'][0]['comments_no_approval'];
				//var_dump($comments_no_approval);die;
			}
			$additional_json = json_encode($_POST['additional_json']);
		}
		//var_dump($additional_json);die;
		if($was_review_radion=='Yes'){
			$my_final=$_POST['my_final'];
			if($my_final=='my_request'){
				
				if($prop_id){
				$data1=array(
					'proposal_status'=>'NGO Revision',
					'proposal_status_for_ngo'=>'Revision Requested',
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
					'created_time' => date('H:i:s'),
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				
				if($url_type=='proposal'){	
					$ngo_cycle_detail_url='ngo/proposals/edit?id='.$prop_id;
					//$ngo_cycle_detail_url=NGO_URL.'ngo/proposals/edit?id='.$prop_id;
				}
				if($url_type=='entity'){	
					$ngo_cycle_detail_url='ngo/entity/edit?id='.$ngo_id;
					//$ngo_cycle_detail_url=NGO_URL.'ngo/entity/edit?id='.$ngo_id;
				}
				$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
				$result_3 = $this->db->query($sql_3);
				if($result_3 && $result_3->num_rows()){
					$org_data = $result_3->result();
					$org_name = $org_data[0]->org_name;
				}else{
					$org_data='';
					$org_name = '';
				}
				//var_dump($ngo_cycle_detail_url);die;
				$sql_4 = 'SELECT first_name,last_name FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id ;
				$result_4 = $this->db->query($sql_4);
				if($result_4 && $result_4->num_rows()){
					$org_staff_data = $result_4->result();
					$staff_name = $org_staff_data[0]->first_name .' '. $org_staff_data[0]->last_name;
								
				}else{
					$org_staff_data ='';
					$cycle_name = '';
				}
				
				
				if(isset($_POST['note_title'])){
						$note_title = $_POST['note_title'];
						if($note_title=='visit_approval'){
							
							$notification_title="Proposal Revision Request";
							$desp= "$staff_name from $org_name is requesting you to update/revise some data of this proposal as per the details below:<br>$comments_request";
						}
				}else{
					$desp= "$staff_name from $org_name is requesting you to update/revise some data of this proposal and/or the entity (for which this proposal was created) as per the details below:<br>$comments_request
					";
					$notification_title="Entity Revision Request";
				}
				//print_r($desp);die;
				
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
					'request_type' =>$url_type,
							
					);
					//var_dump($data1);die;			
					$return_val=$this->db->insert('ngo_notification', $data1);
					$notification_id = $this->db->insert_id();
					if($notification_id){
						if(isset($_POST['note_title'])){
							$note_title = $_POST['note_title'];
								if($note_title=='visit_approval'){
									$this->ngo_notification_send_email_by_begin_proposal($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
								}
						}else{
							$this->ngo_notification_send_email_by_desk_review_approval($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
						}
					}	
					
					
			}
			else if($my_final=='my_approve'){
				
				if($prop_id){
					$data1=array(
						'proposal_status'=>'Leadership Engagement',
						'org_last_updated_date'=>date('Y-m-d H:i:s'),
						);
					$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
				}
				//var_dump($data1);die;
				
				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				$org_task_list_id_increment = $org_task_list_id+1;
							
				$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
				$db_result2 = $this->db->query($sql2)->result_array();
				if($db_result2){
					$org_task_id_post = ($db_result2[0]['org_task_id']);
					$due_date_count = ($db_result2[0]['due_date_count']);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					$data_task1 = array(
						'additional_json' => $additional_json,
						'status' => 'Revision Ready',
						'created_date' => date('Y-m-d'),
						'due_date' => $due_date,
						'due_date_count' => $due_date_count,
						'created_time' => date('H:i:s'),
						'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					//var_dump($data_task1);die;
					$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
					//if($return_val1){
						//$this->task_created_send_email($org_task_id,$prop_id,$org_id);
					//}
				
				
				}else{
					//var_dump($org_task_list_id_increment);die;
					$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
					if ($db_result && $db_result->num_rows() > 0) {
						foreach ($db_result->result() as $row) {
							$due_date_count=$row->due_date_count;
							$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
							
							if(isset($_POST['note_title'])){
								$note_title = $_POST['note_title'];
								if($note_title=='visit_approval'){
									$fetch_data = $this->db->get_where('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'user_type'=>'normal'));
									//var_dump($fetch_data->result());
									$result_data=$fetch_data->result();
									$org_staff_id=$result_data[0]->staff_id;
								
								}
							}
							//var_dump($org_staff_id);
							$data1 = array(	
								'comments' => '',		
								'superngo_id' => $superngo_id,
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'org_task_list_id' => $org_task_list_id_increment,
								'org_staff_id'=> $org_staff_id,
								'created_date' => date('Y-m-d'),
								'due_date' => $due_date,
								'due_date_count' => $due_date_count,
								'created_time' => date('H:i:s'),
								'org_task_label' => $row->task_label,
								'task_type' => $row->task_type,
								'view_file_name' => $row->view_file_name,
								'project_id' => $project_id,					
								//'additional_json' => $additional_json,
								
							);
							$return_val=$this->db->insert('org_tasks', $data1);
							$org_task_id = $this->db->insert_id();	
						}
						
						/*if($org_task_id){
							$org_assigner_mgmt_data= array(	
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'staff_id'=> $org_staff_id,
								'user_type'=> 'normal',				
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data);
							
							$org_assigner_mgmt_data1= array(	
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'staff_id'=> $org_staff_id,
								'user_type'=> 'prposal normal',				
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data1);
						}*/

						if($org_task_id){
						$this->task_created_send_email($org_task_id,$prop_id,$org_id);
						}
						
					}
				}
						
			}
			else if($my_final=='my_recommend'){
				
				if($prop_id){
					$data1=array(
					'proposal_status'=>'Recommended for Rejection',
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
				
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$due_date_count=$row->due_date_count;
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $row->task_position,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
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
				//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Task Revision',
					'created_date' => date('Y-m-d'),
					'created_time' => date('H:i:s'),
					'last_updated_date'=>date('Y-m-d H:i:s'),
					
				);
					
				//var_dump($data_task);die;
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				$org_task_list_id_decrement = $org_task_list_id-1;
				
				$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_decrement AND prop_id=$prop_id";
					$db_result2 = $this->db->query($sql2)->result_array();
					if($db_result2){
						$org_task_id_pre = ($db_result2[0]['org_task_id']);
						$due_date_count= ($db_result2[0]['due_date_count']);
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
						$data_task1 = array(
							//'additional_json' => $additional_json,
							'status' => 'Needs Review',
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
							'created_time' => date('H:i:s'),
							'last_updated_date'=>date('Y-m-d H:i:s'),
							'requested_by'=>$org_staff_id,
							'requested_on'=>date('Y-m-d H:i:s'),
							'requested_details'=>$comments_no_approval,
						);
						
						$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_pre));
						if($return_val1){
							
							$this->send_email__task_revision_request($org_task_id_pre,$prop_id,$org_id,$org_staff_id,$ngo_id,$comments_no_approval);
						}
												
					}
		}
		//var_dump($org_task_id);
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}

	/*submit org1 data "desk review approval" & "" */
	public function change_status_onsubmit_by_ngo_desk_approval(){ 
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
		if(isset($_POST['url_type'])){
			$url_type=$_POST['url_type'];
		}
		$was_review_radion=$_POST['was_review_radion'];
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		$comments_request='';
		$comments_no_approval='';
		$additional_json = '';
		$focal_point_assign =0;
		///var_dump($_POST['additional_json']);die;
		if(isset($_POST['additional_json'])){
			if(isset($_POST['additional_json'][0]['comments_request'])){
				$comments_request = $_POST['additional_json'][0]['comments_request'];
			}
			if(isset($_POST['additional_json'][0]['comments_no_approval'])){
				$comments_no_approval = $_POST['additional_json'][0]['comments_no_approval'];
				//var_dump($comments_no_approval);die;
			}
			if(isset($_POST['additional_json'][0]['donor_dropdown_id'])){
				$focal_point_assign = $_POST['additional_json'][0]['donor_dropdown_id'];
				//var_dump($focal_point_assign);die;
			}
			$additional_json = json_encode($_POST['additional_json']);
		}
		//die;
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
					'created_time' => date('H:i:s'),
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				
				if($url_type=='entity'){	
					$ngo_cycle_detail_url='ngo/entity/edit?id='.$ngo_id;
					//$ngo_cycle_detail_url=NGO_URL.'ngo/entity/edit?id='.$ngo_id;
				}
				$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
				$result_3 = $this->db->query($sql_3);
				if($result_3 && $result_3->num_rows()){
					$org_data = $result_3->result();
					$org_name = $org_data[0]->org_name;
				}else{
					$org_data='';
					$org_name = '';
				}
				//var_dump($ngo_cycle_detail_url);die;
				$sql_4 = 'SELECT first_name,last_name FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id ;
				$result_4 = $this->db->query($sql_4);
				if($result_4 && $result_4->num_rows()){
					$org_staff_data = $result_4->result();
					$staff_name = $org_staff_data[0]->first_name .' '. $org_staff_data[0]->last_name;
								
				}else{
					$org_staff_data ='';
					$cycle_name = '';
				}
				$desp= "$staff_name from $org_name is requesting you to update/revise some data of this proposal and/or the entity (for which this proposal was created) as per the details below:<br>$comments_request
				";
				$notification_title="Entity Revision Request";
				
				//print_r($desp);die;
				
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
					'request_type' =>$url_type,
							
					);
					//var_dump($data1);die;			
					$return_val=$this->db->insert('ngo_notification', $data1);
					$notification_id = $this->db->insert_id();
					if($notification_id){
						if(isset($_POST['note_title'])){
							$note_title = $_POST['note_title'];
								if($note_title=='visit_approval'){
									$this->ngo_notification_send_email_by_begin_proposal($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
								}
						}else{
							$this->ngo_notification_send_email_by_desk_review_approval($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
						}
					}	
					
					
			}
			else if($my_final=='my_approve'){		
				if($prop_id){
					$proposal_status='';
					if(isset($_POST['proposal_status'])){
						$proposal_status=$_POST['proposal_status'];
							
					}else{
						$proposal_status='Proposal Desk Review';
					}
					$data1=array(
					'proposal_status'=>$proposal_status,
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
							
				$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
				$db_result2 = $this->db->query($sql2)->result_array();
				if($db_result2){
					$org_task_id_post = ($db_result2[0]['org_task_id']);
					$due_date_count = ($db_result2[0]['due_date_count']);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					$data_task1 = array(
						'additional_json' => $additional_json,
						'status' => 'Revision Ready',
						'created_date' => date('Y-m-d'),
						'due_date' => $due_date,
						'due_date_count' => $due_date_count,
						'created_time' => date('H:i:s'),
						'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					//var_dump($data_task1);die;
					$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
					//if($return_val1){
						//$this->task_created_send_email($org_task_id,$prop_id,$org_id);
					//}
				
				
				}else{
					//var_dump($org_task_list_id_increment);die;
					$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
					if ($db_result && $db_result->num_rows() > 0) {
						foreach ($db_result->result() as $row) {
							$due_date_count=$row->due_date_count;
							$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
							
							/*if(isset($_POST['note_title'])){
								$note_title = $_POST['note_title'];
								if($note_title=='visit_approval'){
									$fetch_data = $this->db->get_where('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'user_type'=>'normal'));
									//var_dump($fetch_data->result());
									$result_data=$fetch_data->result();
									$org_staff_id=$result_data[0]->staff_id;
								
								}
							}*/
							$data1 = array(	
								'comments' => '',		
								'superngo_id' => $superngo_id,
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'org_task_list_id' => $org_task_list_id_increment,
								'org_staff_id'=> $focal_point_assign,
								'created_date' => date('Y-m-d'),
								'due_date' => $due_date,
								'due_date_count' => $due_date_count,
								'created_time' => date('H:i:s'),
								'org_task_label' => $row->task_label,
								'task_type' => $row->task_type,
								'view_file_name' => $row->view_file_name,
								'project_id' => $project_id,					
								//'additional_json' => $additional_json,
								
							);
							$return_val=$this->db->insert('org_tasks', $data1);
							$org_task_id = $this->db->insert_id();	
						}
						
						if($org_task_id){
							$org_assigner_mgmt_data= array(	
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'staff_id'=> $focal_point_assign,
								'user_type'=> 'normal',				
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data);
							
							$org_assigner_mgmt_data1= array(	
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'staff_id'=> $focal_point_assign,
								'user_type'=> 'prposal normal',				
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data1);
						}

						if($org_task_id){
						$this->task_created_send_email($org_task_id,$prop_id,$org_id);
						}
						
					}
				}
						
			}
			else if($my_final=='my_recommend'){
				
				if($prop_id){
					$data1=array(
					'proposal_status'=>'Recommended for Rejection',
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
				$parent_id=$this->session->userdata('parent_id');
				if($parent_id==0){
					
				}else{
					$staff_sql="SELECT staff_id FROM org_staff_account WHERE staff_id=$parent_id";
					$staff_data_id = $this->db->query($staff_sql)->result_array(); 
					$org_staff_id=$staff_data_id[0]['staff_id'];
				}
				
				if ($db_result && $db_result->num_rows() > 0){
					foreach ($db_result->result() as $row) {
						$due_date_count=$row->due_date_count;
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $row->task_position,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
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
					$org_assigner_mgmt_data= array(	
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'staff_id'=> $org_staff_id,
						'user_type'=> 'normal',				
					);
					$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data);
					
					$org_assigner_mgmt_data1= array(	
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'staff_id'=> $org_staff_id,
						'user_type'=> 'prposal normal',				
					);
					$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data1);
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
			//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
			$data_task = array(
				'additional_json' => $additional_json,
				'status' => 'Task Revision',
				'created_date' => date('Y-m-d'),
				'created_time' => date('H:i:s'),
				'last_updated_date'=>date('Y-m-d H:i:s'),
				
			);
				
			//var_dump($data_task);die;
			$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
			$org_task_list_id_decrement = $org_task_list_id-1;
			
			$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_decrement AND prop_id=$prop_id";
				$db_result2 = $this->db->query($sql2)->result_array();
				if($db_result2){
					$org_task_id_pre = ($db_result2[0]['org_task_id']);
					$due_date_count= ($db_result2[0]['due_date_count']);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
					$data_task1 = array(
						//'additional_json' => $additional_json,
						'status' => 'Needs Review',
						'due_date' => $due_date,
						'due_date_count' => $due_date_count,
						'created_date' => date('Y-m-d'),
						'created_time' => date('H:i:s'),
						'last_updated_date'=>date('Y-m-d H:i:s'),
						'requested_by'=>$org_staff_id,
						'requested_on'=>date('Y-m-d H:i:s'),
						'requested_details'=>$comments_no_approval,
					);
					
					$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_pre));
					if($return_val1){
						
						$this->send_email__task_revision_request($org_task_id_pre,$prop_id,$org_id,$org_staff_id,$ngo_id,$comments_no_approval);
					}
											
				}
		}
		//var_dump($org_task_id);
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}
	/*submit org1 data "begin proposal"*/
	public function change_status_onsubmit_by_begin_proposal(){ 
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
		if(isset($_POST['url_type'])){
			$url_type=$_POST['url_type'];
		}
		$was_review_radion=$_POST['was_review_radion'];
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		$comments_request='';
		$additional_json = '';
		//var_dump($_POST['additional_json']);die;
		if(isset($_POST['additional_json'])){
			if(isset($_POST['additional_json'][0]['comments_request'])){
				$comments_request = $_POST['additional_json'][0]['comments_request'];
			}
			if(isset($_POST['additional_json'][0]['comments_no'])){
				$comments_no = $_POST['additional_json'][0]['comments_no'];
			}
			if(isset($_POST['additional_json'][0]['prop_update'])){
				$prop_update = $_POST['additional_json'][0]['prop_update'];
				if($prop_update!=''){
					$prop_data=array(
							'proposal_title_org'=>$prop_update,
							'org_last_updated_date'=>date('Y-m-d H:i:s'),
							);
					$return_val1 = $this->db->update('proposal',$prop_data,array('prop_id' => $prop_id));
				}
			}
			
			
			$additional_json = json_encode($_POST['additional_json']);
		}
		
		//var_dump($additional_json);die;
		if($was_review_radion=='Yes'){
			$my_final=$_POST['my_final'];
			if($my_final=='my_request'){
				
				if($prop_id){
				$data1=array(
					'proposal_status'=>'NGO Revision',
					'proposal_status_for_ngo'=>'Revision Requested',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
				}
				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'NGO Revision',
					'created_time' => date('H:i:s'),
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				
				if($url_type=='proposal'){	
					$ngo_cycle_detail_url='ngo/proposals/edit?id='.$prop_id;
					//$ngo_cycle_detail_url=NGO_URL.'ngo/proposals/edit?id='.$prop_id;
				}
				if($url_type=='entity'){	
					$ngo_cycle_detail_url='ngo/entity/edit?id='.$ngo_id;
					//$ngo_cycle_detail_url=NGO_URL.'ngo/entity/edit?id='.$ngo_id;
				}
				$sql_3 = 'SELECT org_name FROM `organisation` WHERE `org_id` = '.$org_id ;
				$result_3 = $this->db->query($sql_3);
				if($result_3 && $result_3->num_rows()){
					$org_data = $result_3->result();
					$org_name = $org_data[0]->org_name;
				}else{
					$org_data='';
					$org_name = '';
				}
				//var_dump($ngo_cycle_detail_url);die;
				$sql_4 = 'SELECT first_name,last_name FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id ;
				$result_4 = $this->db->query($sql_4);
				if($result_4 && $result_4->num_rows()){
					$org_staff_data = $result_4->result();
					$staff_name = $org_staff_data[0]->first_name .' '. $org_staff_data[0]->last_name;
								
				}else{
					$org_staff_data ='';
					$cycle_name = '';
				}
				
				$notification_title="Proposal Revision Request";
				$desp= "$staff_name from $org_name is requesting you to update/revise some data of this proposal as per the details below:<br><br>$comments_request";
					
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
					'request_type' =>$url_type,
							
					);
					//var_dump($data1);die;			
					$return_val=$this->db->insert('ngo_notification', $data1);
					$notification_id = $this->db->insert_id();
					if($notification_id){
						$this->ngo_notification_send_email_by_begin_proposal($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
					}
					
					
			}
			else if($my_final=='my_approve'){		
				if($prop_id){
					
					$data1=array(
					'proposal_status'=>'Field Visit',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
				}
				
				if(isset($_POST['additional_json'])){
					$additional_json=$_POST['additional_json'];
					//var_dump($additional_json);
					if(isset($_POST['additional_json'][0]['donor_dropdown_id1'])){
						$donor_dropdown_id1 = $_POST['additional_json'][0]['donor_dropdown_id1'];
						$this->db->delete('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'user_type'=>'normal'));
						if($donor_dropdown_id1){
							$data_1 = array(
								'org_id'=>$org_id,
								'prop_id'=>$prop_id,
								'ngo_id'=>$ngo_id,
								'user_type'=>'normal',
								'staff_id'=>$donor_dropdown_id1,
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $data_1);
						}
						if($donor_dropdown_id1){
							$this->db->delete('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'user_type'=>'prposal normal'));
							$data_1 = array(
								'org_id'=>$org_id,
								'prop_id'=>$prop_id,
								'ngo_id'=>$ngo_id,
								'user_type'=>'prposal normal',
								'staff_id'=>$donor_dropdown_id1,
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $data_1);
						}
					}
					
					if(isset($_POST['additional_json'][0]['donor_dropdown_id2'])){
						$donor_dropdown_id2 = $_POST['additional_json'][0]['donor_dropdown_id2'];
						if($donor_dropdown_id2){
							$data_2 = array(
								'org_id'=>$org_id,
								'prop_id'=>$prop_id,
								'ngo_id'=>$ngo_id,
								'user_type'=>'approver',
								'staff_id'=>$donor_dropdown_id2,
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $data_2);
						}
					}
					if(isset($_POST['additional_json'][0]['donor_dropdown_id3'])){
						$donor_dropdown_id3 = $_POST['additional_json'][0]['donor_dropdown_id3'];
						if($donor_dropdown_id3){
							$data_3 = array(
								'org_id'=>$org_id,
								'prop_id'=>$prop_id,
								'ngo_id'=>$ngo_id,
								'user_type'=>'field',
								'staff_id'=>$donor_dropdown_id3,
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $data_3);
						}
					}
					
				}
				if(isset($_POST['additional_json'])){
					if(isset($_POST['additional_json'][0]['comments_request'])){
						$comments_request = $_POST['additional_json'][0]['comments_request'];
					}
					$additional_json = json_encode($_POST['additional_json']);
				}

				
				//die;
				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				$org_task_list_id_increment = $org_task_list_id+1;
								
				$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
				$db_result2 = $this->db->query($sql2)->result_array();
				if($db_result2){
					$org_task_id_post = ($db_result2[0]['org_task_id']);
					$due_date_count = ($db_result2[0]['due_date_count']);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					$data_task1 = array(
						'additional_json' => $additional_json,
						'status' => 'Revision Ready',
						'created_date' => date('Y-m-d'),
						'due_date' => $due_date,
						'due_date_count' => $due_date_count,
						'created_time' => date('H:i:s'),
						'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					//var_dump($data_task1);die;
					$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
					if($return_val1){
						$this->task_created_send_email($org_task_id,$prop_id,$org_id);
					}
				
				
				}else{
					//var_dump($org_task_list_id_increment);die;
					$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
					if ($db_result && $db_result->num_rows() > 0) {
						foreach ($db_result->result() as $row) {
							$due_date_count=$row->due_date_count;
							$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
							
							$data1 = array(	
								'comments' => '',		
								'superngo_id' => $superngo_id,
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'org_task_list_id' => $org_task_list_id_increment,
								'org_staff_id'=> $donor_dropdown_id3,
								'created_date' => date('Y-m-d'),
								'due_date' => $due_date,
								'due_date_count' => $due_date_count,
								'created_time' => date('H:i:s'),
								'org_task_label' => $row->task_label,
								'task_type' => $row->task_type,
								'view_file_name' => $row->view_file_name,
								'project_id' => $project_id,					
								//'additional_json' => $additional_json,
								
							);
							$return_val=$this->db->insert('org_tasks', $data1);
							$org_task_id = $this->db->insert_id();	
						}
						if($org_task_id){
						$this->task_created_send_email($org_task_id,$prop_id,$org_id);
						}		
					}
				}
						
			}
			else if($my_final=='my_recommend'){
				
				if($prop_id){
					$data1=array(
					'proposal_status'=>'Recommended for Rejection',
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
				
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$due_date_count=$row->due_date_count;
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $row->task_position,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
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
				//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Task Revision',
					'created_date' => date('Y-m-d'),
					'created_time' => date('H:i:s'),
					'last_updated_date'=>date('Y-m-d H:i:s'),
					
				);
				
				//var_dump($data_task);die;
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				$org_task_list_id_decrement = $org_task_list_id-1;
				
				$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_decrement AND prop_id=$prop_id";
					$db_result2 = $this->db->query($sql2)->result_array();
					if($db_result2){
						$org_task_id_pre = ($db_result2[0]['org_task_id']);
						$due_date_count= ($db_result2[0]['due_date_count']);
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
						$data_task1 = array(
							//'additional_json' => $additional_json,
							'status' => 'Needs Review',
							'due_date' => $due_date,
							'created_date' => date('Y-m-d'),
							'created_time' => date('H:i:s'),
							'due_date_count' => $due_date_count,
							'last_updated_date'=>date('Y-m-d H:i:s'),
							'requested_by'=>$org_staff_id,
							'requested_on'=>date('Y-m-d H:i:s'),
							'requested_details'=>$comments_no,
						);
						
						$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_pre));
						if($return_val1){
							$this->send_email__task_revision_request($org_task_id_pre,$prop_id,$org_id,$org_staff_id,$ngo_id,$comments_no);
						}
												
					}
		}
		//var_dump($org_task_id);
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}

	/*submit org1 data "cycle create submit1"  */
	public function post_cycle_data_by_org1(){
		//echo 'ok';
		$arr_response = array('status' => 500);	
		//var_dump($_POST);die;
		$project_id = $_POST['project_id'];
		//$donor_list = $_POST['donor_list'];
		$cycle_list = $_POST['cycle_list'];
		$org_id = $_POST['org_id'];
		$superngo_id = $_POST['superngo_id'];
		$org_staff_id = $_POST['org_staff_id'];
		$org_task_id = $_POST['org_task_id'];
		$ngo_id = $_POST['ngo_id'];
		//$project_start_date=$_POST['project_start_date']; 
		//$project_end_date= $_POST['project_end_date'];
		//var_dump($cycle_list);die;	
		//$payment_list=$cycle_list
		$data_project = array(
			'project_status'   => 'Focal Point Review',
			'project_status_for_ngo'   => 'Cycle 1',
			//'project_status_for_ngo'   => 'New',
		);
		//var_dump($data_project);die;
		$return_val = $this->db->update('project',$data_project,array('id'=>$project_id));
						
		$payment_list='';
		if($cycle_list !=''){
			$i=0;
			foreach($cycle_list as $value){
				$i++;
				//var_dump($value);
					if(isset($value['payment_list'])){
						$payment_list=$value['payment_list'];
						//var_dump($payment_list);die;
						$additional_json = json_encode($payment_list);
						//var_dump($additional_json);die;
					}
					
				//die;
				$data3 = array(
					//'additional_json' => $additional_json ,
					'project_id' => $project_id ,
					'org_id' => $org_id ,
					'superngo_id' => $superngo_id ,
					'org_staff_id' => $org_staff_id ,
					'cycle_name' => $value['cycle_name'],
					'cycle_start_date1' => $value['cycle_start_date1'],
					'cycle_end_date2' => $value['cycle_end_date2'],
					'is_payment' => $value['is_payment'],
					
					'ngo_doc' => $value['ngo_doc'],
					'csr_doc' => $value['csr_doc'],
					'ngo_payment' => $value['ngo_payment'],
					'created_time' => date('Y-m-d H:i:s'),
					'cycle_status' => 'New',
					'is_completed'=>'no',
					'no_of_cycle'=>$i,
						
				);
				$result3 = $this->db->insert('project_cycle_details', $data3);
				$project_cycle_id = $this->db->insert_id();
				
				if($project_cycle_id){	
					if(isset($value['payment_list'])){
						$payment_list=$value['payment_list'];
						foreach($payment_list as $value1){
							//var_dump($value1);
							$data2 = array(
								//'additional_json' => $additional_json ,
								'project_id' => $project_id ,
								'project_cycle_id' => $project_cycle_id ,
								'org_id' => $org_id ,
								'superngo_id' => $superngo_id ,
								'org_staff_id' => $org_staff_id ,
								'cycle_name' => $value['cycle_name'],
								'cycle_start_date1' =>  date('Y-m-d'),
								'cycle_end_date2' => $value['cycle_start_date1'],
								'is_payment' => $value['is_payment'],
								'donor_dropdown_id' => $value1['donor_dropdown_id'],
								'project_donor_id' => $value1['project_donor_id'],
								'donor_dropdown' => $value1['donor_dropdown'],
								'cycle_donor_amount' => $value1['cycle_donor_amount'],
								'ngo_payment' => $value1['ngo_payment'],
												
								'created_time' => date('Y-m-d H:i:s'),
								'cycle_status' => 'New',
								'is_completed'=>'no',
								'no_of_cycle'=>$i,
									
							);
							$result2 = $this->db->insert('project_cycle_donor_details', $data2);
							$project_cycle_donor_id = $this->db->insert_id();
						
						}
					}
				}
				
				$ngo_payment=$value['ngo_payment'];
				if($ngo_payment!=''){  //var_dump($ngo_payment);
					$rec=(explode(",",$ngo_payment));
					foreach($rec as $val5){
						//var_dump($val2);
						$data6=array(
							'document_name'=>$val5,
							'document_updated_date' => date('Y-m-d H:i:s'),
							'document_type'=>'payment_processing_doc',
							'project_id' => $project_id,
							'project_cycle_id' => $project_cycle_id,
						);
						//var_dump("test");
					//	var_dump($data6);
						$result6 = $this->db->insert('project_document', $data6);
					}
				}
				
				
				
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
				
				
			}
			
		}else{}
		//die;
		
		
		if($result3) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
		
	}
	/** submit og1 data "cycle create submit2 by trigger" */
	
	public function change_status_onsubmit_by_cycle_creation_og1(){ 
		$arr_response = array('status' => 500);	
		//var_dump($_POST);die;
	   $org_task_id= $_POST['org_task_id'];
	   $org_task_list_id=$_POST['org_task_list_id'];
	   $org_id=$_POST['org_id'];
	   $prop_id=$_POST['prop_id'];
	   $superngo_id=$_POST['superngo_id'];
	   $org_staff_id=$_POST['org_staff_id'];
	   $ngo_id=$_POST['ngo_id'];
		
	   $project_id=0;
	   if(isset($_POST['project_id'])){
		   $project_id = $_POST['project_id'];
	   }
	  
	   $additional_json = '';
	   if(isset($_POST['additional_json'])){
		   $additional_json = json_encode($_POST['additional_json'],true);
	   }
	   if(isset($_POST['cycle_list'])){
			$cycle_list = $_POST['cycle_list'];
			$cycle_end_date=$cycle_list[0]['cycle_end_date2'];
			//var_dump($cycle_end_date);
			//die;
		}
	   
	   
	   $data = array(
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
			   
				   $today_date=date('Y-m-d');
					$datetime1 = date_create($cycle_end_date);
					$datetime2 = date_create($today_date);
					$interval = date_diff($datetime1, $datetime2);
					//var_dump($interval);
					$due_date_count= $interval->format('%a');
				  // $due_date_count=$row->due_date_count;
				$sql2="SELECT project_cycle_id FROM `project_cycle_details` WHERE `project_id`=$project_id AND org_id=$org_id   AND `is_deleted`=0 ORDER BY project_cycle_id ASC LIMIT 1";
				$db_result2 = $this->db->query($sql2)->result_array();
				$project_cycle_id=$db_result2[0]['project_cycle_id'];
				 $data_cycle = array(
					   'cycle_status' => 'Focal Point Review',
				   );
				$return_val = $this->db->update('project_cycle_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id));
				$return_val = $this->db->update('project_cycle_donor_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id));
			 
			 // $due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
			   //$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
			   $fetch_data = $this->db->get_where('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'project_id'=>$project_id,'user_type'=>'project approver'));
				//var_dump($fetch_data->result());
				$result_data=$fetch_data->result();
				if($result_data){
					$org_staff_id=$result_data[0]->staff_id;
				}
			   $data1 = array(	
				   'comments' => '',		
				   'superngo_id' => $superngo_id,
				   'ngo_id' => $ngo_id,
				   'prop_id' => $prop_id,
				   'org_id' => $org_id,
				   'org_task_list_id' => $org_task_list_id_increment,
				   'org_staff_id'=> $org_staff_id,
				   'created_date' => date('Y-m-d'),
				   'due_date' => $cycle_end_date,
				   'due_date_count' => $due_date_count,
				   'created_time' => date('H:i:s'),
				   'org_task_label' => $row->task_label,
				   'task_type' => $row->task_type,
				   'view_file_name' => $row->view_file_name,
				   'project_id' => $project_id,					
				   'additional_json' => $additional_json,	
				   'project_cycle_id' => $project_cycle_id,	
				   //'last_updated_date'=>date('Y-m-d H:i:s'),
			   );
			   $return_val=$this->db->insert('org_tasks', $data1);
			   $org_task_id = $this->db->insert_id();
			   
		   }
		}
	   if($org_task_id){
		   $this->task_created_send_email($org_task_id,$prop_id,$org_id);
	   }
	   $arr_response['status'] = 200;
	   $arr_response['message'] = 'Submitted successfully.';
	   echo json_encode($arr_response);
   	}
	/**submit org1 data "focal point review" */
	public function change_status_onsubmit_by_focal_point_review(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$project_id = $_POST['project_id'];
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$ngo_id=$_POST['ngo_id'];
		$project_cycle_id=$_POST['project_cycle_id'];
		$cycle_payment_yes_no=$_POST['cycle_payment_yes_no'];
		$focal_status=$_POST['focal_status'];
		
		$data_project = array(
			'project_status'   => 'Internal Verification',
			//'project_status_for_ngo'   => 'Cycle 1"',
			//'project_status_for_ngo'   => 'New',
		);
		//var_dump($data_project);die;
		$return_val = $this->db->update('project',$data_project,array('id'=>$project_id));
			
		$data_cycle = array(
		   'cycle_status' => 'Internal Verification',
		);
		$return_val = $this->db->update('project_cycle_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id));
		$return_val = $this->db->update('project_cycle_donor_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id));
			 
		//var_dump($_POST);die;
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			if(isset($_POST['additional_json'][0]['donor_amount_list'])){
				$donor_amount_list = $_POST['additional_json'][0]['donor_amount_list'];
					//var_dump($donor_amount_list);die;
				if($donor_amount_list){
					foreach($donor_amount_list as $value1){
						$donor_amount=$value1['donor_amount'];
						$project_cycle_donor_id=$value1['project_cycle_donor_id'];
						$project_cycle_id1=$value1['project_cycle_id'];
						$data2 = array(
								'cycle_donor_amount' => $value1['donor_amount'],
							);
						$return_val = $this->db->update('project_cycle_donor_details',$data2,array('id' => $project_cycle_donor_id,'project_cycle_id' => $project_cycle_id1));
					}
				}
			}
			$additional_json = json_encode($_POST['additional_json'],true);
			//var_dump($additional_json);die;
			
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
		
		$data = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'project_id'=>$project_id,
			'last_updated_date'=>date('Y-m-d H:i:s'),
		);
		$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		if($focal_status=='new'){
			
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
					
					//var_dump($row->view_file_name);
					$due_date_count=$row->due_date_count;
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $org_task_list_id_increment,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'due_date' => $due_date,
						'due_date_count' => $due_date_count,
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'project_id' => $project_id,					
						'project_cycle_id' => $project_cycle_id,	
						//'additional_json' => $additional_json,	
						//'last_updated_date'=>date('Y-m-d H:i:s'),
						);
					$return_val=$this->db->insert('org_tasks', $data1);
					$org_task_id = $this->db->insert_id();
				}
			}
				if($org_task_id){
					$this->task_created_send_email($org_task_id,$prop_id,$org_id);
				}
		}else{
			$sql2="SELECT org_task_id FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id AND project_cycle_id=$project_cycle_id";
			$db_result2 = $this->db->query($sql2)->result_array();
		
			if($db_result2){
					$org_task_id_post = ($db_result2[0]['org_task_id']);
					$data_task1 = array(
					//'additional_json' => $additional_json,
					'status' => 'Revision Ready',
				);
				//var_dump($data_task1);die;
				$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
				if($return_val1){
					$this->send_email_task_revised($org_task_id_post,$org_task_id,$prop_id,$org_id);
				}
										
			}else{
			
				$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						//var_dump($row->view_file_name);
						$due_date_count=$row->due_date_count;
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $org_task_list_id_increment,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
							'created_time' => date('H:i:s'),
							'org_task_label' => $row->task_label,
							'task_type' => $row->task_type,
							'view_file_name' => $row->view_file_name,
							'project_id' => $project_id,
							'project_cycle_id' => $project_cycle_id,							
							//'additional_json' => $additional_json,	
							//'last_updated_date'=>date('Y-m-d H:i:s'),
							);
						$return_val=$this->db->insert('org_tasks', $data1);
						$org_task_id = $this->db->insert_id();
					}
				}
					if($org_task_id){
						$this->task_created_send_email($org_task_id,$prop_id,$org_id);
					}
			
			}
		}
		if($org_task_id){	
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Submitted successfully.';
		}else{
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong!...';
		}	
		echo json_encode($arr_response);
		
	} 
	
	/**Org1 submit by page "Internal verification "**/
	public function change_status_onsubmit_by_internal_verification(){ 
		$arr_response = array('status' => 500);
	 	//var_dump($_POST);die;
		$project_id = $_POST['project_id'];
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$ngo_id=$_POST['ngo_id'];
		$project_cycle_id=$_POST['project_cycle_id'];
		$is_payment_yes_no=$_POST['is_payment_yes_no'];
		$was_focalPoint=$_POST['was_focalPoint'];
		$comments_no_approval='';
		if(isset($_POST['comments_was_focal_no'])){
			$comments_no_approval=$_POST['comments_was_focal_no'];
		}
		
		//var_dump($_POST);die;
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json'],true);
			//var_dump($additional_json);die;
			
		}
		
		if($was_focalPoint=='Yes'){
			/*$data = array(
					'is_completed'=>'yes',
				);
			$db_result2 = $this->db->update('project_cycle_details',$data,array('project_cycle_id' => $project_cycle_id));
			*/
			if(isset($_POST['additional_json'][0]['donor_amount_list'])){
				$donor_amount_list = $_POST['additional_json'][0]['donor_amount_list'];
					//var_dump($donor_amount_list);die;
				if($donor_amount_list){
					foreach($donor_amount_list as $value1){
						$donor_amount=$value1['donor_amount'];
						$project_cycle_donor_id=$value1['project_cycle_donor_id'];
						$project_cycle_id1=$value1['project_cycle_id'];
						$data2 = array(
								'cycle_donor_amount' => $value1['donor_amount'],
								//'is_completed'=>'yes',
								
							);
						$return_val = $this->db->update('project_cycle_donor_details',$data2,array('id' => $project_cycle_donor_id,'project_cycle_id' => $project_cycle_id1));
					}
				}
			}
			
			if($is_payment_yes_no=='yes'){
				
				$project_data = array(
						'project_status' => 'Checker Review',
						//'project_status_for_ngo' => 'Completed',
						'updated_datetime'=>date('Y-m-d H:i:s'),
					);
				$return_val = $this->db->update('project',$project_data,array('id' => $project_id));
				$data_cycle = array(
					   'cycle_status' => 'Checker Review',
				   );
				$return_val = $this->db->update('project_cycle_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id));
				$return_val = $this->db->update('project_cycle_donor_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id));
			 
				$data = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'project_id'=>$project_id,
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
				$org_task_list_id_increment = $org_task_list_id+1;
				
				$sql2="SELECT org_task_id FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id AND project_cycle_id=$project_cycle_id";
				$db_result2 = $this->db->query($sql2)->result_array();
				if($db_result2){
					$org_task_id_post = ($db_result2[0]['org_task_id']);
					$data_task1 = array(
						//'additional_json' => $additional_json,
						'status' => 'Revision Ready',
							
					);
					//var_dump($data_task1);die;
					$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
					if($return_val1){
						$this->send_email_task_revised($org_task_id_post,$org_task_id,$prop_id,$org_id);
					}
											
				}else{
		
					$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
					if ($db_result && $db_result->num_rows() > 0) {
						foreach ($db_result->result() as $row) {
							//var_dump($row->view_file_name);
							$due_date_count=$row->due_date_count;
							$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
							//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
							
								$fetch_data = $this->db->get_where('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'project_id'=>$project_id,'user_type'=>'project checker'));
								$result_data=$fetch_data->result();
								if($result_data){
									$org_staff_id=$result_data[0]->staff_id;
								}
							
							$data1 = array(	
								'comments' => '',		
								'superngo_id' => $superngo_id,
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'org_task_list_id' => $org_task_list_id_increment,
								'org_staff_id'=> $org_staff_id,
								'created_date' => date('Y-m-d'),
								'due_date' => $due_date,
								'due_date_count' => $due_date_count,
								'created_time' => date('H:i:s'),
								'org_task_label' => $row->task_label,
								'task_type' => $row->task_type,
								'view_file_name' => $row->view_file_name,
								'project_id' => $project_id,					
								'project_cycle_id' => $project_cycle_id,					
								//'additional_json' => $additional_json,	
								//'last_updated_date'=>date('Y-m-d H:i:s'),
								);
							$return_val=$this->db->insert('org_tasks', $data1);
							$org_task_id = $this->db->insert_id();
						}
					}
					if($org_task_id){
						$this->task_created_send_email($org_task_id,$prop_id,$org_id);
					}
				}
				
			}else{
				$cycle_data = array(
					'is_completed'=>'yes',
					'cycle_status'=>'Completed',
				);
				$db_result2 = $this->db->update('project_cycle_details',$cycle_data,array('project_cycle_id' => $project_cycle_id));
				$db_result2 = $this->db->update('project_cycle_donor_details',$cycle_data,array('project_cycle_id' => $project_cycle_id));
				
				$sql5="SELECT * FROM project_cycle_details WHERE project_id=$project_id AND is_completed='no' AND is_deleted=0 ORDER BY project_cycle_id ASC LIMIT 1";
				$cycle_result = $this->db->query($sql5)->result_array();
				//var_dump($cycle_result);die;
					
				if($cycle_result){
					$no_of_cycle=$cycle_result[0]['no_of_cycle'];
						$is_cycle_complete='no';
					
					$project_data = array(
						'project_status' => 'Focal Point Review',
						'project_status_for_ngo' => 'Cycle '.$no_of_cycle,
						'updated_datetime'=>date('Y-m-d H:i:s'),
					);
					$return_val = $this->db->update('project',$project_data,array('id' => $project_id));
					
					
					$task_data = array(
						//'additional_json' => $additional_json,
						'status' => 'Completed',
						'project_id'=>$project_id,
						'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val = $this->db->update('org_tasks',$task_data,array('org_task_id' => $org_task_id));
					$org_task_list_id_increment = $org_task_list_id-1;
					
					
					$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
					if ($db_result && $db_result->num_rows() > 0) {
						foreach ($db_result->result() as $row) {
							$sql_cycle="SELECT project_cycle_id,cycle_end_date2 FROM project_cycle_details WHERE project_id=$project_id AND is_completed='no' AND is_deleted=0 ORDER BY project_cycle_id ASC LIMIT 1";
							$cycle_result = $this->db->query($sql_cycle)->result_array();
																				
							if($cycle_result){
								$cycle_end_date2=$cycle_result[0]['cycle_end_date2'];	
								$project_cycle_id2=$cycle_result[0]['project_cycle_id'];	
								
								$today_date=date('Y-m-d');
								$datetime1 = date_create($cycle_end_date2);
								$datetime2 = date_create($today_date);
								$interval = date_diff($datetime1, $datetime2);
								//var_dump($interval);
								$due_date_count= $interval->format('%a');
							}
							$data_cycle = array(
								'cycle_status' => 'Focal Point Review',
							);
							$return_val = $this->db->update('project_cycle_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id2));
			 
							$fetch_data = $this->db->get_where('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'project_id'=>$project_id,'user_type'=>'project approver'));
							$result_data=$fetch_data->result();
							if($result_data){
								$org_staff_id=$result_data[0]->staff_id;
							}
							
							$data1 = array(	
								'comments' => '',		
								'superngo_id' => $superngo_id,
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'org_task_list_id' => $org_task_list_id_increment,
								'org_staff_id'=> $org_staff_id,
								'created_date' => date('Y-m-d'),
								'due_date' => $cycle_end_date2,
								'due_date_count' => $due_date_count,
								'created_time' => date('H:i:s'),
								'org_task_label' => $row->task_label,
								'task_type' => $row->task_type,
								'view_file_name' => $row->view_file_name,
								'project_id' => $project_id,					
								'project_cycle_id' => $project_cycle_id2,					
								//'additional_json' => $additional_json,	
								//'last_updated_date'=>date('Y-m-d H:i:s'),
								);
							$return_val=$this->db->insert('org_tasks', $data1);
							$org_task_id = $this->db->insert_id();
						}
					}
					if($org_task_id){
						$this->task_created_send_email($org_task_id,$prop_id,$org_id);
					}
				}else{
					$data = array(
						'is_completed'=>'yes',
						'cycle_status'=>'Completed',
					);
					$db_result2 = $this->db->update('project_cycle_details',$data,array('project_cycle_id' => $project_cycle_id));
					$db_result2 = $this->db->update('project_cycle_donor_details',$data,array('project_cycle_id' => $project_cycle_id));
			
					if(isset($_POST['additional_json'][0]['donor_amount_list'])){
						$donor_amount_list = $_POST['additional_json'][0]['donor_amount_list'];
							//var_dump($donor_amount_list);die;
						if($donor_amount_list){
							foreach($donor_amount_list as $value1){
								$donor_amount=$value1['donor_amount'];
								$project_cycle_donor_id=$value1['project_cycle_donor_id'];
								$project_cycle_id1=$value1['project_cycle_id'];
								$data2 = array(
										//'cycle_donor_amount' => $value1['donor_amount'],
										'is_completed'=>'yes',
									);
								$return_val = $this->db->update('project_cycle_donor_details',$data2,array('id' => $project_cycle_donor_id,'project_cycle_id' => $project_cycle_id1));
							}
						}
					}
					
					$is_cycle_complete='yes';
					$data = array(
						//'additional_json' => $additional_json,
						'status' => 'Completed',
						'project_id'=>$project_id,
						'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
					
					$project_data = array(
						'project_status' => 'Completed',
						'project_status_for_ngo' => 'Completed',
						'updated_datetime'=>date('Y-m-d H:i:s'),
					);
					$return_val = $this->db->update('project',$project_data,array('id' => $project_id));
					
					
				}
				
			}
		}else{
			//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
			$data_task = array(
				'additional_json' => $additional_json,
				'status' => 'Task Revision',
				'created_date' => date('Y-m-d'),
				'created_time' => date('H:i:s'),
				'last_updated_date'=>date('Y-m-d H:i:s'),
				
			);
				
			//var_dump($data_task);die;
			$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
			$org_task_list_id_decrement = $org_task_list_id-1;
			//var_dump($org_task_list_id_decrement);die;
			$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_decrement AND prop_id=$prop_id AND project_cycle_id=$project_cycle_id";
				$db_result2 = $this->db->query($sql2)->result_array();
				if($db_result2){
					
					$org_task_id_pre = ($db_result2[0]['org_task_id']);
					/*$due_date_count= ($db_result2[0]['due_date_count']);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));*/
					
					$data_task1 = array(
						//'additional_json' => $additional_json,
						'status' => 'Needs Review',
						//due_date' => $due_date,
						//'due_date_count' => $due_date_count,
						'created_date' => date('Y-m-d'),
						'created_time' => date('H:i:s'),
						'last_updated_date'=>date('Y-m-d H:i:s'),
						'requested_by'=>$org_staff_id,
						'requested_on'=>date('Y-m-d H:i:s'),
						'requested_details'=>$comments_no_approval,
					);
					
					$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_pre));
					if($return_val1){
						
						$this->send_email__task_revision_request($org_task_id_pre,$prop_id,$org_id,$org_staff_id,$ngo_id,$comments_no_approval);
					}
											
				}
		}
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
		
	} 
	/**submit og1 data "leadership" & "sc review" */
	public function change_status_onsubmit_by_ngo_desk_leadership(){ 
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
	
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			if(isset($_POST['additional_json'][0]['comments_request'])){
				$comments_request = $_POST['additional_json'][0]['comments_request'];
			}
			$additional_json = json_encode($_POST['additional_json']);
		}
		
		//var_dump($additional_json);die;
		$my_final=$_POST['my_final'];
			if($my_final=='my_request'){
				
				if($prop_id){
				$data1=array(
					'proposal_status'=>'NGO Revision',
					'proposal_status_for_ngo'=>'Revision Requested',
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
					'created_time' => date('H:i:s'),
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
							
				$ngo_cycle_detail_url='ngo/proposals/edit?id='.$prop_id;
				//$ngo_cycle_detail_url=	NGO_URL.'ngo/proposals/edit?id='.$prop_id;
				
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
				
				
				$desp= "$staff_name from $org_name is requesting you to update/revise some data of this proposal as per the details below:<br><br>$comments_request";
				//print_r($desp);die;
				$notification_title="Proposal Revision Request";
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
					'request_type' =>'proposal',
							
					);
					//var_dump($data1);die;			
					$return_val=$this->db->insert('ngo_notification', $data1);
					$notification_id = $this->db->insert_id();
					if($notification_id){
						$this->ngo_notification_send_email_by_begin_proposal($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
					}
					
					
			}else if($my_final=='my_approve'){
				if($prop_id){
					if($_POST['prop_update']=='sc'){
						$proposal_status='SC Review';	
					}else{
						$proposal_status='Board Review';
					}
					
					$data1=array(
					'proposal_status'=>$proposal_status,
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
				}

				$data = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'project_id'=>$project_id,
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				
				$return_val = $this->db->update('org_tasks',$data,array('org_task_id' => $org_task_id));
				$org_task_list_id_increment = $org_task_list_id+1;
				
				//var_dump($org_task_list_id_increment);die;
				$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$due_date_count=$row->due_date_count;
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $org_task_list_id_increment,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
							'created_time' => date('H:i:s'),
							'org_task_label' => $row->task_label,
							'task_type' => $row->task_type,
							'view_file_name' => $row->view_file_name,
							'project_id' => $project_id,					
							//'additional_json' => $additional_json,
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
					'proposal_status'=>'Recommended for Rejection',
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
				
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$due_date_count=$row->due_date_count;
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $row->task_position,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
							'created_time' => date('H:i:s'),
							'org_task_label' => $row->task_label,
							'task_type' => $row->task_type,
							'view_file_name' => $row->view_file_name,
							'project_id' => $project_id,					
							//'additional_json' => $additional_json,
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
		
		//var_dump($org_task_id);
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}
	/** submit org1 data page "Board Review "
		--here proposa status "Approved"-----
	*/
	public function change_status_onsubmit_by_org1_board_reaview(){ 
		$arr_response = array('status' => 500);
		//var_dump($_POST);die;
		if(isset($_POST['project_id'])){
			$project_id=$_POST['project_id'];
		}else{
			$project_id=0;
		}
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$additional_json = '';
		$csr_file_value1='';
		$csr_file_value_actual1='';
		if(isset($_POST['additional_json'])){
			if(isset($_POST['additional_json'][0]['comments_request'])){
				$comments_request = $_POST['additional_json'][0]['comments_request'];
			}
			if(isset($_POST['additional_json'][0]['donor_dropdown_id1'])){
				$donor_dropdown_id1 = $_POST['additional_json'][0]['donor_dropdown_id1'];
				//var_dump($donor_dropdown_id1);
			}
			if(isset($_POST['additional_json'][0]['donor_dropdown_id2'])){
				$donor_dropdown_id2 = $_POST['additional_json'][0]['donor_dropdown_id2'];
				//var_dump($donor_dropdown_id2);
			}
			if(isset($_POST['additional_json'][0]['donor_dropdown_id3'])){
				$donor_dropdown_id3 = $_POST['additional_json'][0]['donor_dropdown_id3'];
				//var_dump($donor_dropdown_id3);
			}
			if(isset($_POST['additional_json'][0]['csr_file_value1'])){
				$csr_file_value1 = $_POST['additional_json'][0]['csr_file_value1'];
				//var_dump($donor_dropdown_id3);
			}if(isset($_POST['additional_json'][0]['csr_file_value_actual1'])){
				$csr_file_value_actual1 = $_POST['additional_json'][0]['csr_file_value_actual1'];
				//var_dump($donor_dropdown_id3);
			}
			
			$additional_json = json_encode($_POST['additional_json']);
		}
		//var_dump($additional_json);die;
		$my_final=$_POST['my_final'];
			if($my_final=='my_request'){
				
				if($prop_id){
				$data1=array(
					'proposal_status'=>'NGO Revision',
					'proposal_status_for_ngo'=>'Revision Requested',
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
					'created_time' => date('H:i:s'),
					'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
				
				$ngo_cycle_detail_url='ngo/proposals/edit?id='.$prop_id;
				//$ngo_cycle_detail_url=	NGO_URL.'ngo/proposals/edit?id='.$prop_id;
				
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
				
				
				$desp= "$staff_name from $org_name is requesting you to update/revise some data of this proposal as per the details below:<br><br>$comments_request";
				//print_r($desp);die;
				$notification_title="Proposal Revision Request";
				$data1 = array(	
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'proposal_id' => $prop_id,
					'org_id' => $org_id,
					//'project_id' => $project_id,
					'org_task_id' => $org_task_id,
					'created_date' => date('Y-m-d'),
					'created_time' => date('H:i:s'),
					'url'=>$ngo_cycle_detail_url,
					'status'=>'Pending',
					'title'=>$notification_title,
					'description' =>$desp,
					'request_type' =>'proposal',
							
					);
					//var_dump($data1);die;			
					$return_val=$this->db->insert('ngo_notification', $data1);
					$notification_id = $this->db->insert_id();
					if($notification_id){
						$this->ngo_notification_send_email_by_begin_proposal($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title);
					}
					
					
			}else if($my_final=='my_approve'){
				if(isset($_POST['project'])){
					$project=$_POST['project'];
					if($project=='yes'){
						$staff_id = $this->session->userdata('staff_id');
						$donor_list=$_POST['donor_list'];
						if($prop_id){
							if(isset($_POST['prop_update_status'])){
								$prop_update_status = $_POST['prop_update_status'];
								if($prop_update_status=='yes'){
								$data1=array(
										'proposal_status'=>'Approved',
										'proposal_status_for_ngo'=>'Approved',
										'org_last_updated_date'=>date('Y-m-d H:i:s'),
									);
									$return_val1 = $this->db->update('proposal',$data1,array('prop_id' => $prop_id));
								}
							}
							
							$sql1="SELECT * FROM `proposal` WHERE `prop_id` =  ".$prop_id."";
							$db_result1 = $this->db->query($sql1)->result_array();
							if($db_result1){
								$project_title = $db_result1[0]['title'];
								$project_code = $db_result1[0]['code'];
								$new_project_id = $db_result1[0]['new_prop_id'];
							}
						}
						/*now create project*/
						$data_project = array(
				
							'prop_id'          => $prop_id,
							'superngo_id'      => $superngo_id,
							'ngo_id'           => $ngo_id,
							'organisation_id'  => $org_id,
							'created_time'     => date('Y-m-d H:i:s'),
							'updated_datetime' => date('Y-m-d H:i:s'),
							'project_status'   => 'New',
							'project_status_for_ngo'   => 'New',
							'is_deleted'		=> 0,
							'generated_by'	    => $staff_id,
							'title'	    		=> $project_title,
							'code'	  			=> $project_code,
							'new_project_id'	=> $new_project_id,
							'board_review_upload'	=> $csr_file_value1,
							'board_review_upload_actual'	=> $csr_file_value_actual1,
						);
						//var_dump($data_project);die;
						$return_val = $this->db->insert('project',$data_project);
						$project_id = $this->db->insert_id();
						if($project_id){
							$uploaded_type='approval';
							$this->project_mou_and_aproval_history($project_id,$uploaded_type,$csr_file_value1,$csr_file_value_actual1);
							
						}
						/*Crate new project donor*/
						if($donor_list !=''){
							$i=0;
							foreach($donor_list as $value){
								$i++;
								$main_donor_id=$value['select_donor'];
								$donor_amount=$value['donor_amount'];
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
								$project_donor_id=$this->db->insert_id();
								if($project_donor_id and $donor_amount>0){
									$this->send_vandor_code_email_by_task_create($project_id,$org_task_id,$org_task_list_id,$org_id,$prop_id,$superngo_id,$ngo_id,$org_staff_id,$project_donor_id,$main_donor_id);
									//$this->task_created_send_email($org_task_id,$prop_id,$org_id);
									//var_dump($i);
								}
							}
						}
					
						$data_task = array(
							'additional_json' => $additional_json,
							'status' => 'Completed',
							'last_updated_date'=>date('Y-m-d H:i:s'),
						);
						//var_dump($org_task_list_id);die;
						$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
						$org_task_list_id_increment = $org_task_list_id+1;
						
						//var_dump($org_task_list_id_increment);die;
						$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
						if ($db_result && $db_result->num_rows() > 0) {
							foreach ($db_result->result() as $row) {
								$due_date_count=$row->due_date_count;
								$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
								//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
								
								
								$data1 = array(	
									'comments' => '',		
									'superngo_id' => $superngo_id,
									'ngo_id' => $ngo_id,
									'prop_id' => $prop_id,
									'org_id' => $org_id,
									'org_task_list_id' => $org_task_list_id_increment,
									'org_staff_id'=> $org_staff_id,
									'created_date' => date('Y-m-d'),
									'due_date' => $due_date,
									'due_date_count' => $due_date_count,
									'created_time' => date('H:i:s'),
									'org_task_label' => $row->task_label,
									'task_type' => $row->task_type,
									'view_file_name' => $row->view_file_name,
									'project_id' => $project_id,					
									'additional_json' => $additional_json,
									//'last_updated_date'=>date('Y-m-d H:i:s'),
								);
								//var_dump($data1);die;
								$return_val=$this->db->insert('org_tasks', $data1);
								$org_task_id = $this->db->insert_id();	
							}
						}
						
						if($org_task_id){
							$return_val=$this->db->delete('org_assigner_mgmt',array('ngo_id'=>$ngo_id,'org_id'=>$org_id,'prop_id'=>$prop_id,'user_type'=> 'normal'));
							$org_assigner_mgmt_data= array(	
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'staff_id'=> $org_staff_id,
								'user_type'=> 'normal',
								'project_id'=> $project_id,
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data);
							
							$return_val=$this->db->delete('org_assigner_mgmt',array('ngo_id'=>$ngo_id,'org_id'=>$org_id,'prop_id'=>$prop_id,'user_type'=> 'prposal normal'));
							$org_assigner_mgmt_data1= array(	
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'staff_id'=> $org_staff_id,
								'user_type'=> 'prposal normal',
								'project_id'=> $project_id,
							);
							
							$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data1);
							$org_assigner_mgmt_data2= array(	
								'ngo_id' => $ngo_id,
								'prop_id' => $prop_id,
								'org_id' => $org_id,
								'staff_id'=> $org_staff_id,
								'user_type'=> 'project normal',				
								'project_id'=> $project_id,				
							);
							$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data2);
							if($donor_dropdown_id2){
								$org_assigner_mgmt_data3= array(	
									'ngo_id' => $ngo_id,
									'prop_id' => $prop_id,
									'org_id' => $org_id,
									'staff_id'=> $donor_dropdown_id2,
									'user_type'=> 'project approver',				
									'project_id'=> $project_id,				
								);
								$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data3);
							}
							if($donor_dropdown_id3){
								$org_assigner_mgmt_data4= array(	
									'ngo_id' => $ngo_id,
									'prop_id' => $prop_id,
									'org_id' => $org_id,
									'staff_id'=> $donor_dropdown_id3,
									'user_type'=> 'project checker',				
									'project_id'=> $project_id,				
								);
								$return_val=$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data4);
							}
						}
						
						if($org_task_id){
							$this->task_created_send_email($org_task_id,$prop_id,$org_id);
						}
						
					}
					
				}/*else{
				
					if($prop_id){
						$data1=array(
						'proposal_status'=>'Approved',
						'proposal_status_for_ngo'=>'Approved',
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
					
					$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
					$db_result2 = $this->db->query($sql2)->result_array();
					if($db_result2){
						
						$org_task_id_post = ($db_result2[0]['org_task_id']);
						$due_date_count=($db_result2[0]['due_date_count']);
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						
						//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
						$data_task1 = array(
							//'additional_json' => $additional_json,
							'status' => '',
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
							'created_time' => date('H:i:s'),
							'last_updated_date'=>date('Y-m-d H:i:s'),
						);
						//var_dump($data_task1);die;
						$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
						if($return_val1){
							$this->task_created_send_email($org_task_id,$prop_id,$org_id);
						}
												
					}else{
						//var_dump($org_task_list_id_increment);die;
						$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
						if ($db_result && $db_result->num_rows() > 0) {
							foreach ($db_result->result() as $row) {
								$due_date_count=$row->due_date_count;
								$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
								//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
								$data1 = array(	
									'comments' => '',		
									'superngo_id' => $superngo_id,
									'ngo_id' => $ngo_id,
									'prop_id' => $prop_id,
									'org_id' => $org_id,
									'org_task_list_id' => $org_task_list_id_increment,
									'org_staff_id'=> $org_staff_id,
									'created_date' => date('Y-m-d'),
									'due_date' => $due_date,
									'due_date_count' => $due_date_count,
									'created_time' => date('H:i:s'),
									'org_task_label' => $row->task_label,
									'task_type' => $row->task_type,
									'view_file_name' => $row->view_file_name,
									'project_id' => $project_id,					
									//'additional_json' => $additional_json,
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
				}*/
			}
			else if($my_final=='my_recommend'){
				
				if($prop_id){
					$data1=array(
					'proposal_status'=>'Recommended for Rejection',
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
				
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$due_date_count=$row->due_date_count;
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $row->task_position,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
							'due_date_count' => $due_date_count,
							'created_time' => date('H:i:s'),
							'org_task_label' => $row->task_label,
							'task_type' => $row->task_type,
							'view_file_name' => $row->view_file_name,
							'project_id' => $project_id,					
							//'additional_json' => $additional_json,
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
					'proposal_status_for_ngo'=> 'Rejected',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
			 
					);
				//var_dump($data_proposal);die;
				$return_val = $this->db->update('proposal',$data_proposal,array('prop_id'=>$prop_id));
				
				/*$data_ngo_review = array(
					'status' => 'Rejected',
					'org_last_updated_date'=>date('Y-m-d H:i:s'),
				); 
				$return_val1 = $this->db->update('org_ngo_review_status',$data_ngo_review,array('org_id' => $org_id,'ngo_id' => $ngo_id));
				*/
				
				$data_task = array(
					'additional_json' => $additional_json,
					'status' => 'Completed',
					'project_id'=>$project_id,
					'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));	
			}
		
		//var_dump($org_task_id);
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}
	/**submit org1 data "project docuemnts" */
	public function change_status_onsubmit_by_project_documents(){ 	 
		$arr_response = array('status' => 500);
		
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
		
		if(isset($_POST['project_id'])){
			$project_id=$_POST['project_id'];
			//var_dump($project_id);die;
			$csr_file_value=$_POST['csr_file_value'];
			$csr_file_value_actual=$_POST['csr_file_value_actual'];
			$data_project = array(
				'title' => $_POST['project_update'],
				'cycle_file_upload' => $csr_file_value,
				'cycle_file_upload_actual' => $csr_file_value_actual,
				'project_start_date' => $_POST['project_start_date'],
				'project_end_date' => $_POST['project_end_date'],
				'project_status' => 'Setup In Progress',
				'project_status_for_ngo' => 'Setup In Progress',
			
			);
			$this->db->update('project',$data_project,array('id' => $project_id));
			if($project_id){
				$uploaded_type='mou';
				$this->project_mou_and_aproval_history($project_id,$uploaded_type,$csr_file_value,$csr_file_value_actual);
				
			}
			
		}
		
		$data_task = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'last_updated_date'=>date('Y-m-d H:i:s'),
			
		);
		
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
				$due_date_count=$row->due_date_count;
				$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
				
				/*$fetch_data = $this->db->get_where('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'project_id'=>$project_id,'user_type'=>'project approver'));
						//var_dump($fetch_data->result());
						$result_data=$fetch_data->result();
						$staff_id=$result_data[0]->staff_id;*/
						//var_dump($staff_id);
						//die;
							
				
				
				$data1 = array(	
					'comments' => '',		
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'org_task_list_id' => $org_task_list_id_increment,
					'org_staff_id'=> $org_staff_id,
					'created_date' => date('Y-m-d'),
					'due_date' => $due_date,
					'created_time' => date('H:i:s'),
					'org_task_label' => $row->task_label,
					'task_type' => $row->task_type,
					'view_file_name' => $row->view_file_name,
					'project_id' => $project_id,					
					'additional_json' => $additional_json,
					//'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val=$this->db->insert('org_tasks', $data1);
				$org_task_id = $this->db->insert_id();	
			}
			if($org_task_id){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}

		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}
	
	
	/**Org1 Submit by page "cheker Review" and "Payemnt Confirmation"*/
	public function change_status_onsubmit_by_checker_review(){ 	 
		$arr_response = array('status' => 500);
		
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$project_id=$_POST['project_id'];
		$was_internal_radio=$_POST['was_internal_radio'];
		$project_cycle_id_hidden=$_POST['project_cycle_id_hidden'];
		
		$comments_no_approval='';
		if(isset($_POST['comments_was_internal_radio_no'])){
			$comments_no_approval=$_POST['comments_was_internal_radio_no'];
		}
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			if(isset($_POST['additional_json'][0]['donor_amount_list'])){
				$donor_amount_list = $_POST['additional_json'][0]['donor_amount_list'];
					//var_dump($donor_amount_list);die;
				if($donor_amount_list){
					foreach($donor_amount_list as $value1){
						$donor_amount=$value1['donor_amount'];
						$project_cycle_donor_id=$value1['project_cycle_donor_id'];
						$project_cycle_id=$value1['project_cycle_id'];
						$data2 = array(
								'cycle_donor_amount' => $value1['donor_amount'],
								
							);
						$return_val = $this->db->update('project_cycle_donor_details',$data2,array('id' => $project_cycle_donor_id,'project_cycle_id' => $project_cycle_id));
					}
				}
			}
			$additional_json = json_encode($_POST['additional_json'],true);
			//var_dump($additional_json);die;
			
		}
		
		if($was_internal_radio=='Yes'){
			$project_data = array(
				'project_status' => 'Final Approval',
				//'project_status_for_ngo' => 'Cycle '.$no_of_cycle,
				'updated_datetime'=>date('Y-m-d H:i:s'),
			);
			$return_val = $this->db->update('project',$project_data,array('id' => $project_id));
			$data_cycle = array(
				'cycle_status' => 'Final Approval',
			);
			$return_val = $this->db->update('project_cycle_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id_hidden));
			$return_val = $this->db->update('project_cycle_donor_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id_hidden));
	
			
			
			$data_task = array(
				'additional_json' => $additional_json,
				'status' => 'Completed',
				'last_updated_date'=>date('Y-m-d H:i:s'),
				
			);
			
			$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
			$org_task_list_id_increment = $org_task_list_id+1;
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
					$due_date_count=$row->due_date_count;
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $org_task_list_id_increment,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'due_date' => $due_date,
						'due_date_count' => $due_date_count,
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'project_id' => $project_id,					
						'additional_json' => $additional_json,
						'project_cycle_id' => $project_cycle_id_hidden,
						//'last_updated_date'=>date('Y-m-d H:i:s'),
					);
					$return_val=$this->db->insert('org_tasks', $data1);
					$org_task_id = $this->db->insert_id();	
				}
				if($org_task_id){
					$this->task_created_send_email($org_task_id,$prop_id,$org_id);
				}
			}
		}else{
			
			$data_task = array(
				'additional_json' => $additional_json,
				'status' => 'Task Revision',
				'created_date' => date('Y-m-d'),
				'created_time' => date('H:i:s'),
				'last_updated_date'=>date('Y-m-d H:i:s'),
				
			);
				
			//var_dump($data_task);die;
			$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
			$org_task_list_id_decrement = $org_task_list_id-1;
			
			$sql2="SELECT org_task_id,due_date_count FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_decrement AND prop_id=$prop_id AND project_cycle_id=$project_cycle_id_hidden";
				$db_result2 = $this->db->query($sql2)->result_array();
				if($db_result2){
					$org_task_id_pre = ($db_result2[0]['org_task_id']);
					$due_date_count= ($db_result2[0]['due_date_count']);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					//$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
					$data_task1 = array(
						//'additional_json' => $additional_json,
						'status' => 'Needs Review',
						'due_date' => $due_date,
						'due_date_count' => $due_date_count,
						'created_date' => date('Y-m-d'),
						'created_time' => date('H:i:s'),
						'last_updated_date'=>date('Y-m-d H:i:s'),
						'requested_by'=>$org_staff_id,
						'requested_on'=>date('Y-m-d H:i:s'),
						'requested_details'=>$comments_no_approval,
					);
					
					$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_pre));
					if($return_val1){
						
						$this->send_email__task_revision_request($org_task_id_pre,$prop_id,$org_id,$org_staff_id,$ngo_id,$comments_no_approval);
					}
											
				}
		}
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}
	/**Org1 Ssubmit By Page "Final Payment Approval "**/
	public function change_status_onsubmit_by_final_payemnt_approval(){ 	 
		$arr_response = array('status' => 500);
		
		//var_dump($_POST);die;
		$org_task_id= $_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$superngo_id=$_POST['superngo_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$project_id=$_POST['project_id'];
		$project_cycle_id_hidden=$_POST['project_cycle_id_hidden'];
		
		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json'],true);
			//var_dump($additional_json);die;
			
		}
		
		$project_data = array(
			'project_status' => 'Payment Confirmation',
			//'project_status_for_ngo' => 'Cycle '.$no_of_cycle,
			'updated_datetime'=>date('Y-m-d H:i:s'),
		);
		$return_val = $this->db->update('project',$project_data,array('id' => $project_id));
		$data_cycle = array(
				'cycle_status' => 'Payment Confirmation',
			);
		$return_val = $this->db->update('project_cycle_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id_hidden));
		$return_val = $this->db->update('project_cycle_donor_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id_hidden));
		
				
		$data_task = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'last_updated_date'=>date('Y-m-d H:i:s'),
			
		);
		
		$return_val = $this->db->update('org_tasks',$data_task,array('org_task_id' => $org_task_id));
		$org_task_list_id_increment = $org_task_list_id+1;
		$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
		if ($db_result && $db_result->num_rows() > 0) {
			foreach ($db_result->result() as $row) {
				$due_date_count=$row->due_date_count;
				$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
				
				$data1 = array(	
					'comments' => '',		
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'org_task_list_id' => $org_task_list_id_increment,
					'org_staff_id'=> $org_staff_id,
					'created_date' => date('Y-m-d'),
					'due_date' => $due_date,
					'due_date_count' => $due_date_count,
					'created_time' => date('H:i:s'),
					'org_task_label' => $row->task_label,
					'task_type' => $row->task_type,
					'view_file_name' => $row->view_file_name,
					'project_id' => $project_id,					
					//'additional_json' => $additional_json,
					'project_cycle_id' => $project_cycle_id_hidden,
					//'last_updated_date'=>date('Y-m-d H:i:s'),
				);
				$return_val=$this->db->insert('org_tasks', $data1);
				$org_task_id = $this->db->insert_id();	
			}
			if($org_task_id){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}
		
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		echo json_encode($arr_response);
	}

	/** submit org1 data "payment conformation" */
	public function change_status_onsubmit_by_payment_conformation(){
		$arr_response = array('status' => 500);	
		//var_dump($_POST);die;
		$org_task_id=$_POST['org_task_id'];
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$ngo_id=$_POST['ngo_id'];
		$is_completed='';
		$project_id=$_POST['project_id'];
		$project_cycle_id_hidden=$_POST['project_cycle_id_hidden'];
		//$this_project_cycle_id=$_POST['this_project_cycle_id'];
		
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			if(isset($_POST['additional_json'][0]['donor_amount_list'])){
				$donor_amount_list = $_POST['additional_json'][0]['donor_amount_list'];
					//var_dump($donor_amount_list);die;
				if($donor_amount_list){
					foreach($donor_amount_list as $value1){
						$donor_amount=$value1['donor_amount'];
						$project_cycle_donor_id=$value1['project_cycle_donor_id'];
						$project_cycle_id=$value1['project_cycle_id'];
						$data2 = array(
								'cycle_donor_amount' => $value1['donor_amount'],
								
							);
						$return_val = $this->db->update('project_cycle_donor_details',$data2,array('id' => $project_cycle_donor_id,'project_cycle_id' => $project_cycle_id));
					}
				}
			}
			$additional_json = json_encode($_POST['additional_json'],true);
			//var_dump($additional_json);die;
			
		}
		
		$project_data = array(
			'project_status' => 'Cycle Completion',
			//'project_status_for_ngo' => 'Cycle '.$no_of_cycle,
			'updated_datetime'=>date('Y-m-d H:i:s'),
		);
		$return_val = $this->db->update('project',$project_data,array('id' => $project_id));
		$data_cycle = array(
				'cycle_status' => 'Cycle Completion',
			);
		$return_val = $this->db->update('project_cycle_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id_hidden));
		$return_val = $this->db->update('project_cycle_donor_details',$data_cycle,array('project_id' => $project_id ,'project_cycle_id' => $project_cycle_id_hidden));
		
		
		//die;
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
					$due_date_count=$row->due_date_count;
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
				$data1 = array(	
					'comments' => '',		
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'org_task_list_id' => $org_task_list_id_increment,
					'org_staff_id'=> $org_staff_id,
					'created_date' => date('Y-m-d'),
					'due_date' => $due_date,
					'due_date_count' => $due_date_count,
					'created_time' => date('H:i:s'),
					'org_task_label' => $row->task_label,
					'task_type' => $row->task_type,
					'view_file_name' => $row->view_file_name,
					'project_id' => $project_id,					
					'project_cycle_id' => $project_cycle_id_hidden,					
					//'additional_json' => $additional_json,
					//'last_updated_date'=>date('Y-m-d H:i:s'),					
				);
				$return_val=$this->db->insert('org_tasks', $data1);
				$org_task_id = $this->db->insert_id();
			}
		}
		if($org_task_id){
			$this->task_created_send_email($org_task_id,$prop_id,$org_id);
		}
		
		if($db_result){
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
			//$arr_response['org_task_id'] = $org_task_id;
			//$arr_response['cycle_complete'] = $is_cycle_complete;
		}
		echo json_encode($arr_response);
	}

	/**submit org1 data "cycle Completion" */
	public function change_status_onsubmit_by_cycle_completion_org1(){
		$arr_response = array('status' => 500);	
		//var_dump($_POST);die;
		$additional_json = '';
		if(isset($_POST['additional_json'])){
			$additional_json = json_encode($_POST['additional_json']);
		}
		$org_task_id=$_POST['org_task_id'];
		
		$org_task_list_id=$_POST['org_task_list_id'];
		$org_id=$_POST['org_id'];
		$org_staff_id=$_POST['org_staff_id'];
		$prop_id=$_POST['prop_id'];
		$superngo_id=$_POST['superngo_id'];
		$ngo_id=$_POST['ngo_id'];
		$is_completed='';
		$project_id=$_POST['project_id'];
		$project_cycle_id_hidden=$_POST['project_cycle_id_hidden'];
		//$comments=$_POST['comments'];
		$data = array(
			'is_completed'=>'yes',
			'cycle_status' => 'Completed',
		);
			
			
		$db_result2 = $this->db->update('project_cycle_details',$data,array('project_cycle_id' => $project_cycle_id_hidden));
		$db_result2 = $this->db->update('project_cycle_donor_details',$data,array('project_cycle_id' => $project_cycle_id_hidden));

		$data2 = array(
			'additional_json' => $additional_json,
			'status' => 'Completed',
			'project_id'=>$project_id,
			'last_updated_date'=>date('Y-m-d H:i:s'),
			);
		$return_val = $this->db->update('org_tasks',$data2,array('org_task_id' => $org_task_id));
		
		$sql1="SELECT * FROM project_cycle_details WHERE project_id=$project_id AND is_completed='no' AND is_deleted=0 ORDER BY project_cycle_id ASC LIMIT 1";
		$db_result1 = $this->db->query($sql1)->result_array();
		//var_dump($db_result1);die;
		if($db_result1){
			$no_of_cycle=$db_result1[0]['no_of_cycle'];
			$project_cycle_id=$db_result1[0]['project_cycle_id'];
			$cycle_end_date2=$db_result1[0]['cycle_end_date2'];
			$project_data = array(
					'project_status' => 'Focal Point Review',
					'project_status_for_ngo' => 'Cycle '.$no_of_cycle,
					'updated_datetime'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('project',$project_data,array('id' => $project_id));
				
			$data_cycle = array(
				'cycle_status' => 'Focal Point Review',
			);
				
			$db_result2 = $this->db->update('project_cycle_details',$data_cycle,array('project_cycle_id' => $project_cycle_id));
			$db_result2 = $this->db->update('project_cycle_donor_details',$data_cycle,array('project_cycle_id' => $project_cycle_id));

			$is_cycle_start='yes';
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'is_cycle_start' => $is_cycle_start));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
					
					$today_date=date('Y-m-d');
					$datetime1 = date_create($cycle_end_date2);
					$datetime2 = date_create($today_date);
					$interval = date_diff($datetime1, $datetime2);
					$due_date_count= $interval->format('%a');
				  
					$fetch_data = $this->db->get_where('org_assigner_mgmt',array('org_id' => $org_id,'ngo_id' => $ngo_id,'prop_id'=>$prop_id,'project_id'=>$project_id,'user_type'=>'project approver'));
					$result_data=$fetch_data->result();
					if($result_data){
						$org_staff_id=$result_data[0]->staff_id;
					}
						
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $row->task_position,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'due_date' => $cycle_end_date2,
						'due_date_count' => $due_date_count,
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'project_id' => $project_id,
						'project_cycle_id' => $project_cycle_id,
						//'last_updated_date'=>date('Y-m-d H:i:s'),
										
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
		}else{
			$project_data = array(
					'project_status' => 'Completed',
					'project_status_for_ngo' => 'Completed',
					'updated_datetime'=>date('Y-m-d H:i:s'),
				);
				$return_val = $this->db->update('project',$project_data,array('id' => $project_id));
				
		}

		$arr_response['status'] = 200;
		$arr_response['message'] = 'Successfully submitted';
	
		echo json_encode($arr_response);
	}
	/**End submit  section------------------------------------------------------------------------ */
	/**END  ORG1 SECTION  HERE ================================================================================*/
	
	/**  START ORG2 SECTION HERE =============================================================================*/
   		/**Start save section -------------------------------------------------- */
   	public function save_ngo_review_org2(){
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

	/** End save section */
	/**start  submit section ----------------------- */
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
		
		$sql2="SELECT org_task_id FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
		$db_result2 = $this->db->query($sql2)->result_array();
		if($db_result2){
			$org_task_id_post = ($db_result2[0]['org_task_id']);
			$data_task1 = array(
				//'additional_json' => $additional_json,
				'status' => 'Revision Ready',
				'created_date' => date('Y-m-d'),
				'created_time' => date('H:i:s'),
				'last_updated_date'=>date('Y-m-d H:i:s'),
			);
			//var_dump($data_task1);die;
			$return_val1 = $this->db->update('org_tasks',$data_task1,array('org_task_id' => $org_task_id_post));
			if($return_val1){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
									
		}else{
		
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'task_position' => $org_task_list_id_increment));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
					$due_date_count=$row->due_date_count;
					//var_dump($due_date_count);
					$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $org_task_list_id_increment,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'due_date'=>$due_date,
						'due_date_count'=>$due_date_count,
						'created_time' => date('H:i:s'),
						'org_task_label' => $row->task_label,
						'task_type' => $row->task_type,
						'view_file_name' => $row->view_file_name,
						'project_id' => $project_id,					
						'additional_json' => $additional_json,
						
					);
					$return_val=$this->db->insert('org_tasks', $data1);
					$org_task_id = $this->db->insert_id();	
				}
			}
			if($org_task_id){
				$this->task_created_send_email($org_task_id,$prop_id,$org_id);
			}
		}
			
			
		if($org_task_id){
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Submitted successfully.';
		}else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
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
					$created_date=date('Y-m-d');
					$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
					
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $org_task_list_id_increment,
						'org_staff_id'=> $org_staff_id,
						'created_date' => $created_date,
						'due_date' => $due_date,
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
							$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
						$data1 = array(	
							'comments' => '',		
							'superngo_id' => $superngo_id,
							'ngo_id' => $ngo_id,
							'prop_id' => $prop_id,
							'org_id' => $org_id,
							'org_task_list_id' => $org_task_list_id_increment,
							'org_staff_id'=> $org_staff_id,
							'created_date' => date('Y-m-d'),
							'due_date' => $due_date,
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
	/*ORG2 submit1 cycle data submit1 page "Cycle Creation"**/
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

	public function change_status_onsubmit_by_cycle_creation_org2(){ 
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
	   
	   $data = array(
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
			   $due_date_count=$row->due_date_count;
			   $due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
			   //$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
			   $data1 = array(	
				   'comments' => '',		
				   'superngo_id' => $superngo_id,
				   'ngo_id' => $ngo_id,
				   'prop_id' => $prop_id,
				   'org_id' => $org_id,
				   'org_task_list_id' => $org_task_list_id_increment,
				   'org_staff_id'=> $org_staff_id,
				   'created_date' => date('Y-m-d'),
				   'due_date' => $due_date,
				   'due_date_count' => $due_date_count,
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
					$due_date=date('Y-m-d', strtotime('+'.DEFAULT_DUE_DATE.' days'));
				$data1 = array(	
					'comments' => '',		
					'superngo_id' => $superngo_id,
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'org_task_list_id' => $org_task_list_id_increment,
					'org_staff_id'=> $org_staff_id,
					'created_date' => date('Y-m-d'),
					'due_date' => $due_date,
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
	/**End  submit section */

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
            'status'=>'Completed',
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
	//	var_dump($doc_type);
		
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
		
		$sql1="SELECT * FROM `project_cycle_details` WHERE `project_id` =$project_id AND `is_completed`='no' AND `is_deleted`=0 ORDER BY project_cycle_id";
		$db_result1 = $this->db->query($sql1)->result_array();
		if($db_result1){
			$is_cycle_start='yes';
			$db_result = $this->db->get_where('org_task_list',array('org_id' => $org_id,'is_cycle_start' => $is_cycle_start));
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
						$due_date_count=$row->due_date_count;
						$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
					$data1 = array(	
						'comments' => '',		
						'superngo_id' => $superngo_id,
						'ngo_id' => $ngo_id,
						'prop_id' => $prop_id,
						'org_id' => $org_id,
						'org_task_list_id' => $row->task_position,
						'org_staff_id'=> $org_staff_id,
						'created_date' => date('Y-m-d'),
						'due_date' => $due_date,
						'due_date_count' => $due_date_count,
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
	
/** END  ORG2 SECTION HERE===================================================================================== */

	/**START  EMAIL  all section  in this taks ================================================================*/
	/**Org1 Send notification to NGO by page "Focat Point Review" & **/
	public function send_notification_by_ngo_doc_request_org1(){
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
		
		$ngo_cycle_detail_url ='ngo/project/detail?id='.$project_id;
		//$ngo_cycle_detail_url =NGO_URL.'ngo/project/project_cycle_detail?id='.$project_id;
		
		
		$data_project = array(
			'project_status_for_ngo' => 'Document Requested',
			);
		$return_val = $this->db->update('project',$data_project,array('id' => $project_id));
			
		$data2 = array(
			'status' => 'NGO Document Request',
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
			'request_type' =>'project',
			 		
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
	
	/**Org2 Send notification by page "Cycle Assesments"**/
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
		
		$ngo_cycle_detail_url ='ngo/project/detail?id='.$project_id;
		//$ngo_cycle_detail_url =NGO_URL.'ngo/project/project_cycle_detail?id='.$project_id;
				
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
	/*send email org1 and brg2 by "Ngo docuemnts request" and "ngo Payment document request "*/
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
		$message .= '<p>'.$org_staff_name.' from '.$org_name.' has sent you a notification regarding your '.$p_name.'</p><br>';
		$message .= '<div>Notification: '.$notification_title.'</div>';
		$message .= '<div>'.$p_name.': '.$title.'</div>';
		$message .= '<div>Details: '.$desp.'</div><br>';
		$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		//$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		
		$message .= '<a href="'.NGO_URL.'ngo/project/detail?id='.$project_id.'">View Notification</a>'; 
		//$message .= '<a href="'.base_url().'ngo/project/detail?id='.$project_id.'">View Notification</a><br>'; 
		//print_r($message);
		
		$this->load->model('Email_model', 'obj_email', TRUE);
		$array = array(
			'subject' =>''.$org_name. '  has sent you a notification regarding your  '. $p_name.'',
			'msg' => $message,
			'to' => $ngo_staff_email,
			'to_name' => $brand_name,
		);
		
		//$this->obj_email->send_mail_in_ci($data);
		$this->obj_email->send_mail_in_sendinblue($array);
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
		//var_dump($org_staff_id);die;
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
			'to' =>   $staff_email,//'pradeepss269@gmail.com',
			'to_name' => $staff_name,
		);
		
		//var_dump($array);
		//$this->obj_email->send_mail_in_ci($data);
		$return_val= $this->obj_email->send_mail_in_sendinblue($array);
		//var_dump($return_val);
	}
	/* Send email task revesion request by page "Ngo desk review approval" & */
	public function send_email__task_revision_request($org_task_id_pre,$prop_id,$org_id,$org_staff_id,$ngo_id,$comments_no_approval){
		
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
		
		$sql_4 = 'SELECT * FROM `org_tasks` WHERE `org_task_id` = '.$org_task_id_pre ;
		$result_4 = $this->db->query($sql_4);
		if($result_4 && $result_4->num_rows()){
			$org_tasks_data = $result_4->result();
			$org_staff_id_recever = $org_tasks_data[0]->org_staff_id;
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
		
		$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id_recever ;
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$staff_data_recever = $result_5->result();
			$staff_name_recever = $staff_data_recever[0]->first_name.' '.$staff_data_recever[0]->last_name;
			$staff_email_recever = $staff_data_recever[0]->staff_email;
			
		}else{
			$staff_data_recever = '';
			$staff_name_recever = '';
			$staff_email_recever = '';
		}
		
		$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id ;
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$staff_data_sender = $result_5->result();
			$staff_name_sender = $staff_data_sender[0]->first_name.' '.$staff_data_sender[0]->last_name;
			$staff_email_sender = $staff_data_sender[0]->staff_email;
			
		}else{
			$staff_data_sender = '';
			$staff_name_sender = '';
			$staff_email_sender = '';
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
		$message .= 'Dear '.$staff_name_recever.' <br>';
		$message .= '<p>'.$staff_name_sender.' has requested you to revise your submission for your task for '.$org_name.'</p><br>';
		$message .= '<div>Task: '.$task_name.'</div>';
		$message .= '<div>NGO: '.$ngo_name.'</div>';
		$message .= '<div>Proposal/Project: '.$project_or_prop_name.'</div>';
		$message .= '<div>Revision Details:</div>'; 
		$message .= '<div>'.$comments_no_approval.'</div><br>'; 
		$message .= '<div>Please click on the link below to see the task:</div><br>'; 
		$message .= '<a href="'.base_url().'organisation/tasks/detail?id='.$org_task_id_pre.'&sourse=tasks">Go To Task</a>'; 
		//print_r($staff_email);die;
		$this->load->model('Email_model', 'obj_email', TRUE);
		//print_r($message);
		$array = array(
			'subject' => 'Please revise your submission: '.$task_name.' for '.$org_name,
			'msg' => $message,
			'to' =>   $staff_email_recever,//'pradeepss269@gmail.com',
			'to_name' => $staff_name_recever,
		);
		
		//var_dump($array);
		//$this->obj_email->send_mail_in_ci($data);
		$return_val= $this->obj_email->send_mail_in_sendinblue($array);
		//var_dump($return_val);
	}
	/* send email task revised by page "Ngo Desk Review" & "Proposaal Desk review" */
	public function send_email_task_revised($org_task_id_post,$org_task_id,$prop_id,$org_id){
		
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
			$org_staff_id_recever = $org_tasks_data[0]->org_staff_id;
			$task_name = $org_tasks_data[0]->org_task_label;
			$task_type = $org_tasks_data[0]->task_type;
			$requested_by = $org_tasks_data[0]->requested_by;
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
		$sql_reopen_task = 'SELECT * FROM `org_tasks` WHERE `org_task_id` = '.$org_task_id_post ;
		$result_reopen = $this->db->query($sql_reopen_task);
		if($result_reopen && $result_reopen->num_rows()){
			$org_reopen_task_data = $result_reopen->result();
			$org_staff_id_recever = $org_reopen_task_data[0]->org_staff_id;
			$task_name_reopen = $org_reopen_task_data[0]->org_task_label;
			$task_type = $org_reopen_task_data[0]->task_type;
			if($org_reopen_task_data[0]->due_date){
				$due_date = $org_reopen_task_data[0]->due_date;
			}else{
				$due_date = '--';
			}
			$project_id = $org_reopen_task_data[0]->project_id;
			//$prop_id = $org_reopen_task_data[0]->prop_id;
		}else{
			//$prop_id = 0;
			$project_id = 0;
			$org_staff_id = 0;
			$task_name = '';
			$task_type = '';
			$due_date = '';
		}
		
		$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id_recever ;
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$staff_data_recever = $result_5->result();
			$staff_name_recever = $staff_data_recever[0]->first_name.' '.$staff_data_recever[0]->last_name;
			$staff_email_recever = $staff_data_recever[0]->staff_email;
			
		}else{
			$staff_data_recever = '';
			$staff_name_recever = '';
			$staff_email_recever = '';
		}
		
		$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$org_staff_id_recever ;
		$result_5 = $this->db->query($sql_5);
		if($result_5 && $result_5->num_rows()){
			$staff_data_sender = $result_5->result();
			$staff_name_sender = $staff_data_sender[0]->first_name.' '.$staff_data_sender[0]->last_name;
			$staff_email_sender = $staff_data_sender[0]->staff_email;
			
		}else{
			$staff_data_sender = '';
			$staff_name_sender = '';
			$staff_email_sender = '';
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
		$message .= 'Dear '.$staff_name_sender.' <br>';
		$message .= '<p>'.$staff_name_recever.' has updated their submission for '.$task_name.' for '.$org_name.'. Your task '.$task_name_reopen.' has been reopened</p><br>';
		$message .= '<div>Task '.$task_name_reopen.'</div>';
		$message .= '<div>NGO: '.$ngo_name.'</div>';
		$message .= '<div>Proposal/Project: '.$project_or_prop_name.'</div>';
		$message .= '<div>Please click on the link below to see the task:</div><br>'; 
		$message .= '<a href="'.base_url().'organisation/tasks/detail?id='.$org_task_id_post.'&sourse=tasks">Go To Task</a>'; 
		//print_r($staff_email);die;
		$this->load->model('Email_model', 'obj_email', TRUE);
		//print_r($message);
		$array = array(
			'subject' => $staff_name_recever.' has updated their '.$task_name.' for '.$org_name,	
			'msg' => $message,
			'to' =>   $staff_email_recever,//'pradeepss269@gmail.com',
			'to_name' => $staff_name_recever,
		);
		
		//var_dump($array);
		//$this->obj_email->send_mail_in_ci($data);
		$return_val= $this->obj_email->send_mail_in_sendinblue($array);
		//var_dump($return_val);
	}
	/** ORG1 Docuemnt request  for ngo Payment  page "focal Point " & **/
	public function send_notification_by_payemnt_request_org1(){
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
		$ngo_cycle_detail_url ='ngo/project/detail?id='.$project_id;
		//$ngo_cycle_detail_url ='ngo/project/project_cycle_detail?id='.$project_id;
		//$ngo_cycle_detail_url =NGO_URL.'ngo/project/project_cycle_detail?id='.$project_id;
		
		$data_project = array(
			'project_status_for_ngo' => 'Document Requested',
			);
		$return_val = $this->db->update('project',$data_project,array('id' => $project_id));
			
		
		$data2 = array(
			'status' => 'NGO Document Request',
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
	
	/*Org 2 Document request for payment page "Cycle Assesments"**/
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
		$ngo_cycle_detail_url ='ngo/project/project_cycle_detail?id='.$project_id;
		//$ngo_cycle_detail_url =NGO_URL.'ngo/project/project_cycle_detail?id='.$project_id;
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
		
	public function ngo_notification_send_email_by_desk_review_approval($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title){
		
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
		$message .= '<p>'.$org_staff_name.' from '.$org_name.' has sent you a notification regarding your '.$p_name.'</p><br>';
		$message .= '<div>Notification: '.$notification_title.'</div>';
		$message .= '<div>'.$p_name.': '.$title.'</div>';
		$message .= '<div>Details: '.$desp.'</div><br>';
		$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		//$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		$message .= '<a href="'.NGO_URL.'ngo/entity/edit?id='.$ngo_id.'">View Notification</a><br>'; 
		//$message .= '<a href="'.base_url().'ngo/entity/edit?id='.$ngo_id.'">View Notification</a><br>'; 
		
		//print_r($ngo_staff_email);
		//print_r($message);
		
		//die;	
		
		$this->load->model('Email_model', 'obj_email', TRUE);
		$array = array(
			'subject' =>''.$org_name. '  has sent you a notification regarding your Proposal',
			'msg' => $message,
			'to' => $ngo_staff_email,
			'to_name' => $brand_name,
		);
		
		//$this->obj_email->send_mail_in_ci($data);
		$this->obj_email->send_mail_in_sendinblue($array);
	}
	/* Notuification send to ngo by page "beging proposal" & "field Visit Approval" & "leadership" & "SC Review"*/
	public function ngo_notification_send_email_by_begin_proposal($superngo_id,$prop_id,$org_id,$project_id,$ngo_id,$org_task_id,$desp,$notification_title){
		
		$sql_1 = 'SELECT id,brand_name FROM `superngo` WHERE `id` ='.$superngo_id;
		$result_1 = $this->db->query($sql_1);
		if($result_1 && $result_1->num_rows()){
			$superngo_data = $result_1->result();
			$brand_name = $superngo_data[0]->brand_name;
		}else{
			$brand_name = 0;
		}
		if($prop_id){
				$sql_2 = 'SELECT title,prop_id FROM `proposal` WHERE `prop_id` ='.$prop_id;
				$p_name='Proposal';
				
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
		$message .= '<p>'.$org_staff_name.' from '.$org_name.' has sent you a notification regarding your'.$p_name.'</p><br>';
		$message .= '<div>Notification: '.$notification_title.'</div>';
		$message .= '<div>'.$p_name.': '.$title.'</div>';
		$message .= '<div>Details: '.$desp.'</div><br>';
		$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		//$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		
		//$message .= '<a href="'.NGO_URL.'ngo/proposals/edit?id='.$prop_id.'">View Notification</a>'; 
		$message .= '<a href="'.base_url().'ngo/proposals/edit?id='.$prop_id.'">View Notification</a><br>'; 
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
	
	public function send_vandor_code_email_by_task_create($project_id,$org_task_id,$org_task_list_id,$org_id,$prop_id,$superngo_id,$ngo_id,$org_staff_id,$project_donor_id,$main_donor_id){
		//var_dump($_POST);die;
				
		$sql_1 = 'SELECT donor_id ,brand_name FROM `donor` WHERE `donor_id` ='.$main_donor_id;
		$result_1 = $this->db->query($sql_1);
		if($result_1 && $result_1->num_rows()){
			$main_donor_data = $result_1->result();
			$brand_name = $main_donor_data[0]->brand_name;
			//var_dump($brand_name);
		}else{
			$main_donor_data = '';
			$brand_name = 0;
		}
		
		$focal_point='';
		$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$ngo_id and org_id=$org_id and user_type='normal'" ;
		$result23 = $this->db->query($sql23)->result_array();
		if($result23){
			$staff_id_data=$result23[0]['staff_id'];
			$sql23 = "SELECT first_name,last_name FROM org_staff_account WHERE `staff_id`=$staff_id_data " ;
				$result23 = $this->db->query($sql23)->result_array();
				if($result23){
					$first_name = $result23[0]['first_name'];
					$last_name = $result23[0]['last_name'];
					$focal_point=$first_name .' '.$last_name;
					//var_dump($focal_point);
				}
			$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$staff_id_data ;
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
		
		$message ='';
		$message .= 'Dear '.$org_staff_name.' <br>';
		$message .= '<p>Please provide a Vendor Code for '.$ngo_name.'</p>';
		$message .= '<div>Please contact '.$focal_point.' for any further questions:</div>';
		
		//print_r($ngo_staff_email);
		//print_r($message);
		
		//die;	
		
		$this->load->model('Email_model', 'obj_email', TRUE);
		$array = array(
			'subject' =>'Requesting Vendor Code from '.$brand_name.' for '. $ngo_name.'',
			'msg' => $message,
			'to' => $org_staff_email,
			'to_name' => $org_staff_name,
		);
		
		//$this->obj_email->send_mail_in_ci($data);
		$return_val=$this->obj_email->send_mail_in_sendinblue($array);
		
		/*if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Vendor Code Send Successfully';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);*/
		
	}
	
	public function send_vandor_code_email(){
		//var_dump($_POST);die;
		//if($_POST){
			if(isset($_POST['project_id'])){
				$project_id=$_POST['project_id'];
			}else{
				$project_id=$project_id;
			}
			if(isset($_POST['org_task_id'])){
				$org_task_id=$_POST['org_task_id'];
			}else{
				$org_task_id=$org_task_id;
			}
			if(isset($_POST['org_task_list_id'])){
				$org_task_list_id=$_POST['org_task_list_id'];
			}else{
				$org_task_list_id=$org_task_list_id;
			}
			
			if(isset($_POST['org_id'])){
				$org_id=$_POST['org_id'];
			}else{
				$org_id=$org_id;
			}
			if(isset($_POST['prop_id'])){
				$prop_id=$_POST['prop_id'];
			}else{
				$prop_id=$prop_id;
			}
			if(isset($_POST['superngo_id'])){
				$superngo_id=$_POST['superngo_id'];
			}else{
				$superngo_id=$superngo_id;
			}
			if(isset($_POST['ngo_id'])){
				$ngo_id=$_POST['ngo_id'];
			}else{
				$ngo_id=$ngo_id;
			}
			if(isset($_POST['org_staff_id'])){
				$org_staff_id=$_POST['org_staff_id'];
			}else{
				$org_staff_id=$org_staff_id;
			}
			if(isset($_POST['project_donor_id'])){
				$project_donor_id=$_POST['project_donor_id'];
			}else{
				$project_donor_id=$project_donor_id;
			}
			if(isset($_POST['main_donor_id'])){
				$main_donor_id=$_POST['main_donor_id'];
			}else{
				$main_donor_id=$main_donor_id;
			}
			//$org_task_list_id=$_POST['org_task_list_id'];
			//$org_id=$_POST['org_id'];
			//$prop_id=$_POST['prop_id'];
			//$superngo_id=$_POST['superngo_id'];
			//$ngo_id=$_POST['ngo_id'];
			//$org_staff_id=$_POST['org_staff_id'];
			//$project_donor_id=$_POST['project_donor_id'];
			//$main_donor_id=$_POST['main_donor_id'];
			//var_dump($org_staff_id);
		/*}else{
			
			$org_task_id=$org_task_id;
			$org_task_list_id=$org_task_list_id;
			$org_id=$org_id;
			$prop_id=$prop_id;
			$superngo_id=$superngo_id;
			$ngo_id=$ngo_id;
			$org_staff_id=$org_staff_id;
			$project_donor_id=$project_donor_id;
			$main_donor_id=$main_donor_id;
		}*/
		
		
		$sql_1 = 'SELECT donor_id ,brand_name FROM `donor` WHERE `donor_id` ='.$main_donor_id;
		$result_1 = $this->db->query($sql_1);
		if($result_1 && $result_1->num_rows()){
			$main_donor_data = $result_1->result();
			$brand_name = $main_donor_data[0]->brand_name;
			//var_dump($brand_name);
		}else{
			$main_donor_data = '';
			$brand_name = 0;
		}
		
		$focal_point='';
		$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$ngo_id and org_id=$org_id and user_type='normal'" ;
		$result23 = $this->db->query($sql23)->result_array();
		if($result23){
			$staff_id_data=$result23[0]['staff_id'];
			$sql23 = "SELECT first_name,last_name FROM org_staff_account WHERE `staff_id`=$staff_id_data " ;
				$result23 = $this->db->query($sql23)->result_array();
				if($result23){
					$first_name = $result23[0]['first_name'];
					$last_name = $result23[0]['last_name'];
					$focal_point=$first_name .' '.$last_name;
					//var_dump($focal_point);
				}
			$sql_5 = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$staff_id_data ;
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
		}
		
		
		
		
		//die;
		/*if($prop_id){
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
			$org_staff_id1 = $org_tasks_data[0]->org_staff_id;
			//var_dump($org_staff_id1);die;		
			
		}else{
			$org_staff_id = 0;
			
		}*/
		
		
		
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
		
		$message ='';
		$message .= 'Dear '.$org_staff_name.' <br>';
		$message .= '<p>Please provide a Vendor Code for '.$ngo_name.'</p>';
		$message .= '<div>Please contact '.$focal_point.' for any further questions:</div>';
		
		//print_r($ngo_staff_email);
		//print_r($message);
		
		//die;	
		
		$this->load->model('Email_model', 'obj_email', TRUE);
		$array = array(
			'subject' =>'Requesting Vendor Code from '.$brand_name.' for '. $ngo_name.'',
			'msg' => $message,
			'to' => $org_staff_email,
			'to_name' => $org_staff_name,
		);
		
		//$this->obj_email->send_mail_in_ci($data);
		$return_val=$this->obj_email->send_mail_in_sendinblue($array);
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Vendor Code Send Successfully';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
		
	}
	
	public function get_org_status_list(){  
		//var_dump($_POST);die;
		$page_name=$_POST['page_name'];
		//var_dump($page_name);die;
		$org_id = $this->session->userdata('org_id'); 
			//var_dump($org_id);die;
		$sql="select * from org_status_list where org_id = $org_id AND page_name='$page_name'";
		$listdata = $this->db->query($sql)->result_array();
		//var_dump($org_status_data);
		$data_value = array();
		foreach ($listdata as $row) {
			$data = array(
				'id' => $row['id'],
				'title' => $row['status_lable'],
			);
			array_push($data_value, $data);
		}
		$arr_response['status'] = 200;
		$arr_response['listdata'] = $data_value;			
		
        echo json_encode($arr_response);
	}
	
	/** org1 Get FocalPoint data by page "project" &*/
	public function get_focal_point_list(){  
		$focal_point_array = array();
		$org_id = $this->session->userdata('org_id'); 
		$sql4="SELECT * FROM `organisation_roles` WHERE `is_deleted` = 0 ORDER BY `organisation_roles`.`role_name` ASC";
		$organisation_roles_data = $this->db->query($sql4)->result_array();
		//var_dump($organisation_roles_data);
		if($organisation_roles_data){
			foreach($organisation_roles_data as $val){
				$sql3="SELECT first_name,last_name,staff_id,staff_role_id FROM `org_staff_account` WHERE org_id=$org_id AND staff_status='Active' AND staff_role_id= ".$val['role_id']." ORDER BY `org_staff_account`.`first_name` ASC";
				$focal_point_data = $this->db->query($sql3)->result_array();
				//var_dump($focal_point_data);
				foreach ($focal_point_data as $row) {
					$data = array(
						'id' => $row['staff_id'],
						'title' => $row['first_name'].' '.$row['last_name'],
					);
					array_push($focal_point_array, $data);
					}
			}
		}
			
		//$data['sql_query1'] = '';
		//var_dump($focal_point_array);
		//$data['focal_point_data'] = $focal_point_array;
		
		/*$data_value = array();
		foreach ($listdata as $row) {
			$data = array(
				'id' => $row['id'],
				'title' => $row['status_lable'],
			);
			array_push($data_value, $data);
		}*/
		$arr_response['status'] = 200;
		$arr_response['focal_point_array'] = $focal_point_array;			
		
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
			'to' =>  $staff_email, //'pradeepss269@gmail.com',
			'to_name' => $staff_name,
		);
		//print_r($message);die;
		//$this->obj_email->send_mail_in_ci($data);
		$this->obj_email->send_mail_in_sendinblue($array);
	}
	
	
	public function get_multi_focal_point_id() {
		//var_dump($_POST);die;
		$multi_focal_point_id='';
		if($_POST['org_task_id']){
			$org_task_id=$_POST['org_task_id'];
			$sql_7 = 'SELECT additional_json FROM `org_tasks` WHERE `org_task_id` ='.$org_task_id;
			$result_7 = $this->db->query($sql_7)->result_array();
			if($result_7){
				$additional_json=$result_7[0]['additional_json'];
				if($additional_json){
					$additional_json=json_decode($additional_json);
					//var_dump($additional_json);
				$multi_focal_point_id=$additional_json[0]->multi_focal_point_id;
				}
				//var_dump($additional_json);
				
			}
		}
		if ($multi_focal_point_id) {	
			$arr_response['status'] = 200;
			//$arr_response['admin_city'] = $city_data;
			$arr_response['multi_focal_point_id'] = $multi_focal_point_id;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    
	}
	/** Org1 download pdf file page "field fisit Approval " and */
	public function download_pdf_file(){
		$this->load->helper('download');
		$new_prop_id=$_GET['new_prop_id'];
		$entity_code=$_GET['entity_code'];
		$file=$_GET['file'];
		$date = date('Y-m-d');
		$new_name=$new_prop_id.'-'.$entity_code.'-'.$date.'-'.'ApprovalSheet.pdf';
		//var_dump($new_name);die;
		if($file and $new_name){
			//$new_name='asif_alam.pdf';
			$data = file_get_contents($file);
		
			force_download($new_name, $data);
		}		
	}
	
	public function project_mou_and_aproval_history($project_id,$uploaded_type,$uploaded_file,$uploaded_file_actual){
		$data = array(
			'project_id' => $project_id ,
			'uploaded_type' => $uploaded_type,
			'uploaded_file' => $uploaded_file,
			'uploaded_file_actual' => $uploaded_file_actual,
			'uploaded_datetime' => date('Y-m-d H:i:s'),
		);
		$result2 = $this->db->insert('project_mou_and_aproval_history', $data);
	}
}
	



