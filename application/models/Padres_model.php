<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Padres_model extends CI_Model
{


    public function get_all($id = '')
    {
        //Valida si el id es numerico ejecuta la consulta por ID
        if (is_numeric($id)) {
            //Filtra por el id del padre
            $this->db->where('idpadre', $id);
            //Se almacena en la variable, lo que retorna la consulta
            $padres = $this->db->get('padres')->row();
            //Se retorna la fila con comple con el parametro ID
            return $padres;
        }
        //Se ordena por ID de forma Descendente
        $this->db->order_by('idpadre', 'desc');
        //Retorna el arreglo con todos los datos de la tabla padres
        return $this->db->get('padres')->result();
    }


    public function add($data)
    {
        $this->db->insert('padres', $data);
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('idpadre', $id);
        $this->db->update('padres', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('idpadre', $id);
        $this->db->delete('padres');
    }
}
