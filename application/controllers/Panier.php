<?php 
defined('BASEPATH') Or exit ('No direct script access allowed');

class Panier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function panier()
    {
        echo '<b>VOYONS un peu le panier !!!</b>';

        $data             = array();
        $data['contents'] = $this->cart->contents();

        $this->load->view('pages/panier', $data);
        $this->load->view('pages/footer');
    }

    public function ajouterAuPanier($id)
    {
        $data       = array();
        $idArticle  = $this->input->post('idArticle');
        $results    = $this->PsaroModel->get_single_product($idArticle);

        var_dump($results);

        $data['id'] = $results->idArticle;
        $data['name'] = $results->designation;
        $data['price'] = $results->prixArticle;
        $data['qty'] = $this->input->post('qty');
        $data['options'] = array('product_image' =>$results->imageArticle);

        $this->cart->insert($data);
       
        redirect('panier/panier');
    }

    public function update_panier()
    {
        $data = array();
        $data['qty'] = $this->input->post('qty');
        $data['rowid'] = $this->input->post('rowid');

        $this->cart->update($data);
        redirect('panier/panier');
    }

    public function remove_panier()
    {
        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('panier/panier');
    }

}

?>