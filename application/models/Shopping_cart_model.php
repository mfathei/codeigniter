<?php

class Shopping_cart_model extends CI_Model
{
    private $table = "product";

    public function fetch_all()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
