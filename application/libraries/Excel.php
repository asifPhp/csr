<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel.php");
	require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");
	require_once( APPPATH."/third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php");
	
	class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}
?>