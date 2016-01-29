<form name="frmDoc" id="frmDoc" enctype="multipart/form-data" method="post">
<input type="hidden" name="action" id="action" value="saveDoc" />
<input type="hidden" name="customerId" id="customerId" value="{$info.customerId}" />
<br />
<b>Nombre: </b>
<input type="text" name="name" id="name" class="smallInput medium" />
<br />
<input type="file" name="doc" id="doc" />
<br /><br />
<input type="submit" name="btnSave" id="btnSave" value="Guardar" class="btnGral" style="width:100px"/>
</form>