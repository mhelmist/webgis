<?php



class M_peta extends CI_Model {

    public function all_data(){
        $this->db->select('*');
        $this->db->from('peta');
        return $this->db->get()->result();
        
    }
    public function simpan($data)
    {
        $this->db->insert('peta', $data);
           
    }

}

/* End of file M_peta.php */
