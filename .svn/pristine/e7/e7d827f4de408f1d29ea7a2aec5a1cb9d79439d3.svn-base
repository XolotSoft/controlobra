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
        {section name=foo start=0 loop=$maxDeptos step=1}
        	{assign var="d" value=$smarty.section.foo.index}           
        	<th width="120" class="tblTh">Area {$d + 1}<br />
            <input type="button" name="btnAplicar" id="btnAplicar" value="Aplicar" class="btnAplicar" onclick="SetType({$kT},{$d})" />           
            </th>        
        {/section}
  </tr>
</thead>
<tbody>
	{foreach from=$niveles[$kT] item=iN key=kN}
	<tr>    	
    	<td height="40" align="center">
        {$iN.level}
        </td>
        <td align="center">{$iN.name}</td>
        {foreach from=$deptos[$kT][$kN] item=iD key=kD}
            <td align="center" bgcolor="{if $iD.subTypeId === ''}{$types[{$iD.typeId}]['color']}{else}{$types[{$iD.typeId}]['subTypes'][$iD.subTypeId]['color']}{/if}" id="area_{$kT}_{$kN}_{$kD}">
            <input class="smallInput small2" name="depto_{$kT}_{$kN}_{$kD}" id="depto_{$kT}_{$kN}_{$kD}" type="text" size="50" value="{$iD.name}"/>
            <input type="hidden" name="idProjDepto_{$kT}_{$kN}_{$kD}" id="idProjDepto_{$kT}_{$kN}_{$kD}" value="{$iD.projDeptoId}" />
            {include file="{$DOC_ROOT}/templates/lists/enumTypeGralDepto2.tpl" nom="{$kT}_{$kN}_{$kD}"}
            <br />
            <div id="divSubTypes_{$kT}_{$kN}_{$kD}" style="{if $types[$iD.typeId].subTypes|count == 0}display:none{/if}">
            	{include file="{$DOC_ROOT}/templates/lists/enumSubTypeGralDepto2.tpl" nom="{$kT}_{$kN}_{$kD}"}
            </div>
            </td>            
       {/foreach}
       
       {if $deptosVacios[$kT][$kN]}
           {for $d=1 to {$deptosVacios[$kT][$kN]}}
           <td>&nbsp;</td>
           {/for}
       {/if}
       
    </tr>
    {/foreach}
</tbody>
</table>
<input type="hidden" name="levels_{$kT}" id="levels_{$kT}" value="{$itT.levels}" />
<br />
{/foreach}

</form>