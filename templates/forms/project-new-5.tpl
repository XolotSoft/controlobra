<form name="frmStep5" id="frmStep5" method="post">
<input type="hidden" id="type" name="type" value="saveStep5"/>

<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="right" class="tblPages" height="22">        
       	<div style="float:left">        
       		<input type="button" name="btnBack" id="btnBack" value="<< Anterior" class="btnGral" onclick="GoStep(4)" />
        </div>
        <div style="float:right">        
       		<input type="button" name="btnNext" id="btnNext" value="Siguiente >>" class="btnGral" onclick="SaveStep5()" />
        </div>
        </td>
	</tr>
</tfoot>
</table>

<br />

<table width="600" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center" width="250" style="border:0px" valign="top">
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddEjeN()">Agregar N&uacute;mero</a>
        </div>
    	<div id="listEjesN">{include file="{$DOC_ROOT}/templates/lists/projEjesN.tpl"}</div>
    </td>
    <td width="100" style="border:0px">&nbsp;</td>
    <td align="center" style="border:0px" valign="top">
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddEjeL()">Agregar Letra</a>
        </div>
    	<div id="listEjesL">{include file="{$DOC_ROOT}/templates/lists/projEjesL.tpl"}</div>
    </td>
</tr>
</table>

</form>