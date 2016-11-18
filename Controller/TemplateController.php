<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TemplateController
 *
 * @author kelvin
 */
class TemplateController extends Controller {

    private $smarty;
    private $log;

    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }

    public function carregarTabelaPrincipal() {
        require_once './Service/Service.php';
        require_once './Model/Template.php';

        $service = new Service();
        $array = $service->findAll('Template');

        foreach ($array as $v) {
            $v->setTexto(null);
        }

        $service = new Service();
        print_r(json_encode(array('listaPrincipal' => $array)));
    }

    public function lista() {
        $this->smarty->assign('titulo', 'Template');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->assign('subtitulo', 'Crie sua lista de templates');
        $this->smarty->display('template.tpl');
    }

    public function novo() {
        require_once './Model/Template.php';
        require_once './Service/Service.php';

        if (isset($_GET['id'])) {
            $service = new Service();
            $template = $service->findById('Template', (int) $_GET['id']);
            $this->smarty->assign('template', $template);
        }

        $this->smarty->assign('titulo', 'Template');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->assign('subtitulo', 'Crie sua lista de templates');
        $this->smarty->display('novoTemplate.tpl');
    }

    public function salvar() {

        require_once './Service/Service.php';
        require_once './Model/Template.php';

        $template = new Template();

        if (isset($_POST['template_id'])) {
            $template->setId($_POST['template_id']);
        }

        if (empty($_POST['template_texto'])) {
            print_r(json_encode(array('exec' => false, 'msg' => 'É obrigatório informar o texto do modelo.')));
            exit();
        }

        $template->setTitulo($_POST['template_titulo']);

        $dom = new DOMDocument();
        $string = mb_convert_encoding($_POST['template_texto'], 'html-entities', 'utf-8'); 
        $dom->loadHTML($string);
        $dom->preserveWhiteSpace = false;

        $imagens = $dom->getElementsByTagName('img');
        $links = $dom->getElementsByTagName('a');
        
        foreach ($links as $key => $value) {
            $url = base64_encode($value->getAttribute('href'));
            $newHref = "http://" . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/link.php?url=' . $url;
            $value->setAttribute('href', $newHref);
        }
        
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

        $template->setTexto($dom->saveHTML());

        $service = new Service();

        try {
            if ($template->getId() != null) {
                $exec = $service->update($template);
            } else {
                $exec = $service->insert($template);
            }
        } catch (Exception $ex) {
            $exec = false;
        }

        print_r(json_encode(array('exec' => $exec)));
    }

    public function remover() {
        require_once './Service/Service.php';
        require_once './Model/Template.php';

        $service = new Service();

        $template = $service->findById('Template', $_POST['template_id']);

        if ($service->delete($template)) {
            print_r(json_encode(array('exec' => true, 'msg' => 'Registro removido com sucesso!')));
        } else {
            print_r(json_encode(array('exec' => false, 'msg' => 'Erro ao remover o registro!')));
        }
    }

}
