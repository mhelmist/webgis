<?php

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci ->load->model('m_login');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_login->login($username, $password);
        if ($cek) {
            $nama = $cek->nama;
            $username = $cek->username;

            //session
            $this->ci->session->set_userdata('nama', $nama);
            $this->ci->session->set_userdata('username', $username);
            //jika benar maka langsung ke home
            redirect('home');

        }else{
            //jika salah maka kembali ke login
            $this->ci->session->set_flashdata('pesan', 'username atau password salah');
            redirect('login');
        }
        }

    public function cek_login()
    {
        //apabila pass kosong maka kembali ke login
        if ($this->ci->session->userdata('username')=='') { 
            $this->ci->session->set_flashdata('pesan', 'Anda belum login');
            redirect('login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->unset_userdata('username');
        $this->ci->session->set_flashdata('pesan', 'Anda berhasil logout');
        redirect('login');
    }
}

/* End of file User_login.php */
