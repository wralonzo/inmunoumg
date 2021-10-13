<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distritos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Distrito_model');
        $this->load->model('Comun_model');
    }

    public function index()
    {
        $data['distritos'] = $this->Distrito_model->get_all();
        $this->load->view('main/index');
        $this->load->view('distrito/index', $data);
        $this->load->view('main/footer');
    }
    /* 
    El siguiente metodo se implementa para ingresar y actulizar distritos
    contiene el parametro ID que valida, si es ingresar el id lo recibe vacio
    Si el id no es vacio entonces hace una actualizacion de los campos
     */
    public function register($id = '')
    {
        //Se capturan los campos que manda el formulario mediante post
        if ($this->input->post()) {
            //Se almacenan los campos en el arreglo
            $distritos = $this->input->post();
            //Se valida si el id es vacio hace un insert a la base de datos
            //mediante la llamada de un metodo en el modelo que ejecuta la consulta
            if ($id == '') {
                $id = $this->Distrito_model->add($distritos);
                //Se valida que el metodo retorne verdadero si almacena el ditrito
                if ($id) {
                    set_alert('success', 'added_successfully', 'paciente');
                    //Se redireccion a la vista principal de distritos
                    redirect(base_url() . 'Distritos');
                }
            } else {
                //SI el id no es vacio entonces actualiza el registro en la base de datos
                //mediante el metodo de actualizar del modelo 
                $success = $this->Distrito_model->update($id, $distritos);
                //Valida si se actualiza el registro
                if ($success) {
                    set_alert('success', 'updated_successfully', 'paciente');
                    //Si se actualia el registro redireccion a la vista principal de distritos
                    redirect(base_url() . 'Distritos');
                }
            }
        }
        if ($id == '') {
            //Si el di es vacio entonce el titulo de la pagina es nuevo
            $title = 'Nuevo distrito';
        } else {
            //Si el ID no es vacio 
            //se busca el registro que contiene el id que se pasa en la funcion
            // y se almacena en la variable distrito
            $distrito = $this->Distrito_model->get_all($id);
            $data['distrito'] = $distrito;
            //Retorna el id del distrito que se va a editar
            $data['idDistrito'] = $id;

            $data['edit']     = true;
            //Titulo de la pagina
            $title            = 'Editar distrito';
        }
        //Se cargan en la pagina todos los municipios para poder seleccionarlos
        $data['municipios'] = $this->Comun_model->getMunicipio();
        //Mediante esta funcion del marco de trabajo se puede cargar
        //los modelos que se van a utilizar 
        $this->load->model('Departamental_model');

        //Despues de cargar un modelo ya se pueden utilizar las funciones del metodo.
        $data['departamental'] = $this->Departamental_model->get_all();

        //Se manda los parametros a la vista almacenado en un arreglo todos los valores
        //que se desean pasar a la vista.
        $data['title']             = $title;

        //Se cargan las vistas que se desean mostra en la interfaz del usuario.
        //Index contiene archivos css para el diseño
        $this->load->view('main/index');
        //Es la vista principal donde se mandan todos los datos que se desean mostrar
        $this->load->view('distrito/register', $data);
        //Archivos de javascript que require el marco de trabajo de boostrap 
        $this->load->view('main/footer');
    }

    //Funcion que permite elimiar un registro recibe como parametro el id del registro
    public function delete($id)
    {
        //Se consulta la funcion en el modelo donde recibe el id
        $this->Distrito_model->delete($id);
        //Despues de elimiar el registro se redirecciona a la vista pricipal de distritos
        redirect(base_url() . 'Distritos');
    }
}
