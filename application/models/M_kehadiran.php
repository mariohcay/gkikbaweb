<?php

class M_kehadiran extends CI_Model
{
    public function tambahKehadiran($data)
    {
        $this->db->insert('tb_kehadiran', $data);
    }

    public function semuaKehadiran($kodeIbadah){
        return $this->db->get_where('tb_kehadiran', ['kodeIbadah' => $kodeIbadah])->result_array();
    }
    
    public function jemaatTerdaftar($kodeIbadah){
        return $this->db->get_where('tb_kehadiran', ['status' => "TERDAFTAR", 'kodeIbadah' => $kodeIbadah])->result_array();
    }

    public function jemaatHadir($kodeIbadah){
        return $this->db->get_where('tb_kehadiran', ['status' => "HADIR", 'kodeIbadah' => $kodeIbadah])->result_array();
    }

    public function cekStatusKehadiran($id, $kodeIbadah){
        return $this->db->get_where('tb_kehadiran', ['id' => $id, 'kodeIbadah' => $kodeIbadah])->row_array();
    }

    public function cekKuota($kodeIbadah)
    {
        return count($this->db->get_where('tb_kehadiran', ['kodeIbadah' => $kodeIbadah])->result_array());
    }

    // public function cekJemaatTerdaftar($kodeIbadah, $name, $tanggalLahir, $lingkungan)
    // {
    //     $nama = explode(" ", $name);
    //     $result = 0;
    //     foreach ($nama as $nm){
    //         $cek = $this->db->query("SELECT * FROM tb_kehadiran WHERE kodeIbadah = '".$kodeIbadah."' AND nama LIKE '%".$nm."%' AND tanggalLahir = '".$tanggalLahir."' AND lingkungan = '".$lingkungan."'")->row_array();
    //         if(!empty($cek)){
    //             $result += 1;
    //         }
    //     } 
    //     return $result;
    // }

    public function updateKehadiran($id, $kodeIbadah){
        date_default_timezone_set('Asia/Jakarta');
        $time = date('H:i:s');
        return $this->db->query("UPDATE tb_kehadiran SET timeHadir = '".$time."', status = 'HADIR' WHERE id = '".$id."' AND kodeIbadah = '".$kodeIbadah."'");
    }

    public function hapusKehadiran($id, $kodeIbadah){
        $this->db->delete('tb_kehadiran', ['kodeIbadah' => $kodeIbadah, 'id' => $id]);
    }

    public function setTidakHadir()
    {
        $this->db->set('status', "TIDAK HADIR")->where('status', 'TERDAFTAR')->update('tb_kehadiran');
    }
}