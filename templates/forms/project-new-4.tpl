<form name="frmStep4" id="frmStep4" method="post">
<input type="hidden" id="type" name="type" value="saveStep4"/>

<table width="99%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="right" class="tblPages" height="22">        
       	<div style="float:left">        
       		<input type="button" name="btnBack" id="btnBack" value="<< Anterior" class="btnGral" onclick="GoStep(3)" />
        </div>
        <div style="float:right">        
       		<input type="button" name="btnNext" id="btnNext" value="Siguiente >>" class="btnGral" onclick="SaveStep4()" />
        </div>
        </td>
	</tr>
</tfoot>
</table>

<br />

<div id="eventboxGral" align="right" style="padding-right:20px">
      <a href="javascript:void(0)" class="inline_add" onclick="AddTypeArea()">Agregar Tipo de Area</a>
</div>

<div id="listTypeAreas">{include file="{$DOC_ROOT}/templates/lists/projTypeArea.tpl"}</div>

</form>