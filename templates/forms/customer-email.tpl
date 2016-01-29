<form name="frmStep1" id="frmStep1" method="post">
<input type="hidden" id="type" name="type" value="saveStep1"/>
<table width="550" cellpadding="0" cellspacing="0" border="1" class="boxTable">
 <thead>
    <tr>
        <th width="150" class="tblTh">Campo</th>
        <th class="tblTh">Valor</th>
  </tr>
</thead>
<tbody>    
    <tr>
    	<td height="40"><div class="tblField">* Cliente</div></td>
    	<td><div class="tblField">
        {$info.name}</div>
        </td>
    </tr>
    <tr>
    	<td height="40"><div class="tblField">* Mensaje</div></td>
    	<td><div class="tblField">
        <textarea name="message" id="message" class="smallInput" style="width:350px;" rows="6"></textarea></div>
        </td>
    </tr>
    <tr>
    	<td height="40"><div class="tblField">* Imagen</div></td>
    	<td><div class="tblField">
        <input type="file" name="imagen" id="imagen" /></div>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
        <div style="padding:10px 0 10px 0; display:none" id="loader">
        <img src="{$WEB_ROOT}/images/loading.gif" />
        <br />
        Enviando...
        </div>
        </td>
    </tr>   
</tbody>
<tfoot>
	<tr>
		<td colspan="2" align="center" class="tblPages" height="22">
       		<input type="button" name="btnSend" id="btnSend" value="Enviar" class="btnGral" style="width:150px" onclick="SendEmail()" />
        </td>
	</tr>
</tfoot>     
</table>
</form>