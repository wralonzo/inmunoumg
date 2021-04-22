<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Sucursal_model extends CI_Model
{


    public function get_all(){
        $this->db->from('municipio');
        $this->db->join('departamento', 'departamento.id_departamento = municipio.deparmaneto_municipio');
        $this->db->join('sucursal', 'sucursal.municipio_sucursal = municipio.id_municipio');
        $this->db->join('company', 'sucursal.company = company.id_company');
        $this->db->join('region', 'region.id_region = sucursal.region_sucursal');
    
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
        $this->db->from('municipio');
        $this->db->join('departamento', 'departamento.id_departamento = municipio.deparmaneto_municipio');
        $this->db->join('sucursal', 'sucursal.municipio_sucursal = municipio.id_municipio');
        $this->db->join('company', 'sucursal.company = company.id_company');
        $this->db->join('region', 'region.id_region = sucursal.region_sucursal');
        $this->db->where('sucursal.id_sucursal', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return array();
        } else {
            return $query->row();
        }
    }

    public function insert($data)
    {
        $this->db->insert('sucursal',$data);
        return true;

    }

    public function update($id, $data)
    {
        $this->db->where('id_sucursal', $id);
        $this->db->update('sucursal', $data);
        return true;
    }

    public function delete($id){
        try {
        $this->db->where('id_sucursal', $id);
        $this->db->delete('sucursal');
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getRegion(){
        $query = $this->db->get('region');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
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
?>