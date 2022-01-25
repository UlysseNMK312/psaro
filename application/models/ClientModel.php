<?php
defined('BASEPATH') Or exit('No direct script access allowed');
 
 class ClientModel extends CI_Model
 {

     public function __construct()
     {
         parent:: __construct();

     }

     /* creation compte */

     public function newUserSave($data)
     {
        return $this->db->insert('client', $data);
     }

     public function getUser($data)
     {
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where($data);
         $info = $this->db->get();
         return $info->result();
     }

     public function client_verification($data)
     {
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where($data);
         $info          = $this->db->get();
         return $info->row();
     }

     public function check_user($data)
     {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where($data);
        $info          = $this->db->get();
        return $info->row();
     }

     public function getClientById($id)
     {
         $this->db->select('*');
         $this->db->form('client');
         $this->db->where('idClient', $id);
         $q = $this->db->get();
         $res = $q->result();
         return $res;
     }

     public function getCompteClient($mailClient)
     {
         $this->db->select('*');
         $this->db->from('compte_visa');
         $this->db->where('mailCompte', $mailClient);

         $r             = $this->db->get();
         return $result = $r->row();
     }

     public function getAllClient()
     {                               
         $this->db->select('*');
         $this->db->from('client');
         $this->db->order_by('client.idClient', 'DESC');
         $info = $this->db->get();
         return $info->result();
     }

     public function categoriserClientVip($id)
     {
         $this->db->set('status', 1);
         $this->db->where('idClient', $id);
         return $this->db->update('client');
     }

     public function categoriserClientNormal($id)
     {
         $this->db->set('status', 0);
         $this->db->where('idClient', $id);
         return $this->db->update('client');
     }

     public function getAllVipClient()
     {
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where('status', 1);
         $this->db->order_by('client.idClient', 'DESC');
         $requete = $this->db->get();

         return $requete->result();
     }

     public function getAllNormalClient()
     {
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where('status', 0);
         $this->db->order_by('client.idClient', 'DESC');

         $requete = $this->db->get();
         return $requete->result();
     }

     public function deleteClient($id)
     {
        $this->db->where('idClient', $id);
        return $this->db->delete('client');   
     }

 }
 
 ?>