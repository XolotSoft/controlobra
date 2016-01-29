<table width="60%" cellpadding="0" cellspacing="0" border="0" class="_tblNoBorder">
<tr>
    <td align="center"><div align="center"><b>No.</b></div></td>
    <td align="center"><div align="center"><b>Monto $</b></div></td>
    <td align="center"><div align="center"><b>Fecha</b></div></td>
</tr>
<tr>
    <td align="center">
    <div align="center">
    <input class="smallInput small" name="nomMant" type="text" style="width:90px" value="Mantenimiento" readonly="readonly"/>
    <input type="hidden" name="contExpIdMant" id="contExpIdMant" value="{$info.contExpIdMant}" />
    </div>
    </td>
    <td align="center"><div align="center">    
    {include file="{$DOC_ROOT}/templates/lists/enumMantCont.tpl"}  
    </div>
    </td>
    <td align="center"><div align="center">
    	<div style="float:left">
    	<input class="smallInput small" name="fechaMant" id="fechaMant" type="text" style="width:90px" value="{if $info.fechaMant != '--'}{$info.fechaMant}{/if}" readonly="readonly"/>
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fechaMant','ddmmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
    </div>
    </td>
</tr>
<tr>
    <td align="center">
    <div align="center">
    <input class="smallInput small" name="nomEquip" type="text" style="width:90px" value="Equipamiento" readonly="readonly"/>
    <input type="hidden" name="contExpIdEquip" id="contExpIdEquip" value="{$info.contExpIdEquip}" />
    </div>
    </td>
    <td align="center"><div align="center">    
    {include file="{$DOC_ROOT}/templates/lists/enumEquipCont.tpl"}  
    </div>
    </td>
    <td align="center"><div align="center">
    	<div style="float:left">
    	<input class="smallInput small" name="fechaEquip" id="fechaEquip" type="text" style="width:90px" value="{if $info.fechaEquip != '--'}{$info.fechaEquip}{/if}" readonly="readonly"/>
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fechaEquip','ddmmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
    </div>
    </td>
</tr>
</table>