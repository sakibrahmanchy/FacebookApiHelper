<html>

<head>
<script src="http://connect.facebook.net/en_US/all.js"></script>
</head>	
<body>

<?php
require_once __DIR__.'/FacebookApiLoader.php';

$apiLoader = new FacebookApiLoader();
$accessToken =$apiLoader->fetchAccessToken();


if (isset($accessToken)) {

 		$url = "https://graph.facebook.com/v2.9/me/accounts?access_token={$accessToken}";
        $result = $apiLoader->fetchGraphData($url);


		 foreach ($result['data'] as $page) {

		 	echo "<h3>".$page['name']."  ";
			echo '<div class="fb-messengermessageus"
					messenger_app_id="648953695301935	"
					page_id="'.$page["id"].'"
					color="blue"
					size="large" >
					</div> <br>';

		 }




} else {

	$loginUrl = $apiLoader->login(Config::APP_BASE_PATH);
	echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}

	?>


		 	

	
  
<script language="javascript" type="text/javascript">
    FB.init({
        appId: '1619055624801235',
        status: true, 
        cookie: true, 
        xfbml: true,
		 version : 'v2.2'
    });    
</script>
</body>


