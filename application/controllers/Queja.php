<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Queja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }

        $this->load->model('Queja_model');
        $this->load->model('Login_model');
        $this->load->model('Queja_model');
        $this->load->model('Comun_model');
    }

    public function index()
    {
        $data['quejas'] = $this->Queja_model->get_all();
        $this->load->view('main/index');
        $this->load->view('quejas/index', $data);
        $this->load->view('main/footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('txtNombre', 'Nombre', 'trim|required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/index');
            $data['companies'] = $this->Queja_model->getCompany();
            $this->load->view('quejas/register', $data);
            $this->load->view('main/footer');
        } else {
            $data = array(
                'concepto_queja' => $this->input->post('txtNombre'),
                'descripcion_queja' => $this->input->post('txtPropietario'),
                'sucursal_queja' => $this->input->post('txtSucursal'),
                'empleado_queja' => $this->session->userdata('id_empleado')
            );
            if ($this->Queja_model->insert($data)) {
                redirect(base_url() . 'Queja');
            } else {
                $this->load->view('main/index');
                $this->load->view('quejas/register');
                $this->load->view('main/footer');
            }
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('txtNombre', 'Nombre', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['queja'] = $this->Queja_model->get_id($id);
            $data['companies'] = $this->Queja_model->getCompany();
            $this->load->view('main/index');
            $this->load->view('quejas/update', $data);
            $this->load->view('main/footer');
        } else {
             $data = array(
                'concepto_queja' => $this->input->post('txtNombre'),
                'descripcion_queja' => $this->input->post('txtPropietario'),
                'sucursal_queja' => $this->input->post('txtSucursal'),
                'empleado_queja' => $this->session->userdata('id_empleado')
            );
            if ($this->Queja_model->update($id, $data)) {
                redirect(base_url() . 'Queja');
            } else {
                $this->load->view('main/index');
                $this->load->view('quejas/update');
                $this->load->view('main/footer');
            }
        }
    }

    public function delete($id)
    {
        $this->Queja_model->delete($id);
        redirect(base_url() . 'Queja');
    }
}
