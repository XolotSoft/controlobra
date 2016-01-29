<form name="frmProyMontos" id="frmProyMontos">
<input type="hidden" name="type" id="type" value="" />
<table width="700" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center" width="300" style="border:0px" valign="top">
    	<div align="center"><b>MANTENIMIENTO</b></div>
        <br />
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddMant()">Agregar Monto</a>
        </div>
    	<div id="listMant">{include file="{$DOC_ROOT}/templates/lists/proyMontoMant.tpl"}</div>
    </td>
    <td width="100" style="border:0px">&nbsp;</td>
    <td align="center" style="border:0px" valign="top">
    	<div align="center"><b>EQUIPAMIENTO</b></div>
        <br />
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddEquip()">Agregar Monto</a>
        </div>
    	<div id="listEquip">{include file="{$DOC_ROOT}/templates/lists/proyMontoEquip.tpl"}</div>
    </td>
</tr>
</table>
</form>

<br /><br />
<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="center" class="tblPages" height="22">        

       		<input type="button" name="btnSave" id="btnSave" value="Guardar" class="btnGral" style="width:100px" onclick="SaveMontos()" />

        </td>
	</tr>
</tfoot>
</table>