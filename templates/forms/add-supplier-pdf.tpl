{if $info.pdf == ''}

<form name="frmPdf" id="frmPdf" enctype="multipart/form-data" method="post">
<input type="hidden" name="action" id="action" value="savePdf" />
<input type="hidden" name="supplierId" id="supplierId" value="{$info.supplierId}" />
<input type="hidden" name="projectId" id="projectId" value="{$info.projectId}" />
<br /><br />
<input type="file" name="pdf" id="pdf" />
<br /><br />
<input type="submit" name="btnSave" id="btnSave" value="Guardar" class="btnGral" style="width:100px"/>
</form>

{else}
<br />&nbsp;
<form name="frmPdf" id="frmPdf" method="post">
<input type="hidden" name="action" id="action" value="deletePdf" />
<input type="hidden" name="supProjId" id="supProjId" value="{$info.supProjId}" />
<input type="button" name="btnDel" value="Eliminar Pdf" class="btnGral" style="width:130px" onclick="confirmDel()"/>
</form>

{/if}