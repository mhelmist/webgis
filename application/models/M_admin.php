<?php

class M_admin extends CI_Model {

    public function tampil () 
    
    {
        $this->db->select('*');
        $this->db->from('dataadmin');
        $this->db->order_by('id');
        return $this->db->get()->result();
             
        
    }

    public function simpan($data)
    {
        $this->db->insert('dataadmin', $data);
        
    }
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('dataadmin');
        $this->db->where('id', $id);
        
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('dataadmin', $data);
        
    }
    public function hapus($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('dataadmin', $data);
    }
}

/* End of file ModelName.php */
