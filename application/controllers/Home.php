<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
 
    parent::__construct();
    if (($this->session->userdata('role') != 'p') && ($this->session->userdata('role') != 'a')) {
      redirect('Auth/login');
    }
  }

  public function index()
  {
    $data['title'] = 'Admin | Aduan';
    $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
    // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('home');
    $this->load->view('layout/footer');
  }
 
}