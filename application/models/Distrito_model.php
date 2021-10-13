<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Distrito_model extends CI_Model
{


    public function get_all($id = '')
    {
        $this->db->select(
            '
            distritos.iddistrito,
            distritos.codigo as codigodistrito,
            distritos.ubicacion,
            distritos.encargado,
            departamental.iddepartamental,
            departamental.codigo as departamental,
            municipio.nombre_municipio as municipio,
            municipio.id_municipio,
            '
        );
        $this->db->from('distritos');
        $this->db->join('departamental', 'departamental.iddepartamental = distritos.departamental', 'left');
         $this->db->join('municipio', 'municipio.id_municipio = distritos.municipio', 'left');
        $this->db->join('departamento', 'departamento.id_departamento = municipio.deparmaneto_municipio', 'left');
        if (is_numeric($id)) {
            $this->db->where('iddistrito', $id);
            $padres = $this->db->get()->row();
            return $padres;
        }

        $this->db->order_by('iddistrito', 'desc');

        return $this->db->get()->result();
    }


    public function add($data)
    {
        $this->db->insert('distritos', $data);
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('iddistrito', $id);
        $this->db->update('distritos', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('iddistrito', $id);
        $this->db->delete('distritos');
    }
}
