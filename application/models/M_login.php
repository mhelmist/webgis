<?php
class M_login extends CI_Model {

    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('dataadmin');
        $this->db->where(array('username'=>$username, 'password'=>$password));
        return $this->db->get()->row();
               
    }

}

/* End of file M_login.php */
