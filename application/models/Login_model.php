<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Login_model extends CI_Model
{


    public function get_all(){
        $this->db->from('empleado');
        $this->db->join('users', 'users.empleado = empleado.id_empleado');
    
        // $this->db->where('users.status', 1);
        $query = $this->db->get();

        if ($query->num_rows() < 1){
            return FALSE;
        }
        else{
            return $query->result();
        }
    }

    public function insertar_usuario($data)
    {
        $this->db->insert('users',$data);
        return true;

    }
    public function insertar_empleado($data)
    {
        $this->db->insert('empleado', $data);
        return $this->db->insert_id();
    }
      
    public function login_user($username, $password){
        $this->db->from('users');
        $this->db->join('empleado', 'empleado.id_empleado = users.empleado');    
        $this->db->where('users.status', 1);
        $this->db->where('usuario', $username);
        $result = $this->db->get();

        $db_password = $result->row(3)->clave;

        if(password_verify($password, $db_password)){
            return $result->row();
        }
        else{
            return FALSE;
        }
    }

    public function usuario_id($idLogin)
    {
        $this->db->from('empleado');
        $this->db->join('users', 'users.empleado = empleado.id_empleado');
        $this->db->where('empleado.id_empleado' ,$idLogin);
        $data = $this->db->get();
        if($data->num_rows() > 0){
            return $data->row();
        }else{
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

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('users');

    }

    public function deleteEmpleado($id){
        $this->db->where('id_empleado', $id);
        $this->db->delete('empleado');
    }


}
?>