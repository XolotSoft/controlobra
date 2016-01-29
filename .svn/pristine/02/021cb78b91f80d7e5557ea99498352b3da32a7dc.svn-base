{foreach from=$torres item=to key=kPL}
{assign var="levels" value=$to.levels}
<div style="width:30%;float:left"><b>Nivel Torre {$to.name}:</b></div>
<table width="70%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
    {foreach from=$levels item=lev key=kL}
    {assign var="areas" value=$lev.areas}
    {assign var="areas2" value=$lev.areas2}
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
        <div style="padding-top:5px; padding-bottom:5px; float:left">
        <table width="230" cellpadding="0" cellspacing="0" border="1">
        {if $areas}    
        <tr>
            <td align="center"><div align="center"><b>Area</b></div></td>
            <td align="center"><div align="center"><b>Subtotal</b></div></td>
            <td align="center"><div align="center"><b>Est. Actual</b></div></td>
        </tr>
        {/if}
        {foreach from=$areas item=itA key=kA}
        <tr>
            <td align="center"><div align="center">{$itA.name}</div></td>
            <td align="center"><div align="center">{$itA.subtotal}</div></td>
            <td align="center"><div align="center">{$itA.estimacion}</div></td>
        </tr>    
        {foreachelse}
        <tr><td align="center" colspan="3"><div align="center">Ninguna &aacute;rea encontrada.</div></td></tr>
        {/foreach}   
        </table>       
        </div>
        
        <!-- 2ND SECTION -->
        
        <div style="padding-top:5px; padding-bottom:5px; float:left; margin-left:20px"">
        <table width="230" cellpadding="0" cellspacing="0" border="1">
        {if $areas2}    
        <tr>
            <td align="center"><div align="center"><b>Area</b></div></td>
            <td align="center"><div align="center"><b>Subtotal</b></div></td>
            <td align="center"><div align="center"><b>Est. Actual</b></div></td>
        </tr>
        {/if}
        {foreach from=$areas2 item=itA key=kA}
        <tr>
            <td align="center"><div align="center">{$itA.name}</div></td>
            <td align="center"><div align="center">{$itA.subtotal}</div></td>
            <td align="center"><div align="center">{$itA.estimacion}</div></td>
        </tr>            
        {/foreach}   
        </table>       
        </div>
        
        </td>
    </tr>
    {foreachelse}
    <tr><td colspan="4" align="center"><div align="center">Ninguna &aacute;rea encontrada.</div></td>
    {/foreach}
</table>
<br />
{foreachelse}
<div style="width:30%;float:left">* Nivel Torre:</div>
Ning&uacute;n nivel encontrado.
<br />
{/foreach}
<hr />