<?php /* Smarty version 3.1.27, created on 2016-06-08 17:15:55
         compiled from "/var/www/newsletter/View/templates/tema01/importarContato.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:169004270357587cfbb92b90_41697485%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '668adc6f5a0db592499e1c979f27b6500c13ef5b' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/importarContato.tpl',
      1 => 1465416948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169004270357587cfbb92b90_41697485',
  'variables' => 
  array (
    'titulo' => 0,
    'subtitulo' => 0,
    'json' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57587cfbbe3a20_84859098',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57587cfbbe3a20_84859098')) {
function content_57587cfbbe3a20_84859098 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '169004270357587cfbb92b90_41697485';
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
                    <ol class="breadcrumb">
                        <li class="active">
                            <a href="/newsletter/contato/lista">Contato</a>
                        </li>
                        <li>
                            Importar
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Importar Contatos</h3></div>
                                </div>
                                <div class="box-body">

                                    <form id="formulario" role="form" class="submit" action="/newsletter/contato/importarJSON" >                                    
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inputJson">JSON</label>
                                                        <textarea readonly="true" rows="15" class="form-control" id="inputJson" name="json" placeholder="Cole o json de contatos" required="true" ><?php echo $_smarty_tpl->tpl_vars['json']->value;?>
</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-flat btn-primary">Salvar</button>
                                        </div>
                                    </form>

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
 type="text/javascript" src="resource/importarContato.js" ><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
}
?>