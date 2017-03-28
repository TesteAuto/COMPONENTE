<?php
require_once(VENDOR."rb.php");
require_once(PHPMAILER."PHPMailerAutoload.php");
require_once(PHPMAILER."class.phpmailer.php");

abstract class Conectare{


  protected $tabel = null;
  protected $xdispense = null;

  public function __construct($tabel, $xdispense = false) {
    date_default_timezone_set('Europe/Bucharest');
    try{
      R::ext('xdispense', function( $type ){
        return R::getRedBean()->dispense( $type );
      });
      R::setup('mysql:host=localhost;dbname=exempludb','root','root');
    } catch (\RedBeanPHP\RedException $rbe) {
      throw $rbe;
    }
    $this->tabel = $tabel;
    $this->xdispense = $xdispense;
  }
  public static function email($email, $subiect,$mesaj){
   try {
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                   
    $mail->Host = 'smtp.mail.ru';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'stela.ceban.82@mail.ru';                
    $mail->Password = 'Aa1234!!';                         
    $mail->SMTPSecure = 'ssl';                           
    $mail->Port = 465;                                   

    $mail->From = 'stela.ceban.82@mail.ru';
    $mail->FromName = 'Stela';
    $mail->addAddress($email, $email);                
    $mail->SMTPDebug = 0;

    $mail->isHTML(true);                                 

    $mail->Subject = $subiect;
    $mail->Body    = $mesaj;
    $mail->AltBody = '';
    if($mail->send()) {
        return true;
    } else {
        return false;
    }
  } catch(Exception $e) {
   echo $e->getMessage();
 }
}
  public function postMetoda($params = array()) {
   try {
     $email = $params['email'];
     $subiect = $params['subiect'];
     $mesaj = $params['mesaj'];
     $verificare = Conectare::email($email,$subiect,$mesaj);
     if($verificare=='true'){
         if($this->xdispense) {
           $bean = R::xdispense($this->tabel);
         } else {
           $bean = R::dispense($this->tabel);
         }
         foreach ($params as $key => $value){
          $bean[$key] = $value;
        }
        $bean->data = date("Y-m-d", time());
        return R::exportAll(R::load($this->tabel, R::store($bean)));
     }else{
        $ob = new stdClass();
        $ob->eroare = "Mesajul nu a fost trimis cu succes!";
        return $ob;
     }
  }catch (\RedBeanPHP\RedException $rbe) {
   throw $rbe;
 }
}
}
?>
