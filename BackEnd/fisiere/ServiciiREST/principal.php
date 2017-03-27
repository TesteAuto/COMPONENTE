<?php

class Principal {

  public static function postServ($app, $db){
    try {
      $request = $app->request();
      $arr = json_decode($request->getBody(),true);
      $row = $db->postMetoda($arr);
      $json = Principal::raspuns($row);
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
