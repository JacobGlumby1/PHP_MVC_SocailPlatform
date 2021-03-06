<?php


function restricted ($controller, $method) {

	$restricted_urls = array(	'HomeController' => array('restricted', 'logout', 'image_feed', 'upload', 'users'),
								'ApiController' => array(),
								'UserController'=> array('users'),
								'PostController'=> array('image_feed', 'upload')

							);

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		return false;
	} else if( isset($controller) && in_array($method, $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}