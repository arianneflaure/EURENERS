function checktype() {
	var cat;
	cat = jQuery('#cat:checked').val();
	//alert(cat);
	if(cat=='provincia') {
		jQuery('#btip').hide();
		jQuery('#t').hide();
		jQuery('#f').hide();
		jQuery('#idd').html('Provincia');
	} else {
		jQuery('#btip').show();
		jQuery('#t').show();
		jQuery('#f').show();
		jQuery('#idd').html('Municipios y temperatura Media');
	}

}

function updatePM(identificador) {
	var name = jQuery('#nombre').val();
	//var description = jQuery('#descripcion').val();
	var bt = jQuery('#bt').val();
	var cat  = jQuery('#cat:checked').val();
	if(cat == 'provincia'){
		jQuery.ajax({
			type: "POST",
			url: ajax+"addProvincia.php",
			data: "nombre="+name+"&identificador="+identificador,
			cache: false,
			success: function(html){
				if(html==""){
					jQuery('#response').html('<span></span>Provincia successfully updated.');
					jQuery('#message').fadeIn("slow");
					setTimeout(function() {
						jQuery('#response').fadeOut("slow");
					}, 2000);	
				}
			}
		});
	} else {
		var name = jQuery('#municipio').val();
		var temperatura = jQuery('#temperatura').val();
		var fuente = jQuery('#fuente').val();
		var cat  = jQuery('#cat:checked').val();
		var bt = jQuery('#bt').val();
		jQuery.ajax({
			type: "POST",
			url: ajax+"addMunicipio.php",
			data: "municipio="+name+"&temperatura="+temperatura+"&fuente="+fuente+"&provincia="+bt+"&identificador="+identificador,
			cache: false,
			success: function(html){
				if(html==""){
					jQuery('#response').html('<span></span>Municipality successfully updated.');
					jQuery('#message').fadeIn("slow");
					setTimeout(function() {
						jQuery('#response').fadeOut("slow");
					}, 2000);
				}
			}
		});
	}
}

function addPM() {
	var name = jQuery('#municipio').val();
	var temperatura = jQuery('#temperatura').val();
	var fuente = jQuery('#fuente').val();
	var cat  = jQuery('#cat:checked').val();
	
	if(name=='') {
		alert('You should provide a name for the Procince or municipality!');
		return false;
	}
	if(cat == 'provincia'){
		jQuery.ajax({
			type: "POST",
			url: ajax+"addProvincia.php",
			data: "nombre="+name,
			cache: false,
			success: function(html){
				if(html==""){
					jQuery('#response').html('<span></span>Provincia successfully added.');
					jQuery('#message').fadeIn("slow");
					setTimeout(function() {
						jQuery('#response').fadeOut("slow");
					}, 2000);	
				}
			}
		});
		resetForm($('#userform'));
	} else {
		var bt = jQuery('#bt').val();
		if(bt == '') {
			alert('Please select the Province!');
			return false;
		}
		jQuery.ajax({
			type: "POST",
			url: ajax+"addMunicipio.php",
			data: "municipio="+name+"&temperatura="+temperatura+"&fuente="+fuente+"&provincia="+bt,
			cache: false,
			success: function(html){
				if(html==""){
					jQuery('#response').html('<span></span>Municipality successfully created.');
					jQuery('#message').fadeIn("slow");
					setTimeout(function() {
						jQuery('#response').fadeOut("slow");
					}, 2000);
				}
			}
		});
		resetForm($('#userform'));
	}
	//
	
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
function deleteProv(id) {
	if (confirm("You want to delete the Province?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delProv.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Provicia succesfully deleted.');
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
function deleteMun(id) {
	if (confirm("You want to delete the Municipia?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delMun.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Provicia succesfully deleted.');
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