<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Padres extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Padres_model');
        $this->load->model('Comun_model');
    }
    //Funcion del controlador que permite visualiar todos los registros de los padres 
    //en formato HTML 
    public function index()
    {
        //Se obtinen todos los datos de los padres almacenados en la base de datos.
        $data['padres'] = $this->Padres_model->get_all();
        //Se cargan las vistas que se desean mostra en la interfaz del usuario.
        //Index contiene archivos css para el diseño
        $this->load->view('main/index');
        //Es la vista principal donde se mandan todos los datos que se desean mostrar
        $this->load->view('padres/index', $data);
        //Archivos de javascript que require el marco de trabajo de boostrap 
        $this->load->view('main/footer');
    }

    public function register($id = '')
    {
        if ($this->input->post()) {
            $padres_data = $this->input->post();
            if ($id == '') {
                $id = $this->Padres_model->add($padres_data);
                if ($id) {
                    set_alert('success', 'added_successfully', 'estimate');
                    redirect(base_url() . 'Padres');
                }
            } else {

                $success = $this->Padres_model->update($id, $padres_data);
                if ($success) {
                    set_alert('success', 'updated_successfully', 'estimate');
                    redirect(base_url() . 'Padres');
                }
            }
        }
        if ($id == '') {
            $title = 'Nuevo padre';
        } else {
            $padre = $this->Padres_model->get_all($id);
            $data['padre'] = $padre;
            $data['idPadre'] = $id;
            $data['edit']     = true;
            $title            = 'Editar padre';
        }
        $data['title']             = $title;
        $this->load->view('main/index');
        $this->load->view('padres/register', $data);
        $this->load->view('main/footer');
    }
    public function delete($id)
    {
        $this->Padres_model->delete($id);
        redirect(base_url() . 'Padres');
    }
}
