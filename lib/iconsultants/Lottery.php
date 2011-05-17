<?php
/**
 * Additional Functions for the Lottery App
 * @author Sebastian Buckpesch
 * @version 0.01
 * @copyright  Copyright (c) 2011 iConsultants UG (http://www.iconsultants.eu)
 * @license    http://www.iconsultants.eu/license/     OSL
 *
 */
class Lottery {
	
	private $particiantList;
	private $winner;
	private $db;
	
	public function __construct() {
		// Make globals available
		global $global;
		$this->db = $global->db;
	}
	
	/**
	 * Registers current users participation in database 
	 * @param String $username username or userid of facebook user whose data should be delivered
	 * @param String $instance_id App instance id
	 * @param timestamp $date date for which the user should be registered
	 * @return Successfully registered in DB
	 */
	public function registerParticipant($user_id, $instance_id, $date=0){
		global $global;
		// Check if user has already participated
		$sql = "SELECT * FROM `app_participation` WHERE `fb_user_id`='$user_id'";
		if ($date <> 0) 
			$sql .= " AND SUBSTRING(`timestamp`,1,10)='" . date("Y-m-d", $date) . "'";
			
		$row = $this->db->fetchOne($sql);
		if (!$row) {
			// Register new participant
			$sql = "INSERT INTO `app_participation` SET `fb_user_id`='$user_id', `instance_id`='$instance_id',
				`ip`='" . $global->helper->getClientIp() . "'";
			$res = $this->db->query($sql);
			return true;
		}
		return false;
	}
	}

?>