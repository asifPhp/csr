<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor extends CI_Controller {

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
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['donor_data'] = $this->obj_comman->get_by('donor',array('donor_id'=>$segment),false,true);
		
		$data['state_data'] = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		
		$organisation_id = $this->session->userdata('org_id');
		
		$sql = "SELECT * FROM `financial_budget` WHERE  `org_id` =$organisation_id AND donor_id=$segment";
		//var_dump($sql);
		$result = $this->db->query($sql);
		//var_dump($result);
	   	$data_temp = array();
        $data_value = array();
		$data_couter = 0;
		if ($result && $result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				//var_dump($row);
				$data_couter++ ;
				
				$budget_id = $row->id;
				$financial_id=$row->financial_id;
				$donor_id=$row->donor_id;
				$org_id=$row->org_id;
				$budget=$row->amount;
				//var_dump($financial_id);
				//var_dump($org_id);
				$where='';
				$disbursed=0;
				$is_completed='';
				$allocated=0;
				$pending=0;
				$name='';
				if($row->financial_id){
					$sql1="SELECT * FROM `financial_years` WHERE `financial_id` =  ".$row->financial_id."";
					$db_result1 = $this->db->query($sql1)->result_array();
					//var_dump($db_result1);
					if($db_result1){
						$start_date = $db_result1[0]['start_date'];
						$end_date = $db_result1[0]['end_date'];
						$name = $db_result1[0]['name'];
										
						$where .="org_id =$org_id  AND select_donor = $donor_id ";
						$sql_project_donor="SELECT * FROM `project_donors` WHERE ".$where." ";
						//var_dump($sql_project);
						$db_result_project = $this->db->query($sql_project_donor)->result_array();
						if($db_result_project){
							foreach ($db_result_project as $row_project_donor) {
								//var_dump($row_project_donor);
								$allocated = $allocated+ $row_project_donor['donor_amount'];
								///var_dump($allocated);
							}
						}
						
							 
						/*$where .="org_id =$org_id  AND select_donor = $donor_id AND created_date BETWEEN '$start_date' AND '$end_date'";
						//var_dump($where);//die;
						//$amount=$this->db->select_sum('cycle_donor_amount');
						$sql_project="SELECT * FROM `project_cycle_donor_details` WHERE ".$where." ";
						//var_dump($sql_project);
						$db_result_project = $this->db->query($sql_project);
						//var_dump($this->db->last_query());
						//var_dump($db_result_project->result());
							foreach ($db_result_project->result() as $row1) {
								$allocated = $allocated+ $row1->cycle_donor_amount;
								$is_completed=$row1->is_completed;
								//var_dump($is_completed);
								if($is_completed=='yes'){
									$disbursed = $disbursed + $row1->cycle_donor_amount;
									var_dump($disbursed);
								}
							}
							//var_dump($allocated);
							//var_dump($sum);
						*/	 
						
					}
				}
				if (!array_key_exists($data_couter, $data_temp)) {
					$data_temp[$data_couter] = array();
				}
				if (array_key_exists($data_couter, $data_temp)) {
					$data_temp[$data_couter] = array(
						'budget_id' => $budget_id ,
						'year'=>$name,
						'budget'=>$budget,
						'allocated'=> $allocated,
						'disbursed'=> $disbursed,
						'pending'=> $budget-$allocated,
					);

				array_push($data_value, $data_temp[$data_couter]);
				}
			}
		}
		
		$data['project_list'] = $data_value;
		$data['table_type'] = 'dataTables';
		$data['is_remove'] = true;
		$data['ngo_or_organisation'] = 'organisation';
		
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
	    if($return_val){
			$this->load->view('organisation/pages/donor/view_donor',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}
	public function edit_donor(){
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
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['donor_data'] = $this->obj_comman->get_by('donor',array('donor_id'=>$segment),false,true);
		
		$data['state_data'] = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
	    if($return_val){
			$this->load->view('organisation/pages/donor/add_donor',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
	}

	/**
	 * admin Add plan for this controller.
	*/
	public function update_donor() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$org_id = $this->session->userdata('org_id');
		$donor_id=$_POST['donor_id'];
		
		$data=$_POST['table_field'];
		
		$last_id = 0;
		if($donor_id == 0){
			$data['org_id'] = $org_id;
			$data['created_date'] = date('Y-m-d');
			$data['created_time'] = date('H:i:s');

			$return_val = $this->obj_comman->insert_data('donor',$data); 
			$last_id = $return_val; 
			$message = 'Successfully added';
		} else{
			$last_id = $_POST['donor_id'];
			$return_val = $this->obj_comman->update_data('donor',$data,array('donor_id' => $_POST['donor_id']));
			$message = 'Successfully updated';			
	    }

		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
			$arr_response['last_id'] = $last_id;			
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
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$org_id = $this->session->userdata('org_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['profile_data'] = $this->obj_comman->get_by('organisation',array('org_id'=> $this->session->userdata('org_id')),false,true);

		$sql="select *,(select name from admin_category where id=org_category.category_id) as 'name' from org_category where org_id=$org_id";
		$data['org_category_data'] = $this->obj_comman->get_query($sql);

		$org_category = $this->obj_comman->get_query("select category_id, (select name from admin_category where id=org_category.category_id) as 'category_name' from org_category where org_id=$org_id group by category_id");
		foreach ($org_category as $key => $value) {
			$category_id=$value['category_id'];
			$sql="select subcategory_id,(select name from admin_subcategory where id=org_category.subcategory_id) as 'subcategory_name' from org_category where org_id=$org_id AND category_id=$category_id";

			$subcategory = $this->obj_comman->get_query($sql);
			$org_category[$key]['subcategory']=$subcategory;
		}
		$data['org_category_data']=$org_category;



		$org_district = $this->obj_comman->get_query("select state_id, (select name from admin_states where id=org_district.state_id) as 'state_name' from org_district where org_id=$org_id group by state_id");
		foreach ($org_district as $key => $value) {
			$state_id=$value['state_id'];
			$sql="select district_id,(select name from admin_district where id=org_district.district_id) as 'district_name' from org_district where org_id=$org_id AND state_id=$state_id";

			$district = $this->obj_comman->get_query($sql);
			$org_district[$key]['district']=$district;
		}
		$data['org_geo_location_data']=$org_district;

		$sql="select * from donor where org_id=$org_id and `is_deleted`=0";
		//var_dump($sql);
		$data['table_name'] = 'donor';
		$data['sql_query'] = $sql;
		$data['heading'] = 'Donors';
	    $data['table_header_column'] = array('Legal Name','Acronym (code)');
	    $data['table_body_column'] = array('legal_name','code');
	    $data['primary_column_name'] = 'donor_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'organisation/donor/index';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'organisation/donor/edit_donor';
		}if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		
		if($return_val){
			$this->load->view('organisation/pages/donor/donor_listing',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
		
	}

	/**
	 * admin Add plan for this controller.
	*/
	public function get_organisation_data() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$org_id = $this->session->userdata('org_id');
		
		$state_data = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		$state_array = array();
		foreach ($state_data as $key => $value) {
			$district_data = $this->obj_comman->get_by('admin_district', array('state_id' => $value['id']), array('name' => 'asc'));
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

		$org_district = $this->obj_comman->get('org_district');
		$org_geo_array = array();
		foreach ($org_district as $key => $value) {
			array_push($org_geo_array,$value['district_id'].'-'.$value['state_id']);
		}

		//category array
		$category_data = $this->obj_comman->get('admin_category');
		$category_array = array();
		foreach ($category_data as $key => $value) {
			$subcategory_data = $this->obj_comman->get_by('admin_subcategory', array('category_id' => $value['id']));
			$subcategory_array = array();
			foreach ($subcategory_data as $k => $val) {
				$arrayName = array(
					'id' => $val['id'].'-'.$value['id'],
	          		'title' => $val['name']
	          	);
				array_push($subcategory_array,$arrayName);
			}
			$arrayName = array(
				'id' => $value['id'],
          		'title' => $value['name'],
          		'subs' => $subcategory_array
	        );
			array_push($category_array,$arrayName);
		}

		$org_category = $this->obj_comman->get('org_category');
		$org_category_array = array();
		foreach ($org_category as $key => $value) {
			array_push($org_category_array,$value['subcategory_id'].'-'.$value['category_id']);
		}

		$arr_response['status'] = 200;
		$arr_response['geoData'] = $state_array;			
		$arr_response['orgGeoData'] = $org_geo_array;

		$arr_response['categoryData'] = $category_array;			
		$arr_response['orgcategoryData'] = $org_category_array;			
		$arr_response['message'] = 'Successfully';			
		
        echo json_encode($arr_response);
    }
	
	/**
	 * admin Add plan for this controller.
	*/
	public function update_categries() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$org_id = $this->session->userdata('org_id');
		
		$delete=$this->db->delete('org_category',array('org_id' => $org_id));
		$data=$_POST['categories'];
		foreach ($data as $key => $value) {
			if(strpos($value, '-') !== false){
				$id=explode('-', $value);
				$arrayName = array('org_id' => $org_id,'category_id' => $id[1],'subcategory_id' => $id[0] );
				$return_val = $this->obj_comman->insert_data('org_category',$arrayName); 
				$message = 'Successfully added';
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
	 * admin Add plan for this controller.
	*/
	public function update_geo_location() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$org_id = $this->session->userdata('org_id');
		
		$delete=$this->db->delete('org_district',array('org_id' => $org_id));
		$data=$_POST['geo_location'];
		//var_dump($data);//die;
		foreach ($data as $key => $value) {
			if(strpos($value, '-') !== false){
				$id=explode('-', $value);
				$arrayName = array('org_id' => $org_id,'state_id' => $id[1],'district_id' => $id[0] );
				//var_dump($arrayName);
				$return_val = $this->obj_comman->insert_data('org_district',$arrayName); 
				$message = 'Successfully added';
			}
		}
		//die;
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
	
        echo json_encode($arr_response);
    }
	
	public function add_budget(){
		
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$page='list';
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['state_data'] = $this->obj_comman->get_by('admin_states','', array('name' => 'asc'));
		
		if(isset($_GET['id'])){
			$data['donor_id']=$_GET['id'];
			
			$sql = "SELECT * FROM `financial_budget` WHERE `donor_id` = ".$data['donor_id'];
			$result = $this->db->query($sql);
			//var_dump($result->result());
			if ($result && $result->num_rows() > 0) {
				$data['donor_data'] = $result->result();
			}
		}
		if(isset($_GET['budget_id'])){
			$budget_id=$_GET['budget_id'];
			$data['financial_budget_data'] = $this->obj_comman->get_by('financial_budget',array('id'=>$budget_id));
		}else{
			$data['financial_budget_data'] = '';
		}
		
		$data['financial_data'] = $this->obj_comman->get('financial_years');
		
		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
	    if($return_val){
			$this->load->view('organisation/pages/donor/add_budget',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('organisation/components/footer');
		
	}
	public function insert_onsubmit_budget() {
       // var_dump($_POST);die;
		
		//array to store ajax responses
        $arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$org_id = $this->session->userdata('org_id');
			$this->load->model('Comman_model','obj_comman', TRUE);
		//Load Required modal
		$budget_id=$_POST['budget_id'];
			$arrayName = array(
				'financial_id' =>$_POST['financial_id'], 
				'donor_id' => $_POST['donor_id'],
				'org_id' =>	$org_id,
				'amount' => $_POST['amount'],
				'created_date' =>date('Y-m-d H:i:s'),
		);
		if($budget_id==0){
			$return_val = $this->obj_comman->insert_data('financial_budget',$arrayName); 
			$message = 'Successfully added';
			
		}else{
			
			$return_val = $this->obj_comman->update_data('financial_budget',$arrayName,array('id' =>$_POST['budget_id']));
			$message = 'Successfully Updated';
			
		}
		
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
			$arr_response['donor_id'] = $_POST['donor_id'];			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }
	public function remove_budget(){
		//var_dump($_POST);
			
		$id=$_POST['id'];
		$return_val = $this->db->delete('financial_budget',array('id' => $id));
		$message = 'Removed successfully';
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
		
	}
	
}
