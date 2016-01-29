<form name="frmSendEmail" id="frmSendEmail" method="post">
<input type="hidden" id="type" name="type" value="sendOrderBuy"/>
<input type="hidden" id="orderBuyId" name="orderBuyId" value="{$info.orderBuyId}" />
<input type="hidden" id="nomSupplier" name="nomSupplier" value="{$info.supplier}" />
<table width="550" cellpadding="0" cellspacing="0" border="1" class="boxTable">
 <thead>
    <tr>
        <th width="150" class="tblTh">Campo</th>
        <th class="tblTh">Valor</th>
  </tr>
</thead>
<tbody>  
	<tr>
    	<td height="40"><div class="tblField">* Proveedor</div></td>
    	<td><div class="tblField">{$info.supplier}</div></td>
    </tr>  
    <tr>
    	<td height="40"><div class="tblField">* Correo electr&oacute;nico</div></td>
    	<td><div class="tblField">
        <input class="smallInput medium" name="email" id="email" type="text" size="50" value="{$info.email}"/></div>
        </td>
    </tr>
    <tr>
    	<td height="40"><div class="tblField">* Asunto</div></td>
    	<td><div class="tblField">
        <input class="smallInput medium" name="subject" id="subject" type="text" size="50" value="{$info.subject}"/></div>
        </td>
    </tr>
    
    <tr>
    	<td height="40"><div class="tblField">* Mensaje</div></td>
    	<td><div class="tblField">
        <textarea class="smallInput small" name="message" id="message" rows="10" style="width:350px"/></textarea></div>
        </td>
    </tr>    
</tbody>
<tfoot>
	<tr>
		<td colspan="2" align="center" class="tblPages" height="22">
       		<input type="button" name="btnSend" id="btnSend" value="Enviar" class="btnGral" onclick="SendEmail()" style="width:160px" />
        </td>
	</tr>
</tfoot>     
</table>
</form>