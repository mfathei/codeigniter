<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        $this->load->model("main_model");
        echo $this->main_model->test_main();
    }

    public function test1(){
        echo 'test one output ';
    }
}
