<div id="divForm">
	<form id="editSubcategoryForm" name="editSubcategoryForm" method="post">
    <fieldset>
        
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50" value="{$info.name}"/>
        <hr />
       
          <div style="width:30%;float:left">Activo:</div> 
          <input type="checkbox" value="1" name="active" id="active" {if $info.active}checked{/if} />
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditSubcategory"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditSubcategory"/>
        <input type="hidden" id="id" name="id" value="{$info.subcategoryId}" />
  	</fieldset>
	</form>
</div>