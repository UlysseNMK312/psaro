<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class SliderModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function save_slider($data)
    {
        return $this->db->insert('slider', $data);
    }

    public function getAllSlider()
    {
        $this->db->select('*');
        $this->db->from('slider');
        $result = $this->db->get();
        return $result->result();
    }

    public function editSlider($id)
    {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('idSlider', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_slider($id)
    {
        $this->db->where('idSlider', $id);
        return $this->db->delete('slider');
    }

    public function update_slider($data, $id)
    {
        $this->db->where('idSlider', $id);
        return $this->db->update('slider', $data);
    }

    public function published_slider($id)
    {
        $this->db->set('status', 1);
        $this->db->where('idSlider', $id);
        return $this->db->update('slider');
    }

    public function unpublished_slider($id)
    {
        $this->db->set('status', 0);
        $this->db->where('idSlider', $id);
        return $this->db->update('slider');
    }

    public function get_all_slider_post()
    {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('status', 1);
        $r = $this->db->get();
        return $r->result();
    }

}
?>
