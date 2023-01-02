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
        if (!($this->session->userdata('loggedIN') == 2)) {
            redirect(base_url().'admin/admin');
        }		
    }
	
	/**
	 * Admin dasbhoard page.
	 */
	public function index()	{
		$this->load->model('Page_validation_model', 'obj_pvm', TRUE);
		
		$user_id = $this->session->userdata('userID');
		$arrayName = array(
			'module_id' => '2', 
			'submodule_id' => '2', 
			'user_id' => $user_id, 
			'page' => 'list', 
		);
		$data['access_data'] =$this->obj_pvm->get_user_access_data_for_menu($user_id);
		$return_val =$this->obj_pvm->is_permitted($arrayName);
		$data['is_permitted']=$return_val;

		
		$this->load->view('admin/components/header');
		$this->load->view('admin/components/menu',$data);
		$this->load->view('admin/pages/dashboard');
		$this->load->view('admin/components/footer');
	}
}
