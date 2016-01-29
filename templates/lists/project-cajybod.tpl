<form name="frmProyCajBod" id="frmProyCajBod">
<input type="hidden" name="type" id="type" value="" />
<table width="600" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center" width="250" style="border:0px" valign="top">
    	<div align="center"><b>CAJONES DE EST.</b></div>
        <br />
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddCajon()">Agregar Caj&oacute;n</a>
        </div>
    	<div id="listCajon">{include file="{$DOC_ROOT}/templates/lists/proyCajonesEst.tpl"}</div>
    </td>
    <td width="100" style="border:0px">&nbsp;</td>
    <td align="center" style="border:0px" valign="top">
    	<div align="center"><b>BODEGAS</b></div>
        <br />
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddBodega()">Agregar Bodega</a>
        </div>
    	<div id="listBodega">{include file="{$DOC_ROOT}/templates/lists/proyBodegas.tpl"}</div>
    </td>
</tr>
</table>
</form>

<br /><br />
<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="center" class="tblPages" height="22">        

       		<input type="button" name="btnSave" id="btnSave" value="Guardar" class="btnGral" style="width:100px" onclick="SaveCajBod()" />

        </td>
	</tr>
</tfoot>
</table>