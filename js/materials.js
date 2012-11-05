function updateEMaterial(user) {
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEMaterials.php?update",
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

function addEmaterial() {
	var data = $("#userform").serialize();
	
	if($('#cultivo').val() == ''){
		alert('Please fill the cultivo');
		return false;
	}
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEMaterials.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Material Prima successfully added.');
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
function deleteMaterias(idc) {
	if (confirm("You want to delete the Materia prima?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delEMaterias.php",
		  data: "materia_prima="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Crop succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#'+idc).fadeOut("slow");
				setTimeout(function() {
					$('#'+idc).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}

function addTransport() {
	var data = $("#userform :input[name][name!='Fase']").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	var Fase = jQuery('#Fase:checked').val();
	if(Fase == 'on') {
		var es_propio = 1;
	} else {
		var es_propio = 0;
	}
	//alert(Fase); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addTransport.php",
		data: data+'&es_propio='+es_propio,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Materia Prima successfully added to Vehicule.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2500);	
			}
		}
	});
	resetForm($('#userform'));	
}