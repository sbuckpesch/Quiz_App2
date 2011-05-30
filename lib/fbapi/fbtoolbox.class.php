<?php

/**
 * Facebook Toolbox
 *
 * A helper class for facebook application development. Very handy for
 * performing common facebook activities like:
 *
 * - Getting users profile information,
 * - Getting friend list,
 * - Getting application to user profile,
 * - Sending email notification message
 * - Sending Notification Message
 * - Publishing news feed or story to user profile.
 *
 * @author      Raju Mazumder <rajuniit@gmail.com>
 * @package     FBToolbox
 * @copyright   2008-2009 Raju Mazumder
 * @link        http://www.stylephp.com
 * @since       Version 1.0
 */

// Include facebook client library
include_once ('facebook.php');

class FbToolbox
{
	/*
	 * Holds the facebook object
	 *
	 * @var Object
	 */
	private $facebook;

    /**
     * Facebook user id
     *
     * @var integer
     */
	private $fbuser;

    /**
     * Facebook API key
     *
     * @var string
     */
    private $apiKey;

    /**
     * Facebook secret key
     *
     * @var string
     */
	private $secretKey;

	/**
	 * The constructor
	 *
     * This function will initialize the class. You need to provide the API
     * key and the secret as argument
	 *
	 * @param string api key
	 * @param string secret key
	 * @return void
	 *
	 */
	public function __construct($apiKey, $secretKey)
	{
		$this->apiKey	 = $apiKey;
		$this->secretKey = $secretKey;
		$this->facebook  = new Facebook($this->apiKey, $this->secretKey);

	}

	/**
	 * Get User Info
     *
     * Retrieves the varous profile information for a given user. You can
     * provide the list of fields to retrieve. When nothing is specified,
     * it will fetch the basic ones.
	 *
	 * @param int facebook user id
	 * @param string field list (optional)
	 * @return array profile fields
	 *
	 */
	public function getUserInfo($fbuserId, $fields = "basic")
	{
        $this->fbuser = $fbuserId;

        if($fields == "basic")
        {
            $fields = array('first_name','last_name','profile_update_time','current_location', 'sex', 'birthday', 'pic_square');
        }

        $userDetails = $this->facebook->api_client->users_getInfo($this->fbuser, $fields);
		return $userDetails;
	}

	/**
	 * Get Friend List
     *
     * This function will retrieve the friend list of any given facebook
     * user id. Optionally, it allows a few parameters to customize the
     * list.
	 *
	 * @param int facebook user id
	 * @param bool whether the friends have installed this application
	 * @param int start limit
	 * @param int total limit
	 * @return array friend list
	 *
	 */
	public function getFriendList($fbuserId, $appUser = false, $start = 0, $limit = 20)
	{
		$this->fbuser = $fbuserId;

        // Does the friends need to add the app to be qualified ? ;)
   		if ($appUser == false)
   		{
	   		$usersArray = $this->facebook->api_client->fql_query("SELECT uid FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = {$this->fbuser})");
	   		
   		}
   		else
   		{
	   		$usersArray = $this->facebook->api_client->fql_query("SELECT uid FROM user WHERE has_added_app = 1 AND uid IN (SELECT uid2 FROM friend WHERE uid1 = {$this->fbuser})");
	   		
   		}

   		if (empty($usersArray))
   		{
		   return array();
   		}

   		// Make an array of the friends
   		foreach ($usersArray as $user)
   		{
	   		$users[] = $user['uid'];
   		}

   		// Put a limit of the friends if specified
   		if ($appUser && !empty($users) && $limit)
   		{
	   		$users = array_slice($users, $start, $limit);
   		}

   		// Return the friend list
   		return $users;
	}

	/**
	 * Add To Profile
     *
     * This function adds the application to specified user's profile.
	 *
	 * @param int facebook user id
	 * @param string path to the screenshot or fbml of wider profile fbml which will add at box profile
	 * @param string path to the screenshot or fbml of narrow profile fbml which will add at home page
	 * @return void
	 *
	 */
	public function addToProfile($fbuserId, $wideprofileFbml, $narrowprofileFbml)
	{
		$this->fbuser = $fbuserId;
		$wide_handler = 'wide_handler_'.$this->fbuser;
		$narrow_handler = 'narrow_handler_'.$this->fbuser;
		$this->facebook->api_client->call_method('facebook.Fbml.setRefHandle', array('handle' => $wide_handler,
                                                                                     'fbml'   => $wideprofileFbml));

    	$this->facebook->api_client->call_method('facebook.Fbml.setRefHandle', array('handle' => $narrow_handler,
                                                                                     'fbml'   => $narrowprofileFbml));

        $this->facebook->api_client->call_method('facebook.profile.setFBML',   array('uid'          => $this->fbuser,
                                                                                     'profile'      => '<fb:wide><fb:ref handle="'.$wide_handler.'" /></fb:wide>
                                                                                                        <fb:narrow><fb:ref handle="'.$narrow_handler.'" /></fb:narrow>',
                                                                                     'profile_main' => '<fb:ref handle="'.$narrow_handler.'" />'));
	}

	/**
	 * Send Notification
     *
     * This function sends notification to the specified users.
	 *
	 * @param array	facebook user ids
	 * @param string notification message
	 * @param string notification type. can be user_to_user OR app_to_user
	 * @return void
	 *
	 */
	public function sendNotification($ids, $msg, $notificationType = 'app_to_user')
	{
		$this->facebook->api_client->notifications_send($ids, $msg, $notificationType);
	}


	/**
	 * Send Notification Email
     *
     * This function sends notification email to the specified users.
	 *
	 * @param string comma seprated facebook user ids
	 * @param string subject of notification email
	 * @param string notification message
	 * @return void
	 *
	 */
	public function sendEmail($ids, $subject, $msg)
	{
		$this->facebook->api_client->notifications_sendEmail($ids, $subject, "", $msg);
	}

	/**
	 * Publish News Feed
     *
     * This function will publish news feed to the specified user profile.
	 *
	 * @param int facebook user id
	 * @param int template bundle id
	 * @return void
	 *
	 */
	public function publishNewsFeed($fbuserID,$templateBundleId)
	{
		$this->fbuser = $fbuserID;
		
		$tokens  = array();
		$friends = $this->getFriendList($this->fbuser, true);
        $targets = implode(',', $friends);
		try {
			$this->facebook->api_client->feed_publishUserAction($templateBundleId, json_encode($tokens), $targets,'',3);
		}
		catch (Exception $ex) {
			//exception message
		}
	}
	/**
	 * get template bundle id
     *
     * This function will get template bundle to register one story
	 *
	 * @param string one line story template
	 * @return int template bundle id
	 *
	 */
	
	public function getTemplateBundleId($one_line_story_templates)
	{
		return $this->facebook->api_client->feed_registerTemplateBundle($one_line_story_templates); 
	}

}
