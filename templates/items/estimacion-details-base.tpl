    <tr>       
        <td align="center" height="40">{$item.concept}</td>
        <td align="center">
        <div align="left" style="padding-left:10px"><b>Torre:</b> {$item.torre}</div>
        {foreach from=$item.torres item=itT key=kT}
        <div align="left" style="padding-left:10px"><b>Nivel Torre {$itT.name}:</b> {$itT.level} AL {$itT.level2}</div>
        {/foreach}    
        <div align="left" style="padding-left:10px; padding-bottom:10px">
        {if $item.steel == 0}
        	
            <table width="200" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"><b>AREA</b></td>
                <td align="center"><b>EST. ACTUAL</b></td>
            </tr>
            {foreach from=$itT.areas item=iA key=kA}
            <tr>
                <td align="center">{$iA.name}</td>
                <td align="center">{$iA.estimacion|number_format:2:'.':','}</td>
            </tr>
            {/foreach}
            </table>
            
        {/if}
        </div>
        </td>
    </tr>        
