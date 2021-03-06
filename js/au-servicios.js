function checktype() {
	var cat;
	cat = jQuery('#cat:checked').val();
	//alert(cat);
	if(cat=='basic') {
		jQuery('#btip').hide();
	} else {
		jQuery('#btip').show();
	}

}

function updateServicios(user) {
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addServicios.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>servicios auxiliares successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addServicios() {
	var cat = jQuery('#categoria').val();
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	if(cat == '') {
		alert('Please select the Category');
		return false;
	}
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addServicios.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>servicios auxiliares successfully added.');
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
function deleteServicios(id) {
	if (confirm("You want to delete the servicios auxiliares?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delServicios.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>servicios auxiliares succesfully deleted.');
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