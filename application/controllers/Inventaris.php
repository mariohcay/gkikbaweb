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

    public function simpanTambahInventaris()
    {
        if (_checkUser()) {

            $inventaris = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'serialNum' => $this->input->post('serialNum'),
                'tglBeli' => $this->input->post('tglBeli'),
                'tglBaru' => $this->input->post('tglBaru'),
                'jumlah' => $this->input->post('jumlah'),
                'kondisi' => $this->input->post('kondisi'),
                'tempatSimpan' => $this->input->post('tempatSimpan'),
                'harga' => $this->input->post('harga'),
                'milik' > $this->input->post('milik')
            ];

            $this->m_inventaris->tambahInventaris($inventaris);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Berhasil menambahkan Ibadah baru</small><i class="fa fa-check my-auto"></i></div>');
            redirect('Inventaris');

            // $config = [
            //     'upload_path' => './assets/img/thumbnail/',
            //     'allowed_types' => 'jpg|jpeg|png',
            //     'max_size' => 1024,
            //     'file_name' => 'Thumbnail-' . tgl_indo($tanggalIbadah)
            // ];

            // $this->load->library('upload', $config);
            // if (@$_FILES['image']['name'] != null) {
            //     if ($this->upload->do_upload('image')) {
            //         $ibadah['image'] = $this->upload->data('file_name');
            //         $this->m_ibadah->tambahIbadah($ibadah);
            //         $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Berhasil menambahkan Ibadah baru</small><i class="fa fa-check my-auto"></i></div>');
            //         $this->daftarIbadah();
            //     } else {
            //         $error = $this->upload->display_errors();
            //         $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>' . $error . '</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            //         $this->tambahIbadah();
            //     }
            // }
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
