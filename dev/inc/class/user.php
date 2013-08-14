<?php class Users {
	public $username = null;
	public $password = null;
	public $tags = null;
	public $interests = null;
	public $languages = null;
	public $birthday = null;
	public $firstname = null;
	public $lastname = null;
	public $postcode = null;
	public $sex = null;
	public $city = null;
	public $date = null;
	public $uid = null;
	
	
	public function __construct( $data = array() ) {
		if( isset( $data['username'] ) ) $this->username = stripslashes( strip_tags( $data['username'] ) );
		if( isset( $data['password'] ) ) $this->password = hash('sha256',stripslashes( strip_tags( $data['password'] ) ));
		if( isset( $data['tags'] ) ) $this->tags = stripslashes( strip_tags( $data['tags'] ) );
		if( isset( $data['firstname'] ) ) $this->firstname = stripslashes( strip_tags( $data['firstname'] ) );
		if( isset( $data['lastname'] ) ) $this->lastname = stripslashes( strip_tags( $data['lastname'] ) );
		if( isset( $data['interests'] ) ) $this->interests = stripslashes( strip_tags( $data['interests'] ) );
		if( isset( $data['languages'] ) ) $this->languages = stripslashes( strip_tags( $data['languages'] ) );
		if( isset( $data['postcode'] ) ) $this->postcode = stripslashes( strip_tags( $data['postcode'] ) );
		if( isset( $data['sex'] ) ) $this->sex = stripslashes( strip_tags( $data['sex'] ) );
		if( isset( $data['city'] ) ) $this->city = stripslashes( strip_tags( $data['city'] ) );
		if( isset( $data['uid'] ) ) $this->uid = stripslashes( strip_tags( $data['uid'] ) );

	}

	public function storeFormValues( $params ) {
		//store the parameters
		$this->__construct( $params );
	}

	public function userLogin() {
		/* SQL Request to see if user credentials is correct */
		global $db;
		try {
			$result = $db->exec('SELECT id FROM Users WHERE user_login = "'.$this->username.'" AND pass_word = "'.$this->password.'" LIMIT 1');
			if ($result) {
				$uid = $result[0]["id"]; 
				return $uid;
				$this->setLastSeen($uid);
			}
		}
		catch (Exception $e)  {
		echo $e->getMessage(); 
		}
	}

	public function userRegister() {
		/* SQL to store new user and login */
		global $db;
		$success = false;
		try {
			$result = $db->exec("INSERT INTO Users (user_login, pass_word, name_first, name_last) VALUES('$this->username','$this->password','$this->firstname', '$this->lastname')");
				
		}
		catch (Exception $e)  {
			echo $e->getMessage(); 
		}
	}

	public function userListing() {
		/* List all users */
		global $db;
		try {
			$result = $db->exec('SELECT * FROM Users WHERE company_name IS NULL');
			return $result;
		}

		catch (Exception $e) {
			echo $e->getMessage(); 
		}
	}
	public function faceBooklogin() {
		
	}
	
	public function getCompanies() {
		global $db;
		try {
			$result = $db->exec('SELECT * FROM Users WHERE company_name IS NOT NULL');
			return $result;
		}

		catch (Exception $e) {
			echo $e->getMessage(); 
		}
		
	}
	public function setLastSeen($uid=null) {
		$date = date("Y-m-d H:i:s");
		global $db;
		try {
			$result = $db->exec("UPDATE Users SET date_last_login = '$date' WHERE id = '$uid'");
		}

		catch (Exception $e) {
			echo $e->getMessage(); 
		}

	}
	public function getUserinfo($uid) {
		global $db;
		try {
			$result = $db->exec("SELECT * FROM Users WHERE id = '$uid' LIMIT 1");
			return $result[0];
		}
		catch (Exception $e) {
			echo $e->getMessage(); 
		}

	}
	
		public function updatePassword($uid=null) {
		$date = date("Y-m-d H:i:s");
		global $db;
		try {
			$result = $db->exec("UPDATE Users SET date_last_login = '$date' WHERE id = '$uid'");
		}

		catch (Exception $e) {
			echo $e->getMessage(); 
		}

	}	
}

?>