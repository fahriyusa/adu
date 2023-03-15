<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    if (($this->session->userdata('role') != 'p') && ($this->session->userdata('role') != 'a')) {
      redirect('Auth/login');
    }
    
  }

  public function index()
  {
    $data['title'] = 'Dashboard | Ladukat';
    $data['header'] = 'Selamat datang Di Dashboard Aduan Masyarakat';
    $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
    // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('home');
    $this->load->view('layout/footer');
  }
  public function Aduan_masuk()
  {
    $data['title'] = 'Aduan Masuk | Ladukat';
    $data['header'] = 'Data Aduan Masuk';
    $data['su_table'] = $this->M_admin->data_aduan();
    $data['get_aduan'] = $this->db->get_where('aduan', ['status' => '0'])->result_array();
    $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
    // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('admin/aduan_masuk',$data);
    $this->load->view('layout/footer');
  }
 public function detail()
 {
    $id_aduan = $this->uri->segment(3);
    $data['detail'] = $this->db->get_where('aduan',['id_aduan' => $id_aduan] )->row_array();
    $data['title'] = 'Tanggapi Aduan | Ladukat';
    $data['header'] = 'Tanggapi Aduan Masyarakat';
    $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
    // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('admin/detail',$data);
    $this->load->view('layout/footer');
 }

 public function Tanggapi()
 {
    $petugas = $this->db->get_where('petugas' ,['username' => $this->session->userdata('username')])->row_array();
    $insert = [
        'id_aduan' => $this->input->post('id_aduan'),
        'tgl_tanggapan' => date('Y-m-d'),
        'tanggapan' => $this->input->post('tanggapan'),
        'nik' => $this->input->post('nik'),
        'id_petugas' => $petugas['id']
    ];

    if ($this->db->insert('tanggapan', $insert)) {
        $id = $this->input->post('id_aduan');
        $update = $this->input->post('status');
        $this->db->set('status', $update)->where('id_aduan',$id)->update('aduan');
    
    $this->session->set_flashdata('pesan', '<div class="alert alert-success">
    <i class="bi bi-check-circle"></i> data berhasil di tanggapi.
  </div>');
    redirect('Admin/Selesai','refresh');
    }
 }

 public function Selesai()
 {
    $data['title'] = 'Selesaikan Aduan | Ladukat';
    $data['header'] = 'Selesaikan Proses Aduan Masyarakat';
    $data['su_table'] = $this->M_admin->data_selesai();
    $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
    // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('admin/selesai',$data);
    $this->load->view('layout/footer');
  }

  public function End()
  {
    $data['title'] = 'Aduan Selesai | Ladukat';
    $data['header'] = 'Data Aduan Terselesaikan';
    $data['su_table'] = $this->M_admin->end();
    $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
    // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('admin/end',$data);
    $this->load->view('layout/footer');
  }
  public function selesaikan()
  {
    $id = $this->input->post('id_aduan');
    $status = 's';
    $this->db->set('status',$status)->where('id_aduan', $id)->update('aduan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success">
    <i class="bi bi-check-circle"></i> data berhasil di Diselesaikan.
     </div>');
    
    redirect('Admin/End','refresh');
    
  }

  public function Data_petugas()
  {
      $data['title'] = 'Data Petugas | Ladukat';
      $data['header'] = 'Data Admin & Petugas';
      $data['su_table'] = $this->db->get('petugas')->result_array();
      $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
      // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
      $this->load->view('layout/header',$data);
      $this->load->view('layout/sidebar');
      $this->load->view('layout/navbar',$data);
      $this->load->view('admin/petugas',$data);
      $this->load->view('layout/footer');
   }
  public function Data_masyarakat()
  {
      $data['title'] = 'Data Masayarakat | Ladukat';
      $data['header'] = 'Data masyarakat';
      $data['su_table'] = $this->db->get('masyarakat')->result_array();
      $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
      // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
      $this->load->view('layout/header',$data);
      $this->load->view('layout/sidebar');
      $this->load->view('layout/navbar',$data);
      $this->load->view('admin/masyarakat',$data);
      $this->load->view('layout/footer');
   }

    public function add_petugas()
    { 
      $data = [

        'nama_petugas' => $this->input->post('nama_petugas'),
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'tlp' => $this->input->post('tlp'),
        'role' => $this->input->post('role'),
      ];
      // var_dump($data);die;
      
     $this->db->insert('petugas', $data);
     
     $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
     Data Berhasil Ditabahkan.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>');
     redirect('Admin/Data_petugas','refresh');
     
    }

    public function hapus_masyarakat()
    {
      $id = $this->uri->segment(3);
      
      $this->db->where('nik',$id);  
      $this->db->delete('masyarakat');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
      <i class="bi bi-check-circle"></i> data berhasil Dihapus
       </div>');
      redirect('Admin/Data_masyarakat');
    }
    public function hapus_petugas()
    {
      $id = $this->uri->segment(3);
      
      $this->db->where('id',$id);  
      $this->db->delete('petugas');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
      <i class="bi bi-check-circle"></i> data berhasil Dihapus
       </div>');
      redirect('Admin/Data_petugas');  
    }

    public function Laporan()
    {
      $data['title'] = 'Laporan | Ladukat';
    $data['header'] = 'Data Aduan Ditanggapi';
    $data['join'] = $this->M_admin->Laporan();
    $data['get_aduan'] = $this->db->get_where('aduan', ['status' => '0'])->result_array();
    $data['data'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();;
    // $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();;
    $this->load->view('layout/header',$data);
    // $this->load->view('layout/sidebar');
    // $this->load->view('layout/navbar',$data);
    $this->load->view('admin/laporan',$data);
    $this->load->view('layout/footer');
    }
  } 