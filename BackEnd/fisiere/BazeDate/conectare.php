<?php
require_once(VENDOR."rb.php");

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
  // **
  public function postMetoda($params = array()) {
   try {
          $utilizator = $params['utilizator'];
          $parola = hash("sha256", $params['parola']);
          $bean = R::findOne($this->tabel, "utilizator = ? AND parola = ?", array($utilizator,$parola));
          $ob = new stdClass();
          if(!$bean) {
            $ob->eroare = ("Introduceţi credenţiale valide");
            return $ob;
          }else{
            $ob->id = $bean->id;
            $ob->utilizator = $bean->utilizator;
            $ob->parola = $bean->parola;
            $ob->email = $bean->email;
            $ob->poza = $bean->poza;
            $ob->status = $bean->status;
            return $ob;
          }
    }catch (\RedBeanPHP\RedException $rbe) {
        echo json_encode($rbe->getMessage());
 }
}
}
?>
