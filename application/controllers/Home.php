<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Data UMKM Kota Batam';
        $this->load->view('users/template/auth_header', $data);
        $this->load->view('users/template/nav');
        $this->load->view('users/home');
        $this->load->view('users/template/auth_footer');
    }
}
