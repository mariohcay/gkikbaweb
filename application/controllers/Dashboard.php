<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ibadah');
        $this->load->model('m_jemaat');
        $this->load->model('m_kehadiran');
    }

    public function index()
    {
        if (_checkUser()) {
            $user = $this->session->userdata('username');
            $data['title'] = 'Dashboard - GKI Kebonagung Web Services';
            $data['ibadahMingguIni'] = $this->m_ibadah->daftarIbadahMingguIni();
            $jemaat = $this->m_jemaat->ambilJemaat($user);
            $data['vaksin'] = $jemaat['vaksin'];
            $birthDate = $jemaat['tanggalLahir'];
            $currentDate = date("d-m-Y");
            $age = date_diff(date_create($birthDate), date_create($currentDate))->y;
            $data['age'] = $age;

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vDashboard');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }
}
