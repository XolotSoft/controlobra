<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="action" id="action" value="searchSupplier" />
<table width="300" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center"><b>Tipo</b></td>
    <td align="center"><b>Nombre</b></td>
</tr>
<tr>
    <td align="center">{include file="lists/enumTipoSup2.tpl"}</td>
    <td align="center">
    	<input type="text" name="name2" id="name2" class="smallInput" />
    </td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
    <td align="center" colspan="2">
    <input type="button" class="btnGral" value="Buscar" onclick="SearchSupplier()" />
    </td>
</tr>
</table>
</form>