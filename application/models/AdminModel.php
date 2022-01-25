<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class AdminModel extends CI_Model
{

    public function admin_verification($data)
    {
        $this->db->select('*');
        $this->db->from('magasinier');
        $this->db->where($data);
        $info          = $this->db->get();
        return $result = $info->row();
    }
}