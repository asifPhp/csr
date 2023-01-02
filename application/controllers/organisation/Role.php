<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

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
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '3', 
			'submodule_id' => '2', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['role_data'] = $this->obj_comman->get_by('organisation_roles',array('role_id'=>$segment),false,true);
		$data['role_access_data'] = $this->obj_comman->get_by('organisation_roles_access',array('role_id'=>$segment));
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
	    if($return_val){
			$this->load->view('organisation/pages/role/add_role',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}

	
	/**
	 * admin Add plan for this controller.
	*/
	public function update_roles() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$org_id = $this->session->userdata('org_id');
		$role_id=$_POST['role_id'];
		
		$data=$_POST['table_field'];
		$access=$_POST['access_define'];
		

		if($role_id == 0){
			$data['org_id'] = $org_id;
			$return_val = $this->obj_comman->insert_data('organisation_roles',$data); 
			$message = 'Successfully added';
			$role_id=$return_val;
		} else{
			$return_val = $this->obj_comman->update_data('organisation_roles',$data,array('role_id' => $_POST['role_id']));
			$message = 'Successfully updated';			
	    }

	    $where = array('role_id' => $_POST['role_id']);
		
		$data=$_POST['access_define'];

		if($data){
			$return_val=$this->db->delete('organisation_roles_access',$where);
			foreach ($data as $key => $value) {
				$value['org_id'] = $org_id;
				$value['role_id'] = $role_id;
				$value['date'] = date('Y-m-d');
				$value['time'] = date('H:i:s');
				$return_val = $this->obj_comman->insert_data('organisation_roles_access',$value);
			}
		}

		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }

	/**
	 * admin List of plans for this controller.
	*/
	public function list(){
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '2', 
			'submodule_id' => '2', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');

		$sql="select * from organisation_roles where org_id=$org_id and `is_deleted`=0";

		$data['table_name'] = 'organisation_roles';
		$data['sql_query'] = $sql;
		$data['heading'] = 'Role List';
	    $data['table_header_column'] = array('Name');
	    $data['table_body_column'] = array('role_name');
	    $data['primary_column_name'] = 'role_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/role/index';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/role/index';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		//if($return_val){
			$this->load->view('organisation/pages/comman_listing',$data);
		//}else{
		//	$this->load->view('error_msg');
		//}
		$this->load->view('organisation/components/footer');
		
	}
}
