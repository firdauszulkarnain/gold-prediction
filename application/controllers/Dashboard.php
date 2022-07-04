<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $query = "SELECT harga_aktual, tahun FROM tbl_grafik GROUP BY tahun";
        $query2 = "SELECT hasil_prediksi, tahun FROM tbl_grafik GROUP BY tahun";
        $hasil = $this->db->query($query2)->result();
        $prediksi = [];
        foreach ($hasil as $row) {
            $nilai = str_replace(",", ".", $row->hasil_prediksi);
            $number = (float) $nilai;
            $prediksi[] = $number;
        }
        $data['prediksi'] = $prediksi;
        $data['status'] = $this->db->query($query)->result();
        $this->template->load('template/template', 'dashboard', $data);
    }
}
