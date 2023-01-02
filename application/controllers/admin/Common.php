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
        if (!($this->session->userdata('loggedIN') == 2)) {
            redirect(base_url().'admin/admin');
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
		//$return_val = $this->db->update($_POST['table_name'],array($_POST['status_column_name']=>'Remove'),array($_POST['primary_column_name']=>$_POST['id']));
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
	
    public function croppie_image_upload() {
        //array to store ajax responses
        $arr_response = array('status' => 500);
         
		$data = $_POST["image"];
		$image_name=$data;
		if(strpos($data, ';') !== false){
			$image_array_1 = explode(";", $data);	
			$image_name=$image_array_1[1];
		}

		if(strpos($image_name, ',') !== false){

			$image_array_2 = explode(",", $image_name);
			$image_name=$image_array_2[1];
		}

		if ($image_name) {
			$data = base64_decode($image_name);

			$imageName = time() . '.png';
			$image_url = APPPATH.'../uploads/'.$imageName;

			file_put_contents($image_url, $data);

			$arr_response['status'] = 200;
			$arr_response['imageName'] =  $imageName;
			$arr_response['message'] = ' successfully';	
	    } else {
			$arr_response['status'] = 201;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
    }
	
	public function upload_file() {
        #array to hold the response values to be displayed
        $arr_response = array();
       
        $info = pathinfo($_FILES['myFile']['name']);
        $upload_file=$_FILES['myFile']['name'];
        $ext = $info['extension']; // get the extension of the file
        if (($ext == "pdf" || $ext == "doc"|| $ext == "docx" || $ext == "GIF" || $ext == "PNG" || $ext == "JPG" || $ext == "jpg" || $ext == 'gif' || $ext == 'png' || $ext == 'jpeg') && ($_FILES["myFile"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES["myFile"]["type"] == "application/pdf" || $_FILES["myFile"]["type"] == "application/doc" || $_FILES["myFile"]["type"] == "application/docx" || $_FILES["myFile"]["type"] == "image/PNG" || $_FILES["myFile"]["type"] == "image/GIF" || $_FILES["myFile"]["type"] == "image/JPG" || $_FILES["myFile"]["type"] == "image/jpg" ||$_FILES["myFile"]["type"] == "image/jpeg" || $_FILES["myFile"]["type"] == 'image/gif' || $_FILES["myFile"]["type"] == 'image/png') &&
                    ($_FILES['myFile']["size"] < 120485760)) {
            $file = $info['filename'];
            $filename = $_POST['image_cat'] . '_' . uniqid() . '.' . $ext;
            if(isset($_POST['sub_folder_name']) && $_POST['sub_folder_name']!=''){
                $target = './uploads/'.$_POST['sub_folder_name'].'/' . $filename;
            }else{
                $target = './uploads/' . $filename;
            }
           
            $file = $_FILES['myFile']['tmp_name'];
            move_uploaded_file($file, $target);

            $arr_response['status'] = 200;
            $arr_response['filename'] = $filename;
            $arr_response['upload_file'] = $upload_file;
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File";
        }
        echo json_encode($arr_response);
    }
}
