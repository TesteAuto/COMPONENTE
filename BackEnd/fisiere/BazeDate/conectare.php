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
     if($this->xdispense) {
       $bean = R::xdispense($this->tabel);
     } else {
       $bean = R::dispense($this->tabel);
     }
     $utilizator = R::findOne('crearecontnou',' utilizator = ? ',array($params['utilizator']));
      if(is_object($utilizator)!='false'){
        foreach ($params as $key => $value){
             // criptare parola
             if($key == 'parola'){
                      $bean["parola"] = hash("sha256", $value);
             }else{
                      $bean[$key] = $value;
              }
        }
        return R::exportAll(R::load($this->tabel, R::store($bean)));
      }else{
          return 'Nume utilizator deja existent';
      }
    }catch (\RedBeanPHP\RedException $rbe) {
   throw $rbe;
 }
}
}
?>
