<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Csv_import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("csv_import_model");
        $this->load->library("csvimport");
    }

    public function index()
    {
        $this->load->view("csv_import");
    }

    public function load_data()
    {
        $result = $this->csv_import_model->select();
        $output = '
        <h3 align="center">Imported City Details from CSV File</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>Province</th>
                    <th>City</th>
                </tr>
        ';

        $count = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $count++;
                $output .= '
                <tr>
                    <td>' . $row->id . '</td>
                    <td>' . $row->country . '</td>
                    <td>' . $row->province . '</td>
                    <td>' . $row->city . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="4" align="center">Data not Available</td>
                </tr>
            ';
        }

        $output .= '</table></div>';
        echo $output;
    }

    public function import()
    {
        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        $data = [];
        foreach ($file_data as $row) {
            $data[] = array(
                "country"  => $row["country"],
                "province" => $row["province"],
                "city"     => $row["city"],
            );
        }

        $this->csv_import_model->insert($data);
    }
}
