<?php

/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Registro_model extends CI_Model
{
    public function addmenoruno($data)
    {
        $this->db->insert('vacunas', $data);
        //Retorna un valor booleano depues de insertar datos
        return true;
    }
}
