<?php

class Inventaris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_inventaris');
        $this->load->model('m_jemaat');
    }

    public function index()
    {
        $user = $this->session->userdata('username');
        if (_checkUser()) {
            $id = $this->session->userdata('id');
            $data['title'] = 'Inventaris - GKI Kebonagung Web Services';
            $data['inventaris'] = $this->m_inventaris->daftarInventaris();

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vInventaris');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function detailInventaris($kode)
    {
        if (_checkUser()) {
            $data['title'] = 'Detail Inventaris - GKI Kebonagung Web Services';
            $data['inventaris'] = $this->m_inventaris->ambilInventaris($kode);
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vDetailInventaris');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function tambahInventaris()
    {
        if (_checkUser()) {
            $data['title'] = 'Tambah Inventaris - GKI Kebonagung Web Services';
            $data['category'] = 'Tambah Inventaris';

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vTambahInventaris');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function DaftarIbadah($kodeIbadah)
    {
        if (_checkUser()) {
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
        if (_checkUser()) {
            $jemaat = $this->m_jemaat->ambilJemaatbyId($id);
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                'id' => $id,
                'nama' => $jemaat['nama'],
                'jenisKelamin' => $jemaat['jenisKelamin'],
                'lingkungan' => $jemaat['lingkungan'],
                'kodeIbadah' => $kodeIbadah,
                'status' => "TERDAFTAR",
                'timeDaftar' => date('Y-m-d H:i:s')
            ];
            $this->m_kehadiran->tambahKehadiran($data);
            redirect('Ibadah');
        }
    }

    public function lihatIbadah($kodeIbadah)
    {
        if (_checkUser()) {
            $data['title'] = 'Lihat Ibadah - GKI Kebonagung Web Services';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vLihatIbadah');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function renderQRCode($id)
    {
        $this->load->library('Ciqrcode');
        QRCode::png(
            $id,
            $outfile = FALSE,
            $level = QR_ECLEVEL_H,
            $size = 10,
            $margin = 2
        );
    }

    public function lihatQRCode($kodeIbadah)
    {
        if (_checkUser()) {
            $data['title'] = 'Lihat Ibadah - GKI Kebonagung Web Services';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $id = $this->session->userdata('id');
            $data['jemaat'] = $this->m_kehadiran->cekStatusKehadiran($id, $kodeIbadah);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Main/vLihatQRCode');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }
}
