<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth018_model extends CI_Model {

    public function getuser($username)
    {
        $this->db->where('username_018',$username);
        return $this->db->get('users018')->row();
    }

    public function changepass()
    {
        $this->db->set('password_018', password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT));
        $this->db->where('username_018', $this->session->userdata('username'));
        return $this->db->update('users018');
    }

    public function changephoto($photo)
    {
        if($this->session->userdata('photo'))
        unlink('./uploads/users/' . $this->session->userdata('photo'));

        $this->db->set('photo_018', $photo);
        $this->db->where('username_018',$this->session->userdata('username'));
        return $this->db->update('users018');
    }
}