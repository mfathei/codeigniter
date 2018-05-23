<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller
{
    public function index()
    {
        $this->load->view("ajaxsearch");
    }

    public function fetch(){
        $output = '';
        $query = '';
        $this->load->model("ajaxsearch_model");
        if($this->input->post("query") != ''){
            $query = $this->input->post("query");
        }

        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>Province</th>
                    <th>City</th>
                </tr>
        ';
        $data = $this->ajaxsearch_model->fetch_data($query);
        if($data->num_rows() > 0){
            foreach ($data->result() as $row) {
                $output .= '
                <tr>
                    <td>'. $row->id .'</td>
                    <td>'. $row->country .'</td>
                    <td>'. $row->province .'</td>
                    <td>'. $row->city .'</td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="4">No Data Found</td>
            </tr>
            ';
        }

        $output .= "</table></div>";
        echo $output;
    }
}
