<?php /* Smarty version 3.1.27, created on 2017-01-04 17:06:18
         compiled from "/var/www/newsletter/View/templates/tema01/default/javascript.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:970445965586d47aa8b53a4_78629097%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '095960a36b87808074c4b358d708e6e48546b73d' => 
    array (
      0 => '/var/www/newsletter/View/templates/tema01/default/javascript.tpl',
      1 => 1483118494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '970445965586d47aa8b53a4_78629097',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_586d47aa8bff06_78976679',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_586d47aa8bff06_78976679')) {
function content_586d47aa8bff06_78976679 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '970445965586d47aa8b53a4_78629097';
?>
<?php echo '<script'; ?>
 src="plugins/jQuery/jQuery-2.2.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/app.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="plugins/validation/dist/jquery.validate.min.js" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="plugins/validation/dist/localization/messages_pt_BR.min.js" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="plugins/blockui/blockui.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="plugins/toast/toastr.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="plugins/confirm/jquery.confirm.min.js"><?php echo '</script'; ?>
><?php }
}
?>