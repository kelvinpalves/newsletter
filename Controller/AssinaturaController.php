<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssinaturaController
 *
 * @author kelvin
 */
class AssinaturaController extends Controller {

    private $smarty;
    private $log;

    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }

    public function novo() {
        require_once './Model/Assinatura.php';
        require_once './Service/AssinaturaService.php';
        $assinaturaService = new AssinaturaService();
        $assinatura = $assinaturaService->findById('Assinatura', 1);
        $this->smarty->assign('assinatura', $assinatura);
        $this->smarty->assign('titulo', 'Assinatura');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->assign('subtitulo', 'Crie a assinatura do seu e-mail.');
        $this->smarty->display('novoAssinatura.tpl');
    }

    public function salvar() {

        require_once './Service/Service.php';
        require_once './Model/Assinatura.php';

        $assinatura = new Assinatura();

        if (isset($_POST['assinatura_id'])) {
            $assinatura->setId($_POST['assinatura_id']);
        }

        if (isset($_POST['html_assinatura'])) {
            if (empty($_POST['html_assinatura'])) {
                $assinatura->setHtmlAssinatura(null);
            } else {

                $dom = new DOMDocument();
                $string = mb_convert_encoding($_POST['html_assinatura'], 'html-entities', 'utf-8');
                $dom->loadHTML($string);
                $dom->preserveWhiteSpace = false;

                $links = $dom->getElementsByTagName('a');

                foreach ($links as $key => $value) {
                    $url = base64_encode($value->getAttribute('href'));
                    $newHref = "http://" . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/link.php?url=' . $url;
                    $value->setAttribute('href', $newHref);
                }

                $imagens = $dom->getElementsByTagName('img');

                if (!file_exists(ROOTPATH . Config::PATH_SMARTY_TEMPLATE_DIR . '/imagens/')) {
                    mkdir(ROOTPATH . Config::PATH_SMARTY_TEMPLATE_DIR . '/imagens/', 0755, true);
                }

                foreach ($imagens as $key => $value) {
                    if (preg_match('#^data:image/[^;]+;base64,#', $value->getAttribute('src'))) {
                        $uri = substr($value->getAttribute('src'), strpos($value->getAttribute('src'), ",") + 1);
                        $encodedData = str_replace(' ', '+', $uri);

                        $newSrc = 'imagens/' . $value->getAttribute('data-filename');
                        file_put_contents(ROOTPATH . Config::PATH_SMARTY_TEMPLATE_DIR . '/' . $newSrc, base64_decode($encodedData));
                        $newSrc = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/View/templates/tema01/imagens/' . $value->getAttribute('data-filename');
                        $value->setAttribute('src', $newSrc);
                    }
                }
                $assinatura->setHtmlAssinatura($dom->saveHTML());
            }
        } else {
            $assinatura->setHtmlAssinatura(null);
        }

        $service = new Service();

        try {
            $exec = $service->update($assinatura);
        } catch (Exception $ex) {
            $exec = false;
        }

        print_r(json_encode(array('exec' => $exec)));
    }

}
