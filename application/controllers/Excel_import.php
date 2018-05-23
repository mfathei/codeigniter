<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("excel");
        $this->load->model("excel_import_model");
    }

    public function index()
    {
        $this->load->view("excel_import");
    }

    public function fetch()
    {
        $data   = $this->excel_import_model->select();
        $output = '
        <h3 align ="center">Total Data - ' . $data->num_rows() . '</h3>
        <br/>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Country</th>
                <th>Province</th>
                <th>City</th>
            </tr>
        ';

        foreach ($data->result() as $row) {
            $output .= '
            <tr>
                <td>' . $row->id . '</td>
                <td>' . $row->country . '</td>
                <td>' . $row->province . '</td>
                <td>' . $row->city . '</td>
            </tr>
            ';
        }

        if ($data->num_rows() == 0) {
            $output .= '
            <tr>
                <td colspan="4">No Data Found</td>
            </tr>
            ';
        }

        $output .= '</table>';
        echo $output;
    }

    public function import()
    {
        $data = [];
        if (isset($_FILES["file"]["name"])) {
            $path   = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorkSheetIterator() as $sheet) {
                $highestRow    = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                for ($row = 2; $row < $highestRow; $row++) {
                    $country  = $sheet->getCellByColumnAndRow(1, $row)->getValue();
                    $province = $sheet->getCellByColumnAndRow(2, $row)->getValue();
                    $city     = $sheet->getCellByColumnAndRow(3, $row)->getValue();
                    $data[]   = array(
                        'country'  => $country,
                        'province' => $province,
                        'city'     => $city,
                    );
                }
            }

            $this->excel_import_model->insert($data);
            echo "Data Imported Successfully";
        }
    }
}
