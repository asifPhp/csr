<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configure extends CI_Controller {

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
	 * Admin dasbhoard page.
	 */
	public function index()	{
		$this->load->model('Page_validation_model_organisation', 'obj_pvm', TRUE);
		
		$staff_id = $this->session->userdata('staff_id');
		$arrayName = array(
			'module_id' => '0', 
			'submodule_id' => '0', 
			'staff_id' => $staff_id, 
			'page' => '', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($staff_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		$this->load->view('organisation/components/header');
		$this->load->view('organisation/components/menu',$data);
		$this->load->view('organisation/pages/dashboard');
		$this->load->view('organisation/components/footer');
	}
}
