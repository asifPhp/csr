<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	/**
     * Default constructor.
     * 
     * @access	public
     * @since	1.0.0
     */
    function __construct() {
        parent::__construct();
        if (!($this->session->userdata('loggedIN') == 1)) {
            redirect(base_url().'ngo/login');
        }		
    }
	

	/**
	 * admin List of plans for this controller.
	*/
	public function listing(){            
		/*this function is common for ngo and organisation for loading view 12/12/2020  */
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		$page='list';
		
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '5', 
			'submodule_id' => '5', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$superngo_id = $this->session->userdata('superngo_id');
		//var_dump($this->session->userdata);
		$where = '';
	    $data['status'] = '';
	    $status='';
	    $data['sstatus'] = '';
		$data['organisation_list'] = '';
		$data['ngo_list'] = '';
	    $sstatus='';
	    if(isset($_GET['status'])){
			$status = $_GET['status'];
			$data['status'] = $_GET['status'];
			if($status=='New'){
				if(isset($_GET['sstatus']) && isset($_GET['sstatus'])!=''){
					$data['sstatus'] = $_GET['sstatus'];
					$sstatus = $_GET['sstatus'];
					$sstatus_arr = explode(",",$sstatus);
					$where .= '  AND  (';
					$array_length = count($sstatus_arr);
					$counter = 0;
					foreach($sstatus_arr as $item) {
						$counter++;
						$where .= ' project_status_for_ngo="'.trim($item).'" ';
						if($array_length != $counter){
							$where .= ' or ';
						}
					}
					$where .= ') ';

				}else{
					$where .= ' AND project_status_for_ngo != "Completed"';
				}

			}
			if($status=='Completed'){
				$data['status'] = 'Completed';
				$status = 'Completed';
				$where .= ' AND project_status_for_ngo= "Completed" ';
			}
		}else{
			$data['status'] = 'New';
			$status = 'New';
			$where .= ' AND project_status_for_ngo != "Completed"';
			//var_dump($where);
		}
		
		if(isset($_GET['ngo_list']) && isset($_GET['ngo_list'])!=''){
			$data['ngo_list'] = $_GET['ngo_list'];
			$ngo_list = $_GET['ngo_list'];
			$ngo_list_arr = explode(",",$ngo_list);
			$where .= '  AND  (';
			$array_length = count($ngo_list_arr);
			$counter = 0;
			foreach($ngo_list_arr as $item) {
				$counter++;
				$where .= ' ngo_id="'.trim($item).'" ';
				if($array_length != $counter){
					$where .= ' or ';
				}
			}
			$where .= ') ';
		}
		//var_dump($where);
		if(isset($_GET['organisation_list']) && isset($_GET['organisation_list'])!=''){
			$data['organisation_list'] = $_GET['organisation_list'];
			$organisation_list = $_GET['organisation_list'];
			//var_dump($organisation_list);
			$organisation_list_arr = explode(",",$organisation_list);
			$where .= '  AND  (';
			$array_length1 = count($organisation_list_arr);
			$counter1 = 0;
			foreach($organisation_list_arr as $item1) {
				$counter1++;
				$where .= ' organisation_id="'.trim($item1).'" ';
				if($array_length1 != $counter1){
					$where .= ' or ';
				}
			}
			$where .= ') ';
		}
			
		$sql = "SELECT * FROM `project` WHERE `superngo_id`=$superngo_id ".$where." ORDER BY id DESC";
		$result = $this->db->query($sql);
	   //var_dump($sql);
		$data_temp = array();
        $data_value = array();
		$data_couter = 0;
		
		if ($result && $result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data_couter++ ;
				$assigned_to = '';
				if($row->ngo_id){
					$sql1="SELECT legal_name FROM `ngo` WHERE `id` =  ".$row->ngo_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$assigned_to = $db_result1[0]['legal_name'];
					}
				}
				if($row->organisation_id){
					$sql1="SELECT * FROM `organisation` WHERE `org_id` =".$row->organisation_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$org_name = $db_result1[0]['org_name'];
					}
				}
				if (!array_key_exists($data_couter, $data_temp)) {
					$data_temp[$data_couter] = array();
				}
				if (array_key_exists($data_couter, $data_temp)) {
					$data_temp[$data_couter] = array(
						'id' => $row->id ,
						'prop_id' => $row->prop_id ,
						'title' => $row->title,
						'superngo_id' => $row->superngo_id,
						'ngo_id' => $row->ngo_id,
						'legal_name'=>$assigned_to,
						'org_name'=>$org_name,
						'organisation_id' => $row->organisation_id,
						'project_status_for_ngo'=> $row->project_status_for_ngo,
						'project_start_date'=> $row->project_start_date,
						'project_end_date'=> $row->project_end_date,
						'updated_datetime'=> $row->updated_datetime,
					);
					array_push($data_value, $data_temp[$data_couter]);
				}
			}
		}
		$data['table_type'] = 'dataTables'; 
		$data['project_list'] = $data_value;
		$data['ngo_or_organisation'] = 'ngo';
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		
		if($return_val){
			$this->load->view('ngo/pages/project_listing',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	public function detail(){            
		/*this function is common for ngo and organisation for loading view 12/12/2020  */
		
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		$page='other1';
		
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '5', 
			'submodule_id' => '5', 
			'staff_id' => $staff_id, 
			'page' => 'other1', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$superngo_id = $this->session->userdata('superngo_id');
		$data['assigned_to'] ='';
		$id = $_GET['id'];
		//var_dump($id);die;
		$sqll="SELECT * FROM `project` WHERE `id` =".$id ." AND superngo_id = ".$superngo_id."";
		$data['sql_query'] = $sqll;
		$donor_data = array();
		$result = $this->db->query($sqll); 
		if ($result && $result->num_rows() > 0){
			$project_list_data = $result->result();
			
			$prop_id = $project_list_data[0]->prop_id;
			$ngo_id = $project_list_data[0]->ngo_id;
			
				$sql2="SELECT * FROM `ngo` WHERE `id` =".$ngo_id;
					$result2 = $this->db->query($sql2); 
					if ($result2 && $result2->num_rows() > 0){
						$data['ngo_data'] = $result2->result();
					}else{
						$data['ngo_data'] = '';
					}
				$sql4="SELECT * FROM `org_ngo_review_status` WHERE `ngo_id` =".$ngo_id;
					$result4 = $this->db->query($sql4); 
					if ($result4 && $result4->num_rows() > 0){
						$data['org_ngo_review_status'] = $result4->result();
					}else{
						$data['org_ngo_review_status'] = '';
					}
			$sql2="SELECT *, 
			(SELECT name FROM admin_category WHERE id=proposal.focus_category) AS 'admin_category' ,
			(SELECT name FROM admin_subcategory WHERE id=proposal.focus_subcategory) AS 'admin_subcategory',
			(SELECT registration_detail FROM ngo WHERE id=proposal.ngo_id) AS 'registration_detail',
			(SELECT category_array FROM ngo WHERE id=proposal.ngo_id) AS 'category_array' FROM proposal
			WHERE prop_id=$prop_id" ;
			//var_dump($sql2);
			$result2 = $this->db->query($sql2); 
			if ($result2 && $result2->num_rows() > 0){
				 $data['prop_data'] =$result2->result();
								
			}else{
				$data['prop_data'] = '';
			}
			
			$project_id = $project_list_data[0]->id;
			//var_dump($project_id);
			$sql3="SELECT * FROM `project_donors` WHERE `project_id` =".$project_id;
			$result2 = $this->db->query($sql3); 
			
			if ($result2 && $result2->num_rows() > 0){
				
				$project_donors_data = $result2->result();
				//var_dump($project_donors_data);
				$data['project_donors_data'] = $result2->result(); 
				foreach ($result2->result() as $row) {
					$sql4="SELECT * FROM `donor` WHERE `donor_id` =".$row->select_donor;
					$result3 = $this->db->query($sql4); 
					if ($result3 && $result3->num_rows() > 0){
						foreach ($result3->result() as $val) {
							$arrayName = array(
								'donor_id' => $val->donor_id,
								'org_id' => $val->org_id,
								'legal_name' => $val->legal_name,
							);
							array_push($donor_data,$arrayName);
							
						}		
					}
				}
				//var_dump($donor_data);
				$data['donors_data'] = $donor_data; 
			}else{
				$data['donors_data']='';
			}
		}
		$sql5="SELECT * FROM `ngo_notification` WHERE `project_id` =$project_id AND status='Pending' ORDER BY notification_id DESC" ;
		$result4 = $this->db->query($sql5); 
		
		if ($result4 && $result4->num_rows() > 0){
			$data['ngo_notification'] = $result4->result();
		}else{
			$data['ngo_notification'] = '';
		}
		
		$project_list = $this->db->query($sqll)->num_rows();
		if($project_list == 0){
			$return_val = false;
		}
		//var_dump($organisation_id);
		$sql3="SELECT * FROM `org_tasks` WHERE `superngo_id` = $superngo_id AND `status` != 'Completed' AND `project_id` = $project_id ORDER BY `org_tasks`.`org_task_id` DESC LIMIT 1" ;
		//var_dump($sql3);
		$result3 = $this->db->query($sql3); 
		//var_dump($result3);
		if ($result3 && $result3->num_rows() > 0){
			$data['org_tasks_data'] = $result3->result();
			$org_staff_id = $data['org_tasks_data'][0]->org_staff_id;
			
			$sql5="SELECT * FROM `org_staff_account` WHERE `staff_id` = ".$org_staff_id;
			$db_result1 = $this->db->query($sql5)->result_array();
			if($db_result1){
				$data['assigned_to'] = $db_result1[0]['first_name'] .' '.$db_result1[0]['last_name'];
			}else{
				$data['assigned_to'] ='';
			}
		}else{
			$data['org_tasks_data'] ='';
		}
		$sql41="SELECT * FROM `project_document` WHERE `project_id` =".$project_id." AND `document_type` LIKE 'csr_document_list'";
		$result51 = $this->db->query($sql41); 
		if ($result51 && $result51->num_rows() > 0){
			$data['csr_document_data'] = $result51->result();
			
		}else{
			$data['csr_document_data'] = '';
		}	
		//var_dump($id);
		$sql51="SELECT * FROM `project_document` WHERE `project_id` =".$project_id." AND `document_type` LIKE 'ngo_document_list'";
		$result61 = $this->db->query($sql51); 
		if ($result61 && $result61->num_rows() > 0){
			$data['ngo_document_data'] = $result61->result();
			
		}else{
			$data['ngo_document_data'] = '';
		}	
		$sql="SELECT * FROM `project_cycle_details` WHERE `project_id` =".$id ;
		$data['sql_query1'] = $sql;
		$data['table_type'] = 'dataTables'; 
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		
		if($return_val){
			$this->load->view('ngo/pages/project_detail',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	public function get_org_name(){    
		//var_dump($_POST);die;
		if(isset($_POST['org_id'])){
			$org_id=$_POST['org_id'];
			$sql2="SELECT org_id,org_name FROM organisation where org_id =$org_id ";
				$listdata2 = $this->db->query($sql2)->result_array();
				//var_dump($listdata2);
				$org_name=$listdata2[0]['org_name'];
						
			
			$arr_response['status'] = 200;
			$arr_response['org_name'] = $org_name;			
			
			echo json_encode($arr_response);
		}
	}
	
	
	
	public function donor_detail(){            
		
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		$page='other1';
		
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '5', 
			'submodule_id' => '5', 
			'staff_id' => $staff_id, 
			'page' => 'other1', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$superngo_id = $this->session->userdata('superngo_id');
		
		if(isset($_GET['donor_id'])){
			$donor_id = $_GET['donor_id'];
			
			$sqll="SELECT * FROM `donor` WHERE `donor_id` =".$donor_id."";
			$result = $this->db->query($sqll); 
			$donor_data = array();
			
			if ($result && $result->num_rows() > 0){
				
				foreach ($result->result() as $val) {
					
					$arrayName = array(
						'donor_id' => $val->donor_id,
						'org_id' => $val->org_id,
						'legal_name' => $val->legal_name,
						'brand_name' => $val->brand_name,
						'code' => $val->code,
						'pan_number' => $val->pan_number,
						'redistered_address' => $val->redistered_address,
						'city' => $val->city,
						'state' => $val->state,
						'pincode' => $val->pincode,
						'pan_image' => $val->pan_image,
						'auth_sign' => $val->auth_sign,
						'logo_image' => $val->logo_image,
						'donor_image' => $val->donor_image,
						'art_image' => $val->art_image,
						'facebook' => $val->facebook,
						'instagram' => $val->instagram,
						'twitter' => $val->twitter,
						'linkedin' => $val->linkedin,
						'created_date' => $val->created_date,
						'created_time' => $val->created_time,
						'update_datetime' => $val->update_datetime,
						'is_deleted' => $val->is_deleted,
					);
					array_push($donor_data,$arrayName);
							
				}
				$data['donors_data'] = $donor_data; 
			}
		}
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		
		if($return_val){
			$this->load->view('ngo/pages/donor_detail',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	public function project_cycle_detail(){            
		
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		$page='other1';
		
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '5', 
			'submodule_id' => '5', 
			'staff_id' => $staff_id, 
			'page' => 'other1', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$superngo_id = $this->session->userdata('superngo_id');
		
		if(isset($_GET['id'])){
			$project_cycle_id = $_GET['id'];
			
			$sql5="SELECT * FROM `ngo_notification` WHERE `cycle_id` =".$project_cycle_id;
			$result4 = $this->db->query($sql5); 
			
			if ($result4 && $result4->num_rows() > 0){
				$data['ngo_notification'] = $result4->result();
			}else{
				$data['ngo_notification'] = '';
			}
			
			$sqll="SELECT * FROM `project_cycle_details` WHERE `project_cycle_id` =".$project_cycle_id."";
			$result = $this->db->query($sqll); 
			$project_cycle_data = array();
			
			if ($result && $result->num_rows() > 0){
				
				foreach ($result->result() as $val) {
					
					$sql="SELECT * FROM `project` WHERE `id` =".$val->project_id;
					$result1 = $this->db->query($sql); 
					if ($result1 && $result1->num_rows() > 0){
						$data['project_data'] = $result1->result();
						$ngo_id = $data['project_data'][0]->ngo_id;
						$organisation_id = $data['project_data'][0]->organisation_id;
						
						$sql2="SELECT * FROM `ngo` WHERE `id` =".$ngo_id;
						$result2 = $this->db->query($sql2); 
						if ($result2 && $result2->num_rows() > 0){
							$data['ngo_data'] = $result2->result();
						}else{
							$data['ngo_data'] = '';
						}
						$sql4="SELECT * FROM `org_tasks` WHERE `org_id` = $organisation_id AND `status` != 'Complete' AND `project_id` = ".$val->project_id." ORDER BY `org_tasks`.`org_task_id` DESC LIMIT 1" ;
						$result4 = $this->db->query($sql4); 
						
						if ($result4 && $result4->num_rows() > 0){
							$data['org_tasks_data'] = $result4->result();
							$org_staff_id = $data['org_tasks_data'][0]->org_staff_id;
							
							$sql5="SELECT * FROM `org_staff_account` WHERE `staff_id` = ".$org_staff_id;
							$db_result1 = $this->db->query($sql5)->result_array();
							if($db_result1){
								$data['assigned_to'] = $db_result1[0]['first_name'] .' '.$db_result1[0]['last_name'];
							}else{
								$data['assigned_to'] ='';
							}
						}else{
							$data['org_tasks_data'] ='';
						}
						$sql6="SELECT * FROM `project_document` WHERE `project_id` =".$val->project_id." AND `document_type` LIKE 'csr_document_list'";
						$result5 = $this->db->query($sql6); 
						if ($result5 && $result5->num_rows() > 0){
							$data['csr_doc_data'] = $result5->result();
						}else{
							$data['csr_doc_data'] = '';
						}
						$sql7="SELECT * FROM `project_document` WHERE `project_id` =".$val->project_id." AND `document_type` LIKE 'ngo_document_list'";
						$result6 = $this->db->query($sql7); 
						if ($result6 && $result6->num_rows() > 0){
							$data['ngo_doc_data'] = $result6->result();
						}else{
							$data['ngo_doc_data'] = '';
						}		
						
						$sql8="SELECT * FROM `project_document` WHERE `project_id` =".$val->project_id." AND `document_type` LIKE 'payment_processing_doc'";
						$result7 = $this->db->query($sql8); 
						if ($result7 && $result7->num_rows() > 0){
							$data['ngo_payment_doc'] = $result7->result();
						}else{
							$data['ngo_payment_doc'] = '';
						}
						$sql3="SELECT * FROM `organisation` WHERE `org_id` =".$organisation_id;
						$result3 = $this->db->query($sql3); 
						if ($result3 && $result3->num_rows() > 0){
							$data['org_data'] = $result3->result();
						}else{
							$data['org_data'] = '';
						}
					}
					
					$arrayName = array(
						'project_cycle_id' => $val->project_cycle_id,
						'project_id' => $val->project_id,
						'org_id' => $val->org_id,
						'superngo_id' => $val->superngo_id,
						'org_staff_id' => $val->org_staff_id,
						'cycle_name' => $val->cycle_name,
						'cycle_start_date1' => $val->cycle_start_date1,
						'cycle_end_date2' => $val->cycle_end_date2,
						'is_payment' => $val->is_payment,
						'donor_dropdown' => $val->donor_dropdown,
						'donor_dropdown_id' => $val->donor_dropdown_id,
						'cycle_donor_amount' => $val->cycle_donor_amount,
						'ngo_payment' => $val->ngo_payment,
						//'ngo_payment_actual' => $val->ngo_payment_actual,
						'ngo_doc' => $val->ngo_doc,
						'csr_doc' => $val->csr_doc,
						'created_time' => $val->created_time,
						'cycle_status' => $val->cycle_status,
						'is_deleted' => $val->is_deleted,
						'is_completed' => $val->is_completed,
						'payment_date_time' => $val->payment_date_time,
						'is_payment_made' => $val->is_payment_made,
						'payment_proof' => $val->payment_proof,
						//'payment_proof_actual' => $val->payment_proof_actual,
					);
					array_push($project_cycle_data,$arrayName);
							 
					$sql4="SELECT * FROM `project_document` WHERE `project_id` =".$val->project_id." AND `document_type` LIKE 'payment_processing_doc'";
					$result5 = $this->db->query($sql4); 
					if ($result5 && $result5->num_rows() > 0){
						$data['payment_doc_data'] = $result5->result();
						
					}else{
						$data['payment_doc_data'] = '';
					}	
					
					$sql5="SELECT * FROM `project_document` WHERE `project_id` =".$val->project_id." AND `document_type` LIKE 'ngo_document_list'";
					$result6 = $this->db->query($sql5); 
					if ($result6 && $result6->num_rows() > 0){
						$data['ngo_document_data'] = $result6->result();
						
					}else{
						$data['ngo_document_data'] = '';
					}		
					
				}
				$data['project_cycle_data'] = $project_cycle_data; 
			}else{
				$data['project_cycle_data'] ='';
			}
		}
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		
		if($return_val){
			$this->load->view('ngo/pages/project_cycle_detail',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	public function update_cycle_data(){            
		
		if(isset($_POST['payment_arr'])){
			$payment_arr = $_POST['payment_arr'];
		}else{
			$payment_arr = [];
		}
		
		if(isset($_POST['payment_arr'])){
			$payment_doc_arr = $_POST['payment_doc_arr'];
		}else{
			$payment_doc_arr = [];
		}
		
		
		if($payment_arr){
			foreach ($payment_arr as $val) {
				$data = array(
					'document_value' => $val['document_value'],
					'document_value_actual' => $val['document_value_actual'],
				);
				$result = $this->db->update('project_document', $data, array('id '=>$val['document_id']));	
			}
		}
		
		if($payment_doc_arr){
			foreach ($payment_doc_arr as $val) {
				$data = array(
					'document_value' => $val['document_value'],
					'document_value_actual' => $val['document_value_actual'],
				);
				$result = $this->db->update('project_document', $data, array('id '=>$val['document_id']));	
			}
		}
		$arr_response['status'] = 200;	
		$arr_response['message'] = 'Saved Successfully';
		echo json_encode($arr_response);
		
	}
	public function resolved_submit(){            
		//var_dump($_POST);die;
		$notification_id=$_POST['notification_id_send'];
		$org_task_id=$_POST['org_task_id_send'];
		$org_id=$_POST['org_id_send'];
		$ngo_id=$_POST['ngo_id_send'];
		$superngo_id=$_POST['superngo_id_send'];
		$project_id=$_POST['project_id_send'];
		$document_type=$_POST['document_type_send'];
		$notification_title='';
		if($document_type=='payment_processing_doc'){
			$notification_title="NGO Payemnt Document Request Resolved";
		}else{
			$notification_title="Project Evaluation Document Request Resolved";
		}
		$data = array(
			'status' =>'NGO Revised',
		);
		//var_dump($data);die;
			$result = $this->db->update('org_tasks', $data, array('org_task_id '=>$org_task_id));	
		if($result){
			$data1 = array(
					'status' =>"Resolved",
			);
			$return_val = $this->db->update('ngo_notification', $data1, array('notification_id '=>$notification_id));	
			
			$data_prpject = array(	
					'project_status_for_ngo' =>"Setup In Progress",
			);
			$return_val1 = $this->db->update('project', $data_prpject, array('id '=>$project_id));	
		
		}
			//var_dump($return_val,);die;
		if($return_val1=='true'){
			$this->ngo_to_org_send_email_ducument_request($superngo_id,$org_id,$project_id,$org_task_id,$ngo_id,$notification_title);
		}	
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Notification successfully resolved ';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
		
	}
	/*NGO to ORG1 & ORG2 docuemnt resolve email **/
	public function ngo_to_org_send_email_ducument_request($superngo_id,$org_id,$project_id,$org_task_id,$ngo_id,$notification_title){
		//var_dump($notification_title);die;
		$sql_1 = 'SELECT id,brand_name FROM `superngo` WHERE `id` ='.$superngo_id;
		$result_1 = $this->db->query($sql_1);
		if($result_1 && $result_1->num_rows()){
			$superngo_data = $result_1->result();
			$brand_name = $superngo_data[0]->brand_name;
		}else{
			$brand_name = 0;
		}
		$sql_2 = 'SELECT title,id FROM `project` WHERE `id` ='.$project_id;
		$result_2 = $this->db->query($sql_2);
		if($result_2 && $result_2->num_rows()){
			$project_data = $result_2->result();
			$project_title = $project_data[0]->title;	
		}else{
			$project_data = '';
			$project_title = 0;
		}
		//var_dump($title);die;
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
		//var_dump($org_staff_name);die;
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
		$message .= 'Dear '.$org_staff_name.' <br>';
		$message .= '<p>'.$ngo_staff_name.' from '.$ngo_name.' has resolved your '.$notification_title.' regarding the Project '.$project_title.'</p><br>';
		
		$message .= '<div>Please click on the link below to see their updates:</div><br>'; 
		//$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		$message .= '<a href="'.ORG_URL.'organisation/tasks/detail?id='.$org_task_id.'&sourse=tasks">Go to Task</a>'; 
		//$message .= '<a href="'.base_url().'organisation/tasks/detail?id='.$org_task_id.'&sourse=tasks">Go to Task</a>'; 
		
		
		$this->load->model('Email_model', 'obj_email', TRUE);
		$array = array(
			'subject' =>''.$ngo_name. ' has updated their Project ' .$project_title.'' ,
			'msg' => $message,
			'to' =>   $org_staff_email,//'mdasifalam48@gmail.com',
			'to_name' => $brand_name,
		);
		
		//$this->obj_email->send_mail_in_ci($data);
		$this->obj_email->send_mail_in_sendinblue($array);
	}
	
}
