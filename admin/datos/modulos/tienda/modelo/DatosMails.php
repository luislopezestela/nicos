<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class DatosMails {
    public function __construct(){
        $this->email_user = Luis::dato("luis_cuenta_gmail")->valor;
        $this->email_admin = Luis::dato("luis_correo")->valor;
        $this->email_password = Luis::dato("luis_pd_gmail")->valor;
        $this->nombrepagina = Luis::dato("luis_nombre")->valor;
    }

    public static function check_email($email) {
        if(preg_match('/^\w[-.\w]*@(\w[-._\w]*\.[a-zA-Z]{2,}.*)$/', $email, $matches))
        {
            if(function_exists('checkdnsrr'))
            {
                if(checkdnsrr($matches[1] . '.', 'MX')) return true;
                if(checkdnsrr($matches[1] . '.', 'A')) return true;
            }else{
                if(!empty($hostName))
                {
                    if( $recType == '' ) $recType = "MX";
                    exec("nslookup -type=$recType $hostName", $result);
                    foreach ($result as $line)
                    {
                        if(eregi("^$hostName",$line))
                        {
                            return true;
                        }
                    }
                    return false;
                }
                return false;
            }
        }
        return false;
    }
public function verificar_nuevo_administrador(){
    require '../admin/datos/controlador/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->setFrom($this->correos, $this->nombrepagina);
        $mail->AddAddress($this->correos);
        $mail->isHTML(true);
        $mail->Subject .="Codigo para activar tu cuenta";
        $mail->Body .= ' <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <div style="border:0;">
    <div style="text-align:center;font-family:Arial;background:transparent;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:750px;margin:10px auto;background:#18191a;">
        <thead>
        <tr>
        <th style="font-weight:bold;font-size:16px;background-color:#242526;color:#b0b3b8; text-align:center;padding:40px 0 30px 0;position:relative;">'.utf8_decode($this->nombrepagina).'
         <div style="background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAAOBAMAAAD3WtBsAAAAFVBMVEUAAAAAAAAAAAAAAAAAAAAAAAD29va1cB7UAAAAB3RSTlMCCwQHGBAaZf6MKAAAABpJREFUCNdjSGNIY3BhCGUQBEJjIFQCQigAACyJAjLNW4w5AAAAAElFTkSuQmCC);background-repeat:repeat-x;position:absolute;height:7px;width:100%;bottom:-6px;background-size: 1px 7px;box-sizing: border-box;right:0;left:0;pointer-events:none;display:block;"></div>
        </th>
        </tr>
        </thead>
        <tbody>
            <tr>
            <td  style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;position:relative;text-align:center;">Codigo de verificacion de cuenta.
            </td>
            </tr>
            <tr>
            <td>
            <table style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;">
            <tbody>
            <tr>
            <td colspan="3" align="left" style="font-size:14px;padding:5px 3px;">
            <span style="font-family:Arial;font-weight:bold">NOMBRES: </span>
            <span style="font-family:Arial;color:#777575;text-transform:uppercase;"> '.utf8_decode($this->unombres).'</span>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>

            <tr>
            <td  style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;position:relative;text-align:center;"><span style="display:block;width:100%;">CODIGO:</span>
                <span style="padding:10px 16px;border-radius:4px;display:block;background-color:#18191a;margin:6px auto;margin-top:10px;border:1px solid #999;">'.$this->codigo_activacion.'</span>
            </td>
            </tr>

        </tbody>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="max-width:750px; margin: 0 auto;">
    <tbody>
    <tr>
    <td style="font-family: Arial; font-size: 12px;text-align:center;display:block;padding:10px 0">
   &#x24B8; '.date("Y").' '.$this->nombrepagina.'
 </td>
    </tr>
    </tbody>
    </table>
    <br>
    </div>
    </div>';
        $mail->Send();
        $mail->clearAddresses();
        $mail->clearAttachments();
    } catch (Exception $e) {
      /*  echo 2;*/
    }
    }


public function verificar_persona(){
    require 'admin/datos/controlador/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->setFrom($this->persona_correo, $this->nombrepagina);
        $mail->AddAddress($this->persona_correo);
        $mail->isHTML(true);
        $mail->Subject .="Codigo para activar tu cuenta";
        $mail->Body .= ' <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <div style="border:0;">
    <div style="text-align:center;font-family:Arial;background:transparent;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:750px;margin:10px auto;background:#18191a;">
        <thead>
        <tr>
        <th style="font-weight:bold;font-size:16px;background-color:#242526;color:#b0b3b8; text-align:center;padding:40px 0 30px 0;position:relative;">'.utf8_decode($this->nombrepagina).'
         <div style="background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAAOBAMAAAD3WtBsAAAAFVBMVEUAAAAAAAAAAAAAAAAAAAAAAAD29va1cB7UAAAAB3RSTlMCCwQHGBAaZf6MKAAAABpJREFUCNdjSGNIY3BhCGUQBEJjIFQCQigAACyJAjLNW4w5AAAAAElFTkSuQmCC);background-repeat:repeat-x;position:absolute;height:7px;width:100%;bottom:-6px;background-size: 1px 7px;box-sizing: border-box;right:0;left:0;pointer-events:none;display:block;"></div>
        </th>
        </tr>
        </thead>
        <tbody>
            <tr>
            <td  style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;position:relative;text-align:center;">Codigo de verificacion de cuenta.
            </td>
            </tr>
            <tr>
            <td>
            <table style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;">
            <tbody>
            <tr>
            <td colspan="3" align="left" style="font-size:14px;padding:5px 3px;">
            <span style="font-family:Arial;font-weight:bold">NOMBRES: </span>
            <span style="font-family:Arial;color:#777575;text-transform:uppercase;"> '.utf8_decode($this->persona_nombres).'</span>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>

            <tr>
            <td  style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;position:relative;text-align:center;"><span style="display:block;width:100%;">CODIGO:</span>
                <span style="padding:10px 16px;border-radius:4px;display:block;background-color:#18191a;margin:6px auto;margin-top:10px;border:1px solid #999;">'.$this->codigo_activacion.'</span>
            </td>
            </tr>

        </tbody>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="max-width:750px; margin: 0 auto;">
    <tbody>
    <tr>
    <td style="font-family: Arial; font-size: 12px;text-align:center;display:block;padding:10px 0">
   &#x24B8; '.date("Y").' '.$this->nombrepagina.'
 </td>
    </tr>
    </tbody>
    </table>
    <br>
    </div>
    </div>';
        $mail->Send();
        $mail->clearAddresses();
        $mail->clearAttachments();
    } catch (Exception $e) {
      /*  echo 2;*/
    }
    }
public function codigo_recup(){
    require 'admin/datos/controlador/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->setFrom($this->email_admin, $this->nombrepagina);
        $mail->AddAddress($this->correo);
        $mail->isHTML(true);
        $mail->Subject .="Codigo para recuperar contrase&ntilde;a";
        $mail->Body .= ' <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <div style="border:0;">
    <div style="text-align:center;font-family:Arial;background:transparent;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:750px;margin:10px auto;background:#18191a;">
        <thead>
        <tr>
        <th style="font-weight:bold;font-size:16px;background-color:#242526;color:#b0b3b8; text-align:center;padding:40px 0 30px 0;position:relative;">'.utf8_decode($this->nombrepagina).'
         <div style="background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAAOBAMAAAD3WtBsAAAAFVBMVEUAAAAAAAAAAAAAAAAAAAAAAAD29va1cB7UAAAAB3RSTlMCCwQHGBAaZf6MKAAAABpJREFUCNdjSGNIY3BhCGUQBEJjIFQCQigAACyJAjLNW4w5AAAAAElFTkSuQmCC);background-repeat:repeat-x;position:absolute;height:7px;width:100%;bottom:-6px;background-size: 1px 7px;box-sizing: border-box;right:0;left:0;pointer-events:none;display:block;"></div>
        </th>
        </tr>
        </thead>
        <tbody>
            <tr>
            <td  style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;position:relative;text-align:center;">Codigo para recuperar contrase&ntilde;a
            </td>
            </tr>
            <tr>
            <td>
            <table style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;">
            <tbody>
            <tr>
            <td colspan="3" align="left" style="font-size:14px;padding:5px 3px;">
            <span style="font-family:Arial;font-weight:bold">NOMBRES: </span>
            <span style="font-family:Arial;color:#777575;text-transform:uppercase;">'.utf8_decode($this->nombre);' '.utf8_decode($this->apellido).'</span>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>

            <tr>
            <td  style="background-color:#242526;box-shadow: 0 1px 2px rgba(0,0,0,0.1);border-radius:8px;box-sizing:border-box;position:relative;display:block;margin:10px 22px;padding:10px;color:#e4e6eb;position:relative;text-align:center;"><span style="display:block;width:100%;">CODIGO:</span>
                <span style="padding:10px 16px;border-radius:4px;display:block;background-color:#18191a;margin:6px auto;margin-top:10px;border:1px solid #999;">'.$this->codigo.'</span>
            </td>
            </tr>

        </tbody>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="max-width:750px; margin: 0 auto;">
    <tbody>
    <tr>
    <td style="font-family: Arial; font-size: 12px;text-align:center;display:block;padding:10px 0">
   &#x24B8; '.date("Y").' '.$this->nombrepagina.'
 </td>
    </tr>
    </tbody>
    </table>
    <br>
    </div>
    </div>';
        $mail->Send();
        $mail->clearAddresses();
        $mail->clearAttachments();
        echo 1;
    } catch (Exception $e) {
        echo 2;
    }
    } 
    public function contactar(){
    require 'admin/datos/controlador/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->setFrom($this->email_us, $this->nombres_us);
        $mail->AddAddress($this->email_admin);
        $mail->isHTML(true);
        $mail->Subject .="Contacto desde ".utf8_decode($this->nombrepagina);
        $mail->Body .= '
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#cfcfcf;">
        <thead>
        <tr><th style="font-weight:400;text-align:left;font-family:Arial;padding:13px 15px;display:block;"> Contacto de: '.utf8_decode($this->nombres_us).'</th></tr>
        <tr><th style="font-weight:400;text-align:left;font-family:Arial;padding:13px 15px;"> Correo: '.$this->email_us.'</th></tr>
        </thead>
        <tbody>
         <tr>
         <td colspan="3" align="left" style="font-size:14px;padding:15px 13px;position:relative;">
          <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#cfcfcf;padding:10px;">
            <thead>
                <tr>
                    <th style="font-family:Arial;font-weight:bold;text-align:left;padding:5px;">Correo:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="background:#FAFAFA;padding:10px;font-family:Arial;height:100%;min-height:50px;display:block;">'.utf8_decode($this->mensaje_us).' </td>
                </tr>
            </tbody>
          </table>
         </td>
         </tr>
        </tbody>
        </table>';
        $mail->Send();
        $mail->clearAddresses();
        $mail->clearAttachments();
        echo 1;
    } catch (Exception $e) {
        echo 2;
    }
    }

    public function resp_contactar(){
    require 'admin/datos/controlador/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->setFrom($this->email_admin, $this->nombrepagina);
        $mail->AddAddress($this->email_us);
        $mail->isHTML(true);
        $mail->Subject .= utf8_decode($this->nombrepagina);
        $mail->Body .= '
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#cfcfcf;">
        <thead>
        <tr><th style="font-weight:400;text-align:left;font-family:Arial;padding:13px 15px;display:block;"> Contacto de: '.utf8_decode($this->nombrepagina).'</th></tr>
        <tr><th style="font-weight:400;text-align:left;font-family:Arial;padding:13px 15px;"> Correo: '.$this->email_admin.'</th></tr>
        </thead>
        <tbody>
         <tr>
         <td colspan="3" align="left" style="font-size:14px;padding:15px 13px;position:relative;">
          <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#cfcfcf;padding:10px;">
            <thead>
                <tr>
                    <th style="font-family:Arial;font-weight:bold;text-align:left;padding:5px;">Correo:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="background:#FAFAFA;padding:10px;font-family:Arial;height:100%;min-height:50px;display:block;">Gracias por ponerte encontacto con nosotros. su mensaje fue enviado con exito. </td>
                </tr>
            </tbody>
          </table>
         </td>
         </tr>
        </tbody>
        </table>';
        $mail->Send();
    } catch (Exception $e) {
    }
    }


    public function verificar_cliente_admin(){
    require 'admin/datos/controlador/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try{
    $mail->SMTPDebug = 0;
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $this->email_user;
    $mail->Password = base64_decode($this->email_password);
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
        $mail->setFrom($this->email_user, $this->nombrepagina);
        $mail->AddAddress($this->email_user);
        $mail->isHTML(true);
        $mail->Subject .="Nuevo cliente en ".$this->nombrepagina;
        $mail->Body .='
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <div style="border:5px solid transparent;">
    <div style="border-radius:5px;border:10px solid #3498db;text-align:center;font-family:Arial">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:750px;margin:10px auto;">
        <thead>
        <tr>
        <th style="font-weight:bold;font-size:16px;background-color:#3498db;color:#FFFFFF; text-align:center;padding:40px 0 30px 0;">'.utf8_decode("Nuevo cliente en ".$this->nombrepagina).'</th>
        </tr>
        </thead>
        <tbody>
            <tr>
            <td style="padding:15px 10px;text-align:center;">
            <span style="font-size:15px;font-family:Arial;color:#777575;">
            '.utf8_decode("Nuevo cliente. Te enviamos la información del registro:").'
            </span>
            </td>
            </tr>
            <tr><td><hr style="background-image:linear-gradient(to right,transparent,rgba(0, 0, 0, 0.2),transparent);border:0;height:3px;margin:2px 0;"></td></tr>
            <tr>
                <td>
                    <table style="width:100%;padding:15px 15px">
                        <tbody>
                            <tr>
            <td colspan="3" align="left" style="font-size:14px;padding:5px 3px;">
                        <span style="font-family:Arial;font-weight:bold">ID del cliente: </span>
                        <span style="font-family:Arial;color:#777575">'.$this->id_cliente.'</span>
            </td>
            </tr>
              <tr>
            <td colspan="3" align="left" style="font-size:14px;padding:5px 3px;">
                        <span style="font-family:Arial;font-weight:bold">Nombre del cliente: </span>
                        <span style="font-family:Arial;color:#777575">'.$this->cliente_nombres.'</span>
            </td>
            </tr>

            <tr>
            <td colspan="3" align="left" style="font-size:14px;padding:5px 3px;">
                        <span style="font-family:Arial;font-weight:bold">Correo del cliente: </span>
                        <span style="font-family:Arial;color:#777575">'.$this->cliente_correo.'</span>
            </td>
            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="max-width:750px; margin: 0 auto;">
    <tbody>
    <tr>
    <td style="font-family: Arial; font-size: 12px;text-align:center;display:block;padding:10px 0">
   &#x24B8; '.date("Y").' '.$this->nombrepagina.'
 </td>
    </tr>
    </tbody>
    </table>
    <br>
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
  <tr>
  <td style="width:100%;text-align:center;padding:10px;" >

 </td>
 </tr>
 <tr></tr>
    </tbody>
    </table>
    </div>';
        $mail->Send();
        $mail->clearAddresses();
        $mail->clearAttachments();
        } catch(Exception $e){
        echo "No se envio el mensaje";
    }
    }

    public function verificar_cliente_cliente(){
    $mail = new PHPMailer(true);
    try{
    $mail->SMTPDebug = 0;
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $this->email_user;
    $mail->Password = base64_decode($this->email_password);
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
        $mail->setFrom($this->email_user, $this->nombrepagina);
        $mail->AddAddress($this->cliente_correo);
        $mail->isHTML(true);
        $mail->Subject .="Bienvenido a ".utf8_decode($this->nombrepagina);
        $mail->Body .='
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <div style="border:5px solid transparent;">
    <div style="border-radius:5px;border:10px solid #3498db;text-align:center;font-family:Arial">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:750px;margin:10px auto;">
        <thead>
        <tr>
        <th style="font-weight:bold;font-size:16px;background-color:#3498db;color:#FFFFFF; text-align:center;padding:40px 0 30px 0;">Bienvenido a '.utf8_decode($this->nombrepagina).'</th>
        </tr>
        </thead>
        <tbody>
            <tr>
            <td style="padding:15px 10px;text-align:center;">
            <span style="font-size:15px;font-family:Arial;color:#777575;">
            Hola bienvenido a '.utf8_decode($this->cliente_nombres.", Te enviamos la información de tu registro:").'
            </span>
            </td>
            </tr>
            <tr><td><hr style="background-image:linear-gradient(to right,transparent,rgba(0, 0, 0, 0.2),transparent);border:0;height:3px;margin:2px 0;"></td></tr>
            <tr>
                <td>
                    <table style="width:100%;padding:15px 15px">
                        <tbody>
                            <tr>
            <td colspan="3" align="left" style="font-size:14px;padding:5px 3px;">
                        <span style="font-family:Arial;font-weight:bold">Para activar tu cuenta debes dar click al siguiente boton: </span>
                        <span style="font-family:Arial;color:#777575"><a style="padding:7px 12px; border:1px solid #777;border-radius:5px;" href="'.$this->codigo_activacion.'">Activar cuenta</a></span>
            </td>
            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="max-width:750px; margin: 0 auto;">
    <tbody>
    <tr>
    <td style="font-family: Arial; font-size: 12px;text-align:center;display:block;padding:10px 0">
   &#x24B8; '.date("Y").' '.$this->nombrepagina.'
 </td>
    </tr>
    </tbody>
    </table>
    <br>
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
 <tr></tr>
    </tbody>
    </table>
    </div>';
        $mail->send();
        } catch(Exception $e){
        echo "No se envio el mensaje";
    }
    }



}

?>

