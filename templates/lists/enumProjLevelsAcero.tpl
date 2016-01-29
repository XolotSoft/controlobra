{foreach from=$torres item=to key=kPL}
{assign var="levels" value=$to.levels}
<div style="width:30%;float:left">* Nivel Torre {$to.name}:</div>
<table width="480" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
<tr>
    <td width="100" align="center">    	
        {include file="{$DOC_ROOT}/templates/lists/enumLevelAcero.tpl" projItemId="{$to.projItemId}"}
    </td>
    <td align="center" width="30">&nbsp;AL</td>
    <td width="100" align="center">
        {include file="{$DOC_ROOT}/templates/lists/enumLevel2Acero.tpl"  projItemId="{$to.projItemId}"}
    </td>
    <td>
    	<div style="float:left; padding-top:3px"">No. Pisos: &nbsp;</div> 
    	<div style="float:left; padding-top:3px"" id="txtTotalLevel_{$to.projItemId}">{if $to.totalLevel == ""}0{else}{$to.totalLevel}{/if}</div>
        <input type="hidden" name="totalLevel_{$to.projItemId}" id="totalLevel_{$to.projItemId}" value="{if $to.totalLevel == ""}0{else}{$to.totalLevel}{/if}" />       
    </td>
</tr>
</table>
<br />
{foreachelse}
<div style="width:30%;float:left">* Nivel Torre:</div>
Ning&uacute;n nivel encontrado.
<br />
{/foreach}
<hr />