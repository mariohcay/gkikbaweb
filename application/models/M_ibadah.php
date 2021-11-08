<?php

class M_ibadah extends CI_Model
{
    public function daftarIbadah()
    {
        return $this->db->get('tb_ibadah')->result_array();
    }

    public function daftarIbadahMingguIni()
    {
        return $this->db->query('SELECT * FROM tb_ibadah WHERE tanggalIbadah > CURDATE()')->result_array();
    }

    public function daftarIbadahSelesai()
    {
        return $this->db->query('SELECT * FROM tb_ibadah WHERE tanggalIbadah <= CURDATE() ORDER BY tanggalIbadah DESC')->result_array();
    }

    public function ambilIbadah($kodeIbadah)
    {
        return $this->db->get_where('tb_ibadah', ['kodeIbadah' => $kodeIbadah])->row_array();
    }

    public function updateKuota($kodeIbadah)
    {
        $this->db->set('terisi', 'terisi+1', FALSE)->where('kodeIbadah', $kodeIbadah)->update('tb_ibadah');
    }

    public function tambahIbadah($data){
        $this->db->insert('tb_ibadah', $data);
    }

    public function updateIbadah($kodeIbadah, $data)
    {
        $this->db->set($data)->where('kodeIbadah', $kodeIbadah)->update('tb_ibadah');
    }
}