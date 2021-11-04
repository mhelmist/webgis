<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->user_login->cek_login();
    }
       public function index()
    {
        $data = array(
            'title' => 'Data Admin',
            'admin' => $this->m_admin->tampil(),
            'isi' => 'v_tampildataadmin'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    public function input()
    {
        $this->form_validation->set_rules('nama', 'Nama Admin', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('username', 'username', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('password', 'password', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Data Admin',
                'isi' => 'v_inputdataadmin' );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }else{

            $data = array (
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
                
            );
            $this->m_admin->simpan($data);
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('admin/input');
        }
    
    }
    public function edit($id)
        {
            $this->form_validation->set_rules('nama', 'Nama Admin', 'required',array(
                'required' => '%s Harus Diisi!!'
            ));

            $this->form_validation->set_rules('username', 'username', 'required',array(
                'required' => '%s Harus Diisi!!'
            ));

            $this->form_validation->set_rules('password', 'password', 'required',array(
                'required' => '%s Harus Diisi!!'
            ));

        
        
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Edit Data Admin',
                    'admin' => $this->m_admin->detail($id),
                    'isi' => 'v_editdataadmin' );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{

                $data = array (
                    'id' => $id,
                    'nama' => $this->input->post('nama'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password')
                    
                );
                $this->m_admin->edit($data);
                $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                redirect('admin');
            }
    
        
        }
        public function hapus($id)
        {
            $data = array ('id' => $id);
            $this->m_admin->hapus($data);
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('admin');
        }

}

/* End of file Admin.php */
