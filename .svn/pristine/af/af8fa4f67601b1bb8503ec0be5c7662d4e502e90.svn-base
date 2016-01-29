	<form name="frmImg" id="frmImg" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update_img" />
        <input type="hidden" name="projectId" value="{$info.projectId}" />
        <input type="hidden" name="p" value="{$p}" />
        <input type="hidden" name="delete" id="delete" value="0" />
                       
		<fieldset>
        	<br />           
            <div class="txtGral" align="center"><h2>.:: {$info.name} ::.</h2></div>
            <br />
            <div align="center"> 
            {if $info.image}                       
            	<img src="{$WEB_ROOT}/images/projects/th_{$info.image}" />           
            {else}                   
			<div class="a">
            	<div class="l" style="font-size:14px">Imagen<br />&nbsp;</div>
                <div class="r">
                 <input name="file" type="file" class="contact-txt-bg" id="file" />
              </div>
            </div>            
            {/if}
            </div>
             <div class="a">
            	<div class="l">&nbsp;</div>               
            </div>            
            <div class="a" align="center">
            	
                	<table width="40%" cellpadding="0" cellspacing="0" border="1" class="boxTable">
                    <tfoot>
                        <tr>
                            <td align="center" class="tblPages" height="22">        
                            <div align="center">
                            {if $info.image}       
                            <input type="button" name="btnDel" id="btnDel" value="Eliminar" class="btnGral" style="width:100px" onclick="DeleteImg()" />    
                            {else}                            
                            <input type="button" name="btnSave" id="btnSave" value="Guardar" class="btnGral" style="width:100px" onclick="UpdateImg()" />
                            {/if}
                            </div>                            
                            </td>
                        </tr>
                    </tfoot>
                    </table>               	
               
            </div>
          
           <br />
           <div align="center">{$mensaje}</div>
                       
		</fieldset>
	</form>