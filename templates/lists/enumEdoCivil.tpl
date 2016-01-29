<select name="edoCivil" id="edoCivil" class="smallInput">
<option value="">Seleccione</option>
<option value="Soltero" {if $info.edoCivil == "Soltero"}selected{/if}>Soltero</option>
<option value="Casado" {if $info.edoCivil == "Casado"}selected{/if}>Casado</option>
<option value="Divorciado" {if $info.edoCivil == "Divorciado"}selected{/if}>Divorciado</option>
<option value="Viudo" {if $info.edoCivil == "Viudo"}selected{/if}>Viudo</option>
</select>