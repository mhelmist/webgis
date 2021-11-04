<?php

class M_sekolah extends CI_Model {

    public function simpan($data)
    {
        $this->db->insert('datasekolah', $data);
           
    }

    public function tampil() 
    
    {
        $this->db->select('*');
        $this->db->from('datasekolah');
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('datasekolah');
        $this->db->where('id', $id);
        
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('datasekolah', $data);
        
    }
    public function hapus($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('datasekolah', $data);
    }
    
}

/* End of file M_sekolah.php */
