<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // Cek Session Login Admin
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        redirect('admin/dashboard');
    }

    public function dashboard()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Dashboard';
        $this->template->load('template/admin_template', 'admin/dashboard', $data);
    }

    public function emas()
    {
        $data['title'] = 'Data Harga Emas';
        $this->template->load('template/admin_template', 'admin/emas', $data);
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
            $row[] = '<a href="#" data-id="' . $field->id_gold . '"  data-date="' . $field->date . '" data-price="' . $field->price . '" data-toggle="modal" data-target="#updateModal" class="btn btn-sm btn-info text-light modal_update"><i class="fas fa-fw fa-edit"></i></a>';

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


    public function tambah_emas()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $this->Data_Model->tambah_emas();
        $this->session->set_flashdata('pesan', 'Tambah Data Harga Emas');
        redirect('admin/emas');
    }

    public function profile()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Profil Admin';
        $this->template->load('template/admin_template', 'admin/profile/index', $data);
    }

    public function ganti_password()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $admin_id = $data['admin']['id_admin'];
        $admin_password = $data['admin']['password'];
        $this->form_validation->set_rules(
            'old_password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Lama Tidak Boleh Kosong',
            ]
        );

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]|matches[password2]',
            [
                'required' => 'Password Baru Tidak Boleh Kosong',
                'matches' => 'Konfirmasi Password Tidak Sesuai',
                'min_length' => 'Minimal Password 6 Karakter'
            ]
        );

        $this->form_validation->set_rules('password2', 'Password', 'required|trim');
        $password = $this->input->post('old_password');
        if ($this->form_validation->run() == false) {
            redirect('admin/profile');
        } else {
            if (password_verify($password, $admin_password)) {
                $this->Auth_Model->update_password($admin_id);
                $this->session->set_flashdata('pesan', 'Update Password');
                redirect('admin/profile');
            } else {
                $this->session->set_flashdata('old_password', 'Password Lama Tidak Sesuai');
                redirect('admin/profile');
            }
        }
    }
}
