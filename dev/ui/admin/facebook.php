<?php

$facebook = new Facebook(array(
		'appId'  => '149251308605684',
		'secret' => 'ad053e50696048658c068be0684f5469'
	));

$userId = $facebook->getUser();
if ($userId) { $userinfo = $facebook->api('/me'); }

?>
<html>
  <body>
  
    <div id="fb-root"></div>
    <fb:login-button scope="email"></fb:login-button>

       <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '149251308605684',
          status     : true,
          cookie     : true,
          xfbml      : true,
          oauth      : true,
        });

        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
      };

      (function(d){
         var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";
         d.getElementsByTagName('head')[0].appendChild(js);
       }(document));
    </script>
  </body>
</html>