<?php

class Ajax_pagination_model extends CI_Model
{

    private $table = "city";

    public function count_all()
    {
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function fetch_details($limit, $start)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->order_by("city", "asc");
        $this->db->limit($limit, $start);
        $query  = $this->db->get();
        $output = '<table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Country</th>
                <th>Province</th>
                <th>City</th>
            </tr>
        ';
        foreach ($query->result() as $row) {
            $output .= '
                <tr>
                    <td>' . $row->id . '</td>
                    <td>' . $row->country . '</td>
                    <td>' . $row->province . '</td>
                    <td>' . $row->city . '</td>
                </tr>
            ';
        }

        $output .= '</table>';
        return $output;
    }
}
