<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Control_vacunacion_model extends CI_Model
{


    public function get_all($id = '')
    {
        $this->db->select(
            '
            controlvacunas.idcontrolvacunas,
            controlvacunas.idvacuna,
            controlvacunas.idusuario,
            controlvacunas.fecha,
            controlvacunas.idpaciente,
            controlvacunas.idusuario,
            vacunas.nombre,
            pacientes.nombre as nombrepaciente,
            pacientes.apellido as apellidopaciente,
            empleado.nombres as nombreempleado,
            empleado.apellidos as apellidoempleado,
            '
        );
        $this->db->from('controlvacunas');
        $this->db->join('pacientes', 'pacientes.idpaciente = controlvacunas.idpaciente', 'left');
        $this->db->join('vacunas', 'vacunas.idvacuna = controlvacunas.idvacuna', 'left');
        $this->db->join('users', 'users.id = controlvacunas.idusuario', 'left');
        $this->db->join('empleado', 'empleado.id_empleado = users.empleado', 'left');
        if (is_numeric($id)) {
            $this->db->where('idcontrolvacunas', $id);
            $padres = $this->db->get()->row();
            return $padres;
        }

        $this->db->order_by('idcontrolvacunas', 'desc');

        return $this->db->get()->result();
    }


    public function add($data)
    {
        $this->db->insert('controlvacunas', $data);
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('idcontrolvacunas', $id);
        $this->db->update('controlvacunas', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('idcontrolvacunas', $id);
        $this->db->delete('controlvacunas');
    }
}
