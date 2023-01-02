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
        if (!($this->session->userdata('loggedIN') == 2)) {
            redirect(base_url().'admin/admin');
        }		
    }
	
	/**
	 * admin List of plans for this controller.
	*/
	public function list(){
		$this->load->model('page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '4', 
			'submodule_id' => '4', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$sql="select n.*,st.ngo_staff_id,st.first_name,st.last_name,st.staff_email from ngo n JOIN ngo_staff_account as st on st.ngo_id=n.ngo_id where st.parent_id=0 AND n.is_deleted=0";

		$data['table_name'] = 'ngo';
		$data['sql_query'] = $sql;
		$data['heading'] = 'NGO List';
	    $data['table_header_column'] = array('Name','Email','Owner First Name','Owner Email');
	    $data['table_body_column'] = array('ngo_name','ngo_email','first_name','staff_email');
	    $data['primary_column_name'] = 'ngo_id';
	    if($return_val['is_edit']){
	    	$data['edit_url'] = base_url().'admin/configure';
		}
	    if($return_val['is_add']){
	    	$data['add_url'] = base_url().'admin/configure';
		}
		if($return_val['is_remove']){
	    	$data['is_remove'] = true;
		}
		$data['table_body_column_count'] = sizeof($data['table_body_column']);;
		$data['table_type'] = 'dataTables'; /* //dataTables //dataTables-example */
	    
		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		
		if($return_val){
			$this->load->view('admin/pages/ngo/ngo_list',$data);
		}else{
			$this->load->view('error_msg');
		}
		$this->load->view('admin/components/footer');
		
	}

	public function update_status() {
		$this->load->model('Comman_model', 'obj_comman', TRUE);
        //array to store ajax responses
        $arr_response = array('status' => 500);

        $data = array('ngo_status' => $_POST['value'] );
        $return_val = $this->obj_comman->update_data($_POST['table_name'],$data,array($_POST['primary_column_name']=>$_POST['id'])); 

        $data = array('staff_status' => $_POST['value'] );
        $return_val = $this->obj_comman->update_data('ngo_staff_account',$data,array('ngo_staff_id'=>$_POST['staff_id'])); 
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Updated successfully';	
	    } else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }

    public function remove() {
		$this->load->model('Comman_model', 'obj_comman', TRUE);
        //array to store ajax responses
        $arr_response = array('status' => 500);

        $data = array('is_deleted' => '1' );
        $return_val = $this->obj_comman->update_data($_POST['table_name'],$data,array($_POST['primary_column_name']=>$_POST['id'])); 


        $return_val = $this->obj_comman->update_data('ngo_staff_account',$data,array('ngo_staff_id'=>$_POST['staff_id'])); 
		
		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Removed successfully';	
	    } else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }
}
