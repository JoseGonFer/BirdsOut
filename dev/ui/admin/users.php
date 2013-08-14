<?php get_admin_header(); ?>
    <div class="container" id="page">
	    	<div class="span_12">
		    	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>First Login</th>
                  <th>Last Seen</th>
                  <th>Sex</th>
                  <th>Birthday</th>
                  
                </tr>
              </thead>
              <tbody>
             <?php 
	    		$usersc = new Users; 
	    		$users = $usersc->userListing(); 
	    		foreach ($users as $user) {
	    	 ?>
                <tr id="<?php echo $user["id"]; ?>">
                  <td><a href="<?php echo './users/edit/'.$user["id"];?>"><?php echo $user["user_login"]; ?></a></td>
                  <td><?php echo $user["name_first"]; ?></td>
                  <td><?php echo $user["name_last"]; ?></td>                  
                  <td><?php echo $user["date_first_login"]; ?></td>
                  <td><?php echo $user["date_last_login"]; ?></td>
                  <td><?php echo $user["m_or_w"]; ?></td>
                  <td><?php echo $user["birthdate"]; ?></td>                  
                </tr>
                <?php } ?>
              </tbody>
            </table>
	    	</div>
    </div>



<?php get_admin_footer(); ?>