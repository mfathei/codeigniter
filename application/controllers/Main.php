<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        echo 'test index function ';
        $this->test1();
    }

    public function test1(){
        echo 'test one output ';
    }
}
