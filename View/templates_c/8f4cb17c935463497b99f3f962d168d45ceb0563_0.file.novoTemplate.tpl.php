<?php /* Smarty version 3.1.27, created on 2016-06-27 08:31:21
         compiled from "/var/www/newsletter/View/templates/tema01/novoTemplate.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:55736576257710e89e7c303_18088236%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f4cb17c935463497b99f3f962d168d45ceb0563' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/novoTemplate.tpl',
      1 => 1466812934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55736576257710e89e7c303_18088236',
  'variables' => 
  array (
    'titulo' => 0,
    'subtitulo' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57710e8a0d5ec1_43226330',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57710e8a0d5ec1_43226330')) {
function content_57710e8a0d5ec1_43226330 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '55736576257710e89e7c303_18088236';
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("default/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <link rel="stylesheet" href="plugins/summernote/dist/summernote.css"/>
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
                            <a href="/newsletter/template/lista">Template</a>
                        </li>
                        <li>
                            Novo
                        </li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Novo Template</h3></div>
                                </div>
                                <div class="box-body">

                                    <form id="formulario" role="form" class="submit" action="/newsletter/template/salvar" >                                    
                                        <div class="box-body">

                                            <?php if (isset($_smarty_tpl->tpl_vars['template']->value)) {?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="codigo">Código</label>
                                                            <input id="id" type="text" readonly="true" class="form-control" id="codigo" name="template_id" value="<?php echo $_smarty_tpl->tpl_vars['template']->value->getId();?>
">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }?> 

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="titulo">Assunto</label>
                                                        <input class="form-control" id="titulo" type="text" name="template_titulo" placeholder="Informe o título do template" <?php if (isset($_smarty_tpl->tpl_vars['template']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['template']->value->getTitulo();?>
"<?php }?> required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="summernote">
                                                    <?php if (isset($_smarty_tpl->tpl_vars['template']->value)) {
echo $_smarty_tpl->tpl_vars['template']->value->getTexto();
}?>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-flat btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="overlay">
                                <i class="fa fa-refresh fa-spin"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("default/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </div>
    <?php echo '<script'; ?>
 src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"><?php echo '</script'; ?>
> 
    <?php echo $_smarty_tpl->getSubTemplate ("default/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <?php echo '<script'; ?>
 src="plugins/summernote/dist/summernote.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="plugins/summernote/dist/lang/summernote-pt-BR.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="resource/novoTemplate.js" ><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>