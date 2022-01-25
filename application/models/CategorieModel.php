<?php
defined('BASEPATH') OR ('No direct script access allowed');

class CategorieModel extends CI_Model 
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function newCategorie($data)
    {
        return $this->db->insert('categorie', $data);

    }

    public function getAllCategorie()
    {
        $this->db->select('*');
        $this->db->from('categorie');
        $info = $this->db->get();
        return $info->result();
    }

    public function modifierCategorie($id)
    {
        $this->db->select('*');
        $this->db->from('categorie');
        $this->db->where('idCategorie', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function deleteCategorie($id)
    {
        $this->db->where('idCategorie', $id);
        return $this->db->delete('categorie');
    }

    public function updateCategorie($data, $id)
    {
        $this->db->where('idCategorie', $id);
        return $this->db->update('categorie', $data);
    }

    public function categoriePubliee($id)
    {
        $this->db->set('status', 1);
        $this->db->where('idCategorie', $id);
        return $this->db->update('categorie');
    }

    public function categorieNonPubliee($id)
    {
        $this->db->set('status', 0);
        $this->db->where('idCategorie', $id);
        return $this->db->update('categorie');
    }

    public function getNomCategorie()
    {
        $this->db->select('idCategorie,nomCategorie');
        $this->db->from('categorie');
        $info = $this->db->get();
        return $info->result();
    }
}

?>


