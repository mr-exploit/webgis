<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

    public function index()
    {

        $data['total'] = $this->db->query('SELECT COUNT(*) AS totalumkm FROM umkmbatam')->row_array();
        $jumlahkecamatan = $this->db->query('
        SELECT COUNT(kecamatan) AS totalkecamatan, kecamatan 
        FROM umkmbatam
        GROUP BY kecamatan
        ORDER BY totalkecamatan ASC
        ')->result_array();

        $jumlahjenis = $this->db->query('
            SELECT COUNT(jenis_usaha) AS totaljenis, jenis_usaha 
            FROM umkmbatam
            GROUP BY jenis_usaha
            ORDER BY totaljenis ASC
        ')->result_array();


        $data['jumlahkecamatan'] = json_encode($jumlahkecamatan);
        $data['datajenisusaha'] = json_encode($jumlahjenis);

        $this->load->view('users/template/auth_header', $data);
        $this->load->view('users/template/nav');
        $this->load->view('users/informasi', $data);
        $this->load->view('users/template/auth_footer', $data);
    }
}
