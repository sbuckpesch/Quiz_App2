<?php
/**
 * Facebook User Data Object and interface to the iConsultants User Database
 * All Facebook Data can be accessed trhough this object and saved to the
 * user database
 * @author Sebastian Buckpesch
 * @version 0.35
 * @copyright  Copyright (c) 2011 iConsultants UG (http://www.iconsultants.eu)
 * @license    http://www.iconsultants.eu/license/     OSL
 * @todo No request necessary when data in getters already exist
 */
class FacebookUserData {
	
	private $db;
	private $fb_api;
	private $session;
	private $access_token;
	public  $request_data;
	
	private $fbme = null;
	private $fbprofilepicture = null;
	private $fbfriends = null;
	private $fbnewsfeed = null;
	private $fbprofilefeed = null;
	private $fblikes = null;
	private $fbmovies = null;
	private $fbbooks = null;
	private $fbmusic = null;
	private $fbnotes = null;
	private $fbphototags = null;
	private $fbphotoalbums = null;
	private $fbvideotags = null;
	private $fbvideouploads = null;
	private $fbevents = null;
	private $fbgroups = null;
	private $fbcheckins = null;

	public $user_id;
	public $user_country;
	public $user_locale;
	public $isFan = false;
	public $isAdmin = false;
	public $isAuthAppUser = false;
	
	
	/**
	 * Initialize necessary configuration values
	 */
	public function __construct($signed_request = 0){
		// Include dependencies
		require_once 'lib/fbapi/facebook.php';
		
		// Make globals available
		global $global;
		$this->db = $global->db;
		
		// Create Facebook API instance
		$this->fb_api = new Facebook(array(
		  'appId' => $global->instance['fb_app_id'],
		  'secret' => $global->instance['fb_app_secret'],
		  'cookie' => true,
		));
		
		// Create Session and get basic data
		$this->session = $this->fb_api->getSession();
		if ($this->session) {  
		    try {  
		        $this->user_id = $this->session['uid'];
		        $this->access_token = $this->session['access_token'];
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		
		// Decode signed request
		try {
			$this->request_data = $this->parse_signed_request($signed_request, $global->instance['fb_app_secret']);
		} catch (Exception $e) {
			error_log("Error loading Facebook User data. Please check the signed request parameter.");
		}
		// Get Data from Signed Request
		if (!$this->user_id)
			$this->user_id = $this->request_data['user_id'];
		$this->isFan = $this->request_data['page']['liked'];
		$this->isAdmin = $this->request_data['page']['admin'];
		$this->user_country = $this->request_data['user']['country'];
		$this->user_locale = $this->request_data['user']['locale'];
		
	}
	
	/**
	 * Returns the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array All available user data
	 */
	public function getUser($username = "me") {
		if ($this->session) {   
		    try {  
		        if ($username == "me")
		    		$this->fbme = $this->fb_api->api('/' . $username);
		    	else
		    		return $this->fb_api->api('/' . $username);
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbme;
	}
	
	/**
	 * Returns the users profile picture
	 * @param String $type can be large, small or square
	 * @param String $user_id username of facebook user whose profile picture should be delivered
	 * @return String URL of the profile picture
	 * @see http://developers.facebook.com/docs/reference/api/#pictures
	 */
	public function getProfilePictureUrl($type="large", $user_id = 0) {
		if ($user_id == 0)
			$user_id = $this->user_id;
		return "http://graph.facebook.com/" . $user_id . "/picture?type=" . $type;
	}
	
	/**
	 * Returns the friend list of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array Friend List of user
	 */
	public function getFriends($username = "me") {
		if ($this->session) {  
		    try { 
		        if ($username == "me")
		        	$this->fbfriends = $this->fb_api->api('/' . $username . '/friends');
		        else
		        	return $this->fb_api->api('/' . $username . '/friends');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbfriends;
	}
	
	/**
	 * Returns the newsfeed of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array newsfeed of the current user
	 */
	public function getNewsfeed($username = "me") {
		if ($this->session) {  
		    try {  
		    	if ($username == "me")
		        	$this->fbnewsfeed = $this->fb_api->api('/' . $username . '/home');
		        else
		        	return $this->fb_api->api('/' . $username . '/home');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbnewsfeed;
	}
	
	/**
	 * Returns the profile feed of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array profile feed of the current user
	 */
	public function getProfilefeed($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/feed');
		        else
		        	$this->fbprofilefeed = $this->fb_api->api('/' . $username . '/feed');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbprofilefeed;
	}
	
	/**
	 * Returns all likes of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array likes of the current user
	 */
	public function getLikes($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/likes');
		        else
		        	$this->fblikes = $this->fb_api->api('/' . $username . '/likes');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fblikes;
	}
	
	/**
	 * Returns all favorite movies of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array favorite movies of the current user
	 */
	public function getMovies($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/movies');
		        else
		        	$this->fbmovies = $this->fb_api->api('/' . $username . '/movies');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbmovies;
	}
	
	/**
	 * Returns all favorite music of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array favorite music of the current user
	 */
	public function getMusic($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/music');
		        else
		        	$this->fbmusic = $this->fb_api->api('/' . $username . '/music');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbmusic;
	}
	
	/**
	 * Returns all favorite books of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array favorite books of the current user
	 */
	public function getBooks($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/books');
		        else
		        	$this->fbbooks = $this->fb_api->api('/' . $username . '/books');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbbooks;
	}
	
	/**
	 * Returns all notes of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array notes of the current user
	 */
	public function getNotes($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/notes');
		        else
		        	$this->fbnotes = $this->fb_api->api('/' . $username . '/notes');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbnotes;
	}
	
	/**
	 * Returns all photo tags of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array All taged photos of the current user
	 */
	public function getPhotoTags($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/photos');
		        else
		        	$this->fbphototags = $this->fb_api->api('/' . $username . '/photos');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbphototags;
	}
	
	/**
	 * Returns all photo albums of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array All photo albums of the current user
	 */
	public function getPhotoAlbums($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/albums');
		        else
		        	$this->fbphotoalbums = $this->fb_api->api('/' . $username . '/albums');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbphotoalbums;
	}

	/**
	 * Returns all video tags of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array All taged videos of the current user
	 */
	public function getVideoTags($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/videos');
		        else
		        	$this->fbvideotags = $this->fb_api->api('/' . $username . '/videos');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbvideotags;
	}
	
	/**
	 * Returns all uploaded videos of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array All uploaded videos of the current user
	 */
	public function getVideoUploads($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/videos/uploaded');
		        else
		        	$this->fbvideouploads = $this->fb_api->api('/' . $username . '/videos/uploaded');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbvideouploads;
	}
	
	/**
	 * Returns all events of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array All events of the current user
	 */
	public function getEvents($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/events');
		        else
		        	$this->fbevents = $this->fb_api->api('/' . $username . '/events');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbevents;
	}
	
	/**
	 * Returns all groups of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array All groups of the current user
	 */
	public function getGroups($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/groups');
		        else
		        	$this->fbgroups = $this->fb_api->api('/' . $username . '/groups');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbgroups;
	}
	
	/**
	 * Returns all checkins of the current user
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Array All checkins of the current user
	 */
	public function getCheckins($username = "me") {
		if ($this->session) {  
		    try {  
		        if ($username != "me")
		        	return $this->fb_api->api('/' . $username . '/checkins');
		        else
		        	$this->fbcheckins = $this->fb_api->api('/' . $username . '/checkins');
		    } catch (FacebookApiException $e) {
		        error_log($e);
		    }  
		}
		return $this->fbcheckins;
	}
		
	/**
	 * Registers current users participation in database 
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @return Successfully registered in DB
	 */
	public function registerUser(){
		// Check if user has already participated
		$sql = "SELECT * FROM `app_participation` WHERE `fb_userid`='$this->user_id' AND `date`='" . date("Y-m-d", time()) . "'";
		$row = $this->db->fetchOne($sql);
		if (!$row && $this->fbme) {
			$sql = "INSERT INTO `app_participation` SET `fb_userid`='$this->user_id', `date`='" . date("Y-m-d", time()) . "', `tickets`= 1";
			$res = $this->db->query($sql);
		}
		return false;
	}
	
	/**
	 * Save User base data to iConsultants database structure 
	 * @param String $username username or userid of facebook user whose data should be delivered
	 */
	public function saveUser($user_id = 0) {
		// Get User object from Graph API
		if ($this->fbme == null) {
			if ($user_id == 0)
				$fbme = $this->getUser();
			else
				$fbme = $this->getUser($user_id);
		} else {
			$fbme = $this->fbme;
		}
		
		$baseTable = "user_data";
		$setFields = "";
		// 1. Enter data to base information table
		if (isset($fbme['id']) && $fbme['id'] != ""){
			$setFields = $setFields . "`user_id`=" . $fbme['id'] . ",";
		} else {
			return false;
		}
		if (isset($fbme['first_name']) && $fbme['first_name'] != ""){
			$setFields = $setFields . "`first_name`='" . $fbme['first_name'] . "',";
		}
		if (isset($fbme['middle_name']) && $fbme['middle_name'] != ""){
			$setFields = $setFields . "`middle_name`='" . $fbme['middle_name'] . "',";
		}
		if (isset($fbme['last_name']) && $fbme['last_name'] != ""){
			$setFields = $setFields . "`last_name`='" . $fbme['last_name'] . "',";
		}

		if (isset($fbme['name']) && $fbme['name'] != ""){
			$setFields = $setFields . "`name`='" . $fbme['name'] . "',";
		}

		if (isset($fbme['username']) && $fbme['username'] != ""){
			$setFields = $setFields . "`username`='" . $fbme['username'] . "',";
		}

		if (isset($fbme['email']) && $fbme['email'] != ""){
			$setFields = $setFields . "`email`='" . $fbme['email'] . "',";
		}
		if (isset($fbme['gender']) && $fbme['gender'] != ""){
			$setFields = $setFields . "`gender`='" . $fbme['gender'] . "',";
		}
		if (isset($fbme['about']) && $fbme['about'] != ""){
			$setFields = $setFields . "`about`='" . $fbme['about'] . "',";
		}
		if (isset($fbme['hometown']['name']) && $fbme['hometown']['name'] != ""){
			$setFields = $setFields . "`hometown`='" . $fbme['hometown']['name'] . "',";
		}
		if (isset($fbme['location']['name']) && $fbme['location']['name'] != ""){
			$setFields = $setFields . "`location`='" . $fbme['location']['name'] . "',";
		}
		if (isset($fbme['link']) && $fbme['link'] != ""){
			$setFields = $setFields . "`link`='" . $fbme['link'] . "',";
		}
		
		// remove comma
		$setFields = substr($setFields, 0, strlen($setFields) -1);
		
		// Check if userId is already in database. If so do UPDATE else INSERT
		$sql = "SELECT * FROM `$baseTable` WHERE `user_id`=" . $fbme['id'];
		$row = $this->db->fetchOne($sql);
		if ($row) {		
			$sql = "UPDATE `$baseTable` SET $setFields WHERE `user_id` = " . $fbme['id'];
			$res = $this->db->query($sql);
		} else {
			$sql = "INSERT INTO `$baseTable` SET $setFields";
			$res = $this->db->query($sql);
		}
		
		// 2. Work --> Get current position
		$baseTable = "user_data_work";
		if (isset($fbme['work']) && $fbme['work'] != ""){
			$item = $fbme['work'][0];
			$setFields = "";
			// 1. Enter data to base information table
			if (isset($fbme['id']) && $fbme['id'] != ""){
				$setFields = $setFields . "`user_id`=" . $fbme['id'] . ",";
			}
			if (isset($item['employer']['name']) && $item['employer']['name'] != ""){
				$setFields = $setFields . "`employer`='" . $item['employer']['name'] . "',";
			}
			if (isset($item['location']['name']) && $item['location']['name'] != ""){
				$setFields = $setFields . "`location`='" . $item['location']['name'] . "',";
			}
			if (isset($item['position']['name']) && $item['position']['name'] != ""){
				$setFields = $setFields . "`position`='" . $item['position']['name'] . "',";
			}
			if (isset($item['description']) && $item['description'] != ""){
				$setFields = $setFields . "`description`='" . $item['description'] . "',";
			}
			if (isset($item['start_date']) && $item['start_date'] != ""){
				$setFields = $setFields . "`start_date`='" . $this->formatDate($item['start_date'])  . "',";
			}
			if (isset($item['end_date']) && $item['end_date'] != ""){
				$setFields = $setFields . "`end_date`='" . $this->formatDate($item['end_date']) . "',";
			}
			
			// remove comma
			$setFields = substr($setFields, 0, strlen($setFields) -1);
			
			// Check if user_id is already in database. If so do UPDATE else INSERT
			$sql = "SELECT * FROM `$baseTable` WHERE `user_id`=" . $fbme['id'];
			$row = $this->db->fetchOne($sql);
			if ($row) {		
				$sql = "UPDATE `$baseTable` SET $setFields WHERE `user_id` = " . $fbme['id'];
				$res = $this->db->query($sql);
			} else {
				$sql = "INSERT INTO `$baseTable` SET $setFields";
				$res = $this->db->query($sql);
			}
		}
		
		// 3. Education
		$baseTable = "user_data_education";
		if (isset($fbme['education']) && $fbme['education'] != ""){
			// Build of education table
			$educationTable = Array();
			$i = 0;
			foreach ($fbme['education'] as $item) {
				if (count($educationTable) < 1) {
					$educationTable[$i] = $item;
					$i++;
				} else {
					if ($item['type'] == $educationTable[$i-1]['type']){
						$educationTable[$i-1] = $item;
					} else {
						$educationTable[$i] = $item;
						$i++;
					}
				}
			}
			
			// Enter data into education table in database
			foreach ($educationTable as $item) {
				$setFields = "";
				// 1. Enter data to base information table
				if (isset($fbme['id']) && $fbme['id'] != ""){
					$setFields = $setFields . "`user_id`=" . $fbme['id'] . ",";
				}
				if (isset($item['school']['name']) && $item['school']['name'] != ""){
					$setFields = $setFields . "`name`='" . $item['school']['name'] . "',";
				}
				if (isset($item['year']['name']) && $item['year']['name'] != ""){
					$setFields = $setFields . "`year`='" . $item['year']['name'] . "',";
				}
				if (isset($item['concentration'][0]['name']) && $item['concentration'][0]['name'] != ""){
					$setFields = $setFields . "`concentration`='" . $item['concentration'][0]['name'] . "',";
				}
				if (isset($item['type']) && $item['type'] != ""){
					$setFields = $setFields . "`type`='" . $item['type'] . "',";
				}
				// remove comma
				$setFields = substr($setFields, 0, strlen($setFields) -1);
				
				// Check if user_id is already in database. If so do UPDATE else INSERT
				$sql = "SELECT * FROM `$baseTable` WHERE `user_id`=" . $fbme['id'] . " AND `type`='" . $item['type'] . "'";
				$row = $this->db->fetchOne($sql);
				if ($row) {		
					$sql = "UPDATE `$baseTable` SET $setFields WHERE `user_id` = " . $fbme['id'] . " AND `type`='" . $item['type'] . "'";
					$res = $this->db->query($sql);
				} else {
					$sql = "INSERT INTO `$baseTable` SET $setFields";
					$res = $this->db->query($sql);
				}
			}	
		}
		return true;	
	}
	
	/**
	 * Saves the names and userids of all friends to the iconsultants DB
	 * @param $user_id
	 */
	public function saveFriends($user_id = 0) {
		// Get User object from Graph API
		if ($this->fbfriends == null) {
			if ($user_id == 0){
				$fbfriends = $this->getFriends();
				$user_id = $this->user_id;
			}else
				$fbfriends = $this->getFriends($user_id);
		} else {
			$fbfriends = $this->fbfriends;
			$user_id = $this->user_id;
		}
		
		$baseTable = "user_friends";
		
		if (isset($fbfriends['data']) && is_array($fbfriends['data'])) {
			// if friends already exist in DB, delete them and save them again
			
			$nr_of_friends = count($fbfriends['data']);
			$sql = "SELECT COUNT(`user_id`) AS counter FROM `" . $baseTable . "` WHERE `user_id`=" . $user_id . " GROUP BY `user_id`";
			$row = $this->db->fetchOne($sql);
			if ($row) {
				// User has already friends in database
				$sql = "DELETE FROM " . $baseTable . " WHERE `user_id`=" . $user_id;
				$res = $this->db->query($sql);
			}
			// Save all friends to the database	
			foreach ($fbfriends['data'] as $friend) {
				if (is_array($friend)){
					$sql = "INSERT INTO " . $baseTable . " SET `user_id`=" . $user_id . ",`friend_name`='" . $friend['name'] . "', `friend_user_id`=" . $friend['id'] . ";";

					$res = $this->db->query($sql);
				}
			}
		}	
	}
	
	
	/**
	 * Format date for database YYYY-MM-DD
	 * @param String $date
	 * @return formated Date
	 */
	public function formatDate($date) {
		
		if (strlen($date) == 4) {
			return $date . "-01-01";
		}else if (strlen($date) == 7) {
			return $date . "-01";
		}
		return $date;
	}	
	
	/**
	 * Parse Facebook $_REQUEST parameter. Decode all available user data
	 * @param String $signed_request $_REQUEST parameter
	 * @param String $secret App secret to decode the signed_request
	 * @return NULL|mixed App_data Array, with all available user data
	 */
	public function parse_signed_request($signed_request, $secret) {
		list($encoded_sig, $payload) = explode('.', $signed_request, 2);

		// decode the data
		$sig = $this->base64_url_decode($encoded_sig);
		$data = json_decode($this->base64_url_decode($payload), true);

		if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
			error_log('Unknown algorithm. Expected HMAC-SHA256');
			return null;
		}

		// check sig
		$expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
		if ($sig !== $expected_sig) {
			error_log('Bad Signed JSON signature!');
			return null;
		}

		return $data;
	}

	private function base64_url_decode($input) {
		return base64_decode(strtr($input, '-_', '+/'));
	}
	
}



?>
