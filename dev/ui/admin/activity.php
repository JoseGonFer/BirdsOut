<?php get_admin_header();  ?>
    <div class="container" id="page">
	    	<div class="span_12">
		    	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Location</th>
                  <th>Participants</th>
                  <th>Created</th>
                  
                </tr>
              </thead>
              <tbody>
              	    	<?php 
	    		$activityc = new Activities; 
	    		$activites = $activityc->getActivites(); 
	    		foreach ($activites as $activity) {
	    		$locationinfo = $activityc->getLocationinfo($activity["lat_long_id"]);
	    		$participants = $activityc->getParticipants($activity["id"]); 
	    	 ?>
                <tr id="<?php echo $activity["id"]; ?>">
                  <td><?php echo $activity["title"]; ?></td>
                  <td><?php echo $activity["date_event"]; ?> <?php echo $activity["time_event"]; ?></td>
                  <td><?php echo $locationinfo["0"]["name"]; ?></td>
                  <td><?php echo $participants["0"]["Participants"]; ?></td>
                  <td><?php echo $activity["datetime_created"]; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
	    	</div>
    </div>

<?php get_admin_footer(); ?>