<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Queja_model extends CI_Model
{


    public function get_all(){
        $this->db->from('queja');
        $this->db->join('sucursal', 'sucursal.id_sucursal = queja.sucursal_queja');
        $this->db->join('company', 'company.id_company = sucursal.company');
        $this->db->join('empleado', 'empleado.id_empleado = queja.empleado_queja');
    
        // $this->db->where('users.status', 1);
        $query = $this->db->get();

        if ($query->num_rows() < 1){
            return array();
        }
        else{
            return $query->result();
        }
    }
    public function get_id($id)
    {
        $this->db->from('queja');
        $this->db->join('sucursal', 'sucursal.id_sucursal = queja.sucursal_queja');
        $this->db->join('company', 'company.id_company = sucursal.company');
        $this->db->join('empleado', 'empleado.id_empleado = queja.empleado_queja');
        $this->db->where('queja.id_queja', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return array();
        } else {
            return $query->row();
        }
    }

    public function insert($data)
    {
        $this->db->insert('queja',$data);
        return true;

    }

    public function update($id, $data)
    {
        $this->db->where('id_queja', $id);
        $this->db->update('queja', $data);
        return true;
    }

    public function delete($id){
        $this->db->where('id_queja', $id);
        $this->db->delete('queja');

    }
    public function getCompany()
    {
        $query = $this->db->get('company');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
