<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
     
class Aduan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $masyarakat = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        if ($this->session->userdata('role') != 'm') {
          redirect('Auth/login');
        }

    }
  public function Ajukan()
{
  
  $this->form_validation->set_rules('judul', 'judul', 'trim|required');
  $this->form_validation->set_rules('foto', 'foto', 'required');
  $this->form_validation->set_rules('isi', 'isi', 'required');
  
  if ($this->form_validation->run() == FALSE) {
    $data['title'] = 'Ajukan Aduan | Aduan';
    $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('layout/header',$data);
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar',$data);
    $this->load->view('aduan');
    $this->load->view('layout/footer');
   
  } else {
    $config['upload_path'] = './assets/images/aduan';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_width']  = '1024';
    $config['max_height']  = '1024';
    
    $this->load->library('upload', $config);  
    if (!$this->upload->do_upload('foto')){
     
      
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">Gagal upload.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'.$this->upload->display_errors().'</div>');
      redirect('Masyarakat/Aduan');
      
  }else{
    $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    $data = ['foto' => $this->upload->data(),
              'judul' => $this->input->post('judul'),
             'isi' => $this->input->post('isi'),
             'nik' => $data['data']['nik'],
             'tgl' => date('Y-m-d'),
             'status' => '0',
  ];
  $this->db->insert('aduan', $data);
  $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">Gagal Berhasil.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
  
  redirect('Masyarakat/AduanSaya');
  
  }
  }
  
  
}
   public function Kirim()
   {
    
    $config['upload_path'] ='./assets/images/aduan';   
    $config['allowed_types'] = 'gif|jpg|png|pjpg';
    $config['max_size'] = 2048;
    // $this->upload->initialize($config);
    $this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('foto')){
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">Gagal upload.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'.$this->upload->display_errors().'</div>');
      
      redirect('Masyarakat/Aduan');
    }
    else{
      $data['data'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
      $data = [
        'nik' => $data['data']['nik'],
        'judul' => $this->input->post('judul'),
        'tgl' => date('Y-m-d'),
        'isi' => $this->input->post('isi'),
        'status' => '0',
        'foto' => $this->upload->data('file_name')];
      $this->db->insert('aduan', $data);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">Upload Sukses.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      redirect('Masyarakat/AduanSaya');
    }
    
   }
}
        
        
                            
