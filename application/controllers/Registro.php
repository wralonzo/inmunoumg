<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacunas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Vacunas_model');
    }

    public function menoruno()
    {
        $data['vacunas'] = $this->Vacunas_model->get_all();
        $this->load->view('main/index');
        $this->load->view('vacunas/index', $data);
        $this->load->view('main/footer');
    }
}
