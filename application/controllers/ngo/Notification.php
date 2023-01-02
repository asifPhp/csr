<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

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
		
			$page='list';
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '6', 
			'submodule_id' => '6', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$superngo_id = $this->session->userdata('superngo_id');
		$data['staff_data'] = $this->obj_comman->get_by('ngo_staff_account',array('ngo_staff_id'=> $segment),false,true);
		
		//$data['ngo_notification'] = $this->obj_comman->get_by('ngo_notification',array('superngo_id'=>$superngo_id));
		$where='';
		if(isset($_GET['status'])){
			$status = $_GET['status'];
			$data['status'] = $_GET['status'];
			
			if($status=='Resolved'){
					$data['status'] = 'Resolved';
					$status = 'Resolved';
					$where .= ' AND status != "Pending" ';
			}else{
				$data['status'] = 'Pending';
				$where .= ' AND status != "NGO Revised" AND status !="Resolved" ';
			}
		
		}else{
			$data['status'] = 'Pending';
			$where .= ' AND status != "NGO Revised" AND status !="Resolved" ';
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
		
		$sql2="SELECT *, 
			(SELECT org_name FROM organisation WHERE org_id=ngo_notification.org_id) AS 'org_name',
			(SELECT legal_name FROM ngo WHERE id=ngo_notification.ngo_id) AS 'ngo_name',
			(SELECT title FROM proposal WHERE prop_id=ngo_notification.proposal_id) AS 'prop_name', 
			(SELECT title FROM project WHERE id=ngo_notification.project_id) AS 'project_name' 
			 FROM ngo_notification	WHERE superngo_id=$superngo_id  ".$where." ORDER BY notification_id DESC  "  ;
			//var_dump($sql2);
			//var_dump($sql2);
			$result2 = $this->db->query($sql2); 
			if ($result2 && $result2->num_rows() > 0){
				$data['ngo_notification']  =$result2->result_array();
								
			}else{
				$data['ngo_notification']  = '';
			}
		
		
		
		
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/ngo_notification',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	public function ngo_notification_detail()	{
		
		if(isset($_GET['id'])){
			$notification_id = $_GET['id'];
		}else{
			$notification_id = 0;
		}
		
			$page='list';
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '6', 
			'submodule_id' => '6', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$superngo_id = $this->session->userdata('superngo_id');
		//$data['staff_data'] = $this->obj_comman->get_by('ngo_staff_account',array('ngo_staff_id'=> $segment),false,true);
		
		$data['sql_query'] = "SELECT * FROM `ngo_notification` WHERE `notification_id` = $notification_id" ;
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/ngo_notification_detail',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
}
