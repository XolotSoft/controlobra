<form name="frmStep2" id="frmStep2" method="post">
<input type="hidden" id="type" name="type" value="saveStep2"/>
<table width="850" cellpadding="0" cellspacing="0" border="1" class="boxTable">
<tfoot>
	<tr>
		<td colspan="6" align="right" class="tblPages" height="22">
        <div style="float:left">        
       		<input type="button" name="btnBack" id="btnBack" value="<< Anterior" class="btnGral" onclick="GoStep(1)" />
        </div>
        <div style="float:right">        
       		<input type="button" name="btnNext" id="btnNext" value="Siguiente >>" class="btnGral" onclick="SaveStep2()" />
        </div>
        </td>
	</tr>
</tfoot>
</table>
<br />
<table width="850" cellpadding="0" cellspacing="0" border="1" class="boxTable">
 <thead>
    <tr>
        <th width="100" class="tblTh">Torre</th>
        <th class="tblTh">Nombre</th>
        <th class="tblTh">Niveles</th>
        <th class="tblTh">Areas por Nivel</th>
        <th class="tblTh">Nivel Inicial</th>
        <th class="tblTh">Separaci&oacute;n</th>
  </tr>
</thead>
<tbody>
{section name=foo start=0 loop={$info.items} step=1}
	{assign var="k" value=$smarty.section.foo.index}  
    <tr>
    	<td height="40" align="center">{$k + 1}</td>
    	<td align="center">
        <input class="smallInput small" name="name_{$k}" id="name_{$k}" type="text" size="50" value="{if $isBack == 1}{$torres[$k].name}{else}{$abc[$k]}{/if}" style="width:100px" />
        </td>
        <td align="center">
        <input class="smallInput small" name="levels_{$k}" id="levels_{$k}" type="text" size="50"  value="{if $isBack == 1}{$torres[$k].levels}{else}{$info.levels}{/if}" style="width:100px" />
        </td>
        <td align="center">
        <input class="smallInput small" name="deptos_{$k}" id="deptos_{$k}" type="text" size="50"  value="{if $isBack == 1}{$torres[$k].deptos}{else}{$info.deptos}{/if}" style="width:100px" />
        </td>
        <td align="center">
        <input class="smallInput small" name="iniLevel_{$k}" id="iniLevel_{$k}" type="text" size="50"  value="{if $isBack == 1}{$torres[$k].iniLevel}{else}{$info.iniLevel}{/if}" style="width:100px" />
        </td>
        <td align="center">
        <input class="smallInput small" name="separacion_{$k}" id="separacion_{$k}" type="text" size="50"  value="{if $isBack == 1}{$torres[$k].separacion}{else}{$info.separacion}{/if}" style="width:100px" />
        </td>
    </tr>
{/section}
</tbody>   
</table>
</form>