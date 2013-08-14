<?php get_admin_header(); ?>

	    <div class="container" id="page">
    
    <div class="span_12">


    	<div class="image">
<div id="cropimage" style="display: none;"><div class="touchpanview-wrap" style="width: 600px; height: 300px;"><div class="touchpanview-pan"><img src="" width="" height="" id="crop"></div></div><p><a class="zoom-in"></a><a class="zoom-out"></a><a class="zoom-full"></a><a class="zoom-fit"></a></p></div>
    		<div id="file-uploader">       
	    		<noscript>          
		    		<p>Please enable JavaScript to use file uploader.</p>
		    		</noscript>         
		    </div>
    	</div>


<form class="add-activity">    	
    	<div class="span_6">

			<input type="hidden" id="cropheight" name="cropheight" />
			<input type="hidden" id="cropwidth" name="cropwidth" />
			<input type="hidden" id="croptop" name="croptop" />
			<input type="hidden" id="cropleft" name="cropleft" />
			<input type="hidden" id="filename" name="filename" />
	
	    	<input type="text" name="title" placeholder="Title">
	    	<div class="clear"></div>
	    	<textarea name="description" placeholder="Description" id="description"></textarea>
	    	<div class="clear"></div>	    	
	    	<input type="text" name="uid" placeholder="User">
	    	<div class="clear"></div>	
	    	<input type="text" id="tags" name="tags">
	    	<div class="clear"></div>	    	
	    	<input type="text" id="interests" name="interests">
	    	<div class="clear"></div>	    	
			<input type="date" name="date" placeholder="Date">
	    	<div class="clear"></div>	    				
			<input type="time" name="time" placeholder="Time">   
			<div class="clear"></div>
    	</div>
    	
    	
    	<div class="span_6">
	    	<input type="text" name="adress" placeholder="Adress" id="searchadress">
	    	<div class="clear"></div>
	    	<input type="text" name="locationname" placeholder="Location Name">
	    	<div class="clear"></div>	    	
	    	<div id="mapCanvas"></div>
	    	<div id="infoPanel">
		    	<div class="clear"></div>
		    	<input type="hidden" name="latitude">
		    	<input type="hidden" name="longitude">
		    	<input type="hidden" id="picture" name="picture" value="">		    	
		    </div>
    	</div>
    	</form>
    </div>
    <div class="clear"></div>
    <button class="btn btn-large btn-block" id="add-activity" type="button">Add Activity</button>
</div>
    		  <style>
  #mapCanvas {
    width: 220px;
    height: 220px;
  }
  </style>
<?php get_admin_footer(); ?>