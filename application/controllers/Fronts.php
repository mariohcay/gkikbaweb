<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fronts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pesan');
    }

    public function index()
    {
        $data['title'] = "GKI Kebonagung";
        $this->load->view('Front/vLandingpage', $data);
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
