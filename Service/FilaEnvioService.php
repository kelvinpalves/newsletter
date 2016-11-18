<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FilaEnvioService
 *
 * @author kelvin
 */
class FilaEnvioService extends Service {
    
    public function buscarTodosAguardando() {
        try{
            $query = Connect::getEm()->getConnection()->prepare('select * from fila_envio where id_situacao = 1');
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $this->log->error($ex);
            return null;
        }
    }
    
    public function verificarFilaEnvio() {
        try{
            $query = Connect::getEm()->getConnection()->prepare('select count(*) as total from fila_envio where id_situacao = 1');
            $query->execute();
            return $query->fetchAll()[0]['total'];
        } catch (Exception $ex) {
            $this->log->error($ex);
            return null;
        }
    }
    
}
