		<div class="popupheader" style="z-index:70">
			<div id="fviewmenu" style="z-index:70">
	    	<div id="fviewclose"><span style="color:#CCC" id="closePopUpDiv">Close<img src="{$WEB_ROOT}/images/b_disn.png" border="0" alt="close" /></span>
      	</div>
      </div>

      <div id="ftitl">
    		<div class="flabel">Agregar Subpartida</div>
				<div id="vtitl"><span title="Titulo">Agregar Subpartida</span></div>
                <br />
            	Partida: {$nomCat}
    	</div>        
      <div id="draganddrop" style="position:absolute;top:45px;left:640px">
    		<img src="{$WEB_ROOT}/images/draganddrop.png" border="0" alt="mueve" />
    	</div>

		</div>
		
    <div class="wrapper">
			{include file="{$DOC_ROOT}/templates/forms/add-subcategory.tpl"}
		</div>