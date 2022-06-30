<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Emas extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Harga Emas';
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

    public function cetak()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Harga Emas');

        $siswa = $this->db->get('tbl_gold')->result();
        $no = 1;
        $x = 2;
        foreach ($siswa as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->date);
            $sheet->setCellValue('C' . $x, $row->price);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_Harga_Emas';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
