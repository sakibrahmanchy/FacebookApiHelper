<?php
/**
 * Created by PhpStorm.
 * User: Sakib Rahman
 * Date: 6/12/2017
 * Time: 2:29 AM
 */

session_start();
require_once __DIR__ . '/Facebook/autoload.php';
require_once __DIR__ . '/Config.php';


Class FacebookApiLoader{


    /**
     * @return mixed
     */


    public function fbInit(){
          return new \Facebook\Facebook([
            'app_id' => Config::APP_ID,
            'app_secret' => Config::APP_SECRET,
            'default_graph_version' => Config::GRAPH_VERSION
        ]);

    }

    public function getHelper(){
        $fb = $this->fbInit();
        return $fb->getRedirectLoginHelper();
    }

    public function fetchAccessToken(){
        try {

            $accessToken = $this->getHelper()->getAccessToken();
            return $accessToken;
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            return null;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            return null;
        }

    }


    public function login($redirectUrl){

        $loginUrl = $this->getHelper()->getLoginUrl($redirectUrl, Config::$permissions);
        return $loginUrl;
    }

    public function fetchGraphData($url){

        $headers = array("Content-type: application/json");

        $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt($ch, CURLOPT_URL, $url);
	         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
		 curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		 $st=curl_exec($ch);
         $result=json_decode($st,TRUE);

        return $result;
    }
}




