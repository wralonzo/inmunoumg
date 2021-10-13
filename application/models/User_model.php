<?php

class User_model extends CI_Model
{


    public function create_user($data)
    {

        $this->db->insert('users', $data);
        return TRUE;
    }

    public function edit_user($idUser, $data)
    {
        $this->db->where('id', $idUser);
        $this->db->update('users', $data);
        return TRUE;
    }

    public function delete_user($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return TRUE;
    }


    public function get_last_id()
    {
        /*Obtiene el ultimo id ingresado a la tabla empleado*/
        $last_id = $this->db->insert_id();
        return $last_id;
    }



    public function login_user($username, $password)
    {
        $this->db->select('
           empleado.id,
           empleado.nombresEmpleado,
           empleado.apellidosEmpleado,
           
           tipoempleado.idTipoEmpleado,
           tipoempleado.tipoEmpleado,
           users.id,
           users.username,
           users.password
  
            ');
        $this->db->from('users');
        $this->db->join('empleado', 'empleado.idEmpleado = users.idEmpleado');
        $this->db->join('tipo_empleado', 'tipo_empleado.id = empleado.idTipoEmpleado');

        $this->db->where('users.username', $username);
        $result = $this->db->get();

        $db_password = $result->row()->password;

        if (password_verify($password, $db_password)) {

            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function get_users()
    {

        // armamos la consulta
        $query = $this->db->query('SELECT id, username FROM users');

        // si hay resultados
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach ($query->result() as $row)
                $users[htmlspecialchars($row->id, ENT_QUOTES)] =
                    htmlspecialchars($row->username, ENT_QUOTES);

            $query->free_result();
            return $users;
        }
    }


    public function update_pass($data, $user_id)
    {

        $this->db->where('idEmpleado', $user_id);
        $this->db->update('users', $data);

        return TRUE;
    }

    public function get_users_info($porpagina, $desde, $id)
    {
        $this->db->select('
           
           empleado.id as idEmpleado,
           empleado.nombres,
           empleado.apellidos,
           empleado.telefono,
           empleado.correo,
           empleado.tipo_empleado,
           empleado.cargo,
           
           tipo_empleado.id as idTipoEmpleado,
           tipo_empleado.nombre,
           
           users.id as idUser,
           users.username       
            ');
        $this->db->from('empleado');

        $this->db->join('tipo_empleado', 'tipo_empleado.id = empleado.tipo_empleado');

        $this->db->join('users', 'users.empleado = empleado.id');

        $this->db->limit($porpagina, $desde);
        if ($id != null) {
            $this->db->where('empleado.id', $id);
        }
        $this->db->where('users.estado', 1);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        } else {
            return $query->result();
        }
    }



    public function get_user_info($id)
    {
        $this->db->from('users');
        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        }

        return $query->row();
    }



    public function get_empleados_info()
    {
        $this->db->select('
           
           empleado.id as idEmpleado,
           empleado.nombres,
           empleado.apellidos,
           empleado.telefono,           
           users.id as idUser,
           users.username       
            ');
        $this->db->from('empleado');
        // $this->db->join('tipo_empleado', 'tipo_empleado.id = empleado.tipo_empleado');

        $this->db->join('users', 'users.empleado = empleado.id');
        $this->db->where('users.estado', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
}
