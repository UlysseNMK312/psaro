<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function add_slider()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/add_slider', '', true);
        $this->load->view('admin/dashboard', $data);

    }

    public function gerer_slider()
    {
        $data                = array();
        $data['all_slider']  = $this->SliderModel->getAllSlider();
        $data['maincontent'] = $this->load->view('admin/gerer_slider', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function new_slider()
    {
        $data                      = array();
        $data['title']             = $this->input->post('title');
        #$data['linkSlider']        = $this->input->post('linkSlider');
        $data['status']            = $this->input->post('status');

        $this->form_validation->set_rules('title', 'Slider Title', 'trim|required');
        #$this->form_validation->set_rules('linkSlider', 'Slider Link', 'trim|required');
        $this->form_validation->set_rules('status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['imageSlider']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('imageSlider')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('Slider/add_slider');
            } else {
                $post_image           = $this->upload->data();
                $data['imageSlider'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->SliderModel->save_slider($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Insertion du Slide reussi');
                redirect('slider/gerer_slider');
            } else {
                $this->session->set_flashdata('message', 'Echec d Insertion');
                redirect('slider/gerer_slider');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('slider/add_slider');
        }

    }

    public function modifier($id)
    {
        $data                      = array();
        $data['slider_info_by_id'] = $this->SliderModel->editSlider($id);
        $data['maincontent']       = $this->load->view('admin/edit_slider', $data, true);
        $this->load->view('admin/dashboard', $data);
    }

    public function supprimer($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->imageSlider);
        $result = $this->SliderModel->delete_slider($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Slider Deleted Sucessfully');
            redirect('slider/gerer_slider');
        } else {
            $this->session->set_flashdata('message', 'Slider Deleted Failed');
            redirect('slider/gerer_slider');
        }
    }

    public function update_slider()
    {
        $data                       = array();
        $data['title']       = $this->input->post('title');
        #$data['linkSlider']        = $this->input->post('linkSlider');
        $data['status'] = $this->input->post('status');

        $this->form_validation->set_rules('title', 'Slider Title', 'trim|required');
        #$this->form_validation->set_rules('linkSlider', 'Slider Link', 'trim|required');
        $this->form_validation->set_rules('status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['imageSlider']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('imageSlider')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('Slider/add_slider');
            } else {
                $post_image           = $this->upload->data();
                $data['imageSlider'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->SliderModel->save_slider($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Insertion du Slide reussi');
                redirect('slider/gerer_slider');
            } else {
                $this->session->set_flashdata('message', 'Echec d Insertion');
                redirect('slider/gerer_slider');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('slider/add_slider');
        }

    }

    public function slider_publie($id)
    {
        $result = $this->SliderModel->published_slider($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Slider Sucessfully');
            redirect('slider/gerer_slider');
        } else {
            $this->session->set_flashdata('message', 'Published Slider  Failed');
            redirect('slider/gerer_slider');
        }
    }

    public function slider_non_publie($id)
    {
        $result = $this->SliderModel->unpublished_slider($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Slider Sucessfully');
            redirect('slider/gerer_slider');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Slider  Failed');
            redirect('slider/gerer_slider');
        }
    }


    private function get_image_by_id($id)
    {
        $this->db->select('imageSlider');
        $this->db->from('slider');
        $this->db->where('idSlider', $id);
        $info = $this->db->get();
        return $info->row();
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
}

?>
