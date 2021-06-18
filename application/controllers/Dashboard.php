<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title']        = "Beranda";
        $data['user']         = $this->admin->count('user');
        $data['project']      = $this->admin->count('project');
        $data['progress']     = $this->admin->count('progress');

        if ($data['user']->row()->role == "admin", "user") {
                    $this->load->view('admin/header', $data);
                    $this->load->view('admin/beranda', $data);
                    $this->load->view('admin/footer');
            }else{
                    $this->load->view('404_content');
            }
     }
}
