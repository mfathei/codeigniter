<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel_export extends CI_Controller
{
    public function index()
    {
        $this->load->model("excel_export_model");
        $data["city_data"] = $this->excel_export_model->fetch_all();
        $this->load->view("excel_export_view", $data);
    }

    public function action()
    {
        $this->load->model("excel_export_model");
        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = ["ID", "Country", "Province", "City"];
        $column        = 0;
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $city_data = $this->excel_export_model->fetch_all();
        $excel_row = 2;
        foreach ($city_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->country);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->province);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->city);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename='city data.xls'");
        $object_writer->save("php://output");
    }
}
