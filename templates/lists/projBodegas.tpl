<table width="100%" cellpadding="0" cellspacing="0" border="1" class="boxTable" id="tblEjes">
 <thead>
    <tr>
        <th class="tblTh">Bodegas</th>              
  </tr>
</thead>
<tbody>	
{foreach from=$bodegas item=item key=key}
	<tr>       
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small2" name="bodega[{$key}]" id="" type="text" size="50" value="{$item.name}"/>
        </td>       
    </tr>
{foreachelse}
<tr><td align="center" height="30">Ning&uacute;n registro encontrado</td></tr>
{/foreach}
</tbody>
</table>