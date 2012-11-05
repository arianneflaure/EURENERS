
function updatePastoreo(user) {
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updatePastoreo.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Pastoreo successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}
