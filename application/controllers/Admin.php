<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_jemaat');
        $this->load->model('m_ibadah');
        $this->load->model('m_kehadiran');
	}

    public function index(){
        if(_checkUser()){
            $data['title'] = 'Admin Dashboard - GKI Kebonagung Web Services';
            $data['category'] = 'Dashboard';
            $data['jemaat'] = $this->m_jemaat->daftarJemaat();
            $data['ibadahMingguIni'] = $this->m_ibadah->daftarIbadahMingguIni();
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDashboard');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function daftarJemaat()
    {
        if(_checkUser()){
            $data['title'] = 'Daftar Jemaat - GKI Kebonagung Web Services';
            $data['category'] = 'Daftar Jemaat';
            $data['jemaat'] = $this->m_jemaat->daftarJemaat();
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDaftarJemaat');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function tambahJemaat(){
        if(_checkUser()){
            $data['title'] = 'Tambah Jemaat - GKI Kebonagung Web Services';
            $data['category'] = 'Tambah Jemaat';
            $data['id'] = "JM".strval(count($this->m_jemaat->daftarJemaat())+100001);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminTambahJemaat');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanTambahJemaat(){
        if(_checkUser()){
            $data = [
                'id' => $this->input->post('id'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'jenisKelamin' => $this->input->post('jenisKelamin'),
                'tempatLahir' => $this->input->post('tempatLahir'),
                'tanggalLahir' => $this->input->post('tanggalLahir'),
                'telepon' => $this->input->post('telepon'),
                'lingkungan' => $this->input->post('lingkungan')
            ];
            
            $this->m_jemaat->tambahJemaat($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> Data jemaat berhasil ditambahkan<i class="fa fa-check my-auto"></i></div>');
            redirect('Admin/daftarJemaat');
        }
    }

    public function detailJemaat($id){
        if(_checkUser()){
            $data['title'] = 'Daftar Jemaat - GKI Kebonagung Web Services';
            $data['category'] = 'Daftar Jemaat';
            $data['jemaat'] = $this->m_jemaat->ambilJemaatbyId($id);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDetailJemaat');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanUbahJemaat()
    {
        $user = $this->session->userdata('username');
        if(!$user){
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Anda masuk terlebih dahulu</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            redirect('Auth');
        }else{
            $id = $this->input->post('id');
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'jenisKelamin' => $this->input->post('jenisKelamin'),
                'tempatLahir' => $this->input->post('tempatLahir'),
                'tanggalLahir' => $this->input->post('tanggalLahir'),
                'telepon' => $this->input->post('telepon'),
                'lingkungan' => $this->input->post('lingkungan')
            ];
            
            $jemaat = $this->m_jemaat->ubahJemaat($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> Data jemaat berhasil diperbaharui<i class="fa fa-check my-auto"></i></div>');
            redirect('Admin/daftarJemaat');
        }
    }
    
    public function daftarIbadah(){
        if(_checkUser()){
            $data['title'] = 'Daftar Ibadah - GKI Kebonagung Web Services';
            $data['category'] = 'Daftar Ibadah';
            $data['ibadahMingguIni'] = $this->m_ibadah->daftarIbadahMingguIni();
            $data['ibadah'] = $this->m_ibadah->daftarIbadahSelesai();
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDaftarIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function tambahIbadah(){
        if(_checkUser()){
            $data['title'] = 'Tambah Ibadah - GKI Kebonagung Web Services';
            $data['category'] = 'Tambah Ibadah';

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminTambahIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanTambahIbadah(){
        if(_checkUser()){
            $tanggalIbadah = $this->input->post('tanggalIbadah');
            $jamIbadah = $this->input->post('jam').":".$this->input->post('menit').":00";
            $pecahkan = explode('-', $tanggalIbadah);
            $kodeIbadah = $pecahkan[2].$pecahkan[1].$pecahkan[0];

            $ibadah = [
                'kodeIbadah' => "IB".$kodeIbadah,
                'namaIbadah' => $this->input->post('namaIbadah'),
                'temaIbadah' => $this->input->post('temaIbadah'),
                'tanggalIbadah' => $tanggalIbadah,
                'jamIbadah' => $jamIbadah,
                'kuota' => $this->input->post('kuota'),
                'link' => $this->input->post('link'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            $config = [
                'upload_path' => './assets/img/thumbnail/',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => 1024,
                'file_name' => 'Thumbnail-'.tgl_indo($tanggalIbadah)
            ];

            $this->load->library('upload', $config);
            if(@$_FILES['image']['name'] != null){
                if($this->upload->do_upload('image')){
                    $ibadah['image'] = $this->upload->data('file_name');
                    $this->m_ibadah->tambahIbadah($ibadah);
                    $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Berhasil menambahkan Ibadah baru</small><i class="fa fa-check my-auto"></i></div>');
                    $this->daftarIbadah();
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>'.$error .'</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
                    $this->tambahIbadah();
                }
            }
        }
    }

    public function detailIbadah($kodeIbadah){
        if(_checkUser()){
            $data['title'] = 'Detail Ibadah - GKI Kebonagung Web Services';
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            if($data['ibadah']['tanggalIbadah'] < date('Y-m-d') && $data['ibadah']['status'] === "BUKA"){
                $this->m_ibadah->tutupDaftarOnsite($kodeIbadah);
            }
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDetailIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function scanQRCodeIbadah($kodeIbadah)
    {
        if(_checkUser()){
            $data['title'] = 'Scan QR Code Ibadah - GKI Kebonagung Web Services';
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['jemaat'] = $this->m_kehadiran->jemaatHadir($kodeIbadah);
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminScanQRCodeIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function ubahIbadah($kodeIbadah)
    {
        if(_checkUser()){
            $data['title'] = 'Ubah Ibadah - GKI Kebonagung Web Services';
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminUbahIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanUbahIbadah($kodeIbadah)
    {
        if(_checkUser()){
            $tanggalIbadah = $this->input->post('tanggalIbadah');
            $jamIbadah = $this->input->post('jam').":".$this->input->post('menit').":00";

            $ibadah = [
                'namaIbadah' => $this->input->post('namaIbadah'),
                'temaIbadah' => $this->input->post('temaIbadah'),
                'tanggalIbadah' => $tanggalIbadah,
                'jamIbadah' => $jamIbadah,
                'kuota' => $this->input->post('kuota'),
                'link' => $this->input->post('link'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            $this->m_ibadah->updateIbadah($kodeIbadah, $ibadah);
            $this->session->set_tempdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Berhasil mengubah data ibadah</small><i class="fa fa-check my-auto"></i></div>', 1);
            $this->ubahIbadah($kodeIbadah);
        }
    }

    public function tambahKehadiran($kodeIbadah)
    {
        if(_checkUser()){
            $id = $this->input->post('qrcode');
            $cek = $this->m_kehadiran->cekStatusKehadiran($id, $kodeIbadah);
            
            if(empty($cek)){
                $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Data tidak ditemukan, kemungkinan Anda belum melakukan pendaftaran</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
                $this->scanQRCodeIbadah($kodeIbadah);
            } else {
                if($cek['status'] === "HADIR"){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Anda sudah melakukan scan QR Code sebelumnya</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
                    $this->scanQRCodeIbadah($kodeIbadah);
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Terima kasih, selamat beribadah, Tuhan Yesus memberkati :)</small><i class="fa fa-check my-auto"></i></div>');
                $this->m_kehadiran->updateKehadiran($id, $kodeIbadah);
                $this->scanQRCodeIbadah($kodeIbadah);
            }
        }
    }

    public function jemaatTerdaftar($kodeIbadah)
    {
        if(_checkUser()){
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['title'] = 'Jemaat Terdaftar di '.$data['ibadah']['namaIbadah'].' - GKI Kebonagung Web Services';
            $data['jemaat'] = $this->m_kehadiran->jemaatTerdaftar($kodeIbadah);
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminJemaatTerdaftar');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function hapusJemaatTerdaftarOnsite($id, $kodeIbadah)
    {
        if(_checkUser()){
            $this->m_kehadiran->hapusKehadiran($id, $kodeIbadah);
            $nama = $this->m_jemaat->ambilJemaatbyId($id)['nama'];
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small><b>'.$nama.'</b> berhasil dihapus dari jemaat terdaftar</small><i class="fa fa-check my-auto"></i></div>');
            $this->jemaatTerdaftar($kodeIbadah);
        }
    }
    
    public function tutupDaftarOnsite($kodeIbadah)
    {
        if(_checkUser()){
            $this->m_ibadah->tutupDaftarOnsite($kodeIbadah);
            $namaIbadah = $this->m_ibadah->ambilIbadah($kodeIbadah)['namaIbadah'];
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Pendaftaran <b>'.$namaIbadah.'</b> telah ditutup</small><i class="fa fa-check my-auto"></i></div>');
            $this->daftarIbadah();
        }
    }

    public function daftarKehadiranOnsite($kodeIbadah)
    {
        if(_checkUser()){
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['title'] = 'Daftar Kehadiran Jemaat di '.$data['ibadah']['namaIbadah'].' - GKI Kebonagung Web Services';
            $data['jemaat'] = $this->m_kehadiran->semuaKehadiran($kodeIbadah);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDaftarKehadiranJemaat');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }
}