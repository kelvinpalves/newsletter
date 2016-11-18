<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_name('newsletter_forge');
@session_start();

/**
 * Description of EnvioController
 *
 * @author kelvin
 */
class EnvioController extends Controller {

    private $smarty;
    private $log;

    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->log = Log::getLog(__CLASS__);
    }

    public function enviar() {
        require_once './Model/FilaEnvio.php';
        require_once './Model/Situacao.php';
        require_once './Model/Template.php';
        require_once './Model/Historico.php';
        require_once './Service/Service.php';
        require_once './Service/HistoricoService.php';
        require_once './Service/FilaEnvioService.php';

        $filaEnvioService = new FilaEnvioService();

        if ($filaEnvioService->verificarFilaEnvio() > 0) {
            print_r(json_encode(array('exec' => false, 'msg' => 'Já existe um processo de envio em execução, aguarde a finalização do mesmo para enviar o próximo lote.')));
            exit();
        }

        $totalEmail = count($_POST['emails']);

        if ($totalEmail == 0) {
            print_r(json_encode(array('exec' => false, 'msg' => 'Para enviar a campanha é necessário selecionar os contatos.')));
            exit();
        }

        $historicoService = new HistoricoService();

        $totalRestante = (unserialize(Session::getVar('cliente'))->getTotalEmail() - $historicoService->buscarPorMesAno(date('m'), date('Y')));
        if ($totalEmail > $totalRestante) {
            print_r(json_encode(array('exec' => false, 'msg' => 'Você não possui a cota necessária para enviar a campanha, verifique o total restante. <br/> Total Restante: &nbsp;' . $totalRestante)));
            exit();
        }

        try {

            $mes = (int) date('m');
            $ano = (int) date('Y');
            $service = new Service();

            $situacao = new Situacao();
            $situacao = $service->findById('Situacao', Config::ID_AGUARDANDO);
            $template = new Template();
            $template = $service->findById('Template', $_POST['template_id']);

            $totalSucesso = 0;
            $arrayErro = array();

            foreach ($_POST['emails'] as $email) {

                $filaEnvio = new FilaEnvio();
                $filaEnvio->setMes($mes);
                $filaEnvio->setAno($ano);
                $filaEnvio->setEmail($email);
                $filaEnvio->setSituacao($situacao);
                $filaEnvio->setTemplate($template);

                if ($service->insert($filaEnvio)) {
                    $totalSucesso++;
                } else {
                    $arrayErro[] = $email;
                }
            }

            $mensagem = 'Total Iniciado com Sucesso: &nbsp;' . $totalSucesso . '<br/>';

            if (count($arrayErro) > 0) {
                $mensagem .= 'Email com erro: <br/>';

                foreach ($arrayErro as $email) {
                    $mensagem .= $email . '<br/>';
                }
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://newsletter.freewayintercambio.com.br/script.php');
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 1);
            curl_exec($ch);
            curl_close($ch);

            print_r(json_encode(array('exec' => true, 'msg' => $mensagem)));
        } catch (Exception $ex) {
            print_r(json_encode(array('exec' => false, 'msg' => 'Ocorreu um erro ao iniciar o envio das campanhas.')));
            exit();
        }
    }

    public function processoDeEnvio() {
        require_once './Model/Situacao.php';
        require_once './Model/Assinatura.php';
        require_once './Model/FilaEnvio.php';
        require_once './Service/Service.php';
        require_once './Service/FilaEnvioService.php';
        require_once './Model/Template.php';
        require_once './Model/Cliente.php';

        $filaEnvioService = new FilaEnvioService();
        $filaEnvioList = $filaEnvioService->buscarTodosAguardando();

        file_put_contents("./logs/execucao.tmp", "Executando\n");

        $service = new Service();
        
                
        $cliente = new Cliente();
        $cliente = $service->findById('Cliente', 1);
        
        $template = $service->findById('Template', $filaEnvioList[0]['id_template']);
        $assinatura = new Assinatura();
        $assinatura = $service->findById('Assinatura', 1);

        foreach ($filaEnvioList as $value) {
            $this->email($value, $template, $assinatura, $cliente);
            sleep(60);
        }

        unlink("./logs/execucao.tmp");
    }

    public function email($array, $template, $assinatura, $cliente) {
        require_once './Model/Situacao.php';
        require_once './Model/Assinatura.php';
        require_once './Model/FilaEnvio.php';
        require_once './Service/Service.php';
        require_once './Service/FilaEnvioService.php';
        require_once './Model/Template.php';
        require_once './Model/Cliente.php';

        $mail = new PHPMailer();

        $mail->IsSMTP();
        
        $headers = '';
        $headers .= $this->HeaderLine("Organization" , "http://www.forgeit.com.br"); 
        $headers .= $this->HeaderLine("Content-Transfer-encoding" , "8bit");
        $headers .= $this->HeaderLine("Message-ID" , "<".md5(uniqid(time()))."@{$_SERVER['SERVER_NAME']}>");
        $headers .= $this->HeaderLine("X-MSmail-Priority" , "Normal");
        $headers .= $this->HeaderLine("X-Mailer" , "Microsoft Office Outlook, Build 11.0.5510");
        $headers .= $this->HeaderLine("X-MimeOLE" , "Produced By Microsoft MimeOLE V6.00.2800.1441");
        $headers .= $this->HeaderLine("X-Sender" , $cliente->getFromSmtp());
        $headers .= $this->HeaderLine("X-AntiAbuse" , "This is a solicited email for - http://www.forgeit.com.br mailing list.");
        $headers .= $this->HeaderLine("X-AntiAbuse" , "Servername - {$_SERVER['SERVER_NAME']}");
        $headers .= $this->HeaderLine("X-AntiAbuse" , $cliente->getFromSmtp());
        
        $mail->CreateHeader($headers);
        
        $mail->DKIM_domain = 'freewayintercambio.com.br';
        $mail->DKIM_identity = $cliente->getUserNameSmtp();
        $mail->DKIM_selector = 'key1';
        $mail->DKIM_private = 'MIICXgIBAAKBgQDDT8EOmaOdZnKqwAEOQWd5mhwYZ2/Tu+8PS/quxrANADK/+5hw
                                yXTwcEIeHfbskcTDyuW1klvEz35rUmf63evwRoaVotiFTOtWSX6IiE6AaTa+tMyV
                                G35grObaMKz/tbBXSijJlratwzwFbMiLcPoYk7KvsUKLScAamBHLPirftwIDAQAB
                                AoGAZyHAAaOjP8QPHJbSd+KVbyKvXzuPUzDTpTIrpwqHf/Xw1mtWLYhTVXsRjrGn
                                53d5fSGwdlZYWu5uBOG4wkFZCdUljLYLNnjfzhvD/wWW7PTPZXuzMrmIJu/RfiP2
                                9Q3e6QUHfGGyRMXb1V341wiD7ulbQ+kClEaafP+MhlUlh8ECQQDjUtRcy6dDEIuP
                                SDxgMmxSuSjaK4QvUAHIdFMncU+9uLy4hlsBB5W3dYTjsob/DqyBBBULV+Z6Q7xF
                                CbDKlIJnAkEA2/MhhNdhED59LK5iOCIYlmgV/IjX5ZN2V8WtJv4pZp7EbLtSXJWz
                                uCYdKHjqUlMrd8plDuJktZLrTomXUySGMQJBAJztf0CYLl1zvIQrP9LAvFrXC8ag
                                p93pg3GYLBdcd8nnEBDqX0R0sfw2Goj9o4fL33YpFUYBZlAdFokqSWtv3h0CQQDP
                                rSmg/Jwxck9OuPkUd10v5ueborn3ktzS01tCzgjZVF+zKswBj3g6EALIDCNzyAPq
                                /7eb7jeZGjgD1/aCEqKBAkEAi7dOs5QJCbmlMzwE0g/cx2aWs10MsUQKQ+tjvjl0
                                HQAqMxOcG7h3468AfSDTJwJHn+Fh4wZppL3GBQdTFBH73w==';
        
        $mail->Timeout = 10;
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->XMailer = ' ';
        $mail->Host = $cliente->getHostSmtp();
        $mail->Username = $cliente->getUserNameSmtp();
        $mail->Password = base64_decode($cliente->getPasswordSmtp());
        $mail->From = $cliente->getFromSmtp();
        $mail->FromName = $cliente->getFromNameSmtp();
        
        $mail->AddAddress($array['email'], $array['email']);

        $mail->isHTML(true);

        $mail->Subject = $template->getTitulo();
        $mail->Body = $template->getTexto();

        $dom = new DOMDocument();
        $string = mb_convert_encoding($mail->Body, 'html-entities', 'utf-8');
        $dom->loadHTML($string);
        $dom->preserveWhiteSpace = false;
        $links = $dom->getElementsByTagName('a');

        foreach ($links as $key => $value) {
            $url = $value->getAttribute('href') . '&el=' . base64_encode($array['email']) . '&tl=' . $template->getId();
            $value->setAttribute('href', $url);
        }

        $mail->Body = $dom->saveHTML();

        if ($assinatura->getHtmlAssinatura() != null) {
            $mail->Body .= "<br/>" . $assinatura->getHtmlAssinatura();
        }

        $mail->Body = $mail->Body . file_get_contents('./View/templates/tema01/assinatura.html');
        $mail->Body = str_replace("[ID_FILA_ENVIO]", $array['id'], $mail->Body);

        $service = new Service();
        $fila = new FilaEnvio();
        $situacao = new Situacao();
        

        $fila = $service->findById('FilaEnvio', $array['id']);

        if (!$mail->send()) {
            $situacao = $service->findById('Situacao', 3);
        } else {
            $situacao = $service->findById('Situacao', 2);
        }

        $fila->setSituacao($situacao);
        $fila->setTsEnvio(new \DateTime(date('Y-m-d H:i:s')));

        if ($service->update($fila)) {
            $this->log->info("Sucesso");
        } else {
            $this->log->error("Erro");
        }
    }

    public function lista() {
        require_once './Service/Service.php';
        require_once './Model/Template.php';
        $service = new Service();

        $templates = $service->findAll('Template');

        $template_ids = array();
        $template_titulos = array();
        foreach ($templates as $t) {
            $template_ids[] = $t->getId();
            $template_titulos[] = $t->getTitulo();
        }

        $this->smarty->assign('template_ids', $template_ids);
        $this->smarty->assign('template_titulos', $template_titulos);
        $this->smarty->assign('template_id', $template_ids[0]);

        $this->smarty->assign('titulo', 'Envio');
        $this->smarty->assign('cliente', unserialize(Session::getVar('cliente')));
        $this->smarty->assign('subtitulo', 'Envie suas campanhas.');
        $this->smarty->display('envio.tpl');
    }

}
