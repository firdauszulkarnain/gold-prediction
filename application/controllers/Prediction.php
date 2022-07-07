<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Prediction extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Prediction';
        $x1 = (int) $this->input->post('x1');
        $x2 = (int) $this->input->post('x2');

        if ($x1 != NULL && $x2 !== NULL) {
            $data['prediction'] = $this->Data_Model->data_prediksi();
        } else {
            $data['prediction'] = NULL;
        }

        $this->template->load('template/template', 'prediction', $data);
    }


    public function cetak()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Prediksi Hari');
        $sheet->setCellValue('C1', 'Harga Emas');

        $prediction = $this->Data_Model->data_prediksi();
        $prediksi = [];
        for ($i = 0; $i < count($prediction); $i++) {
            $nilai = str_replace(".", ",", $prediction[$i]);
            $isi = (string) $nilai;
            $prediksi[] = $isi;
        }
        $no = 1;
        $hari = 1;
        $x = 2;
        for ($i = 0; $i < count($prediksi); $i++) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, 'Prediksi Hari ' . $hari);
            $sheet->setCellValue('C' . $x, $prediksi[$i]);
            $x++;
            $hari++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_Prediksi_Harga_Emas';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
