<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RelatorioController
 *
 * @author kelvin
 */
class RelatorioController extends Controller {
    private $smarty;
    private $log;
    
    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }
    
    public function lista() {
        $this->smarty->assign('titulo', 'Relatórios');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->display('relatorio/lista.tpl');
    }
}
