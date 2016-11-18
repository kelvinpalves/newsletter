<?php /* Smarty version 3.1.27, created on 2016-07-06 13:33:36
         compiled from "/var/www/newsletter/View/templates/tema01/novoAssinatura.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:714722717577d32e02a6698_46469320%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2815085c4c242df010ad6620c646b143a34fe2e8' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/novoAssinatura.tpl',
      1 => 1467822593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '714722717577d32e02a6698_46469320',
  'variables' => 
  array (
    'titulo' => 0,
    'subtitulo' => 0,
    'assinatura' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577d32e03119e2_16423041',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577d32e03119e2_16423041')) {
function content_577d32e03119e2_16423041 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '714722717577d32e02a6698_46469320';
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
                        <li>
                            Assinatura
                        </li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="col-md-6 text-left"><h3 class="box-title">Assinatura</h3></div>
                                </div>
                                <div class="box-body">

                                    <form id="formulario" role="form" class="submit" action="/newsletter/assinatura/salvar" >                                    
                                        <div class="box-body">

                                            <?php if (isset($_smarty_tpl->tpl_vars['assinatura']->value)) {?>
                                                <input id="id" type="hidden" class="form-control" id="codigo" name="assinatura_id" value="<?php echo $_smarty_tpl->tpl_vars['assinatura']->value->getId();?>
">
                                            <?php }?> 

                                            <div class="row">
                                                <div class="col-md-12"><div id="summernote" ><?php if (isset($_smarty_tpl->tpl_vars['assinatura']->value)) {
echo $_smarty_tpl->tpl_vars['assinatura']->value->getHtmlAssinatura();
}?></div>    
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
 src="plugins/summernote/dist/summernote-ext-template.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="resource/novoAssinatura.js" ><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>