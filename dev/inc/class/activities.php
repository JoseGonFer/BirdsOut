<?php
class Activities {
	/* Setup all variables */
	public $uid = null;
	public $latitude = null;
	public $longitude = null;
	public $adress = null;
	public $locationname = null;
	public $picture = null;
	public $adminid = null;
	public $title = null;
	public $description = null;
	public $date = null;
	public $time = null;
	public $users_min = null;
	public $user_max = null;
	public $tags = array();
	public $interests = array();
	public $actid = null;
	public $type = null;


	public function __construct( $data = array() ) {

		if( isset( $data['uid'] ) ) $this->uid = stripslashes( strip_tags( $data['uid'] ) );
		if( isset( $data['latitude'] ) ) $this->latitude = stripslashes( strip_tags( $data['latitude'] ) );
		if( isset( $data['longitude'] ) ) $this->longitude = stripslashes( strip_tags( $data['longitude'] ) );
		if( isset( $data['adress'] ) ) $this->adress = stripslashes( strip_tags( $data['adress'] ) );
		if( isset( $data['locationname'] ) ) $this->locationname = stripslashes( strip_tags( $data['locationname'] ) );
		if( isset( $data['picture'] ) ) $this->picture = stripslashes( strip_tags( $data['picture'] ) );
		if( isset( $data['adminid'] ) ) $this->adminid = stripslashes( strip_tags( $data['adminid'] ) );
		if( isset( $data['title'] ) ) $this->title = stripslashes( strip_tags( $data['title'] ) );
		if( isset( $data['description'] ) ) $this->description = stripslashes( strip_tags( $data['description'] ) );
		if( isset( $data['date'] ) ) $this->date = stripslashes( strip_tags( $data['date'] ) );
		if( isset( $data['time'] ) ) $this->time = stripslashes( strip_tags( $data['time'] ) );
		if( isset( $data['users_min'] ) ) $this->users_min = stripslashes( strip_tags( $data['users_min'] ) );
		if( isset( $data['user_max'] ) ) $this->user_max = stripslashes( strip_tags( $data['user_max'] ) );
		if( isset( $data['tags'] ) ) $this->tags = $data["tags"];
		if( isset( $data['interests'] ) ) $this->interests = $data["interests"];
		if( isset( $data['actid'] ) ) $this->actid = stripslashes( strip_tags( $data['actid'] ) );
		if( isset( $data['type'] ) ) $this->type = stripslashes( strip_tags( $data['type'] ) );


	}

	public function storeValues( $params ) {
		//store the parameters
		$this->__construct( $params );
	}

	public function addActivity() {
		/* SQL to store new user and login */
		global $db;
		$success = false;
		try {
			$lat_long_id = $this->getLongLatId();
			$created = date("Y-m-d H:i:s");
			$result = $db->exec("INSERT INTO Activities (title, description,picture, lat_long_id,date_event, time_event, user_id, users_min, user_max, type, datetime_created, is_active, is_deleted) VALUES('$this->title', '$this->description','$this->picture', '$lat_long_id', '$this->date', '$this->time', '$this->uid', '$this->users_min', '$this->user_max','$this->type','$created','1','0')");
			$id =  $db->lastInsertId();
			$this->addTag($id);
			$this->addInterest($id);


			return $id;
		}
		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}

	public function getLongLatId() {
		/* SQL Request to see if user credentials is correct */
		global $db;
		$name = $this->locationname;

		try {
			if (!$name) {
				$query = $db->exec("SELECT id FROM Latitud_longitud WHERE latitud ='$this->latitude' AND longitud = '$this->longitude' LIMIT 1");
				if ($query) {
					$lat_long_id = $query[0]["id"];
				}
				if(!$query) {
					$query = $db->exec("INSERT INTO Latitud_longitud (latitud, longitud, address) VALUES('$this->latitude','$this->longitude','$this->adress')");
					$lat_long_id = $db->lastInsertId();
				}

			}
			if ($name) {
				$query = $db->exec("SELECT id FROM Latitud_longitud WHERE latitud ='$this->latitude' AND longitud = '$this->longitude' AND name = '$this->locationname' LIMIT 1");
				if ($query) {
					$lat_long_id = $query[0]["id"];
				}
				if(!$query) {
					$query = $db->exec("INSERT INTO Latitud_longitud (latitud, longitud, name, address) VALUES('$this->latitude','$this->longitude','$this->locationname', '$this->adress')");
					$lat_long_id = $db->lastInsertId();
				}

			}

			return $lat_long_id;
		}
		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}

	public function addInterest($actid) {
		global $db;
		try {

			foreach ($this->interests as $interest) {
				$db->exec("INSERT INTO ActivitiesInteres (interes_id, activity_id) VALUES('$interest','$actid')");
			}

		}
		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}
	public function addTag($actid) {
		try {
			global $db;
			foreach ($this->tags as $tag) {
				$db->exec("INSERT INTO ActivitiesTags (tag_id, activity_id) VALUES('$tag','$actid')");
			}
		}
		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}
	public function getActivites() {
		try {
			global $db;
			$activites = array(); 
			$activites = $db->exec("SELECT * FROM Activities");
			return $activites;
		}

		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}
	public function getLocationinfo($longlatid) {
		try {
			global $db;
			$location = $db->exec("SELECT * FROM Latitud_longitud WHERE id = '$longlatid' LIMIT 1");
			return $location;
		}

		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}	
	public function getParticipants($actid) {
		try {
			global $db;
			$location = $db->exec("SELECT COUNT(*) AS Participants FROM ActivitiesUsers WHERE activity_id = '$actid'");
			return $location;
		}

		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}	
}


/* Query
SELECT id, ( 6371 * acos( cos( radians(59.294643/latitude) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(18.017578/longitude) ) + sin( radians(59.294643/latitude) ) * sin( radians( latitude ) ) ) ) AS distance FROM Activities HAVING distance < 25 ORDER BY distance LIMIT 0 , 20;


*/
?>