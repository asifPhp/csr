<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

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
	
	public function add_form() {
		$arr_response = array('status' => 500);
		$this->load->model('Comman_model', 'obj_comman', TRUE);
		$where = array($_POST['primary_column_name'] => $_POST['id']);
		if($_POST['id'] == 0){
		  	$return_val = $this->obj_comman->insert_data($_POST['table_name'],$_POST['table_field'][0]); 
			$arr_response['message'] = 'Successfully added';
		}else{
			$return_val = $this->obj_comman->update_data($_POST['table_name'],$_POST['table_field'][0],$where); 
			$arr_response['message'] = 'Successfully updated';
	    }
	 
		if ($return_val) {
			$arr_response['status'] = 200;
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went wrong! Please try again';
		}
		echo json_encode($arr_response);
	}

	public function remove() {
		$this->load->model('Comman_model', 'obj_comman', TRUE);
        //array to store ajax responses
        $arr_response = array('status' => 500);
         
		$data = array('is_deleted' => '1' );
        $return_val = $this->obj_comman->update_data($_POST['table_name'],$data,array($_POST['primary_column_name']=>$_POST['id'])); 

		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Removed successfully';	
	    } else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }

    public function delete() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
         
		$return_val = $this->db->delete($_POST['table_name'],array($_POST['primary_column_name']=>$_POST['id']));
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
