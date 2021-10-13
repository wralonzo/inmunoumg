<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pacientes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Pacientes_model');
        $this->load->model('Comun_model');
    }

    public function index()
    {
        $data['pacientes'] = $this->Pacientes_model->get_all();
        $this->load->view('main/index');
        $this->load->view('pacientes/index', $data);
        $this->load->view('main/footer');
    }

    public function register($id = '')
    {
        if ($this->input->post()) {
            $padres_data = $this->input->post();
            // draw_debug($padres_data);
            if ($id == '') {
                $id = $this->Pacientes_model->add($padres_data);
                if ($id) {
                    set_alert('success', 'added_successfully', 'paciente');
                    redirect(base_url() . 'Pacientes');
                }
            } else {

                $success = $this->Pacientes_model->update($id, $padres_data);
                if ($success) {
                    set_alert('success', 'updated_successfully', 'paciente');
                    redirect(base_url() . 'Pacientes');
                }
            }
        }
        if ($id == '') {
            $title = 'Nuevo paciente';
        } else {
            $padre = $this->Pacientes_model->get_all($id);
            $data['paciente'] = $padre;
            $data['idPaciente'] = $id;
            $data['edit']     = true;
            $title            = 'Editar paciente';
        }
        $data['title']             = $title;
        $this->load->model('Padres_model');
        $padres = $this->Padres_model->get_all();
        $data['padres']             = $padres;

        $this->load->view('main/index');
        $this->load->view('pacientes/register', $data);
        $this->load->view('main/footer');
    }

    public function delete($id)
    {
        $this->Pacientes_model->delete($id);
        redirect(base_url() . 'Pacientes');
    }
}
