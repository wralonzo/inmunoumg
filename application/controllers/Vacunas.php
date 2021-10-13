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
        $this->load->model('Comun_model');
    }

    public function index()
    {
        $data['vacunas'] = $this->Vacunas_model->get_all();
        $this->load->view('main/index');
        $this->load->view('vacunas/index', $data);
        $this->load->view('main/footer');
    }

    public function register($id = '')
    {
        if ($this->input->post()) {
            $padres_data = $this->input->post();
            if ($id == '') {
                $id = $this->Vacunas_model->add($padres_data);
                if ($id) {
                    set_alert('success', 'added_successfully', 'estimate');
                    redirect(base_url() . 'Vacunas');
                }
            } else {

                $success = $this->Vacunas_model->update($id, $padres_data);
                if ($success) {
                    set_alert('success', 'updated_successfully', 'estimate');
                    redirect(base_url() . 'Vacunas');
                }
            }
        }
        if ($id == '') {
            $title = 'Nuevo padre';
        } else {
            $padre = $this->Vacunas_model->get_all($id);
            $data['vacuna'] = $padre;
            $data['idVacuna'] = $id;
            $data['edit']     = true;
            $title            = 'Editar Vacuna';
        }
        $data['title']             = $title;
        $this->load->view('main/index');
        $this->load->view('vacunas/register', $data);
        $this->load->view('main/footer');
    }
    public function delete($id)
    {
        $this->Vacunas_model->delete($id);
        redirect(base_url() . 'Vacunas');
    }
}
