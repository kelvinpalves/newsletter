<?php /* Smarty version 3.1.27, created on 2016-08-16 09:16:55
         compiled from "/var/www/newsletter/View/templates/tema01/default/aside.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:134132042757b30437998f74_15177939%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ebe4d538436e6d66d4a311edea9ba4257306f4c' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/default/aside.tpl',
      1 => 1471265224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134132042757b30437998f74_15177939',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57b3043799ce60_40152019',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57b3043799ce60_40152019')) {
function content_57b3043799ce60_40152019 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '134132042757b30437998f74_15177939';
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li><a href="/newsletter/assinatura/novo"><i class="fa fa-edit"></i> <span>Assinatura</span></a></li>
            <li><a href="/newsletter/contato/lista"><i class="fa fa-users"></i> <span>Contatos</span></a></li>
            <li><a href="/newsletter/template/lista"><i class="fa fa-envelope"></i> <span>Templates</span></a></li>
            <li><a href="/newsletter/envio/lista"><i class="fa fa-send"></i> <span>Envio</span></a></li>
            <li><a href="/newsletter/historico/lista"><i class="fa fa-history"></i> <span>Histórico</span></a></li>
            <li><a href="/newsletter/relatorio/lista"><i class="fa fa-bar-chart"></i> <span>Relatórios</span></a></li>
        </ul>
    </section>
</aside><?php }
}
?>