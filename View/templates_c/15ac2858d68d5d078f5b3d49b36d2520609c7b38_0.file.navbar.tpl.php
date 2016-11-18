<?php /* Smarty version 3.1.27, created on 2016-08-16 09:16:55
         compiled from "/var/www/newsletter/View/templates/tema01/default/navbar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:134395287257b3043798c294_00332570%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ac2858d68d5d078f5b3d49b36d2520609c7b38' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/default/navbar.tpl',
      1 => 1468210131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134395287257b3043798c294_00332570',
  'variables' => 
  array (
    'cliente' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57b30437994e49_72011160',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57b30437994e49_72011160')) {
function content_57b30437994e49_72011160 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '134395287257b3043798c294_00332570';
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