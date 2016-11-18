<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ini_set('display_errors', 7);
ini_set('display_startup_errors', 7);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

function ListarConflitosSecaoAgente($mdb2_talao, $id_pda, $matricula, $data_hora_infr) {
    $existe_secao_agente_conflito = false;
    $conflitos_agente = '';

    $array_conflitos = array();

    $sql = "select num_serie_disp
            from secao_agente_pda,
            (
                select max(data_hora_login) as menor_data_hora_conflito, min(coalesce(data_hora_logout, '$data_hora_infr')) as maior_data_hora_conflito
                from secao_agente_pda
                WHERE upper(matricula_funcional) = '" . strtoupper($matricula) . "' AND 
                '$data_hora_infr' between data_hora_login and coalesce(data_hora_logout, '$data_hora_infr')
            ) periodo_conflito
            WHERE upper(matricula_funcional) = '" . strtoupper($matricula) . "' AND num_serie_disp <> '$id_pda' AND 
            '$data_hora_infr' between data_hora_login and coalesce(data_hora_logout, '$data_hora_infr') AND
            '$data_hora_infr' between periodo_conflito.menor_data_hora_conflito AND periodo_conflito.maior_data_hora_conflito
            order by 1";
    
    $result = & $mdb2_talao->query($sql);
    while (($row = $result->fetchRow())) {
        $array_conflitos[] = Decriptografar($row[0]);
    }

    $existe_secao_agente_conflito = (count($array_conflitos) > 0);
    $conflitos_agente = implode(",", $array_conflitos);

    if ($conflitos_agente != "") {
        $conflitos_agente = Criptografar($conflitos_agente);
    }

    return compact('existe_secao_agente_conflito', 'conflitos_agente');
}
