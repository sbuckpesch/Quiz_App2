<?php
    /* Last updated with phpFlickr 2.3.2
     *
     * Edit these variables to reflect the values you need. $default_redirect 
     * and $permissions are only important if you are linking here instead of
     * using phpFlickr::auth() from another page or if you set the remember_uri
     * argument to false.
     */

    $api_key                 = "f14f107f4b92c929dbd5643456a4b802";
    $api_secret              = 'eb175a427cad288c';
    $default_redirect        = "/phpflicker/example.php";
    $permissions             = "write";
    $path_to_phpFlickr_class = dirname(__FILE__)."/";

    echo 'aaa';
    //ob_start();
    require_once($path_to_phpFlickr_class . "phpFlickr.php");
    unset($_SESSION['phpFlickr_auth_token']);
    echo 'aaa';
     
	if ( isset($_SESSION['phpFlickr_auth_redirect']) && !empty($_SESSION['phpFlickr_auth_redirect']) ) {
		$redirect = $_SESSION['phpFlickr_auth_redirect'];
		unset($_SESSION['phpFlickr_auth_redirect']);
	}
    
    $f = new phpFlickr($api_key, $api_secret);
 
    if (empty($_GET['frob'])) {
        $f->auth($permissions, false);
    } else {
        $f->auth_getToken($_GET['frob']);
	}
    
    if (empty($redirect)) {
		header("Location: " . $default_redirect);
    } else {
		header("Location: " . $redirect);
    }
 
?>
