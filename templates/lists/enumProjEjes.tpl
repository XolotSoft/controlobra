{foreach from=$torres item=e key=eK}
<div style="width:30%;float:left">* Ejes Torre :</div>
    {include file="{$DOC_ROOT}/templates/lists/enumEjesByArea.tpl"}
<br />
{foreachelse}
<div style="width:30%;float:left">* Ejes Torre :</div>
Ning&uacute;n eje encontrado.
{/foreach}
<hr />