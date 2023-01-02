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
        if (!($this->session->userdata('loggedIN') == 3)) {
            redirect(base_url().'organisation/login');
        }		
    }
	/**
	 * admin Add plan for this controller.
	*/
	public function ngo_send_notification() {
        
		$this->load->model('Comman_model','obj_comman', TRUE);

		
		$data = array(
			'superngo_id' => $_POST['superngo_id'],
			'ngo_id' => $_POST['ngo_id'],
			'org_id' => $_POST['org_id'],
			'proposal_id' => $_POST['prop_id'],
			'project_id' => $_POST['project_id'],
			'cycle_id' => $_POST['cycle_id'],
			'status'=>$_POST['status'],
			'url'=>$_POST['url'],
			'description'=>$_POST['description'],
			'created_date'=> date('Y-m-d'),
			'created_time'=> date('H:i:s'),
		);
		
		$return_val = $this->obj_comman->insert_data('ngo_notification',$data);
			
		

		if ($return_val) {
			$arr_response['status'] = 200;
			$arr_response['message'] = 'Data saved successfully';			
		} else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }

	/**
	 * admin List of plans for this controller.
	*/
}
