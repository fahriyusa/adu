<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_admin extends CI_Model {
                        
public function data_aduan()
{
    $this->db->select('*');
    $this->db->from('aduan');
    $this->db->join('masyarakat', 'masyarakat.nik = aduan.nik', 'left');
    $this->db->where('status', '0');
    return $this->db->get()->result_array();
}
public function data_selesai()
{
    $this->db->select('*');
    $this->db->from('aduan');
    $this->db->join('masyarakat', 'masyarakat.nik = aduan.nik', 'left');
    $this->db->where('status', 'p');
    return $this->db->get()->result_array();
}
public function end()
{
    $this->db->select('*');
    $this->db->from('aduan');
    $this->db->join('masyarakat', 'masyarakat.nik = aduan.nik', 'left');
    $this->db->join('tanggapan', 'tanggapan.id_aduan = aduan.id_aduan', 'left');
    $this->db->join('Petugas', 'petugas.id = tanggapan.id_petugas', 'left');
    $this->db->where('status', 's');
    return $this->db->get()->result_array();
}
public function ambil()
{
    $this->db->select('*');
    $this->db->from('aduan');
    $this->db->join('masyarakat', 'masyarakat.nik = aduan.nik', 'left');
    $this->db->join('tanggapan', 'tanggapan.id_aduan = aduan.id_aduan', 'left');
    $this->db->join('Petugas', 'petugas.id = tanggapan.id_petugas', 'left');
    $this->db->where('status', 's');
    return $this->db->get()->result_array();
}
                        
public function Laporan()
{
    $this->db->select('*');
    $this->db->from('tanggapan');
    $this->db->join('masyarakat', 'masyarakat.nik = tanggapan.nik', 'left');
    $this->db->join('aduan', 'aduan.id_aduan = tanggapan.id_aduan', 'left');
    $this->db->join('Petugas', 'petugas.id = tanggapan.id_petugas', 'left');
    return $this->db->get()->result_array();
}       
                        
}
                        
/* End of file M_admin.php */
    
                        