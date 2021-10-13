<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Company_model extends CI_Model{


    public function get_all(){
        $this->db->from('municipio');
        $this->db->join('departamento', 'departamento.id_departamento = municipio.deparmaneto_municipio', 'inner');
        $this->db->join('company','municipio.id_municipio = company.municipio_company', 'inner');
        $this->db->join('region','region.id_region = company.region_company', 'inner');
    
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
        $this->db->join('departamento', 'departamento.id_departamento = municipio.deparmaneto_municipio', 'inner');
        $this->db->join('company', 'municipio.id_municipio = company.municipio_company', 'inner');
        $this->db->join('region', 'region.id_region = company.region_company', 'inner');
        $this->db->where('id_company', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return array();
        } else {
            return $query->row();
        }
    }

    public function insert($data)
    {
        $this->db->insert('company',$data);
        return true;

    }

    public function update($id, $data)
    {
        $this->db->where('id_company', $id);
        $this->db->update('company', $data);
        return true;
    }

    public function delete($id){
        $this->db->where('id_company', $id);
        $this->db->delete('company');

    }

    public function getRegion(){
        $query = $this->db->get('region');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }

    }
}
