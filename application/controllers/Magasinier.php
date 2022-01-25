<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magasinier extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
    }

    /* index page */
    public function index()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/accueil', '', true);
        $data['chart']       = $this->load->view('admin/chart', '', true);
        $this->load->view('admin/dashboard', $data);
    }

    /* deconnexion */
    public function logout()
    {
        $this->session->unset_userdata('mailMagasinier');
        $this->session->unset_userdata('password');   
        $this->session->sess_destroy();
        redirect('admin_login', 'refresh');
    }

    public function ajouterArticle()
    {
        $data                           = array();
        $data['all_published_category'] = $this->CategorieModel->getAllCategorie();
        $data['all_published_brand']    = $this->ArticleModel->getAllMarque();
        $data['maincontent']            = $this->load->view('admin/add_article', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function newArticle()
    {
        $data                        = array();
        $data['designation']         = $this->input->post('designation');
        $data['description']         = $this->input->post('description');
        $data['prixArticle']         = $this->input->post('prixArticle');
        $data['qteArticle']          = $this->input->post('qteArticle');
        $data['categorieArticle']    = $this->input->post('categorieArticle');
        $data['marque']              = $this->input->post('marque');
        $data['featureArticle']              = $this->input->post('niveau');
        $data['status']              = $this->input->post('status');
        $data['imageArticle']        = $this->input->post('imageArticle');

        $this->form_validation->set_rules('designation', 'Designation article', 'trim|required');
        $this->form_validation->set_rules('description', 'Description article', 'trim|required');
        $this->form_validation->set_rules('prixArticle', 'Prix Article', 'trim|required');
        $this->form_validation->set_rules('qteArticle', 'Quantite article', 'trim|required');
        $this->form_validation->set_rules('categorieArticle', 'Category Article', 'trim|required');
        $this->form_validation->set_rules('marque', 'Marque Article', 'trim|required');
        $this->form_validation->set_rules('featureAricle', 'Article Feature', 'trim');
        $this->form_validation->set_rules('status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['imageArticle']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('imageArticle')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('magasinier/ajouterArticle');
            } else {
                $post_image            = $this->upload->data();
                $data['imageArticle'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->ArticleModel->newArticle($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Article Inserer avec Sucess');
                redirect('magasinier/gererArticle');
            } else {
                $this->session->set_flashdata('message', 'Echec!');
                redirect('magasinier/gererArticle');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('magasinier/ajouterArticle');
        }
    }

    public function gererArticle()
    {
        $data                           = array();
        $data['get_all_product'] = $this->ArticleModel->getAllArticle();
        $data['maincontent']            = $this->load->view('admin/gerer_article', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function modifierArticle($id)
    {
        $data                           = array();
        $data['all_published_category'] = $this->CategorieModel->getAllCategorie();
        $data['all_published_brand']    = $this->ArticleModel->getAllMarque();
        $data['product_info_by_id']     = $this->ArticleModel->modifierArticle($id);
        $data['maincontent']            = $this->load->view('admin/add_article', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function updateArcticle($id)
    {
        $data                        = array();
        $data['designation']         = $this->input->post('designation');
        $data['description']         = $this->input->post('description');
        $data['prixArticle']         = $this->input->post('prixArticle');
        $data['qteArticle']          = $this->input->post('qteArticle');
        $data['categorieArticle']    = $this->input->post('categorieArticle');
        $data['marque']              = $this->input->post('marque');
        $data['featureArticle']              = $this->input->post('niveau');
        $data['status']              = $this->input->post('status');
        $data['imageArticle']        = $this->session->userdata('imageArticle');

        $this->form_validation->set_rules('designation', 'Designation article', 'trim|required');
        $this->form_validation->set_rules('description', 'Description article', 'trim|required');
        //$this->form_validation->set_rules('product_long_description', 'Product Long Status', 'trim|required');
        $this->form_validation->set_rules('prixArticle', 'Prix Article', 'trim|required');
        $this->form_validation->set_rules('qteArticle', 'Quantite article', 'trim|required');
        $this->form_validation->set_rules('categorieArticle', 'Category Article', 'trim|required');
        $this->form_validation->set_rules('marque', 'Marque Article', 'trim|required');
        $this->form_validation->set_rules('featureArticle', 'Article Feature', 'trim');
        $this->form_validation->set_rules('status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['product_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('imageArticle')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('magasinier/ajouterArticle');
            } else {
                $post_image            = $this->upload->data();
                $data['imageArticle'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->ArticleModel->updateArticle($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'Article Inserer avec Sucess');
                redirect('magasinier/gererArticle');
            } else {
                $this->session->set_flashdata('message', 'Echec!');
                redirect('magasinier/gererArticle');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('magasinier/ajouterArticle');
        }
    }

    public function supprimerArticle($id)
    {
        $delete_image = $this->getImageById($id);
        unlink('uploads/' . $delete_image->imageArticle);
        $result = $this->ArticleModel->deleteArticle($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Article Deleted Sucessfully');
            redirect('magasinier/gererArticle');
        } else {
            $this->session->set_flashdata('message', 'Article Deleted Failed');
            redirect('magasinier/gererArticle');
        }
    }

    private function getImageById($id)
    {
        $this->db->select('imageArticle');
        $this->db->from('article');
        $this->db->where('article.idArticle', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function articlePublie($id)
    {
        $result = $this->ArticleModel->articlePublie($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Product Sucessfully');
            redirect('magasinier/gererArticle');
        } else {
            $this->session->set_flashdata('message', 'Published Product  Failed');
            redirect('magasinier/gererArticle');
        }
    }

    public function articleNonPublie($id)
    {
        $result = $this->ArticleModel->articleNonPublie($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Product Sucessfully');
            redirect('magasinier/gererArticle');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Product  Failed');
            redirect('magasinier/gererArticle');
        }
    }

    /*================================================================*/
    /* categories... */
    public function ajouterCategorie()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/add_categorie', '', true);
        $this->load->view('admin/dashboard', $data);
    }

    public function newCategorie()
    {
        $data                        = array();
        $data['nomCategorie']        = $this->input->post('nomCategorie');
        $data['description']         = $this->input->post('description');
        $data['status']              = $this->input->post('status');

        $this->form_validation->set_rules('nomCategorie', 'Nom de la categorie', 'trim|required');
        $this->form_validation->set_rules('description', 'Breve Description de la categorie', 'trim|required');
        $this->form_validation->set_rules('status', 'Status de publication', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->CategorieModel->newCategorie($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Categorie ajoutee avec succes');
                redirect('magasinier/gererCategorie');
            } else {
                $this->session->set_flashdata('message', 'Echec! categorie non ajoutee');
                redirect('magasinier/gererCategorie');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('magasinier/ajouterCategorie');
        }   
    }

    public function gererCategorie()
    {
        $data                 = array();
        $data['all_categroy'] = $this->CategorieModel->getAllCategorie();
        $data['maincontent']  = $this->load->view('admin/gerer_categorie', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function modifierCategorie($id)
    {
        $data                        = array();
        $data['category_info_by_id'] = $this->CategorieModel->modifierCategorie($id);
        $data['maincontent']         = $this->load->view('admin/edit_categorie', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function supprimerCategorie($id)
    {
        $result = $this->CategorieModel->deleteCategorie($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Category Deleted Sucessfully');
            redirect('magasinier/gererCategorie');
        } else {
            $this->session->set_flashdata('message', 'Category Deleted Failed');
            redirect('magasinier/gererCategorie');
        }

    }


    public function updateCategorie($id)
    {
        $data                        = array();
        $data['nomCategorie']        = $this->input->post('nomCategorie');
        $data['description']         = $this->input->post('description');
        $data['status']              = $this->input->post('status');

        $this->form_validation->set_rules('momCategorie', 'Nom de la categorie', 'trim|required');
        $this->form_validation->set_rules('description', 'Breve Description de la categorie', 'trim|required');
        $this->form_validation->set_rules('status', 'Status de publication', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->CategorieModel->updateCategorie($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Update Sucessfully');
                redirect('magasinier/gererCategorie');
            } else {
                $this->session->set_flashdata('message', 'Category Update Failed');
                redirect('magasinier/gererCategorie');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('magasinier/ajouterCategorie');
        }

    }

    public function categoriePubliee($id)
    {
        $result = $this->CategorieModel->categoriePubliee($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Bien! Reussite');
            redirect('magasinier/gererCategorie');
        } else {
            $this->session->set_flashdata('message', 'Oh non! Echec');
            redirect('magasinier/gererCategorie');
        }
    }

    public function categorieNonPubliee($id)
    {
        $result = $this->CategorieModel->categorieNonPubliee($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Bien! Succes');
            redirect('magasinier/gererCategorie');
        } else {
            $this->session->set_flashdata('message', 'Oh non! Echec');
            redirect('magasinier/gererCategorie');
        }
    }

    public function get_user()
    {

        $email = $this->session->userdata('mailMagasinier');
        $name  = $this->session->userdata('nomComplet');
        $id    = $this->session->userdata('idMagasinier');

        if ($email == false) {
            redirect('admin_login');
        }

    }


    /*-------------------------------------------------------------*/
    public function ajouterMarque()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/add_marque', '', true);
        $this->load->view('admin/dashboard', $data);
    }

    public function gererMarque()
    {
        $data                = array();
        $data['all_brand']   = $this->ArticleModel->getAllMarque();
        $data['maincontent'] = $this->load->view('admin/gerer_Marque', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function newMarque()
    {
        $data                 = array();
        $data['nomMarque']    = $this->input->post('nomMarque');
        $data['description']  = $this->input->post('description');
        $data['status']       = $this->input->post('status');

        $this->form_validation->set_rules('nomMarque', 'Marque Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Marque Description', 'trim|required');
        $this->form_validation->set_rules('status', 'Publication Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->ArticleModel->newMarque($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Brand Inseted Sucessfully');
                redirect('magasinier/gererMarque');
            } else {
                $this->session->set_flashdata('message', 'Brand Inserted Failed');
                redirect('magasinier/gererMarque');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('magasinier/ajouterMarque');
        }

    }

    public function supprimerMarque($id)
    {
        $result = $this->ArticleModel->deleteMarque($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Marque Deleted Sucessfully');
            redirect('magasinier/gererMarque');
        } else {
            $this->session->set_flashdata('message', 'Marque Deleted Failed');
            redirect('magasinier/gererMarque');
        }
    }

    public function modifierMarque($id)
    {
        $data                     = array();
        $data['brand_info_by_id'] = $this->ArticleModel->modifierMarque($id);
        $data['maincontent']      = $this->load->view('admin/edit_marque', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function updateMarque($id)
    {
        $data                 = array();
        $data['nomMarque']    = $this->input->post('nomMarque');
        $data['description']  = $this->input->post('description');
        $data['status']       = $this->input->post('status');

        $this->form_validation->set_rules('nomMarque', 'Marque Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Marque Description', 'trim|required');
        $this->form_validation->set_rules('status', 'Publication Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->ArticleModel->updateMarque($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Marque Update Sucessfully');
                redirect('magasinier/gererMarque');
            } else {
                $this->session->set_flashdata('message', 'Marque Update Failed');
                redirect('magasinier/gererMarque');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('magasiner/ajouterMarque');
        }

    }

    public function marquePubliee($id)
    {
        $result = $this->ArticleModel->marquePublie($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Marque Sucessfully');
            redirect('magasinier/gererMarque');
        } else {
            $this->session->set_flashdata('message', 'Published Marque  Failed');
            redirect('magasinier/gererMarque');
        }
    }

    public function marqueNonPubliee($id)
    {
        $result = $this->ArticleModel->marqueNonPubliee($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Sucessfully');
            redirect('magasinier/gererMarque');
        } else {
            $this->session->set_flashdata('message', 'Oh! Failed');
            redirect('magasinier/gererMarque');
     
        }
    }

    # --------- fonctions de commande ----------
    public function gererCommande()
    {
        $data                = array();
        $data['all_orders']   = $this->CommandeModel->getAllCommande();
        $data['maincontent'] = $this->load->view('admin/gerer_commande', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function allCommande()
    {
        $data                = array();
        $data['all_orders']   = $this->CommandeModel->getAllCommande();
        $data['maincontent'] = $this->load->view('admin/all_commande', $data, true);
        $this->load->view('admin/dashboard', $data);
    }
    public function commandeValide($id)
    {
        $result = $this->CommandeModel->cmdValide($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Commande validee Sucessfully');
            redirect('magasinier/gererCommande');
        } else {
            $this->session->set_flashdata('message', 'Commande validee Failed');
            redirect('magasinier/gererCommande');
        }
    }

    public function commandeNonValide($id)
    {
        $result = $this->CommandeModel->cmdNonValidee($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Sucessfully');
            redirect('magasinier/gererCommande');
        } else {
            $this->session->set_flashdata('message', 'Oh! Failed');
            redirect('magasinier/gererCommande');
     
        }
    }

    public function modifierCommnade($id)
    {
        
        $data                = array();
        $data['all_orders']   = $this->CommandeModel->getAllCommande();
        $data['maincontent'] = $this->load->view('admin/gerer_commande', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function supprimerCommande($id)
    {
        $result = $this->CommandeModel->deleteCmd($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Commande supprimee Sucessfully');
            redirect('magasinier/gererCommande');
        } else {
            $this->session->set_flashdata('message', 'Commande supprimee Failed');
            redirect('magasinier/gererCommande');
        }
    }

    # --------- les fonctions relatives aux reservations -----
    public function gererReservation()
    {
        $data                = array();
        $data['all_reservation']   = $this->CommandeModel->getAllReservation();
        $data['maincontent'] = $this->load->view('admin/gerer_reservation', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function reservationValide($id)
    {
        $result = $this->CommandeModel->reservationValide($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Reservation validee Sucessfully');
            redirect('magasinier/gererReservation');
        } else {
            $this->session->set_flashdata('message', 'Reservation validee Failed');
            redirect('magasinier/gererReservation');
        }
    }

    public function reservationNonValide($id)
    {
        $result = $this->CommandeModel->reservationNonValidee($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Non validee Sucessfully');
            redirect('magasinier/gererReservation');
        } else {
            $this->session->set_flashdata('message', 'Oh! Failed');
            redirect('magasinier/gererReservation');
     
        }
    }

    public function modifierReservation($id)
    {
        $data                       = array();
        $data['all_reservation']    = $this->CommandeModel->getAllReservation();
        $data['maincontent']        = $this->load->view('admin/gerer_reservation', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function supprimerReservation($id)
    {
        $result = $this->CommandeModel->deleteReservation($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Reservation supprimee Sucessfully');
            redirect('magasinier/gererReservation');
        } else {
            $this->session->set_flashdata('message', 'Reservation supprimee Failed');
            redirect('magasinier/gererReservation');
        }
    }

    # ---- fonctions relatives au client ----
    public function categoriserClientVip($id)
    {
        $result = $this->ClientModel->categoriserClientVip($id);

        if ($result) {
            $this->session->set_flashdata('message', 'Client rendu VIP');
            redirect('magasinier/gererClient');
        } else {
            $this->session->set_flashdata('message', 'Echec!');
            redirect('magasinier/gererClient');
        }
        
    }

    public function categoriserClientNormal($id)
    {
        $result = $this->ClientModel->categoriserClientNormal($id);

        if ($result) {
            $this->session->set_flashdata('message', 'Client rendu normal');
            redirect('magasinier/gererClient');
        } else {
            $this->session->set_flashdata('message', 'Echec!!!');
            redirect('magasinier/gererClient');
        }
        
    }

    public function gererClient()
    {
        $data = array();
        $data['all_client'] = $this->ClientModel->getAllClient();
        $data['maincontent'] = $this->load->view('admin/gerer_client', $data, true);

        $this->load->view('admin/dashboard', $data);
    }

    public function supprimerClient($id)
    {
        $result = $this->ClientModel->deleteClient($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Client supprime Sucessfully');
            redirect('magasinier/gererClient');
        } else {
            $this->session->set_flashdata('message', 'Client supprime Failed');
            redirect('magasinier/gererClient');
        }
    }

    public function modifierClient()
    {
        $data = array();
        $data['all_client'] = $this->ClientModel->getAllClient();
        $data['maincontent'] = $this->load->view('admin/gerer_client', $data, true);

        $this->load->view('admin/dashboard', $data);
    }
}

?>
