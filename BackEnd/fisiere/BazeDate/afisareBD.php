<?php
require_once("conectare.php");

class Afisare extends Conectare{

  function __construct()
  {
    parent::__construct("exemplutabel",false);
  }
}
?>
