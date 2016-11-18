<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sistema
 *
 * @author kelvin
 */
class SistemaController extends Controller {
    
    private $smarty;
    private $log;

    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }
    
    public function dashboardAJAX() {        
        require_once './Service/Service.php';
        require_once './Service/HistoricoService.php';
        require_once './Service/FilaEnvioService.php';
        require_once './Model/Contato.php';
        require_once './Model/FilaEnvio.php';
        require_once './Model/Template.php';
        require_once './Model/Historico.php';
        
        $service = new Service();
        $historicoService = new HistoricoService();
        $filaEnvioService = new FilaEnvioService();
        
        $totalEnviadoMes = $historicoService->buscarPorMesAno(date('m'), date('Y'));
        
        $cliente = unserialize(Session::getVar('cliente'));
        $totalRestanteMes = $cliente->getTotalEmail() - $totalEnviadoMes;
        $totalFilaEnvio = $filaEnvioService->verificarFilaEnvio();
        
        $array['totalEnviadoMes'] = $totalEnviadoMes . '/mês';
        $array['status'] = false;
        $array['totalFilaEnvio'] = $totalFilaEnvio;
        $array['totalGeral'] = $historicoService->buscarTotalEnviado();
        $array['totalRestanteMes'] =  $totalRestanteMes . '/mês';
        $array['totalContato'] = count($service->findAll('Contato'));
        $array['totalTemplate'] = count($service->findAll('Template'));
        
        print_r(json_encode($array));
    }

    public function dashboard() {        
        require_once './Service/Service.php';
        require_once './Service/HistoricoService.php';
        require_once './Service/FilaEnvioService.php';
        require_once './Model/Contato.php';
        require_once './Model/FilaEnvio.php';
        require_once './Model/Template.php';
        require_once './Model/Historico.php';
        
        $service = new Service();
        $historicoService = new HistoricoService();
        $filaEnvioService = new FilaEnvioService();
        
        
        $cliente = unserialize(Session::getVar('cliente'));
        $totalEnviadoMes = $historicoService->buscarPorMesAno(date('m'), date('Y'));
        $totalRestanteMes = $cliente->getTotalEmail() - $totalEnviadoMes;
        $totalFilaEnvio = $filaEnvioService->verificarFilaEnvio();
        
        $this->smarty->assign('titulo', 'Dashboard');
        $this->smarty->assign('totalEnviadoMes', $totalEnviadoMes);
        $this->smarty->assign('status', false);
        $this->smarty->assign('totalFilaEnvio', $totalFilaEnvio);
        $this->smarty->assign('totalGeral', $historicoService->buscarTotalEnviado());
        $this->smarty->assign('totalRestanteMes', $totalRestanteMes);
        $this->smarty->assign('totalContato', count($service->findAll('Contato')));
        $this->smarty->assign('totalTemplate', count($service->findAll('Template')));
        $this->smarty->assign('subtitulo', 'Seu sistema de gerenciamento de newsletter');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->display('dashboard.tpl');
    }
}
