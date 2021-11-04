<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
    } 
    public function index()
    {
        
        $data = array(
            'title' => 'Data Sekolah',
            'sekolah' => $this->m_sekolah->tampil(),
            'isi' => 'v_tampildatasekolah'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    public function input ()
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('alamat', 'Alamat Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('jenis', 'Jenis Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('kepala_sekolah', 'Nama Kepala Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './geojson/';
            $config['allowed_types']        = 'json';
            
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('petageojson'))
            {
                $data = array(
                    'title' => 'Input Data Sekolah',
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_inputdatasekolah' );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                $petageojson = array('uploads'=>$this->upload->data());
                $config['peta_library'] = 'gd2';
                $config['source_peta'] = './geojson/'.$petageojson['uploads']['file_name'];
                $this->load->library('peta_library', $config);
                $data = array (
                    'namah' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'jenis' => $this->input->post('jenis'),
                    'kepala_sekolah' => $this->input->post('kepala_sekolah'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'keterangan' => $this->input->post('keterangan'),
                    'petageojson' => $petageojson['uploads']['file_name'],
                    'warna' => $this->input->post('warna'),
                );
            $this->m_sekolah->simpan($data);
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('sekolah/input');
            
          }
            
        }
        $data = array(
            'title' => 'Input Data Sekolah',
            
            'isi' => 'v_inputdatasekolah' );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    public function edit($id) 
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('alamat', 'Alamat Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('jenis', 'Jenis Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('kepala_sekolah', 'Nama Kepala Sekolah', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required',array(
            'required' => '%s Harus Diisi!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit Data Sekolah',
                'sekolah' => $this->m_sekolah->detail($id),
                'isi' => 'v_editdatasekolah' );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }else{

            $data = array (
                'id' => $id,
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'jenis' => $this->input->post('jenis'),
                'kepala_sekolah' => $this->input->post('kepala_sekolah'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->m_sekolah->edit($data);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('sekolah');
            
        }
    
    }
    public function hapus($id)
    {
        $this->user_login->cek_login();
        $data = array ('id' => $id);
        $this->m_sekolah->hapus($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('sekolah');
    }

}

/* End of file Sekolah.php */
