<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emas extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->template->load('template/template', 'emas', $data);
    }


    function get_data_gold()
    {
        $list = $this->Emas_Model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->date;
            $row[] = $field->price;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Emas_Model->count_all(),
            "recordsFiltered" => $this->Emas_Model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
