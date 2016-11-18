<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . '/Config/Config.php';
require_once __DIR__ . Config::AUTOLOAD;
require_once __DIR__ . Config::LOG;
require_once __DIR__ . Config::SESSION;
require_once __DIR__ . Config::PATH_CONFIG . 'Routes.php';
require_once __DIR__ . Config::PATH_CONFIG . 'Controller.php';
require_once __DIR__ . Config::PATH_CONFIG . 'Connect.php';
require_once __DIR__ . Config::REDIRECT;
require_once __DIR__ . Config::SERVICE;

require_once './Model/HistoricoLink.php';
require_once './Service/Service.php';

try {
    $hl = new HistoricoLink();
    $hl->setUrl(base64_decode($_GET['url']));
    $hl->setEmail(base64_decode($_GET['el']));
    $hl->setTemplate($_GET['tl']);

    $service = new Service();
    $service->insert($hl);
} catch (Exception $ex) {
}

header('Location: ' . base64_decode($_GET['url']));
