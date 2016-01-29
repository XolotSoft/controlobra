<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itC.cuants item=iC key=kC}
<tr>     
    <td align="center" height="40" width="80" bgcolor="#FFFFFF"> >>> </td>       
    <td align="left" bgcolor="#FFFFFF">
    {if $iC.tipo == "Servicio"}
    	<div align="left" style="padding-left:10px"><b>Cantidad:</b> {$iC.qtyConcept}</div>
        <div align="left" style="padding-left:10px"><b>Precio Unitario:</b> ${$iC.unitPrice|number_format:2:'.':','}</div>
        <div align="left" style="padding-left:10px"><b>Total:</b> ${$iC.total|number_format:2:'.':','}</div>
    {else}
    	{if $iC.supplier}
        <div align="left" style="padding-left:10px; padding-top:10px"><b>Contratista:</b> {$iC.supplier}</div>
        {/if}
        <div align="left" style="padding-left:10px"><b>Torre:</b> {$iC.torre}</div>
        {foreach from=$iC.torres item=itT key=kT}
        <div align="left" style="padding-left:10px"><b>Nivel Torre {$itT.name}:</b> {$itT.level} AL {$itT.level2}</div>
        {/foreach}
    
        {if $iC.steel == 0}
            <div align="left" style="padding-left:10px"><b>Tipo Area:</b> {$iC.type}</div> 
            
            <table width="300" cellpadding="0" cellspacing="0" border="0" style="border:0px">
            <tr>
            	<td width="60" style="border:0px" valign="top">&nbsp;&nbsp;&nbsp;<span style="font-size:14px"><b>Ejes:</b></span></td>
                <td style="border:0px; font-size:14px">            
                    {foreach from=$iC.ejes item=item key=key}
                        <div style="float:left; width:50px">
                        {$item.letter|replace:"1":"'"} - {$item.letter2|replace:"1":"'"}</div>
                        <div style="float:left; width:10px">|</div>
                        <div style="float:left; padding-left:15px">
                        {$item.number|replace:"A":"'"} - {$item.number2|replace:"A":"'"}</div>
                        <div style="clear:both"></div>
                    {/foreach}  
                </td>
            </tr>
            </table>
                        
            <div align="left" style="padding-left:10px; padding-bottom:10px">
                <b>B:</b> {$iC.b} 
                {if $iC.h != "0.00"}
                &nbsp;&nbsp;<b>H:</b> {$iC.h} 
                {/if}
                {if $iC.z != "0.00"}
                &nbsp;&nbsp;<b>Z:</b> {$iC.z} 
                {/if}
                &nbsp;&nbsp;<b>Unidad:</b> {$iC.unit}
            </div>
        {else}
            <div align="left" style="padding-bottom:10px"></div>
        {/if}
        
    {/if}
    </td>        
    <td align="center" bgcolor="#FFFFFF" width="95">            
     <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$iC.cuantificacionId}" title="Eliminar"/>
     
     {if $iC.tipo == "Servicio"} 
     	<a href="javascript:void(0)" onclick="EditCuantServPopup({$iC.cuantificacionId})">
     	<img src="{$WEB_ROOT}/images/icons/edit.gif" title="Editar" border="0"/>
        </a>
     {else}     	         
         {if $iC.steel == 1}
             <a href="javascript:void(0)" onclick="EditCuantAceroDiv({$iC.cuantificacionId})">
             	<img src="{$WEB_ROOT}/images/icons/edit.gif" title="Editar" border="0"/>
             </a>
             <a href="javascript:void(0)" onclick="ViewCuantAceroPopup({$iC.cuantificacionId})">
                <img src="{$WEB_ROOT}/images/icons/details.png" title="Ver Detalles" border="0" />
             </a>
         {else}
         	<img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$iC.cuantificacionId}" title="Editar" border="0"/>
         	<img src="{$WEB_ROOT}/images/icons/details.png" class="spanView" id="{$iC.cuantificacionId}" title="Ver Detalles"/>
         {/if}
    {/if}
    </td>
</tr>
{foreachelse}
<tr>
    <td align="center" bgcolor="#FFFFFF" width="60"> >>> </td>
	<td bgcolor="#FFFFFF" align="center" height="40">Ninguna cuantificaci&oacute;n encontrada.</td>
</tr>
{/foreach}
</table>