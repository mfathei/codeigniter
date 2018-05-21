<?php

class Upload_multiple extends CI_Controller {
    public function index(){
        $this->load->view("upload_multiple");
    }

    public function upload(){
        if($_FILES["files"]["name"] != ''){
            $output = '';
            $config["upload_path"] = __DIR__ ."/../../upload/";
            $config["allowed_types"] = "jpg|jpeg|png|gif";
            $this->load->library("upload", $config);
            $this->upload->initialize($config);
            for($count = 0; $count < count($_FILES["files"]["name"]); $count++){
                $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
                $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
                $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
                $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
                $result = $this->upload->do_upload('file');
                // var_dump($result);
                if($result){
                    $data = $this->upload->data();
                    $output .= '<div class="col-md-3"><img src="'. base_url() . 'upload/' . $data["file_name"].'" class="img-responsive img-thumbnail"/></div>';
                }
            }

            echo $output;
        }
    }
}

