<?php
session_start();
require_once './vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => 'APP_ID',
  'app_secret' => 'APP_SECRET',
  'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
$callback = 'http://localhost';

if(isset($_SESSION['facebook_access_token'])){
	$user = getUserInfo($fb);
}else{
	getAccessToken($helper);
}


function getAccessToken($helper){
		
	try {
		$accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// There was an error communicating with Graph
		echo $e->getMessage();
		exit;
	}

	if (isset($accessToken)) {
		// User authenticated your app!
		// Save the access token to a session and redirect
		$_SESSION['facebook_access_token'] = (string) $accessToken;
		// Log them into your web framework here . . .
		header( "Location: ".$_SERVER["PHP_SELF"]);
		// Redirect here . . .
		exit;
	} elseif ($helper->getError()) {
		// The user denied the request
		// You could log this data . . .
		var_dump($helper->getError());
		var_dump($helper->getErrorCode());
		var_dump($helper->getErrorReason());
		var_dump($helper->getErrorDescription());
		// You could display a message to the user
		// being all like, "What? You don't like me?"
		exit;
	}
}

function getUserInfo($fb){

	try {
		// Get the \Facebook\GraphNodes\GraphUser object for the current user.
		// If you provided a 'default_access_token', the '{access-token}' is optional.
		$response = $fb->get('/me', $_SESSION['facebook_access_token']);
	} catch(\Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(\Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}

	return $response->getGraphUser();

}