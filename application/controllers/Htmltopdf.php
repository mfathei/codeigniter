<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Htmltopdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("htmltopdf_model");
        $this->load->library("pdf");
    }

    public function index()
    {
        $data["customer_data"] = $this->htmltopdf_model->fetch();
        $this->load->view("htmltopdf", $data);
    }

    public function details(){
        if($this->uri->segment(3)){
            $id = $this->uri->segment(3);
            $data["customer_details"] = $this->get_customer_details($id);
            $this->load->view("htmltopdf", $data);
        }
    }

    public function pdfdetails(){
        if($this->uri->segment(3)){
            $id = $this->uri->segment(3);
            $html_content = '<h3 align="center">Convert HTML to pdf in CodeIgniter using DOMPdf</h3>';
            $html_content .= $this->get_customer_details($id);
            $this->pdf->loadHTML($html_content);
            $this->pdf->render();
            $this->pdf->stream('"'.$id.'.pdf"', array("Attachment" => 0));
        }
    }

    private function get_customer_details($id){
        $data = $this->htmltopdf_model->fetch_single($id);
        $output = '
        <table width="100%" cellspacing="5" cellpadding="50">
        ';

        foreach ($data->result() as $row) {
            $output .= '
            <tr>
                <td width="25%"><img src="'.base_url().'upload/'. $row->image .'" class="img-responsive img-thumbnail"/></td>
                <td width="2%"></td>
                <td width="73%">
                    <p><b>ID: </b>'.$row->id.'</p>
                    <p><b>First Name: </b>'.$row->first_name.'</p>
                    <p><b>Last Name: </b>'.$row->last_name.'</p>
                </td>
            </tr>
            ';
        }

        $output .= '
        <tr>
            <td colspan="3" align="center"><a href="'.base_url().'htmltopdf" class="btn btn-primary">Back</a></td>
        </tr>
        </table>
        ';

        return $output;
    }
}
