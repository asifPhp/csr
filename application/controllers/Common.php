<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	/**
	 * 
	 
	 */
	public function upload_image() {
        #array to hold the response values to be displayed
        $arr_response = array();

        $info = pathinfo($_FILES['myFile']['name']);
        $ext = $info['extension']; // get the extension of the file

        if (($ext == "GIF" || $ext == "PNG" || $ext == "JPG" || $ext == "jpg" || $ext == 'gif' || $ext == 'png' || $ext == 'jpeg') && ($_FILES["myFile"]["type"] == "image/PNG" || $_FILES["myFile"]["type"] == "image/GIF" || $_FILES["myFile"]["type"] == "image/JPG" || $_FILES["myFile"]["type"] == "image/jpg" ||$_FILES["myFile"]["type"] == "image/jpeg" || $_FILES["myFile"]["type"] == 'image/gif' || $_FILES["myFile"]["type"] == 'image/png') &&
                ($_FILES["myFile"]["size"] < 20485760)) {
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
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File";
        }
        echo json_encode($arr_response);
    }

    public function upload_file() {
        #array to hold the response values to be displayed
        $arr_response = array();
        
        $info = pathinfo($_FILES['myFile']['name']);
        $upload_file=$_FILES['myFile']['name'];
		$file_size=$_FILES['myFile']["size"];
		//var_dump($file_size);
        $ext = $info['extension']; // get the extension of the file
        if (($ext == "pdf" || $ext == "doc"|| $ext == "docx" || $ext == "GIF" || $ext == "PNG" || $ext == "JPG" || $ext == "jpg" || $ext == 'gif' || $ext == 'png' || $ext == 'jpeg') && ($_FILES["myFile"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES["myFile"]["type"] == "application/pdf" || $_FILES["myFile"]["type"] == "application/doc" || $_FILES["myFile"]["type"] == "application/docx" || $_FILES["myFile"]["type"] == "image/PNG" || $_FILES["myFile"]["type"] == "image/GIF" || $_FILES["myFile"]["type"] == "image/JPG" || $_FILES["myFile"]["type"] == "image/jpg" ||$_FILES["myFile"]["type"] == "image/jpeg" || $_FILES["myFile"]["type"] == 'image/gif' || $_FILES["myFile"]["type"] == 'image/png') &&
                    ($_FILES['myFile']["size"] < 120485760)) {
            $file = $info['filename'];
			//var_dump($filesize);
            $filename = $_POST['image_cat'] . '_' . uniqid() . '.' . $ext;
            if(isset($_POST['sub_folder_name']) && $_POST['sub_folder_name']!=''){
                $target = './uploads/'.$_POST['sub_folder_name'].'/' . $filename;
            }else{
                $target = './uploads/' . $filename;
            }
			//$filesize=getimagesize($file);
            //var_dump($filesize);
            $file = $_FILES['myFile']['tmp_name'];
            move_uploaded_file($file, $target);
			
            $arr_response['status'] = 200;
            $arr_response['filename'] = $filename;
            $arr_response['upload_file'] = $upload_file;
            $arr_response['file_size'] = $file_size;
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File";
        }
        echo json_encode($arr_response);
    }
	
	public function upload_file_xl() {
        #array to hold the response values to be displayed
        $arr_response = array();
        
        $info = pathinfo($_FILES['myFile']['name']);
        $upload_file=$_FILES['myFile']['name'];
		$file_size=$_FILES['myFile']["size"];
		//var_dump($file_size);
        $ext = $info['extension']; // get the extension of the file
		if (($ext == "pdf" || $ext == "doc"|| $ext == "docx" || $ext == "docm" || $ext == "xlsx" || $ext == "cs" || $ext == "csv" || $ext == "xlsm" || $ext == "xlsb" || $ext == 'xltx' || $ext == 'xltm' || $ext == 'xls' || $ext == 'xlt' || $ext == 'xls' || $ext == 'xml' || $ext == 'xlam' || $ext == 'xla' || $ext == 'xlw' || $ext == 'xlr') && ($_FILES["myFile"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES["myFile"]["type"] == "application/pdf" || $_FILES["myFile"]["type"] == "application/doc" || $_FILES["myFile"]["type"] == "application/docx" || $_FILES["myFile"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") &&
                    ($_FILES['myFile']["size"] < 120485760)) {
            $file = $info['filename'];
			//var_dump($filesize);
            $filename = $_POST['image_cat'] . '_' . uniqid() . '.' . $ext;
            if(isset($_POST['sub_folder_name']) && $_POST['sub_folder_name']!=''){
                $target = './uploads/'.$_POST['sub_folder_name'].'/' . $filename;
            }else{
                $target = './uploads/' . $filename;
            }
			//$filesize=getimagesize($file);
            //var_dump($filesize);
            $file = $_FILES['myFile']['tmp_name'];
            move_uploaded_file($file, $target);
			
            $arr_response['status'] = 200;
            $arr_response['filename'] = $filename;
            $arr_response['upload_file'] = $upload_file;
            $arr_response['file_size'] = $file_size;
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File";
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
			$data = array(
				'staff_profile_image' => $imageName
			);
			$result = $this->db->update('ngo_staff_account', $data, array('ngo_staff_id ' => $_POST['ngo_staff_id']));
            $arr_response['status'] = 200;
            $arr_response['imageName'] =  $imageName;
            $arr_response['message'] = ' successfully'; 
        } else {
            $arr_response['status'] = 201;
            $arr_response['message'] = 'Something went Wrong! Please try again';
        }
        echo json_encode($arr_response);
    }
	
	public function croppie_image_upload_edit_donoor() {
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
			$data = array(
				'staff_profile_image' => $imageName
			);
			//$result = $this->db->update('ngo_staff_account', $data, array('ngo_staff_id ' => $_POST['ngo_staff_id']));
            $arr_response['status'] = 200;
            $arr_response['imageName'] =  $imageName;
            $arr_response['message'] = ' successfully'; 
        } else {
            $arr_response['status'] = 201;
            $arr_response['message'] = 'Something went Wrong! Please try again';
        }
        echo json_encode($arr_response);
    }
	
	public function croppie_image_upload_org() {
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
			$data = array(
				'staff_profile_image' => $imageName
			);
			$result = $this->db->update('org_staff_account', $data, array('staff_id' => $_POST['staff_id']));
            $arr_response['status'] = 200;
            $arr_response['imageName'] =  $imageName;
            $arr_response['message'] = ' successfully'; 
        } else {
            $arr_response['status'] = 201;
            $arr_response['message'] = 'Something went Wrong! Please try again';
        }
        echo json_encode($arr_response);
    }
	
	public function remove_data() {
		$arr_response = array();
		$return_val = $this->db->delete($_POST['table_name'],array($_POST['column_name'] =>  $_POST['column_value']));		
		$arr_response['status'] = 200;
		$arr_response['message'] = "Removed Successfully!";
		echo json_encode($arr_response);
    }
	
	
	public function upload_file_xl_page4() {
       	
		//if ($this->input->post('submit')) 
		//{      
			//var_dump($_FILES);die;
			$path = 'uploads/';
			//var_dump($path);
			//var_dump(APPPATH);
			require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			//var_dump($data);
			if(empty($error)){
				  if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				//var_dump($inputFileName);
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=2;
					$excel_array=array();
					//var_dump($allDataInSheet);
					
					foreach ($allDataInSheet as $value) {
						//var_dump($value);
						if($value['A']){ 
							//var_dump($value['A']);
							if($flag){
								$flag =false;
								continue;
							}
							 $inserdata['name_of_member'] = $value['A'];
							 $inserdata['member_age'] = $value['B'];
							 $inserdata['member_gender'] = $value['C'];
							 $inserdata['member_designation'] = $value['D'];
							 $inserdata['member_join_at'] = $value['E'];
							 $inserdata['member_related_to_other'] = $value['F'];
							 $inserdata['member_occupation'] = $value['G'];
							  ///var_dump($inserdata);
							   $i++;
							  
							
								array_push($excel_array,$inserdata); 
						}else{
							//$excel_array='';
						}   
							//$result = $this->db->insert('admin_category',$inserdata);
						
						//}  
					}  
					//var_dump($excel_array);
				if($excel_array){
					//var_dump($result);
					//$result = $this->import_model->importdata($inserdata);   
					$arr_response['status'] = 200;
					//$arr_response['filename'] = $filename;
					//$arr_response['upload_file'] = $upload_file;
					$arr_response['excel_array'] = $excel_array;
				} else {
					$arr_response['status'] = FAILED;
					$arr_response['message'] = "Not a valid File";
				}
				echo json_encode($arr_response);            

				
				} catch (Exception $e) {
				   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
							. '": ' .$e->getMessage());
				}
			}else{
			  echo $error['error'];
			} 

		//}
    }
	
	public function upload_file_xl_page4_5() {
       	
		//if ($this->input->post('submit')) 
		//{      
			//var_dump($_FILES);die;
			$path = 'uploads/';
			//var_dump($path);
			//var_dump(APPPATH);
			require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if(empty($error)){
				  if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				//var_dump($inputFileName);
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					$excel_array=array();
					//var_dump($allDataInSheet);
					
					foreach ($allDataInSheet as $value) {
						if($value['A']){ 
							//var_dump($value['A']);
							if($flag){
								$flag =false;
								continue;
							}
							 $inserdata['name_of_asset'] = $value['A'];
							 $inserdata['location'] = $value['B'];
							 $inserdata['value'] = $value['C'];
							   ///var_dump($inserdata);
							   $i++;
							  
							
								array_push($excel_array,$inserdata); 
						}else{
							//$excel_array='';
						}   
							//$result = $this->db->insert('admin_category',$inserdata);
						
						//}  
					}  
					//var_dump($excel_array);
				if($excel_array){
					//var_dump($result);
					//$result = $this->import_model->importdata($inserdata);   
					$arr_response['status'] = 200;
					//$arr_response['filename'] = $filename;
					//$arr_response['upload_file'] = $upload_file;
					$arr_response['excel_array'] = $excel_array;
				} else {
					$arr_response['status'] = FAILED;
					$arr_response['message'] = "Not a valid File";
				}
				echo json_encode($arr_response);            

				
				} catch (Exception $e) {
				   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
							. '": ' .$e->getMessage());
				}
			}else{
			  echo $error['error'];
			} 

		//}
    }
	
	public function upload_file_xl_page4_2() {
       	
		//if ($this->input->post('submit')) 
		//{      
			//var_dump($_FILES);die;
			$path = 'uploads/';
			//var_dump($path);
			//var_dump(APPPATH);
			require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if(empty($error)){
				  if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				//var_dump($inputFileName);
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					$excel_array=array();
					//var_dump($allDataInSheet);
					
					foreach ($allDataInSheet as $value) {
						if($value['A']){ 
							//var_dump($value['A']);
							if($flag){
								$flag =false;
								continue;
							}
							 $inserdata['title'] = $value['A'];
							 $inserdata['input1'] = $value['B'];
							 $inserdata['input2'] = $value['C'];
							 $inserdata['input3'] = $value['D'];
							 $inserdata['input4'] = $value['E'];
							 $inserdata['input5'] = $value['F'];
							 $inserdata['input6'] = $value['G'];
							 $inserdata['input7'] = $value['H'];
							 $inserdata['input8'] = $value['I'];
							 $inserdata['input9'] = $value['J'];
							  ///var_dump($inserdata);
							   $i++;
							  //var_dump($i);
							
								array_push($excel_array,$inserdata); 
						}else{
							//$excel_array='';
						}   
							//$result = $this->db->insert('admin_category',$inserdata);
						
						//}  
					}  
					//var_dump($excel_array);
				if($excel_array){
					//var_dump($result);
					//$result = $this->import_model->importdata($inserdata);   
					$arr_response['status'] = 200;
					//$arr_response['filename'] = $filename;
					//$arr_response['upload_file'] = $upload_file;
					$arr_response['excel_array'] = $excel_array;
				} else {
					$arr_response['status'] = FAILED;
					$arr_response['message'] = "Not a valid File";
				}
				echo json_encode($arr_response);            

				
				} catch (Exception $e) {
				   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
							. '": ' .$e->getMessage());
				}
			}else{
			  echo $error['error'];
			} 

		//}
    }
	
	public function upload_file_xl_page5_1() {
       	
		//if ($this->input->post('submit')) 
		//{      
			//var_dump($_FILES);die;
			$path = 'uploads/';
			//var_dump($path);
			//var_dump(APPPATH);
			require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if(empty($error)){
				  if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				//var_dump($inputFileName);
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					$excel_array=array();
					//var_dump($allDataInSheet);
					
					foreach ($allDataInSheet as $value) {
						//if($value['A'] && $value['B'] && $value['C'] && $value['D'] && $value['E'] && $value['F'] && $value['G']&& $value['H']&& $value['I']&& $value['J']){ 
							//var_dump($value['A']);
							if($flag){
								$flag =false;
								continue;
							}
							 $inserdata['title'] = $value['A'];
							 $inserdata['input1'] = $value['B'];
							 $inserdata['input2'] = $value['F'];
							 $inserdata['input3'] = $value['F'];
							 $inserdata['input4'] = $value['H'];
							
							  ///var_dump($inserdata);
							   $i++;
							  
							
								array_push($excel_array,$inserdata); 
						//}else{
							//$excel_array='';
						//}   
							//$result = $this->db->insert('admin_category',$inserdata);
						
						//}  
					}  
					//var_dump($excel_array);
				if($excel_array){
					//var_dump($result);
					//$result = $this->import_model->importdata($inserdata);   
					$arr_response['status'] = 200;
					//$arr_response['filename'] = $filename;
					//$arr_response['upload_file'] = $upload_file;
					$arr_response['excel_array'] = $excel_array;
				} else {
					$arr_response['status'] = FAILED;
					$arr_response['message'] = "Not a valid File";
				}
				echo json_encode($arr_response);            

				
				} catch (Exception $e) {
				   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
							. '": ' .$e->getMessage());
				}
			}else{
			  echo $error['error'];
			} 

		//}
    }
	
	public function upload_file_xl_page5_2() {
       	
		//if ($this->input->post('submit')) 
		//{      
			//var_dump($_FILES);die;
			$path = 'uploads/';
			//var_dump($path);
			//var_dump(APPPATH);
			require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if(empty($error)){
				  if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				//var_dump($inputFileName);
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					$excel_array=array();
					//var_dump($allDataInSheet);
					
					foreach ($allDataInSheet as $value) {
						if($value['A']){ 
							//var_dump($value['A']);
							if($flag){
								$flag =false;
								continue;
							}
							 $inserdata['input1'] = $value['A'];
							 $inserdata['input2'] = $value['B'];
							 $inserdata['input3'] = $value['C'];
							 $inserdata['input4'] = $value['D'];
							 $inserdata['input5'] = $value['E'];
							
							  ///var_dump($inserdata);
							   $i++;
							  
							
								array_push($excel_array,$inserdata); 
						}else{
							//$excel_array='';
						}   
							//$result = $this->db->insert('admin_category',$inserdata);
						
						//}  
					}  
					//var_dump($excel_array);
				if($excel_array){
					//var_dump($result);
					//$result = $this->import_model->importdata($inserdata);   
					$arr_response['status'] = 200;
					//$arr_response['filename'] = $filename;
					//$arr_response['upload_file'] = $upload_file;
					$arr_response['excel_array'] = $excel_array;
				} else {
					$arr_response['status'] = FAILED;
					$arr_response['message'] = "Not a valid File";
				}
				echo json_encode($arr_response);            

				
				} catch (Exception $e) {
				   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
							. '": ' .$e->getMessage());
				}
			}else{
			  echo $error['error'];
			} 

		//}
    }
	
	public function upload_file_xl_page4_3() {
       	
		//if ($this->input->post('submit')) 
		//{      
			//var_dump($_FILES);die;
			$path = 'uploads/';
			//var_dump($path);
			//var_dump(APPPATH);
			require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if(empty($error)){
				  if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				//var_dump($inputFileName);
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					$excel_array=array();
					//var_dump($allDataInSheet);
					
					foreach ($allDataInSheet as $value) {
						//if($value['A'] && $value['B'] && $value['C']){ 
							//var_dump($value['A']);
							if($flag){
								$flag =false;
								continue;
							}
							 $inserdata['title'] = $value['A'];
							 $inserdata['input1'] = $value['B'];
							 $inserdata['input2'] = $value['C'];
							 
							  ///var_dump($inserdata);
							   $i++;
							  
							
								array_push($excel_array,$inserdata); 
						//}else{
							//$excel_array='';
						//}   
							//$result = $this->db->insert('admin_category',$inserdata);
						
						//}  
					}  
					//var_dump($excel_array);
				if($excel_array){
					//var_dump($result);
					//$result = $this->import_model->importdata($inserdata);   
					$arr_response['status'] = 200;
					//$arr_response['filename'] = $filename;
					//$arr_response['upload_file'] = $upload_file;
					$arr_response['excel_array'] = $excel_array;
				} else {
					$arr_response['status'] = FAILED;
					$arr_response['message'] = "Not a valid File";
				}
				echo json_encode($arr_response);            

				
				} catch (Exception $e) {
				   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
							. '": ' .$e->getMessage());
				}
			}else{
			  echo $error['error'];
			} 

		//}
    }
	public function upload_file_xl_page4_4() {
       	
		//if ($this->input->post('submit')) 
		//{      
			//var_dump($_FILES);die;
			$path = 'uploads/';
			//var_dump($path);
			//var_dump(APPPATH);
			require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if(empty($error)){
				  if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				//var_dump($inputFileName);
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					$excel_array=array();
					//var_dump($allDataInSheet);
					
					foreach ($allDataInSheet as $value) {
						//if($value['A'] && $value['B'] && $value['C']){ 
							//var_dump($value['A']);
							if($flag){
								$flag =false;
								continue;
							}
							 $inserdata['title'] = $value['A'];
							 $inserdata['input1'] = $value['B'];
							 $inserdata['input2'] = $value['C'];
							 
							  ///var_dump($inserdata);
							   $i++;
							  
							
								array_push($excel_array,$inserdata); 
						//}else{
							//$excel_array='';
						//}   
							//$result = $this->db->insert('admin_category',$inserdata);
						
						//}  
					}  
					//var_dump($excel_array);
				if($excel_array){
					//var_dump($result);
					//$result = $this->import_model->importdata($inserdata);   
					$arr_response['status'] = 200;
					//$arr_response['filename'] = $filename;
					//$arr_response['upload_file'] = $upload_file;
					$arr_response['excel_array'] = $excel_array;
				} else {
					$arr_response['status'] = FAILED;
					$arr_response['message'] = "Not a valid File";
				}
				echo json_encode($arr_response);            

				
				} catch (Exception $e) {
				   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
							. '": ' .$e->getMessage());
				}
			}else{
			  echo $error['error'];
			} 

		//}
    }
	
	
	
}
