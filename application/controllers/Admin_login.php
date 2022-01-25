<?php

defined('BASEPATH') or exit('No direct script access allowed');

class  Admin_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('adminlogin_model');
        //$this->user_login_check();
    }

    public function index()
    {
        $this->load->view('admin/login');
    }


    public function admin_verification()
    {
        $this->form_validation->set_rules('mailMagasinier', 'Admin Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'mot de passe email', 'required');

        if ($this->form_validation->run() == true) {

            $data = array();
            $data['mailMagasinier'] = $this->input->post('mailMagasinier');
            $data['password'] = $this->input->post('password');

            $result = $this->AdminModel->admin_verification($data);

            if ($result) {

                $this->session->set_userdata('mailMagasinier', $result->mailMagasinier);
                
                $this->session->set_userdata('nomComplet', $result->nomComplet);

                $this->session->set_userdata('idMagasinier', $result->idMagasinier);
                
                redirect('magasinier');

            } else {
                $this->session->set_flashdata('message' , 'Mot de passe ou Email incorrect!');
                redirect('admin_login', 'refresh');
            }

        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('admin_login', 'refresh');
        }
        
    }
}

?>