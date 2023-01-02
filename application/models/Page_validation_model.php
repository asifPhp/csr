<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Page_validation_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
        $this->load->helper('string');
		//date_default_timezone_set('Asia/Kolkata');
    }
	
	
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to update_submenu 
     * 
     * @access		public
     * @since		1.0.0
     */
    /*public function is_permitted($user_id=0,$page='') {

		$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if($_SERVER['HTTP_HOST'] == 'localhost'){
			$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		}else{
			$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		}
		$current_path = explode(base_url(),$current_url)[1];
		//var_dump($current_path);
		$current_path = explode('?',$current_path)[0];
		//var_dump($current_path);
		$user_access = $this->get_user_access_data($user_id);
		 if (strpos($current_path,$value['list_link']) !== false) {
			$status=1;
			$data = $this->user_access_array($value);
		}
		*/
	//-------------------------------------------------------------------------
    /*
     * This function is used to get user access data 
     * 
     * @access		public
     * @since		1.0.0
     */
	public function is_permitted($access) {	
		$status = 0;
		$data = 0;
		$page=$access['page'];
		$user_access = $this->get_user_access_data($access);
		if($user_access){
			foreach($user_access as $value){
				if($page=='list'){
					$status=1;
					$data = $this->user_access_array($value);
		        }else if($page=='edit'){
	            	if($value['edit_access'] == 'yes'){
						$status=1;
						$data=$this->user_access_array($value);
					}
		        }else if($page=='add'){
	            	if($value['add_access'] == 'yes'){
						$status=1;
						$data=$this->user_access_array($value);
					}
		        }else if($page=='other1'){
	            	if($value['other_access_1'] == 'yes'){
						$status=1;
						$data=$this->user_access_array($value);
					}
		        }else if($page=='other2'){
	            	if($value['other_access_2'] == 'yes'){
						$status=1;
						$data=$this->user_access_array($value);
					}
		        }else if($page=='other3'){
	            	if($value['other_access_3'] == 'yes'){
						$status=1;
						$data=$this->user_access_array($value);
					}
		        }
			}
			if($status==1){
				//var_dump($data);
				$status = 0;
				return $data;
			}else{
				return false;
			}
		}else{
			return false;
		}
		
	}

	//-------------------------------------------------------------------------
    /*
     * This function is used to get array the user access Data
     * 
     * @access		public
     * @since		1.0.0
     */
	public function user_access_array($value) {
		$is_list = false;
		if($value['list_access'] == 'yes'){
			$is_list = true;
		}
		$is_add = false;
		if($value['add_access'] == 'yes'){
			$is_add = true;
		}
		$is_edit = false;
		if($value['edit_access'] == 'yes'){
			$is_edit = true;
		}
		$is_remove = false;
		if($value['remove_access'] == 'yes'){
			$is_remove = true;
		}
		$is_other1 = false;
		if($value['other_access_1'] == 'yes'){
			$is_other1 = true;
		}
		$is_other2 = false;
		if($value['other_access_2'] == 'yes'){
			$is_other2 = true;
		}
		$is_other3 = false;
		if($value['other_access_3'] == 'yes'){
			$is_other3 = true;
		}
		$data = array(
			'is_list' => $is_list, 
			'is_add' => $is_add, 
			'is_edit' => $is_edit, 
			'is_remove' => $is_remove, 
			'is_other1' => $is_other1, 
			'is_other2' => $is_other2, 
			'is_other3' => $is_other3, 
		);
		return $data;
	}

	//-------------------------------------------------------------------------
    /*
     * This function is used to get the user access of current user
     * 
     * @access		public
     * @since		1.0.0
     */
	public function get_user_access_data($data) {
		$this->db->where('emp_id',$data['user_id']);
		$this->db->where('submodule_id',$data['submodule_id']);
		$this->db->where('module_id',$data['module_id']);
		return $this->db->get('admin_emp_access')->result_array();
	}
	/*public function get_user_access_data($user_id) {
		
		$this->db->join('admin_submodule', 'admin_submodule.submodule_id = admin_emp_access.submodule_id');
		$this->db->where('emp_id',$user_id);
		return $this->db->get('admin_emp_access')->result_array();
	}*/

	//-------------------------------------------------------------------------
    /*
     * This function is used to get the user access of current user
     * 
     * @access		public
     * @since		1.0.0
     */
    public function get_user_access_data_for_menu($user_id) {
		$menu_data = array();
		$module_data = $this->db->get('admin_module')->result();
		if ($module_data) {
			$data_value = array();
			foreach ($module_data as $row) {
				
				$this->db->where('module_id',$row->module_id);
				$this->db->where('emp_id',$user_id);
				$db_result = $this->db->get('admin_emp_access')->result_array();
				if ($db_result) {
					$data_value1 = array();
					
					$this->db->where('FK_module_id',$row->module_id);
					$db_result1 = $this->db->get('admin_submodule')->result();
					if ($db_result1) {
						
						foreach ($db_result1 as $row1) {
							$is_add = false;
							$is_list = false;
							foreach ($db_result as $acce) {
								//var_dump($acce);
								if($acce['module_id'] == $row->module_id && $acce['submodule_id'] == $row1->submodule_id && $acce['add_access'] == 'yes'){
									$is_add = true;
								}
								if($acce['module_id'] == $row->module_id && $acce['submodule_id'] == $row1->submodule_id && $acce['list_access'] == 'yes'){
									$is_list = true;
								}
							}
							$data1 = array();
							if (!array_key_exists($row1->submodule_id, $data1)) {
								$data1[$row1->submodule_id] = array();
							}
							if (array_key_exists($row1->submodule_id, $data1)) {
								$data1[$row1->submodule_id] = array(
									'submodule_id' => $row1->submodule_id,
									'module_id' => $row1->FK_module_id,
									'module_name' => $row->module_name,
									'submodule_name' => $row1->submodule_name,
									'link' => $row1->link,
									'list_link' => $row1->list_link,
									'is_add' => $is_add,
									'is_list' => $is_list,
								);
								array_push($data_value1, $data1[$row1->submodule_id]);
							}
						}
					}	
					
					$data = array();
					if (!array_key_exists($row->module_id, $data)) {
						$data[$row->module_id] = array();
					}
					if (array_key_exists($row->module_id, $data)) {
						$data[$row->module_id] = array(
							'module_id' => $row->module_id,
							'module_name' => $row->module_name,
							'submodule' => $data_value1,
						);
						array_push($data_value, $data[$row->module_id]);
					}
				}
				
			}
			return $data_value;
		}
    }

    //-------------------------------------------------------------------------
    /*
     * This function is used to get the user access of current user
     * 
     * @access		public
     * @since		1.0.0
     */
    public function get_module_sub_module_list_data() {
		$menu_data = array();
		$this->db->where('status','active');
		$module_data = $this->db->get('admin_module')->result();
		if ($module_data) {
			$data_value = array();
			foreach ($module_data as $row) {
					
				$this->db->where('FK_module_id',$row->module_id);
				$db_result1 = $this->db->get('admin_submodule')->result_array();
				if ($db_result1) {
					$data_value1 = array();
					foreach ($db_result1 as $row1) {
						$data1 = array();
						array_push($data_value1, $row1);
						/*if (!array_key_exists($row1->submodule_id, $data1)) {
							$data1[$row1->submodule_id] = array();
						}
						if (array_key_exists($row1->submodule_id, $data1)) {
							$data1[$row1->submodule_id] = array(
								'submodule_id' => $row1->submodule_id,
								'module_id' => $row1->FK_module_id,
								'module_name' => $row->module_name,
								'submodule_name' => $row1->submodule_name,
								'link' => $row1->link,
								'list_link' => $row1->list_link,
							);
							
							array_push($data_value1, $data1[$row1->submodule_id]);
						}*/
					}
				}	
					
				$data = array();
				if (!array_key_exists($row->module_id, $data)) {
					$data[$row->module_id] = array();
				}
				if (array_key_exists($row->module_id, $data)) {
					$data[$row->module_id] = array(
						'module_id' => $row->module_id,
						'module_name' => $row->module_name,
						'submodule' => $data_value1,
					);
					array_push($data_value, $data[$row->module_id]);
				}
				//var_dump($data_value);
				
			}
			return $data_value;
		}
    }
	
}
