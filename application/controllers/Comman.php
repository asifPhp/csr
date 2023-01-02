<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comman extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->load->view('welcome_message');
		
	}
	/**
	 * Index Page for this controller.
	 */
	public function email()	{
		$url = 'https://api.elasticemail.com/v2/email/send';
		//'to' => 'recipient1@gmail.com;recipient2@gmail.com',
		try{
			$post = array('from' => 'youremail@yourdomain.com',
			'fromName' => 'Tezinge',
			'apikey' => '60250278-744f-41e8-bacf-355e9d562941',
			'subject' => 'Your Subject',
			'to' => 'bigprajapat@gmail.com',
			'bodyHtml' => '<h1>Html Body</h1>',
			'bodyText' => 'Text Body',
			'isTransactional' => false);
			
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $post,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HEADER => false,
				CURLOPT_SSL_VERIFYPEER => false
			));
			
			$result=curl_exec ($ch);
			curl_close ($ch);
			echo $result;	
		}
		catch(Exception $ex){
			echo $ex->getMessage();
		}
		
	}
	
		public function tts_email()	{
		$url = 'https://api.elasticemail.com/v2/email/send';
		//'to' => 'recipient1@gmail.com;recipient2@gmail.com',
		try{
			$post = array('from' => 'youremail@talktoshare.com',
			'fromName' => 'Tesas',
			'apikey' => '787fece7-0e74-4dbf-a43b-578851009b97',
			'subject' => 'Your Subject',
			'to' => 'bigprajapat@gmail.com',
			'bodyHtml' => '<h1>Html Body</h1>',
			'bodyText' => 'Text Body',
			'isTransactional' => false);
			
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $post,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HEADER => false,
				CURLOPT_SSL_VERIFYPEER => false
			));
			
			$result=curl_exec ($ch);
			curl_close ($ch);
			echo $result;	
		}
		catch(Exception $ex){
			echo $ex->getMessage();
		}
		
	}
}
