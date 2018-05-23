<?php

class Excel_import_model extends CI_Model
{
    private $table = "tbl_city";

    public function select()
    {
        $query = $this->db->get($this->table);
        return $query;
    }

    public function insert($data)
    {
        $this->db->insert_batch($this->table, $data);
    }
}
