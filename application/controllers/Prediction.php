<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
}
