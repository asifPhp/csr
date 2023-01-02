<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Xls extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    function __construct() {
        parent::__construct();
		if(base_url() == 'http://dev.compass-csr.com/'){
			redirect(base_url().'ngo/login');		
		}
		if(base_url() == 'https://compass-csr.com/'){
			redirect(base_url().'ngo/login');		
		}
		if(base_url() == 'http://devorg.compass-csr.com/'){
			redirect(base_url().'organisation/login');	
		}	
		if(base_url() == 'https://org.compass-csr.com/'){
			redirect(base_url().'organisation/login');	
		}
		 $this->load->library('excel');
			
    }
	public function index()	{
		$this->load->view('components/header');
		$this->load->view('welcome_message');
		$this->load->view('components/footer');
	}
	
	
	public function generateXls() {
		$partner = '';
		$prop_id = '';
		$prop_title = '';
		$project_id = '';
		$location = '';
		$state = '';
		$city = '';
		$category_name='';
        $subcategory_name='';
        $registration_detail='';
        $registration_date='';
        $registration_date_array=array();
        $registration_type_array=array();
        $registration_type='';
        $registration_street_address ='';
		$registration_city='';
		$registration_state='';
        $legal_name='';
        $men_adult='';
        $women_adult='';
        $children='';
        $beneficiary_sum='';
        $budget_details='';
        $renumeration_of_senior_leadership='';
        $label1='';
        $name='';
		$prop_id = '';
		$org_id  = '';
		$ngo_id  = '';
		$start_date  = '';
		$end_date  = '';
		$additional_json = '';
		$additional_json1 = '';
		$proposal_id='83';
		$input1=0;
		$input2=0;
		$input3=0;
		$input4=0;
		$average=0;
		$comments_first = '';
		$comments_6 = '';
		$comments_10 = '';
		$comments_7 = '';
		$comments_8 = '';
		$comments_9 = '';
		$total_funds= '';
		$total_funds_org = '';
		$summary_visit = '';
		$oldest_date='';
		$oldest_address='';
		$oldest_city='';
		$oldest_state='';
		$all_date=array();
		$head_staff=array();
		$org_names_array=array();
		$location_list=array();
		$person_list=array();
		$location_list_names = '';
		$person_list_names = '';
		$org_names='';
		$coo_name='';
		$hoo_name='';
		$cof_name='';
		$visit_date='';
		$duration='';
		$organisation_three='';
		$organisation_eighty='';
		$organisation_csr1='';
		$ngo_code='';
		
		$prop_data = $this->db->get_where('proposal',array('prop_id'=>$proposal_id))->result_array();
		//var_dump($prop_data);  
		
		
		
		if($prop_data){
			$prop_id = $prop_data[0]['prop_id'];
			$prop_title = $prop_data[0]['title'];
			$org_id =  $prop_data[0]['organisation_id'];
			$ngo_id =  $prop_data[0]['ngo_id'];
			$project_id = $prop_data[0]['new_prop_id'];
			$location = $prop_data[0]['street_address'];
			$state = $prop_data[0]['state'];
			$city = $prop_data[0]['city'];
			$start_date = $prop_data[0]['start_date'];
			$end_date = $prop_data[0]['end_date'];
			$men_adult = $prop_data[0]['men_adult'];
			$women_adult = $prop_data[0]['women_adult'];
			$child = $prop_data[0]['children'];
			if(($men_adult && $women_adult && $child) != 0){
	            $beneficiary_sum = $men_adult + $women_adult + $child;
			}			
    		$total_funds = $prop_data[0]['total_funds'];
    		$total_funds_org = $prop_data[0]['total_funds_org'];
			$category = $this->db->get_where('admin_category',array('id'=>$prop_data[0]['focus_category']))->result_array();
			$subcategory = $this->db->get_where('admin_subcategory',array('id'=>$prop_data[0]['focus_subcategory']))->result_array();
			$ngo_data = $this->db->get_where('ngo',array('id'=>$prop_data[0]['ngo_id']))->result_array();
			
			$org_data = $this->db->get_where('org_tasks',array('prop_id'=>$prop_id,'org_id'=>$org_id,'ngo_id'=>$ngo_id,'org_task_label'=>'Leadership Engagement','status'=>'Completed'))->result_array();
				foreach($org_data as $value){
					if($value['additional_json']){
						$additional_json=json_decode($value['additional_json'] ,true);					
							foreach($additional_json as $data){
									if($data['comments_first'] !=''){
										$comments_first = $data['comments_first'];
									}					
							}
					}		  
				}
				
			$org_data4 = $this->db->get_where('org_tasks',array('prop_id'=>$prop_id,'org_id'=>$org_id,'ngo_id'=>$ngo_id,'org_task_label'=>'NGO Desk Review','status'=>'Completed'))->result_array();
				foreach($org_data4 as $value){
					if($value['additional_json']){
					//	var_dump($value['additional_json']);
						$additional_json4=json_decode($value['additional_json'] ,true);					
							foreach($additional_json4 as $data){
									if($data['comments_10'] !=''){
										$comments_10 = $data['comments_10'];
									}
					
									if($data['organisation_three'] !=''){
										if($data['organisation_three'] == 'No'){	
										    $organisation_three = strtoupper($data['organisation_three']);
										}else{
										    $organisation_three = $data['organisation_three'];	
										}
									}
									
									if($data['organisation_eighty'] !=''){
										if($data['organisation_eighty'] == 'No'){	
										    $organisation_eighty = strtoupper($data['organisation_eighty']);
										}else{
										    $organisation_eighty = $data['organisation_eighty'];	
										}
									}
									
									if($data['organisation_csr1'] !=''){
										if($data['organisation_csr1'] == 'No'){	
										    $organisation_csr1 = strtoupper($data['organisation_csr1']);
										}else{
										    $organisation_csr1 = $data['organisation_csr1'];	
										}
									}					
							}
					}		  
				}
		    //var_dump($comments_10);
			
			
			$org_data1 = $this->db->get_where('org_tasks',array('prop_id'=>$prop_id,'org_id'=>$org_id,'ngo_id'=>$ngo_id,'org_task_label'=>'Proposal Desk Review','status'=>'Completed'))->result_array();
				foreach($org_data1 as $value){
					if($value['additional_json']){
						$additional_json1=json_decode($value['additional_json'] ,true);					
                            foreach($additional_json1 as $data){
									if($data['comments_6'] !=''){
										$comments_6 = $data['comments_6'];
									}
									
									if($data['comments_7'] !=''){
										$comments_7 = $data['comments_7'];
									}
									
									if($data['comments_8'] !=''){
										$comments_8 = $data['comments_8'];
									}
									
									if($data['comments_9'] !=''){
										$comments_9 = $data['comments_9'];
									}					
							}
					}		  
				}
				
				$org_data2 = $this->db->get_where('org_tasks',array('prop_id'=>$prop_id,'org_id'=>$org_id,'ngo_id'=>$ngo_id,'org_task_label'=>'Field Visit Report','status'=>'Completed'))->result_array();
				foreach($org_data2 as $value){
					if($value['additional_json']){
						$additional_json2=json_decode($value['additional_json'] ,true);	
                          // var_dump($additional_json2);						
                            foreach($additional_json2 as $name_data) {
								if($name_data['multi_focal_point'] !=''){
								    $org_names = implode(',',$name_data['multi_focal_point']);
								}
								
								if($name_data['visit_date'] !=''){
						            $visit_date = $name_data['visit_date'];
								}
								
								if($name_data['location_name_list'] !=''){
									foreach($name_data['location_name_list'] as $location_names){
									    array_push($location_list,$location_names['location_name']);
									}
								    $location_list_names = implode(',',$location_list);
								}
								
								
								if($name_data['person_list'] !=''){
									foreach($name_data['person_list'] as $person_designation){
									    array_push($person_list,$person_designation['person_dege']);
									}
									$person_list_names = implode(',',$person_list);
								}
								
								if($name_data['overall_summary_of_visit'] !=''){
									$summary_visit = $name_data['overall_summary_of_visit'];
								}
					        }
					}		  
				}

		}
		
		if($category){
		$category_name = $category[0]['name'];
		}

		if($subcategory){
		$subcategory_name = $subcategory[0]['name'];
		}
		
		if($ngo_data){
	        $ngo_code = $ngo_data[0]['code'];		
		    $registration_detail=json_decode($ngo_data[0]['registration_detail'] ,true);
		    $budget_details=json_decode($ngo_data[0]['budget_details'] ,true);
		    $renumeration_of_senior_leadership=json_decode($ngo_data[0]['renumeration_of_senior_leadership'] ,true);
				if($registration_detail){
		
					foreach($registration_detail as $value){			
						
						
						
						array_push($registration_date_array , $value['registration_date']);
						array_push($registration_type_array , $value['registration_type']);
						$registration_street_address = $value['registration_street_address'];
						$registration_city = $value['registration_city'];
						$registration_state = $value['registration_state'];
						//	var_dump('Registration Type : '.$registration_type);
						//	var_dump('Registration Type : '.$registration_date);
						//	var_dump('Registration street address : '.$registration_street_address);
						//	var_dump('Registration city : '.$registration_city);
						//	var_dump('Registration state : '.$registration_state);
					}
				}
				
			//	var_dump($renumeration_of_senior_leadership);
				if($renumeration_of_senior_leadership){
					foreach($renumeration_of_senior_leadership as $value){
						
						if($value['label1'] == 'Head of Organisation'){
							if($value['input1'] !=''){
						        $hoo_name = $value['input1'];
							}
						}
						
						if($value['label1'] == 'Chief of Operations'){
							if($value['input1'] !=''){
						        $coo_name = $value['input1'];
						    }
						}
						
						if($value['label1'] == 'Chief of Finance/Accounts'){
						    if($value['input1'] !=''){
						       	$cof_name = $value['input1'];
						    }
						}
					}
				}
                    //var_dump($hoo_name);
                   // var_dump($coo_name);
                   // var_dump($cof_name);
				
				
		
			    $registration_date = implode(" / ",$registration_date_array);
			    $registration_type = implode(" / ",$registration_type_array);
			
				if($budget_details){
					    if($budget_details[1]['input4'] !=''){
	                        $input4 = $budget_details[1]['input4'];						
						}
						$input1 = $budget_details[1]['input1'].'00000';
						$input2 = $budget_details[1]['input2'].'00000';
						$input3 = $budget_details[1]['input3'].'00000';
						    if(($input1 && $input2 &&$input3) !=0 ){ 
							    $average = ($input1 + $input2 + $input3) / 3;
							}
						//	var_dump('Average expenditure of 3 numbers:'.$average);
						//	var_dump($input1);
						//	var_dump($input2);
						//	var_dump($input3);
				}
              
		    $legal_name = $ngo_data[0]['legal_name'];
		}
		
		            foreach($registration_detail as $value){
						//    var_dump($value['registration_date']);
		                $smallest = strtotime($value['registration_date']);		
                        //    var_dump($smallest);		                    
							if($smallest!=''){
								array_push($all_date,$smallest);
							}
					}    
							if($all_date){
			                    $all_date=min($all_date);
			                }    	
		                     
							$registration_date1=array();
                                foreach($registration_detail as $reg_date){
									array_push($registration_date1 , strtotime($reg_date['registration_date']));
								}
                                    $i=0;
								foreach($registration_date1 as $date){
									   if($registration_date1[$i] == $all_date){
										    $oldest_date = date("Y-m-d", $registration_date1[$i]);
											//date("Y-m-d H:i:s", $registration_date1[$i]);
									    $i++;
									   }else{
										   $i++;
									   }
								}
		                    //   var_dump($all_date);
		                         foreach($registration_detail as $row){
									    if($row['registration_date'] == $oldest_date){
										//	var_dump('oldest Date : '.$row['registration_date']);
											$oldest_address = $row['registration_street_address'];
											$oldest_city = $row['registration_city'];
											$oldest_state = $row['registration_state'];
										} 
								}
		
	if($start_date and $end_date){
		$start_date1=strtotime($start_date);
		$end_date1=strtotime($end_date);
		
		$year1 = date('Y', $start_date1);
		$year2 = date('Y', $end_date1);

		$month1 = date('m', $start_date1);
		$month2 = date('m', $end_date1);
		
		$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
		$diff_year = ($year2 - $year1); 
		$diff_month= ($month2 - $month1);
		//var_dump($diff_year);
		//var_dump($diff_month);
		if($diff_year!=0 and $diff_month!=0){
			//echo $diff_month .' months.';
		    $duration = $diff_year.' yrs  '.$diff_month .' months.';
		}else if($diff_year!=0){
			$duration = $diff_year .' yrs.';
		}else if($diff_month!=0){
			$duration = $diff_month .' months.';
		}
	}
		
    $projects_data = $this->db->get_where('project',array('organisation_id'=>$org_id,'ngo_id'=>$ngo_id));    
	if($projects_data->num_rows() > 0){
		$partner ='Existing Parter';
	}else{
		$partner = 'New Partner';
	}
		
	//	var_dump($prop_id);
	//	var_dump($prop_title);
	//	var_dump($project_id);
	//	var_dump($location);
	//	var_dump($state);
	//	var_dump($city);
	//	var_dump($category_name);
	//	var_dump($subcategory_name);
	//	var_dump('Legal Name : '.$legal_name);
	//	var_dump('Total Funds Org : '.$total_funds_org);
	//	var_dump('Beneficiary_sum : '.$beneficiary_sum);
		
		
        // create file name
        $fileName = 'data-'.time().'.xls';		
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
		$sql1="SELECT * FROM admin_module";
		$db_result1 = $this->db->query($sql1)->result_array();
		
		
		//var_dump($inputFileName);
		$objPHPExcel = new PHPExcel();
		$base_path=(dirname(__DIR__,2));
		$inputFileName=($base_path.'\assets\doc\Compass-Approval-Sheet-Requirements.xlsx');
		//$inputFileName=	(base_url().'assets/doc/test.xlsx');
		//$inputFileName = (__DIR__ .'C:\Users\lennox\Desktop\test.xlsx');
		
		//$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		//var_dump($inputFileType);
		$objPHPExcel = PHPExcel_IOFactory::createReader('Excel2007');
		//$objReader->setReadDataOnly(true);
		$objPHPExcel = $objPHPExcel->load($inputFileName);
		
        $objPHPExcel->setActiveSheetIndex(0);
        // set Heade
		
		$objPHPExcel->getActiveSheet()->SetCellValue('B2', $partner);
		$objPHPExcel->getActiveSheet()->SetCellValue('B4', $prop_title);
		$objPHPExcel->getActiveSheet()->SetCellValue('B5', $project_id);
		$objPHPExcel->getActiveSheet()->SetCellValue('B6', $location .'  , '.$city.' , '.$state);
		$objPHPExcel->getActiveSheet()->SetCellValue('B7', $category_name ."\n".$subcategory_name);
        $objPHPExcel->getActiveSheet()->getStyle('B7')->getAlignment()->setWrapText(true);
		$objPHPExcel->getActiveSheet()->SetCellValue('B9', $legal_name);
		$objPHPExcel->getActiveSheet()->SetCellValue('B10', $registration_date);
		$objPHPExcel->getActiveSheet()->SetCellValue('B11', $registration_type);
		$objPHPExcel->getActiveSheet()->SetCellValue('B12', $organisation_three."  " . $organisation_eighty."  " .$organisation_csr1);
		
		$styleArray = array(
		'font'  => array(
			'bold' => true,
			'color' => array('rgb' => 'FF0000'),
		));
		if($organisation_three == 'No' || $organisation_eighty == 'NO' || $organisation_csr1 == 'NO')
		{
	    	$objPHPExcel->getActiveSheet()->getStyle('B12')->applyFromArray($styleArray);
	    }
		$objPHPExcel->getActiveSheet()->SetCellValue('B13', $oldest_address.' '.$oldest_city.' '.$oldest_state);
		$objPHPExcel->getActiveSheet()->SetCellValue('B14', $average);
		$objPHPExcel->getActiveSheet()->SetCellValue('B16', $input4);
		$objPHPExcel->getActiveSheet()->SetCellValue('B17', $input3);
		$objPHPExcel->getActiveSheet()->SetCellValue('B18', $input2);
		$objPHPExcel->getActiveSheet()->SetCellValue('B19', $input1);
		$objPHPExcel->getActiveSheet()->SetCellValue('B23', 'CEO : '.$hoo_name."\nCOO : ".$coo_name."\nCFO :".$cof_name);
		$objPHPExcel->getActiveSheet()->SetCellValue('B24', $comments_first);
		$objPHPExcel->getActiveSheet()->SetCellValue('B25', $comments_10);
		$objPHPExcel->getActiveSheet()->SetCellValue('B32', $total_funds_org);
		$objPHPExcel->getActiveSheet()->SetCellValue('B33', $duration);
		$objPHPExcel->getActiveSheet()->SetCellValue('B39', $beneficiary_sum);
		$objPHPExcel->getActiveSheet()->SetCellValue('B40', $comments_6);
		$objPHPExcel->getActiveSheet()->SetCellValue('B41', $comments_7);
		$objPHPExcel->getActiveSheet()->SetCellValue('B42', $comments_8);
		$objPHPExcel->getActiveSheet()->SetCellValue('B43', $comments_9);
		$objPHPExcel->getActiveSheet()->SetCellValue('B46', $total_funds);
		$objPHPExcel->getActiveSheet()->SetCellValue('B47', $total_funds_org);
		$objPHPExcel->getActiveSheet()->SetCellValue('B49', $org_names);
		$objPHPExcel->getActiveSheet()->SetCellValue('B50', $visit_date);
		$objPHPExcel->getActiveSheet()->SetCellValue('B51', $location_list_names);
		$objPHPExcel->getActiveSheet()->SetCellValue('B52', $person_list_names);
		$objPHPExcel->getActiveSheet()->SetCellValue('B53', $summary_visit);
        
        header('Cache-Control: max-age=0'); 
		$date = date('dmy');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$excel_name = $project_id.'-'.$ngo_code.'-'.$date.'.xlsx';
		$path=$base_path.'\assets\doc\\';
		var_dump($path);
		$objWriter->save($path . $excel_name); 
		 $filePath = $path.$excel_name;
		 var_dump($filePath);
    }
}
