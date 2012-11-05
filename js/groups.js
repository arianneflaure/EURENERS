function updateRights() {
	var data = $('#userform').serialize();
	//alert(data);
	//return false;
	
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateRights.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Rights successfully updated for the group.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function updateGroup(idform) {
	var name = jQuery('#nombre').val();
	var data = $("#userform").serialize();
	//alert(data);
	if(name=='') {
		alert('You should provide a name for the group!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addGroup.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Group successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);
			}
		}
	});
	
}