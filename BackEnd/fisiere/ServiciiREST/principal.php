<?php

class Principal {

  public static function getServ($app, $db){
    try {

      $row = $db->getMetoda();
      $json = Principal::raspuns((object)$row);
      $app->response()->header('Content-Type', 'application/json');
      echo $json;
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }

 private static function raspuns($response)
 {
  if(is_array($response)) {
    return json_encode($response[0]);
  } else {
    return json_encode((array)$response);
  }
}
}

?>
