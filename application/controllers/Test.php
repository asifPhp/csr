<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	
	public function delete_table(){
		
		$this->db->truncate('ngo_notification');
		$this->db->truncate('ngo_district');
		$this->db->truncate('ngo');
		$this->db->truncate('proposal');
		$this->db->truncate('org_tasks');
		$this->db->truncate('project');
		$this->db->truncate('gc_ticket');
		$this->db->truncate('org_assigner_mgmt');
		$this->db->truncate('project_donors');
		$this->db->truncate('project_cycle_details');
		$this->db->truncate('project_cycle_donor_details');
		$this->db->truncate('project_document');
				
		 redirect(base_url());	

	}
	
}
