<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gc_requests extends CI_Controller {

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
	public function index(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '5', 
			'submodule_id' => '5', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');
		//var_dump($this->session->userdata());

		$where = '';
	    $data['status'] = '';
	    $status='';
		$data_temp = array();
		$data_value = array();
	    if(isset($_GET['status'])){
			$status = $_GET['status'];
			$data['status'] = $_GET['status'];
			if($status == 'unused' ){
				$sql="SELECT ngo.legal_name,ngo.id,superngo.brand_name,ngo_staff_account.first_name,ngo_staff_account.last_name,gc_ticket.gc_id,gc_ticket.upload_grand_ticket_value,gc_ticket.upload_grand_ticket_actual,gc_ticket.grant_time,gc_ticket.prop_id,gc_ticket.used_time 
					FROM ngo 
					INNER JOIN superngo ON ngo.superngo_id=superngo.id
					INNER JOIN ngo_staff_account ON superngo.id=ngo_staff_account.superngo_id
					INNER JOIN gc_ticket ON ngo.id=gc_ticket.ngo_id AND gc_ticket.prop_id=0
					WHERE ngo_staff_account.parent_id=0	AND gc_ticket.used=0 AND gc_ticket.org_id=$org_id ORDER BY ngo.id DESC";
				$db_result = $this->db->query($sql);
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						//var_dump($row);
						$gc_id=$row->gc_id;
						
							$pre_count = 0;
							$ngo_id_by_gc=0;
							$ngo_id=$row->id;
							if($ngo_id){
								$sql1="SELECT gc_id,ngo_id,org_id FROM `gc_ticket` WHERE `ngo_id`=$ngo_id AND org_id=$org_id ";
								$db_result1 = $this->db->query($sql1);
								if($db_result1){
									//var_dump($db_result1);
									$pre_count=$db_result1->num_rows();
									$db_result2=$db_result1->result();
									if($db_result2){
										//var_dump($db_result2);
										$ngo_id_by_gc=$db_result2[0]->ngo_id;
										//var_dump($ngo_id_by_gc);
									}
								}
							}
						//var_dump($status);	
						
						if($status=='unused'){
							//var_dump("unused");
							 if(!array_key_exists($row->id, $data_temp)) {
								$data_temp[$row->id] = array();
							}
							if(array_key_exists($row->id, $data_temp)) {
								$data_temp[$row->id] = array(
									'legal_name' => $row->legal_name,
									'brand_name' => $row->brand_name,
									'first_name' => $row->first_name,
									'last_name'=> $row->last_name,
									'ngo_id'=> $ngo_id,
									'gc_id'=> $row->gc_id,
									'pre_count'=> $pre_count,
									'ngo_id_by_gc'=> $ngo_id_by_gc,
									'upload_grand_ticket_value'=> $row->upload_grand_ticket_value,
									'upload_grand_ticket_actual'=> $row->upload_grand_ticket_actual,
									'grant_time'=> $row->grant_time,
									'prop_id'=> $row->prop_id,
									'used_time'=> $row->used_time,
									
								);
								array_push($data_value, $data_temp[$row->id]);
							}
						}
						
					}
				}
			}if($status == 'used' ){
				$sql="SELECT proposal.title,proposal.prop_id,ngo.legal_name,ngo.id,superngo.brand_name,ngo_staff_account.first_name,ngo_staff_account.last_name,gc_ticket.gc_id,gc_ticket.upload_grand_ticket_value,gc_ticket.upload_grand_ticket_actual,gc_ticket.grant_time,gc_ticket.used_time 
					FROM ngo 
					INNER JOIN superngo ON ngo.superngo_id=superngo.id
					INNER JOIN ngo_staff_account ON superngo.id=ngo_staff_account.superngo_id
					INNER JOIN gc_ticket ON ngo.id=gc_ticket.ngo_id  AND gc_ticket.prop_id !=0 
					INNER JOIN proposal ON ngo.id=proposal.ngo_id  AND gc_ticket.prop_id=proposal.prop_id  
					WHERE ngo_staff_account.parent_id=0	AND gc_ticket.org_id=$org_id  ORDER BY ngo.id DESC";
				$db_result = $this->db->query($sql);
				if ($db_result && $db_result->num_rows() > 0) {
					foreach ($db_result->result() as $row) {
						$gc_id=$row->gc_id;
						$pre_count = 0;
						$ngo_id_by_gc=0;
						$ngo_id=$row->id;
						$prop_id=$row->prop_id;
						//var_dump($prop_id);
						if($ngo_id){
							$sql1="SELECT gc_id,ngo_id,org_id FROM `gc_ticket` WHERE `ngo_id`=$ngo_id AND org_id=$org_id ";
							$db_result1 = $this->db->query($sql1);
							if($db_result1){
								//var_dump($db_result1);
								$pre_count=$db_result1->num_rows();
								$db_result2=$db_result1->result();
								if($db_result2){
									//var_dump($db_result2);
									$ngo_id_by_gc=$db_result2[0]->ngo_id;
									//var_dump($ngo_id_by_gc);
								}
							}
						}
						if(!array_key_exists($row->id, $data_temp)) {
							$data_temp[$row->id] = array();
						}
						if(array_key_exists($row->id, $data_temp)) {
							//var_dump("used");
							$data_temp[$row->id] = array(
								'legal_name' => $row->legal_name,
								'brand_name' => $row->brand_name,
								'first_name' => $row->first_name,
								'last_name'=> $row->last_name,
								'ngo_id'=> $ngo_id,
								'gc_id'=> $row->gc_id,
								'pre_count'=> $pre_count,
								'ngo_id_by_gc'=> $ngo_id_by_gc,
								'upload_grand_ticket_value'=> $row->upload_grand_ticket_value,
								'upload_grand_ticket_actual'=> $row->upload_grand_ticket_actual,
								'grant_time'=> $row->grant_time,
								'used_time'=> $row->used_time,
								'title'=> $row->title,
								'prop_id'=> $row->prop_id,
							);
							array_push($data_value, $data_temp[$row->id]);
						}
					}
				}
			}
		}
		else{
			$status='none_granted';
			$data['status'] = 'none_granted';
				//$sql="SELECT legal_name,id FROM ngo WHERE ngo_id IN(SELECT ngo_id FROM gc_ticket WHERE prop_id >0)";
				//SELECT ngo.legal_name,ngo.id,superngo.brand_name,gc_ticket.prop_id,gc_ticket.gc_id FROM ngo,superngo,gc_ticket
				
			$sql="SELECT ngo.legal_name,ngo.id,superngo.brand_name,ngo_staff_account.first_name,ngo_staff_account.last_name
					FROM ngo
					LEFT JOIN superngo ON ngo.superngo_id=superngo.id
					LEFT JOIN ngo_staff_account ON superngo.id=ngo_staff_account.superngo_id
					WHERE ngo_staff_account.parent_id=0  ORDER BY ngo.id DESC";
			$db_result = $this->db->query($sql);	
			if ($db_result && $db_result->num_rows() > 0) {
				foreach ($db_result->result() as $row) {
				//var_dump($row);
					$gc_id=0;
					$prop_id=0;
					$used_time='';
					$pre_count = 0;
					$ngo_id_by_gc=0;
					$ngo_id=$row->id;
					$data_push='yes';
					if($ngo_id){
						$sql1="SELECT gc_id,ngo_id,org_id,used,prop_id,used_time FROM `gc_ticket` WHERE `ngo_id`=$ngo_id AND org_id=$org_id";
						$db_result1 = $this->db->query($sql1);
						if($db_result1){
							$pre_count=$db_result1->num_rows();
							foreach ($db_result1->result() as $row1) {
								$used=$row1->used;
								//var_dump($used);
								$prop_id=$row1->prop_id;
								$gc_id=$row1->gc_id;
								$used_time=$row1->used_time;
								if($used==0 and $prop_id==0){
									//var_dump($row1);
									$data_push='no';
								}
							}
						}
					}
					if($data_push=='yes'){
						if(!array_key_exists($row->id, $data_temp)) {
							$data_temp[$row->id] = array();
						}
						if(array_key_exists($row->id, $data_temp)) {
							$data_temp[$row->id] = array(
								'legal_name' => $row->legal_name,
								'brand_name' => $row->brand_name,
								'first_name' => $row->first_name,
								'last_name'=> $row->last_name,
								'ngo_id'=> $ngo_id,
								'gc_id'=> $gc_id,
								'pre_count'=> $pre_count,
								//'ngo_id_by_gc'=> $ngo_id_by_gc,
								'prop_id'=> $prop_id,
								'used_time'=> $used_time,
							);
							array_push($data_value, $data_temp[$row->id]);
						}
					}
				}
			}
		}
		
		$data['none_granted_ngo_data'] = $data_value;
		
		//var_dump($data['none_granted_ngo_data']);
		
		
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/gc_requests_listing',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
		
	public function upload_grant_ticket(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '5', 
			'submodule_id' => '5', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');
		
		if(isset($_GET['id'])){
			$ngo_id=$_GET['id'];
			//var_dump($ngo_id);die;
		}

		$data_temp = array();
        $data_value = array();
		$sql="SELECT ngo.legal_name,ngo.id,superngo.brand_name,ngo_staff_account.first_name,ngo_staff_account.last_name 
				FROM ngo 
				INNER JOIN superngo ON ngo.superngo_id=superngo.id
				INNER JOIN ngo_staff_account ON superngo.id=ngo_staff_account.superngo_id
				WHERE ngo_staff_account.parent_id=0	AND ngo.id=$ngo_id";
		$db_result = $this->db->query($sql);
		
		if ($db_result && $db_result->num_rows() > 0) {
            foreach ($db_result->result() as $row) {
				//var_dump($row);
				 if(!array_key_exists($row->id, $data_temp)) {
                    $data_temp[$row->id] = array();
                }
                $pre_count = 0;
				$ngo_id=$row->id;
				if($ngo_id){
					$sql1="SELECT gc_id FROM `gc_ticket` WHERE `ngo_id`=$ngo_id AND org_id=$org_id";
					$db_result1 = $this->db->query($sql1);
					if($db_result1){
						$pre_count=$db_result1->num_rows();
					}
				}
				
                if(array_key_exists($row->id, $data_temp)) {
                    $data_temp[$row->id] = array(
                        'legal_name' => $row->legal_name,
						'brand_name' => $row->brand_name,
						'first_name' => $row->first_name,
						'last_name'=> $row->last_name,
						'ngo_id'=> $ngo_id,
						'pre_count'=> $pre_count,
					);
                    array_push($data_value, $data_temp[$row->id]);
                }
            }
		}
		
		$data['none_granted_ngo_data'] = $data_value;
		
		//die;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/upload_gc_ticket',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}

	public function update_proposal_gcresponse() {
		//var_dump($_POST);die;
        //array to store ajax responses
        $arr_response = array('status' => 500);
        $return_val ='';
        $error_message = 'Something went Wrong! Please try again';
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		
		$staff_id = $this->session->userdata('staff_id');
			$data = array(
				'gc_responded_by' => $staff_id, 
				'gc_responded' => 'yes', 
				'gc_responded_date' => date('Y-m-d H:i:s'), 
				'gc_granted' => $_POST['value'], 
				'gc_granted_date' => date('Y-m-d H:i:s'), 
			);
			$return_val = $this->obj_comman->update_data('proposal',$data,array('prop_id' => $_POST['id']));
			$message = 'Request responded successfully';			
		

		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = $error_message;
		}
        echo json_encode($arr_response);
    }
	
	
	public function submit_gc_ticket() {
		//var_dump($_POST);die;
        //array to store ajax responses
        $arr_response = array('status' => 500);
		
		$org_id=$this->session->userdata('org_id');
		
		//var_dump($this->session->userdata());die;
		//die;
		$ngo_id=$_POST['ngo_id'];
		$popup_show='';
		$insert='yes';
		//$this->gc_created_send_email_to_ngo($ngo_id);die;
		$db_result = $this->db->get_where('gc_ticket',array('org_id' => $org_id,'ngo_id' => $ngo_id,'used'=>0));
			if ($db_result->num_rows() > 0) {
				$popup_show='yes';
				$insert='no';
			}else{
				$popup_show='no';
				$data = array(
					'ngo_id' => $ngo_id, 
					'org_id' => $org_id, 
					'upload_grand_ticket_value' => $_POST['cycle_file_upload3'], 
					'upload_grand_ticket_actual' => $_POST['actual_disp3'], 
					'grant_time' => date('Y-m-d H:i:s'), 
					 
				);
				
				if($insert=='yes'){
					$return_val = $this->db->insert('gc_ticket',$data);
					$gc_id = $this->db->insert_id();	
					if($gc_id){
						$this->gc_created_send_email_to_ngo($ngo_id);
					}
				}
			}
		if ($popup_show) {
			$arr_response['status'] = 200;
			$arr_response['popup_show'] =$popup_show;
			$arr_response['message'] = 'GC Ticket Submitted Successfully';			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }	
	
	
	public function revoke_gc_ticket() {
		//var_dump($_POST);die;
        //array to store ajax responses
        $arr_response = array('status' => 500);
		
		//$org_id=$this->session->userdata('org_id');
		//die;
		$gc_id=$_POST['gc_id'];
		$return_val = $this->db->delete('gc_ticket',array('gc_id' => $gc_id));
		
		if ($return_val) {
			$arr_response['status'] = 200;
			//$arr_response['popup_show'] =$popup_show;
			$arr_response['message'] = 'GC Ticket Submitted Successfully';			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }
	/**Email Section */
	public function gc_created_send_email_to_ngo($ngo_id){
		
		$staff_id = $this->session->userdata('staff_id');
		$org_id=$this->session->userdata('org_id');
		//var_dump($staff_id);
		$sql_1 = "SELECT org_name FROM `organisation` WHERE `org_id`=$org_id ";
		$result_1 = $this->db->query($sql_1);
		if($result_1 && $result_1->num_rows()){
			$org_data = $result_1->result();
			$org_name = $org_data[0]->org_name;
			
		}else{
			$org_data='';
			$org_name='';
		}
		$org_owner_staff='no';		
		$sql_4 = "SELECT * FROM `org_staff_account` WHERE `staff_id`=$staff_id";
		$result_4 = $this->db->query($sql_4);
		if($result_4 && $result_4->num_rows()){
			$staff_data = $result_4->result();
			//var_dump($staff_data);die;
			$parent_id = $staff_data[0]->parent_id;
			//$staff_name = $staff_data[0]->first_name.' '.$staff_data[0]->last_name;
			//$staff_email = $staff_data[0]->staff_email;
			
			//var_dump($parent_id);
			if($parent_id==0){
				$org_owner_staff='yes';
				$org_owner_staff_name = $staff_data[0]->first_name.' '.$staff_data[0]->last_name;
				$org_owner_staff_email = $staff_data[0]->staff_email;
			}else{
				$org_owner_staff='yes';
				$sql_5 = "SELECT * FROM `org_staff_account` WHERE `staff_id`=$parent_id ";
				$result_5 = $this->db->query($sql_5);
				if($result_5 && $result_5->num_rows()){
					$staff_data1 = $result_5->result();
					$org_owner_staff_name = $staff_data1[0]->first_name.' '.$staff_data1[0]->last_name;
					$org_owner_staff_email = $staff_data1[0]->staff_email;
				}else{
					$staff_data1 = '';
					$org_owner_staff_name = '';
					$org_owner_staff_email = '';
				}
			}
			
		}else{
			$staff_data = '';
			$org_owner_staff_name = '';
			$org_owner_staff_email = '';
		}
		
		$sql_6 = 'SELECT staff_id FROM `ngo` WHERE `id` = '.$ngo_id ;
		$result_6 = $this->db->query($sql_6);
		if($result_6 && $result_6->num_rows()){
			$ngo_data = $result_6->result();
			$staff_id = $ngo_data[0]->staff_id;
			if($staff_id){
				$sql_7 = "SELECT * FROM `ngo_staff_account` WHERE ngo_staff_id=$staff_id";
				$result_7 = $this->db->query($sql_7);
				if($result_7 && $result_7->num_rows()){
					$ngo_staff_data = $result_7->result();
					//var_dump($ngo_staff_data);
					$parent_id=$ngo_staff_data[0]->parent_id;
					if($parent_id==0){
						$ngo_staff_name = $ngo_staff_data[0]->first_name.' '.$ngo_staff_data[0]->last_name;
						$ngo_staff_email = $ngo_staff_data[0]->staff_email;	
					}else{
						$sql_8 = "SELECT * FROM `ngo_staff_account` WHERE ngo_staff_id=$parent_id";
						$result_8 = $this->db->query($sql_8);
						if($result_8 && $result_8->num_rows()){
							$ngo_staff_data = $result_8->result();
							$ngo_staff_name = $ngo_staff_data[0]->first_name.' '.$ngo_staff_data[0]->last_name;
							$ngo_staff_email = $ngo_staff_data[0]->staff_email;
						}
					}
				
				}else{
					$ngo_staff_data = '';
					$ngo_staff_name = '';
					$ngo_staff_email = '';
				}
			
			}else{
				$ngo_name = '';
			}
		}
		
		$message ='';
		$message .= 'Dear '.$ngo_staff_name.' <br>';
		$message .= '<p>'.$org_name.' has granted you a single Green Channel Ticket. This means you will be able to submit one (and only one) proposal without filling out all the required fields about your organisation and proposal.</p>';
		$message .= '<p style="margin-bottom: 0px;"><b>However</b>, certain basic details and documents are compulsory, without which your proposal cannot be accepted. These include (but are not limited to):</p>';
		$message .= '<p style="margin: 0px;padding: 0px;padding-left: 26px;"> - 80G Registration</p>';
		$message .= '<p style="margin: 0px;padding: 0px;padding-left: 26px;"> - 12A Certification</p>';
		$message .= '<p style="margin: 0px;padding: 0px;padding-left: 26px;margin-bottom: 10px;">- CSR-1 Registration</p>';
		$message .= '<div>Please contact '.$org_owner_staff_name.' for any further questions:</div>'; 
		
		//$message .= '<a href="'.base_url().'organisation/tasks/detail?id='.$org_task_id.'&sourse=tasks">Go To Task</a>'; 
		//print_r($message);die;
		$this->load->model('Email_model', 'obj_email', TRUE);
		//print_r($return_val);
		
		$array = array(
			
			'subject' =>$org_name.' has granted you a Green Channel Ticket',
			'msg' => $message,
			'to' =>   $ngo_staff_email,//'pradeepss269@gmail.com',
			'to_name' => $ngo_staff_name,
		);
		
		//var_dump($array);
		//$this->obj_email->send_mail_in_ci($data);
		$return_val= $this->obj_email->send_mail_in_sendinblue($array);
		//var_dump($return_val);
	}
}
