<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Psaro extends CI_Controller
{
    public function __Construct()
    {
        parent :: __Construct();
    }

    /*index page */
    public function index()
    {
        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
        $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
        $this->load->view('psaro', $data);
    } 

    /* page contact */
    public function contact()
    {
        $this->load->view('pages/header_contact');
        $this->load->view('pages/contact');
        $this->load->view('pages/footer');
    }

    /* page a propos */
    public function apropos()
    {   
        $this->load->view('pages/header_contact');
        $this->load->view('pages/apropos');
        $this->load->view('pages/footer');
    }

    /* liste de tous les produits*/
    public function tousLesProduits()
    {
        $this->load->library('pagination');

        $config['base_url']         = base_url('psaro/tousLesProduits');
        $config['total_rows']       = $this->db->get('article')->num_rows();
        $config['per_page']         = 8;
        $config['num_links']        = 2;
        $config['full_tag_open']    = '<ul>';
        $config['ful_tag_close']    = '</ul>';
        $config['first_link']       = false;
        $config['last_link']        = false;
        $config['prev_link']        ='$lt; Previous';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['last_link']        = false;
        $config['next_link']        = 'Next &gt;';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a>';
        $config['cur_tag_close']    = '</a></li>';

        $this->pagination->initialize($config);

        $data                    = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['get_all_product'] = $this->ArticleModel->getAllArticle_pagi($config['per_page'], $this->uri->segment('3'));
        $this->load->view('pages/header', $data);
        $this->load->view('pages/tous_les_produits', $data);
        $this->load->view('pages/footer');   
    }

    public function getProduitByCategorie($id)
    {
        $this->load->library('pagination');
        
                $config['base_url']         = base_url('psaro/getProduitByCategorie');
                $config['total_rows']       = $this->db->get('article')->num_rows();
                $config['per_page']         = 8;
                $config['num_links']        = 2;
                $config['full_tag_open']    = '<ul>';
                $config['ful_tag_close']    = '</ul>';
                $config['first_link']       = false;
                $config['last_link']        = false;
                $config['prev_link']        ='$lt; Previous';
                $config['prev_tag_open']    = '<li>';
                $config['prev_tag_close']   = '</li>';
                $config['last_link']        = false;
                $config['next_link']        = 'Next &gt;';
                $config['next_tag_open']    = '<li>';
                $config['next_tag_close']   = '</li>';
                $config['num_tag_open']     = '<li>';
                $config['num_tag_close']    = '</li>';
                $config['cur_tag_open']     = '<li class="active"><a>';
                $config['cur_tag_close']    = '</a></li>';
        
                $this->pagination->initialize($config);

                $data                    = array();
                $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
                $data['get_all_product'] = $this->ArticleModel->getArticle_pagi($id,$config['per_page'], $this->uri->segment('10'));
                $this->load->view('pages/header', $data);
                $this->load->view('pages/produits_categorie', $data);
                $this->load->view('pages/footer');
    }

    /* details d'un produit */
    public function detailProduit($id)
    {
        $data                       = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['get_single_product'] = $this->ArticleModel->getSingleArticle($id);
        $data['get_all_category']   = $this->ArticleModel->getAllCategorie();
    
        $this->load->view('pages/header', $data);
        $this->load->view('pages/details_produit', $data);
        $this->load->view('pages/footer');
    }

    /* affichage */
    public function grille()
    {
        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
        $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
        $this->load->view('pages/header', $data);
        $this->load->view('pages/grille', $data);
        $this->load->view('pages/footer');
    }

    public function comparer()
    {
        $this->load->view('pages/header');
        $this->load->view('pages/comparer');
        $this->load->view('pages/footer');   
    }

    /* single article */
    public function single($id)
    {
        $data                       = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['get_single_product'] = $this->PsaroModel->get_single_product($id);
        $data['get_all_category']   = $this->PsaroModel->get_all_category();
        $this->load->view('pages/header', $data);
        $this->load->view('pages/details_produit', $data);
        $this->load->view('pages/footer');
    }
}

?>