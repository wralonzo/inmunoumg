<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }

        $this->load->model('Queja_model');
        $this->load->model('Queja_model');
        $this->load->model('Company_model');
        $this->load->model('Comun_model');
    }

    public function fechas(){
        $this->form_validation->set_rules('txtFechaFin', 'Nombre', 'trim|required|min_length[3]');
        if($this->form_validation->run() == FALSE){
            $this->load->view('main/index');
            $this->load->view('reporte/fechas');
            $this->load->view('main/footer');
        }else{
            $fechaInicio = $this->input->post('txtFechaInicio');
            $fechasFin = $this->input->post('txtFechaFin');
            $data['response'] = $this->Comun_model->getFechas($fechaInicio, $fechasFin);
            $this->load->view('main/index');
            $this->load->view('reporte/index', $data);
            $this->load->view('main/footer');
        }
    }

    public function municipio(){
        $this->form_validation->set_rules('txtbuscar', 'Nombre', 'trim|required|min_length[1]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/index');
            $this->load->view('reporte/municipio');
            $this->load->view('main/footer');
        } else {
            $buscar = $this->input->post('txtbuscar');
            $data['response'] = $this->Comun_model->getMunicipio($buscar);
            $this->load->view('main/index');
            $this->load->view('reporte/index', $data);
            $this->load->view('main/footer');
        }
    }

    public function departamento()
    {
        $this->form_validation->set_rules('txtDepartamento', 'Nombre', 'trim|required|min_length[1]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/index');
            $this->load->view('reporte/departamento');
            $this->load->view('main/footer');
        } else {
            $buscar = $this->input->post('txtDepartamento');
            $data['response'] = $this->Comun_model->getDepartamento($buscar);
            $this->load->view('main/index');
            $this->load->view('reporte/index', $data);
            $this->load->view('main/footer');
        }
    }

    public function region(){
        $this->form_validation->set_rules('txtbuscar', 'Region', 'trim|required|min_length[1]');
        if ($this->form_validation->run() == FALSE) {
            $data['regiones'] = $this->Company_model->getRegion();
            $this->load->view('main/index');
            $this->load->view('reporte/region', $data);
            $this->load->view('main/footer');
        } else {
            $buscar = $this->input->post('txtbuscar');
            $data['response'] = $this->Comun_model->getRegionReport($buscar);
            $this->load->view('main/index');
            $this->load->view('reporte/index', $data);
            $this->load->view('main/footer');
        }

    }

    public function sinQuejas(){
        $data['response'] = $this->Comun_model->getComerciosNoQuejas();
        $this->load->view('main/index');
        $this->load->view('reporte/index', $data);
        $this->load->view('main/footer');
    }

    public function conteos(){
        $data['response'] = $this->Comun_model->getComerciosNoQuejas();
        $this->load->view('main/index');
        $this->load->view('reporte/conteos', $data);
        $this->load->view('main/footer');
    }

}