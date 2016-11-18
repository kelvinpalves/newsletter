<?php

//Remover ao colocar em produção.

ini_set('display_errors', 7);
ini_set('display_startup_errors', 7);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('ROOTPATH', __DIR__);

date_default_timezone_set('America/Sao_Paulo');
header("Content-Type: text/html; charset=UTF-8", true);

require_once __DIR__ . '/Config/Config.php';
require_once __DIR__ . Config::AUTOLOAD;
require_once __DIR__ . Config::LOG;
require_once __DIR__ . Config::SESSION;
require_once __DIR__ . Config::PATH_CONFIG . 'Routes.php';
require_once __DIR__ . Config::PATH_CONFIG . 'Controller.php';
require_once __DIR__ . Config::PATH_CONFIG . 'Connect.php';
require_once __DIR__ . Config::REDIRECT;
require_once __DIR__ . Config::SERVICE;

Session::init();

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . Config::PATH_SMARTY_TEMPLATE_DIR);
$smarty->setCompileDir(__DIR__ . Config::PATH_SMARTY_COMPILE_DIR);
$smarty->force_compile = true;

$routes = new Routes();

$home = false;

require_once './Model/Cliente.php';

//if (!Session::exists('cliente') && $_GET['c'] != 'login') {
//    Redirect::load('login/entrar');
//}

if (!Session::exists('cliente') && $_GET['c'] != 'login') {
    require_once './Model/Cliente.php';
    require_once './Service/ClienteService.php';


    $cliente = new Cliente();
    $cliente->setLogin('fwi');
    $cliente->setSenha('81dc9bdb52d04dc20036dbd8313ed055');
    $clienteService = new ClienteService();
    $cliente = $clienteService->login($cliente);

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
}

if ($routes->redirect()) {
    $classController = $routes->getController();
    $methodController = $routes->getMethod();
    $idController = $routes->getId();

    $class = new $classController($smarty);
    $class->$methodController($idController);

    if (!$class->getMethodExists()) {
        $home = true;
    }
} else {
    $home = true;
}

if ($home) {
    Redirect::load('sistema/dashboard');
}
