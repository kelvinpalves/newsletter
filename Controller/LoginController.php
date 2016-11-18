<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author kelvin
 * 
 */

session_name('newsletter_forge');

class LoginController extends Controller {
    private $smarty;
    private $log;

    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }
    
    public function entrar () {
        $this->smarty->display('login.tpl');
    }
    
    public function sair () {
        Session::destroy();
        $this->smarty->display('login.tpl');
    }
    
    public function in () {
        require_once './Model/Cliente.php';
        require_once './Service/ClienteService.php';
        
        $cliente = new Cliente();
        $cliente->setLogin($_POST['login']);
        $cliente->setSenha(md5($_POST['senha']));
        
        $clienteService = new ClienteService();
        $cliente = $clienteService->login($cliente);
        
        if (empty($cliente)) {
            print_r(json_encode(array('exec' => false)));
        } else {
            $aux = new Cliente();
            $aux->setId($cliente['id']);
            $aux->setNmCliente($cliente['nm_cliente']);
            $aux->setTotalEmail($cliente['total_email']);
            $aux->setUrlContatos($cliente['url_contatos']);
            $aux->setHostSmtp($cliente['host_smtp']);
            $aux->setFromNameSmtp($cliente['from_name_smtp']);
            $aux->setFromSmtp($cliente['from_smtp']);
            $aux->setPasswordSmtp($cliente['password_smtp']);
            $aux->setUserNameSmtp($cliente['user_name_smtp']);
            
            Session::setVar('cliente', serialize($aux));
            
            print_r(json_encode(array('exec' => true)));
        }
    }
}
