<?php

class FacebookData {
	
	// Step 1: Database settings for facebook application
	private $dbhost;
	private $dbname;
	private $dbuser;
	private $dbpass;
	private $appID;
	private $appSecret;
	private $dblink;
	
	private $debug = false;
	
	/**
	 * Enter description here ...
	 * @param String $dbhost Database host
	 * @param String $dbname Database name
	 * @param String $dbuser database user name
	 * @param String $dbpass database password
	 * @param String $appID Facebook App ID
	 * @param String $appSecret Facebook App secret
	 */
	public function __construct($dbhost, $dbname, $dbuser, $dbpass, $appID, $appSecret){

		$this->dbhost = $dbhost;
		$this->dbname = $dbname;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->appID = $appID;
		$this->appSecret = $appSecret;
		
		// Connect to iConsultants Facebook Database
		$this->dblink = mysql_connect($this->dbhost,$this->dbuser,$this->dbpass) or die("cant connect to the server");
		$fblink = mysql_select_db($this->dbname, $this->dblink) or die("cant connect to the database ");
	}
	
	
	/**
	 * Saves a Facebook Me Object to iconsultants database
	 * @param Array $fbme Array of Facebook User information
	 * @return boolean Returns if write to database was successful or not
	 */
	public function saveFBMeToDatabase($fbme) {
		$baseTable = "fb_participants";
		
		$setFields = "";
		// 1. Enter data to base information table
		if (isset($fbme['id']) && $fbme['id'] != ""){
			$setFields = $setFields . "`userId`=" . $fbme['id'] . ",";
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
		$sql = "SELECT * FROM `$baseTable` WHERE `userId`=" . $fbme['id'];
		if ($this->debug)
			echo "<br />" . $sql;
		
		$dbres = mysql_query($sql, $this->dblink);
		$row = mysql_fetch_array($dbres);
		if ($row) {		
			$sql = "UPDATE `$baseTable` SET $setFields WHERE `userId` = " . $fbme['id'];
			if ($this->debug)
				echo "<br />" . $sql;
			$dbres = mysql_query($sql, $this->dblink);
		} else {
			$sql = "INSERT INTO `$baseTable` SET $setFields";
			if ($this->debug)
				echo "<br />" . $sql;
			$dbres = mysql_query($sql, $this->dblink);
		}
		
		// 2. Work --> Get current position
		$baseTable = "fb_work";
		if (isset($fbme['work']) && $fbme['work'] != ""){
			$item = $fbme['work'][0];
			$setFields = "";
			// 1. Enter data to base information table
			if (isset($fbme['id']) && $fbme['id'] != ""){
				$setFields = $setFields . "`userId`=" . $fbme['id'] . ",";
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
			
			// Check if userId is already in database. If so do UPDATE else INSERT
			$sql = "SELECT * FROM `$baseTable` WHERE `userId`=" . $fbme['id'];
			if ($this->debug)
				echo "<br />" . $sql;
			$dbres = mysql_query($sql, $this->dblink);
			$row = mysql_fetch_array($dbres);
			if ($row) {		
				$sql = "UPDATE `$baseTable` SET $setFields WHERE `userId` = " . $fbme['id'];
				if ($this->debug)
					echo "<br />" . $sql;
				$dbres = mysql_query($sql, $this->dblink);
			} else {
				$sql = "INSERT INTO `$baseTable` SET $setFields";
				if ($this->debug)
					echo "<br />" . $sql;
				$dbres = mysql_query($sql, $this->dblink);
			}
		}
		
		// 3. Education
		$baseTable = "fb_education";
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
					$setFields = $setFields . "`userId`=" . $fbme['id'] . ",";
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
				
				// Check if userId is already in database. If so do UPDATE else INSERT
				$sql = "SELECT * FROM `$baseTable` WHERE `userId`=" . $fbme['id'] . " AND `type`='" . $item['type'] . "'";
				if ($this->debug)
					echo "<br />" . $sql;
				$dbres = mysql_query($sql, $this->dblink);
				$row = mysql_fetch_array($dbres);
				if ($row) {		
					$sql = "UPDATE `$baseTable` SET $setFields WHERE `userId` = " . $fbme['id'] . " AND `type`='" . $item['type'] . "'";
					if ($this->debug)
						echo "<br />" . $sql;
					$dbres = mysql_query($sql, $this->dblink);
				} else {
					$sql = "INSERT INTO `$baseTable` SET $setFields";
					if ($this->debug)
						echo "<br />" . $sql;
					$dbres = mysql_query($sql, $this->dblink);
				}
			}	
		}
		return true;
	}
	
	
	/**
	 * Parses the REQUEST param for friendlist and saves the list to the database
	 * @param Array $request _REQUEST param
	 */
	public function saveRequestParamToDatabase($request) {
		
		if (isset($request['fb_sig_user']) && $request['fb_sig_user'] != "" &&
			isset($request['fb_sig_friends']) && $request['fb_sig_friends'] != ""){
			
			$userId = $request['fb_sig_user'];
			$friendlist = explode(",", $request['fb_sig_friends']);
			// Check if amount of fans differs more than 20 from the amount in the database
			$reqFriendCount = count($friendlist);
			
			$sql = "SELECT COUNT(`userId`) AS counter FROM `fb_friendlists` WHERE `userId`=" . $userId . " GROUP BY `userId`";
			if ($this->debug)
				echo "<br />" . $sql;
			$dbres = mysql_query($sql, $this->dblink);
			$row = mysql_fetch_array($dbres);
			if ($row) {
				// User has already friends in database
				$dbFriendCount = $row[0];
				if ($reqFriendCount > $dbFriendCount + 20) {
					// Friendlist has to be updated --> delete users old friends
					$sql = "DELETE FROM `fb_friendlists` WHERE `userId`=" . $userId;
					if ($this->debug)
						echo "<br />" . $sql;
					$dbres = mysql_query($sql, $this->dblink);
				} else {
					// Friendlist does not need to be updated
					return true;
				}
			}
			// Save all friends to the database	
			foreach ($friendlist as $friendUserId) {
				if ($friendUserId != ""){
					$sql = "INSERT INTO `fb_friendlists` SET `userId`=" . $userId . ", `friendUserId`=" . $friendUserId;
					if ($this->debug)
						echo "<br />" . $sql;
					// remove semicolon
					$dbres = mysql_query($sql, $this->dblink);
				}
			}
		} else {
			return false;
		}
		return true;
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
	
}



?>