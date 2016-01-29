		<div class="popupheader" style="z-index:70">
			<div id="fviewmenu" style="z-index:70">
	    	<div id="fviewclose"><span style="color:#CCC" id="closePopUpDiv">Close<img src="{$WEB_ROOT}/images/b_disn.png" border="0" alt="close" /></span>
      	</div>
      </div>

      <div id="ftitl">
    		<div class="flabel">Agregar Cuantificaci&oacute;n</div>
				<div id="vtitl" style="padding-top:10px">              	
                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">                    
                    <tr>
                    	{if $infP.image}
                    	<td align="center" width="200"><div align="center">                        
                        <img src="{$WEB_ROOT}/images/projects/th_{$infP.image}" />                        
                        </div>
                        </td>
                        {/if}
                        <td align="center" valign="top">
                        <div align="center" style="color:#FFF">
                        	.:: Agregar Cuantificaci&oacute;n Acero ::.
                            <div style="padding-top:10px">{$infP.name}</div>
                        </div>
                        </td>
                    </tr>
                    </table>
                </div>
    		</div>
      <div id="draganddrop" style="position:absolute;top:45px;left:640px">
    		<img src="{$WEB_ROOT}/images/draganddrop.png" border="0" alt="mueve" />
    	</div>

		</div>
	<div style="clear:both"></div>
    <div class="wrapper">
			{include file="{$DOC_ROOT}/templates/forms/add-cuant-acero.tpl"}
	</div>