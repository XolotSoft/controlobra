var DOC_ROOT = "../";
var DOC_ROOT_TRUE = "../";
var DOC_ROOT_SECTION = "../../";
//var WEB_ROOT = "http://alea.dyndns.org:8080/";

var urlLoc = document.location.hostname;

if(urlLoc == "localhost")
	var WEB_ROOT = "http://" + urlLoc + "/controlobra";
else if(urlLoc == "desarrollot.no-ip.biz" || urlLoc == "192.168.1.200")
	var WEB_ROOT = "http://" + urlLoc + "/controlobra";
else
	var WEB_ROOT = "http://" + urlLoc + "/";

var LOADER = "<img src='"+WEB_ROOT+"/images/loader.gif'>";

Event.observe(window, 'load', function() {
	if($('login_0'))
	{
		Event.observe($('login_0'), "click", LoginCheck);
	}
});

function LoginCheck()
{
	new Ajax.Request(WEB_ROOT+'/ajax/login.php', 
	{
  	parameters: $('loginForm').serialize(true), 
		method:'post',
    onSuccess: function(transport){
      var response = transport.responseText || "no response text";
			var splitResponse = response.split("|");
			if(splitResponse[0] == "fail")
			{
				$('divStatus').innerHTML = splitResponse[1];
				$('centeredDiv').show();
				grayOut(true);
			}
			else
			{
				Redirect('/sistema2');
			}
		},
    onFailure: function(){ alert('Something went wrong...') }
  });

}

function ToogleStatusDiv()
{
	$('centeredDiv').toggle();
	grayOut(false);	
}

function ToogleStatusDivOnPopup()
{
	$('centeredDivOnPopup').toggle();
}

function Redirect(page)
{
	window.location = WEB_ROOT+page;
}

function Logout() {
	new Ajax.Request(WEB_ROOT+'/ajax/logout.php', 
	{
		method:'post',
    onSuccess: function(transport){
      Redirect('');
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function roundNum(sVal, nDec){ 

     var fact = Math.pow(10, nDec); // 10 elevado a ndec 
  	//Se desplaza el punto decimal ndec posiciones, 
  	//se redondea el número y se vuelve a colocar 
  	//el punto decimal en su sitio.
  	return Math.round(sVal * fact) / fact; 
}

function UpdateCurrentProj()
{
	var idCurProj = $("curProjId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/project.php', 
	{
  	parameters: {type:"updateCurrentProj",curProjId:idCurProj}, 
		method:'post',
    onSuccess: function(transport){
      var response = transport.responseText || "no response text";
			var splitResponse = response.split("|");
			
			window.location.reload();
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function LoadItemsPage(page){

	var vItems = $("itemsPage").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: {type:"loadItemsPage", items:vItems},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				location.href = WEB_ROOT + page;
			}			

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

Number.prototype.formatMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
