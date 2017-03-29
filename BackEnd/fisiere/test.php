<?php
require_once("CurlPostDao.php");
require_once("CurlGetDao.php");
require_once("CurlPutDao.php");
require_once("CurlDeleteDao.php");

class Teste
{
    public function testeGET() {
        $dao = new CurlGetDao("http://localhost/PROIECT/BackEnd", "/afisare");
        return $dao->getResponse();
    }
  
    public function runTests()
    {
        try {
           print_r($this->testeGET());
        } catch (Exception $e) {
            var_dump("Eroare in test.php");
        }
    }

}
//http://localhost/PROIECT/BackEnd/fisiere/test.php
$test = new Teste();
$test->runTests();
