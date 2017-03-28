<?php

class CurlDeleteDao {

	private $response = null;
	
	public function __construct ($url, $path, $request) {
        try {
            $post = json_encode($request);
            $curl = curl_init($url.$path);
            curl_setopt_array($curl, array(
                CURLOPT_CUSTOMREQUEST => "DELETE",
                CURLOPT_POSTFIELDS => $post,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_SSL_VERIFYPEER => FALSE,
                CURLOPT_TIMEOUT => 30
            ));
            $this->response = curl_exec($curl);
            if($this->response === false){
                $info = curl_error($curl);
                error_log(__METHOD__." - ERROR: Curl response = ".$this->response." Curl info: ".$info);
            }
            curl_close($curl);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getResponse() {
        return $this->response;
    }

}
