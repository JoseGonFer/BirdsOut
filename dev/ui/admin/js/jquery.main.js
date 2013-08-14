jQuery(document).ready(function() {
	jQuery("#save").on("click", function() {
		data = jQuery(".wysi").val();
		alert(data);
		$.ajax({
			type: "POST",
			url: "/ui/admin/ajax/savecontent.php",
			data: {
				content: data,
			},
			success: function(response) {
				alert(response);
				//jQuery("div#addcustomer input").val('');
				//jQuery("div#addcustomer textarea").val('');
			}
		});
	});
	jQuery("#signin").on("click", function() {
		var data = {};
		$.each($('form input').serializeArray(), function() {
			data[this.name] = this.value;
		});
		//alert(data);
		$.ajax({
			type: "POST",
			url: "/dev/ajax/login/",
			data: {
				data: data,
			},
			success: function(response) {
				if (response == 'ok') {
					window.location.replace("http://outbirds.com/dev/administrator");
				} else {
					jQuery("div.alert-error").fadeIn();
				}
				//alert(response);
				//jQuery("div#addcustomer input").val('');
				//jQuery("div#addcustomer textarea").val('');
			}
		});
		return false;
	});
	jQuery("#add-activity").on("click", function() {
		var data = {};
		$.each($('form input').serializeArray(), function() {
			data[this.name] = this.value;
		});
		$.ajax({
			type: "POST",
			url: "/dev/ajax/add-activity/",
			data: {
				data: data,
			},
			success: function(response) {
				//alert(response);
				console.log(response);
				//jQuery("div#addcustomer input").val('');
				//jQuery("div#addcustomer textarea").val('');
			}
		});
		console.log(data);
	});

	
			jQuery('#add-user').on("click", function() {
			alert ('test');
		var data = {};
		$.each($('form input').serializeArray(), function() {
			data[this.name] = this.value;
		});
		 $.ajax({
			type: "POST",
			url: "/dev/ajax/add-user/",
			data: {
				data: data,
			},
			success: function(response) {
				//alert(response);
				console.log(response);
				
				//jQuery("div#addcustomer input").val('');
				//jQuery("div#addcustomer textarea").val('');
			}
		}); 
	
		console.log(data);
	});
	
		new qq.FileUploader({
		element: document.getElementById('file-uploader'),
		action: '/dev/ajax/upload-img/',
		debug: false,
		onComplete: function(id, fileName, responseJSON) {
			var filnamn = responseJSON['filename'];
			var code = $("<div/>").html(responseJSON['code']).text();

			$('#filename').val(filnamn);
			$('#cropimage img').attr('src','/dev/tmp/' + filnamn);
			$('#cropimage img').attr('height',responseJSON['height']);
			$('#cropimage img').attr('width',responseJSON['height']);
			
			$("#file-uploader").hide();
			$("#cropimage").show(function() {
			jQuery('#cropimage img').touchPanView({
				width: 	600,
				height: 300,
				startZoomedOut: true,
				zoomIn: 			'#cropimage .zoom-in',
				zoomOut:			'#cropimage .zoom-out',
				zoomFit:			'#cropimage .zoom-fit',
				zoomFull:			'#cropimage .zoom-full'
			});	
			});	

		}
	}); 
	
});


function getFileNameFromPath(path) {
	var ary = path.split("/");
	return ary[ary.length - 1];
}
jQuery("#imagecropsubmit").on("click", function() {
	var url = "/dev/inc/crop.php";
	// alert(getFileNameFromPath($('#cropbox').attr('src')));
	//    alert($("#imagecrop").serialize());
	$.ajax({
		type: "POST",
		url: url,
		data: $("#imagecrop").serialize(),
		success: function(data) {
			jQuery("#imagecrop").fadeOut('slow');
			jQuery("div.image").html('<img src="http://outbirds.com/dev/media/images/' + data + '"  id="cropbox"/>');
			jQuery('#picture').val(data);
		}
	});
	return false;
});

function updateCoords(c) {
	jQuery('#x').val(c.x);
	jQuery('#y').val(c.y);
	jQuery('#w').val(c.w);
	jQuery('#h').val(c.h);
};

function checkCoords() {
	if (parseInt($('#w').val())) return true;
	alert('Du lär välja område först, retard.');
	return false;
};
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
	geocoder.geocode({
		latLng: pos
	}, function(responses) {
		if (responses && responses.length > 0) {
			updateMarkerAddress(responses[0].formatted_address);
		} else {
			updateMarkerAddress('Cannot determine address at this location.');
		}
	});
}

function updateMarkerPosition(latLng) {
	jQuery("input[name='latitude']").val(latLng.lat());
	jQuery("input[name='longitude']").val(latLng.lng());
}

function updateMarkerAddress(str) {
	//document.getElementById('address').innerHTML = str;
	jQuery("input[name='adress']").val(str);
}

function initialize() {
	var latLng = new google.maps.LatLng(59.35979600, 18.01620500);
	var map = new google.maps.Map(document.getElementById('mapCanvas'), {
		zoom: 13,
		center: latLng,
		MapType: 'ROADMAP',
		panControl: false,
		zoomControl: true,
		mapTypeControl: false
	});
	var marker = new google.maps.Marker({
		position: latLng,
		title: 'Adress',
		map: map,
		draggable: true
	});
	var infowindow = new google.maps.InfoWindow();
	var input = /** @type {HTMLInputElement} */
	(document.getElementById('searchadress'));
	var autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo('bounds', map);
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		infowindow.close();
		marker.setVisible(false);
		input.className = '';
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			// Inform the user that the place was not found and return.
			input.className = 'notfound';
			return;
		}
		// If the place has a geometry, then present it on a map.
		if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
		} else {
			map.setCenter(place.geometry.location);
			map.setZoom(17); // Why 17? Because it looks good.
		}
		marker.setIcon( /** @type {google.maps.Icon} */ ({
			url: place.icon,
			size: new google.maps.Size(71, 71),
			origin: new google.maps.Point(0, 0),
			anchor: new google.maps.Point(17, 34),
			scaledSize: new google.maps.Size(35, 35)
		}));
		marker.setPosition(place.geometry.location);
		marker.setVisible(true);
		//alert(marker.getPosition());
		var latLng = marker.getPosition();
		updateMarkerPosition(latLng);
		geocodePosition(latLng);
		var address = '';
		if (place.address_components) {
			address = [(place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')].join(' ');
		}
		infowindow.open(map, marker);
	});
	// Update current position info.
	updateMarkerPosition(latLng);
	geocodePosition(latLng);
	// Add dragging event listeners.
	google.maps.event.addListener(marker, 'dragstart', function() {});
	google.maps.event.addListener(marker, 'drag', function() {
		updateMarkerPosition(marker.getPosition());
	});
	google.maps.event.addListener(marker, 'dragend', function() {
		geocodePosition(marker.getPosition());
	});
}
// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);