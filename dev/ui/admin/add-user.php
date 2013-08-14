<?php get_admin_header(); ?>
		    <div class="container" id="page">
    
    <div class="span_12">
	    <form class="add-user">    	
    	<div class="span_12">
	    	<input type="text" name="username" placeholder="Username">
	    	<input type="password" name="password" placeholder="Password">
	    	<div class="clear"></div>
	    	<input type="text" name="firstname" placeholder="Firstname">
	    	<input type="text" name="lastname" placeholder="Lastname">
	    	<div class="clear"></div>
	    	<input type="text" name="city" placeholder="City">
	    	<input type="text" name="postcode" placeholder="Postcode">
	    	<div class="clear"></div>
	    	<input type="text" name="sex" placeholder="Sex">	    	
	    	<input type="date" name="birthday" placeholder="Birthday">
	    	<div class="clear"></div>
	    	<input type="text" name="tags" placeholder="Tags">
	    	<input type="text" name="interests" placeholder="Interests">
	    	<div class="clear"></div>	
	    	<input type="text" name="languages" placeholder="Languages">
	    	<div class="clear"></div>
    	</div>
    	
       	</form>
    </div>
        <button class="btn btn-large btn-block" id="add-user" type="button">Add User</button>

</div>



<?php get_admin_footer(); ?>