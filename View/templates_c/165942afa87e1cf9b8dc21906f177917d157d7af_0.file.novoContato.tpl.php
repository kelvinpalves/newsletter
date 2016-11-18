<?php /* Smarty version 3.1.27, created on 2016-06-01 15:42:06
         compiled from "/var/www/newsletter/View/templates/tema01/novoContato.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:278779325574f2c7e085f34_85300727%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '165942afa87e1cf9b8dc21906f177917d157d7af' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/novoContato.tpl',
      1 => 1464806520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278779325574f2c7e085f34_85300727',
  'variables' => 
  array (
    'titulo' => 0,
    'subtitulo' => 0,
    'contato' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_574f2c7e0e9544_43377030',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_574f2c7e0e9544_43377030')) {
function content_574f2c7e0e9544_43377030 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '278779325574f2c7e085f34_85300727';
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
                            Novo
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Novo Contato</h3></div>
                                </div>
                                <div class="box-body">

                                    <form id="formulario" role="form" class="submit" action="/newsletter/contato/salvar" >                                    
                                        <div class="box-body">
                                            
                                            <?php if (isset($_smarty_tpl->tpl_vars['contato']->value)) {?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="codigo">Código</label>
                                                        <input id="id" type="text" readonly="true" class="form-control" id="codigo" name="contato_id" value="<?php echo $_smarty_tpl->tpl_vars['contato']->value->getId();?>
">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?> 
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">E-mail</label>
                                                        <input type="email" class="form-control" id="email" name="contato_email" placeholder="Informe um e-mail" <?php if (isset($_smarty_tpl->tpl_vars['contato']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['contato']->value->getEmail();?>
"<?php }?> required="true">
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
 type="text/javascript" src="resource/novoContato.js" ><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
}
?>