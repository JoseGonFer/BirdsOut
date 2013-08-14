<?php get_admin_header(); ?>
		    <div class="container" id="page">
    <div class="span_12">
	    <form class="update-user">    	
	    	<input type="text" name="username" placeholder="Username" value="<?php echo $userinfo["user_login"]; ?>">
	    	<div class="clear"></div>
	    	<input type="text" name="firstname" placeholder="Firstname" value="<?php echo $userinfo["name_first"]; ?>">
	    	<input type="text" name="lastname" placeholder="Lastname" value="<?php echo $userinfo["name_last"]; ?>">
	    	<div class="clear"></div>
	    	<input type="text" name="city" placeholder="City">
	    	<input type="text" name="postcode" placeholder="Postcode">
	    	<div class="clear"></div>
	    	<input type="text" name="sex" placeholder="Sex" value="<?php echo $userinfo["m_or_w"]; ?>">	    	
	    	<input type="date" name="birthday" placeholder="Birthday" value="<?php echo $userinfo["birthdate"]; ?>">
	    	<div class="clear"></div>
	    	<input type="text" name="tags" placeholder="Tags">
	    	<input type="text" name="interests" placeholder="Interests">
	    	<div class="clear"></div>	
	    	<input type="text" name="languages" placeholder="Languages">
	    	<div class="clear"></div>
	            	<button class="btn btn-large" id="update-user" type="button">Update User</button>
        	<button class="btn-danger btn-large" id="block-user" type="button">Block User</button>
	    </form>

    	</div>
    	
       	
    	<div class="clearfix"></div>
        <div class="span_12">
	    	<input type="password" name="password" placeholder="Password">
	    	<br />
	    	<button class="btn btn-large" id="update-password" type="button">Update Password</button>

        </div>
</div>



<?php get_admin_footer(); ?>