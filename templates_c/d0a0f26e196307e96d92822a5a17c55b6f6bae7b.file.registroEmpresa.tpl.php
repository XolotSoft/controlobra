<?php /* Smarty version Smarty3-b7, created on 2016-01-18 16:18:44
         compiled from "templates/registroEmpresa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1823555678569d64c48489d7-60285626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0a0f26e196307e96d92822a5a17c55b6f6bae7b' => 
    array (
      0 => 'templates/registroEmpresa.tpl',
      1 => 1453155522,
    ),
  ),
  'nocache_hash' => '1823555678569d64c48489d7-60285626',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <title>Alea</title>
    <link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/frameworks/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/css/registro.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/libraries/jquery2/jquery-2.2.0.min.js"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/frameworks/bootstrap3/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color:#000">Alea</a>
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Registro</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" style="padding-right:30px;">
                    <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Ingresar</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div class="row" style="margin-top:100px;">
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>REGÍSTRATE EN iTOREM</h4></div>
                    <div class="panel-body">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque fuga eligendi explicabo eveniet laborum ipsa iusto. Ea doloremque autem cum expedita omnis, sapiente soluta similique, est atque fuga quas, voluptas?</p>
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, quisquam.</p>
                       <ul>
                               <li>Item 1</li>
                               <li>Item 2</li>
                               <li>Item 3</li>
                       </ul>
                    </div>
                </div>
            </div>
            <form action="" method="POST" role="form">
                <legend>Ingresa tus datos</legend>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                    <div class="form-group">
                        <label for="">Nombre Comercial<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="nombreComercial" id="nombreComercial" class="form-control" placeholder="Escribe el nombre de tu empresa">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Razón social<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="razonSocial" id="razonSocial" class="form-control" placeholder="Escribe la razón social">    
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                    <div class="form-group">
                        <label for="">R.F.C.<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="rfc" id="rfc" class="form-control" placeholder="Escribe el R.F.C">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Teléfono<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="telefonoEmpresa" id="telefonoEmpresa" class="form-control" placeholder="Ingresa un número">    
                        </div>
                    </div>
                </div>
                
                <legend>Contacto</legend>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                    <div class="form-group">
                        <label for="">Nombre<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="nombreContacto" id="nombreContacto" class="form-control" placeholder="Escribe nombre del contacto">    
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                    <div class="form-group">
                        <label for="">eMail<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="email" id="email" class="form-control" placeholder="Ingresa tu eMail">    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Teléfono<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="telefonoContacto" id="telefonoContacto" class="form-control" placeholder="Escribe un teléfono">    
                        </div>
                    </div>
                </div>
                <legend>Usuario Administrador</legend>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                    <div class="form-group">
                        <label for="">Usuario<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-king" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="usuario" id="usuario" class="form-control" placeholder="minimo 5 caracteres">    
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                    <div class="form-group">
                        <label for="">Contraseña<span class="rojo"> *</span></label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="password" id="password" class="form-control" placeholder="minimo 5 caracteres">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Repetir Contraseña<span class="rojo"> *</span></label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                            </span>
                            <input required type="text" name="repetirPassword" id="repetirPassword" class="form-control" placeholder="minimo 5 caracteres">    
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
                    <button type="submit" class="btn btn-success pull-right btn-registro">REGISTRARSE</button>
                </div>
            </form>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                Campos requeridos<span class="rojo"> *</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default" style="margin-bottom: 0px;">
              <div class="panel-footer">
                  <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <p class="p-footer">iTOREM</p>
                            <p class="p-footer">AVANTIKA</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            
                        </div>
                    </div>
                    <div class="row">
                    <hr class="hr-footer">
                        <a href="http://www.avantika.com.mx" style="text-decoration:none;" target="_blank">powered by <b>AVANTIKA </b><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/logoavantika.png" alt="" style="height:22px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>