<form name="frmStep7" id="frmStep7" method="post">
<input type="hidden" id="type" name="type" value="saveStep7"/>

<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="right" class="tblPages" height="22">        
       	<div style="float:left">        
       		<input type="button" name="btnBack" id="btnBack" value="<< Anterior" class="btnGral" onclick="GoStep(6)" />
        </div>
        <div style="float:right">        
       		<input type="button" name="btnNext" id="btnNext" value="Siguiente >>" class="btnGral" onclick="SaveStep7()" />
        </div>
        </td>
	</tr>
</tfoot>
</table>

<br />

<table width="600" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center" width="250" style="border:0px" valign="top">    	
    	{include file="{$DOC_ROOT}/templates/lists/projCajonesEst.tpl"}
    </td>
    <td width="100" style="border:0px">&nbsp;</td>
    <td align="center" style="border:0px" valign="top">    	
    	{include file="{$DOC_ROOT}/templates/lists/projBodegas.tpl"}
    </td>
</tr>
</table>

</form>