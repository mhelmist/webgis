<?php

class Upload extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model('m_peta');
    
    }
    public function index()
    {
        $this->load->view('v_input_petazonasi');
    }
    public function geojson()
    {
        $data = array(
            'title' => 'Peta Zonasi',
            
            'isi' => 'v_geojson'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        
    }
    public function input() 
    {
        $this->user_login->cek_login();
        

        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('peta', 'Peta Zonasi', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('warna', 'Warna Peta', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Peta',
                'isi' => 'v_input_petazonasi' );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }else{
        $config['upload_path']          = './geojson/';
        $config['allowed_types']        = 'geojson';
                

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('peta'))
        {
         echo "gagal";
        }else{
              $peta = $this->upload->data();
              $peta = $peta['file_name'];
              $id = $this->input->post('id');
              $nama = $this->input->post('nama_sekolah');
              $warna = $this->input->post('warna');

              $data = array (
                'id' => $id,
                'nama_sekolah' => $nama,
                'peta' => $peta,
                'warna' => $warna,
              );
              $this->db->insert('peta', $data);
              $this->session->set_flashdata('pesan', 'Data berhasil ditambah');
              redirect('Upload');
                }
            }
    }
    
}

/* End of file Upload.php */

