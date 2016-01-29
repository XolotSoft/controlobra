{assign var="wSubcat" value="100"}
{assign var="wConcept" value="100"}
{assign var="wCantidad" value="60"}
{assign var="wUnidad" value="40"}
{assign var="wPrecio" value="60"}
{assign var="wTotal" value="85"}
{assign var="wBlank" value="35"}
{assign var="wCantidad2" value="85"}
{assign var="wTotal2" value="85"}
{assign var="wPorc" value="60"}
<table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="1" class="boxTable">
<tbody>     
    <tr>
    	<td width="573" height="30"></td>
        <td align="center" width="312" bgcolor="#EBEBEB" style="color:#000000">PRESUPUESTO ORIGINAL</td>
        <td width="51"></td>
        <td align="center" width="280" bgcolor="#EBEBEB" style="color:#000000">PRESUPUESTO MODIFICADO</td>
        <td width="51"></td>
        <td align="center" width="280" bgcolor="#EBEBEB" style="color:#000000">GASTO REAL</td>
    </tr>
</tbody>     
</table>
<table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="1" class="boxTable">
    {include file="{$DOC_ROOT}/templates/items/resumen-gastos-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/resumen-gastos-base.tpl"}
</tbody>     
</table>