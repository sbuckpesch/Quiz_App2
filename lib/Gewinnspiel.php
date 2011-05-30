<?php


class Gewinnspiel {
	
	private $particiantList;
	private $winner;
	private $dbhost;
	private $dbname;
	private $dbuser;
	private $dbpass;
	private $appID;
	private $appSecret;
	private $dblink;
	
	private $debug = false;
	
	/**
	 * Initilize DB Connection
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
	 * Get a random Winner from the participantList
	 * @param Array $partipantList firstname, name, ticket
	 * @return Array <multitype:, multitype:number unknown >
	 */
	function getWinner($participantList) {
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


	
	function yesterdayDate($date) {
		$yesterday = date('d/m/y', mktime(0, 0, 0, date("m") , date("d") - 1, date("Y")));
	}
	
	
	/**
	 * Returns a participant List of commited date
	 * @param String $date Date formatted as YYYY-MM-DD
	 */
	function getParticipantList($date) {
		$participantList= Array();
		$sql = "SELECT `first_name`, `last_name`, `tickets`, `email` FROM `fb_participants` INNER JOIN `fb_participation` 
				ON `userId`=`fb_userid` WHERE `fb_participation`.`date`='$date' ORDER BY `tickets` DESC";
	
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

	}

?>