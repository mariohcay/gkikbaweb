<?php

class M_inventaris extends CI_Model
{
    public function daftarInventaris()
    {
        return $this->db->get('tb_inventaris')->result_array();
    }

    public function ambilInventaris($kode)
    {
        return $this->db->get_where('tb_inventaris', ['kode' => $kode])->row_array();
    }

    public function tambahIbadah($data){
        $this->db->insert('tb_ibadah', $data);
    }

    public function updateIbadah($kodeIbadah, $data)
    {
        $this->db->set($data)->where('kodeIbadah', $kodeIbadah)->update('tb_ibadah');
    }

}