<?php

class Ajaxsearch_model extends CI_Model
{

    private $table = "city";

    public function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        if ($query != "") {
            $this->db->like("country", $query);
            $this->db->or_like("province", $query);
            $this->db->or_like("city", $query);
        }
        $this->db->order_by("id", "desc");
        return $this->db->get();
    }

}
