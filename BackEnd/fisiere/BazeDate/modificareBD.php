<?php
require_once("conectare.php");

class Modificare extends Conectare{

  function __construct()
  {
    parent::__construct("utilizatorlogin",false);
  }
}
?>
