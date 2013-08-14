$(document).ready(function() {

var activities=["Cheerleading","Acrobatics","Parkour","Baseball","Cricket","Bandy","Golf","Floorball","Ice hockey","Basketball","Football","Goalball","Handball","Rugby","Volleyball","Boules","Curling","Surfing","Sailing","Cycling","Dancing","Paintball","Bungee jumping","Skydiving","Climbing","Triathlon","Track & field","Camping","Trekking","Bird watching","Gymnastics","Sculpting","Bowling","Dart","Frisbee","Polo","Martial arts","Movies","Photography","Art","Litterature","Fashion","Music","Painting","Theater","Poetry","Food & drinks","Yoga","Car racing","Motorcycles","Rafting","Kayaking","Rowing","Badminton","Lacross","Table Tennis","Squash","Beach tennis","Tennis","Traveling","Sightseeing","CosPlay","Live","Skateboarding","Rollerblades","Charity","Board games","Computer gaming","Card games","Fitness","Running","Soul cycling","Walking","Orienteering","Fencing","Water polo","Water skiing","Diving","Swimming","Snowboarding","Downhill skiing","Biathlon","Ice skating","Animals","Clubbing","Scrapbooking","Shopping","Gardening","Geocaching","Home decoration","Go Kart"],
	item = activities[Math.floor(Math.random()*activities.length)];

	$('.activity p').text(item);

	setInterval(function() {
		$('.activity p').fadeOut(function(){

			item = activities[Math.floor(Math.random()*activities.length)];
			$('.activity p').text(item);

		});
		
		$('.activity p').fadeIn();
	}, 3000);	

	$('#register-form').submit(function() {
		
		$.ajax({
			url: 'store-address.php',
			data: 'ajax=true&email=' + escape($('#email').val()),
			success: function(msg, err, data) {								
				$('#response').html(msg);
				
				if(msg.charAt(0) == 'S'){
					$('#submit').addClass('success');
				}
				
			},
		    error: function(msg, err, data){
				$('#response').html(msg);
				
				if(msg.charAt(0) == 'S'){
					$('#submit').addClass('success');
				}
		    }
		});
	
		return false;
	});

});