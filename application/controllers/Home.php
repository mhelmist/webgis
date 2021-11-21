<?php
class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
        $this->load->model('m_home');
        $this->load->model('m_peta');
    }
    public function index()
    {
        $data = array(
            'title' => 'Pemetaan Sekolah',
            'sekolah' => $this->m_sekolah->tampil (),
            'isi' => 'v_pemetaan'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        
    }
    public function geojson()
    {
        $data = array(
            'title' => 'Peta Zonasi',
            'peta' => $this->m_peta->all_data(),
            'isi' => 'v_geojson'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    
}

/* End of file Home.php */
