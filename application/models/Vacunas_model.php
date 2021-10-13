<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Vacunas_model extends CI_Model
{


    public function get_all($id = '')
    {

        $this->db->from('vacunas');
        if (is_numeric($id)) {
            $this->db->where('idvacuna', $id);
            $padres = $this->db->get()->row();
            return $padres;
        }

        $this->db->order_by('idvacuna', 'desc');

        return $this->db->get()->result();
    }


    public function add($data)
    {
        //Inserta los campos a la base de datos
        $this->db->insert('vacunas', $data);
        //Retorna un valor booleano depues de insertar datos
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('idvacuna', $id);
        $this->db->update('vacunas', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('idvacuna', $id);
        $this->db->delete('vacunas');
    }
}
