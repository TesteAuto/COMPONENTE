<?php
use \Firebase\JWT\JWT;
class Principal {


  public static function postServ($app, $db){
    try {
      $request = $app->request();
      $arr = json_decode($request->getBody(),true);
      $row = $db->postMetoda($arr);
      $key = "key";
      if(!$row->eroare) {
              $issuedAt = time();
              $notBefore = $issuedAt;
              $expire = $notBefore + 60 * 60 * 24;
              $serverName = 'localhost/COMPONENTE/BackEnd';
              $payload = array(
                  'iat'  => $issuedAt,
                  'iss'  => $serverName,
                  'nbf'  => $notBefore,
                  'exp'  => $expire,
                  'credentials' => (array)$row,
              );
              $jwt = JWT::encode($payload, $key, 'HS256');
              $json = Principal::raspuns($jwt);
              $app->response()->header('Content-Type', 'application/json');
              echo $json;
      }else{
            $json = Principal::raspuns($row->eroare);
            $app->response()->header('Content-Type', 'application/json');
            echo $json;
      }
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
