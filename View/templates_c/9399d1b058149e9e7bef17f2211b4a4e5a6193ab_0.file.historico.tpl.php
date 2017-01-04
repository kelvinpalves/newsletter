<?php /* Smarty version 3.1.27, created on 2016-08-15 13:38:41
         compiled from "/var/www/newsletter/View/templates/tema01/historico.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:107239523857b1f011acd2a9_04996622%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9399d1b058149e9e7bef17f2211b4a4e5a6193ab' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/historico.tpl',
      1 => 1466814390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107239523857b1f011acd2a9_04996622',
  'variables' => 
  array (
    'titulo' => 0,
    'subtitulo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57b1f011af73b1_11652466',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57b1f011af73b1_11652466')) {
function content_57b1f011af73b1_11652466 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '107239523857b1f011acd2a9_04996622';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("default/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.min.js"/>
        <link rel="stylesheet" href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"/>
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
                    <ol class="breadcrumb">
                        <li class="active">
                            Histórico
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Lista de E-mails Enviados</h3></div>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped tabela-acoes table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="tabela">
                                        <thead>
                                            <tr>
                                                <th style="width: 15%;">Código</th>
                                                <th>Campanha</th>
                                                <th>Contato</th>
                                                <th>Situação</th>
                                                <th style="width: 20%;">Data/Hora de Envio</th>
                                            </tr>
                                        </thead>
                                    </table>
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
 type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js" ><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="plugins/datatables/dataTables.bootstrap.min.js" ><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" ><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="plugins/dateformat.js" ><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="resource/historico.js" ><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
}
?>