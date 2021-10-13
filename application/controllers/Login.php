<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 13:51
 */

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logeado')) {

            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Autenticar');
        }
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    //vista principal;
    public function index()
    {
        $data['usuarios'] = $this->Login_model->get_all();
        $this->load->view('main/index');
        $this->load->view('login/display', $data);
        $this->load->view('main/footer');
    }
    #registrar usuarios en el sistema
    public function register()
    {
        // if ($this->session->userdata('rol')==('admin')){
        $this->form_validation->set_rules('txtClave', 'Password', 'trim|required|min_length[5]');

        $options = ['cost' => 12];
        $encripted_pass = password_hash($this->input->post('txtClave'), PASSWORD_BCRYPT,  $options);

        if ($this->form_validation->run() == FALSE) {
            // $data['users_data'] = $this->Empleado_model->get_all();
            $this->load->view('main/index');
            $this->load->view('login/register');
            $this->load->view('main/footer');
        } else {
            $dataempleado = array(
                'nombres' => $this->input->post('txtNombres'),
                'apellidos' => $this->input->post('txtApellidos'),
                'correo' => $this->input->post('txtCorreo'),
                'direccion' => $this->input->post('txtDireccion'),
                'telefono' => $this->input->post('txtTelefono'),
            );
            $idEmpleado = $this->Login_model->insertar_empleado($dataempleado);
            $data = array(
                'usuario' => $this->input->post('txtCorreo'),
                'clave' => $encripted_pass,
                'empleado' => $idEmpleado,
                'status' => 1
            );
            $this->Login_model->insertar_usuario($data);
            redirect('Login');
        }
    }

    public function register_user($id = '')
    {
        if ($this->input->post()) {
            $options = ['cost' => 12];
            $encripted_pass = password_hash($this->input->post('txtClave'), PASSWORD_BCRYPT,  $options);
            $padres_data = $this->input->post();
            // draw_debug($padres_data);
            if ($id == '') {

                $dataempleado = array(
                    'nombres' => $this->input->post('txtNombres'),
                    'apellidos' => $this->input->post('txtApellidos'),
                    'correo' => $this->input->post('txtCorreo'),
                );
                $idEmpleado = $this->Login_model->insertar_empleado($dataempleado);
                $data = array(
                    'usuario' => $this->input->post('txtCorreo'),
                    'clave' => $encripted_pass,
                    'empleado' => $idEmpleado,
                    'rol' => $this->input->post('rol'),
                    'status' => 1,
                    'distrito' => $this->input->post('distrito')
                );
                $id = $this->Login_model->insertar_usuario($data);
                if ($id) {
                    set_alert('success', 'added_successfully', 'paciente');
                    redirect(base_url() . 'Login');
                }
            } else {
                $data = array(
                    'nombres' => $this->input->post('txtNombres'),
                    'apellidos' => $this->input->post('txtApellidos'),
                    'correo' => $this->input->post('txtCorreo'),
                );
                $datauser = array(
                    'usuario' => $this->input->post('txtCorreo'),
                    'empleado' => $this->input->post('id_empleado'),
                    'rol' => $this->input->post('rol'),
                    'distrito' => $this->input->post('distrito'),
                );

                $success = $this->Login_model->actualizarEmpleado($this->input->post('id_empleado'), $data, $datauser, $id);
                if ($success) {
                    set_alert('success', 'updated_successfully', 'paciente');
                    redirect(base_url() . 'Login');
                }
            }
        }
        if ($id == '') {
            $title = 'Nuevo';
            $data['editar'] = false;
        } else {
            $user = $this->Login_model->usuario_id($id);
            $data['user'] = $user;
            $data['idUser'] = $id;
            $data['editar'] = true;
            $title            = 'Editar';
        }
        $this->load->model('Distrito_model');
        $data['distritos'] = $this->Distrito_model->get_all();
        $data['title']             = $title;

        $this->load->view('main/index');
        $this->load->view('login/register', $data);
        $this->load->view('main/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('txtNombres', 'Nombre', 'trim|required|min_length[2]');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->Login_model->usuario_id($id);
            $this->load->view('main/index');
            $this->load->view('login/update', $data);
            $this->load->view('main/footer');
        } else {

            $data = array(
                'nombres' => $this->input->post('txtNombres'),
                'apellidos' => $this->input->post('txtApellidos'),
                'correo' => $this->input->post('txtCorreo'),
                'direccion' => $this->input->post('txtDireccion'),
                'telefono' => $this->input->post('txtTelefono')
            );
            $datauser = array(
                'usuario' => $this->input->post('txtCorreo')
            );
            if ($this->Login_model->actualizarEmpleado($id, $data, $datauser, $this->input->post('txtUsuario'))) {
                redirect('Login');
            } else {
                $data['user'] = $this->Login_model->usuario_id($id);
                $this->load->view('main/index');
                $this->load->view('login/update', $data);
                $this->load->view('main/footer');
            }
        }
    }


    public function delete($id)
    {
        $this->Login_model->delete($id);
        $empleado = $this->Login_model->usuario_id($id);
        $this->Login_model->deleteEmpleado($empleado);
        redirect('Login');
    }

    public function miPerfil($id)
    {
        if ($id ==  $this->session->userdata('id_user')) {
            redirect('Login/register_user/' . $id);
        } else {
            $this->session->set_flashdata('res_login', 'No puedes editar este Perfil');
            redirect(base_url());
        }
    }

    public function cambiar_password($id)
    {
        $this->form_validation->set_rules('txtClave', 'Clave', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $data['id'] = $id;
            $this->load->view('main/index');
            $this->load->view('login/clave', $data);
            $this->load->view('main/footer');
        } else {
            if ($id ==  $this->session->userdata('id_user')) {
                $options = ['cost' => 12];
                $encripted_pass = password_hash($this->input->post('txtClave'), PASSWORD_BCRYPT,  $options);

                $data = array(
                    'clave' => $encripted_pass
                );

                if ($this->Login_model->update_password($id, $data)) {
                    $this->session->set_flashdata('res_login', 'Clave Actualizada');
                    redirect(base_url());
                } else {
                    $this->load->view('main/index');
                    $this->load->view('login/clave');
                    $this->load->view('main/footer');
                }
            } else {
                $this->session->set_flashdata('res_login', 'No Puedes editar esta clave');
                redirect(base_url());
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'Autenticar');
    }
}//end
