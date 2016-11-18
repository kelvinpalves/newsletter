<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HistoricoService
 *
 * @author kelvin
 */
class HistoricoService extends Service {
    public function buscarPorMesAno($mes, $ano) {
        try{
            $query = Connect::getEm()->getConnection()->prepare('select count(*) as total_mes from fila_envio where mes = ? and ano = ?');
            $query->execute(array($mes, $ano));
            return $query->fetch()['total_mes'];
        } catch (Exception $ex) {
            $this->log->error($ex);
            return null;
        }
    }
    
    
    public function buscarTotalEnviado() {
        try{
            $query = Connect::getEm()->getConnection()->prepare('select count(*) as total from fila_envio');
            $query->execute();
            return $query->fetch()['total'];
        } catch (Exception $ex) {
            $this->log->error($ex);
            return null;
        }
    }
}
