<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departamental extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Departamental_model');
        $this->load->model('Comun_model');
    }

    public function index()
    {
        $data['departamentales'] = $this->Departamental_model->get_all();
        $this->load->view('main/index');
        $this->load->view('departamental/index', $data);
        $this->load->view('main/footer');
    }

    public function register($id = '')
    {
        if ($this->input->post()) {
            $padres_data = $this->input->post();
            // draw_debug($padres_data);
            if ($id == '') {
                $id = $this->Departamental_model->add($padres_data);
                if ($id) {
                    set_alert('success', 'added_successfully', 'paciente');
                    redirect(base_url() . 'Departamental');
                }
            } else {

                $success = $this->Departamental_model->update($id, $padres_data);
                if ($success) {
                    set_alert('success', 'updated_successfully', 'paciente');
                    redirect(base_url() . 'Departamental');
                }
            }
        }
        if ($id == '') {
            $title = 'Nuevo paciente';
        } else {
            $padre = $this->Departamental_model->get_all($id);
            $data['departamental'] = $padre;
            $data['idDepartamental'] = $id;
            $data['edit']     = true;
            $title            = 'Editar departamental';
        }
        $data['title']             = $title;
        $data['municipios'] = $this->Comun_model->getMunicipio();

        $this->load->view('main/index');
        $this->load->view('departamental/register', $data);
        $this->load->view('main/footer');
    }

    public function delete($id)
    {
        $this->Departamental_model->delete($id);
        redirect(base_url() . 'Departamental');
    }
}
