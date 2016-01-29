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

{foreach from=$torres item=itT key=idT}

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
	{foreach from=$niveles[{$idT}] item=iL key=l}
	<tr>    	
    	<td height="40" align="center">
        <input class="smallInput small2" name="level_{$idT}_{$l}" id="level_{$idT}_{$l}" type="text" size="50" value="{$iL.level}"/>
        <input type="hidden" name="idProjLevel_{$idT}_{$l}" id="idProjLevel_{$idT}_{$l}" value="{$iL.projLevelId}" />
        </td>
        <td height="40" align="center">
        <input class="smallInput small2" name="name_{$idT}_{$l}" id="name_{$idT}_{$l}" type="text" size="50" value="{$iL.name}"/>
        </td>        
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small2" name="deptos_{$idT}_{$l}" id="deptos_{$idT}_{$l}" type="text" size="50" value="{$iL.deptos}"/>
        </td>            
    </tr>
    {/foreach}
</tbody>
</table>
<br />
{/foreach}

</form>