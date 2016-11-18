<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteService
 *
 * @author kelvin
 */
class ClienteService extends Service {

    public function login($cliente) {
        try {
            $query = Connect::getEm()->getConnection()->prepare('select * from cliente where login = ? and senha = ?');
            $query->execute(array($cliente->getLogin(), $cliente->getSenha()));
            return $query->fetchAll()[0];
        } catch (Exception $ex) {
            $this->log->error($ex);
            return null;
        }
    }

}
