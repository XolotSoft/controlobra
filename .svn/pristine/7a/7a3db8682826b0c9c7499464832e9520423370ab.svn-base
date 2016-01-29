<form name="frmStep3" id="frmStep3" method="post">
<input type="hidden" id="type" name="type" value="saveStep3"/>

<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="right" class="tblPages" height="22">        
       	<div style="float:left">        
       		<input type="button" name="btnBack" id="btnBack" value="<< Anterior" class="btnGral" onclick="GoStep(2)" />
        </div>
        <div style="float:right">        
       		<input type="button" name="btnNext" id="btnNext" value="Siguiente >>" class="btnGral" onclick="SaveStep3()" />
        </div>
        </td>
	</tr>
</tfoot>
</table>

<br />

{foreach from=$torres item=itT key=kT}

<div align="center" style="font-size:18px"><b>TORRE {$itT.name}</b></div>
<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
 <thead>
    <tr>
        <th width="80" class="tblTh">Nivel</th>
        <th width="90" class="tblTh">Nombre Nivel</th>
        <th width="90" class="tblTh">No. Areas</th>            
  </tr>
</thead>
<tbody>
	{section name=foo start=$itT.levels loop=$itT.levels step=-1}
    	{assign var="l" value=$smarty.section.foo.index}
	<tr>    	
    	<td height="40" align="center">
        <input class="smallInput small2" name="level_{$kT}_{$l}" id="level_{$kT}_{$l}" type="text" size="50" value="{if $isBack == 1}{$niveles[{$kT}][{$l}]['level']}{else}{math equation='(l * s) + iL' l=$l s=$itT.separacion iL=$itT.iniLevel format='%.2f'}{/if}"/>
        </td>
        <td height="40" align="center">
        <input class="smallInput small2" name="name_{$kT}_{$l}" id="name_{$kT}_{$l}" type="text" size="50" value="{if $isBack == 1}{$niveles[{$kT}][{$l}]['name']}{else}Piso {$l}{/if}"/>
        </td>        
        <td align="center" bgcolor="#FFFFFF">
        {*}
        <input class="smallInput small2" name="deptos_{$kT}_{$l}" id="deptos_{$kT}_{$l}" type="text" size="50" value="{if $isBack == 1}{$niveles[{$kT}][{$l}]['deptos']}{else}{$itT.deptos}{/if}"/>
        {*}
        <input class="smallInput small2" name="deptos_{$kT}_{$l}" id="deptos_{$kT}_{$l}" type="text" size="50" value="{if $isSet == 1}{$niveles[{$kT}][{$l}]['deptos']}{else}{$itT.deptos}{/if}"/>
        </td>            
    </tr>
    {/section}
</tbody>
</table>
<br />
{/foreach}

</form>