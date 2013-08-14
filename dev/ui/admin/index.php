<?php get_admin_header(); ?>
<div class="container">
<?php if (!is_logged_in()) { 
	?>
            	<div class="span12">
                    	<div class="area">
                            <form class="form-horizontal" id="signinform">
                           
                                <div class="heading">
                                    <h4 class="form-heading">Sign In</h4>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <div class="controls">
                                        <input name="username" type="text" id="username" placeholder="Your username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input name="password" type="password" id="password" placeholder="Your password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox"> Keep me signed in
                                        </label>
                                        <button type="submit" class="btn btn-success" id="signin">Sign In</button>
                                        <button type="button" class="btn">Help</button>
                                    </div>
                                </div>	
                                <div class="alert alert-error" style="display:none;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Access Denied!</strong> Please provide valid authorization.
                                </div>
                            </form>	
						</div>                           
                    </div>
                    <?php } ?>
                                	</div> 
<?php get_admin_footer(); ?>