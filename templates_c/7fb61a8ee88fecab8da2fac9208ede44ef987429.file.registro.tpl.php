<?php /* Smarty version Smarty3-b7, created on 2016-01-28 11:20:13
         compiled from "/var/www//controlobra/templates/registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84063153156aa4dcd0514b6-85658529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fb61a8ee88fecab8da2fac9208ede44ef987429' => 
    array (
      0 => '/var/www//controlobra/templates/registro.tpl',
      1 => 1453931564,
    ),
  ),
  'nocache_hash' => '84063153156aa4dcd0514b6-85658529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <title>Alea-arquitectos</title>
    <link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/frameworks/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/css/registro.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/libraries/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/libraries/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/functions.js"></script>
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
            <a class="navbar-brand" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/login" style="color:#000"><span style="color:#8A898E;" class="glyphicon glyphicon-home" aria-hidden="true"></span> Control de obra</a>
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#"> Registro</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">  
                <li>
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/login" style="padding-right:30px;">
                    <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Ingresar</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div class="row" style="margin-top:100px;">
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>REGÍSTRATE EN CONTROL DE OBRA</h4></div>
                    <!-- <div class="panel-body">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque fuga eligendi explicabo eveniet laborum ipsa iusto. Ea doloremque autem cum expedita omnis, sapiente soluta similique, est atque fuga quas, voluptas?</p>
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, quisquam.</p>
                    </div> -->
                </div>
            </div>
            <form action="" method="POST" srole="form" id="registro">
                <input type="hidden" name="type" value="guardarRegistro" />
                <legend>Ingresa tus datos</legend>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                    <div class="form-group">
                        <label for="">Nombre Comercial<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            </span>
                            <input  type="text" name="nombreComercial"  maxlength="120" id="nombreComercial" class="form-control" placeholder="Escribe el nombre de tu empresa">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Razón social<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </span>
                            <input  type="text" name="razonSocial"  maxlength="100" id="razonSocial" class="form-control" placeholder="Escribe la razón social">    
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
                            <input  type="text" name="rfc"  maxlength="13" id="rfc" class="form-control" placeholder="Escribe el R.F.C">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Teléfono<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                            </span>
                            <input  type="text" name="telefonoEmpresa" id="telefonoEmpresa"  maxlength="15" class="form-control" placeholder="Ingresa un número">    
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
                            <input  type="text" name="nombreContacto" id="nombreContacto" class="form-control"  maxlength="120" placeholder="Escribe nombre del contacto">    
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
                            <input  type="text" name="email" id="email" class="form-control"  maxlength="80" placeholder="Ingresa tu eMail">    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Teléfono<span class="rojo"> *</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                            </span>
                            <input  type="text" name="telefonoContacto" id="telefonoContacto" class="form-control"  maxlength="15" placeholder="Escribe un teléfono">    
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
                            <input  type="text" name="usuario" id="usuario" class="form-control"  maxlength="30" placeholder="minimo 5 caracteres">    
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
                            <input  type="password" name="password" id="password" class="form-control" maxlength="20" placeholder="minimo 5 caracteres">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Repetir Contraseña<span class="rojo"> *</span></label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                            </span>
                            <input  type="password" name="repetirPassword" id="repetirPassword"  maxlength="20" class="form-control" placeholder="minimo 5 caracteres">    
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
                    <button type="submit" class="btn btn-success pull-right btn-registro">REGISTRARSE</button>
                </a>

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
                            <p class="p-footer">Control de obra</p>
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
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/registro.js"></script>
</body>
</html>