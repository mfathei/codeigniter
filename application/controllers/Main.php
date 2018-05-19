<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        $this->load->model("main_model");
        $data["model_text"] = $this->main_model->test_main();
        $data["title"] = "controller text";
        $data["test1"] = "another controller text";
        $this->load->view("main_view", $data);
    }

    public function test1(){
        echo 'test one output ';
    }
}
