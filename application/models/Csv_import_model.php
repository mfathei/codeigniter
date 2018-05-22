<?php

class Csv_import_model extends CI_Model
{

    private $table = "tbl_city";

    public function select()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get($this->table);
        return $query;
    }

    public function insert($data)
    {
        $this->db->insert_batch($this->table, $data);
    }
}
