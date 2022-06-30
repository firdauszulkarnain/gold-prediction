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

    public function update_gold()
    {
        $id_gold = $this->input->post('id_gold');
        $data = [
            'price' => htmlspecialchars($this->input->post('price')),
        ];

        $this->db->where('id_gold', $id_gold);
        $this->db->update('tbl_gold', $data);
    }

    public function hapus_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }
}
