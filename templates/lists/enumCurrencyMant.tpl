<select name="currencyMant[{$key}]" id="currencyMant[{$key}]" class="smallInput" onchange="SaveMontoMant()">
<option value="">Seleccione</option>
<option value="MXN" {if $item.currency == "MXN"}selected{/if}>MXN</option>
<option value="DLS" {if $item.currency == "DLS"}selected{/if}>DLS</option>
<option value="EUR" {if $item.currency == "EUR"}selected{/if}>EUR</option>
</select>