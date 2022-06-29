<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'About';
        $this->template->load('template/template', 'about', $data);
    }
}
