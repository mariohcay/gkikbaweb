<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fronts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pesan');
        $this->load->model('m_ibadah');
        $this->load->model('m_kehadiran');
    }

    public function index()
    {
        $data['title'] = "GKI Kebonagung";
        $this->load->view('Front/vLandingpage', $data);
    }

    public function pilihOnsite()
    {
        $data['ibadah'] = $this->m_ibadah->daftarIbadahMingguIni();
        $data['title'] = "Daftar Ibadah Onsite - GKI Kebonagung";
        $this->load->view('Front/vPilihOnsite', $data);
    }

    public function daftarOnsite($kodeIbadah)
    {
        $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
        $data['kodeIbadah'] = $kodeIbadah;
        $data['title'] = "Daftar Ibadah Onsite - GKI Kebonagung";
        $this->load->view('Front/vdaftarOnsite', $data);
    }

    public function submitDaftarOnsite($kodeIbadah){
        $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
        $data['title'] = "Daftar Ibadah Onsite - GKI Kebonagung";
        $date = new DateTime($this->input->post('tanggalLahir'));
        $result = $date->format('dmY');
        $id = "JM".(rand(1000, 9999)+(int)$result);
        $jemaat = [
            'id' => $id,
            'nama' => ucwords(strtolower($this->input->post('nama'))),
            'jenisKelamin' => $this->input->post('jk'),
            'lingkungan' => $this->input->post('lingkungan'),
            'kodeIbadah' => $kodeIbadah,
            'status' => "TERDAFTAR"
        ];
        $session = [
            'tanggalLahir' => $this->input->post('tanggalLahir'),
            'vaksin' => $this->input->post('vaksin')
        ];
        $birthDate = $this->input->post('tanggalLahir');
        $currentDate = date("d-m-Y");
        $age = date_diff(date_create($birthDate), date_create($currentDate))->y;
        if ($age < 13 || $age > 70) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Maaf Anda tidak bisa mengikuti ibadah <i>on-site</i> karena batasan usia 13-70 tahun </small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            $this->session->set_flashdata($jemaat);
            $this->session->set_flashdata($session);
            redirect('Fronts/daftarOnsite/'.$kodeIbadah);
        }
        if ($this->input->post('vaksin') == "Belum vaksin"){
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Maaf Anda tidak bisa mengikuti ibadah <i>on-site</i> karena belum mendapatkan vaksin </small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            $this->session->set_flashdata($jemaat);
            $this->session->set_flashdata($session);
            redirect('Fronts/daftarOnsite/'.$kodeIbadah);
        }
        $this->m_kehadiran->tambahKehadiran($jemaat);
        $data['jemaat'] = $jemaat;
        $this->load->view('Front/vLihatQRCodeOnsite', $data);
    }

    public function submitPesan()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'subyek' => $this->input->post('subyek'),
            'pesan' => $this->input->post('pesan')
        ];
        $this->m_pesan->submitPesan($data);
        echo "<script>
        alert('Terima kasih atas pesan yang telah disampaikan');
        window.location.href='" . base_url() . "Fronts';
        </script>";
    }
}
