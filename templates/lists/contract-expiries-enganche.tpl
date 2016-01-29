<table width="60%" cellpadding="0" cellspacing="0" border="0" class="_tblNoBorder">
<tr>
    <td align="center"><div align="center"><b>No.</b></div></td>
    <td align="center"><div align="center"><b>Monto $</b></div></td>
    <td align="center"><div align="center"><b>Fecha</b></div></td>
</tr>
<tr>
    <td align="center">
    <div align="center">
    <input class="smallInput small" name="nomEng" type="text" style="width:90px" value="Enganche" readonly="readonly"/>
    <input type="hidden" name="contExpIdEng" id="contExpIdEng" value="{$info.contExpIdEng}" />
    </div>
    </td>
    <td align="center"><div align="center">    
    <input class="smallInput small" name="montoEng" id="montoEng" type="text" style="width:90px" value="{$info.montoEng}" onblur="FormatField('montoEng')" />   
    </div>
    </td>
    <td align="center"><div align="center">
    	<div style="float:left">
    	<input class="smallInput small" name="fechaEng" id="fechaEng" type="text" style="width:90px" value="{$info.fechaEng}" readonly="readonly"/>
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fechaEng','ddmmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
    </div>
    </td>
</tr>
</table>