<?php

class M_jemaat extends CI_Model
{
    public function daftarJemaat()
    {
        return $this->db->get('tb_jemaat')->result_array();
    }

    public function lakiLaki()
    {
        return $this->db->get_where('jemaat', ['jk' => 'Laki-laki'])->result_array();
    }

    public function perempuan()
    {
        return $this->db->get_where('jemaat', ['jk' => 'Perempuan'])->result_array();
    }

    public function ambilJemaat($username)
    {
        return $this->db->get_where('tb_jemaat', ['username' => $username])->row_array();
    }

    public function tambahJemaat($data)
    {
        $this->db->insert('tb_jemaat', $data);
    }

    public function ubahJemaat($id, $data)
    {
        $this->db->where('id', $id)->update('tb_jemaat', $data);
    }

    public function hapusJemaat($noInduk)
    {
        $this->db->where('noinduk', $noInduk)->delete('jemaat');
    }

    public function ambilDataTerakhir()
    {
        return $this->db->query('SELECT * FROM jemaat ORDER BY noinduk DESC')->row_array();
    }
}