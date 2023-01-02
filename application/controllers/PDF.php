if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PDF extends CI_Controller {
    public function generatePDF(){
        // Name of your pdf file
        $filename = time()."_filename.pdf";
        // fetch data from the database
		$data="data";
        //$data = $this->YourModel->modelMethod();
        // pass data to view
        //$html = $this->load->view('pdfview', $data, true);
        // load the library
        $this->load->library('M_pdf');
        $this->m_pdf->pdf->WriteHTML($data);
        //download it D save F. 
        $this->m_pdf->pdf->Output("./assets/doc/".$filename, "F");
        echo "PDF has been generated successfully!";    
    }
}
/* End of file pdf.php */
/* Location: ./application/controllers/pdf.php */