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

    public function update_data($data, $id){
        $this->db->where("id", $id);
        $this->db->update("tbl_user", $data);
    }

    public function fetch_single_data($id){
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_user");
        return $query;
    }

    public function can_login($username, $password){
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $query = $this->db->get("users");
        return $query;
    }

    public function insert_image($data){
        $this->db->insert("tbl_images", $data);
    }

    public function fetch_images(){
        $this->db->select("name");
        $this->db->from("tbl_images");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

}
