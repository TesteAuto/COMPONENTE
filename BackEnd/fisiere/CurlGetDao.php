<?php

class CurlGetDao {

	private $response = null;
	
	public function __construct ($url, $path) {
        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url.$path
            ));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
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
