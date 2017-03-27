<?php

class CurlPostDao {

	private $response = null;

	public function __construct ($url, $path, $request) {
        try {
            $post = json_encode($request);
            $curl = curl_init($url.$path);
            curl_setopt_array($curl, array(
                CURLOPT_POSTFIELDS => $post,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYPEER => FALSE,
                CURLINFO_HEADER_OUT => TRUE,
                CURLOPT_HEADER => TRUE,
                CURLOPT_HTTPHEADER => $this->header($post)
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

    private function header($post) {
          return array(
              'Content-Type: application/json',
              'Content-Length: '.strlen($post)
        );
    }

}
