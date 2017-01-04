<?php /* Smarty version 3.1.27, created on 2017-01-04 17:06:18
         compiled from "/var/www/newsletter/View/templates/tema01/default/aside.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:878522295586d47aa8224e7_08382571%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ebe4d538436e6d66d4a311edea9ba4257306f4c' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/default/aside.tpl',
      1 => 1483118494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '878522295586d47aa8224e7_08382571',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_586d47aa894f52_74574916',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_586d47aa894f52_74574916')) {
function content_586d47aa894f52_74574916 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '878522295586d47aa8224e7_08382571';
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