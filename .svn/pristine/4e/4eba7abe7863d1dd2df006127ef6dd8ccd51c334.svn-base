{if $info.archivo == ''}

<form name="frmImg" id="frmImg" enctype="multipart/form-data" method="post">
<input type="hidden" name="action" id="action" value="saveImg" />
<input type="hidden" name="customerId" id="customerId" value="{$info.customerId}" />
<br /><br />
<input type="file" name="img" id="img" />
<br /><br />
<input type="submit" name="btnSave" id="btnSave" value="Guardar" class="btnGral" style="width:100px"/>
</form>

{else}
<br />&nbsp;
<form name="frmImg" id="frmImg" method="post">
<input type="hidden" name="action" id="action" value="deleteImg" />
<input type="hidden" name="customerId" id="customerId" value="{$info.customerId}" />
<input type="button" name="btnDel" value="Eliminar Imagen" class="btnGral" style="width:130px" onclick="confirmDel()"/>
</form>

{/if}