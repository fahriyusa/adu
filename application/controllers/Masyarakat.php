<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    
    if ($this->session->userdata('role') != 'm') {
      redirect('Auth/login');
    }
  }

  public function index()
  {
    $data['title'] = 'Dashboard | Aduan';
    $data['header'] = 'Dashboard | Aduan';
        // $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
    $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('home');
    $this->load->view('layout/footer');
  }

  public function Aduan()
  {
    $data['title'] = 'Ajukan | Aduan';
    $data['header'] = 'Dashboard | Aduan';
    $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('aduan');
    $this->load->view('layout/footer');
  }
  public function AduanSaya()
  {
    $data['aduan'] = $this->db->get_where('aduan', ['nik' => $this->session->userdata('nik')])->result_array();
    $data['title'] = 'Aduan Saya | Aduan';
    $data['header'] = 'Dashboard | Aduan';
    $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('aduan_saya',$data);
    $this->load->view('layout/footer');
  }

  public function Respon()
  {
    $this->load->model('M_admin');
    $data['header'] = 'Dashboard | Aduan';
    $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Tanggapan | ladukat';
    $data['get'] = $this->db->get_where('tanggapan', ['nik' => $this->session->userdata('nik')])->result_array();
    $data['join'] = $this->M_admin->ambil();
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('respon',$data);
    $this->load->view('layout/footer');
  
  }
}