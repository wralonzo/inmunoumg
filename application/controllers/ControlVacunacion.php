<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlVacunacion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Control_vacunacion_model');
        $this->load->model('Comun_model');
    }

    public function index()
    {
        $data['vacunas'] = $this->Control_vacunacion_model->get_all();
        $this->load->view('main/index');
        $this->load->view('controlvacunacion/index', $data);
        $this->load->view('main/footer');
    }

    public function register($id = '')
    {
        if ($this->input->post()) {
            $padres_data = $this->input->post();
            // draw_debug($padres_data);
            if ($id == '') {
                $id = $this->Control_vacunacion_model->add($padres_data);
                if ($id) {
                    set_alert('success', 'added_successfully', 'paciente');
                    redirect(base_url() . 'ControlVacunacion');
                }
            } else {

                $success = $this->Control_vacunacion_model->update($id, $padres_data);
                if ($success) {
                    set_alert('success', 'updated_successfully', 'paciente');
                    redirect(base_url() . 'ControlVacunacion');
                }
            }
        }
        if ($id == '') {
            $title = 'Nuevo';
        } else {
            $padre = $this->Control_vacunacion_model->get_all($id);
            $data['vacuna'] = $padre;
            $data['idVacuna'] = $id;
            $title            = 'Editar';
        }
        $data['title']             = $title;
        $this->load->model('Pacientes_model');
        $pacientes = $this->Pacientes_model->get_all();
        $this->load->model('Vacunas_model');
        $vacunas = $this->Vacunas_model->get_all();

        $this->load->model('Login_model');
        $users = $this->Login_model->get_all();

        $data['pacientes']             = $pacientes;
        $data['vacunas']               = $vacunas;
        $data['users']                 = $users;

        $this->load->view('main/index', $data);
        $this->load->view('controlvacunacion/register', $data);
        $this->load->view('main/footer');
    }

    public function delete($id)
    {
        $this->Control_vacunacion_model->delete($id);
        redirect(base_url() . 'ControlVacunacion');
    }
}
