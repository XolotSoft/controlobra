<select name="currencyEquip[{$key}]" id="currencyEquip[{$key}]" class="smallInput" onchange="SaveMontoEquip()">
<option value="">Seleccione</option>
<option value="MXN" {if $item.currency == "MXN"}selected{/if}>MXN</option>
<option value="DLS" {if $item.currency == "DLS"}selected{/if}>DLS</option>
<option value="EUR" {if $item.currency == "EUR"}selected{/if}>EUR</option>
</select>