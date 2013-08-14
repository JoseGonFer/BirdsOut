<?php 
class FacebookLogin {

require_once('fb/facebook.php');
$facebook = new Facebook(array(
  'appId'  => '149251308605684',
  'secret' => 'ad053e50696048658c068be0684f5469',
));
// Create our Application instance (replace this with your appId and secret).


	public $username = null;
	public $password = null;
	public $tags = null;
	public $interests = null;
	public $languages = null;


	public function __construct( $data = array() ) {
		if( isset( $data['username'] ) ) $this->username = stripslashes( strip_tags( $data['username'] ) );
		if( isset( $data['password'] ) ) $this->password = stripslashes( strip_tags( $data['password'] ) );
		if( isset( $data['tags'] ) ) $this->tags = stripslashes( strip_tags( $data['tags'] ) );
		if( isset( $data['interests'] ) ) $this->interests = stripslashes( strip_tags( $data['interests'] ) );
		if( isset( $data['languages'] ) ) $this->languages = stripslashes( strip_tags( $data['languages'] ) );
	}

	public function storeFormValues( $params ) {
		//store the parameters
		$this->__construct( $params );
	}

	public function checkFB() {
		/* SQL Request to see if user credentials is correct */
		global $db;
		$success = false;
		try {
			$result = $db->exec('SELECT id FROM Users WHERE user_login = "'.$this->username.'" AND pass_word = "'.hash('sha256', $this->password).'" LIMIT 1');
			if ($result) {
				return $result[0]["id"];
			}
		}
		catch (Exception $e)  {
			echo $e->getMessage();
		}
	}
}
?>