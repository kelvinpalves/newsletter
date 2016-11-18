<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RelatorioService
 *
 * @author kelvin
 */
class RelatorioService extends Service {
    public function r001Quantitativo($inicio, $fim) {
        try {
            
            $inicio = $inicio . " 00:00:00";
            $fim = $fim . " 23:59:59";
            
            $sql = "SELECT 
                    YEAR(ts_envio) AS ano,
                    COUNT(CASE WHEN MONTH(ts_envio) = 1 THEN 1 ELSE NULL END) AS janeiro,
                    COUNT(CASE WHEN MONTH(ts_envio) = 2 THEN 1 ELSE NULL END) AS fevereiro,
                    COUNT(CASE WHEN MONTH(ts_envio) = 3 THEN 1 ELSE NULL END) AS marco,
                    COUNT(CASE WHEN MONTH(ts_envio) = 4 THEN 1 ELSE NULL END) AS abril,
                    COUNT(CASE WHEN MONTH(ts_envio) = 5 THEN 1 ELSE NULL END) AS maio,
                    COUNT(CASE WHEN MONTH(ts_envio) = 6 THEN 1 ELSE NULL END) AS junho,
                    COUNT(CASE WHEN MONTH(ts_envio) = 7 THEN 1 ELSE NULL END) AS julho,
                    COUNT(CASE WHEN MONTH(ts_envio) = 8 THEN 1 ELSE NULL END) AS agosto,
                    COUNT(CASE WHEN MONTH(ts_envio) = 9 THEN 1 ELSE NULL END) AS setembro,
                    COUNT(CASE WHEN MONTH(ts_envio) = 10 THEN 1 ELSE NULL END) AS outubro,
                    COUNT(CASE WHEN MONTH(ts_envio) = 11 THEN 1 ELSE NULL END) AS novembro,
                    COUNT(CASE WHEN MONTH(ts_envio) = 12 THEN 1 ELSE NULL END) AS dezembro
                    FROM fila_envio f
                    WHERE 
                    f.ts_envio BETWEEN :inicio AND :fim
                    GROUP BY 1";
            
            $query = Connect::getEm()->getConnection()->prepare($sql);
            
            $array = array(
                ':inicio' => $inicio,
                ':fim' => $fim
            );
            
            $query->execute($array);
            
            return $query->fetchAll();
        } catch (Exception $ex) {
            return array();
        }
    }
    
    public function r001($inicio, $fim) {
        try {
            
            $inicio = $inicio . " 00:00:00";
            $fim = $fim . " 23:59:59";
            
            $sql = "SELECT 
                    f.email,
                    CASE WHEN s.ds_situacao IS NULL THEN 'Não Informado' ELSE s.ds_situacao END AS situacao,
                    CASE WHEN t.titulo IS NULL THEN 'Template Removido' ELSE t.titulo END AS template,
                    CASE WHEN f.ts_envio IS NULL THEN 'Não Informado' ELSE DATE_FORMAT(f.ts_envio, '%d/%m/%Y %H:%i:%s') END AS envio,
                    CASE WHEN f.ts_visualizacao IS NULL THEN 'Não Visualizado' ELSE DATE_FORMAT(f.ts_visualizacao, '%d/%m/%Y %H:%i:%s') END AS visualizacao
                    FROM fila_envio f
                    LEFT JOIN template t ON f.id_template = t.id
                    LEFT JOIN situacao s ON s.id = f.id_situacao
                    WHERE 
                    f.ts_envio BETWEEN :inicio AND :fim";
            
            $query = Connect::getEm()->getConnection()->prepare($sql);
            
            $array = array(
                ':inicio' => $inicio,
                ':fim' => $fim
            );
            
            $query->execute($array);
            
            return $query->fetchAll();
        } catch (Exception $ex) {
            return array();
        }
    }
    
    
    public function r002($inicio, $fim) {
        try {
            
            $inicio = $inicio . " 00:00:00";
            $fim = $fim . " 23:59:59";
            
            $sql = "SELECT 
                    f.email,
                    CASE WHEN s.ds_situacao IS NULL THEN 'Não Informado' ELSE s.ds_situacao END AS situacao,
                    CASE WHEN f.ts_visualizacao IS NULL THEN 'Não Visualizado' ELSE DATE_FORMAT(f.ts_visualizacao, '%d/%m/%Y %H:%i:%s') END AS visualizacao
                    FROM fila_envio f
                    LEFT JOIN situacao s ON s.id = f.id_situacao
                    WHERE 
                    f.ts_envio BETWEEN :inicio AND :fim";
            
            $query = Connect::getEm()->getConnection()->prepare($sql);
            
            $array = array(
                ':inicio' => $inicio,
                ':fim' => $fim
            );
            
            $query->execute($array);
            
            return $query->fetchAll();
        } catch (Exception $ex) {
            return array();
        }
    }
    
    public function r002GraficoPorSituacao($inicio, $fim) {
        try {
            
            $inicio = $inicio . " 00:00:00";
            $fim = $fim . " 23:59:59";
            
            $sql = "SELECT
                    COUNT(CASE WHEN id_situacao = 1 THEN 1 ELSE NULL END) AS aguardando,
                    COUNT(CASE WHEN id_situacao = 2 THEN 1 ELSE NULL END) AS enviado,
                    COUNT(CASE WHEN id_situacao = 3 THEN 1 ELSE NULL END) AS nao_enviado,
                    COUNT(CASE WHEN id_situacao = 4 THEN 1 ELSE NULL END) AS cancelado
                    FROM fila_envio
                    WHERE
                    ts_envio BETWEEN :inicio AND :fim";
            
            $query = Connect::getEm()->getConnection()->prepare($sql);
            
            $array = array(
                ':inicio' => $inicio,
                ':fim' => $fim
            );
            
            $query->execute($array);
            
            return $query->fetchAll();
        } catch (Exception $ex) {
            return array();
        }
    }


    public function r002GraficoPorVisualizacao($inicio, $fim) {
        try {
            
            $inicio = $inicio . " 00:00:00";
            $fim = $fim . " 23:59:59";
            
            $sql = "SELECT
                    COUNT(CASE WHEN ts_visualizacao IS NULL THEN 1 ELSE NULL END) AS nao_visualizado,
                    COUNT(ts_visualizacao) AS visualizado
                    FROM fila_envio
                    WHERE
                    ts_envio BETWEEN :inicio AND :fim";
            
            $query = Connect::getEm()->getConnection()->prepare($sql);
            
            $array = array(
                ':inicio' => $inicio,
                ':fim' => $fim
            );
            
            $query->execute($array);
            
            return $query->fetchAll();
        } catch (Exception $ex) {
            return array();
        }
    }
}
