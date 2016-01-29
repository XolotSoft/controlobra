<table width="300" cellpadding="0" cellspacing="0" id="tblBank" border="0" class="boxTable">
<thead>
    <tr>
        <th colspan="2" align="center">Ultimo Respaldo Generado</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td colspan="2" align="center" height="40">                
        <a href="{$WEB_ROOT}/backup-download.php" target="_blank" title="Descargar">{$backupFile}</a>
        </td>
    </tr>
    <tr>
        <td align="center" width="150" height="70">                        
            <a href="{$WEB_ROOT}/backup-download.php" target="_blank" title="Descargar">
            <img src="{$WEB_ROOT}/images/download.png" border="0" />                        
            <br />                        
            Descargar
            </a>
        </td>
        <td align="center">
            <a href="javascript:void(0)" onclick="Generate()" title="Generar Nuevo">
            <img src="{$WEB_ROOT}/images/generate.png" border="0" />
            <br />
            Generar Nuevo
            </a>
        </td>
    </tr>
</tbody>        
</table> 