
function updateMaterias(user) {
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMaterias.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Material successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addMaterias() {
	var type = jQuery('#tipo_materia_prima').val();
	var cat = jQuery('#categoria').val();
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	if(type == '') {
		alert('Please select the Material Type');
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
		url: ajax+"addMaterias.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Material successfully added.');
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
function deleteMaterias(id) {
	if (confirm("You want to delete the Material?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delMaterias.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Material succesfully deleted.');
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