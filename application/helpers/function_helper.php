<?php

function draw_debug($value, $stop = true)
{
    echo "<pre>";
    var_dump($value);
    if ($stop) die();
}

function set_alert($type, $message)
{
    get_instance()->session->set_flashdata('message-' . $type, $message);
}

function fechas($date)
{
    return date('d-m-Y', strtotime($date));
}

function totalVacunado($sexo)
{
    $CI = &get_instance();
    $stringquery = "
        SELECT COUNT(controlvacunas.idcontrolvacunas) as total FROM `controlvacunas` 
        INNER JOIN pacientes on pacientes.idpaciente = controlvacunas.idpaciente 
        INNER JOIN vacunas on vacunas.idvacuna = controlvacunas.idvacuna 
        WHERE pacientes.sexo = '{$sexo}'
    ";
    $res = $CI->db->query($stringquery);
    return $res->row()->total;
}

function totalpacientes()
{
    $CI = &get_instance();
    $stringquery = "
        SELECT count(idcontrolvacunas) as paciente
        FROM controlvacunas
    ";
    $res = $CI->db->query($stringquery);
    return $res->row()->paciente;
}
function fechas_vacunacion()
{
    $CI = &get_instance();
    $stringquery = "
        SELECT fecha
        FROM pacientes
    ";
    $res = $CI->db->query($stringquery);
    $fechas = [];
    foreach ($res->result() as $row) {
        array_push($fechas, fechas($row->fecha));
    }
    return $fechas;
}

function totaldepaciente($sexo)
{
    $CI = &get_instance();
    $stringquery = "
        SELECT COUNT(*) as total 
            FROM pacientes 
            WHERE sexo = '{$sexo}'    
    ";
    $res = $CI->db->query($stringquery);
    return $res->row()->total;
}
function totalpacientesReporte()
{
    $CI = &get_instance();
    $stringquery = "
        SELECT count(*) as paciente
        FROM pacientes
    ";
    $res = $CI->db->query($stringquery);
    return $res->row()->paciente;
}

function reportemes()
{
    $CI = &get_instance();
    $anio = date("Y");
    $query = "SELECT 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 1 THEN 1 ELSE 0 END) AS Ene, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 2 THEN 1 ELSE 0 END) AS Feb, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 3 THEN 1 ELSE 0 END) AS Mar, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 4 THEN 1 ELSE 0 END) AS Abr, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 5 THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 6 THEN 1 ELSE 0 END) AS Jun, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 7 THEN 1 ELSE 0 END) AS Jul, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 8 THEN 1 ELSE 0 END) AS Ago, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 9 THEN 1 ELSE 0 END) AS Sep, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 10 THEN 1 ELSE 0 END) AS Oct, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 11 THEN 1 ELSE 0 END) AS Nov, 
                SUM(CASE WHEN MONTH(controlvacunas.fecha) = 12 THEN 1 ELSE 0 END) AS Dic 
                FROM controlvacunas 
                WHERE controlvacunas.fecha 
                BETWEEN '{$anio}-01-01' AND '{$anio}-12-31';
                ";
    $res = $CI->db->query($query);
    return $res->row();
}
