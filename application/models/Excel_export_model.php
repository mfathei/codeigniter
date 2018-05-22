<?php

class Excel_export_model extends CI_Model
{
    private $table = "city";

    public function fetch_all(){
        $this->db->order_by("id", "desc");
        $query = $this->db->get($this->table);
        return $query->result();
    }

}
