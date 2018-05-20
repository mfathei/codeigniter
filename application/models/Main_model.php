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

    public function fetch_data()
    {
        // $query = $this->db->get("tbl_user");
        // $query = $this->db->query("select * from tbl_user order by id desc");
        $this->db->select("*");
        $this->db->from("tbl_user");
        $query = $this->db->get();
        return $query;
    }

    public function delete_data($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("tbl_user");
    }
}
