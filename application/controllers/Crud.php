<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller
{
    public function index()
    {
        $data["title"] = "DataTable server side processin in CodeIgniter";
        $this->load->view("crud_view", $data);
    }

    public function fetch_user()
    {
        $this->load->model("crud_model");
        $fetch_data = $this->crud_model->make_datatables();
        $data       = [];
        foreach ($fetch_data as $row) {
            $subarr   = [];
            $subarr[] = '<img src="' . base_url() . 'upload/' . $row->image . '" calss="img-thumbnail" width="50" height="35"/>';
            $subarr[] = $row->first_name;
            $subarr[] = $row->last_name;
            $subarr[] = '<button type="button" id="' . $row->id . '" name="update" class="btn btn-warning btn-xs">Update</button>';
            $subarr[] = '<button type="button" id="' . $row->id . '" name="delete" class="btn btn-danger btn-xs">Delete</button>';
            $data[]   = $subarr;
        }

        $output = array(
            "draw"            => intval($_POST["draw"]),
            "recordsTotal"    => $this->crud_model->get_all_data(),
            "recordsFiltered" => $this->crud_model->get_filtered_data(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function user_action(){
        if($_POST["action"] == "Add"){
            $insert_data = array(
                "first_name" => $this->input->post("first_name"),
                "last_name" => $this->input->post("last_name"),
                "image" => $this->upload_image()
            );

            $this->load->model("crud_model");
            $this->crud_model->insert_crud($insert_data);
            echo "Data Inserted";
        }
    }

    public function upload_image(){
        if(isset($_FILES["user_image"])){
            $extension = explode(".", $_FILES["user_image"]["name"]);
            $new_name = rand() . "." . $extension[1];
            $destination = "./upload/" . $new_name;
            move_uploaded_file($_FILES["user_image"]["tmp_name"], $destination);
            return $new_name;
        }
    }
}
