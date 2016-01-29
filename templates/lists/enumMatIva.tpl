<select name="iva[{$key}]" id="iva_{$key}" class="smallInput" onchange="UpdateTotal({$key})">
<option value="0" {if $item.iva == "0"}selected{/if}>0 %</option>
<option value="11" {if $item.iva == "11"}selected{/if}>11 %</option>
<option value="16" {if $item.iva == "16"}selected{/if}>16 %</option>
</select>