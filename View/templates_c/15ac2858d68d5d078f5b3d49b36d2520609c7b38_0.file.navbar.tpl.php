<?php /* Smarty version 3.1.27, created on 2017-01-04 17:06:18
         compiled from "/var/www/newsletter/View/templates/tema01/default/navbar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:443276284586d47aa7f1ba8_21724959%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ac2858d68d5d078f5b3d49b36d2520609c7b38' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/default/navbar.tpl',
      1 => 1483118494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '443276284586d47aa7f1ba8_21724959',
  'variables' => 
  array (
    'cliente' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_586d47aa8133a4_86926174',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_586d47aa8133a4_86926174')) {
function content_586d47aa8133a4_86926174 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '443276284586d47aa7f1ba8_21724959';
?>
<header class="main-header">
    <a href="/" class="logo">
        <span class="logo-mini"><b>N</b>L</span>
        <span class="logo-lg"><b>NEWS</b>Letter</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getNmCliente();?>
</span>
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="/newsletter/login/sair" >
                        <span>Sair</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header><?php }
}
?>