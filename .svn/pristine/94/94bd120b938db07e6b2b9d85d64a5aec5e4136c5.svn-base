<?php
include_once(DOC_ROOT.'/classes/main.class.php');
foreach (glob(DOC_ROOT."/classes/utilities/*.php") as $filename) {
    include $filename;
}
foreach (glob(DOC_ROOT."/classes/main/*.php") as $filename) {
    include $filename;
}
include_once(DOC_ROOT.'/properties/language.es.php');
include_once(DOC_ROOT.'/properties/errors.es.php');
include_once(DOC_ROOT.'/properties/config.php');
require(DOC_ROOT.'/libs/Smarty.class.php');

include_once(DOC_ROOT.'/classes/db.class.php');
include_once(DOC_ROOT.'/classes/util.class.php');
include_once(DOC_ROOT.'/classes/main.class.php');
include_once(DOC_ROOT.'/classes/registro.class.php');
include_once(DOC_ROOT.'/classes/user.class.php');
include_once(DOC_ROOT.'/classes/state.class.php');
include_once(DOC_ROOT.'/classes/city.class.php');
include_once(DOC_ROOT.'/classes/personal.class.php');
include_once(DOC_ROOT.'/classes/customer.class.php');
include_once(DOC_ROOT.'/classes/customerAddress.class.php');
include_once(DOC_ROOT.'/classes/bank.class.php');
include_once(DOC_ROOT.'/classes/material.class.php');
include_once(DOC_ROOT.'/classes/materialPrice.class.php');
include_once(DOC_ROOT.'/classes/concept.class.php');
include_once(DOC_ROOT.'/classes/conceptConcept.class.php');
include_once(DOC_ROOT.'/classes/conceptPrice.class.php');
include_once(DOC_ROOT.'/classes/conceptMaterial.class.php');
include_once(DOC_ROOT.'/classes/type.class.php');
include_once(DOC_ROOT.'/classes/project.class.php');
include_once(DOC_ROOT.'/classes/projectItem.class.php');
include_once(DOC_ROOT.'/classes/projectLevel.class.php');
include_once(DOC_ROOT.'/classes/projectDepto.class.php');
include_once(DOC_ROOT.'/classes/projectEje.class.php');
include_once(DOC_ROOT.'/classes/projectType.class.php');
include_once(DOC_ROOT.'/classes/projectCajon.class.php');
include_once(DOC_ROOT.'/classes/projectBodega.class.php');
include_once(DOC_ROOT.'/classes/projectMant.class.php');
include_once(DOC_ROOT.'/classes/projectEquip.class.php');

include_once(DOC_ROOT.'/classes/unit.class.php');
include_once(DOC_ROOT.'/classes/category.class.php');
include_once(DOC_ROOT.'/classes/subcategory.class.php');
include_once(DOC_ROOT.'/classes/supplier.class.php');
include_once(DOC_ROOT.'/classes/supplierContact.class.php');
include_once(DOC_ROOT.'/classes/cuantificacion.class.php');
include_once(DOC_ROOT.'/classes/cuantItem.class.php');
include_once(DOC_ROOT.'/classes/cuantMaterial.class.php');
include_once(DOC_ROOT.'/classes/estimacion.class.php');
include_once(DOC_ROOT.'/classes/estimacionPayment.class.php');
include_once(DOC_ROOT.'/classes/estItem.class.php');
include_once(DOC_ROOT.'/classes/estLevel.class.php');
include_once(DOC_ROOT.'/classes/estDepto.class.php');
include_once(DOC_ROOT.'/classes/requisicion.class.php');
include_once(DOC_ROOT.'/classes/reqItem.class.php');
include_once(DOC_ROOT.'/classes/reqLevel.class.php');
include_once(DOC_ROOT.'/classes/reqDepto.class.php');
include_once(DOC_ROOT.'/classes/reqMat.class.php');
include_once(DOC_ROOT.'/classes/orderBuy.class.php');
include_once(DOC_ROOT.'/classes/contract.class.php');
include_once(DOC_ROOT.'/classes/contractPayment.class.php');
include_once(DOC_ROOT.'/classes/accountPayment.class.php');

$db = new DB;
$error = new Error;
$util = new Util;
$main = new Main;

$state = new State;
$city = new City;
$personal = new Personal;
$user = new User;
$registro = new Registro;
$customer = new Customer;
$custAddress = new CustomerAddress;
$bank = new Bank;
$material = new Material;
$matPrice = new MaterialPrice;
$concept = new Concept;
$conceptCon = new ConceptConcept;
$conceptPrice = new ConceptPrice;
$conceptMat = new ConceptMaterial;
$type = new Type;

$project = new Project;
$projItem = new ProjectItem;
$projLevel = new ProjectLevel;
$projDepto = new ProjectDepto;
$projEje = new ProjectEje;
$projType = new ProjectType;
$projCajon = new ProjectCajon;
$projBodega = new ProjectBodega;
$projMant = new ProjectMant;
$projEquip = new ProjectEquip;

$unit = new Unit;
$category = new Category;
$subcategory = new Subcategory;
$supplier = new Supplier;
$supplierContact = new SupplierContact;
$cuantificacion = new Cuantificacion;
$cuantItem = new CuantItem;
$cuantMat = new CuantMaterial;
$estimacion = new Estimacion;
$estimacionPayment = new EstimacionPayment;
$estItem = new EstItem;
$estLevel = new EstLevel;
$estDepto = new EstDepto;
$requisicion = new Requisicion;
$reqLevel = new ReqLevel;
$reqItem = new ReqItem;
$reqDepto = new ReqDepto;
$reqMat = new ReqMat;
$orderBuy = new OrderBuy;
$contract = new Contract;
$contPayment = new ContractPayment;
$accountPayment = new AccountPayment;

$smarty = new Smarty;

//$util->wwwRedirect();

$smarty->assign('DOC_ROOT', DOC_ROOT);
$smarty->assign('WEB_ROOT', WEB_ROOT);
$smarty->assign('property', $property);

$lang = $util->ReturnLang();
