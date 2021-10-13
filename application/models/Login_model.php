<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Login_model extends CI_Model
{


    public function get_all()
    {
        $this->db->from('empleado');
        $this->db->join('users', 'users.empleado = empleado.id_empleado');
        $this->db->join('distritos', 'distritos.iddistrito = users.distrito', 'left');


        // $this->db->where('users.status', 1);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insertar_usuario($data)
    {
        $this->db->insert('users', $data);
        return true;
    }
    public function insertar_empleado($data)
    {
        $this->db->insert('empleado', $data);
        return $this->db->insert_id();
    }

    public function login_user($username, $password)
    {
        //Tabla principal de la consulata
        $this->db->from('users');
        //Inner Join para consultar el empleado y el usuario
        $this->db->join('empleado', 'empleado.id_empleado = users.empleado');
        //Parametro que valida si el usuario esta activo
        $this->db->where('users.status', 1);
        //Parametro que filta el usuario 
        $this->db->where('usuario', $username);

        //Se captura en una variable lo que retorna la consulta anterior
        $result = $this->db->get();

        //Se almacena el campo de la contraseña
        $db_password = $result->row(3)->clave;

        //Se valida con una función especifa el hash en la base de datos
        // es igual al ingresado, si se cumplen todos los parametros retorna
        //la fila con los campos del usuario
        if (password_verify($password, $db_password)) {
            //Retorna un arreglo con los campos obtenidos en la consulta
            return $result->row();
        } else {
            //Si el usuario no cumple los parametros retorna un valor booleano
            return FALSE;
        }
    }

    public function usuario_id($idLogin)
    {
        $this->db->from('empleado');
        $this->db->join('users', 'users.empleado = empleado.id_empleado');
        $this->db->where('users.id', $idLogin);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->row();
        } else {
            return false;
        }
    }

    public function actualizarEmpleado($id, $data, $datauser, $userid)
    {
        $this->db->where('id_empleado', $id);
        $this->db->update('empleado', $data);
        $this->actualizarUser($userid, $datauser);
        return true;
    }
    public function actualizarUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return true;
    }

    public function update_password($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function deleteEmpleado($id)
    {
        $this->db->where('id_empleado', $id);
        $this->db->delete('empleado');
    }
}
