<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Departamental_model extends CI_Model
{


    public function get_all($id = '')
    {
        $this->db->from('departamental');
        $this->db->join('municipio', 'municipio.id_municipio = departamental.idmunicipio', 'left');
        $this->db->join('departamento', 'departamento.id_departamento = municipio.deparmaneto_municipio', 'left');
        if (is_numeric($id)) {
            $this->db->where('iddepartamental', $id);
            $padres = $this->db->get()->row();
            return $padres;
        }
        $this->db->order_by('iddepartamental', 'desc');

        return $this->db->get()->result();
    }


    public function add($data)
    {
        $this->db->insert('departamental', $data);
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('iddepartamental', $id);
        $this->db->update('departamental', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('iddepartamental', $id);
        $this->db->delete('departamental');
    }
}
