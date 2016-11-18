<?php /* Smarty version 3.1.27, created on 2016-07-11 00:36:10
         compiled from "/var/www/newsletter/View/templates/tema01/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7078006825783142a12b015_29049751%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e40014d763a10ae3549d2d5da6eeff24a1355ae' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/login.tpl',
      1 => 1468208148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7078006825783142a12b015_29049751',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5783142a1631b8_12073250',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5783142a1631b8_12073250')) {
function content_5783142a1631b8_12073250 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7078006825783142a12b015_29049751';
?>
<html>
    <head>
        <meta charset="utf8" />
        <title>NewsLetter - Forge IT Solutions</title>
        <?php echo $_smarty_tpl->getSubTemplate ("default/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <link rel="stylesheet" href="resource/login.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap">
                        <p class="form-title">
                            <img src="resource/logo.png" style="width: 80px;"/><br/>
                            NEWSLETTER
                        </p>
                        <form class="login" >
                            <input type="text" name="login" placeholder="Informe o login" id="input_login" required="true"/>
                            <input type="password" name="senha" placeholder="Informe a senha" id="input_password" required="true"/>
                            <input type="button" value="Entrar" class="btn btn-danger btn-sm" id="login"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("default/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <?php echo '<script'; ?>
 type="text/javascript" src="resource/login.js" ><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
?>