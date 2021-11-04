<?php

class M_home extends CI_Model {

    public function all_data(){
        $this->db->select('*');
        $this->db->from('datasekolah');
        return $this->db->get()->result();
        
    }
    public function tampil(){
        $this->db->select('petageojson');
        $this->db->from('datasekolah');
        return $this->db->get()->result();
        
    }
}

/* End of file M_home.php */
