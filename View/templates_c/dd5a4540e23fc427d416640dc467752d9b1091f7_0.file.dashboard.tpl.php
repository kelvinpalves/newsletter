<?php /* Smarty version 3.1.27, created on 2017-01-04 17:06:18
         compiled from "/var/www/newsletter/View/templates/tema01/dashboard.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:810177812586d47aa661c95_95739930%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd5a4540e23fc427d416640dc467752d9b1091f7' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/dashboard.tpl',
      1 => 1483118494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '810177812586d47aa661c95_95739930',
  'variables' => 
  array (
    'titulo' => 0,
    'subtitulo' => 0,
    'cliente' => 0,
    'totalEnviadoMes' => 0,
    'totalRestanteMes' => 0,
    'totalContato' => 0,
    'totalGeral' => 0,
    'totalTemplate' => 0,
    'totalFilaEnvio' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_586d47aa712c57_33766075',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_586d47aa712c57_33766075')) {
function content_586d47aa712c57_33766075 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '810177812586d47aa661c95_95739930';
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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-th"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Plano</span>
                                    <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getTotalEmail();?>
/mês</span>
                                    Total de E-mails contratados.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-send"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Enviado</span>
                                    <span class="info-box-number totalEnviadoMes"><?php echo $_smarty_tpl->tpl_vars['totalEnviadoMes']->value;?>
/mês</span>
                                    Total de E-mails Enviados no Mês.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-envelope-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Restante</span>
                                    <span class="info-box-number totalRestanteMes"><?php echo $_smarty_tpl->tpl_vars['totalRestanteMes']->value;?>
/mês</span>
                                    Total de E-mails Restantes.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box bg-gray">
                                <span class="info-box-icon"><i class="fa fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Contato</span>
                                    <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['totalContato']->value;?>
</span>
                                    Total de Contatos Registrados.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box bg-maroon">
                                <span class="info-box-icon"><i class="fa fa-history"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Totalizador</span>
                                    <span class="info-box-number totalGeral"><?php echo $_smarty_tpl->tpl_vars['totalGeral']->value;?>
</span>
                                    Total Geral de E-mails Enviados.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box bg-teal">
                                <span class="info-box-icon"><i class="fa fa-edit"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Templates</span>
                                    <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['totalTemplate']->value;?>
</span>
                                    Total de Templates Criados.
                                </div>
                            </div>
                        </div>




                        <div class="col-md-4">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-database"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Fila de Envio</span>
                                    <span class="info-box-number totalFilaEnvio"><?php echo $_smarty_tpl->tpl_vars['totalFilaEnvio']->value;?>
</span>
                                    Total de E-mails na Fila de Envio.
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

        <?php echo '<script'; ?>
 src="resource/dashboard.js" ><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
}
?>