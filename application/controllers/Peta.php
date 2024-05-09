<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Peta UMKM Batam';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $umkm = $this->db->get('umkmbatam')->result_array();
        // Ubah data UMKM menjadi format JSON
        $data['umkm_json'] = json_encode($umkm);
        $this->load->view('users/template/auth_header', $data);
        $this->load->view('users/template/nav');
        $this->load->view('users/peta', $data);
        $this->load->view('users/template/auth_footer', $data);
    }
}
