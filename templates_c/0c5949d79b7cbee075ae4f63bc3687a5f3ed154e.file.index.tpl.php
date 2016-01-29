<?php /* Smarty version Smarty3-b7, created on 2016-01-26 10:05:07
         compiled from "/var/www//controlobra/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110063081356a79933bf9392-52735235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5949d79b7cbee075ae4f63bc3687a5f3ed154e' => 
    array (
      0 => '/var/www//controlobra/templates/index.tpl',
      1 => 1453824303,
    ),
  ),
  'nocache_hash' => '110063081356a79933bf9392-52735235',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ALEA ARQUITECTOS :: Panel de Cuantificaciones</title>
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>

<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/960.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/reset.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/text.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/blue.css" /> -->
<!-- <link type="text/css" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/smoothness/ui.css" rel="stylesheet" /> -->
<!-- <link rel="icon" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/animated_favicon.gif" type="image/gif" /> -->

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<?php if ($_smarty_tpl->getVariable('page')->value=="login"){?>
<!-- <link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/login.css" rel="stylesheet" type="text/css" media="all" />   -->
<?php }?>

<?php if ($_smarty_tpl->getVariable('page')->value=="concept-resumen"||$_smarty_tpl->getVariable('page')->value=="concept-resumen-2"||$_smarty_tpl->getVariable('page')->value=="material-resumen"||$_smarty_tpl->getVariable('page')->value=="concept-area"||$_smarty_tpl->getVariable('page')->value=="material-area"||$_smarty_tpl->getVariable('page')->value=="resumen-gastos"||$_smarty_tpl->getVariable('page')->value=="concept-resumen-gastos"||$_smarty_tpl->getVariable('page')->value=="material-resumen-gastos"||$_smarty_tpl->getVariable('page')->value=="concept-area-gastos"||$_smarty_tpl->getVariable('page')->value=="material-area-gastos"){?>
<!-- <link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/blue-concept.css" rel="stylesheet" type="text/css" media="all" />   -->
<?php }?>

<!-- /*<style type="text/css">
body { background:url(<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/bg.gif) repeat-x left top #D4D3D3; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size: 13px; color: #333; }
<!-- </style>*/ --> 

<!--[if IE]>
<script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
<![endif]-->
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="css/iefix.css" />
<script src="js/pngfix.js"></script>
<script>
    DD_belatedPNG.fix('#menu ul li a span span');
</script>        
<![endif]-->

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/prototype.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/scoluos/src/scriptaculous.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/util.js?v=<?php echo time();?>
" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/functions.js?v=<?php echo time();?>
" type="text/javascript"></script>

<?php if ($_smarty_tpl->getVariable('page')->value=="project"){?>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/colorPicker/AnchorPosition.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/colorPicker/PopupWindow.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/colorPicker/ColorPicker.js" type="text/javascript"></script>
<script type="text/javascript">
var cp = new ColorPicker('window'); // Popup window
</script>
<?php }?>

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script> 
    <![endif]-->
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
    jQuery(document).ready(function() {    
       App.init(); // init metronic core componets
       Layout.init(); // init layout
       QuickSidebar.init() // init quick sidebar
       Index.init();   
       Index.initDashboardDaterange();
       Index.initJQVMAP(); // init index page's custom scripts
       Index.initCalendar(); // init index page's custom scripts
       Index.initCharts(); // init index page's custom scripts
       Index.initChat();
       Index.initMiniCharts();
       Index.initIntro();
       Tasks.initDashboardWidget();
    });
    </script>
    <!-- END JAVASCRIPTS -->

<?php if ($_smarty_tpl->getVariable('page')->value=="project-new"||$_smarty_tpl->getVariable('page')->value=="project-edit"){?>
<!-- <script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/colorPicker/AnchorPosition.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/colorPicker/PopupWindow.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/colorPicker/ColorPicker2.js" type="text/javascript"></script> -->
<script type="text/javascript">
var cp = new ColorPicker('window'); // Popup window
</script>
<?php }?>

<!-- Sorter Lib -->
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/css/sorter/style.css" />
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/sorter/fabtabulous.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/sorter/tablekit.js" type="text/javascript"></script>

<!-- Date Time Picker -->
<?php if ($_smarty_tpl->getVariable('page')->value=="contract"){?>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/datetimepicker2.js" type="text/javascript"></script>
<?php }else{ ?>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/datetimepicker.js" type="text/javascript"></script>
<?php }?>

<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/<?php echo $_smarty_tpl->getVariable('page')->value;?>
.js?v=<?php echo time();?>
" type="text/javascript"></script>

</head>
<body>

<div class="container_16" <?php if ($_smarty_tpl->getVariable('page')->value!="login"&&$_smarty_tpl->getVariable('page')->value!="registroEmpresa"){?>id="wrapper"<?php }?>>	
	<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	<?php $_template = new Smarty_Internal_Template("main.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    
	<div class="clear"></div>
    		
</div>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


</body>
</htm