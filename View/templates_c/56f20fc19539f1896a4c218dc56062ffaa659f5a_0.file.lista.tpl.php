<?php /* Smarty version 3.1.27, created on 2016-08-16 09:16:53
         compiled from "/var/www/newsletter/View/templates/tema01/relatorio/lista.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:129302794357b30435b4d812_03097818%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56f20fc19539f1896a4c218dc56062ffaa659f5a' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/relatorio/lista.tpl',
      1 => 1471293142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129302794357b30435b4d812_03097818',
  'variables' => 
  array (
    'titulo' => 0,
    'subtitulo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57b304362feb76_77985578',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57b304362feb76_77985578')) {
function content_57b304362feb76_77985578 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '129302794357b30435b4d812_03097818';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("default/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo $_smarty_tpl->getSubTemplate ("default/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <?php echo $_smarty_tpl->getSubTemplate ("default/aside.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>

                        <small><?php echo $_smarty_tpl->tpl_vars['subtitulo']->value;?>
</small>
                    </h1>
                </section>
                <section class="content">

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        001 - Relatório de E-mails Enviados Por Período
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>
                                        Relatório detalhado e quantitativo de e-mails enviado durante um período determinado.
                                    </p>
                                    <p>
                                        <a class="btn btn-flat btn-primary" href="/newsletter/r001/visualizar">Visualizar Relatório</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        002 - Relatório Lidos X Não Lidos
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>Relatório quantitativo e estatistico de e-mails enviados, efetuando a comparação entre lidos e não lidos.</p>
                                    
                                    <p>
                                        <a class="btn btn-flat btn-primary" href="/newsletter/r002/visualizar">Visualizar Relatório</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("default/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("default/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </body>
</html>
<?php }
}
?>