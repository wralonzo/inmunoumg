<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Company_model');
        $this->load->model('Comun_model');
    }

    public function index()
    {
        $data['empresas'] = $this->Company_model->get_all();
        $this->load->view('main/index');
        $this->load->view('company/index', $data);
        $this->load->view('main/footer');
    }

    public function register(){
        $this->form_validation->set_rules('txtNombre', 'Nombre', 'trim|required|min_length[3]');
        if($this->form_validation->run() == FALSE){
            $this->load->view('main/index');
            $data['regiones'] = $this->Company_model->getRegion();
            $this->load->view('company/register', $data);
            $this->load->view('main/footer');
        }else{
            $data = array(
                'nombre_company' => $this->input->post('txtNombre'),
                'propietario_company' => $this->input->post('txtPropietario'),
                'region_company' => $this->input->post('txtRegion'),
                'municipio_company' => $this->input->post('txtMunicipio'),
            );
            if($this->Company_model->insert($data)){
                redirect(base_url().'Company');
            }else{
                $this->load->view('main/index');
                $this->load->view('company/register');
                $this->load->view('main/footer');
            }
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('txtNombre', 'Nombre', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['company'] = $this->Company_model->get_id($id);
            $data['departamentos'] = $this->Comun_model->getDepartmentos();
            $data['regiones'] = $this->Company_model->getRegion();
            $this->load->view('main/index');
            $this->load->view('company/update', $data);
            $this->load->view('main/footer');
        } else {
            $data = array(
                'nombre_company' => $this->input->post('txtNombre'),
                'propietario_company' => $this->input->post('txtPropietario'),
                'region_company' => $this->input->post('txtRegion'),
                'municipio_company' => $this->input->post('txtMunicipio'),
            );
            if ($this->Company_model->update($id, $data)) {
                redirect(base_url() . 'Company');
            } else {
                $this->load->view('main/index');
                $this->load->view('company/update');
                $this->load->view('main/footer');
            }
        }
    }

    public function delete($id){
        $this->Company_model->delete($id);
        redirect(base_url() . 'Company');
    }

    public function getRegionesJSON(){
        $results = $this->Company_model->getRegion();
        echo json_encode($results);
    }
}
