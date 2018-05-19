<?php

class Main_model extends CI_Model
{

    public function test_main()
    {
        return "test main model";
    }

    public function insert_data($data)
    {
        $this->db->insert("tbl_user", $data);
    }
}
