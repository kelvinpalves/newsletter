<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContatoService
 *
 * @author kelvin
 */
class ContatoService extends Service {
    //put your code here
    
    public function buscarContatoPorEmail($email) {
        try {
            $repository = $this->em->getRepository('Contato');
            return $repository->findOneBy(array('email' => $email));
        } catch (Exception $ex) {
            return null;
        }
    }
    
}
