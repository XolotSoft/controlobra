{foreach from=$materials item=item key=key}
<div style="width:30%;float:left"><b>{$item.material}:</b></div>
<br style="clear:both" />
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">            
    <tr>
    	<td align="center"><div align="center" class="bdTB">Proveedor</div></td>
        <td align="center" width="120"><div align="center" class="bdTB">Cantidad</div></td>
        <td align="center" width="150"><div align="center" class="bdTB">Unidad</div></td>
        <td align="center" width="100"><div align="center" class="bdTB">Precio Unitario</div></td>
        <td align="center" width="100"><div align="center" class="bdTB">Total</div></td>
    </tr>            
    <tr>
    	<td align="center"><div align="center">{$item.supplier}</div></td>
    	<td align="center"><div align="center">{$item.quantity}</div></td>
        <td align="center"><div align="center">{$item.unit}</div></td>
    	<td align="center"><div align="center">${$item.price}</div></td>
        <td align="center"><div align="center">${$item.total}</div></td>
    </tr>           
</table>
<br />
{/foreach}