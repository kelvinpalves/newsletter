<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloController
 *
 * @author kelvin
 */
class ModeloController extends Controller {
    
    private $smarty;
    private $log;

    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }

    public function get() {
        print file_get_contents('./View/templates/tema01/plugins/summernote/dist/templates/' . $_GET['id'] . '.html');
    }
    
}
