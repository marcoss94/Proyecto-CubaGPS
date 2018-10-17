<?php
// Pass session data over. Only needed if not already passed by another script like WordPress.
session_start();

// Include the required dependencies.
require_once( 'vendor/autoload.php' );

// Initialize the Facebook PHP SDK v5.
$fb = new Facebook\Facebook([
    'app_id'                => '1972869056090204',
    'app_secret'            => '89f6ec558cd8454da65d64d7f7a3622e',
    'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','user_location']; // Optional permissions
$loginUrl = $helper->getLoginUrl('fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';