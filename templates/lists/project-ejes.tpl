<form name="frmProyEjes" id="frmProyEjes">
<input type="hidden" name="type" id="type" value="" />
<table width="600" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center" width="250" style="border:0px" valign="top">
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddEjeN()">Agregar N&uacute;mero</a>
        </div>
    	<div id="listEjesN">{include file="{$DOC_ROOT}/templates/lists/proyEjesN.tpl"}</div>
    </td>
    <td width="100" style="border:0px">&nbsp;</td>
    <td align="center" style="border:0px" valign="top">
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddEjeL()">Agregar Letra</a>
        </div>
    	<div id="listEjesL">{include file="{$DOC_ROOT}/templates/lists/proyEjesL.tpl"}</div>
    </td>
</tr>
</table>
</form>

<br />
<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="center" class="tblPages" height="22">        

       		<input type="button" name="btnSave" id="btnSave" value="Guardar" class="btnGral" style="width:100px" onclick="SaveEjes()" />

        </td>
	</tr>
</tfoot>
</table>