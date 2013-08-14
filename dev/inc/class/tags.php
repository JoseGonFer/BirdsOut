<?php
class Tags {
	public $uid = null;
	public $aid = null;
	public $tagname = null;
	public $tagid = null;

	public function __construct( $data = array() ) {
		if( isset( $data['uid'] ) ) $this->uid = stripslashes( strip_tags( $data['uid'] ) );
		if( isset( $data['aid'] ) ) $this->aid = stripslashes( strip_tags( $data['aid'] ) );
		if( isset( $data['tagname'] ) ) $this->tagname = stripslashes( strip_tags( $data['tagname'] ) );
		if( isset( $data['tagid'] ) ) $this->tagid = stripslashes( strip_tags( $data['tagid'] ) );
	}

	public function storeValues( $params ) {
		//store the parameters
		$this->__construct( $params );
	}

	public function userTags() {
		/* SQL Request to see if user credentials is correct */
		global $db;
		try {
			$result = $db->exec("SELECT tags_id FROM UserTags WHERE user_id = $this->uid");
			if ($result) {
				return $result;
			}
		}
		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}
	public function activityTags() {
		/* SQL Request to see if user credentials is correct */
		global $db;
		try {
			$result = $db->exec('SELECT id FROM Users WHERE user_login = "'.$this->username.'" AND pass_word = "'.$this->password.'" LIMIT 1');
			if ($result) {
				return $result[0]["id"];
			}
		}
		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}
	public function getTagName() {
		/* SQL Request to see if user credentials is correct */
		global $db;
		try {
			$result = $db->exec("SELECT name FROM Tags WHERE id = $this->tagid LIMIT 1");
			if ($result) {
				return $result[0]["name"];
			}
		}
		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}
	
		
	

}
?>