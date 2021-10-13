<?php
class Autenticar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    // vista principal;
    public function ingresar()
    {
        $this->load->view('login/login');
    }

    public function login()
    {
        if ($this->input->post('txtEmail') && $this->input->post('txtPassword')) {
            $username = $this->input->post('txtEmail');
            $password = $this->input->post('txtPassword');

            $id_login = $this->Login_model->login_user($username, $password);

            if ($id_login) {
                $user_data = array(
                    'id_user' => $id_login->id,
                    'correo' => $id_login->usuario,
                    'id_empleado' => $id_login->id_empleado,
                    'full_name' => $id_login->nombres . ' ' . $id_login->apellidos,
                    'name' => $id_login->nombres,
                    'logeado' => true,
                    'clave' => $password

                );
                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('res_login', 'Bienvenido al sistema  ' . $id_login->nombres . ' ' . $id_login->apellidos);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('res_login', 'Credenciales Incorrectas');
                redirect(base_url() . 'Autenticar');
            }
        }
    }

    public function index()
    {
        $this->load->view('login/login');
    }
}
