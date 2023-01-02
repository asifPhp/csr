<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ngo extends CI_Controller {

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
	public function listing(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '7', 
			'submodule_id' => '10', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$where = '';
	    $data['status'] = '';
	    $status='';
	    $sstatus='';
		$data['sstatus'] = '';

		
		$organisation_id = $this->session->userdata('org_id');
		//var_dump($organisation_id);
		$sql = "SELECT * FROM `proposal` WHERE `organisation_id` = $organisation_id AND  `is_submit`=1 GROUP BY ngo_id ";
		$result = $this->db->query($sql);
	  // var_dump($result);
		$data_temp = array();
        $data_value = array();
		$data_couter = 0;
		$ngo_status='';
		$ngo_id='';
		$submission_time='';
		$status_counter_approved=0;
		$status_counter_unapproved=0;
		$count_live_project=0;
		if ($result && $result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				//var_dump($row);
				$sql1 = "SELECT * FROM `ngo` WHERE `id` =$row->ngo_id ";
				//var_dump($sql1);
				$result1 = $this->db->query($sql1);
				$ngo_status='';
				$superngo_name='';
				if ($result1 && $result1->num_rows() > 0) {
					$data_couter++ ;
					$sql2 = "SELECT * FROM `org_ngo_review_status` WHERE `ngo_id`=$row->ngo_id AND `org_id`=$organisation_id " ;
					//var_dump($sql2);
					$result2 = $this->db->query($sql2)->result_array();
					if($result2){
						$ngo_status = $result2[0]['status'];
						//var_dump($ngo_status);
					}	
					$sql21 = "SELECT * FROM `superngo` WHERE `id`=$row->superngo_id  " ;
					//var_dump($sql2);
					$result21 = $this->db->query($sql21)->result_array();
					if($result21){
						$superngo_name = $result21[0]['brand_name'];
					}
										
					$sql3 = "SELECT `submission_time` FROM `proposal` WHERE `ngo_id`=$row->ngo_id  AND `organisation_id`=$organisation_id ORDER BY submission_time DESC LIMIT 0" ;
					$result3 = $this->db->query($sql3)->result_array();
					if($result3){
							$submission_time = $result3[0]['submission_time'];
					}
					$sql4 = "SELECT `proposal_status` FROM `proposal` WHERE `ngo_id`=$row->ngo_id AND proposal_status_for_ngo='Submitted' AND `organisation_id`=$organisation_id" ;
					$result4 = $this->db->query($sql4);
					if($result4){
							$status_counter_approved = $result4->num_rows();
					}
					$sql5 = "SELECT `proposal_status` FROM `proposal` WHERE `ngo_id`=$row->ngo_id AND proposal_status='Rejected' AND `organisation_id`=$organisation_id" ;
					$result5 = $this->db->query($sql5);
					if($result5){
							$status_counter_unapproved = $result5->num_rows();
					}
					$sql6 = "SELECT `id` FROM `project` WHERE `ngo_id`=$row->ngo_id AND `organisation_id`=$organisation_id" ;
					$result6 = $this->db->query($sql6);
					if($result6){
						$count_live_project = $result6->num_rows();
						

					}

					$is_show = 'no';
					$data['status'] = '';
				    $status='';
				    $sstatus='';
				    $where='';
				    
				    if(isset($_GET['status'])){
						$status = $_GET['status'];
						$data['status'] = $_GET['status'];
						if($status=='New'){
							if(isset($_GET['sstatus']) && isset($_GET['sstatus'])!=''){
					     		$sstatus = $_GET['sstatus'];
								//var_dump($sstatus);
								
								$sstatus_arr = explode(",",$sstatus);
								
								$array_length = count($sstatus_arr);
								$counter = 0;
									foreach($sstatus_arr as $item) {
										if($item=='New' ||$item==' New'){
											$item="Pending";
										}
										
										$counter++;
										if($ngo_status==trim($item)){
											$is_show = 'yes';
										}
									}
							
					     	}else{
					     		if($ngo_status != 'Approved' && $ngo_status != 'Rejected' ){
									$is_show = 'yes';
								}
					     	}
					    }else if($status=='Approved'){
				    		if($ngo_status=='Approved'){
				    			$is_show = 'yes';
				    		}
						}else if($status=='Rejected'){
				    		if($ngo_status=='Rejected'){
				    			$is_show = 'yes';
				    		}
						}
								
				     }else{
				     	$data['status'] = 'New';
				     	$ngo_status=$ngo_status;
			     		if($ngo_status != 'Approved' && $ngo_status != 'Rejected' ){
							$is_show = 'yes';

						}
				     }
					 
					if($is_show == 'yes'){
						foreach ($result1->result() as $row1) {
							//var_dump($row1);
							if($ngo_status=='Pending' || $ngo_status=='' ){
								$ngo_status='New';
							}
							if (!array_key_exists($data_couter, $data_temp)) {
								$data_temp[$data_couter] = array();
							}
							if (array_key_exists($data_couter, $data_temp)) {
								$data_temp[$data_couter] = array(
									'id' => $row1->id,
									'ngo_id' => $row1->id,
									'organisation_id' => $organisation_id,
									'superngo_name' => $superngo_name,
									'superngo_id' => $row1->superngo_id,
									'legal_name'=> $row1->legal_name,
									'status'=> $ngo_status,
									'created_time'=> $row1->created_time,
									'update_datetime'=> $row1->update_datetime,
									'brand_name'=> $row1->brand_name,
									'submission_time'=> $submission_time,
									'status_counter_approved'=>$status_counter_approved,
									'status_counter_unapproved'=>$status_counter_unapproved,
									'count_live_project'=>$count_live_project,
									
								);

								array_push($data_value, $data_temp[$data_couter]);
							}
						}
					}
				}
			}
		}
	//var_dump($data_value);
		$data['ngo_list'] = $data_value;
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/ngo_listing',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	
	/*public function detail(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '7', 
			'submodule_id' => '10', 
			'staff_id' => $staff_id, 
			'page' => 'other1', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$organisation_id = $this->session->userdata('org_id');
		
		$ngo_id = $_GET['id'];
		$sql="SELECT * FROM `ngo` WHERE `id` =".$ngo_id ;
		$data['sql_query'] = $sql;
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/ngo_detail',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}*/
	
	public function detail(){
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
			'module_id' => '7', 
			'submodule_id' => '10', 
			'staff_id' => $staff_id, 
			'page' => 'other1', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		//var_dump($data['access_data']);
		//$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		
		if($data['entity_data']['superngo_id']){
			$superngo_id=$data['entity_data']['superngo_id'];
			$data['superngo_data'] = $this->obj_comman->get_by('superngo',array('id'=>$superngo_id),false,true);
		}
		$org_id = $this->session->userdata('org_id');
		if($data['entity_data']['id']){
			$ngo_id=$data['entity_data']['id'];
			//var_dump($ngo_id);
			$sql="SELECT * FROM `project` WHERE `ngo_id` = ".$ngo_id." AND `organisation_id`=".$org_id."";
				$data['project_data'] = $this->db->query($sql)->result_array();
				
			$sql2="SELECT status FROM `org_ngo_review_status` WHERE `ngo_id` = ".$ngo_id." ";
				$data['org_ngo_review_status_data'] = $this->db->query($sql2)->result_array();	
			
			$org_district = $this->obj_comman->get_query("select state_id, (select name from admin_states where id=ngo_district.state_id) as 'state_name' from ngo_district where ngo_id=$ngo_id group by state_id");
			foreach ($org_district as $key => $value) {
				$state_id=$value['state_id'];
				$sql="select district_id,(select name from admin_district where id=ngo_district.district_id) as 'district_name' from ngo_district where ngo_id=$ngo_id AND state_id=$state_id";

				$district = $this->obj_comman->get_query($sql);
				$org_district[$key]['district']=$district;
			}
			$data['ngo_geographies_data']=$org_district;
			
			
			
			
			
			//var_dump($data['org_ngo_review_status_data']);
		}
		
		
		$sql1="select *,(select org_name from organisation where org_id=proposal.organisation_id) as 'organisation' from proposal where ngo_id=$segment  AND `organisation_id`=".$org_id." AND is_deleted=0 AND proposal_status_for_ngo!='Created'";
		$data['proposal_data'] = $this->obj_comman->get_query($sql1);
		$prop_id=$data['proposal_data'][0]['prop_id'];
		//var_dump($prop_id);
		$sql_org_task1="SELECT additional_json,org_task_label FROM org_tasks WHERE prop_id=$prop_id AND  task_type='nrp' AND org_task_label='NGO Desk Review' ORDER BY org_task_id DESC ";
		$data['ngo_desk_review_task_data'] = $this->db->query($sql_org_task1)->result_array();
		
		$sql_org_task2="SELECT org_tasks.org_task_id,org_tasks.status,org_tasks.org_task_label,org_tasks.task_type,org_tasks.prop_id,org_tasks.due_date,org_staff_account.first_name,org_staff_account.last_name,org_staff_account.staff_id 
						FROM org_tasks 
						INNER JOIN org_staff_account ON org_tasks.org_staff_id=org_staff_account.staff_id
						WHERE 
						ngo_id=$segment AND status!='Completed' AND task_type='nrp' LIMIT 1";
		//var_dump($sql_org_task2);
		$data['current_task_data'] = $this->db->query($sql_org_task2)->result_array();
		
		//var_dump($data['current_task_data']);
		
		$data['edit_hide']='yes';
		$data['page_heading_disp']='yes';
		$data['page_splite']='yes';
		$data['page_col_md']='col-md-6';
		$data['ngo_notification']='';
		$data['pro_ngo_hide'] ='no';
		$data['back_ngo_list_button'] ='yes';
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
	    if($return_val){
			$this->load->view('organisation/pages/view_ngo_detail',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
}
