<div id="divForm">
	<form id="editCustomerForm" name="editCustomerForm" method="post">
    <fieldset>        
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="50%">* Nombre:</td>
            <td>* Categor&iacute;a:</td>
        </tr>        
        <tr>
        	<td><input class="smallInput medium" name="name" id="name" type="text" size="50" style="width:300px" value="{$info.name}"/></td>
            <td>{include file="{$DOC_ROOT}/templates/lists/enumCatCust.tpl"}</td>
        </tr>
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>RFC:</td>
            <td>Calle:</td>
        </tr>
        <tr>
        	<td><input class="smallInput small" name="rfc" id="rfc" type="text" size="50" value="{$info.rfc}"/></td>
            <td><input class="smallInput medium" name="street" id="street" type="text" size="50" style="width:300px" value="{$info.street}"/></td>
        </tr>
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>No. Exterior:</td>
            <td>No. Interior:</td>
        </tr>
        <tr>
        	<td><input class="smallInput small" name="noExt" id="noExt" type="text" size="50" value="{$info.noExt}"/></td>
            <td><input class="smallInput medium" name="noInt" id="noInt" type="text" size="50" style="width:300px" value="{$info.noInt}"/></td>
        </tr>
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>C&oacute;digo Postal:</td>
            <td>Colonia:</td>
        </tr>
        <tr>
        	<td><input class="smallInput small" name="postalCode" id="postalCode" type="text" size="50" value="{$info.postalCode}"/></td>
            <td><input class="smallInput medium" name="colonia" id="colonia" type="text" size="50" style="width:300px" value="{$info.colonia}"/></td>
        </tr>
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>Estado:</td>
            <td>Ciudad:</td>
        </tr>
        <tr>
        	<td>{include file="{$DOC_ROOT}/templates/lists/enumState.tpl"}</td>
            <td><div id="listCities">{include file="{$DOC_ROOT}/templates/lists/enumCity.tpl"}</div></td>
        </tr>
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>Tel&eacute;fono:</td>
            <td>Email:</td>
        </tr>        
        <tr>
        	<td><input class="smallInput medium" name="phone" id="phone" type="text" size="50" style="width:300px" value="{$info.phone}"/></td>
            <td><input class="smallInput medium" name="e_mail" id="e_mail" type="text" size="50" style="width:300px" value="{$info.email}"/></td>
        </tr>
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>Estado Civil:</td>
            <td>Fecha de Nacimiento:</td>
        </tr>
        <tr>
        	<td>{include file="{$DOC_ROOT}/templates/lists/enumEdoCivil.tpl"}</td>
            <td>
            	<table width="220" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
                <tr>
                    <td width="65">
                    <select name="day" id="day" class="smallInput">
                    <option value="">Sel.</option>
                    {for $k=1 to 31}
                    <option value="{if $k<=9}0{/if}{$k}" {if $info.day == $k}selected{/if}>{$k}</option>
                    {/for}
                    </select>
                    </td>
                    <td width="110">
                    <select name="month" id="month" class="smallInput">
                    <option value="">Seleccione</option>
                    <option value="01" {if $info.month == "01"}selected{/if}>Enero</option>
                    <option value="02" {if $info.month == "02"}selected{/if}>Febrero</option>
                    <option value="03" {if $info.month == "03"}selected{/if}>Marzo</option>
                    <option value="04" {if $info.month == "04"}selected{/if}>Abril</option>
                    <option value="05" {if $info.month == "05"}selected{/if}>Mayo</option>
                    <option value="06" {if $info.month == "06"}selected{/if}>Junio</option>
                    <option value="07" {if $info.month == "07"}selected{/if}>Julio</option>
                    <option value="08" {if $info.month == "08"}selected{/if}>Agosto</option>
                    <option value="09" {if $info.month == "09"}selected{/if}>Septiembre</option>
                    <option value="10" {if $info.month == "10"}selected{/if}>Octubre</option>
                    <option value="11" {if $info.month == "11"}selected{/if}>Noviembre</option>
                    <option value="12" {if $info.month == "12"}selected{/if}>Diciembre</option>
                    </select>
                    </td>
                    <td>
                    <select name="year" id="year" class="smallInput">
                    <option value="">Seleccione</option>
                    {for $k=$cYear to $cYear-100}
                        <option value="{$k}" {if $info.year == $k}selected{/if}>{$k}</option>
                    {/for}
                    
                    </select>
                    </td>
                </tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>Empresa:</td>
            <td>Puesto:</td>
        </tr>
        <tr>
        	<td><input class="smallInput medium" name="company" id="company" type="text" size="50" style="width:300px" value="{$info.company}"/></td>
            <td><input class="smallInput medium" name="position" id="position" type="text" size="50" style="width:300px" value="{$info.position}"/></td>
        </tr>
        
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>Religi&oacute;n:</td>
            <td>
            	<div id="txtOtraReligion" {if $info.religion != "Otra"}style="display:none"{/if}>
            		Especifique la Religi&oacute;n
                </div>
            </td>
        </tr>
        <tr>
        	<td>{include file="{$DOC_ROOT}/templates/lists/enumReligion.tpl"}</td>
            <td>
            	<div id="inputOtraReligion"  {if $info.religion != "Otra"}style="display:none"{/if}>
            	<input class="smallInput medium" name="otraReligion" id="otraReligion" type="text" size="50" style="width:300px" value="{$info.otraReligion}"/>
                </div>
            </td>
        </tr>
        
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>Regimen Matrimonial</td>
            <td></td>
        </tr>
        <tr>
        	<td>{include file="{$DOC_ROOT}/templates/lists/enumRegimenMat.tpl"}</td>
            <td></td>
        </tr>
        
        <tr><td colspan="2" height="10"></td></tr>
        <tr>
        	<td>Observaciones:</td>
            <td>Activo</td>
        </tr>
        <tr>
        	<td><textarea name="notes" id="notes" style="width:300px" rows="5">{$info.notes}</textarea></td>
            <td valign="top"><input type="checkbox" value="1" name="active" id="active" {if $info.active}checked{/if} /></td>
        </tr>
        </table>
                    
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditCustomer"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditCustomer"/>
        <input type="hidden" id="id" name="id" value="{$info.customerId}" />
  	</fieldset>
	</form>
</div>