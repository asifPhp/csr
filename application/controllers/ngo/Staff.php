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
			'module_id' => '1', 
			'submodule_id' => '1', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$superngo_id = $this->session->userdata('superngo_id');
		$data['staff_data'] = $this->obj_comman->get_by('ngo_staff_account',array('ngo_staff_id'=> $segment),false,true);
		
		$data['role_data'] = $this->obj_comman->get_by('ngo_roles',array('superngo_id'=>$superngo_id));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('superngo_id'=>$superngo_id));
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/staff/add_staff',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	public function staff_edit()	{
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
			'module_id' => '1', 
			'submodule_id' => '1', 
			'staff_id' => $staff_id, 
			'page' => $page, 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;
		
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$superngo_id = $this->session->userdata('superngo_id');
		$data['staff_data'] = $this->obj_comman->get_by('ngo_staff_account',array('ngo_staff_id'=> $segment),false,true);
		
		$data['role_data'] = $this->obj_comman->get_by('ngo_roles',array('superngo_id'=>$superngo_id));
		$data['ngo_data'] = $this->obj_comman->get_by('ngo',array('superngo_id'=>$superngo_id));
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
	    if($return_val){
			$this->load->view('ngo/pages/staff/view_staff',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}
	
	public function update_staff_password() {
        //array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);
		
        #load required model
		$ngo_staff_id  =$_POST['id'];
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$staff_password = sha1('ngo' . (md5('ngo' . $_POST['password'])));
	
		$array_data = array(
			'staff_password' => $staff_password,
		);
		$return_val = $this->obj_comman->update_data('ngo_staff_account',$array_data,array('ngo_staff_id'=> $ngo_staff_id ));
       
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
	public function update_staff() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
		//Load Required modal
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$superngo_id = $this->session->userdata('superngo_id');
		$parent_id = $this->session->userdata('ngo_staff_id');
		$where = array('ngo_staff_id' => $_POST['ngo_staff_id']);
		$data=$_POST['table_field'];
		$is_repeat='';
		$staff_data = $this->obj_comman->get_by('ngo_staff_account',array('staff_email'=> $data['staff_email']),false,true);
		if($_POST['ngo_staff_id'] == 0){
			
			/*if($staff_data){
				$is_repeat='1';
			}else{*/
				$randam_no = rand(1111,999999);
				$staff_password = sha1('ngo' . (md5('ngo' . $randam_no)));
			  	$data['staff_password'] = $staff_password;
			  	$data['superngo_id'] = $superngo_id;
			  	$data['parent_id'] = $parent_id;
			  	$data['staff_profile_image'] = 'default_profile.jpg';
				$data['created_time'] = date('Y-m-d H:i:s');

			  	$return_val = $this->obj_comman->insert_data('ngo_staff_account',$data); 
			  	$ngo_staff_id = $return_val;
			  	
				$message = 'Successfully added';
				$this->set_access_by_role($data['staff_role_id'],$return_val);
				$arrayName = array(
					'superngo_name' => $this->session->userdata('superngo_name'),
					'password' => $randam_no,
					'name' => $data['first_name'].' '.$data['last_name'],
					'email' => $data['staff_email'],
				);
				$this->send_email_notification_mail($arrayName);
			//}
		}else{
			$return_val = $this->obj_comman->update_data('ngo_staff_account',$data,$where); 
			$ngo_staff_id =  $_POST['ngo_staff_id'];
			$message = 'Successfully updated';
			//$this->set_access_by_role($data['staff_role_id'],$_POST['ngo_staff_id']);
	    }

	    
		/*if ($is_repeat) {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Email already exist';
		}else*/ if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;
			$arr_response['ngo_staff_id']=$ngo_staff_id;			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
		
        echo json_encode($arr_response);
    }

    public function send_email_notification_mail($data) {
    	/* main message set pending*/
    	$message ='';
		$message .= 'Dear '.$data['name'].' <br><br>';
		$message .= '<p>You are registered as member of '.$data['superngo_name'].' organisation. <br>Hear are your login details : <br><br> Email Id :-'.$data['email'].' <br>Password :- '.$data['password'].' </p>';
		$message .= '<p>Please Click below to login</p>'; 
		$message .= '<a href="'.base_url().'ngo/login">Click Here</a>'; 

       	$this->load->model('Email_model', 'obj_email', TRUE);
        $array = array(
        	'subject' => 'Registration Email',
        	'msg' => $message,
        	'to' => $data['email'],//'sharma.ambika98765@gmail.com',
        	'to_name' => $data['name'],
        );
		
        //$this->obj_email->send_mail_in_ci($data);
        $this->obj_email->send_mail_in_sendinblue($array);

    }

    public function set_access_by_role($role_id,$staff_id) {
    	$this->load->model('Comman_model', 'obj_comman', TRUE);
    	$role_access_data = $this->obj_comman->get_by('ngo_roles_access',array('role_id'=>$role_id));
	    if($role_access_data){
	    	$return_val=$this->db->delete('ngo_staff_access',array('staff_id' =>$staff_id));
	    	foreach ($role_access_data as $key => $value) {
	    		$value['staff_id']=$staff_id;
	    		unset($value['index_id']);
	    		unset($value['role_id']);
	    		//var_dump($value);
	    		$value['date'] = date('Y-m-d');
				$value['time'] = date('H:i:s');
				$return_val = $this->obj_comman->insert_data('ngo_staff_access',$value);
	    	}
	    }
    }

	/**
	 * admin List of plans for this controller.
	*/
	public function staff_list(){
		$this->load->model('Page_validation_model_ngo', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('ngo_staff_id');
		$arrayName = array(
			'module_id' => '1', 
			'submodule_id' => '1', 
			'staff_id' => $staff_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		//var_dump($return_val);
		$data['is_permitted']=$return_val;

		$data['acces_module_list'] = $this->obj_pvm->get_module_sub_module_list_data();

		$superngo_id=$this->session->userdata('superngo_id');
		$sql="select * from ngo_staff_account where superngo_id=$superngo_id and `is_deleted`=0";

		$data['table_name'] = 'ngo_staff_account';
		$data['sql_query'] = $sql;
		$data['heading'] = 'User List';
	    $data['table_header_column'] = array('Name','Email','user Type','Join Date','Last Login');
	    $data['table_body_column'] = array('first_name','staff_email','staff_role','created_time','last_login');
	    $data['primary_column_name'] = 'ngo_staff_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'ngo/staff/staff_edit';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'ngo/staff/index';
		}	
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		if($return_val['is_other1']){
	    	$data['is_other1'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		
		$this->load->view('ngo/components/header');
		$this->load->view('ngo/components/menu',$data);
		
		if($return_val){
			$this->load->view('ngo/pages/staff/staff_list',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('ngo/components/footer');
	}

	public function get_emp_accessibility_detail() {
		//array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);
		
        #load required model
		$staff_id  =$_POST['staff_id'];
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		
		$data =$this->obj_comman->get_by('ngo_staff_access',array('staff_id'=>$staff_id));
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

		$superngo_id = $this->session->userdata('superngo_id');
		$where = array('staff_id' => $_POST['staff_id']);
		
		$data=$_POST['access_define'];

		if($data){
			$return_val=$this->db->delete('ngo_staff_access',$where);
			foreach ($data as $key => $value) {
				$value['superngo_id'] = $superngo_id;
				$value['date'] = date('Y-m-d');
				$value['time'] = date('H:i:s');
				$return_val = $this->obj_comman->insert_data('ngo_staff_access',$value);
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
	
	
	public function get_tour(){    
		//$superngo_id = $this->session->userdata('superngo_id');   
		$ngo_staff_id=$this->session->userdata('ngo_staff_id');  
		
		$sql="select login_tour from ngo_staff_account where ngo_staff_id = $ngo_staff_id and `is_deleted`=0";
		$tourdata = $this->db->query($sql)->result_array();
		$tourdata_value=$tourdata[0]['login_tour'];
		$arr_response['status'] = 200;
		$arr_response['tourdata_value'] = $tourdata_value;			
		
        echo json_encode($arr_response);
	}
	public function end_tour(){    
		$ngo_staff_id=$this->session->userdata('ngo_staff_id');  
		$array_data = array(
			'login_tour' => 'no',
		);
		$return_val = $this->db->update('ngo_staff_account',$array_data,array('ngo_staff_id'=> $ngo_staff_id ));
		$message = 'End Tour data';
		if($return_val){
			$arr_response['status'] = 200;
			$arr_response['message'] = $message;
				
		}
        echo json_encode($arr_response);
	}
	
	public function get_ngo_list(){    
		$superngo_id = $this->session->userdata('superngo_id');   
		$sql="select * from ngo where superngo_id = $superngo_id and `is_deleted`=0";
		$listdata = $this->db->query($sql)->result_array();
		
		$data_value = array();
		foreach ($listdata as $row) {
			$data = array(
				'id' => $row['id'],
				'title' => $row['legal_name']
			);
			array_push($data_value, $data);
		}
		$arr_response['status'] = 200;
		$arr_response['listdata'] = $data_value;			
		
        echo json_encode($arr_response);
	}
	public function get_organisation_list(){    
		$superngo_id = $this->session->userdata('superngo_id');   
		$sql="SELECT * FROM proposal where superngo_id = $superngo_id and `is_deleted`=0 GROUP BY `organisation_id`; ";
		$listdata = $this->db->query($sql)->result_array();
		
		$data_value = array();
		foreach ($listdata as $row) {
			$sql2="SELECT * FROM organisation where org_id = ".$row['organisation_id']." ; ";
			$listdata2 = $this->db->query($sql2)->result_array();
		
			foreach ($listdata2 as $row2) {
				$data = array(
					'id' => $row['organisation_id'],
					'title' => $row2['org_name']
				);
				array_push($data_value, $data);
			}
			
		}
		$arr_response['status'] = 200;
		$arr_response['listdata'] = $data_value;			
		
        echo json_encode($arr_response);
	}
}
