<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entity extends CI_Controller {

	/**
     * Default constructor.
     * 
     * @access	public
     * @since	1.0.0
     */
    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
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
		}else{
			$segment =0;
			$page='add';
		}
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
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
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		$this->db->order_by("name", "asc");
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$this->db->order_by("name", "asc");
		$data['subcategory_data'] = $this->obj_comman->get('admin_subcategory');
		$data['admin_district'] = $this->obj_comman->get('admin_district');
		
		$category_data = array();
		foreach ($data['category_data'] as $key => $value) {
			//var_dump($value);
				$data_array=array(
					'id'=>$value['id'],
					'name'=>$value['name'],
				);
			array_push($category_data,$data_array);
			foreach ($data['subcategory_data'] as $key => $value1) {
				if($value['id'] == $value1['category_id']){
					$data_array1=array(
						'id'=>$value1['id'],
						'name'=>$value1['name'],
						'category_id'=>$value['id'],
						'category_name'=>$value['name'],
					);
					array_push($category_data,$data_array1);
				}
				
			}
		}
		//var_dump($category_data);
		$data['category_data'] = $category_data;
		$data['current_page'] = '1';
		$this->db->order_by('name','ASC');
		$data['admin_states'] = $this->obj_comman->get('admin_states');
		$this->db->order_by('name','ASC');
		$data['admin_city'] = $this->obj_comman->get('admin_city');
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/entity/add_entity',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}

	/**
	 * ngo location data for this controller.
	*/
	public function get_ngo_location_data() {
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
		
		$city_data = $this->obj_comman->get_by('admin_district','', array('name' => 'asc'));
		$city_array = array();
		foreach ($city_data as $key => $value) {
			$arrayName = array(
				'id' => $value['id'],
          		'title' => $value['name'],
	        );
			array_push($city_array,$arrayName);
		}

		$arr_response['status'] = 200;
		$arr_response['geoData'] = $state_array;					
		$arr_response['city_data'] = $city_array;					
		$arr_response['message'] = 'Successfully';			
		
        echo json_encode($arr_response);
    }

	/**
	 * Create Page(plans) for this controller.
	 */
	public function create(){
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
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$return_val['is_list']=false;
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$this->db->order_by("name", "asc");
		$data['subcategory_data'] = $this->obj_comman->get('admin_subcategory');
		$data['admin_district'] = $this->obj_comman->get('admin_district');
		
		$category_data = array();
		foreach ($data['category_data'] as $key => $value) {
			array_push($category_data,$value);
			foreach ($data['subcategory_data'] as $key => $value1) {
				if($value['id'] == $value1['category_id']){
					array_push($category_data,$value1);
				}
				
			}
		}
		//var_dump($category_data);
		$data['category_data'] = $category_data;
		$data['admin_states'] = $this->obj_comman->get('admin_states');
		$data['admin_city'] = $this->obj_comman->get('admin_city');
		//$data['session_legal_name'] = $this->session->userdata('legal_name');
		$this->load->view('ngo/components/header');
		$data['current_page'] = '1';
	    if($return_val){
		$this->load->view('ngo/pages/entity/add_entity',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
		
	}
	
	public function edit_page1(){
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
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$return_val['is_list']=false;
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		$this->db->order_by("name", "asc");
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$this->db->order_by("name", "asc");
		$data['subcategory_data'] = $this->obj_comman->get('admin_subcategory');
		$category_data = array();
		foreach ($data['category_data'] as $key => $value) {
				$data_array=array(
					'id'=>$value['id'],
					'name'=>$value['name'],
				);
			array_push($category_data,$data_array);
			foreach ($data['subcategory_data'] as $key => $value1) {
				if($value['id'] == $value1['category_id']){
					$data_array1=array(
						'id'=>$value1['id'],
						'name'=>$value1['name'],
						'category_id'=>$value['id'],
						'category_name'=>$value['name'],
					);
					array_push($category_data,$data_array1);
				}
				
			}
		}
		$data['category_data'] = $category_data;
		$data['admin_district'] = $this->obj_comman->get('admin_district');
		$data['admin_city'] = $this->obj_comman->get('admin_city');
		
		$data['session_legal_name'] = $this->session->userdata('legal_name');
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		$data['current_page'] = '1';
	    if($return_val and $data['entity_data']){
			$this->load->view('ngo/pages/entity/edit_entity_view/comman_edit_enity_page',$data);
			$this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_1',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
		
	}
	
	public function edit_page2(){
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
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$return_val['is_list']=false;
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$this->db->order_by('name','ASC');
		$data['admin_states'] = $this->obj_comman->get('admin_states');
		$data['admin_city'] = $this->obj_comman->get('admin_city');

		$data['session_legal_name'] = $this->session->userdata('legal_name');
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		$data['current_page'] = '2';
	    if($return_val and $data['entity_data']){
			$this->load->view('ngo/pages/entity/edit_entity_view/comman_edit_enity_page',$data);
			$this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_2',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
		
	}
	
	public function edit_page3(){
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
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$return_val['is_list']=false;
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$data['current_page'] = '3';
		$data['session_legal_name'] = $this->session->userdata('legal_name');
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val and $data['entity_data']){
			$this->load->view('ngo/pages/entity/edit_entity_view/comman_edit_enity_page',$data);
			$this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_3',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
		
	}
	
	public function edit_page4(){
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
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$return_val['is_list']=false;
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$data['current_page'] = '4';
		$data['session_legal_name'] = $this->session->userdata('legal_name');
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val and $data['entity_data']){
			$this->load->view('ngo/pages/entity/edit_entity_view/comman_edit_enity_page',$data);
			$this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_4',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
		
	}
	public function edit_page5(){
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
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$return_val['is_list']=false;
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$data['current_page'] = '5';
		$data['session_legal_name'] = $this->session->userdata('legal_name');
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val and $data['entity_data']){
			$this->load->view('ngo/pages/entity/edit_entity_view/comman_edit_enity_page',$data);
			$this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_5',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
		
	}
	
	public function edit_page6(){
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
			'module_id' => '3', 
			'submodule_id' => '3', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$return_val['is_list']=false;
		$data['is_permitted']=$return_val;
		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		
		$data['category_data'] = $this->obj_comman->get('admin_category');
		$data['current_page'] = '6';
		$data['session_legal_name'] = $this->session->userdata('legal_name');
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val and $data['entity_data']){
			$this->load->view('ngo/pages/entity/edit_entity_view/comman_edit_enity_page',$data);
			$this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_6',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
		
	}

	/**
	 * admin Add plan for this controller.
	*/
	public function update_entity() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
        $return_val ='';
        $error_message = 'Something went Wrong! Please try again';
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);

		$superngo_id = $this->session->userdata('superngo_id');
		
		
		$entity_id=$_POST['entity_id'];
		$data=$_POST['table_field'];

		if($entity_id == 0){
			if($this->check_entity_code()){
				$data['code'] = $_POST['code'];
				$data['superngo_id'] = $superngo_id;
				$data['created_time'] = date('Y-m-d H:i:s');
				$return_val = $this->obj_comman->insert_data('ngo',$data); 
				$message = 'Successfully added';
			}else{
				$error_message = 'This code is assinged to an entity';
			}
		} else{
			$return_val = $this->obj_comman->update_data('ngo',$data,array('id' => $_POST['entity_id']));
			$message = 'Successfully updated';			
	    }

		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = $error_message;
		}
        echo json_encode($arr_response);
    }

    public function check_entity_code() {
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$result = $this->obj_comman->get_by('ngo',array('code'=> $_POST['code']));
        if ($result) {
        	if(isset($_POST['param'])){
        		echo 'false';
        	}else{
	            return false;
	        }
        } else {
        	if(isset($_POST['param'])){
        		echo 'true';
        	}else{
            	return true;
            }
        }
	}
	public function page1_check_legal_name1() {
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$legal_name=$_POST['legal_name'];
		$sql="select legal_name from ngo WHERE legal_name='$legal_name'";
		$result = $this->obj_comman->get_query($sql);
        if ($result) {
        	if(isset($_POST['param1'])){
        		echo 'false';
        	}else{
	            return false;
	        }
        } else {
        	if(isset($_POST['param1'])){
        		echo 'true';
        	}else{
            	return true;
            }
        }
	}

	public function page1_check_legal_name() {
			//var_dump($_POST);die;
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$legal_name=$_POST['legal_name'];
		$entity_id=$_POST['entity_id'];
		$match='no';
		$match_edit='no';
		$sql="select legal_name,id from ngo WHERE legal_name='$legal_name'";
			$return_val = $this->db->query($sql)->result_array();
			//var_dump($return_val);
			if($return_val){
				$id=$return_val[0]['id'];
				//var_dump($id);
				if($id==$entity_id){
					$match_edit='yes';
					$match = 'yes';
				}else{
					$match = 'yes';
					//$match_edit='no';
				}
					
			}
		
		$arr_response['status'] = 200;
		$arr_response['match'] = $match;			
		$arr_response['match_edit'] = $match_edit;			
	 
		echo json_encode($arr_response);
	}

	/**
	 * admin List of plans for this controller.
	*/
	public function list(){
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		$page='list';
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		//var_dump($this->session->userdata());
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

		$superngo_id = $this->session->userdata('superngo_id');

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['profile_data'] = $this->obj_comman->get_by('superngo',array('id'=> $this->session->userdata('superngo_id')),false,true);

		$sql="select * from ngo where `superngo_id`=$superngo_id AND `is_deleted`=0  ORDER BY `id` DESC";
		$data['listdata'] = $this->obj_comman->get_query($sql);
		
	    
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		
		if($return_val){
			$this->load->view('ngo/pages/entity/entity_listing',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}

	public function update_ngo_profile_data() {
		$arr_response = array('status' => 500);

		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$superngo_id = $this->session->userdata('superngo_id');
		$where = array('id' => $superngo_id);
		
		$return_val = $this->obj_comman->update_data('superngo',$_POST['table_field'],$where); 
		$arr_response['message'] = 'Successfully updated';
	 	
		if ($return_val) {
			$arr_response['status'] = 200;
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
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
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
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
		$data['entity_data'] = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		$geo_location_id1=$data['entity_data']['geo_location_id'];
		$geo_location_id=json_decode($geo_location_id1);
		//var_dump($geo_location_id);
		
		$org_district = $this->obj_comman->get_query("select state_id, (select name from admin_states where id=ngo_district.state_id) as 'state_name' from ngo_district where ngo_id=$segment group by state_id");
		foreach ($org_district as $key => $value) {
			$state_id=$value['state_id'];
			$sql="select district_id,(select name from admin_district where id=ngo_district.district_id) as 'district_name' from ngo_district where ngo_id=$segment AND state_id=$state_id";

			$district = $this->obj_comman->get_query($sql);
			$org_district[$key]['district']=$district;
		}
		$data['ngo_geographies_data']=$org_district;
		
		
		$data['superngo_data'] ='';

		$data['edit_hide']='no';
		$data['page_heading_disp']='yes';
		$data['page_splite']='no';
		$data['page_col_md']='col-md-12';
		$data['pro_ngo_hide'] ='no';
		$data['back_ngo_list_button'] ='no';

		$sql="select *,(select org_name from organisation where org_id=proposal.organisation_id) as 'organisation' from proposal where ngo_id=$segment AND is_deleted=0";
		$data['proposal_data'] = $this->obj_comman->get_query($sql);
		
		$sql5="SELECT * FROM `ngo_notification` WHERE `ngo_id` =$segment AND status='Pending' AND request_type='entity' ORDER BY notification_id DESC" ;
		$result4 = $this->db->query($sql5); 
		
		if ($result4 && $result4->num_rows() > 0){
			$data['ngo_notification'] = $result4->result();
		}else{
			$data['ngo_notification'] = '';
		}
			
		
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/entity/edit_entity',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	/*public function resolved_submit(){            
		//var_dump($_POST);die;	
		$notification_id=$_POST['notification_id_send'];
		$org_task_id=$_POST['org_task_id_send'];
		$org_id=$_POST['org_id_send'];
		$ngo_id=$_POST['ngo_id_send'];
		$superngo_id=$_POST['superngo_id_send'];
		$proposal_id=$_POST['proposal_id_send'];
		$document_type=$_POST['document_type_send'];
		$notification_title='NGO Revised';
		$data = array(
					'status' =>$notification_title,
			);
		$data1 = array(
				'proposal_status' =>$notification_title,
		);
		
			//var_dump($data);die;
			$result = $this->db->update('org_tasks', $data, array('org_task_id '=>$org_task_id));	
			$return_val = $this->db->update('ngo_notification', $data, array('notification_id '=>$notification_id));	
			$return_val = $this->db->update('org_ngo_review_status', $data, array('org_id' => $org_id,'ngo_id' => $ngo_id));	
			$return_val = $this->db->update('proposal', $data1, array('prop_id' => $proposal_id));	
		
				
			
			//var_dump($return_val,);die;
			if($return_val=='true'){
				$this->ngo_notification_send_email($superngo_id,$org_id,$org_task_id,$ngo_id,$notification_title,$proposal_id);
			}	
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Send Notification Successfully ';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		
		echo json_encode($arr_response);
		
	}*/

	public function entity_data_page_submit() {
        //array to store ajax responses
		//var_dump($_POST);die;
        $arr_response = array('status' => 500);
		//$id= $_POST['entity_id'];
		$ngo_id= $_POST['ngo_id'];
		$category_array='';
	
		$staff_id = $this->session->userdata('ngo_staff_id');
		$superngo_id = $this->session->userdata('superngo_id');
		
		//var_dump($_POST);
		
		$geo_location_id_array='';
		
		if(isset($_POST['category_array'])){
			$category_array=json_encode($_POST['category_array']);
		}
		if(isset($_POST['geo_location_id_array'])){
			$geo_location_id_array=$_POST['geo_location_id_array'];
		}
		//var_dump($category_array);die;
		$data = array(
			 'legal_name' => $_POST['legal_name'],
			 'brand_name' => $_POST['brand_name'],
			 'superngo_id' => $superngo_id,
			 'staff_id' => $staff_id,
			 'created_time' => date('Y-m-d H:i:s'),
			 'is_deleted' => 0,
			 'code'=>$_POST['code'],
			 'website'=>$_POST['website'],
			 'geo_location'=>$_POST['geo_location'],
			 'geo_location_id'=>$_POST['geo_location_id'],
			 
			 'city_id'=>json_encode($_POST['city_id']),
			 'city'=>json_encode($_POST['city']),
			 'category_array'=>$category_array,
			 'beneficiary_reach'=>$_POST['beneficiary_reach'],
			 'resource_managment'=>$_POST['resource_managment'],
			 'geographical_reach'=>$_POST['geographical_reach'],
			 'beneficiary_reach'=>$_POST['beneficiary_reach'],
			 'operation_nature'=>$_POST['operation_nature'],
			 'page1_validation_error'=>$_POST['page1_validation_error'],
			 'other_spacify_ddtail'=>$_POST['other_spacify_ddtail'],
			
			 
			 
		); 
		//var_dump($data);
				
		if($ngo_id==0){
			$return_val = $this->db->insert('ngo',$data);
		    $ngo_id=$this->db->insert_id();
			if($ngo_id){
				if($geo_location_id_array){
					foreach ($geo_location_id_array as $key => $value) {
						if(strpos($value, '-') !== false){
							$id=explode('-', $value);
							$arrayName = array('ngo_id' => $ngo_id,'state_id' => $id[1],'district_id' => $id[0] );
							//var_dump($arrayName);
							$return_val = $this->db->insert('ngo_district',$arrayName); 
							//$message = 'Successfully added';
						}
					}
				}
			}
			
		}else{
			$return_val = $this->db->update('ngo',$data,array('id' => $ngo_id));
			
			if($geo_location_id_array){
				$delete=$this->db->delete('ngo_district',array('ngo_id' => $ngo_id));
				foreach ($geo_location_id_array as $key => $value) {
					if(strpos($value, '-') !== false){
						$id=explode('-', $value);
						$arrayName = array('ngo_id' => $ngo_id,'state_id' => $id[1],'district_id' => $id[0] );
						//var_dump($arrayName);
						$return_val = $this->db->insert('ngo_district',$arrayName); 
						//$message = 'Successfully added';
					}
				}
			}
		}
		//var_dump($ngo_id);
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
			$arr_response['ngo_id']=$ngo_id;
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
		
		
	}
	
	public function entity_data_page2_submit(){
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//var_dump($_POST);die;
		//$id= $_POST['entity_id'];
		$ngo_id= $_POST['ngo_id'];
		$appropriate_certification='';
		$registration_number_12a='';
		$from_date_12a_valid='';
		$expire_date_12a_valid='';
		$certificate_date_80G='';
		$registration_80g_valid='';
		$tax_exemption_type='';
		$upload_proof_tax_exemption='';
		$is_12a_certificate='';
		$is_12a_certificate_cancle='';
		$is_tax_exemption_80g='';
		$is_perpetuity_valid='';
		$is_valid_tax_exemption='';
		$is_certificate_exist='';
		$registration_details='';
		$page2_validation_error='';
		
		$csr1_registration_number_radio='';
		$csr1_registration_number='';
		$upload_proof_csr1_actual='';
		$upload_proof_csr1_value='';
		
		
		if(isset($_POST['appropriate_certification'])){
			$appropriate_certification=json_encode($_POST['appropriate_certification']);
		}
		
		if(isset($_POST['registration_details'])){
			$registration_details=json_encode($_POST['registration_details']);
		}
		
		
		if(isset($_POST['registration_number_12a'])){
			$registration_number_12a=$_POST['registration_number_12a'];
		}
		if(isset($_POST['from_date_12a_valid'])){
			$from_date_12a_valid=$_POST['from_date_12a_valid'];
		}
		if(isset($_POST['expire_date_12a_valid'])){
			$expire_date_12a_valid=$_POST['expire_date_12a_valid'];
		}
		if(isset($_POST['certificate_date_80G'])){
			$certificate_date_80G=$_POST['certificate_date_80G'];
		}
		if(isset($_POST['registration_80g_valid'])){
			$registration_80g_valid=$_POST['registration_80g_valid'];
		}
		if(isset($_POST['tax_exemption_type'])){
			$tax_exemption_type=$_POST['tax_exemption_type'];
		}
		if(isset($_POST['upload_proof_tax_exemption'])){
			$upload_proof_tax_exemption=$_POST['upload_proof_tax_exemption'];
		}
		if(isset($_POST['is_12a_certificate'])){
			$is_12a_certificate=$_POST['is_12a_certificate'];
		}
		if(isset($_POST['is_12a_certificate_cancle'])){
			$is_12a_certificate_cancle=$_POST['is_12a_certificate_cancle'];
		}
		if(isset($_POST['is_tax_exemption_80g'])){
			$is_tax_exemption_80g=$_POST['is_tax_exemption_80g'];
		}
		if(isset($_POST['is_perpetuity_valid'])){
			$is_perpetuity_valid=$_POST['is_perpetuity_valid'];
		}
		if(isset($_POST['is_valid_tax_exemption'])){
			$is_valid_tax_exemption=$_POST['is_valid_tax_exemption'];
		}
		if(isset($_POST['is_certificate_exist'])){
			$is_certificate_exist=$_POST['is_certificate_exist'];
		}
		if(isset($_POST['page2_validation_error'])){
			$page2_validation_error=$_POST['page2_validation_error'];
		}
		
		
		
		if(isset($_POST['csr1_registration_number_radio'])){
			$csr1_registration_number_radio=$_POST['csr1_registration_number_radio'];
		}
		if(isset($_POST['csr1_registration_number'])){
			$csr1_registration_number=$_POST['csr1_registration_number'];
		}
		if(isset($_POST['upload_proof_csr1_actual'])){
			$upload_proof_csr1_actual=$_POST['upload_proof_csr1_actual'];
		}
		if(isset($_POST['upload_proof_csr1_value'])){
			$upload_proof_csr1_value=$_POST['upload_proof_csr1_value'];
		}
		
		
		$data_page2 = array(
			 
			 'registration_number_12a'=>$registration_number_12a,
			 'from_date_12a_valid'=>$from_date_12a_valid,
			 'expire_date_12a_valid'=>$expire_date_12a_valid,
			 //'tax_exemption_percentage'=>$_POST['tax_exemption_percentage'],
			 'registration_number_80g'=>$_POST['registration_number_80g'],
			 'certificate_date_80G'=>$certificate_date_80G,
			 'registration_80g_valid'=>$registration_80g_valid,
			 'tax_exemption_type'=>$tax_exemption_type,
			 'pan_number'=>$_POST['pan_number'],
			 'epf_number'=>$_POST['epf_number'],
			 'professional_tax_number'=>$_POST['professional_tax_number'],
			 'tan_number'=>$_POST['tan_number'],
			 'other_appropriate_certification_input'=>$_POST['other_appropriate_certification_input'],
			 'is_12a_certificate'=>$is_12a_certificate,
			 'is_12a_certificate_cancle'=>$is_12a_certificate_cancle,
			 'is_tax_exemption_80g'=>$is_tax_exemption_80g,
			 'is_perpetuity_valid'=>$is_perpetuity_valid,
			 'is_valid_tax_exemption'=>$is_valid_tax_exemption,
			 'is_certificate_exist'=>$is_certificate_exist,
			 'appropriate_certification'=>$appropriate_certification,
			 'upload_proof_tax_exemption'=>$upload_proof_tax_exemption,
			 //'upload_registration_certificate'=>$_POST['upload_registration_certificate'],
			 'upload_proof_12A_reg'=>$_POST['upload_proof_12A_reg'],
			 'upload_proof_12A_reg_actual'=>$_POST['upload_proof_12A_reg_actual'],
			 'upload_80G_reg'=>$_POST['upload_80G_reg'],
			 'upload_80G_reg_actual'=>$_POST['upload_80G_reg_actual'],
			 'upload_proof_80G_incometax'=>$_POST['upload_proof_80G_incometax'],
			 'upload_proof_80G_incometax_actual'=>$_POST['upload_proof_80G_incometax_actual'],
			 'upload_proof_tax_exemption_actual'=>$_POST['upload_proof_tax_exemption_actual'],
			 'soft_copy_pancard'=>$_POST['soft_copy_pancard'],
			 'soft_copy_pancard_actual'=>$_POST['soft_copy_pancard_actual'],
			 'proof_of_TAN'=>$_POST['proof_of_TAN'],
			 'proof_of_TAN_actual'=>$_POST['proof_of_TAN_actual'],
			 'epf_for_last_year'=>$_POST['epf_for_last_year'],
			 'epf_for_last_year_actual'=>$_POST['epf_for_last_year_actual'],
			 'tax_for_last_year'=>$_POST['tax_for_last_year'],
			 'tax_for_last_year_actual'=>$_POST['tax_for_last_year_actual'],
			 'credibility_alliance_report'=>$_POST['credibility_alliance_report'],
			 'credibility_alliance_report_actual'=>$_POST['credibility_alliance_report_actual'],
			 'registration_detail'=>$registration_details,
			 'page2_validation_error'=>$page2_validation_error,
			 
			 'csr1_registration_number_radio'=>$csr1_registration_number_radio,
			 'csr1_registration_number'=>$csr1_registration_number,
			 'upload_proof_csr1_actual'=>$upload_proof_csr1_actual,
			 'upload_proof_csr1_value'=>$upload_proof_csr1_value,
             		 
		); 
				//var_dump($data_page2);
		//if($id==0){
			//$return_val = $this->db->insert('ngo',$data_page2);
		//}//else{
			
			$return_val = $this->db->update('ngo',$data_page2,array('id' => $ngo_id));
		//}
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    
	}
	
	public function entity_data_page3_submit() {
        //array to store ajax responses
		//var_dump($_POST);die;
        $arr_response = array('status' => 500);
		$ngo_id= $_POST['ngo_id'];
		$governing_council='';
		$non_financial_partnerships='';
		$leadership_network='';
		$blacklist='';
		$guilty='';
		$religious_affiliation_on_radio='';
		$bajaj_group_involved='';
		$senior_member_involved='';
		$previously_recieve_funding='';
		$received_award='';
		$received_national_award='';
        $upload_annual_report_1='';
        $upload_annual_report_2='';
        $upload_annual_report_3='';	
		$upload_annual_report_1_actual='';
        $upload_annual_report_2_actual='';
        $upload_annual_report_3_actual='';	
        $is_non_financial_partnerships='';	
		$is_leadership_network='';
		$is_guilty='';
		$is_blacklist='';
		$is_political_affiliation='';
		$optradio2='';
		$optradio3='';
		$optradio4='';
		$optradio5='';
		$optradio6='';
		$optradio7='';
		$page3_validation_error='';
		$page3_financial_years='';
		
		if(isset($_POST['governing_council'])){
			$governing_council=json_encode($_POST['governing_council']);
		}
		if(isset($_POST['page3_financial_years'])){
			$page3_financial_years=json_encode($_POST['page3_financial_years']);
		}
		if(isset($_POST['non_financial_partnerships'])){
			$non_financial_partnerships=$_POST['non_financial_partnerships'];
		}
		if(isset($_POST['leadership_network'])){
			$leadership_network=$_POST['leadership_network'];
		}
		if(isset($_POST['blacklist'])){
			$blacklist=$_POST['blacklist'];
		}
		if(isset($_POST['guilty'])){
			$guilty=$_POST['guilty'];
		}
		if(isset($_POST['religious_affiliation_on_radio'])){
			$religious_affiliation_on_radio=$_POST['religious_affiliation_on_radio'];
		}
		if(isset($_POST['bajaj_group_involved'])){
			$bajaj_group_involved =$_POST['bajaj_group_involved'];
		}
		if(isset($_POST['senior_member_involved'])){
			$senior_member_involved=$_POST['senior_member_involved'];
		}
		if(isset($_POST['previously_recieve_funding'])){
			$previously_recieve_funding =$_POST['previously_recieve_funding'];
		}
		if(isset($_POST['received_award'])){
			$received_award =$_POST['received_award'];
		}
		if(isset($_POST['received_national_award'])){
			$received_national_award =$_POST['received_national_award'];
		}
		if(isset($_POST['upload_annual_report_1'])){
			$upload_annual_report_1 =$_POST['upload_annual_report_1'];
		}
		if(isset($_POST['upload_annual_report_2'])){
			$upload_annual_report_2 =$_POST['upload_annual_report_2'];
		}
		if(isset($_POST['upload_annual_report_3'])){
			$upload_annual_report_3 =$_POST['upload_annual_report_3'];
		}
		if(isset($_POST['upload_annual_report_1_actual'])){
			$upload_annual_report_1_actual =$_POST['upload_annual_report_1_actual'];
		}
		if(isset($_POST['upload_annual_report_2_actual'])){
			$upload_annual_report_2_actual =$_POST['upload_annual_report_2_actual'];
		}
		if(isset($_POST['upload_annual_report_3_actual'])){
			$upload_annual_report_3_actual =$_POST['upload_annual_report_3_actual'];
		}
		if(isset($_POST['is_non_financial_partnerships'])){
			$is_non_financial_partnerships =$_POST['is_non_financial_partnerships'];
		}
	    if(isset($_POST['is_leadership_network'])){
			$is_leadership_network =$_POST['is_leadership_network'];
		}
		if(isset($_POST['is_guilty'])){
			$is_guilty =$_POST['is_guilty'];
		}
		
		
		if(isset($_POST['is_political_affiliation'])){
			$is_political_affiliation =$_POST['is_political_affiliation'];
		}
		if(isset($_POST['optradio2'])){
			$optradio2 =$_POST['optradio2'];
		}
		if(isset($_POST['optradio3'])){
			$optradio3 =$_POST['optradio3'];
		}
		if(isset($_POST['optradio4'])){
			$optradio4 =$_POST['optradio4'];
		}
		if(isset($_POST['optradio5'])){
			$optradio5 =$_POST['optradio5'];
		}
		if(isset($_POST['optradio6'])){
			$optradio6 =$_POST['optradio6'];
		}
		if(isset($_POST['optradio7'])){
			$optradio7 =$_POST['optradio7'];
		}
		if(isset($_POST['is_blacklist'])){
			$is_blacklist =$_POST['is_blacklist'];
		}
		if(isset($_POST['page3_validation_error'])){
			$page3_validation_error =$_POST['page3_validation_error'];
		}
		
		$data_page3 = array(
			
			 'non_financial_partnerships'=>$non_financial_partnerships,
			 'leadership_network'=>$leadership_network,
			 'blacklist'=>$blacklist,
			 'guilty'=>$guilty,
			 'religious_affiliation_on_radio'=>$religious_affiliation_on_radio,
			 'bajaj_group_involved'=>$bajaj_group_involved,
			 'senior_member_involved'=>$senior_member_involved,
			 'previously_recieve_funding'=>$previously_recieve_funding,
			 'received_award'=>$received_award,
			 'received_national_award'=>$received_national_award,
			 'upload_annual_report_1'=>$upload_annual_report_1,
			 'upload_annual_report_2'=>$upload_annual_report_2,
			 'upload_annual_report_3'=>$upload_annual_report_3,
			 'upload_annual_report_1_actual'=>$upload_annual_report_1_actual,
			 'upload_annual_report_2_actual'=>$upload_annual_report_2_actual,
			 'upload_annual_report_3_actual'=>$upload_annual_report_3_actual,
			 'governing_council'=>$governing_council,
			 'is_non_financial_partnerships'=>$is_non_financial_partnerships,
			 'is_leadership_network'=>$is_leadership_network,
			 'is_guilty'=>$is_guilty,
			 'is_political_affiliation'=>$is_political_affiliation,
			 'optradio2'=>$optradio2,
			 'optradio3'=>$optradio3,
			 'optradio4'=>$optradio4,
			 'optradio5'=>$optradio5,
			 'optradio6'=>$optradio6,
			 'optradio7'=>$optradio7,
			 'is_blacklist'=>$is_blacklist,
			 'page3_financial_years'=>$page3_financial_years,
			 'page3_validation_error'=>$page3_validation_error,
			 
		); 
		//var_dump($data_page3);
				
		//if($id==0){
			//$return_val = $this->db->insert('ngo',$data_page3);
		//}//else{
			$return_val = $this->db->update('ngo',$data_page3,array('id' => $ngo_id));
			
			
		//}
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    
	}
	
	public function entity_data_page4_submit() {
			
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//var_dump($_POST);die;
		$ngo_id= $_POST['ngo_id'];
		$upload_organogram='';
		$upload_organogram_actual='';
		$detail_body_member ='';
		$renumeration_senior_leadership='';
		//$name_of_member='';
		//$member_age='';
		//$member_gender='';
		//$member_designation ='';
		//$member_join_at ='';
		//$member_related_to_other ='';
		//$member_occupation ='';
		$governing_body_member_det='';
		$defined_structure_decission_making='';
		$vehicles_details='';
		$foreign_travel_taken_by_staff='';
		$full_time_staff_numbers='';
		$renumeration_of_senior_leadership='';
		$part_time_staff_numbers='';
		$img_file='';
		$entity_have_governing_board='';
		$page4_validation_error='';
		
		if(isset($_POST['governing_body_member_det'])){
			$governing_body_member_det=json_encode($_POST['governing_body_member_det']);
		}
		if(isset($_POST['vehicles_details'])){
			$vehicles_details=json_encode($_POST['vehicles_details']);
		}
		if(isset($_POST['foreign_travel_taken_by_staff'])){
			$foreign_travel_taken_by_staff=json_encode($_POST['foreign_travel_taken_by_staff']);
		}
         
		
		 if(isset($_POST['full_time_staff_numbers'])){
			$full_time_staff_numbers=json_encode($_POST['full_time_staff_numbers']);
		}
		if(isset($_POST['renumeration_of_senior_leadership'])){
			$renumeration_of_senior_leadership=json_encode($_POST['renumeration_of_senior_leadership']);
		}
		if(isset($_POST['part_time_staff_numbers'])){
			$part_time_staff_numbers=json_encode($_POST['part_time_staff_numbers']);
		}


		
		//if(isset($_POST['governing_body_member_det'])){
			//$governing_body_member_det=$_POST['governing_body_member_det'];
		//}
		if(isset($_POST['upload_organogram'])){
			$upload_organogram=$_POST['upload_organogram'];
		}
		if(isset($_POST['upload_organogram_actual'])){
			$upload_organogram_actual=$_POST['upload_organogram_actual'];
		}
		if(isset($_POST['detail_body_member'])){
			$detail_body_member=$_POST['detail_body_member'];
		}
		if(isset($_POST['img_file'])){
			$img_file=$_POST['img_file'];
		}
		
		if(isset($_POST['defined_structure_decission_making'])){
			$defined_structure_decission_making = $_POST['defined_structure_decission_making'];
		}
		if(isset($_POST['entity_have_governing_board'])){
			$entity_have_governing_board =$_POST['entity_have_governing_board'];
		}
		if(isset($_POST['page4_validation_error'])){
			$page4_validation_error =$_POST['page4_validation_error'];
		}
		//var_dump($governing_body_member_det);
		$data_page4 = array(
			'upload_organogram'=>$upload_organogram,
			'upload_organogram_actual'=>$upload_organogram_actual,
			'vehicles_details'=>$vehicles_details,
			'governing_body_member_det'=>$governing_body_member_det,
			'detail_body_member'=>$detail_body_member,
			'defined_structure_decission_making'=>$defined_structure_decission_making,
			'number_of_employee'=>$_POST['number_of_employee'],
			'number_of_employee_through_contractor'=>$_POST['number_of_employee_through_contractor'],
			'number_parttime_employees'=>$_POST['number_parttime_employees'],
			'renumeration_leadership'=>$img_file,
			'foreign_travel_taken_by_staff'=>$foreign_travel_taken_by_staff,
			'full_time_staff_numbers'=>$full_time_staff_numbers,
			'renumeration_of_senior_leadership'=>$renumeration_of_senior_leadership,
			'part_time_staff_numbers'=>$part_time_staff_numbers,
			'entity_have_governing_board'=>$entity_have_governing_board,
			'page4_validation_error'=>$page4_validation_error,
		); 	
		//var_dump($data_page4);
		
		$return_val = $this->db->update('ngo',$data_page4,array('id' => $ngo_id));
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    
	}
	
	public function entity_data_page5_submit() {
        //array to store ajax responses
		//var_dump($_POST);die;
        $arr_response = array('status' => 500);
		$ngo_id= $_POST['ngo_id'];
		$gst_number='';
		$entity_have_gst_num='';
		$major_donors='';
		$budget_details='';
		$upload_financial_statement1='';
		$page5_financial_years='';
		$page5_validation_error='';
		
		$uploaded_xl_file='';
		$uploaded_xl_file_actual='';
		
		if(isset($_POST['uploaded_xl_file'])){
			$uploaded_xl_file=$_POST['uploaded_xl_file'];
		}
		if(isset($_POST['uploaded_xl_file_actual'])){
			$uploaded_xl_file_actual=$_POST['uploaded_xl_file_actual'];
		}
		
		if(isset($_POST['gst_number'])){
			$gst_number=$_POST['gst_number'];
		}
		
		if(isset($_POST['entity_have_gst_num'])){
			$entity_have_gst_num=$_POST['entity_have_gst_num'];
		}
		if(isset($_POST['upload_financial_statement1'])){
			$upload_financial_statement1=$_POST['upload_financial_statement1'];
		}
		if(isset($_POST['upload_financial_statement2'])){
			$upload_financial_statement2=$_POST['upload_financial_statement2'];
		}
		if(isset($_POST['upload_financial_statement3'])){
			$upload_financial_statement3=$_POST['upload_financial_statement3'];
		}
		if(isset($_POST['uplpad_ITR_1'])){
			$uplpad_ITR_1=$_POST['uplpad_ITR_1'];
		}
		if(isset($_POST['uplpad_ITR_2'])){
			$uplpad_ITR_2=$_POST['uplpad_ITR_2'];
		}
		if(isset($_POST['uplpad_ITR_3'])){
			$uplpad_ITR_3=$_POST['uplpad_ITR_3'];
		}
		if(isset($_POST['uplpad_ITR_1_actual'])){
			$uplpad_ITR_1_actual=$_POST['uplpad_ITR_1_actual'];
		}
		if(isset($_POST['uplpad_ITR_2_actual'])){
			$uplpad_ITR_2_actual=$_POST['uplpad_ITR_2_actual'];
		}
		if(isset($_POST['uplpad_ITR_3_actual'])){
			$uplpad_ITR_3_actual=$_POST['uplpad_ITR_3_actual'];
		}
		if(isset($_POST['upload_financial_statement1_actual'])){
			$upload_financial_statement1_actual=$_POST['upload_financial_statement1_actual'];
		}
		if(isset($_POST['upload_financial_statement2_actual'])){
			$upload_financial_statement2_actual=$_POST['upload_financial_statement2_actual'];
		}
		if(isset($_POST['upload_financial_statement3_actual'])){
			$upload_financial_statement3_actual=$_POST['upload_financial_statement3_actual'];
		}
		if(isset($_POST['upload_cancelled_cheque_actual'])){
			$upload_cancelled_cheque_actual=$_POST['upload_cancelled_cheque_actual'];
		}
		if(isset($_POST['gst_exemption_letter_actual'])){
			$gst_exemption_letter_actual=$_POST['gst_exemption_letter_actual'];
		}
		if(isset($_POST['gst_certificate_actual'])){
			$gst_certificate_actual=$_POST['gst_certificate_actual'];
		}
		
		if(isset($_POST['major_donors'])){
			$major_donors=json_encode($_POST['major_donors']);
		}
		if(isset($_POST['budget_details'])){
			//var_dump($_POST['budget_details']);die;
			$budget_details=json_encode($_POST['budget_details']);
		}

		if(isset($_POST['page5_validation_error'])){
			$page5_validation_error=$_POST['page5_validation_error'];
		}
		
		if(isset($_POST['page5_financial_years'])){
			$page5_financial_years=json_encode($_POST['page5_financial_years']);
		}
		
		$data_page5 = array(
			
			 'gst_number'=>$gst_number,
			 'entity_have_gst_num'=>$entity_have_gst_num,
			 'upload_financial_statement1'=>$upload_financial_statement1,
			 'upload_financial_statement2'=>$upload_financial_statement2,
			 'upload_financial_statement3'=>$upload_financial_statement3,
			 'upload_financial_statement1_actual'=>$upload_financial_statement1_actual,
			 'upload_financial_statement2_actual'=>$upload_financial_statement2_actual,
			 'upload_financial_statement3_actual'=>$upload_financial_statement3_actual,
			 'uplpad_ITR_1'=>$uplpad_ITR_1,
			 'uplpad_ITR_2'=>$uplpad_ITR_2,
			 'uplpad_ITR_3'=>$uplpad_ITR_3,
			 'uplpad_ITR_1_actual'=>$uplpad_ITR_1_actual,
			 'uplpad_ITR_2_actual'=>$uplpad_ITR_2_actual,
			 'uplpad_ITR_3_actual'=>$uplpad_ITR_3_actual,
			 'upload_cancelled_cheque_actual'=>$upload_cancelled_cheque_actual,
			 'gst_exemption_letter_actual'=>$gst_exemption_letter_actual,
			 'gst_certificate_actual'=>$gst_certificate_actual,
			 'gst_certificate'=>$_POST['gst_certificate'], 
			 'upload_cancelled_cheque'=>$_POST['upload_cancelled_cheque'],
			 'name_of_organization'=>$_POST['name_of_organization'], 
			 'major_donors'=>$major_donors,
			 'budget_details'=>$budget_details,
			 'gst_exemption_letter'=>$_POST['gst_exemption_letter'],
			 'page5_financial_years'=>$page5_financial_years,
			 'page5_validation_error'=>$page5_validation_error,
			 'xl_file'=>$uploaded_xl_file,
			 'xl_file_actual'=>$uploaded_xl_file_actual,
			 
		); 
		//var_dump($data_page5);
			//die;	
		//if($id==0){
			//$return_val = $this->db->insert('ngo',$data_page5);
		//}//else{
			$return_val = $this->db->update('ngo',$data_page5,array('id' => $ngo_id));
		//}
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    
	}
	
	public function entity_data_page6_submit() {
        //array to store ajax responses
		//var_dump($_POST);die;
        $arr_response = array('status' => 500);
		$other_policies='';
		$multiple_img_upload='';
		$multiple_img_upload2='';
		$ngo_id= $_POST['ngo_id'];
		$optradio_policy='';
		$optradio_whistleblower_policy='';
		$optradio_child_protection_policy='';
		$other_policies_name='';
		$page6_validation_error='';
		
		if(isset($_POST['other_policies'])){
			$other_policies=json_encode($_POST['other_policies']);
		}
		if(isset($_POST['multiple_img_upload'])){
			$multiple_img_upload=json_encode($_POST['multiple_img_upload']);
		}
		if(isset($_POST['multiple_img_upload2'])){
			$multiple_img_upload2=json_encode($_POST['multiple_img_upload2']);
		}
		
		if(isset($_POST['optradio_policy'])){
			$optradio_policy=$_POST['optradio_policy'];
		}
		if(isset($_POST['optradio_whistleblower_policy'])){
			$optradio_whistleblower_policy=$_POST['optradio_whistleblower_policy'];
		}
		if(isset($_POST['other_policies_name'])){
			$other_policies_name=$_POST['other_policies_name'];
		}
		if(isset($_POST['optradio_child_protection_policy'])){
			$optradio_child_protection_policy=$_POST['optradio_child_protection_policy'];
		}
		if(isset($_POST['page6_validation_error'])){
			$page6_validation_error=$_POST['page6_validation_error'];
		}
		
		
	
		
		$data_page6 = array(
			
			 'other_policies'=>$other_policies,
			 'optradio_policy'=>$optradio_policy,
			 'optradio_whistleblower_policy'=>$optradio_whistleblower_policy,
			 'optradio_child_protection_policy'=>$optradio_child_protection_policy,
			 'multiple_img_upload'=>$multiple_img_upload,
			 'multiple_img_upload2'=>$multiple_img_upload2,
			 'other_policies_name'=>$other_policies_name,
			 'page6_validation_error'=>$page6_validation_error,
		     	 
		); 
				
		//if($id==0){
			//$return_val = $this->db->insert('ngo',$data_page6);
		//}//else{
			$return_val = $this->db->update('ngo',$data_page6,array('id' => $ngo_id));
		//}
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    
	}
	
	public function get_all_citys() {
        $this->load->model('Comman_model', 'obj_comman', TRUE);
		$admin_city = $this->obj_comman->get('admin_city');
		$city_data = array();
		$city_id = array();
		
		$segment = $_POST['id'];
		$entity_data = $this->obj_comman->get_by('ngo',array('id'=>$segment),false,true);
		
		if ($entity_data) {
			$city_id = json_decode($entity_data['city_id']);
			$city = json_decode($entity_data['city']);
			//var_dump($city);
			if($city){
				foreach($city as $key => $value2){
					if($city_id[$key] == '0' || $city_id[$key] >= '144000' ){
						$key1 = rand(144000,150000);
						$arrayName2 = array(
							'id' => $key1.'',
							'text' => $value2,
						);
						array_push($city_data,$arrayName2);
						$city_id[$key] = $key1.'';
					}
				}
			}else{ }
		}
		if ($admin_city) {
			foreach($admin_city as $value){
				$arrayName = array(
					'id' => $value['id'],
					'text' => $value['name'],
				);
				array_push($city_data,$arrayName);
			}
		}	
		
		if ($admin_city) {	
			$arr_response['status'] = 200;
			$arr_response['admin_city'] = $city_data;
			$arr_response['city_selected'] = $city_id;
			$arr_response['message'] = 'Successfully submitted';
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    
	}
	









	

	
	
	
}
