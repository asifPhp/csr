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
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');

		$where = '';
		$where1 = '';
	    $data['status'] = '';
	    $data['sstatus'] = '';
	    $status='';
	    $sstatus='';
		$data['focal_point_status'] = '';
		$focal_point_status='';		
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
						//if($item==' New'|| $item=='New' ){
							//$item="Submitted";
						//}
						$counter++;
						
						$where .= ' proposal.proposal_status="'.trim($item).'" ';
						if($array_length != $counter){
							$where .= ' or ';
						}
					}
					$where .= ') ';
					
					//var_dump($where);
				}else{
					$where .= ' AND proposal.proposal_status != "Rejected" AND proposal.proposal_status != "Approved" ';
				}
			}else if($status == 'Approved' ){
				$data['status'] = 'Approved';
				$status = 'Approved';
				 $where .= ' AND proposal.proposal_status = "Approved" ';
			}else if($status=='Rejected'){
				$data['status'] = 'Rejected';
				$status = 'Rejected';
				$where .= ' AND proposal.proposal_status = "Rejected" ';
			}
			else if($status=='Recommended'){
				$data['status'] = 'Recommended';
				$status = 'Recommended';
				$where .= ' AND proposal.proposal_status = "Recommended for Rejection" ';
			}else{
				$where .= 'AND proposal.proposal_status !="Approved"  AND proposal.proposal_status != "Rejected" AND proposal.proposal_status != "Recommended for Rejection"  ';
			}
			
		}else{
			$data['status'] = 'New';
			$status = 'New';
			$where .= 'AND proposal.proposal_status != "Approved"  AND proposal.proposal_status != "Rejected" AND proposal.proposal_status != "Recommended for Rejection" ';
			$where1 .= '';
		}
		
		if(isset($_GET['focal_point_status']) && isset($_GET['focal_point_status'])!=''){
			$data['focal_point_status'] = $_GET['focal_point_status'];
			$focal_point_status = $_GET['focal_point_status'];
			//var_dump($focal_point_status);
			$focal_arr = explode(",",$focal_point_status);
			$where1 .= '  AND  (';
			$array_length = count($focal_arr);
			$counter = 0;
			foreach($focal_arr as $item1) {
				$counter++;	
				$where1 .= 'org_assigner_mgmt.staff_id='.$item1.' AND org_assigner_mgmt.user_type="prposal normal"';
				if($array_length != $counter){
					$where1 .= ' or ';
				}
			}
				$where1 .= ') ';
				//var_dump($where1);
			
		}else{
			$where1 .= '';
		}
		
		
		//var_dump($where);
		
		if($where1!=''){
			//var_dump($where);
			//var_dump($where1);
			$sql="SELECT proposal.*, ngo.legal_name,org_assigner_mgmt.*
				FROM proposal
				JOIN ngo ON proposal.ngo_id=ngo.id
				JOIN org_assigner_mgmt ON proposal.prop_id=org_assigner_mgmt.prop_id
				WHERE proposal.organisation_id=$org_id ".$where."  ".$where1." AND proposal.is_deleted=0 AND proposal.is_submit=1  ORDER BY proposal.prop_id DESC " ;
		}else{
			$sql="SELECT proposal.*, ngo.legal_name
				FROM proposal
				JOIN ngo ON proposal.ngo_id=ngo.id
				WHERE proposal.organisation_id=$org_id ".$where." AND proposal.is_deleted=0 AND proposal.is_submit=1  ORDER BY proposal.prop_id DESC " ;
		}		
		//var_dump($sql);
		/*$sql="SELECT *, (SELECT legal_name FROM ngo WHERE id=proposal.ngo_id) AS 'ngo',
						(SELECT legal_name FROM ngo WHERE id=proposal.ngo_id) AS 'ngo' 
		FROM proposal WHERE organisation_id=$org_id ".$where." AND `is_deleted`=0 AND `is_submit`=1  ORDER BY `prop_id` DESC " ;
	*/
		$data['table_name'] = 'proposal';
		$data['sql_query'] = $sql;
		$data['heading'] = 'Proposals List';
	    $data['table_header_column'] = array('Project ID','Proposal Name','NGO Name','Proposal Status','Date of Submission','Focal Point');
	    $data['primary_column_name'] = 'prop_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/proposals/index';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/proposals/index';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    

		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/proposal_listing',$data);
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
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => 'other1', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');

	
		$prop_id = $_GET['id'];
		$sql="select *,(select org_name from organisation where org_id=proposal.organisation_id) as 'organisation',(select legal_name from ngo where id=proposal.ngo_id) as 'ngo' from proposal where prop_id=$prop_id AND is_deleted=0";
		$data['proposal_data'] = $this->obj_comman->get_query($sql);
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
		
		
		$sql1="select *, (select legal_name from ngo where id=proposal.ngo_id) as 'ngo',
						 (select brand_name from superngo where id=proposal.superngo_id) as 'brand_name'
						 from proposal where prop_id=$prop_id and `is_deleted`=0 ";
		//var_dump($sql1);
		$data['sql_query'] = $sql1;
		
		if($data['proposal_data']){
			if($data['proposal_data'][0]['gc_id']){
				$gc_id=$data['proposal_data'][0]['gc_id'];
				$sql_gc_ticket="SELECT upload_grand_ticket_value,upload_grand_ticket_actual FROM gc_ticket WHERE prop_id=$prop_id AND  gc_id=$gc_id";
				$data['gc_data'] = $this->db->query($sql_gc_ticket)->result_array();
				//var_dump($data['gc_data']);
			}else{
				$data['gc_data']='';
			}	
		}	
		/*$data['table_name'] = 'proposal';
		
		$data['heading'] = 'Proposals List';
	    $data['table_header_column'] = array('Proposal Name','NGO Name','Proposal Status','Date of Submission');
	    $data['table_body_column'] = array('title','ngo','proposal_status','submission_time');
	    $data['primary_column_name'] = 'prop_id';*/
		$sql_org_task="SELECT additional_json,org_task_label FROM org_tasks WHERE prop_id=$prop_id AND  task_type='prp' ORDER BY org_task_id DESC ";
		$data['prop_task_data'] = $this->db->query($sql_org_task)->result_array();
		
		$sql_org_task1="SELECT additional_json,org_task_label FROM org_tasks WHERE prop_id=$prop_id AND  task_type='nrp' AND org_task_label='NGO Desk Review' ORDER BY org_task_id DESC ";
		$data['ngo_desk_review_task_data'] = $this->db->query($sql_org_task1)->result_array();
		
		//var_dump($data['prop_task_data']);
		$sql_org_task2="SELECT org_tasks.org_task_id,org_tasks.status,org_tasks.org_task_label,org_tasks.task_type,org_tasks.prop_id,org_tasks.due_date,org_staff_account.first_name,org_staff_account.last_name,org_staff_account.staff_id 
						FROM org_tasks 
						INNER JOIN org_staff_account ON org_tasks.org_staff_id=org_staff_account.staff_id
						WHERE 
						prop_id=$prop_id AND status!='Completed' AND task_type='prp' LIMIT 1";
		//var_dump($sql_org_task2);
		$data['current_task_data'] = $this->db->query($sql_org_task2)->result_array();
		
		$data['edit_hide']='yes';
		$data['page_heading_disp']='no';
		$data['hide_two_row']='yes';
		$data['is_ngo'] = 'yes';
		$data['ngo_notification'] = '';
		
	   if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/proposals/index';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/proposals/index';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		//$data['table_body_column_count'] = sizeof($data['table_body_column']);
		//$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		$org_district = $this->obj_comman->get_query("select state_id, (select name from admin_states where id=ngo_district.state_id) as 'state_name' from ngo_district where prop_id=$prop_id group by state_id");
			foreach ($org_district as $key => $value) {
				$state_id=$value['state_id'];
				$sql="select district_id,(select name from admin_district where id=ngo_district.district_id) as 'district_name' from ngo_district where prop_id=$prop_id AND state_id=$state_id";

				$district = $this->obj_comman->get_query($sql);
				$org_district[$key]['district']=$district;
			}
			$data['org_geo_location_data']=$org_district;
            $data['prop_id']=$prop_id;		
		if($return_val){
			$this->load->view('organisation/pages/view_proposal_detail_page/view_proposal_main_page',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	public function details(){
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
			'module_id' => '4', 
			'submodule_id' => '4', 
			'staff_id' => $staff_id, 
			'page' => 'other1', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id = $this->session->userdata('superngo_id');
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$sql="select *,(select org_name from organisation where org_id=proposal.organisation_id) as 'organisation',(select legal_name from ngo where id=proposal.ngo_id) as 'ngo' from proposal where prop_id=$segment AND is_deleted=0";
		$data['proposal_data'] = $this->obj_comman->get_query($sql);
		
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
		$data['edit_hide']='yes';
		$data['page_heading_disp']='yes';
		$data['hide_two_row']='no';
		$data['organisation_data'] = $this->obj_comman->get_by('organisation',array('org_status'=>'active','is_deleted'=>'0'));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('is_deleted'=>'0','superngo_id'=>$superngo_id));
		$data['is_ngo'] = 'yes';
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/proposals/edit_proposals',$data);
		} else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
}
