<?php

class Htmltopdf_model extends CI_Model
{
    private $table = "emp";

    public function fetch()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get($this->table);
        return $query;
    }

    public function fetch_single($id){
        $this->db->where("id", $id);
        $query = $this->db->get($this->table);
        return $query;
    }
}
