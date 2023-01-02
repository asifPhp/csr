<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Newtcpdf extends tcpdf {

  function __construct() {
    parent::__construct();
  }

  public function header() {
    
    // get the current page break margin
    $bMargin = $this->getBreakMargin();
    // get current auto-page-break mode
    $auto_page_break = $this->AutoPageBreak;
    // disable auto-page-break
    $this->SetAutoPageBreak(false, 0);
    // set bacground image
    $img_file = K_PATH_IMAGES . 'img.png';
    $html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
  h1 {
    color: navy;
    font-family: times;
    font-size: 24pt;
    text-decoration: underline;
	    margin-top:100pt;
	    backbround-color: #eeeeee;
  }
  p {
    color: red;
    font-family: helvetica;
    font-size: 12pt;
  }
</style>
<body>
<h1>Example of <i>HTML + CSS</i></h1>
<p>Example of 12pt styled paragraph.</p>
</body>
EOF;

    $pdf->writeHTML($html, true, false, true, false, '');
    $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
    // restore auto-page-break status
    $this->SetAutoPageBreak($auto_page_break, $bMargin);
    // set the starting point for the page content
    $this->setPageMark();
  }
  

}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */