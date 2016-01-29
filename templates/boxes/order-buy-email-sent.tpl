<table width="550" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tbody>  
	<tr>
    	<td align="center" height="100">
        {if $emailSent == 1}
        <img src="{$WEB_ROOT}/images/ok.png" />
        <br />
        <span style="font-size:16px">La Orden de Compra fue enviada correctamente.</span>
        {else}
        <img src="{$WEB_ROOT}/images/cancel.png" />
        <br />
        <span style="font-size:16px">Ocurri&oacute; un error al enviar la Orden de Compra.</span>
        {/if}
        </td>
    </tr>  
</tbody>     
</table>