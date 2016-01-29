{foreach from=$torres item=to key=kPL}
{assign var="levels" value=$to.levels}
<div style="width:30%;float:left">* Nivel Torre {$to.name}:</div>
<table width="55%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
    {foreach from=$levels item=lev key=kL}
    <tr>
        <td align="center" width="60"><div align="center" class="bdTB">{$lev.iniLevel}</div></td>
        <td align="center" width="30"><div align="center" class="bdTB">AL</div></td>
        <td align="center" width="60"><div align="center" class="bdTB">{$lev.endLevel}</div></td>
        <td align="center" width="">
        <div align="center" class="bdTB">
        	<div style="float:left; padding-left:10px">No. Pisos: {$lev.totalLevel}</div>
        	<div style="float:right">
            	<a href="javascript:void(0)" onclick="ToogleTorre({$lev.cuantItemId})">
                <div id="iconTorre_{$lev.cuantItemId}">[+]</div></a>
            </div>
            <div style="clear:both"></div>
        </div>
        </td>
    </tr>
   
    <tr id="torre_{$lev.cuantItemId}" style="display:none">
        <td colspan="4">
        <input type="hidden" name="itemIds[]" value="{$lev.cuantItemId}" />
        <div style="padding-top:5px; padding-bottom:5px; float:left">
        <table width="320" cellpadding="0" cellspacing="0" border="1">
           
        <tr>
            <td align="center"><div align="center"><b>Subtotal</b></div></td>
            <td align="center"><div align="center"><b>Saldo</b></div></td>
            <td align="center"><div align="center"><b>Req. Actual</b></div></td>
        </tr>
       
        <tr>
            <td align="center">
            <div align="center">{$lev.subtotal|number_format:2:".":","}</div>
            <input type="hidden" name="subtotal_{$lev.cuantItemId}" id="subtotal_{$lev.cuantItemId}" value="{$lev.subtotal}">
            </td>
            <td align="center">
            <div align="center">{$lev.saldo|number_format:2:".":","}</div>
            <input type="hidden" name="saldo_{$lev.cuantItemId}" id="saldo_{$lev.cuantItemId}" value="{$lev.saldo}">
            </td>
            <td align="center">
            <div align="center">
            <input type="text" class="smallInput" style="width:70px" name="requi_{$lev.cuantItemId}" id="requi_{$lev.cuantItemId}" value="0" onblur="UpdateTotalesAcero()" /></div></td>
        </tr>           
        </table>      
        </div>
                     
        </td>        
    </tr>
   
    {foreachelse}
    <tr><td colspan="3" align="center"><div align="center">Ninguna &aacute;rea encontrada.</div></td>
    {/foreach}
</table>
<br />
{foreachelse}
<div style="width:30%;float:left">* Nivel Torre:</div>
Ning&uacute;n nivel encontrado.
<br />
{/foreach}
<hr />