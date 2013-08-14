<?php class abuse {
	public $userid = null;
	public $abuseid = null;
	public $type = null;

	public function __construct( $data = array() ) {
		if( isset( $data['username'] ) ) $this->username = stripslashes( strip_tags( $data['username'] ) );
		if( isset( $data['password'] ) ) $this->password = stripslashes( strip_tags( $data['password'] ) );
		if( isset( $data['tags'] ) ) $this->tags = stripslashes( strip_tags( $data['tags'] ) );
		if( isset( $data['interests'] ) ) $this->interests = stripslashes( strip_tags( $data['interests'] ) );
		if( isset( $data['languages'] ) ) $this->languages = stripslashes( strip_tags( $data['languages'] ) );
	}

	public function storeValues( $params ) {
		//store the parameters
		$this->__construct( $params );
	}

		public function addReport() {
		/* SQL query to import abuse to database */
		global $db;
		$success = false;
		try {
			$request = $db->exec('INSERT INTO abuse () values()');
		}
		catch (Exception $e)  {
		}
	}

		public function editReport() {
		/* SQL query to import abuse to database */
		global $db;
		$success = false;
		try {
			$request = $db->exec('INSERT INTO abuse () values()');
		}
		catch (Exception $e)  {
		}
	}
		
		public function getReport() {
		/* SQL query to get abuse reports */
		global $db;
		$success = false;
		try {
			$result = $db->exec('INSERT * FROM abuse WHERE Status = "0"');
		}
		catch (Exception $e)  {
		}
	}

}
?>