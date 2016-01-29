{foreach from=$torres item=item key=kPL}

<div style="width:30%;float:left">* Nivel Torre {$item.name}:</div>
<table width="55%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
   
    <tr>
        <td align="center" width="60"><div align="center" class="bdTB">{$item.iniLevel}</div></td>
        <td align="center" width="30"><div align="center" class="bdTB">ALs</div></td>
        <td align="center" width="60"><div align="center" class="bdTB">{$item.endLevel}</div></td>
        <td align="center" width="">
        <div align="center" class="bdTB">
        	<div style="float:left; padding-left:10px">No. Pisos: {$item.totalLevel}</div>
        	<div style="float:right">
            	<a href="javascript:void(0)" onclick="ToogleTorre({$item.cuantItemId})">
                <div id="iconTorre_{$item.cuantItemId}">[+]</div></a>
            </div>
            <div style="clear:both"></div>
        </div>
        </td>
    </tr>
   
    <tr id="torre_{$item.cuantItemId}" style="display:none">
        <td colspan="4">
        <input type="hidden" name="itemIds[]" value="{$item.cuantItemId}" />
        <div style="padding-top:5px; padding-bottom:5px; float:left">
        <table width="320" cellpadding="0" cellspacing="0" border="1">
           
        <tr>
            <td align="center"><div align="center"><b>Subtotal</b></div></td>
            <td align="center"><div align="center"><b></b></div></td>
            <td align="center"><div align="center"><b>Est. Actual</b></div></td>
        </tr>
       
        <tr>
            <td align="center"><div align="center">{$item.subtotal}</div></td>
            <td align="center"><div align="center">{$item.saldo}</div></td>
            <td align="center"><div align="center">{$item.estimacion}</div></td>
        </tr>           
        </table>      
        </div>
                     
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