<form name="frmStep6" id="frmStep6" method="post">
<input type="hidden" id="type" name="type" value="saveStep6"/>

<table width="80%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td align="right" class="tblPages" height="22">        
       	<div style="float:left">        
       		<input type="button" name="btnBack" id="btnBack" value="<< Anterior" class="btnGral" onclick="GoStep(5)" />
        </div>
        <div style="float:right">        
       		<input type="button" name="btnNext" id="btnNext" value="Siguiente >>" class="btnGral" onclick="SaveStep6()" />
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
        <th width="100" class="tblTh">
        	Nivel<br />
           {include file="{$DOC_ROOT}/templates/lists/enumTypeGral.tpl" nom="_{$kT}"}
        </th>
        <th width="80" class="tblTh">Nombre <br /> Nivel</th>
        {section name=foo start=0 loop=$maxDeptos.total step=1}
        	{assign var="d" value=$smarty.section.foo.index}
            {if $d <= ($maxDeptos[{$kT}] - 1)}
        	<th width="120" class="tblTh">Area {$d + 1}<br />
            <input type="button" name="btnAplicar" id="btnAplicar" value="Aplicar" class="btnAplicar" onclick="SetType({$kT},{$d})" />
            {else}
            <th width="90" class="tblTh">&nbsp;</th>
            {/if}
            </th>        
        {/section}
  </tr>
</thead>
<tbody>
	{section name=foo2 start=$itT.levels loop=$itT.levels step=-1}
    	{assign var="l" value=$smarty.section.foo2.index}
	<tr>    	
    	<td height="40" align="center">
        {$niveles[{$kT}][{$l}]['level']}
        </td>
        <td align="center">{$niveles[{$kT}][{$l}]['name']}</td>
        {section name=foo start=0 loop=$maxDeptos.total step=1}
        	{assign var="d" value=$smarty.section.foo.index}
            {if $d <= ($niveles[{$kT}][{$l}]['deptos'] - 1)}
            {assign var="typeId" value="{$tipos[{$kT}][{$l}][{$d}]}"}
            {assign var="subTypeId" value="{$subTipos[{$kT}][{$l}][{$d}]}"}
            <td align="center" bgcolor="{if $types[$typeId].subTypes|count == 0}{$types[$typeId]['color']}{else}{$types[$typeId]['subTypes'][$subTypeId]['color']}{/if}" id="area_{$kT}_{$l}_{$d}">
            <input class="smallInput small2" name="depto_{$kT}_{$l}_{$d}" id="depto_{$kT}_{$l}_{$d}" type="text" size="50" value="{if $existDepas == '1'}{$depas[{$kT}][{$l}][{$d}]}{else}{$l+1}{if ($d+1) < 10}0{/if}{$d+1}{/if}"/>
            {include file="{$DOC_ROOT}/templates/lists/enumTypeGralDepto.tpl" nom="{$kT}_{$l}_{$d}"}
            <br />
            <div id="divSubTypes_{$kT}_{$l}_{$d}" style="{if $types[$typeId].subTypes|count == 0}display:none{/if}">               
            	{include file="{$DOC_ROOT}/templates/lists/enumSubTypeGralDepto3.tpl" nom="{$kT}_{$l}_{$d}"}
            </div>
            </td>
            {else}
            <td bgcolor="#FFFFFF">&nbsp;</td>
            {/if}
       {/section}
    </tr>
    {/section}
</tbody>
</table>
<input type="hidden" name="levels_{$kT}" id="levels_{$kT}" value="{$itT.levels}" />
<br />
{/foreach}

</form>