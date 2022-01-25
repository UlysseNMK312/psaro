<?php
defined('BASEPATH') OR ('No direct script access allowed');

class CommandeModel extends CI_Model 
{
    public function __construct(){
        parent::__construct();
    }

    public function getAllCommande()
    {
        $this->db->select('*');
        $this->db->from('commande');
        $this->db->join('article', 'article.idArticle=commande.idArticle');
        $this->db->join('client', 'client.idClient=commande.idClient');
        $this->db->join('payement', 'payement.idPayement=commande.idPayement');
        $this->db->order_by('commande.idCommande', 'DESC');
        $info = $this->db->get();
        
        return $info->result();
    }

    public function deleteCmd($id)
    {
        $this->db->where('idCommande', $id);
        return $this->db->delete('commande');
    }

    public function cmdNonValidee($id)
    {
        $this->db->set('status', 1);
        $this->db->where('idCommande');
        return $this->db->update('commande');
    }

    public function cmdValide($id)
    {
        $this->db->set('status', 0);
        $this->db->where('idCommande', $id);
        return $this->db->update('commande');
    }

    public function updateCmd($data, $id)
    {
        $this->db->where('idCommande', $id);
        return $this->db->update('commande', $data);
    }

    # les fonctions relatives a la reseravation

    public function getAllReservation()
    {
        $this->db->select('*');
        $this->db->from('reservation');
        $this->db->join('article', 'article.idArticle=reservation.idArticle');
        $this->db->join('client', 'client.idClient=reservation.idClient');
        $this->db->order_by('reservation.idReservation', 'DESC');
        $info = $this->db->get();

        return $info->result();
    }

    public function deleteReservation($id)
    {
        $this->db->where('idReservation', $id);
        return $this->db->delete('reservation');
    }

    public function reservationValide($id)
    {
        $this->db->set('status', 1);
        $this->db->where('idReservation', $id);
        return $this->db->update('reservation');
    }

    public function reservationNonValidee($id)
    {
        $this->db->set('status', 0);
        $this->db->where('idReservation');
        return $this->db->update('reservation');
    }
}
?>