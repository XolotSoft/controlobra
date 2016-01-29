<select name="tipo" id="tipo" class="smallInput" onchange="ToogleExtraInfo()">
<option value="">Seleccione</option>
<option value="Obra" {if $info.tipo == "Obra"}selected{/if}>Obra</option>
<option value="Subcontrato" {if $info.tipo == "Subcontrato"}selected{/if}>Subcontrato</option>
<option value="Servicio" {if $info.tipo == "Servicio"}selected{/if}>Servicio</option>
</select>