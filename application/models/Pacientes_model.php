<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Pacientes_model extends CI_Model
{


    public function get_all($id = '')
    {
        $this->db->select(
            '
            pacientes.idpaciente,
            pacientes.nombre as nombrepaciente,
            pacientes.apellido as apellidopaciente,
            pacientes.sexo,
            pacientes.cui,
            pacientes.fechanacimiento,
            pacientes.idpadre,
            padres.nombre as nombrepadre, 
            padres.apellido as apellidopadre
            '
        );
        $this->db->from('pacientes');
        $this->db->join('padres', 'padres.idpadre = pacientes.idpadre', 'left');
        if (is_numeric($id)) {
            $this->db->where('idpaciente', $id);
            $padres = $this->db->get()->row();
            return $padres;
        }

        $this->db->order_by('idpaciente', 'desc');

        return $this->db->get()->result();
    }


    public function add($data)
    {
        $this->db->insert('pacientes', $data);
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('idpaciente', $id);
        $this->db->update('pacientes', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('idpaciente', $id);
        $this->db->delete('pacientes');
    }
}
