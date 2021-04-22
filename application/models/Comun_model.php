<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Comun_model extends CI_Model
{
    public function getRegion(){
        $query = $this->db->get('region');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }

    }

    public function getDepartamentosJSON(){
        $query = $this->db->get('departamento');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getMunicipiosJSON($departamento){
        $this->db->from('municipio');
        $this->db->join('departamento', 'departamento.id_departamento = municipio.deparmaneto_municipio');
        $this->db->where('departamento.id_departamento', $departamento);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return array();
        }
    }

    public function getDepartmentos(){
        $query = $this->db->get('departamento');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getSucursalesJSON($company){
        $this->db->from('sucursal');
        $this->db->join('company', 'sucursal.company = company.id_company');
        $this->db->where('company.id_company', $company);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return array();
        }
    }

    public function getFechas($fechaincio, $fechafin){
        $this->db->from('queja');
        $this->db->join('sucursal', 'sucursal.id_sucursal = queja.sucursal_queja');
        $this->db->join('company', 'company.id_company = sucursal.company');
        $this->db->join('empleado', 'empleado.id_empleado = queja.empleado_queja');
        $this->db->join('region', 'region.id_region = sucursal.region_sucursal');
        $this->db->join('municipio', 'municipio.id_municipio = sucursal.municipio_sucursal');
        $this->db->join('departamento', 'municipio.deparmaneto_municipio = departamento.id_departamento');
        


        $this->db->where("DATE_FORMAT(queja.fecha,'%Y-%m-%d') >=", $fechaincio);
        $this->db->where("DATE_FORMAT(queja.fecha,'%Y-%m-%d') <=", $fechafin);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return array();
        } else {
            return $query->result();
        }
    }

    public function getMunicipio($buscar)
    {
        $this->db->from('queja');
        $this->db->join('sucursal', 'sucursal.id_sucursal = queja.sucursal_queja');
        $this->db->join('company', 'company.id_company = sucursal.company');
        $this->db->join('empleado', 'empleado.id_empleado = queja.empleado_queja');
        $this->db->join('region', 'region.id_region = sucursal.region_sucursal');
        $this->db->join('municipio', 'municipio.id_municipio = sucursal.municipio_sucursal');
        $this->db->join('departamento', 'municipio.deparmaneto_municipio = departamento.id_departamento');

        $this->db->where("municipio.id_municipio", $buscar);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return array();
        } else {
            return $query->result();
        }
    }

    public function getDepartamento($buscar)
    {
        $this->db->from('queja');
        $this->db->join('sucursal', 'sucursal.id_sucursal = queja.sucursal_queja');
        $this->db->join('company', 'company.id_company = sucursal.company');
        $this->db->join('empleado', 'empleado.id_empleado = queja.empleado_queja');
        $this->db->join('region', 'region.id_region = sucursal.region_sucursal');
        $this->db->join('municipio', 'municipio.id_municipio = sucursal.municipio_sucursal');
        $this->db->join('departamento', 'municipio.deparmaneto_municipio = departamento.id_departamento');

        $this->db->where("departamento.id_departamento", $buscar);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return array();
        } else {
            return $query->result();
        }
    }

    public function getRegionReport($buscar)
    {
        $this->db->from('queja');
        $this->db->join('sucursal', 'sucursal.id_sucursal = queja.sucursal_queja');
        $this->db->join('company', 'company.id_company = sucursal.company');
        $this->db->join('empleado', 'empleado.id_empleado = queja.empleado_queja');
        $this->db->join('region', 'region.id_region = sucursal.region_sucursal');
        $this->db->join('municipio', 'municipio.id_municipio = sucursal.municipio_sucursal');
        $this->db->join('departamento', 'municipio.deparmaneto_municipio = departamento.id_departamento');

        $this->db->where("region.id_region", $buscar);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return array();
        } else {
            return $query->result();
        }
    }

    public function getComerciosNoQuejas(){

        $this->db->from('queja');
        $this->db->join('empleado','empleado.id_empleado = queja.empleado_queja', 'LEFT');
        $this->db->join('sucursal', 'sucursal.id_sucursal = queja.sucursal_queja', 'RIGHT');
        $this->db->join('company', 'company.id_company = sucursal.company', 'LEFT');
        $this->db->join('region','region.id_region = sucursal.region_sucursal', 'LEFT');
        $this->db->join('municipio','municipio.id_municipio = sucursal.municipio_sucursal', 'LEFT');
        $this->db->join('departamento','municipio.deparmaneto_municipio = departamento.id_departamento', 'LEFT');
        $this->db->where('queja.id_queja', null);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return array();
        } else {
            return $query->result();
        }
    }
}
