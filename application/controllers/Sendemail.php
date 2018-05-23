<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sendemail extends CI_Controller
{

    public function index()
    {
        $this->load->view("sendemail");
    }

    public function send()
    {

        $subject               = "Application for programmer registration By - " . $this->input->post("name");
        $programming_languages = implode(", ", $_POST["programming_languages"]);
        $file_data             = $this->upload_file();
        if (is_array($file_data)) {
            $message = '
            <h3 align="center">Programmer Details</h3>
            <table border="1" cellpadding="5" width="100%">
                <tr>
                    <td width="30%">Name</td>
                    <td width="70%">' . $this->input->post("name") . '</td>
                </tr>
                <tr>
                    <td width="30%">Address</td>
                    <td width="70%">' . $this->input->post("address") . '</td>
                </tr>
                <tr>
                    <td width="30%">Email Address</td>
                    <td width="70%">' . $this->input->post("email") . '</td>
                </tr>
                <tr>
                    <td width="30%">Programming Languages</td>
                    <td width="70%">' . $programming_languages . '</td>
                </tr>
                <tr>
                    <td width="30%">Experience Year</td>
                    <td width="70%">' . $this->input->post("experience") . '</td>
                </tr>
                <tr>
                    <td width="30%">Phone Number</td>
                    <td width="70%">' . $this->input->post("mobile") . '</td>
                </tr>
                <tr>
                    <td width="30%">Additional Information</td>
                    <td width="70%">' . $this->input->post("additional_information") . '</td>
                </tr>
            </table>
            ';

            $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'lekaa0000@gmail.com',
                'smtp_pass' => '',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1',
                'wordwrap'  => true,
            );
            $this->load->library("email");
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from($this->input->post("email"));
            $this->email->to("oracle.dev10g@gmail.com");
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->attach($file_data["full_path"]);
            if ($this->email->send()) {
                if (delete_files($file_data["full_path"])) {
                    $this->session->set_flashdata("message", "Application Sent");
                    redirect(base_url() . "sendemail");
                }
            } else {
                $this->session->set_flashdata("message", "Can't send email");
                redirect(base_url() . "sendemail");
            }
        } else {
            $this->session->set_flashdata("message", "There is an error in attached file");
        }
    }

    private function upload_file()
    {
        $config["upload_path"]   = "upload/";
        $config["allowed_types"] = "doc|docx|pdf";
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("resume")) {
            return $this->upload->data();
        } else {
            return $this->upload->display_errors();
        }
    }
}
