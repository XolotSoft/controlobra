<div id="divForm">
               
        <div style="width:30%;float:left"><b>Concepto:</b></div>        	
        <table width="60%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td>{$info.concept} &nbsp;&nbsp;&nbsp;<b>Cant:</b> {$info.qtyConcept}</td>
        </tr>
        </table>
        <hr />
        
        {if $info.supplier}
        <div style="width:30%;float:left"><b>Contratista:</b></div>
			{$info.supplier}
        <hr />
        {/if}
        
        <div style="width:30%;float:left"><b>No. de Presupuesto:</b></div>
			{$info.noPresupuesto}
        <hr />
                
        <div style="width:30%;float:left"><b>Torre:</b></div>
        	{$info.torre}
        <hr />
        
        {foreach from=$torres item=item key=key}       
        <div style="width:30%;float:left"><b>Nivel Torre {$item.name}:</b></div>
        <table width="70%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="left">
            	{$item.level} <b>AL</b> {$item.level2} &nbsp;&nbsp; 
                <b>No. Pisos:</b> &nbsp;{$item.totalLevel}
                &nbsp;&nbsp;
                <b>Total Areas:</b> &nbsp;{$item.totalAreas}
            </td>
        </tr>
        </table>                
        <br />
        {/foreach}
        <hr />
        
        <div style="width:30%;float:left"><b>Tipo de Area:</b></div>
        <table width="60%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="">{$info.type} &nbsp;&nbsp;&nbsp;<b>Cant:</b> {$info.qtyArea}</td>
        </tr>
        </table>                
        <hr />
                        
        <div style="width:30%;float:left"><b>Ejes:</b></div>
        	<table width="200" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
            {foreach from=$ejes item=item key=key}
            <tr>
                <td valign="left">
                <div style="float:left; width:50px">
                {$item.letter|replace:"1":"'"} - {$item.letter2|replace:"1":"'"}</div>
                <div style="float:left; width:10px">|</div>
                <div style="float:left; padding-left:15px">
                {$item.number|replace:"A":"'"} - {$item.number2|replace:"A":"'"}</div>
                </td>
            </tr>
            {/foreach}       
            </table>
       <hr />
       
       <div style="width:30%;float:left">&nbsp;</div>
        <table width="300" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	{if $info.b > 0}
        	<td width="25">B = </td>
            <td align="center">
            {$info.b}
            </td>
            {/if}
            
            {if $info.h > 0}
            <td width="25">H = </td>
            <td>
            {$info.h}
            </td>
            {/if}
            
            {if $info.z >0}
            <td width="25">Z = </td>
            <td>
            {$info.z}
            </td>
            {/if}
            
            <td>
            {$info.unit}
            </td>
        </tr>
        </table>
        <hr />
        
        <div style="width:30%;float:left"><b>Vano:</b></div>
        <table width="300" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	{if $info.bV > 0}
        	<td width="25">B = </td>
            <td align="center">
            {$info.bV}
            </td>
            {/if}
            
            {if $info.hV > 0}
            <td width="25">H = </td>
            <td>
            {$info.hV}
            </td>
            {/if}
            
            {if $info.zV > 0}
            <td width="25">Z = </td>
            <td>
            {$info.zV}
            </td>
            {/if}
            
            <td>
            {$info.subtotalV}
            </td>
        </tr>
        </table>
        <hr />
        
        <div style="width:30%;float:left">&nbsp;</div>
        <table width="250" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="150"><b>SUBTOTAL</b></td>           
            <td width=""><b>TOTAL</b></td>          
        </tr>
        <tr>
        	<td>{$info.subtotal|number_format:2:".":","}</td>           
            <td>{$info.total|number_format:2:".":","}</td>          
        </tr>
        </table>                
		
        <div style="clear:both"></div>
			<hr />
        <div class="formLine" style="text-align:center; margin-left:300px;">            
            <a class="button_grey" id="btnCerrar"><span>Cerrar</span></a>           
     	</div> 
                          
      <div style="clear:both"></div>
      
      <div style="margin-bottom:10px"></div>
      
</div>
