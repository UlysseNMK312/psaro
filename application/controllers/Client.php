<?php 
defined('BASEPATH') Or exit ('No direct script access allowed');

class Client extends CI_Controller
{

    public function __Construct(){

        parent:: __Construct();
    }

    /* page connexion */
    public function connexion()
    {
        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
        $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
        $this->load->view('pages/header', $data);
        $this->load->view('pages/login', $data);
        $this->load->view('pages/footer');
    }

    /* page creation compte */
    public function creationCompte()
    {
        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
        $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
        $this->load->view('pages/header', $data);
        $this->load->view('pages/register', $data);
        $this->load->view('pages/footer');
    }

    /* informations client*/
    public function comptes()
    {
        $this->load->view('pages/header_contact');
        $this->load->view('pages/comptes');
        $this->load->view('pages/footer');
    }

    /* creer compte */
    public function newUser()
    {
       $this->form_validation->set_rules('nomClient', 'Nom du client', 'trim|required|min_length[6]', 
       
               array(
                   'trim' => 'le champ ne doit pas commencer par un espace',
                   'required' => 'le champ %s est obligatoire',
                   'min_length' =>'le champ doit contenir au moins 6 caractere',
                    )
       );
       $this->form_validation->set_rules('prenomClient', 'Prenom du client', 'trim|required|min_length[4]', 
       
               array(
                   'trim' => 'le champ ne doit pas commencer par un espace',
                   'required' => 'le champ %s est obligatoire',
                   'min_length' =>'le nom doit contenir au moins 6 caractere',
                    )
       );
       
       $this->form_validation->set_rules('pwd', 'mot de passe', 'required|min_length[4]|matches[pwdConf]',
               
               array(
                   'trim' => 'le champ ne doit pas commencer par un espace',
                   'required' => 'le champ %s est obligatoire',
                   'min_length' =>'le mot de passe doit contenir au moins 4 caractere',
                   'matches' => 'le mot de passe de confirmation doit etre identique au mot de passe'
                    )
       );
                   
       $this->form_validation->set_rules('pwdConf', 'mot de passe confirmation', 'required',
               
           array(
                   'trim' => 'le champ ne doit pas commencer par un espace',
                   'required' => 'le mot de passe confirmation est obligatoire',
                   'matches' => 'le mot de passe de confirmation doit etre identique au mot de passe'
           )
       );
       
       
       $this->form_validation->set_rules('mailClient', 'Adresse Mail', 'trim|required|valid_email|is_unique[client.mailClient]',
                   
           array(
                   'trim' => 'le champ ne doit pas commencer par un espace',
                   'required' => 'le champ %s est obligatoire',
                   'valid_email' =>'saisissez un mail correct',
                   'is_unique' => 'le mail doit etre unique, ce mail existe deja'
                    
           )
       
       );

       $this->form_validation->set_rules('ville', 'Ville client', 'trim|required',
       
           array(
               'trim' => 'le champ ne doit pas commencer par un espace',
               'required' => 'le champ %s est obligatoire',
        
           )

       );

       $this->form_validation->set_rules('commune', 'Commune client', 'trim|required',

           array(
               'trim' => 'le champ ne doit pas commencer par un espace',
               'required' => 'le champ %s est obligatoire',
           )

        );

        $this->form_validation->set_rules('detailAdresse', 'detail adresse' ,'trim|required',
        
           array(
               'trim' => 'le champ ne doit pas commencer par un espace',
               'required' => 'le champ %s est obligatoire',
         
           )

        );

        $this->form_validation->set_rules('telephone', 'numero de telephones', 'trim|required|min_length[10]|max_length[15]',

           array(
               'trim'       => 'le champ ne doit pas commencer par un espace',
               'required'   => 'le champ %s est obligatoire au format +243 00 00 00 000',
               'min_length' => 'le champ %s doit contenir au minimum 10 caractere au format +243 00 00 00 000',    
               'max_length' => 'le champ %s doit contenir au maximum 15 caractere au format +243 00 00 00 000',
           )

        );

       if ($this->form_validation->run() == true) {
            $data                      = array();
            $data['nomClient']         = $this->input->post('nomClient');
            $data['prenomClient']      = $this->input->post('prenomClient');
            $data['password']          = $this->input->post('pwd');
            $data['mailClient']        = $this->input->post('mailClient');
            $data['ville']             = $this->input->post('ville');
            $data['commune']           = $this->input->post('commune');
            $data['detailAdresse']     = $this->input->post('detailAdresse'); 
            $data['telephone']         = $this->input->post('telephone');

           $result = $this->ClientModel->newUserSave($data);
           if ($result) {
               $this->session->set_flashdata('nomClient', $data['nomClient']);
               $this->session->set_flashdata('mailClient', $data['mailClient']);
               redirect('client/register_success');

           } else {
               $this->session->set_flashdata('message', 'Client Registration Fail');
               redirect('client/creationCompte');
           }
       } else {
           $this->session->set_flashdata('message', validation_errors());
           redirect('client/creationCompte');
       }

    }

    public function register_success()
    {
        $customer_name = $this->session->flashdata('nomClient');
        if (!$customer_name) {
            redirect('client/creationCompte');
        }
        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
        $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
        $this->load->view('pages/header', $data);
        $this->load->view('pages/register_success');
        $this->load->view('pages/footer');
    }

    /*se connecter */
    public function seConnecter()
    {
        
        $this->form_validation->set_rules('mailClient', 'Email client', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password client', 'trim|required');

        if ($this->form_validation->run() == true) {
            
            $data                  = array();
            $data['mailClient']    = $this->input->post('mailClient');
            $data['password']      = $this->input->post('password');

            $results = $this->ClientModel->client_verification($data);
            var_dump($results);

            if ($results) {
                
                echo 'yes!...';
                $this->session->set_userdata('idClient', $results->idClient);
                $this->session->set_userdata('mailClient', $data['mailClient']);
                redirect('client/commande');

            } else {

                $this->session->set_flashdata('message', 'Desole erreur de connexion !');
                redirect('client/connexion');      
            }
            

        } else {

            $this->session->set_flashdata('message', validation_errors());
            redirect('client/connexion');
        }
    }

    # je suis ici il me faut now tester cette application
    public function login()
    {
        $data = array();
        $data['mailClient'] = $this->input->post('mailClient');
        $data['password']   = $this->input->post('password');

        $result = $this->ClientModel->client_verification($data);

        if ($result) {
            
            $this->session->set_userdata('idClient', $result->idClient);
            $this->session->set_userdata('mailClient', $data['mailClient']);
            redirect('client/commande');

        } else {
            $this->session->set_flashdata('message', 'Error!');
            redirect('client/connexion');
        }
        
    }


    public function modificationCompte()
    {
        #$this->load->view('pages/header');
        #$this->load->view('pages/register');
        #$this->load->view('pages/footer');
    }

    public function modifierCompte()
    {
        $data                     = array();
        $data['nomClient']         = $this->input->post('nomClient');
        $data['prenomClient']      = $this->input->post('prenomClient');
        $data['pwd']               = $this->input->post('pwd');
        $data['pwdConf']           = $this->input->post('pwdConf');
        $data['mailClient']        = $this->input->post('mailClient');
        $data['ville']             = $this->input->post('ville');
        $data['commune']           = $this->input->post('commune');
        $data['detailAdresse']     = $this->input->post('detailAdresse'); 
        $data['telephone']         = $this->input->post('telephone');


        if ($this->form_validation->run() == true) {
            $data['password'] = md5($data['pwd']);

           $result = $this->ClientModel->newUserSave($data);
           if ($result) {
               $this->session->set_flashdata('nomClient', $data['nomClient']);
               $this->session->set_flashdata('mailClient', $data['mailClient']);
               redirect('client/register_success');

           } else {
               $this->session->set_flashdata('message', 'Client Registration Fail');
               redirect('client/creationCompte');
           }
       } else {
           $this->session->set_flashdata('message', validation_errors());
           redirect('client/creationCompte');
       }
    }

    /* connexion success */
    public function connexion_success()
    {
        $customer_name = $this->session->flashdata('login');
        if (!$customer_name) {
            redirect('client/connexion');
        }
        
        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
        $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
        $this->load->view('pages/header', $data);
        $this->load->view('pages/login_success', $data);
        $this->load->view('pages/footer');
    }

    /* deconnexion */
    public function deconnexion()
    {
        $this->session->unset_userdata('client');   
        $this->session->sess_destroy();
        redirect('Psaro', 'refresh');
    }

    public function mdpOublier()
    {
        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
        $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
        $this->load->view('pages/header', $data);
        $this->load->view('pages/mdp_oublier', $data);
        $this->load->view('pages/footer');
    }
    
    /* reserver... */
    public function reserve()
    {

    }

    public function reservation()
    {
        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
        $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
        $this->load->view('pages/header', $data);
        $this->load->view('pages/connexion', $data);
        $this->load->view('pages/footer');
    }

    public function reserver()
    {
        $r = $this->ClientModel->newConnexion();
        
        if(count($r) > 0)
        {
            $user = $r[0];
            
            $d = array(
                'id' =>$user->id,
                'adresseEmail' =>$user->adresseEmail,
                'is_connected' =>true
            );

            $this->session->set_userdata($d);
            $donne = $this->ClientModel->getClientById($user->id);
            $this->reserve($donne);
            
        }
        else{

            $d = array(
                'error_login' =>"login ou mot de passe incorrect",
            );

            $this->session->set_flashdata($d);
            #$this->connexion();
              
        }
    }

    public function annulerReservation()
    {

    }

    /* commande */
    public function commande()
    {
        $client_mail = $this->session->flashdata('mailClient');
        $client_id   = $this->session->flashdata('idClient');
        echo $client_mail;
        
        if(!$client_mail){
            redirect('client/seConnecter');
        }

        $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();

        $this->load->view('pages/header_contact', $data);
        $this->load->view('pages/passer_commande', $data);
        $this->load->view('pages/footer');

    }

    public function commander()
    {
        $data                   = array();
        $data['type_payement']  = $this->input->post('payement');

        $this->form_validation->set_rules('payement', 'Payment', 'trim|required');        


        if ($this->form_validation->run() == true) {

            if ($data['type_payement'] == 'paypal') {
                redirect('client/paypal');

            }elseif($data['type_payement'] == 'mastercard'){

                $this->session->set_flashdata('message', 'Service indisponible');

            }elseif($data['type_payement'] == 'visa'){

                $this->session->set_flashdata('message', 'Service indisponible');
                redirect('client/visa');
                
            }elseif($data['type_payement'] == 'cash'){

                $this->session->set_flashdata('message', 'Vous payerez a la livraison');
                
            }else {
                
                $this->session->set_flashdata('message', 'Service inconnu');
                
            }
            

        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('client/commande');
        }
        
    }

    public function paypal()
    {
        $this->load->view('pages/paypal');
    }

    public function paypalPayment()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->PsaroModel->getSeo('checkout');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $data['paypal_sandbox'] = $this->Home_admin_model->getValueStore('paypal_sandbox');
        $data['paypal_email'] = $this->Home_admin_model->getValueStore('paypal_email');
        $this->render('checkout_parts/paypal_payment', $head, $data);
    }

    public function paypal_cancel()
    {
        if (get_cookie('paypal') == null) {
            redirect(base_url());
        }
        @delete_cookie('paypal');
        $orderId = get_cookie('paypal');
        $this->Public_model->changePaypalOrderStatus($orderId, 'canceled');
        $data = array();
        $head = array();
        $head['title'] = '';
        $head['description'] = '';
        $head['keywords'] = '';
        $this->render('checkout_parts/paypal_cancel', $head, $data);
    }

    public function paypal_success()
    {
        if (get_cookie('paypal') == null) {
            redirect(base_url());
        }
        @delete_cookie('paypal');
        $this->shoppingcart->clearShoppingCart();
        $orderId = get_cookie('paypal');
        $this->Public_model->changePaypalOrderStatus($orderId, 'payed');
        $data = array();
        $head = array();
        $head['title'] = '';
        $head['description'] = '';
        $head['keywords'] = '';
        $this->render('checkout_parts/paypal_success', $head, $data);
    }

    # paiement par visa 
    public function visa()
    {   $data                          = array();
        $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
        //$data['client_info']           = $this->ClientModel->getClientById();
        
        $this->load->view('pages/header', $data);
        $this->load->view('pages/visa_payement', $data);
        $this->load->view('pages/footer');
    }

    public function visaPaiement($mailClient)
    {
        $data               = array();
        $data['code']       = $this->input->post('code');
        $data['cvc']        = $this->input->post('cvc');
        $data['dateExpiration']    = $this->input->post('dateExp');

        $this->form_validation->set_rules('code', 'Code carte', 'trim|required|min_length[16]|max_length[16]', 
        
                array(
                    'trim' => 'le champ ne doit pas commencer par un espace',
                    'required' => 'le champ %s est obligatoire',
                    'min_length' =>'le champ %s doit contenir au moins 16 caractere',
                    'max_length' =>'le champ %s doit contenir au maximum 16 caractere',
                )
        );

        $this->form_validation->set_rules('cvc', 'Code CVC', 'trim|required|min_length[3]|max_length[3]', 
        
                array(
                    'trim' => 'le champ ne doit pas commencer par un espace',
                    'required' => 'le champ %s est obligatoire',
                    'min_length' =>'le code CVC doit contenir au moins 3 caractere',
                    'max_length' =>'le code CVC doit contenir au maximum 3 caractere',
                )
        );

        $this->form_validation->set_rules('dateExpiration', 'La date d expiration', 'trim|required', 
        
                array(
                    'trim' => 'le champ ne doit pas commencer par un espace',
                    'required' => 'le champ %s est obligatoire',
                )
        );

        if ($this->form_validation->run()== True) {

            $result = $this->ClientModel->check_user($data);
            
            if (!$result) {
            
                $this->session->set_flashdata('message', 'Desole erreur de connexion');
                redirect('client/visa');
            
            } else {
                $this->session->set_userdata('idCompte', $result->idCompte);
                $this->session->set_userdata('mailCompte', $data['mailCompte']);
                redirect('client/visa_valider_paiement');
                                    
            }

        }else {

            $this->session->set_flashdata('message', validation_errors());
            redirect('client/visa');
        }

    }

    public function supprimerCommande()
    {

    }

    public function modeifierCommande()
    {

    }

    /* payement */
    public function payer()
    {

    }

    public function search()
    {

        $search = $this->input->get('search');

        if (!empty($search)) {
            $data                          = array();
            $data['all_category_name']     = $this->CategorieModel->getNomCategorie();
            $data['all_featured_products'] = $this->PsaroModel->get_all_featured_product();
            $data['all_new_products']      = $this->PsaroModel->get_all_new_product();
            $data['get_all_product'] = $this->PsaroModel->get_all_search_product($search);
            $data['search']          = $search;

            if ($data['get_all_product']) {
                $this->load->view('pages/header', $data);
                $this->load->view('pages/search', $data);
                $this->load->view('pages/footer');
            } else {
                redirect('error');
            }
        } else {
            redirect('error');
        }
    }

}

?>