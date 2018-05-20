<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        $this->load->model("main_model");
        $data["fetch_data"] = $this->main_model->fetch_data();
        $this->load->view("main_view", $data);
    }

    public function form_validation()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("first_name", "First Name", "required|alpha");
        $this->form_validation->set_rules("last_name", "Last Name", "required|alpha");

        if ($this->form_validation->run()) {
            $this->load->model("main_model");
            $data = array(
                "first_name" => $this->input->post("first_name"),
                "last_name"  => $this->input->post("last_name"),
            );

            if ($this->input->post("update")) {
                $id = $this->input->post("hidden_id");
                $this->main_model->update_data($data, $id);
                redirect(base_url() . "main/updated");
            } else if ($this->input->post("insert")) {
                $this->main_model->insert_data($data);
                redirect(base_url() . "main/inserted");
            }

        } else {
            $this->index();
        }
    }

    public function inserted()
    {
        $this->index();
    }

    public function delete_data()
    {
        $id = $this->uri->segment(3);
        $this->load->model("main_model");
        $this->main_model->delete_data($id);

        redirect(base_url() . "main/deleted");
    }

    public function deleted()
    {
        $this->index();
    }

    public function update_data()
    {
        $id = $this->uri->segment(3);
        $this->load->model("main_model");
        $data["single_data"] = $this->main_model->fetch_single_data($id);
        $data["fetch_data"]  = $this->main_model->fetch_data();
        $this->load->view("main_view", $data);
    }

    public function updated()
    {
        $this->index();
    }

    public function login()
    {
        $data["title"] = "Simple login in CodeIgniter and session";
        $this->load->view("login", $data);
    }

    public function login_validation()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");

        if ($this->form_validation->run()) {
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $this->load->model("main_model");
            $query = $this->main_model->can_login($username, $password);
            if ($query->num_rows() > 0) {
                $session_data = array(
                    "username" => $username,
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . "main/enter");
            } else {
                $this->session->set_flashdata("error", "Invalid username and/or password");
                redirect(base_url() . "main/login");
            }
        } else {
            $this->login();
        }
    }

    public function enter()
    {
        if ($this->session->userdata("username") !== '') {
            echo '<h3>Welcome - ' . $this->session->userdata("username") . '</h3>';
            echo '<a href="' . base_url() . 'main/logout">Logout</a>';
        } else {
            redirect(base_url() . "main/login");
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("username");
        redirect(base_url() . "main/login");
    }
}
