<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Comun_model');
    }

    public function getRegionesJSON()
    {
        $results = $this->Comun_model->getRegion();
        echo json_encode($results);
    }
    public function getDepartamentosJSON()
    {
        $results = $this->Comun_model->getDepartamentosJSON();
        echo json_encode($results);
    }

    public function getMunicipiosJSON($departamento){
        $results = $this->Comun_model->getMunicipiosJSON($departamento);
        echo json_encode($results);
    }
    public function getSucursalesJSON($company){
        $results = $this->Comun_model->getSucursalesJSON($company);
        echo json_encode($results);
    }
}
