<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

    public function index()
    {

        $data['title'] = 'Kontak Umkm Batam';
        $this->load->view('users/template/auth_header', $data);
        $this->load->view('users/template/nav');
        $this->load->view('users/kontak');
        $this->load->view('users/template/auth_footer');
    }
}
