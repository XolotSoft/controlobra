<form name="frmStep8" id="frmStep8" method="post">
<input type="hidden" id="type" name="type" value="saveStep8"/>

<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="right" class="tblPages" height="22">        
       	<div style="float:left">        
       		<input type="button" name="btnBack" id="btnBack" value="<< Anterior" class="btnGral" onclick="GoStep(7)" />
        </div>
        <div style="float:right">        
       		<input type="button" name="btnNext" id="btnNext" value="Finalizar y Guardar" class="btnGral" onclick="SaveStep8()" />
        </div>
        </td>
	</tr>
</tfoot>
</table>

<br />

<table width="700" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center" width="300" style="border:0px" valign="top">
    	<div align="center"><b>MANTENIMIENTO</b></div>
        <br />
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddMontoMant()">Agregar Monto</a>
        </div>
    	<div id="listMontoMant">{include file="{$DOC_ROOT}/templates/lists/projMontoMant.tpl"}</div>
    </td>
    <td width="100" style="border:0px">&nbsp;</td>
    <td align="center" style="border:0px" valign="top">
    	<div align="center"><b>EQUIPAMIENTO</b></div>
        <br />
    	<div align="right" style="font-size:12px">
        	<a href="javascript:void(0)" class="inline_add" onclick="AddMontoEquip()">Agregar Monto</a>
        </div>
    	<div id="listMontoEquip">{include file="{$DOC_ROOT}/templates/lists/projMontoEquip.tpl"}</div>
    </td>
</tr>
</table>

</form>