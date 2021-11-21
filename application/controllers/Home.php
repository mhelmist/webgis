<?php
class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_sekolah');
    }
    public function index()
    {
        $data = array(
            'title' => 'Sebaran Sekolah di Kota Bogor',
            
            'isi' => 'v_home'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        
    }
    public function geojson()
    {
        $data = array(
            'title' => 'Peta Zonasi',
            'peta' => $this->m_home->all_data(),
            'isi' => 'v_geojson'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    
    
}

/* End of file Home.php */
