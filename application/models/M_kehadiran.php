<?php

class M_kehadiran extends CI_Model
{
    public function tambahKehadiran($data)
    {
        $this->db->insert('tb_kehadiran', $data);
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

    public function updateKehadiran($id, $kodeIbadah){
        date_default_timezone_set('Asia/Jakarta');
        $time = date('H:i:s');
        return $this->db->query("UPDATE tb_kehadiran SET time = '".$time."', status = 'HADIR' WHERE id = '".$id."' AND kodeIbadah = '".$kodeIbadah."'");
    }

    public function hapusKehadiran($id, $kodeIbadah){
        $this->db->delete('tb_kehadiran', ['id' => "$id", 'kodeIbadah' => "$kodeIbadah"]);
    }
}