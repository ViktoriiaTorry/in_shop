<?php
require('scr/Facebook/autoload.php');
$fb = new \Facebook\Facebook([
  'app_id' => 'LyahovetskayaV',
  'app_secret' => 'EAACEdEose0cBAGOsUNGULXbdLTbmSH4EMk7ypEwD0xbZArArABwsvZCvMbIRGS1FWkAsGjJ7SjxOcFNz8qu8WNQWjyyWUMOqsWOgwMWsbt6amDOGsPKuuZCeOv1ElKr4gZBpUxgGpGgkx0rEQ2MTBGROOh1evMZCUYhzhvDySTAZDZD',
  'default_graph_version' => 'v2.8',
  //'default_access_token' => '{access-token}', // optional
]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', '{access-token}');
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName();