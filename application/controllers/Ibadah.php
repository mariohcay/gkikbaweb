<?php

class Ibadah extends CI_Controller
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
        $user = $this->session->userdata('username');
        if(_checkUser()){
            $id = $this->session->userdata('id');
            $data['title'] = 'Ibadah - GKI Kebonagung Web Services';
            $data['ibadah'] = $this->m_ibadah->daftarIbadahSelesai();
            $data['ibadahMingguIni'] = $this->m_ibadah->daftarIbadahMingguIni();
            $jemaat = $this->m_jemaat->ambilJemaat($user);
            $data['alamat'] = $jemaat['alamat'];
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vIbadah');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function DaftarIbadah($kodeIbadah)
    {
        if(_checkUser()){
            $data['title'] = 'Daftar Ibadah - GKI Kebonagung Web Services';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['terisi'] = $this->m_kehadiran->cekKuota($kodeIbadah);
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vDaftarIbadah');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function selesaiDaftar($id, $kodeIbadah)
    {
        if(_checkUser()){
            $data = [
                'id' => $id,
                'kodeIbadah' => $kodeIbadah,
                'status' => "TERDAFTAR"
            ];
            $this->m_kehadiran->tambahKehadiran($data);
            redirect('Ibadah');
        }
    }

    public function lihatIbadah($kodeIbadah)
    {
        if(_checkUser()){
            $data['title'] = 'Lihat Ibadah - GKI Kebonagung Web Services';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vLihatIbadah');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function renderQRCode()
    {
        if(_checkUser()){
            $this->load->library('Ciqrcode');
            QRCode::png(
                $this->session->userdata('id'),
                $outfile = FALSE,
                $level = QR_ECLEVEL_H,
                $size = 10,
                $margin = 2
            );
        }
    }

    public function lihatQRCode($kodeIbadah)
    {
        if(_checkUser()){
            $data['title'] = 'Lihat Ibadah - GKI Kebonagung Web Services';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vLihatQRCode');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }
}