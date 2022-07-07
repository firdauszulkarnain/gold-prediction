<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Model extends CI_Model
{
    public function tambah_emas()
    {
        $date = date("d/m/Y", strtotime($this->input->post('date')));
        $data = [
            'date' => $date,
            'price' => htmlspecialchars($this->input->post('price')),
        ];

        $this->db->insert('tbl_gold', $data);
    }

    public function update_emas()
    {
        $id_gold = $this->input->post('id_gold');
        $data = [
            'price' => htmlspecialchars($this->input->post('price')),
        ];
        $this->db->where('id_gold', $id_gold);
        $this->db->update('tbl_gold', $data);
    }

    public function hapus_emas($id_gold)
    {
        $this->db->where('id_gold', $id_gold);
        $this->db->delete('tbl_gold');
    }

    public function data_prediksi()
    {
        $x1 = (int) $this->input->post('x1');
        $x2 = (int) $this->input->post('x2');

        $y1 = -67.79294168  + (0.011552646 * $x1) + (0.991014375 * $x2);
        $y2 = -67.79294168  + (0.011552646 * $x2) + (0.991014375 * $y1);
        $y3 = -67.79294168  + (0.011552646 * $y1) + (0.991014375 * $y2);
        $y4 = -67.79294168  + (0.011552646 * $y2) + (0.991014375 * $y3);
        $y5 = -67.79294168  + (0.011552646 * $y3) + (0.991014375 * $y4);

        $data = [
            'y1' => round($y1, 5),
            'y2' => round($y2, 5),
            'y3' => round($y3, 5),
            'y4' => round($y4, 5),
            'y5' => round($y5, 5),
        ];
        return $data;
    }
}
