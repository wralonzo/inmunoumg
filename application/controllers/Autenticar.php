<?php 
class Autenticar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->model('Queja_model');
        $this->load->model('Comun_model');

    }

    // vista principal;
    public function ingresar(){
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
                    'logeado' => true
                );
                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('res_login', 'Bienvenido al sistema  ' . $id_login->nombres. ' ' . $id_login->apellidos );
                redirect(base_url());
            } else {
                $this->session->set_flashdata('res_login', 'Credenciales Incorrectas');
                redirect(base_url() . 'Autenticar');
            }
        }
    }

    public function index(){
        $this->form_validation->set_rules('txtNombre', 'Nombre', 'trim|required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $data['companies'] = $this->Queja_model->getCompany();
            $this->load->view('quejas/quejatodos', $data);
        } else {
            $data = array(
                'concepto_queja' => $this->input->post('txtNombre'),
                'descripcion_queja' => $this->input->post('txtPropietario'),
                'sucursal_queja' => $this->input->post('txtSucursal'),
                'empleado_queja' => 12
            );
            if ($this->Queja_model->insert($data)) {
                $this->session->set_flashdata('res_queja', 'Queja Registrada Correctamente');
                redirect(base_url() . 'Autenticar');
            } else {
                 $data['companies'] = $this->Queja_model->getCompany();
                $this->load->view('quejas/quejatodos', $data); 
            }
        
        }
    }

      public function getSucursalesJSON($company){
        $results = $this->Comun_model->getSucursalesJSON($company);
        echo json_encode($results);
    }
}
