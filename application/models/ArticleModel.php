<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleModel extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function newArticle($data)
    {
        return $this->db->insert('article', $data);
    }

    public function getAllArticle()
    {
        $this->db->select('*,article.status as pstatus');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function getAllArticle_pagi($limit, $offset)
    {
        $this->db->select('*,article.status as pstatus');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $this->db->limit($limit,$offset);        
        $info = $this->db->get();
        return $info->result();
    }

    public function getArticle_pagi($id,$limit, $offset)
    {
        $this->db->select('*,article.status as pstatus');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->where('categorieArticle', $id);
        $this->db->order_by('article.idArticle', 'DESC');
        $this->db->limit($limit,$offset);        
        $info = $this->db->get();
        return $info->result();
    }

    public function modifierArticle($id)
    {
        $this->db->select('*,article.status as pstatus');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function deleteArticle($id)
    {
        $this->db->where('idArticle', $id);
        return $this->db->delete('article');
    }

    public function updateArticle($data, $id)
    {
        $this->db->where('idArticle', $id);
        return $this->db->update('article', $data);
    }

    public function articlePublie($id)
    {
        $this->db->set('status', 1);
        $this->db->where('idArticle', $id);
        return $this->db->update('article');
    }

    public function articleNonPublie($id)
    {
        $this->db->set('status', 0);
        $this->db->where('idArticle', $id);
        return $this->db->update('article');
    }

    public function getAllPublishedCategory()
    {
        $this->db->select('*');
        $this->db->from('categorie');
        $this->db->where('status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function getSingleArticle($id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->where('article.idArticle', $id);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function getAllCategorie()
    {
        $this->db->select('*');
        $this->db->from('categorie');
        $this->db->where('status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    //===============================================

    public function getAllPublishedMarque()
    {
        $this->db->select('*');
        $this->db->from('marque');
        $this->db->where('status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function getAllMarque()
    {
        $this->db->select('*');
        $this->db->from('marque');
        $info = $this->db->get();
        return $info->result();
    }

    public function newMarque($data)
    {
        return $this->db->insert('marque', $data);
    }

    public function deleteMarque($id)
    {
        $this->db->where('idMarque', $id);
        return $this->db->delete('marque');
    }

    public function modifierMarque($id)
    {
        $this->db->select('*');
        $this->db->from('marque');
        $this->db->where('idMarque', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function updateMarque($data, $id)
    {
        $this->db->where('idMarque', $id);
        return $this->db->update('marque', $data);
    }

    public function marquePublie($id)
    {
        $this->db->set('status', 1);
        $this->db->where('idMarque', $id);
        return $this->db->update('marque');
    }

    public function marqueNonPubliee($id)
    {
        $this->db->set('status', 0);
        $this->db->where('idMarque', $id);
        return $this->db->update('marque');
    }

}

?>
