<select name="tipo" id="tipo" class="smallInput" onchange="ToogleProjects()">
<option value="">Seleccione</option>
<option value="proveedor" {if $info.tipo == "proveedor"}selected{/if}>Proveedor</option>
<option value="contratista" {if $info.tipo == "contratista"}selected{/if}>Contratista</option>
</select>