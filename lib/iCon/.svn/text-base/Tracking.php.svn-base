<?php


class Tracking {
	
	private $db;
	private $value;
	
	
	
	function __construct() {
		// Make globals available
		global $global;
		$this->db = $global->db;
	}
	
	function trackUser(){
		
	}
	
	/**
	 * Add Referral to database
	 * @param unknown_type $refFbUserId Facebook User Id of the referrer
	 * @param Array $optionArray possible: Bool dateSensitive, String date of referral
	 * @return boolean
	 */
	function addReferral($refFbUserId, $optionArray = array()){
		$date = date("Y-m-d", time());
		
		// Referral with date sensitivity
        if (is_array($optionArray) && $optionArray['dateSensitive'] == true) {
        	if (isset($optionArray['dateRef']) && $optionArray['dateRef'] != ""){
        		//@todo implement this
        	}
        }
        // Referral without date sensitivity
		if ($refFbUserId != "") {		
			$sql = "SELECT tickets FROM `fb_participation` WHERE `fb_userid`='$refFbUserId'";
			$tickets = $this->db->fetchOne($sql);
			if ($tickets) {
				$tickets += 1;
				$sql = "UPDATE `fb_participation` SET `tickets` = $tickets WHERE `fb_userid` = '$refFbUserId'";
				$res = $this->db->query($sql);
				return true;
			} else {
				$sql = "INSERT INTO `fb_participation` SET `fb_userid`='$refFbUserId', `date`='" . $date . "', `tickets`= 1";
				$res = $this->db->query($sql);
				return true;
			}
		}
		return false;
	}

}