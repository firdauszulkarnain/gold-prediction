<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['status'] = $this->Data_Model->status();
        $hasil = $this->Data_Model->prediksi();
        $prediksi = [];
        foreach ($hasil as $row) {
            $nilai = str_replace(",", ".", $row->hasil_prediksi);
            $number = (float) $nilai;
            $prediksi[] = $number;
        }
        $data['prediksi'] = $prediksi;
        $this->template->load('template/template', 'dashboard', $data);
    }
}
