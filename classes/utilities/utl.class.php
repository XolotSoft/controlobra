<?php

class Utl
{
    public static function sumarDias($fecha, $dias)
    {
        $nuevafecha = strtotime('+'.$dias.' day', strtotime($fecha));
        $nuevafecha = date('Y-m-d', $nuevafecha);
        return $nuevafecha;
    }

    public static function zip($path, $file)
    {
        $zip = new ZipArchive();
        $res = $zip->open($path.$file.".zip", ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
        if ($res === true) {
            $zip->addFile($path.$file.".xml", $file.".xml");
            $zip->close();
        }

        return file_exists($path.$file);
    }

    /**
     * [fechaFactura description]
     * @param  [type] $time [description]
     * @return [type]       [description]
     */
    public static function fechaFactura($time)
    {
        $time = date("Y-m-d H:i:s", $time);
        return $time;
    }

    /**
     * [vaciarCarpeta description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function vaciarCarpeta($val)
    {
        $files = glob($val.'/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }

    /**
     * [primerDia description]
     * @param  string $val [description]
     * @return [type]      [description]
     */
    public static function primerDia($val = '')
    {
        $fecha = new DateTime($val);
        $fecha->modify('first day of this month');
        return $fecha->format('Y-m-d');
    }

    /**
     * [ultimoDia description]
     * @param  string $val [description]
     * @return [type]      [description]
     */
    public static function ultimoDia($val = '')
    {
        $fecha = new DateTime($val);
        $fecha->modify('last day of this month');
        return $fecha->format('Y-m-d');
    }

    /**
     * [difDias description]
     * @param  [type] $f1 [description]
     * @param  [type] $h1 [description]
     * @return [type]     [description]
     */
    public static function difDias($f1)
    {
        $segundos = strtotime('now') - strtotime($f1);
        $dias = intval($segundos/60/60/24);
        return $dias;
    }

    /**
     * [difHoras description]
     * @param  [type] $f1 [description]
     * @param  [type] $h1 [description]
     * @return [type]     [description]
     */
    public static function difHoras($f1, $h1)
    {
        $segundos = strtotime($f1.' '.$h1) - strtotime('now');
        $horas = intval($segundos/60/60);
        return $horas;
    }

    /**
     * [difHoras description]
     * @param  [type] $f1 [description]
     * @param  [type] $h1 [description]
     * @return [type]     [description]
     */
    public static function difMinutos($f1, $h1)
    {
        $segundos = strtotime($f1.' '.$h1) - strtotime('now');
        $horas = intval($segundos/60);
        return $horas;
    }

    /**
     * [codificarFila description]
     * @param  [type] $row [description]
     * @return [type]      [description]
     */
    public static function codificarFila($row)
    {
        foreach ($row as $key => $val) {
            $info[$key] = utf8_encode($val);
        }
        return $info;
    }

    /**
     * [codificarResultado description]
     * @param  [type] $result [description]
     * @return [type]         [description]
     */
    public static function codificarResultado($result)
    {
        foreach ($result as $k => $row) {
            foreach ($row as $key => $val) {
                $info[$key] = utf8_encode($val);
            }
            $card[$k] = $info;
        }
        return $card;
    }

    /**
     * [numeroAletra description]
     * @param  [type]  $num [description]
     * @param  boolean $fem [description]
     * @param  boolean $dec [description]
     * @return [type]       [description]
     */
    public static function numeroAletra($num, $fem = false, $dec = true)
    {
        $matuni[2]  = "dos";
        $matuni[3]  = "tres";
        $matuni[4]  = "cuatro";
        $matuni[5]  = "cinco";
        $matuni[6]  = "seis";
        $matuni[7]  = "siete";
        $matuni[8]  = "ocho";
        $matuni[9]  = "nueve";
        $matuni[10] = "diez";
        $matuni[11] = "once";
        $matuni[12] = "doce";
        $matuni[13] = "trece";
        $matuni[14] = "catorce";
        $matuni[15] = "quince";
        $matuni[16] = "dieciseis";
        $matuni[17] = "diecisiete";
        $matuni[18] = "dieciocho";
        $matuni[19] = "diecinueve";
        $matuni[20] = "veinte";
        $matunisub[2] = "dos";
        $matunisub[3] = "tres";
        $matunisub[4] = "cuatro";
        $matunisub[5] = "quin";
        $matunisub[6] = "seis";
        $matunisub[7] = "sete";
        $matunisub[8] = "ocho";
        $matunisub[9] = "nove";

        $matdec[2] = "veint";
        $matdec[3] = "treinta";
        $matdec[4] = "cuarenta";
        $matdec[5] = "cincuenta";
        $matdec[6] = "sesenta";
        $matdec[7] = "setenta";
        $matdec[8] = "ochenta";
        $matdec[9] = "noventa";
        $matsub[3]  = 'mill';
        $matsub[5]  = 'bill';
        $matsub[7]  = 'mill';
        $matsub[9]  = 'trill';
        $matsub[11] = 'mill';
        $matsub[13] = 'bill';
        $matsub[15] = 'mill';
        $matmil[4]  = 'millones';
        $matmil[6]  = 'billones';
        $matmil[7]  = 'de billones';
        $matmil[8]  = 'millones de billones';
        $matmil[10] = 'trillones';
        $matmil[11] = 'de trillones';
        $matmil[12] = 'millones de trillones';
        $matmil[13] = 'de trillones';
        $matmil[14] = 'billones de trillones';
        $matmil[15] = 'de billones de trillones';
        $matmil[16] = 'millones de billones de trillones';

        $float=explode('.', $num);
        $num=$float[0];

        $num = trim((string)@$num);
        if ($num[0] == '-') {
            $neg = 'menos ';
            $num = substr($num, 1);
        } else
            $neg = '';
        while ($num[0] == '0') $num = substr($num, 1);
        if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num;
        $zeros = true;
        $punt = false;
        $ent = '';
        $fra = '';
        for ($c = 0; $c < strlen($num); $c++) {
        $n = $num[$c];
        if (! (strpos(".,'''", $n) === false)) {
        if ($punt) break;
        else{
        $punt = true;
        continue;
        }

        }elseif (! (strpos('0123456789', $n) === false)) {
        if ($punt) {
        if ($n != '0') $zeros = false;
        $fra .= $n;
        }else

        $ent .= $n;
        }else

        break;

        }
        $ent = '     ' . $ent;
        if ($dec and $fra and ! $zeros) {
        $fin = ' coma';
        for ($n = 0; $n < strlen($fra); $n++) {
        if (($s = $fra[$n]) == '0')
        $fin .= ' cero';
        elseif ($s == '1')
        $fin .= $fem ? ' una' : ' un';
        else
        $fin .= ' ' . $matuni[$s];
        }
        }else
        $fin = '';
        if ((int)$ent === 0) return 'Cero ' . $fin;
        $tex = '';
        $sub = 0;
        $mils = 0;
        $neutro = false;
        while ( ($num = substr($ent, -3)) != '   ') {
        $ent = substr($ent, 0, -3);
        if (++$sub < 3 and $fem) {
        $matuni[1] = 'una';
        $subcent = 'as';
        }else{
        $matuni[1] = $neutro ? 'un' : 'uno';
        $subcent = 'os';
        }
        $t = '';
        $n2 = substr($num, 1);
        if ($n2 == '00') {
        }elseif ($n2 < 21)
        $t = ' ' . $matuni[(int)$n2];
        elseif ($n2 < 30) {
        $n3 = $num[2];
        if ($n3 != 0) $t = 'i' . $matuni[$n3];
        $n2 = $num[1];
        $t = ' ' . $matdec[$n2] . $t;
        }else{
        $n3 = $num[2];
        if ($n3 != 0) $t = ' y ' . $matuni[$n3];
        $n2 = $num[1];
        $t = ' ' . $matdec[$n2] . $t;
        }
        $n = $num[0];
        if ($n == 1) {
        $t = ' ciento' . $t;
        }elseif ($n == 5){
        $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t;
        }elseif ($n != 0){
        $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t;
        }
        if ($sub == 1) {
        }elseif (! isset($matsub[$sub])) {
        if ($num == 1) {
        $t = ' mil';
        }elseif ($num > 1){
        $t .= ' mil';
        }
        }elseif ($num == 1) {
        $t .= ' ' . $matsub[$sub] . '?n';
        }elseif ($num > 1){
        $t .= ' ' . $matsub[$sub] . 'ones';
        }
        if ($num == '000') $mils ++;
        elseif ($mils != 0) {
        if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub];
        $mils = 0;
        }
        $neutro = true;
        $tex = $t . $tex;
        }
        $tex = $neg . substr($tex, 1) . $fin;
        $end_num=ucfirst($tex).' pesos '.$float[1].'/100 M.N.';
        return $end_num;
    }

    public function GetNoCertificado($ruta_dir, $nom_certificado)
    {
        $serial = exec('openssl x509 -noout -in '.$ruta_dir.'/'.$nom_certificado.'.cer.pem -serial');
        $ser = explode('=', $serial);
        $serial = $ser[1];

        $noCertificado = $this->ConvertSerial($serial);

        return $noCertificado;
    }

    public static function cd($val)
    {
        $val = utf8_encode($val);
        return $val;
    }

    public function mail($body, $para, $archivos, $tipo)
    {
        require_once(DOC_ROOT."/classes/class.phpmailer.php");
        $mail = new PHPMailer();
        try {
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host     = SMTP_HOST;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->Port     = SMTP_PORT;
            $mail->SetFrom("admin@creabc.com", "CENTRO DE NEGOCIOS");
            foreach ($para as $key => $value) {
                $mail->AddAddress($value, "");
            }
            $mail->Subject    = "Informacion";
            $mail->MsgHTML($body);
            foreach ($archivos as $key => $value) {
                if ($tipo == "estado") {
                    $mail->AddAttachment(DOC_ROOT."/assets/archivos/estadoCuenta/".$value);
                } else {
                    $mail->AddAttachment(DOC_ROOT."/assets/archivos/dropzone/".$value);
                }
            }
            $mail->Send();
            return true;
        } catch (phpmailerException $e) {
            echo $e;
            return false;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public static function guardarArchivo($destino, $archivo, $nombre = null)
    {
        $last = substr($destino, -1);
        if ($last != '/') {
            $destino .= '/';
        }
        if (!is_dir($destino)) {
            mkdir($destino, 0777);
        }
        $per = substr(sprintf('%o', fileperms($destino)), -4);
        if ($per != '0777') {
            @chmod($destino, 0777);
        }
        if ($nombre) {
            $ext = @end(explode('.', $archivo['name']));
            $des = $destino.$nombre.'.'.$ext;
        } else {
            $des = $destino.$archivo['name'];
        }
        $res = (move_uploaded_file($archivo['tmp_name'], $des))?true:false;
        return $nombre.'.'.$ext;
    }
}
