<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sucursal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Sucursal_model');
        $this->load->model('Comun_model');
    }

    public function index()
    {
        $data['sucursales'] = $this->Sucursal_model->get_all();
        $this->load->view('main/index');
        $this->load->view('sucursal/index', $data);
        $this->load->view('main/footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('txtNombre', 'Nombre', 'trim|required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/index');
            $data['companies'] = $this->Sucursal_model->getCompany();
            $data['regiones'] = $this->Sucursal_model->getRegion();
            $this->load->view('sucursal/register', $data);
            $this->load->view('main/footer');
        } else {
            $data = array(
                'nombre_sucursal' => $this->input->post('txtNombre'),
                'encargado_sucursal' => $this->input->post('txtPropietario'),
                'municipio_sucursal' => $this->input->post('txtMunicipio'),
                'company' => $this->input->post('txtEmpresa'),                
                'telefono_sucursal' => $this->input->post('txtTelefono'),                
                'region_sucursal' => $this->input->post('txtRegion'),
            );
            if ($this->Sucursal_model->insert($data)) {
                redirect(base_url() . 'Sucursal');
            } else {
                $this->load->view('main/index');
                $this->load->view('sucursal/register');
                $this->load->view('main/footer');
            }
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('txtNombre', 'Nombre', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['sucursal'] = $this->Sucursal_model->get_id($id);
            $data['companies'] = $this->Sucursal_model->getCompany();
            $data['departamentos'] = $this->Comun_model->getDepartmentos();
            $data['regiones'] = $this->Sucursal_model->getRegion();
            $this->load->view('main/index');
            $this->load->view('sucursal/update', $data);
            $this->load->view('main/footer');
        } else {
            $data = array(
                'nombre_sucursal' => $this->input->post('txtNombre'),
                'encargado_sucursal' => $this->input->post('txtPropietario'),
                'municipio_sucursal' => $this->input->post('txtMunicipio'),
                'company' => $this->input->post('txtEmpresa'),                
                'telefono_sucursal' => $this->input->post('txtTelefono'), 
                'region_sucursal' => $this->input->post('txtRegion'),
            );
            if ($this->Sucursal_model->update($id, $data)) {
                redirect(base_url() . 'Sucursal');
            } else {
                $this->load->view('main/index');
                $this->load->view('sucursal/update');
                $this->load->view('main/footer');
            }
        }
    }

    public function delete($id)
    {
        $this->Sucursal_model->delete($id);
        redirect(base_url() . 'Sucursal');
    }

}
