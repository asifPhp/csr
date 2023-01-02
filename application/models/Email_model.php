<?php if (!defined('BASEPATH')) exit('Not A Valid Request');
include('3dParty/mailin.php');
class Email_model extends CI_Model {

    public function __construct() {
        parent::__construct();
		$this->load->library('email');
    }

    public function send_mail_in_sendinblue_by($data) {
    	$header = '<div><div style="background-color: #f8f9fa;padding: 20px;font-size: 20px;"><div style="text-align: center;border-bottom: 1px solid;"><a href="'.PROJECT_URL.'"><img src="'.LOGO.'" alt="'.PROJECT_NAME_MINI.'" style="width: 160px; margin-bottom: 10px;"></a></div><br/>';
		$content = $data['msg'];
		$footer ='<br/><p style="margin: 0px;margin-top: 14px;">Regards,</p><p style="margin: 0px !important;">Team Compass</p><div style="border-top: 1px solid;"><span style="font-size: 10px;">Copyright &copy; '.date("Y").' . All Rights Reserved.</span></div></div></div>';
		
		//print_r($header.$content.$footer);die();

		$subject = $data['subject'];
		$message = $header.$content.$footer;
		$from = PROJECT_EMAIL;
		$to = $data['to'];
		$to_name = $data['to_name'];


		$mailin = new Mailin('https://api.sendinblue.com/v2.0', 'fjWMdN2bG9KYxEXs', 5000);
        $data = array(
            "to" => array($to => $to_name),
            "from" => array(PROJECT_EMAIL, PROJECT_NAME_MINI),
            "subject" => $subject,
            "html" => $message
        );
       $response = $mailin->send_email($data);
        //var_dump($to);
        //var_dump($response);
        return TRUE;
    }

    public function send_mail_in_sendinblue($data) {
    	$header = '<div><div style="background-color: #f8f9fa;padding: 20px;font-size: 20px;"><div style="text-align: center;border-bottom: 1px solid;"><a href="'.PROJECT_URL.'"><img src="'.LOGO.'" alt="'.PROJECT_NAME_MINI.'" style="width: 160px; margin-bottom: 10px;"></a></div><br/>';
		$content = $data['msg'];
		$footer ='<br/><p style="margin: 0px;margin-top: 14px;">Regards,</p><p style="margin: 0px !important;">Team Compass</p><div style="border-top: 1px solid;"><span style="font-size: 10px;">Copyright &copy; '.date("Y").' . All Rights Reserved.</span></div></div></div>';
		
		//print_r($header.$content.$footer);die();

		$subject = $data['subject'];
		$message = $header.$content.$footer;
		$from = PROJECT_EMAIL;
		$to = $data['to'];
		$to_name = $data['to_name'];


		$mailin = new Mailin('https://api.sendinblue.com/v2.0', 'fjWMdN2bG9KYxEXs', 5000);
        $data = array(
            "to" => array($to => $to_name),
            "from" => array(PROJECT_EMAIL, PROJECT_NAME_MINI),
            "subject" => $subject,
            "html" => $message
        );
		if(base_url() != 'localhost'){
            $response = $mailin->send_email($data);
        }//var_dump($to);
        //var_dump($response);
        return TRUE;
    }

    public function send_mail_in_ci($data) {
		
		$header = '<div><div style="background-color: #f8f9fa;padding: 20px;font-size: 20px;"><div style="text-align: center;border-bottom: 1px solid;"><a href="'.PROJECT_URL.'"><img src="'.LOGO.'" alt="CSR" style="width: 160px; margin-bottom: 10px;"></a></div><br/>';
		$content = $data['msg'];
		$footer ='<br/><p style="margin: 0px;margin-top: 14px;">Regards,</p><p style="margin: 0px !important;">Team Compass</p><div style="border-top: 1px solid;"><span style="font-size: 10px;">Copyright &copy; '.date("Y").' . All Rights Reserved.</span></div></div></div>';
		
		//print_r($header.$content.$footer);die();
		
		$subject = $data['subject'];
		$message = $header.$content.$footer;
		$from = PROJECT_EMAIL;
		$to = $data['to'];
		
		
        $e_config = array(
			'charset'=>'utf-8',
			'wordwrap'=> TRUE,
			'mailtype' => 'html',
			'priority' => '1'
		);
		
		$this->email->initialize($e_config);
		$this->email->from($from, PROJECT_NAME_MINI);
		$this->email->to($to); 
		$this->email->subject($subject);
		$this->email->message($message);	
		$result = $this->email->send();
		
		//var_dump($response);
		//$result = $this->email->send();
		//var_dump($result);
		//echo $this->email->print_debugger();
		//die();
		//var_dump($result);
		
		return TRUE;
	}	
}