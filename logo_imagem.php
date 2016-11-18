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
require_once __DIR__ . '/Model/Situacao.php';
require_once __DIR__ . '/Model/Template.php';
require_once __DIR__ . '/Model/FilaEnvio.php';

$filaEnvio = new FilaEnvio();
$service = new Service();
$filaEnvio = $service->findById('FilaEnvio', (int) $_GET['id']);

if ($filaEnvio->getTsVisualizacao() == null) {
    $filaEnvio->setTsVisualizacao(new \DateTime(date('Y-m-d H:i:s')));
    $service->update($filaEnvio);
}