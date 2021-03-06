<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of R001Controller
 *
 * @author kelvin
 */
class R001Controller extends Controller {
    private $smarty;
    private $log;
    
    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }
    
    public function gerar() {
        require_once './Service/RelatorioService.php';
        
        $inicio = $_POST['inicio'];
        $fim = $_POST['fim'];
        
        if (empty($inicio) || empty($fim)) {
            print json_encode(array('exec' => 0, 'msg' => 'A data inicial e final são campos obrigatórios.'));
            return false;
        }
        
        $dateInicio = DateTime::createFromFormat('d/m/Y', $inicio)->format('Y-m-d');
        $dateFim = DateTime::createFromFormat('d/m/Y', $fim)->format('Y-m-d');
        
        if ($dateInicio > $dateFim) {
            print json_encode(array('exec' => 0, 'msg' => 'A data inicial não pode ser maior que a data final.'));
            return false;
        }
        
        $relatorioService = new RelatorioService();
        
        $relatorioDetalhado = $relatorioService->r001($dateInicio, $dateFim);
        $relatorioQuantitativo = $relatorioService->r001Quantitativo($dateInicio, $dateFim);
        
        $retorno = array();
        $retorno['relatorioDetalhado'] = $relatorioDetalhado;
        $retorno['relatorioQuantitativo'] = $relatorioQuantitativo;
        
        print json_encode(array('exec' => 1, 'msg' => 'Relatório gerado com sucesso, criando visualizador.', 'dados' => $retorno));
    }
    
    public function visualizar() {
        $this->smarty->assign('titulo', '001 - Relatório de E-mails Enviados Por Período');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->display('relatorio/r001.tpl');
    }
}
