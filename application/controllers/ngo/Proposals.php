<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposals extends CI_Controller {

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
	 * Index Page(plans) for this controller.
	 */
	public function index()	{
		$segment = 0;
		if(isset($_GET['id'])){
			$segment = $_GET['id'];
			$page='edit';
			$data['edit_with_add']='no';
		}
		if(isset($_GET['prop_id'])){
			$segment = $_GET['prop_id'];
			$page='add';
			$data['edit_with_add']='yes';
		}
		else{
			$segment =0;
			$page='add';
			$data['edit_with_add']='no';
		}
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '7', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['proposal_data'] = $this->obj_comman->get_by('proposal',array('prop_id'=>$segment),false,true);
		$data['organisation_data'] = $this->obj_comman->get_by('organisation',array('org_status'=>'active','is_deleted'=>'0'));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('is_deleted'=>'0','superngo_id'=>$superngo_id));
		$data['category_data'] = $this->db->get('admin_category')->result_array();
		$data['subcategory_data'] = $this->db->get('admin_subcategory')->result_array();
		$data['admin_states'] = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		$data['admin_city'] = $this->obj_comman->get_by('admin_city','', array('name' => 'asc'));
		$data['page_counter']=3;
		$data['current_page'] = '1';
		
		$sql="SELECT ngo.legal_name,ngo.id,ngo.code,organisation.org_name,organisation.org_id,proposal.title,proposal.prop_id,proposal.new_prop_id 
					FROM proposal 
					INNER JOIN ngo ON ngo.id=proposal.ngo_id
					INNER JOIN organisation ON organisation.org_id=proposal.organisation_id
					WHERE proposal.is_deleted=0	 ORDER BY proposal.prop_id DESC";
				$data['proposal_dropdown_data'] = $this->db->query($sql)->result_array();
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/proposals/add_proposals',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}

	/**
	 * admin Add plan for this controller.
	*/
	public function update_proposals() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
        $return_val ='';
        $error_message = 'Something went Wrong! Please try again';
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$superngo_id = $this->session->userdata('superngo_id');
		$ngo_staff_id = $this->session->userdata('ngo_staff_id');
		
		$prop_id=$_POST['prop_id'];
		$data=$_POST['table_field'];
		if($this->check_entity_code()){
			if($prop_id == 0){
				
					//$data['code'] = $_POST['code'];
					$data['ngo_staff_id'] = $ngo_staff_id;
					$data['superngo_id'] = $superngo_id;
					$data['created_time'] = date('Y-m-d H:i:s');
					$return_val = $this->obj_comman->insert_data('proposal',$data); 
					$message = 'Successfully added';
					$prop_id=$return_val;
				
			} else{
				$return_val = $this->obj_comman->update_data('proposal',$data,array('prop_id' => $_POST['prop_id']));
				$message = 'Successfully updated';			
		    }
		}else{
			$error_message = 'This code is assinged to an proposal';
		}
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
			$arr_response['prop_id'] = $prop_id;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = $error_message;
		}
        echo json_encode($arr_response);
    }
	
	public function change_org_ngo_review_status() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
        $return_val ='';
        $error_message = 'Something went Wrong! Please try again';
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$ngo_id=$_POST['ngo_id'];
		$organisation_id=$_POST['organisation_id'];
		
		$data['ngo_id'] = $_POST['ngo_id'];
		$data['org_id'] = $_POST['organisation_id'];
		$data['status'] = 'Pending';
		
		//$return_val = $this->db->delete('org_ngo_review_status',array('ngo_id' => $ngo_id,'org_id' => $organisation_id));
		
		$sql_0 = 'SELECT * FROM `org_ngo_review_status` WHERE `org_id` = '.$organisation_id.' AND `ngo_id` = '.$ngo_id.'';
		$result_0 = $this->db->query($sql_0);
		if($result_0 && $result_0->num_rows()){
			
		}else{
			$return_val = $this->obj_comman->insert_data('org_ngo_review_status',$data); 
		}	
			
		
		$message = 'Successfully added';
					
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = $error_message;
		}
        echo json_encode($arr_response);
    }

    public function submit_proposals() {
        //array to store ajax responses
		//var_dump($_POST);die;
        $arr_response = array('status' => 500);
        $return_val ='';
        $error_message = 'Something went Wrong! Please try again';
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$superngo_id = $this->session->userdata('superngo_id');
		$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$data=$_POST['table_field'];
		
		if(isset($_POST['gc_id'])){
			$gc_id=$_POST['gc_id'];
			$gc_data = array(
				  'used_time'=>date('Y-m-d H:i:s'),				 
				  'used'=>1,				 
				  'prop_id'=>$prop_id,				 
				);
			$return_val = $this->obj_comman->update_data('gc_ticket',$gc_data,array('gc_id' =>$gc_id));
		}
		//$data['code'] = $_POST['code'];
				
		$data['submission_time'] = date('Y-m-d H:i:s');
		//var_dump($data);die;
		$return_val = $this->obj_comman->update_data('proposal',$data,array('prop_id' => $_POST['prop_id']));
		$message = 'Successfully updated';			
	
		$org_id = $_POST['organisation_id'];
		$return_val = $this->obj_comman->org_assign_task($superngo_id,$ngo_id,$_POST['prop_id'], $org_id);
			
			
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
			$arr_response['prop_id'] = $prop_id;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = $error_message;
		}
        echo json_encode($arr_response);
    } 
    public function submit_proposal_gcrequest() {
		//var_dump($_POST);die;
        //array to store ajax responses
        $arr_response = array('status' => 500);
        $return_val ='';
        $error_message = 'Something went Wrong! Please try again';
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$superngo_id = $this->session->userdata('superngo_id');
		$prop_id=$_POST['prop_id'];
		$data=$_POST['table_field'];
		
			//$data['code'] = $_POST['code'];
			$data['gc_requested_date'] = date('Y-m-d H:i:s');
			//var_dump($data);die;
			$return_val = $this->obj_comman->update_data('proposal',$data,array('prop_id' => $_POST['prop_id']));
			$message = 'Green chanal request done successfully';			
		

		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
			$arr_response['prop_id'] = $prop_id;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = $error_message;
		}
        echo json_encode($arr_response);
    }

    public function check_entity_code() {
    	if(isset($_POST['code'])){
			$this->load->model('Comman_model', 'obj_comman', TRUE);
			$result = $this->obj_comman->get_by('proposal',array('code'=> $_POST['code']));
	        if ($result) {
		        return false;
	        } else {
	           	return true;
	        }
	    }else{
	    	return true;
	    }
	}

	/**
	 * admin List of plans for this controller.
	*/
	public function list(){
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		//var_dump($data['access_data']);
		
		
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['profile_data'] = $this->obj_comman->get_by('superngo',array('id'=> $this->session->userdata('superngo_id')),false,true);
		
		$data['status'] = '';
		$data['sstatus'] = '';
		$data['organisation_list'] = '';
		$data['ngo_list'] = '';
		$where = '';
		$where1 = '';
		$status='';
		$sstatus='';
		$proposal_status_for_ngo='';
		$GC_Requested = 'no';
		$GC_Approved = 'no';
		$GC_Rejected = 'no';
		$is_submitted = 'no';
		$is_created = 'no';
		$array_length_1 = 0;
		
		
		if(isset($_GET['status'])){
			$status = $_GET['status'];
			$data['status'] = $_GET['status'];
			if($status=='Review'){
				
				if(isset($_GET['sstatus']) && isset($_GET['sstatus'])!=''){
					$data['sstatus'] = $_GET['sstatus'];
					$sstatus = $_GET['sstatus'];
					$sstatus_arr = explode(",",$sstatus);
					
					
					$array_length_1 = count($sstatus_arr);
					if($array_length_1){
						foreach($sstatus_arr as $item) {
							
							if($item=='GC: Requested' || $item==' GC: Requested'){
								$GC_Requested = 'yes';
							}
							if($item=='GC: Approved' || $item==' GC: Approved' ){
								$GC_Approved = 'yes';
							}
							if($item=='GC: Rejected' || $item==' GC: Rejected' ){
								$GC_Rejected = 'yes';
							}
						}
					}
					$del_val = 'GC: Requested';
					if (($key = array_search($del_val, $sstatus_arr)) !== false) {
						unset($sstatus_arr[$key]);
					}
					$del_val = 'GC: Approved';
					if (($key = array_search($del_val, $sstatus_arr)) !== false) {
						unset($sstatus_arr[$key]);
					}
					$del_val = 'GC: Rejected';
					if (($key = array_search($del_val, $sstatus_arr)) !== false) {
						unset($sstatus_arr[$key]);
					}
					$del_val = ' GC: Requested';
					if (($key = array_search($del_val, $sstatus_arr)) !== false) {
						unset($sstatus_arr[$key]);
					}
					$del_val = ' GC: Approved';
					if (($key = array_search($del_val, $sstatus_arr)) !== false) {
						unset($sstatus_arr[$key]);
					}
					$del_val = ' GC: Rejected';
					if (($key = array_search($del_val, $sstatus_arr)) !== false) {
						unset($sstatus_arr[$key]);
					}
					
					$array_length = count($sstatus_arr);
					if($array_length){
						//$where .= '  AND  (';
						$counter = 0;
						foreach($sstatus_arr as $item) {
							$counter++;	
							//$where .= ' proposal_status_for_ngo="'.trim($item).'" ';
							if($array_length != $counter){
							//	$where .= ' or ';
							}
						}
						$sub='';
						$s_c = 0;
						$sstatus_arr1 = explode(",",$sstatus);
						foreach($sstatus_arr1 as $item1) {
							if($item1==' Submitted' || $item1=='Submitted'){
								$sub=$item1;
								$is_submitted='yes';
							}
							if($item1==' Created' || $item1=='Created'){
								$sub=$item1;
								$is_created='yes';
							}
							/*
							if($item1=='GC: Requested' || $item1=='GC: Approved' || $item1=='GC: Rejected'){
								$where1 .= ' gc_requested="yes" ';
							}
							if($item1=='GC: Requested'){
								$s_c++;
								if($s_c == 1){
									$where1 .= '  AND  (';
									$where1 .= ' gc_granted !="no" and';
								}
							}*/
						}
						if($sub){
							//$where .= ' or  proposal_status_for_ngo="NGO Review Pending"  or  proposal_status_for_ngo="NGO Decision Pending" or  proposal_status_for_ngo="Proposal Initial Review Pending"  or  proposal_status_for_ngo="Proposal Final Review Pending" ';
						}
						//$where .= ') ';
					}else{
						$where .= ' AND proposal_status_for_ngo != "Approved" AND proposal_status_for_ngo !="Rejected" AND proposal_status_for_ngo !="Submitted"';
					}
						
				}
				//print_r($where);
			}else if($status=='Submitted'){
				$data['status'] = 'Submitted';
				$status = 'Submitted';
				$where .= ' AND proposal_status_for_ngo = "Submitted" ';

			}else if($status=='Approved'){
				$data['status'] = 'Approved';
				$status = 'Approved';
				$where .= ' AND proposal_status_for_ngo = "Approved" ';

			}else if($status=='Rejected'){
				$data['status'] = 'Rejected';
				$status = 'Rejected';
				$where .= ' AND proposal_status_for_ngo = "Rejected"';
			}
		}else{
			$is_created='yes';
			$is_submitted='yes';
			$GC_Requested='yes';
			$GC_Approved='yes';
			$GC_Rejected='yes';
			
			$data['status'] = 'Review';
			$status = 'Incomplete';
			$where .= ' AND proposal_status_for_ngo != "Approved" AND proposal_status_for_ngo !="Rejected" AND proposal_status_for_ngo !="Submitted"';
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
		

		$data['GC_Requested'] = $GC_Requested;
		$data['GC_Approved'] = $GC_Approved;
		$data['GC_Rejected'] = $GC_Rejected;
		$data['is_submitted'] = $is_submitted;
		$data['is_created'] = $is_created;
		$data['array_length'] = $array_length_1;
		
		//var_dump($where);
		$sql="SELECT *,(SELECT org_name FROM organisation WHERE org_id=proposal.organisation_id) as 'organisation' ,(SELECT legal_name FROM ngo WHERE id=proposal.ngo_id) as 'ngo_name' FROM proposal WHERE superngo_id=$superngo_id AND is_deleted=0 ".$where."  ORDER BY `prop_id` DESC ";
		//var_dump($sql);
		$data['table_name'] = 'proposal';
		$data['sql_query'] = $sql;
		$data['heading'] = 'List of Proposals';
	    $data['table_header_column'] = array('Project ID','Proposal Name','CSR Org Name', 'Proposal Status', 'Creation Date','Date of Submission');
<<<<<<< HEAD
		 $data['table_body_column'] = array('new_prop_id','title','organisation_id','proposal_status_for_ngo','created_time','submission_time');
=======
		 $data['table_body_column'] = array('Project_id','title','organisation_id','proposal_status_for_ngo','created_time','submission_time');
>>>>>>> f163ca0b896c155bd283cfec30315424389ca909
	    $data['primary_column_name'] = 'prop_id';
		if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'ngo/proposals/edit';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'ngo/proposals/index';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */

		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		
		if($return_val){
			$this->load->view('ngo/pages/proposals/proposals_listing',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}

	/**
	 * edit Page(entity) for this controller.
	 */
	
	public function edit(){
		$segment = 0;
		if(isset($_GET['id'])){
			$segment = $_GET['id'];
			$page='edit';
		}else{
			$segment =0;
			$page='add';
		}
		$data['is_ngo'] = 'no';
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();
		//var_dump($data['is_permitted']);
		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$sql="select *,(select org_name from organisation where org_id=proposal.organisation_id) as 'organisation',(select legal_name from ngo where id=proposal.ngo_id) as 'ngo' from proposal where prop_id=$segment AND superngo_id=$superngo_id AND is_deleted=0";
		$data['proposal_data'] = $this->obj_comman->get_query($sql);
		if($data['proposal_data']){
			$data['admin_category_data'] = '';
			if($data['proposal_data'][0]['focus_category']){
				$focus_category_id=$data['proposal_data'][0]['focus_category'];
				$data['admin_category_data'] = $this->obj_comman->get_by('admin_category',array('id'=>$focus_category_id));
			}
			$data['admin_subcategory_data'] = '';
			if($data['proposal_data'][0]['focus_subcategory']){
				$focus_subcategory_id=$data['proposal_data'][0]['focus_subcategory'];
				$data['admin_subcategory_data'] = $this->obj_comman->get_by('admin_subcategory',array('id'=>$focus_subcategory_id));
			}
			$data['edit_hide']='no';
			$data['page_heading_disp']='yes';
			$data['hide_two_row']='no';
			$data['organisation_data'] = $this->obj_comman->get_by('organisation',array('org_status'=>'active','is_deleted'=>'0'));
			$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('is_deleted'=>'0','superngo_id'=>$superngo_id));
			$data['is_ngo'] = 'yes';
			
			$sql5="SELECT * FROM `ngo_notification` WHERE `proposal_id` =$segment AND status='Pending' AND request_type='proposal' ORDER BY notification_id DESC" ;
			$result4 = $this->db->query($sql5); 
			
			if ($result4 && $result4->num_rows() > 0){
				$data['ngo_notification'] = $result4->result();
			}else{
				$data['ngo_notification'] = '';
			}
			
			$org_district = $this->obj_comman->get_query("select state_id, (select name from admin_states where id=ngo_district.state_id) as 'state_name' from ngo_district where prop_id=$segment group by state_id");
			foreach ($org_district as $key => $value) {
				$state_id=$value['state_id'];
				$sql="select district_id,(select name from admin_district where id=ngo_district.district_id) as 'district_name' from ngo_district where prop_id=$segment AND state_id=$state_id";

				$district = $this->obj_comman->get_query($sql);
				$org_district[$key]['district']=$district;
			}
			$data['org_geo_location_data']=$org_district;
			
			
		}else{
			
		}
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val and $data['proposal_data']){
			$this->load->view('ngo/pages/proposals/edit_proposals',$data);
		} else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	public function resolved_submit(){            
		//var_dump($_POST);die;
		$notification_id=$_POST['notification_id_send'];
		$org_task_id=$_POST['org_task_id_send'];
		$org_id=$_POST['org_id_send'];
		$ngo_id=$_POST['ngo_id_send'];
		$superngo_id=$_POST['superngo_id_send'];
		$proposal_id=$_POST['proposal_id_send'];
		$document_type=$_POST['document_type_send'];
		$notification_status='NGO Revised';
		$data = array(
					'status' =>$notification_status,
			);
			if(isset($_POST['entity_status_update'])){
				$entity_update=$_POST['entity_status_update'];
				if($entity_update=='yes'){
				$entity_data = array(
					'status' =>$notification_status,
					);
					$return_val = $this->db->update('org_ngo_review_status', $entity_data, array('org_id' => $org_id,'ngo_id' => $ngo_id));
				}
			}
			$data1 = array(
					'proposal_status' =>$notification_status,
					'proposal_status_for_ngo'=>'Submitted',
			);
		
			//var_dump($data);die;
			$result = $this->db->update('org_tasks', $data, array('org_task_id '=>$org_task_id));	
			$return_val = $this->db->update('ngo_notification', $data, array('notification_id '=>$notification_id));	
			$return_val = $this->db->update('proposal', $data1, array('prop_id' => $proposal_id));	
		
				
			
			//var_dump($return_val,);die;
			if($return_val=='true'){
				$this->ngo_notification_send_email($superngo_id,$org_id,$org_task_id,$ngo_id,$notification_status,$proposal_id,$notification_id);
			}	
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Notification successfully resolved';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		
		echo json_encode($arr_response);
		
	}
	
	
	public function ngo_notification_send_email($superngo_id,$org_id,$org_task_id,$ngo_id,$notification_status,$proposal_id,$notification_id){
		//var_dump($notification_status);die;
		$sql_0 = 'SELECT title FROM `ngo_notification` WHERE `notification_id` ='.$notification_id;
		$result_0 = $this->db->query($sql_0);
		if($result_0 && $result_0->num_rows()){
			$ngo_notification_data = $result_0->result();
			$notification_title = $ngo_notification_data[0]->title;
		}else{
			$brand_name = 0;
		}
		$sql_1 = 'SELECT id,brand_name FROM `superngo` WHERE `id` ='.$superngo_id;
		$result_1 = $this->db->query($sql_1);
		if($result_1 && $result_1->num_rows()){
			$superngo_data = $result_1->result();
			$brand_name = $superngo_data[0]->brand_name;
		}else{
			$brand_name = 0;
		}
		$sql_2 = 'SELECT title,prop_id FROM `proposal` WHERE `prop_id` ='.$proposal_id;
		$result_2 = $this->db->query($sql_2);
		if($result_2 && $result_2->num_rows()){
			$proposal_data = $result_2->result();
			$title = $proposal_data[0]->title;	
		}else{
			$title = 0;
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
		$message .= '<p>'.$ngo_staff_name.' from '.$ngo_name.' has resolved your '.$notification_title.' '.$notification_status.' regarding the Proposal: '.$title.'</p><br>';
		
		$message .= '<div>Please click on the link below to see their updates:</div><br>'; 
		//$message .= '<div>Please click on the link below to resolve this request:</div><br>'; 
		$message .= '<a href="'.ORG_URL.'organisation/tasks/detail?id='.$org_task_id.'&sourse=tasks">Go to Task</a><br>'; 
		//$message .= '<a href="'.base_url().'organisation/tasks/detail?id='.$org_task_id.'&sourse=tasks">Go to Task</a><br><br>'; 
		
		//print_r($message);
		//print_r($org_staff_email);
			//die;	
		
		$this->load->model('Email_model', 'obj_email', TRUE);
		$array = array(
			'subject' =>''.$ngo_name. ' has updated their Proposal based on your request',
			'msg' => $message,
			'to' =>  $org_staff_email,
			'to_name' => $brand_name,
		);
		
		//$this->obj_email->send_mail_in_ci($data);
		$this->obj_email->send_mail_in_sendinblue($array);
	}
	
	public function get_geoData() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);
		$state_data = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		$state_array = array();
		foreach ($state_data as $key => $value) {
			$district_data = $this->obj_comman->get_by('admin_district', array('state_id' => $value['id']));
			$district_array = array();
			foreach ($district_data as $k => $val) {
				$arrayName = array(
					'id' => $val['id'].'-'.$value['id'],
	          		'title' => $val['name']
	          	);
				array_push($district_array,$arrayName);
			}
			$arrayName = array(
				'id' => $value['id'],
          		'title' => $value['name'],
          		'subs' => $district_array
	        );
			array_push($state_array,$arrayName);
		}
		$org_geo_array = array();
		$arr_response['status'] = 200;
		$arr_response['geoData'] = $state_array;			
		$arr_response['orgGeoData'] = $org_geo_array;
		$arr_response['message'] = 'Successfully';			
		echo json_encode($arr_response);
    }
	
	public function is_all_form_filled() {
		//var_dump($_POST);die;
		$prop_id = $_POST['prop_id'] ;
		$ngo_id = $_POST['ngo_id'] ;
		$org_id = $_POST['org_id'] ;
		
		$this->load->model('Comman_model','obj_comman', TRUE);
		$proposal_data = $this->obj_comman->get_by('proposal',array('prop_id'=>$prop_id));
		
		$is_form1_filled = 'yes';
		$is_form2_filled = 'yes';
		$is_form3_filled = 'yes';
		$is_form3_filled = 'yes';
		$is_form4_filled = 'yes';
		$is_form5_filled = 'yes';
		
		$is_form1_filled_by_ngo = 'yes';
		$is_form2_filled_by_ngo = 'yes';
		$is_form3_filled_by_ngo = 'yes';
		$is_form4_filled_by_ngo = 'yes';
		$is_form5_filled_by_ngo = 'yes';
		$is_form6_filled_by_ngo = 'yes';
		/**Start Ngo Section***/
		$sql="SELECT 
				page1_validation_error,
				page2_validation_error,
				page3_validation_error,
				page4_validation_error,
				page5_validation_error,
				page6_validation_error 
				FROM ngo
				WHERE id=$ngo_id";
		$ngo_data_result = $this->db->query($sql)->result_array();
		//var_dump($ngo_data_result);
		if($ngo_data_result){
			if(isset($ngo_data_result[0]['page1_validation_error'])){
				if($ngo_data_result[0]['page1_validation_error']=='no'){}else{
					$is_form1_filled_by_ngo='no';
				}
			}else{
				$is_form1_filled_by_ngo = 'no';
			}
			if(isset($ngo_data_result[0]['page2_validation_error'])){
				if($ngo_data_result[0]['page2_validation_error']=='no'){}else{
					$is_form2_filled_by_ngo='no';
				}
			}else{
				$is_form2_filled_by_ngo = 'no';
			}
			if(isset($ngo_data_result[0]['page3_validation_error'])){
				if($ngo_data_result[0]['page3_validation_error']=='no'){}else{
					$is_form3_filled_by_ngo='no';
				}
			}else{
				$is_form3_filled_by_ngo = 'no';
			}
			if(isset($ngo_data_result[0]['page4_validation_error'])){
				if($ngo_data_result[0]['page4_validation_error']=='no'){}else{
					$is_form4_filled_by_ngo='no';
				}
			}else{
				$is_form4_filled_by_ngo = 'no';
			}if(isset($ngo_data_result[0]['page5_validation_error'])){
				if($ngo_data_result[0]['page5_validation_error']=='no'){}else{
					$is_form5_filled_by_ngo='no';
				}
			}else{
				$is_form5_filled_by_ngo = 'no';
			}if(isset($ngo_data_result[0]['page6_validation_error'])){
				if($ngo_data_result[0]['page6_validation_error']=='no'){}else{
					$is_form6_filled_by_ngo='no';
				}
			}else{
				$is_form6_filled_by_ngo = 'no';
			}
		}
		//var_dump($is_form1_filled_by_ngo);
		/**End Ngo Section***/
		if($proposal_data){
			if($proposal_data[0]['organisation_id'] > 0 ){}else{
				$is_form1_filled = 'no';
			}
			if($proposal_data[0]['ngo_id'] > 0 ){}else{
				$is_form1_filled = 'no';
			}
			if(isset($proposal_data[0]['title'])){
				if($proposal_data[0]['title']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['focus_category'])){
				if($proposal_data[0]['focus_category'] >0){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['focus_subcategory'])){
				if($proposal_data[0]['focus_subcategory'] >0){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['category_input'])){
				if($proposal_data[0]['category_input']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['region'])){
				if($proposal_data[0]['region']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['benficial_cat'])){
				if($proposal_data[0]['benficial_cat']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['age_group'])){
				if($proposal_data[0]['age_group']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['target_group'])){
				if($proposal_data[0]['target_group']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['slums_villages'])){
				if(strlen($proposal_data[0]['slums_villages'])!=0){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['women_adult'])){
				if(strlen($proposal_data[0]['women_adult'])!=0){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['men_adult'])){
				if(strlen($proposal_data[0]['men_adult'])!=0){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			//var_dump($is_form3_filled);
			if(isset($proposal_data[0]['children'])){
				$children=strlen($proposal_data[0]['children']);
				if($children!=0){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			//var_dump($is_form3_filled);
			if(isset($proposal_data[0]['geo_location_values'])){
				if($proposal_data[0]['geo_location_values']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['start_date'])){
				if($proposal_data[0]['start_date']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['end_date'])){
				if($proposal_data[0]['end_date']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			/*if(isset($proposal_data[0]['local_address'])){
				if($proposal_data[0]['local_address']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}*/
			if(isset($proposal_data[0]['street_address'])){
				if($proposal_data[0]['street_address']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['state'])){
				if($proposal_data[0]['state']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['city'])){
				if($proposal_data[0]['city']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['pincode'])){
				if($proposal_data[0]['pincode'] >0){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['full_name'])){
				if($proposal_data[0]['full_name']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['designation'])){
				if($proposal_data[0]['designation']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['email_address'])){
				if($proposal_data[0]['email_address']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			if(isset($proposal_data[0]['contact_no'])){
				if($proposal_data[0]['contact_no']){}else{
					$is_form3_filled = 'no';
				}
			}else{
				$is_form3_filled = 'no';
			}
			
			
			if(isset($proposal_data[0]['organization_background_brief'])){
				if($proposal_data[0]['organization_background_brief']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['project_summary_proposal'])){
				if($proposal_data[0]['project_summary_proposal']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['benificiary_profile_brief'])){
				if($proposal_data[0]['benificiary_profile_brief']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['benificiary_profile_statement'])){
				if($proposal_data[0]['benificiary_profile_statement']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['benificiary_profile_solution'])){
				if($proposal_data[0]['benificiary_profile_solution']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['specific_outcomes'])){
				if($proposal_data[0]['specific_outcomes']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['project_sustainability'])){
				if($proposal_data[0]['project_sustainability']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['key_activities'])){
				if($proposal_data[0]['key_activities']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['generated_file_path'])){
				if($proposal_data[0]['generated_file_path']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			if(isset($proposal_data[0]['original_file_path'])){
				if($proposal_data[0]['original_file_path']){}else{
					$is_form4_filled = 'no';
				}
			}else{
				$is_form4_filled = 'no';
			}
			
			
			if(isset($proposal_data[0]['total_funds'])){
				if($proposal_data[0]['total_funds'] >0){}else{
					$is_form5_filled = 'no';
				}
			}else{
				$is_form5_filled = 'no';
			}
			
			if(isset($proposal_data[0]['total_funds_org'])){
				if($proposal_data[0]['total_funds_org'] >0){}else{
					$is_form5_filled = 'no';
				}
			}else{
				$is_form5_filled = 'no';
			}
			
			if(isset($proposal_data[0]['balance_funds'])){
				if($proposal_data[0]['balance_funds']){}else{
					$is_form5_filled = 'no';
				}
			}else{
				$is_form5_filled = 'no';
			}
			
			if(isset($proposal_data[0]['upload_budget_file_template'])){
				if($proposal_data[0]['upload_budget_file_template']){}else{
					$is_form5_filled = 'no';
				}
			}else{
				$is_form5_filled = 'no';
			}
			
			/*if(isset($proposal_data[0]['multiple_img_upload2'])){
				if($proposal_data[0]['multiple_img_upload2']){}else{
					$is_form5_filled = 'no';
				}
			}else{
				$is_form5_filled = 'no';
			}*/
		}
		//var_dump($proposal_data[0]['total_funds']);
		//var_dump(isset($proposal_data[0]['balance_funds']));
		
		$check_ngo_review_status = $this->obj_comman->get_by('org_ngo_review_status',array('ngo_id'=>$ngo_id,'org_id'=>$org_id));
		$org_data = $this->obj_comman->get_by('organisation',array('org_id'=>$org_id));
		if($org_data){
			$org_name = $org_data[0]['org_name'];
		}else{
			$org_name='';
		}
		$gc_ticket = $this->obj_comman->get_by('gc_ticket',array('org_id'=>$org_id,'ngo_id'=>$ngo_id,'used'=>0));
		//var_dump("as");
		//var_dump($gc_ticket);
		//$org_name = $org_data[0]['org_name'];
		if($gc_ticket){
			$gc_id=$gc_ticket[0]['gc_id'];
			$allow_submit ='yes';	
		}else{
			$gc_id=0;
			$allow_submit ='no';
		}	
		if($check_ngo_review_status){
			$allow_submit ='no';
		}else{
			$allow_submit ='yes';
		}
		$arr_response['status'] = 200;
		$arr_response['message'] = 'Successfully';			
		$arr_response['check_ngo_review_status'] = $check_ngo_review_status;			
		$arr_response['org_name'] = $org_name;			
		$arr_response['allow_submit'] = $allow_submit;			
		$arr_response['proposal_data'] = $proposal_data;			
		$arr_response['is_form1_filled'] = $is_form1_filled;			
		$arr_response['is_form2_filled'] = $is_form2_filled;			
		$arr_response['is_form3_filled'] = $is_form3_filled;			
		$arr_response['is_form4_filled'] = $is_form4_filled;			
		$arr_response['is_form5_filled'] = $is_form5_filled;
		
		$arr_response['is_form1_filled_by_ngo'] = $is_form1_filled_by_ngo;
		$arr_response['is_form2_filled_by_ngo'] = $is_form2_filled_by_ngo;
		$arr_response['is_form3_filled_by_ngo'] = $is_form3_filled_by_ngo;
		$arr_response['is_form4_filled_by_ngo'] = $is_form4_filled_by_ngo;
		$arr_response['is_form5_filled_by_ngo'] = $is_form5_filled_by_ngo;
		$arr_response['is_form6_filled_by_ngo'] = $is_form6_filled_by_ngo;
		
		$arr_response['gc_ticket'] = $gc_ticket;			
		$arr_response['gc_id'] = $gc_id;			
		echo json_encode($arr_response);
    }
	

    /*Start Proposal page 3  submit Add section*/
    public function proposals_submit_page3(){
    	//var_dump($_POST);die;
		$superngo_id = $this->session->userdata('superngo_id');
		$ngo_staff_id = $this->session->userdata('ngo_staff_id');
    	$prop_id=$_POST['prop_id'];
		$ngo_id=$_POST['ngo_id'];
		$geo_location_id_array='';
		$organisation_id=$_POST['organisation_id'];
		if(isset($_POST['geo_location_id_array'])){
			$geo_location_id_array=$_POST['geo_location_id_array'];
		}
		/*$sql1="SELECT prop_id FROM `proposal` ORDER BY prop_id ASC";
		$prop_data_id= $this->db->query($sql1)->result_array();
		if($prop_data_id){
			$new_prop_id=$prop_data_id[0]['prop_id'];
			if($new_prop_id){
				$new_prop_id=9999+$new_prop_id;
			}else{
				$new_prop_id=10000;
			}
		}else{ 
			$new_prop_id=10000;
		}*/
		//$new_prop_id=0;
		//var_dump($new_prop_id);die;
		$array_data = array(
			//'new_prop_id' => $new_prop_id,
			'title' => $_POST['project_title'],
			'focus_category' => $_POST['focus_category'],
			'focus_subcategory' => $_POST['focus_subcategory'],
			'category_input' => $_POST['category_input'],
			'region' => $_POST['region'],
			'benficial_cat' => $_POST['benficial_cat'],
			'age_group' => $_POST['age_group'],
			'target_group' => $_POST['target_group'],
			'slums_villages' => $_POST['slums_villages'],
			'women_adult' => $_POST['women_adult'],
			'men_adult' => $_POST['men_adult'],
			'children' => $_POST['children'],

			'geo_location' =>$_POST['geo_location'],
			'geo_location_values' => $_POST['geo_location_values'],

			'start_date' => $_POST['start_date'],
			'end_date' => $_POST['end_date'],
			'local_address' => $_POST['local_address'],
			'street_address' => $_POST['street_address'],
			'state' => $_POST['state'],
			'city' => $_POST['city'],
			'pincode' => $_POST['pincode'],
			'full_name' => $_POST['full_name'],
			'designation' => $_POST['designation'],
			'email_address' => $_POST['email_address'],
			'contact_no' => $_POST['contact_no'],
			'organisation_id' => $organisation_id,
			'ngo_id' => $ngo_id,
			'superngo_id' => $superngo_id,
			'ngo_staff_id' => $ngo_staff_id,
			'created_time' => date('Y-m-d H:i:s'),
			
		);
		if($prop_id==0){
			$return_val = $this->db->insert('proposal',$array_data);
			$prop_id = $this->db->insert_id();
			if($prop_id){
				$Insert_project_id = array(
				    'proposal_title_org' => $_POST['project_title'],
					'new_prop_id' => 9999+$prop_id,
				);
				$this->db->update('proposal',$Insert_project_id,array('prop_id'=>$prop_id));
			}
			if($prop_id){
				if($geo_location_id_array){
					foreach ($geo_location_id_array as $key => $value) {
						if(strpos($value, '-') !== false){
							$id=explode('-', $value);
							$arrayName = array('prop_id' => $prop_id,'ngo_id' =>$ngo_id, 'state_id' => $id[1],'district_id' => $id[0] );
							//var_dump($arrayName);
							$return_val = $this->db->insert('ngo_district',$arrayName); 
							//$message = 'Successfully added';
						}
					}
				}
			}
		}else{
			$return_val = $this->db->update('proposal',$array_data,array('prop_id'=>$prop_id));
			
			if($geo_location_id_array){
				$delete=$this->db->delete('ngo_district',array('ngo_id' => $ngo_id));
				foreach ($geo_location_id_array as $key => $value) {
					if(strpos($value, '-') !== false){
						$id=explode('-', $value);
						$arrayName = array('prop_id' => $prop_id,'ngo_id' =>$ngo_id,'state_id' => $id[1],'district_id' => $id[0] );
						//var_dump($arrayName);
						$return_val = $this->db->insert('ngo_district',$arrayName); 
						//$message = 'Successfully added';
					}
				}
			}
		
		}
       	if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['prop_id'] = $prop_id;
			$arr_response['message'] = 'Proposal data has been updated successfully';
		} else {
			redirect(base_url().'ngo/');
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}

	/*End  Proposal submit Add section*/

	/*Start Proposal page 4  submit Add section*/
    public function proposals_submit_page4(){
		//var_dump($_POST);die;
    	$array_data = array(
			'organization_background_brief' => $_POST['organization_background_brief'],
			'project_summary_proposal' => $_POST['project_summary_proposal'],
			'benificiary_profile_brief' => $_POST['benificiary_profile_brief'],
			'benificiary_profile_statement' => $_POST['benificiary_profile_statement'],
			'benificiary_profile_solution' => $_POST['benificiary_profile_solution'],
			'key_activities' => $_POST['key_activities'],
			'specific_outcomes' => $_POST['specific_outcomes'],
			'project_sustainability' => $_POST['project_sustainability'],
			'original_file_path' => $_POST['upload_80G_reg'],
			'generated_file_path' => $_POST['activitie_project'],
			
		);
		$prop_id=$_POST['prop_id'];
    	$this->db->where('prop_id',$prop_id);
		$return_val = $this->db->update('proposal',$array_data);
       	if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Proposal data has been updated successfully';
		} else {
			redirect(base_url().'ngo/');
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);

    }

	/*End  Proposal page 4  submit Add section*/

	/*Start Proposal page 5  submit Add section*/
    public function proposals_submit_page5(){
		//var_dump($_POST);die;
		$multiple_img_upload2 = '';
		if(isset($_POST['multiple_img_upload2'])){
			$multiple_img_upload2 = json_encode($_POST['multiple_img_upload2']);
		}
    	$array_data = array(
			'total_funds' => $_POST['total_funds'],
			'total_funds_org' => $_POST['total_funds_org'],
			'balance_funds' => $_POST['balance_funds'],
			'upload_budget_file_template' => $_POST['upload_budget_file_template'],
			'upload_budget_file_template_actual' => $_POST['upload_budget_file_template_actual'],
			'multiple_img_upload2' => $multiple_img_upload2,
			
			);
			$prop_id=$_POST['prop_id'];
			$this->db->where('prop_id',$prop_id);
			$return_val = $this->db->update('proposal',$array_data);
      	if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Proposal data has been updated successfully';
		} else {
			redirect(base_url().'ngo/');
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
			echo json_encode($arr_response);

}

	/*End  Proposal page 5  submit Add section*/
	/**

	 * ngo location data for this controller.
	*/
	
   public function edit_page_1(){
		$segment = 0;
		if(isset($_GET['id']) AND $_GET['id']!=''){
			$segment = $_GET['id'];
			$page='edit';
		}else{
			$segment =0;
			$page='add';
		}
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['proposal_data'] = $this->obj_comman->get_by('proposal',array('prop_id'=>$segment),false,true);
		$data['organisation_data'] = $this->obj_comman->get_by('organisation',array('org_status'=>'active','is_deleted'=>'0'));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('is_deleted'=>'0','superngo_id'=>$superngo_id));
		$data['loadviewfile'] = 'add_proposals_page_1';
		$data['page_counter'] = '1';
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
	    	$this->load->view('ngo/pages/proposals/add_proposals_common',$data);
			
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}


	 public function edit_page_2(){
		$segment = 0;
		if(isset($_GET['id'])){
			$segment = $_GET['id'];
			$page='edit';
		}else{
			$segment =0;
			$page='add';
		}
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['proposal_data'] = $this->obj_comman->get_by('proposal',array('prop_id'=>$segment),false,true);
		$data['organisation_data'] = $this->obj_comman->get_by('organisation',array('org_status'=>'active','is_deleted'=>'0'));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('is_deleted'=>'0','superngo_id'=>$superngo_id));
		$data['loadviewfile'] = 'add_proposals_page_2';
		$data['page_counter'] = '2';
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/proposals/add_proposals_common',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}

	public function edit_page_3(){
		$segment = 0;
		if(isset($_GET['id'])){
			$segment = $_GET['id'];
			$page='edit';
			$data['edit_with_add']='no';
			
		}else{
			$segment =0;
			$page='add';
			$data['edit_with_add']='no';
		}
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['proposal_data'] = $this->obj_comman->get_by('proposal',array('prop_id'=>$segment),false,true);
		$data['organisation_data'] = $this->obj_comman->get_by('organisation',array('org_status'=>'active','is_deleted'=>'0'));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('is_deleted'=>'0','superngo_id'=>$superngo_id));
		$data['category_data'] = $this->db->get('admin_category')->result_array();
		$data['subcategory_data'] = $this->db->get('admin_subcategory')->result_array();
		$data['admin_states'] = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		$data['admin_city'] = $this->obj_comman->get_by('admin_city','', array('name' => 'asc'));

		$data['loadviewfile'] = 'add_proposals_page_3';
		$data['page_counter'] = '3';
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val and $data['proposal_data']){
			$this->load->view('ngo/pages/proposals/add_proposals_common',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}

	public function edit_page_4(){
		$segment = 0;
		if(isset($_GET['id'])){
			$segment = $_GET['id'];
			$page='edit';
			$data['edit_with_add']='no';
		}else{
			$segment =0;
			$page='add';
			$data['edit_with_add']='no';
		}
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['proposal_data'] = $this->obj_comman->get_by('proposal',array('prop_id'=>$segment),false,true);
		$data['organisation_data'] = $this->obj_comman->get_by('organisation',array('org_status'=>'active','is_deleted'=>'0'));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('is_deleted'=>'0','superngo_id'=>$superngo_id));
		$data['category_data'] = $this->db->get('admin_category')->result_array();
		$data['subcategory_data'] = $this->db->get('admin_subcategory')->result_array();
		$data['loadviewfile'] = 'add_proposals_page_4';
		$data['page_counter'] = '4';
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val and  $data['proposal_data']){
			$this->load->view('ngo/pages/proposals/add_proposals_common',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}

	public function edit_page_5(){
		$segment = 0;
		if(isset($_GET['id'])){
			$segment = $_GET['id'];
			$page='edit';
			$data['edit_with_add']='no';
		}else{
			$segment =0;
			$page='add';
			$data['edit_with_add']='no';
		}
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['proposal_data'] = $this->obj_comman->get_by('proposal',array('prop_id'=>$segment),false,true);
		$data['organisation_data'] = $this->obj_comman->get_by('organisation',array('org_status'=>'active','is_deleted'=>'0'));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('is_deleted'=>'0','superngo_id'=>$superngo_id));
		$data['category_data'] = $this->db->get('admin_category')->result_array();
		$data['subcategory_data'] = $this->db->get('admin_subcategory')->result_array();
		$data['loadviewfile'] = 'add_proposals_page_5';
		$data['page_counter'] = '5';
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val and $data['proposal_data']){
			$this->load->view('ngo/pages/proposals/add_proposals_common',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	
	
	
	public function get_pre_proposal_data() {
        //array to store ajax responses
        /*$arr_response = array('status' => 500);
		
		$sql_6 = 'SELECT proposal.prop_id,proposal.title FROM `proposal`
							
					WHERE `id` = '.$ngo_id ;
		$result_6 = $this->db->query($sql_6);
		if($result_6 && $result_6->num_rows()){
		$ngo_data = $result_6->result();
		
		}
		
		
		$arr_response['status'] = 200;
		$arr_response['geoData'] = $state_array;			
		$arr_response['orgGeoData'] = $org_geo_array;
		$arr_response['message'] = 'Successfully';			
		echo json_encode($arr_response);*/
    }
	
	


}