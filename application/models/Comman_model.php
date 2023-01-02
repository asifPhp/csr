<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Comman_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }

	public function array_from_get($fields){
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->get($field);
        }
        return $data;
    }

	public function array_from_post($fields){
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function get_query($string,$single=false,$arry=false){
		$query = $this->db->query($string);		
		if($arry){
			if($single == TRUE) {
				$method = 'row';
			}
			else {
				$method = 'result';
			}
		}
		else{
			if($single == TRUE) {
				$method = 'row_array';
			}
			else {
				$method = 'result_array';
			}
		}
		//echo $this->db->last_query();die;
		return $query->$method(); 
	}

    public function get_by($table,$where,$order = false, $single = FALSE,$result_type=false){
        if($order){
			foreach($order as $set =>$value){				
	            $this->db->order_by($set,$value);
			}
		}
		if($where){
	        $this->db->where($where);
		}
		
        return $this->get($table, $single,$result_type);
    }

    public function get($table,$single = FALSE,$result_type=false){
      	if($single == TRUE) {//get 1 row
            $method = 'row_array';
			if($result_type==true){//get by object
	            $method = 'row';
			}
        } else {//get multi row
            $method = 'result_array';
			if($result_type==true){//get by object
	            $method = 'result';
			}
        }
        return $this->db->get($table)->$method();
    }
	

    public function update_data($table,$data,$where){
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
		
		return true;
    }
    public function insert_data($table,$data){
		$this->db->set($data);
		$this->db->insert($table);
		$last_id = $this->db->insert_id();		
		return $last_id;
    }
    public function org_assign_task($superngo_id,$ngo_id, $prop_id, $org_id){
		
		//$org_task_list_id = 1;
		//$org_task_label = 'NGO Review';
		//$view_file_name = 'organisation/pages/task/task_ngo_review';
		$sql_0 = 'SELECT * FROM `org_ngo_review_status` WHERE `org_id` = '.$org_id.' AND `ngo_id` = '.$ngo_id.' AND `status` LIKE "approved"';
		$result_0 = $this->db->query($sql_0);
		if($result_0 && $result_0->num_rows()){
			$sql_1 = 'SELECT * FROM `org_task_list` WHERE `org_id` = '.$org_id.' AND `task_type` LIKE "prp" ORDER BY `task_position` ASC';
			$result_1 = $this->db->query($sql_1);
			if($result_1 && $result_1->num_rows()){
				$row = $result_1->result();
				$org_task_list_id = ($row[0]->task_position);
				$org_task_label = ($row[0]->task_label);
				$view_file_name = ($row[0]->view_file_name);
				$due_date_count = ($row[0]->due_date_count);
				$org_task_list_id_increment = $org_task_list_id+1;
				$task_type = ($row[0]->task_type);
				
		
				/*$sql2="SELECT org_task_id FROM `org_tasks` WHERE `org_task_list_id`=$org_task_list_id_increment AND prop_id=$prop_id";
				$db_result2 = $this->db->query($sql2)->result_array();
				if($db_result2){
					$org_task_id_post = ($db_result2[0]['org_task_id']);
						
				}*/
			}
		}else{
			
			$sql_2 = 'SELECT * FROM `org_task_list` WHERE `org_id` = '.$org_id.' AND `task_type` LIKE "nrp" ORDER BY `task_position` ASC';
			$result_2 = $this->db->query($sql_2);
			if($result_2 && $result_2->num_rows()){
				$row_2 = $result_2->result();
				$org_task_list_id = ($row_2[0]->task_position);
				$org_task_label = ($row_2[0]->task_label);
				$view_file_name = ($row_2[0]->view_file_name);
				$due_date_count = ($row_2[0]->due_date_count);
				$task_type = ($row_2[0]->task_type);
			}
			//var_dump($row_2);die;
			//$org_task_list_id = 1;
			//$org_task_label = 'NGO Review';
			//$view_file_name = 'organisation/pages/task/task_ngo_review';
		}
		
		$sql = 'SELECT * FROM `org_staff_account` WHERE `org_id` = '.$org_id.' AND `parent_id` = 0';
		$result = $this->db->query($sql);
		if($result && $result->num_rows()){
			$row = $result->result();
			$created_date=date('Y-m-d');
			
			$due_date=date('Y-m-d', strtotime('+'.$due_date_count.' days'));
			$org_staff_id = $row[0]->staff_id;
			$data = array(
				'superngo_id' => $superngo_id,
				'ngo_id' => $ngo_id,
				'prop_id' => $prop_id,
				'org_id' => $org_id,
				'org_task_list_id' => $org_task_list_id,
				'org_task_label' => $org_task_label,
				'org_staff_id' => $org_staff_id,
				'view_file_name' => $view_file_name,
				'task_type' => $task_type,
				'created_date' => $created_date,
				'due_date' => $due_date,
				'due_date_count' => $due_date_count,
				'created_time' => date('H:i:s'),
			);
			//var_dump($data);die;
			$this->db->insert('org_tasks', $data);
			$org_task_id = $this->db->insert_id();
			/*if($org_task_id){
				$org_assigner_mgmt_data = array(
					'ngo_id' => $ngo_id,
					'prop_id' => $prop_id,
					'org_id' => $org_id,
					'user_type' => 'ngo normal',
					'staff_id' => $org_staff_id,
				);
				$this->db->insert('org_assigner_mgmt', $org_assigner_mgmt_data);
			}*/
			
			
			if($org_task_id){
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
						$due_date = '';
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
				if($task_type == 'prp' || $task_type == 'nrp'){
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
				$message .= '<a href="'.ORG_URL.'organisation/tasks/detail?id='.$org_task_id.'&sourse=tasks">Go To Task</a>'; 
				
				$this->load->model('Email_model', 'obj_email', TRUE);
				$array = array(
					'subject' => 'You have been assigned to the task: '.$task_name.' for '.$org_name ,
					'msg' => $message,
					'to' =>  $staff_email, 
					'to_name' => $staff_name,
				);
				
				//$this->obj_email->send_mail_in_ci($data);
				$this->obj_email->send_mail_in_sendinblue($array);

			}
		}
		return true;
    }
	
	
}
