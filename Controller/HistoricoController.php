<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HistoricoController
 *
 * @author kelvin
 */
class HistoricoController extends Controller {
    private $smarty;
    private $log;

    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }
    
    public function lista() {       
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->display('historico.tpl');
    } 
    
    public function carregarTabelaPrincipal() {
        require_once './Service/Service.php';
        require_once './Model/Template.php';
        require_once './Model/Situacao.php';
        require_once './Model/FilaEnvio.php';
        $service = new Service();
        
        $array = $service->findAll('FilaEnvio');
        
        foreach ($array as $value) {
            $value->getTemplate()->setTexto(null);
        }
        
        print_r(json_encode(array('listaPrincipal' => $array)));
    }
}
