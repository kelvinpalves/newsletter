<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContatoController
 *
 * @author kelvin
 */
class ContatoController extends Controller {

    private $smarty;
    private $log;

    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }

    public function carregarTabelaPrincipal() {
        require_once './Service/ContatoService.php';
        require_once './Model/Contato.php';
        $contatoService = new ContatoService();
        print_r(json_encode(array('listaPrincipal' => $contatoService->findAll('Contato'))));
    }

    public function lista() {
        $this->smarty->assign('titulo', 'Contato');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->assign('subtitulo', 'Crie sua lista de contatos');
        $this->smarty->display('contato.tpl');
    }

    public function remover() {
        require_once './Service/ContatoService.php';
        require_once './Model/Contato.php';
        $contatoService = new ContatoService();
        $contato = $contatoService->findById('Contato', $_POST['contato_id']);

        if ($contatoService->delete($contato)) {
            print_r(json_encode(array('exec' => true, 'msg' => 'Registro removido com sucesso!')));
        } else {
            print_r(json_encode(array('exec' => false, 'msg' => 'Erro ao remover o registro!')));
        }
    }

    public function salvar() {

        require_once './Service/ContatoService.php';
        require_once './Model/Contato.php';

        $contato = new Contato();

        if (isset($_POST['contato_id'])) {
            $contato->setId($_POST['contato_id']);
        }

        $contato->setEmail($_POST['contato_email']);

        $contatoService = new ContatoService();

        $contatoAux = new Contato();
        $contatoAux = $contatoService->buscarContatoPorEmail($contato->getEmail());

        if ($contato->getId() == null) {
            if ($contatoAux != null) {
                print_r(json_encode(array('exec' => false, 'msg' => 'O e-mail informado já está registrado.')));
                exit();
            }
        }

        try {
            if ($contato->getId() != null) {
                $exec = $contatoService->update($contato);
            } else {
                $exec = $contatoService->insert($contato);
            }
        } catch (Exception $ex) {
            $exec = false;
        }

        print_r(json_encode(array('exec' => $exec)));
    }

    public function importarJSON() {
        try {
            $json = $_POST['json'];
            $array = json_decode($json);

            if (count($array) == 0) {
                print_r(json_encode(array('exec' => false, 'msg' => 'O arquivo json é inválido.')));
                exit();
            }

            if (count($array->contatos) == 0) {
                print_r(json_encode(array('exec' => false, 'msg' => 'O arquivo json é inválido ou vazio.')));
                exit();
            }

            require_once './Service/ContatoService.php';
            require_once './Model/Contato.php';

            $emailValido = array();
            $emailInvalido = array();

            foreach ($array->contatos as $key => $value) {
                if ($this->valida_email($value->email)) {
                    $emailValido[] = $value->email;
                } else {
                    $emailInvalido[] = $value->email;
                }
            }

            $emailSalvar = array();
            $emailDuplicado = array();
            $contatoService = new ContatoService();

            foreach ($emailValido as $value) {

                $contatoAux = new Contato();
                $contatoAux = $contatoService->buscarContatoPorEmail($value);

                if ($contatoAux != null) {
                    $emailDuplicado[] = $value;
                } else {
                    $emailSalvar[] = $value;
                }
            }

            try {
                $salvoSucesso = array();
                $salvoErro = array();
                foreach ($emailSalvar as $value) {
                    $contato = new Contato();
                    $contato->setEmail($value);

                    if ($contatoService->insert($contato)) {
                        $salvoSucesso[] = $value;
                    } else {
                        $salvoErro[] = $value;
                    }
                }

                $msg = "Total Inválido: &nbsp;" . count($emailInvalido) . "<br/>";
                $msg .= "Total Duplicado: &nbsp;" . count($emailDuplicado) . "<br/>";
                $msg .= "Total com Erro &nbsp;" . count($salvoErro) . "<br/>";
                $msg .= "Total Sucesso: &nbsp;" . count($salvoSucesso) . "<br/>";

                print_r(json_encode(array('exec' => true, 'msg' => $msg)));
                exit();
            } catch (Exception $ex) {
                print $ex->getMessage();
                Connect::getEm()->getConnection()->rollBack();
                print_r(json_encode(array('exec' => false, 'msg' => 'Ocorreu um erro ao salvar no banco de dados.')));
                exit();
            }
        } catch (Exception $ex) {
            print_r(json_encode(array('exec' => false, 'msg' => 'Ocorreu um erro ao salvar no banco de dados.')));
            exit();
        }
    }

    private function valida_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function importar() {
        
        $this->smarty->assign('titulo', 'Contato');
        $this->smarty->assign('json', trim(file_get_contents(unserialize(Session::getVar('cliente'))->getUrlContatos())));
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->assign('subtitulo', 'Importar Lista de Contatos');
        $this->smarty->display('importarContato.tpl');
    }

    public function novo() {
        require_once './Model/Contato.php';
        require_once './Service/ContatoService.php';

        if (isset($_GET['id'])) {
            $contatoService = new ContatoService();
            $contato = $contatoService->findById('Contato', (int) $_GET['id']);
            $this->smarty->assign('contato', $contato);
        }

        $this->smarty->assign('titulo', 'Contato');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->assign('subtitulo', 'Crie sua lista de contatos');
        $this->smarty->display('novoContato.tpl');
    }

}
