<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PsaroModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_search_product($search)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie = article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque = article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $this->db->where('article.status', 1);
        $this->db->like('article.designation', $search, 'both');
        $this->db->or_like('article.description', $search, 'both');
        $this->db->or_like('categorie.nomCategorie', $search, 'both');
        $this->db->or_like('marque.nomMarque', $search, 'both');

        $result = $this->db->get();
        return $result->result();
    }

    public function get_product_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $this->db->where('article.status', 1);
        $this->db->where('article.idArticle', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function getProductById($id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $this->db->where('article.status', 1);
        $this->db->where('article.idArticle', $id);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_single_product($id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $this->db->where('article.status', 1);
        $this->db->where('article.idArticle', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('categorie');
        $this->db->where('status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    // article en vogue ou populaire
    public function get_all_featured_product()
    {
        $this->db->select('*,article.status as pstatus');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $this->db->where('article.status', 1);
        $this->db->where('featureArticle', 1);
        $this->db->limit(4);
        $info = $this->db->get();
        return $info->result();
    }

    /* nouveaux articles...*/

    public function get_all_new_product()
    {
        $this->db->select('*,article.status as pstatus');
        $this->db->from('article');
        $this->db->join('categorie', 'categorie.idCategorie=article.categorieArticle');
        $this->db->join('marque', 'marque.idMarque=article.marque');
        $this->db->order_by('article.idArticle', 'DESC');
        $this->db->where('article.status', 1);
        $this->db->limit(4);
        $info = $this->db->get();
        return $info->result();
    }

}

?>
