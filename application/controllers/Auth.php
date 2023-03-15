<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }
  public function login()
  {
    $this->form_validation->set_rules('username', 'username', 'required|trim'); 
    $this->form_validation->set_rules('password', 'password', 'required|trim'); 
    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Masuk | Aduan';
      $this->load->view('Auth/login', $data);
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $masyarakat = $this->db->get_where('masyarakat', ['username'=> $username ])->row_array();
      if ($masyarakat && password_verify($password, $masyarakat['password'])) {
        $session = [
          'role' => 'm',
          'nama' => $masyarakat['nama'],
          'username' => $masyarakat['username'],
          'nik' => $masyarakat['nik'],
          'cuy' => true
        ];
        $this->session->set_userdata($session);
        redirect('Masyarakat');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">Username Atau Password Anda Salah. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Auth/login');
      } 
    }
  }

  public function Admin()
  {
    $this->form_validation->set_rules('username', 'username', 'required|trim'); 
    $this->form_validation->set_rules('password', 'password', 'required|trim'); 
    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Masuk | Aduan';
      $this->load->view('Auth/admin/login', $data);
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $petugas = $this->db->get_where('petugas', ['username'=> $username ])->row_array();
      if ($petugas && password_verify($password, $petugas['password'])) {
        $session = [
          'nama' => $petugas['nama_petugas'],
          'username' => $petugas['username'],
          'id' => $petugas['id'],
          'role' => $petugas['role'],
          'cuy' => true
        ];
        $this->session->set_userdata($session);
        redirect('Admin');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
        Username Atau Password Anda Salah.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
        redirect('Auth/Admin');
        
      }
      
    }
  }
  
  public function Daftar()
  {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required|is_unique[masyarakat.nik]');
    $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[masyarakat.username]');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('tlp', 'nik', 'trim|required|is_unique[masyarakat.tlp]');
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Daftar | Aduan Masyarakat';
      $this->load->view('auth/register',$data);
    } else {
      $data = [
        'nik' => $this->input->post('nik'),
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
        'tlp' => $this->input->post('tlp'),
      ];
      $this->db->insert('masyarakat', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
      Selamat Data Anda Sudah Terdaftar.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>');
      redirect('Auth/login');
    } 
  }

  public function logout()
  { 
    
    $this->session->sess_destroy();
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
    Anda Telah Logout.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>');
    // $this->session->unset_userdata();
    redirect('Auth/login');    
  }
}
