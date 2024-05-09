<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataumkm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        // Periksa peran pengguna sebelum akses
        $user_role = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['role_id'];
        if ($user_role != '1') {

            redirect('home'); // Ganti 'home' dengan halaman lain yang ingin Anda arahkan
        }
    }

    public function index()
    {
        $data['title'] = 'Add data UMKM Kota Batam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['umkm'] = $this->db->get('umkmbatam')->result_array();
        $dataumkm = $this->db->get('umkmbatam')->result_array();
        $data['umkmjson'] = json_encode($dataumkm);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required');
        $this->form_validation->set_rules('nama_usaha', 'nama_usaha', 'required');
        $this->form_validation->set_rules('alamat_usaha', 'alamat_usaha', 'required');
        $this->form_validation->set_rules('jenis_usaha', 'jenis_usaha', 'required');
        $this->form_validation->set_rules('bidang_usaha', 'bidang_usaha', 'required');
        $this->form_validation->set_rules('tahun_berdiri', 'tahun_berdiri', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longtitude', 'longtitude', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('users/template/auth_header');
            $this->load->view('users/template/nav');
            $this->load->view('admin/dataumkm', $data);
            $this->load->view('users/template/auth_footer', $data);
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'kecamatan' => $this->input->post('kecamatan'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'nama_usaha' => $this->input->post('nama_usaha'),
                'alamat_usaha' => $this->input->post('alamat_usaha'),
                'jenis_usaha' => $this->input->post('jenis_usaha'),
                'bidang_usaha' => $this->input->post('bidang_usaha'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'latitude' => $this->input->post('latitude'),
                'longtitude' => $this->input->post('longtitude'),
            );

            if (!$this->db->insert('umkmbatam', $data)) {
                // Duplicate entry error

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Dataumkm sudah ada. Silakan gunakan nama dataumkm yang lain.</div>');
                redirect('dataumkm');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New dataumkm Added!! </div>');
            redirect('dataumkm');
        }
    }

    public function editUmkm($id)
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('kecamatan');
        $nomorhp = $this->input->post('nomor_hp');
        $namausaha = $this->input->post('nama_usaha');
        $alamatusaha = $this->input->post('alamat_usaha');
        $jenisusaha = $this->input->post('jenis_usaha');
        $bidangusaha = $this->input->post('bidang_usaha');
        $tahunberdiri = $this->input->post('tahun_berdiri');
        $latitude = $this->input->post('latitude');
        $longtitude = $this->input->post('longtitude');

        $data = array(
            'nama' => $nama,
            'kecamatan' => $alamat,
            'nomor_hp' => $nomorhp,
            'nama_usaha' => $namausaha,
            'alamat_usaha' => $alamatusaha,
            'jenis_usaha' => $jenisusaha,
            'bidang_usaha' => $bidangusaha,
            'tahun_berdiri' => $tahunberdiri,
            'latitude' => $latitude,
            'longtitude' => $longtitude,
        );

        $this->db->where('id', $id);
        $this->db->update('umkmbatam', $data);

        // Set pesan sukses (flash message) jika diperlukan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data UMKM berhasil diupdate!</div>');

        // Redirect ke halaman yang sesuai, contohnya 'lapangan'
        redirect('dataumkm/');
    }

    public function deleteumkm($id)
    {
        // Menghapus data berdasarkan ID
        $this->db->delete('umkmbatam', array('id' => $id));

        // Set pesan sukses (flash message) jika diperlukan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">dataumkm berhasil dihapus!</div>');

        // Redirect ke halaman yang sesuai, contohnya 'content'
        redirect('dataumkm');
    }




    public function getEditLapanganById($id)
    {
        $data = $this->db->get_where('umkmbatam', array('id' => $id))->row_array();
        echo json_encode($data);
    }

    public function lapanganDetail($id)
    {
        $this->load->model('Lapangan_model');
        $lapangan['lapangan'] = $this->Lapangan_model->getLapanganById($id);
        $data['title'] = 'Lapangan Detail';
        $this->load->view('users/template/auth_header', $data);
        $this->load->view('users/template/nav');
        $this->load->view('users/lapangandetail', $lapangan);
        $this->load->view('users/template/auth_footer');
    }
}
