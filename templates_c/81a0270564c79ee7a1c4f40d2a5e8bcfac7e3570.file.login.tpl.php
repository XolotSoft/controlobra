<?php /* Smarty version Smarty3-b7, created on 2016-01-25 17:24:55
         compiled from "templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106861754756a6aec735b3e2-80804983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81a0270564c79ee7a1c4f40d2a5e8bcfac7e3570' => 
    array (
      0 => 'templates/login.tpl',
      1 => 1453764292,
    ),
  ),
  'nocache_hash' => '106861754756a6aec735b3e2-80804983',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_6 prefix_5 suffix_5">
	
    <div style="float:left; margin-left:85px; padding-top:8px">
    	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/logos/alea.jpg" width="156" height="70" />
    </div>
    
    <h1>Sistema de Cuantificaciones</h1>
      <div id="login">
          
        <form name="frmLogin" id="frmLogin" method="post">
          <input type="hidden" name="type" value="doLogin" />
          <p>
            <label><strong>Usuario</strong>
              <input type="text" name="username" class="inputText" id="username" maxlength="30" />
            </label>
        </p>
          <p>
            <label><strong>Contrase&ntilde;a</strong>
              <input type="password" name="passwd" class="inputText" id="passwd" maxlength="30" />
          </label>
          </p>
          <a class="black_button" href="javascript:void(0)" id="doLogin"><span>Entrar!</span></a>
           Nuevo en control de obra? <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/registro" style="color:purple;">Crea una cuenta!.</a>          
        </form>
        <br clear="all" />
      </div>
     
</div>