<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediction extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Prediction';
        $this->template->load('template/template', 'prediction', $data);
    }
}
