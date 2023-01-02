<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Welcome extends CI_Controller {

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

	public function send_mail() {
       	$this->load->model('Email_model', 'obj_email', TRUE);
        $data = array(
        	'subject' => 'test',
        	'msg' => 'testmsg',
        	'to' => 'sharma.ambika98765@gmail.com',
        	'to_name' => 'ambika',
        );
		
        //$this->obj_email->send_mail_in_ci($data);
        //$this->obj_email->send_mail_in_sendinblue($data);
        $this->obj_email->send_mail_in_sendinblue_by($data);

    }
	
	public function upload_excel_Data() {
       	
		//if ($this->input->post('submit')) 
		//{      
			//var_dump($_POST);die;
			$path = 'uploads/';
			var_dump($path);
			var_dump(APPPATH);
			require_once( APPPATH."/third_party/PHPExcel/Classes/PHPExcel.php");
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
				var_dump($inputFileName);
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					foreach ($allDataInSheet as $value) {
						if($flag){
							$flag =false;
							continue;
						}
						  $inserdata['name'] = $value['A'];
						  var_dump($inserdata);
						   $i++;
					$result = $this->db->insert('admin_category',$inserdata);
					}  
					
					
					var_dump($result);
					//$result = $this->import_model->importdata($inserdata);   
					if($result){
					  echo "Imported successfully";
					}else{
					  echo "ERROR !";
					}             

				} catch (Exception $e) {
				   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
							. '": ' .$e->getMessage());
				}
			}else{
			  echo $error['error'];
			} 

		//}
    }
	
	public function save_pdf(){	
		
		/*include_once APPPATH.'/libraries/mpdf60/mpdf.php';
		
		#generate random number
		$capital = implode('',range('A','Z'));
		$small = implode('',range('a','z'));
		$number = implode('',range('0','10'));
		$randam_number = substr(str_shuffle($capital.$small.$number),40);
		
		$pdfFilePath = FCPATH."/assets/uploads/result_".$randam_number.".pdf";
		$data['page_title'] = 'Softron'; // pass data to the view
		
		$defaultcss = '<style>.table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
		border: 1px solid #ddd;width: 100%;    max-width: 100%;    margin-bottom: 20px;
		}.container{width:100%;}.about-page-two {    border: 1px solid #DDDDDD;    border-top: 0px;    margin-bottom: 12px;}.col-sm-4 {    width: 33.33333333%;float: left;}.text-center {    text-align: center;
		}.display_none{display:none;}</style>';
		
		$html = $defaultcss.$_POST['htmlcode']; // render the view into HTML
		
		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="ðŸ˜‰" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
		$pdf->WriteHTML($html); // write the HTML into the PDF
		$pdf->Output($pdfFilePath, 'F'); // save to file because we can
				

				
        $arr_response['filename'] = "result_".$randam_number.".pdf";        
        echo json_encode($arr_response);*/
		// include composer packages
		//include "vendor/autoload.php";

		// Create new Landscape PDF
		$pdf = new FPDI('l');

		// Reference the PDF you want to use (use relative path)
		$pagecount = $pdf->setSourceFile(APPPATH.'third_party/certificate.pdf' );

		// Import the first page from the PDF and add to dynamic PDF
		$tpl = $pdf->importPage(1);
		$pdf->AddPage();

		// Use the imported page as the template
		$pdf->useTemplate($tpl);

		// Set the default font to use
		$pdf->SetFont('Helvetica');

		// adding a Cell using:
		// $pdf->Cell( $width, $height, $text, $border, $fill, $align);

		// First box - the user's Name
		$pdf->SetFontSize('30'); // set font size
		$pdf->SetXY(10, 89); // set the position of the box
		$pdf->Cell(0, 10, 'Niraj Shah', 1, 0, 'C'); // add the text, align to Center of cell

		// add the reason for certificate
		// note the reduction in font and different box position
		$pdf->SetFontSize('20');
		$pdf->SetXY(80, 105);
		$pdf->Cell(150, 10, 'creating an awesome tutorial', 1, 0, 'C');

		// the day
		$pdf->SetFontSize('20');
		$pdf->SetXY(118,122);
		$pdf->Cell(20, 10, date('d'), 1, 0, 'C');

		// the month
		$pdf->SetXY(160,122);
		$pdf->Cell(30, 10, date('M'), 1, 0, 'C');

		// the year, aligned to Left
		$pdf->SetXY(200,122);
		$pdf->Cell(20, 10, date('y'), 1, 0, 'L');

		// render PDF to browser
		$pdf->Output();
	}
	
	public function download_pdf_file(){
		 $this->load->helper('download');
		$data = file_get_contents(base_url().'assets/doc/GST_File.pdf');
		$new_name='asif_alam.pdf';
		force_download($new_name, $data);
    		
	}
	
	
	/*function get_report(){
		$sql1="SELECT * FROM admin_category";
		$db_result1 = $this->db->query($sql1)->result_array();
		//var_dump($db_result1);die;
		
		//$this->load->dbutil();
		$this->load->helper('download');
		//$query = $this->pharmacy_model->get_report();
		//$data = $this->dbutil->csv_from_result($db_result1, ';');
		force_download('CSV_Report.csv', $db_result1);
	} */


	

	 public function fetchDataFromTable(){
		 $sql1="SELECT * FROM admin_category";
		$db_result1 = $this->db->query($sql1)->result_array();  // this will return all data into array
		 
		 $dataToExports = [];
		  foreach ($db_result1 as $data) {
		   $arrangeData['ID'] = $data['id'];
		   $arrangeData['Name'] = $data['name'];
		   $arrangeData['Last Name'] = "Alam";
		  // $arrangeData['Charater Profile'] = $data['profile'];
		  // $arrangeData['Charater Desc'] = $data['description'];
		   $dataToExports[] = $arrangeData;
		  }
		  // set header
		  $filename = "dataToExport.xls";
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
		  $this->exportExcelData($dataToExports);
		  
	 }
	 
	 public function exportExcelData($records){
	  $heading = false;
			if (!empty($records))
				foreach ($records as $row) {
					if (!$heading) {
						// display field/column names as a first row
						echo implode("\t", array_keys($row)) . "\n";
						$heading = true;
					}
					echo implode("\t", ($row)) . "\n";
					
				}
	 }
	 
	 
	 
    function cellsToMergeByColsRow($start = -1, $end = -1, $row = -1){
		$merge = 'A1:A1';
		if($start>=0 && $end>=0 && $row>=0){
			$start = PHPExcel_Cell::stringFromColumnIndex($start);
			$end = PHPExcel_Cell::stringFromColumnIndex($end);
			$merge = "$start{$row}:$end{$row}";
		}
		return $merge;
	}






	
	public function export_db_to_excel(){
		
				
				

	}


	public function export_db_to_excel_test(){
		require('../phpexcel/PHPExcel.php');

		require('../phpexcel/PHPExcel/Writer/Excel5.php');

		$filename = 'userReport'; //your file name

			$objPHPExcel = new PHPExcel();
			/*********************Add column headings START**********************/
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'username')
						->setCellValue('B1', 'city_name');

			/*********************Add data entries START**********************/
		//get_result_array_from_class**You can replace your sql code with this line.
		$result = $get_report_clas->get_user_report();
		//set variable for count table fields.
		$num_row = 1;
		foreach ($result as $value) {
		  $user_name = $value['username'];
		  $c_code = $value['city_name'];
		  $num_row++;
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$num_row, $user_name )
						->setCellValue('B'.$num_row, $c_code );
		}

			/*********************Autoresize column width depending upon contents START**********************/
			foreach(range('A','B') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);



		//Make heading font bold

				/*********************Add color to heading START**********************/
				$objPHPExcel->getActiveSheet()
							->getStyle('A1:B1')
							->getFill()
							->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
							->getStartColor()
							->setARGB('99ff99');

				$objPHPExcel->getActiveSheet()->setTitle('userReport'); //give title to sheet
				$objPHPExcel->setActiveSheetIndex(0);
				header('Content-Type: application/vnd.ms-excel');
				header("Content-Disposition: attachment;Filename=$filename.xls");
				header('Cache-Control: max-age=0');
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$objWriter->save('php://output');


	}	


	public function createExcel() {
		
		require_once( APPPATH."/third_party/vendor/PhpSpreadsheet/Spreadsheet.php");
		
		
		
		$fileName = 'employee.xlsx';  
		//$employeeData = $this->EmployeeModel->employeeList();
		
		$sql1="SELECT * FROM admin_category";
		$db_result1 = $this->db->query($sql1)->result_array();
		
		
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Name');
       // $sheet->setCellValue('C1', 'Skills');
        //$sheet->setCellValue('D1', 'Address');
		//$sheet->setCellValue('E1', 'Age');
       // $sheet->setCellValue('F1', 'Designation');
			
        $rows = 2;
        foreach ($db_result1 as $val){
            $sheet->setCellValue('A' . $rows, $val['id']);
            $sheet->setCellValue('B' . $rows, $val['name']);
            //$sheet->setCellValue('C' . $rows, $val['skills']);
           // $sheet->setCellValue('D' . $rows, $val['address']);
		//  $sheet->setCellValue('E' . $rows, $val['age']);
           // $sheet->setCellValue('F' . $rows, $val['designation']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }  


	 public function excel(){	
		//$this->load->library('excel');
		
		//require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
               
				$this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('Countries');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Country Excel Sheet');
                $this->excel->getActiveSheet()->setCellValue('A4', 'S.No.');
                $this->excel->getActiveSheet()->setCellValue('B4', 'Country Code');
                $this->excel->getActiveSheet()->setCellValue('C4', 'Country Name');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:C1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('C'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $rs = $this->db->get('admin_category');
                $exceldata=[];
			foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
			}
                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $filename='PHPExcelDemo.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
    }
	

	// export file Xlsx, Xls and Csv
  public function export()
  {
	  
	 require APPPATH . '/third_party/PhpSpreadsheet/vendor/autoload.php'; 
    // require(APPPATH. 'vendor/autoload.php');
	//$this->load->view('spreadsheet');
	//$this->load->library('autoloader_psr4');
	//$this->autoloader_psr4->register();
	
	$sql1="SELECT * FROM admin_category";
		$db_result1 = $this->db->query($sql1)->result_array(); 
	
	 $extension = 'xlsx';
    /*$extension = $this->input->post('export_type');
    if(!empty($extension)){
      $extension = $extension;
    } else {
      $extension = 'xlsx';
    }*/
    $this->load->helper('download');  
    $data = array();
    $data['title'] = 'Export Excel Sheet | Coders Mag';
    // get employee list
    //$empInfo = $this->site->employeeList();
    
	$fileName = 'employee-'.time(); 
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'Name');
        //$sheet->setCellValue('C1', 'Email');
        //$sheet->setCellValue('D1', 'DOB');
       // $sheet->setCellValue('E1', 'Contact_No');
 
        $rowCount = 2;
        foreach ($db_result1 as $element) {
            $sheet->setCellValue('A' . $rowCount, $element['id']);
            $sheet->setCellValue('B' . $rowCount, $element['name']);
           // $sheet->setCellValue('C' . $rowCount, $element['email']);
            //$sheet->setCellValue('D' . $rowCount, $element['dob']);
            //$sheet->setCellValue('E' . $rowCount, $element['contact_no']);
            $rowCount++;
        }
 
        if($extension == 'csv'){          
      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
      $fileName = $fileName.'.csv';
    } elseif($extension == 'xlsx') {
      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
      $fileName = $fileName.'.xlsx';
    } else {
      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
      $fileName = $fileName.'.xls';
    }
	$fileName='asif.xls';
    $this->output->set_header('Content-Type: application/vnd.ms-excel');
    $this->output->set_header("Content-type: application/csv");
    $this->output->set_header('Cache-Control: max-age=0');
    $writer->save(ROOT_UPLOAD_PATH.$fileName); 
    //redirect(HTTP_UPLOAD_PATH.$fileName); 
    $filepath = file_get_contents(ROOT_UPLOAD_PATH.$fileName);
    force_download($fileName, $filepath);
  }

	
	
	
	
	
	
	public function generateXls() {
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
		$inputFileName=($base_path.'\assets\doc\existint_execel_file.xlsx');
		//$inputFileName=	(base_url().'assets/doc/test.xlsx');
		//$inputFileName = (__DIR__ .'C:\Users\lennox\Desktop\test.xlsx');
		
		//$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		//var_dump($inputFileType);
		$objPHPExcel = PHPExcel_IOFactory::createReader('Excel2007');
		//$objReader->setReadDataOnly(true);
		$objPHPExcel = $objPHPExcel->load($inputFileName);
		
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'ID');
		$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Status');
        //$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
        // set Row
        $rowCount = 2;
        foreach ($db_result1 as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list['module_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list['module_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list['date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list['status']);
            //$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->last_name);
           // $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->email);
           // $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->dob);
            //$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->contact_no);
            $rowCount++;
			
        }
		
		//var_dump($objPHPExcel);
		//$objPHPExcel->getActiveSheet()->mergeCells("A1".($rowCount+1).":B1".($rowCount+4));  
		//$objPHPExcel->getActiveSheet()->setCellValue('A1','The quick brown fox.'); 
		//$sheet->mergeCells("A".($row_count+1).":B".($row_count+1));    
        
		//$filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
		 //header('Content-Type: application/vnd.ms-excel'); 
        //header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$excel_name = 'test.xlsx';
		//$path='C:/Users/lennox/Desktop/';
		$path=$base_path.'\assets\doc\\';
		var_dump($path);
		$objWriter->save($path . $excel_name);
		//$objWriter->save('dentkey1.xlsx'); 
		 $filePath = $path.$excel_name;
		 var_dump($filePath);
		// var_dump($filePath);
		//$this->response->file($filePath, ['download' => TRUE, 'name' => $excel_name]);

		//return $this->response;
		//unlink($filePath);
		//unlink($inputFileName);
		//unlink($inputFileName);

	//	exit;
 
    }
	
	public function generateXlsda() {
        // create file name
        $fileName = 'data-'.time().'.xls';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
		$sql1="SELECT * FROM admin_module";
		$db_result1 = $this->db->query($sql1)->result_array();
		
		
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Status');
        //$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
        // set Row
        $rowCount = 0;
        foreach ($db_result1 as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list['module_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list['module_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list['date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list['status']);
            //$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->last_name);
           // $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->email);
           // $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->dob);
            //$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->contact_no);
            $rowCount++;
			
        }
		
		
		//$objPHPExcel->getActiveSheet()->mergeCells("A1".($rowCount+1).":B1".($rowCount+4));  
		//$objPHPExcel->getActiveSheet()->setCellValue('A1','The quick brown fox.'); 
		//$sheet->mergeCells("A".($row_count+1).":B".($row_count+1));    
        
		$filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 
    }
	
	public function delete_table(){
		
		$this->db->truncate('ngo_notification');
		$this->db->truncate('ngo_district');
		//$this->db->truncate('ngo_notification');
		$this->db->truncate('proposal');
		$this->db->truncate('org_tasks');
		$this->db->truncate('project');
		$this->db->truncate('gc_ticket');
		//$this->db->truncate('org_tasks');
		$this->db->truncate('org_assigner_mgmt');
		$this->db->truncate('project_donors');
		$this->db->truncate('project_cycle_details');
		$this->db->truncate('project_cycle_donor_details');
		$this->db->truncate('project_document');
		//$this->db->truncate('org_tasks');
		//$this->db->truncate('ngo_notification');
				
		 redirect(base_url());	

	}
	
}
