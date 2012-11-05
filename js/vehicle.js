
function updateVehicle(idform) {
	var data = $('#'+idform).serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMaquinarias.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Vehicle successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
//	resetForm($('#userform'));
}

function addVehicle() {
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	var data = $('#userform').serialize();
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMaquinarias.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Vehicle successfully created.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	resetForm($('#userform'));
	
}

function resetForm(ele) {
	
    $(ele).find(':input').each(function() {
        switch(this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });

}
function deleteVehicle(usuario) {
	if (confirm("You want to delete the user?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delUser.php",
		  data: "user="+usuario,
		  cache: false,
		  success: function(html){
			if(html==""){
				//jQuery('.message').val('<span></span>User successfully created.');
				jQuery('#response').html('<span></span>User successfully created.');
				jQuery('#message').fadeIn("slow");
				//jQuery('.message').fadeIn("slow");
				// setTimeout(function() {
					// jQuery('#response').fadeOut("slow");
				// }, 2000);
				jQuery('#'+usuario).fadeOut("slow");
				setTimeout(function() {
					$('#'+usuario).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}