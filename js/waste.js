
function updatewaste(user) {
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addResiduos.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Waste successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addwaste() {
	var type = jQuery('#tipo_residuo').val();
	var cat = jQuery('#categoria').val();
	if(type == '') {
		alert('Please select the Typo Actividad');
		return false;
	}
	if(cat == '') {
		alert('Please select the Category');
		return false;
	}
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addResiduos.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Waste successfully added.');
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
function deleteWaste(id) {
	if (confirm("You want to delete the waste?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delWaste.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Waste succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#'+id).fadeOut("slow");
				setTimeout(function() {
					$('#'+id).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}