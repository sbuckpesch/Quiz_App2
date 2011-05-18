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
		$sql = "SELECT * FROM `app_participation` WHERE `fb_user_id`='$user_id' AND `instance_id`='$instance_id'";		
			
		$row = $this->db->fetchOne($sql);
		if (!$row) {
			// Register new participant
			$sql = "INSERT INTO `app_participation` SET `fb_user_id`='$user_id', `instance_id`='$instance_id',
				`ip`='" . $this->getClientIp() . "'";
			$res = $this->db->query($sql);
			return true;
		}
		return false;
	}
	
	/**
	 * Returns if the user is already participating in the Lottery or not
	 * @param unknown_type $user_id Facebook user id
	 * @param unknown_type $instance_id instance id of the application
	 * @param unknown_type $date optional date of participation
	 * @return boolean
	 */
	public function isUserParticipating($user_id, $instance_id, $date=0) {
		$sql = "SELECT * FROM `app_participation` WHERE `fb_user_id`='$user_id' 
				AND `instance_id`='$instance_id'";
		if ($date <> 0)
			$sql .= " AND SUBSTRING(`timestamp`,1,10)='" . date("Y-m-d", $date) . "'";
			$row = $this->db->fetchOne($sql);
		if ($row)
			return true;
		return false;
	}
	
	/**
	 * Get a random Winner from the participantList
	 * @param Array $partipantList firstname, name, ticket
	 * @return Array <multitype:, multitype:number unknown >
	 */
	public function getWinner($participantList) {
		$winnerList = Array();
		$i = 0;
		foreach ($participantList as $participant){
			for ($j = 0; $j < $participant[2]; $j++) {
				$winnerList[$i] = Array($i, $participant[0], $participant[1], $participant[3]);
				$i++;
			}
		}
		srand (time());
		$winnerNumber = rand(1, $i);
				
		return $winnerList[$winnerNumber];
	}


	
	private function yesterdayDate($date) {
		$yesterday = date('d/m/y', mktime(0, 0, 0, date("m") , date("d") - 1, date("Y")));
	}
	
	
	/**
	 * Returns a participant List of commited date
	 * @param String $date Date formatted as YYYY-MM-DD
	 */
	public function getParticipantList($date) {
		$participantList= Array();
		$sql = "SELECT `first_name`, `last_name`, `email` FROM `user_data` INNER JOIN `app_participation` 
				ON `user_id`=`fb_user_id` WHERE `app_participation`.`date`='$date'";
	
		if ($this->debug)
			echo "<br />" . $sql;
		$dbres = mysql_query($sql, $this->dblink);
		//$partipant = mysql_fetch_array($dbres);
		
		$i = 0;
		while ($participant = mysql_fetch_row($dbres)) {
			$participantList[$i] = $participant;
			$i++;
		}
		
		return $participantList;
	}

	/**
	  * Returns the IP of the client 
	  * @return String client ip
	  */
	 private function getClientIp(){
	  // Get client ip address
	  if ( isset($_SERVER["REMOTE_ADDR"]))
	      $client_ip = $_SERVER["REMOTE_ADDR"];
	  else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
	      $client_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	  else if ( isset($_SERVER["HTTP_CLIENT_IP"]))
	      $client_ip = $_SERVER["HTTP_CLIENT_IP"];
	  
	  return $client_ip;
	 }
	
	}

?>