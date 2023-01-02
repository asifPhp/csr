<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	/**
     * Default constructor.
     * 
     * @access	public
     * @since	1.0.0
     */
    function __construct() {
        parent::__construct();
        if (!($this->session->userdata('loggedIN') == 2)) {
            redirect(base_url().'admin/admin');
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
		$this->load->model('page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '1', 
			'submodule_id' => '1', 
			'user_id' => $user_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$data['profile_data'] = $this->obj_comman->get_by('web_admin_login',array('user_id'=>$segment),false,true);
		$data['role_data'] = $this->obj_comman->get_by('admin_roles',false);
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
	    if($return_val){
			$this->load->view('admin/pages/staff/add_staff',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('admin/components/footer');
	}
	
	public function update_user_password() {
        //array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);
		
        #load required model
		$user_id  =$_POST['user_id'];
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$array_data = array(
			'passwd' => sha1('admin' . (md5('admin' . $_POST['password']))),
		);
		$return_val = $this->obj_comman->update_data('web_admin_login',$array_data,array('user_id'=> $user_id ));
		if ($return_val) {
			$arr_response['status'] = SUCCESS;
			$arr_response['message'] = 'Member Password has been updated successfully';
		} else {
			$arr_response['status'] = DB_ERROR;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
    }

	/**
	 * admin Add plan for this controller.
	*/
	public function update_user_profile() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model','obj_comman', TRUE);
		
		$user_id=$_POST['user_id'];
		
		$data=$_POST['table_field'];
		$is_repeat='';
		$staff_data = $this->obj_comman->get_by('web_admin_login',array('user_email'=> $data['user_email']),false,true);

		if($user_id == 0){
			if($staff_data){
				$is_repeat='1';
			}else{
				$return_val = $this->obj_comman->insert_data('web_admin_login',$data);
				$message = 'Successfully added';

				$this->set_access_by_role($data['user_role_id'],$return_val);
			}
		} else{
			$return_val = $this->obj_comman->update_data('web_admin_login',$data,array('user_id' => $_POST['user_id']));
			$message = 'Successfully updated';	
			$this->set_access_by_role($data['user_role_id'],$user_id);		
	    }
	    

		if ($is_repeat) {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Email already exist';
		}else if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }

    public function set_access_by_role($role_id,$user_id) {
    	$role_access_data = $this->obj_comman->get_by('admin_roles_access',array('role_id'=>$role_id));
	    if($role_access_data){
	    	$return_val=$this->db->delete('admin_emp_access',array('emp_id' =>$user_id));
	    	foreach ($role_access_data as $key => $value) {
	    		$value['emp_id']=$user_id;
	    		unset($value['index_id']);
	    		unset($value['role_id']);
	    		//var_dump($value);
	    		$value['date'] = date('Y-m-d');
				$value['time'] = date('H:i:s');
				$return_val = $this->obj_comman->insert_data('admin_emp_access',$value);
	    	}
	    }
    }

	/**
	 * admin List of plans for this controller.
	*/
	public function staff_list(){
		$this->load->model('page_validation_model', 'obj_pvm', TRUE);
		$page='list';
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '1', 
			'submodule_id' => '1', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$sql="select * from web_admin_login WHERE `is_deleted` = 0;";

		$data['table_name'] = 'web_admin_login';
		$data['sql_query'] = $sql;
		$data['heading'] = 'Staff List';
	    $data['table_header_column'] = array('Role','Name','Email','Phone no');
	    $data['table_body_column'] = array('user_role','user_name','user_email','phone_no');
	    $data['primary_column_name'] = 'user_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'admin/staff/index';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'admin/staff/index';
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		
		if($return_val){
			$this->load->view('admin/pages/staff/staff_list',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('admin/components/footer');
		
	}
	
	public function get_emp_accessibility_detail() {
		//array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);
		
        #load required model
		$emp_id  =$_POST['emp_id'];
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$data =$this->obj_comman->get_by('admin_emp_access',array('emp_id'=>$emp_id));
		if ($data) {
			$arr_response['status'] = SUCCESS;
			$arr_response['data'] = $data;
			$arr_response['message'] = 'successfully';
		} else {
			$arr_response['status'] = DB_ERROR;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}

	/**
	 * admin accessibility update for this controller.
	*/
	public function update_accessibility() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal

		$this->load->model('Comman_model', 'obj_comman', TRUE);

		$user_id = $this->session->userdata('userID');
		$where = array('emp_id' => $_POST['emp_id']);
		
		$data=$_POST['access_define'];

		if($data){
			$return_val=$this->db->delete('admin_emp_access',$where);
			foreach ($data as $key => $value) {
				//$data['added_by'] = $user_id;
				$value['date'] = date('Y-m-d');
				$value['time'] = date('H:i:s');
				$return_val = $this->obj_comman->insert_data('admin_emp_access',$value);
			}
		}

		$message = 'Accessiblity has been updated successfully!';
		
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
