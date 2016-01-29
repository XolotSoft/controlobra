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
            </td>
        </tr>
        </table>                
        <br />
        {/foreach}
        <hr />
        
        <div style="width:30%;float:left"><b>Materiales:</b></div>
               
        <div align="center" id="listMaterials">
      	<table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td align="center" width=""><div align="center"><b>Material</b></div></td>
          <td align="center" width="70"><div align="center"><b>Traslape</b></div></td>
          <td align="center" width="70"><div align="center"><b>Bulbos</b></div></td>
          <td align="center" width="70"><div align="center"><b>Cantidad</b></div></td>
          <td align="center" width="80"><div align="center"><b>Mts. Lin.</b></div></td>
          <td align="center" width="80"><div align="center"><b>Peso (Kg)</b></div></td>
          <td align="center" width="80"><div align="center"><b>Total Peso</b></div></td>
        </tr>
        {foreach from=$matsAcero item=item key=key}
        <tr>
          <td align="center"><div align="center">{$item.material}</div></td>
          <td align="center"><div align="center">{if $item.traslape > 0}{$item.traslape}{/if}</div></td>
          <td align="center"><div align="center">{if $item.bulbos > 0}{$item.bulbos}{/if}</div></td>
          <td align="center"><div align="center">{$item.quantity}</div></td>
          <td align="center"><div align="center">{$item.mtoLineal}</div></td>
          <td align="center"><div id="txtWeight_{$key}" align="center">{$item.weight}</div></td>
          <td align="center"><div id="txtTotalWeight_{$key}" align="center">{$item.totalWeight}</div></td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="7" align="center" height="40"><div align="center">Ning&uacute;n registro encontrado.</div></td>
        </tr>
        {/foreach}
        </table>
      	</div>               
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
        <table width="250" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="150"><b>SUBTOTAL</b></td>           
            <td width=""><b>TOTAL</b></td>          
        </tr>
        <tr>
        	<td>{$info.subtotal}</td>           
            <td>{$info.total}</td>          
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
