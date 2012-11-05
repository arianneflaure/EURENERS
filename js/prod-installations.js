function checktype() {
	var cat;
	
	//alert(cat);
	

}

function updateCInstal(user) {
	var data = $("#userform ").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateCInstalacione.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Instalacione successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addEinstalacion() {
	var data = $("#userform").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEinstalacion.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Instalacion successfully added.');
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
function deleteCinst(idc) {
	if (confirm("You want to delete the Instalacion?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"deleteCinst.php",
		  data: "instalacion="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Instalacion succesfully deleted.');
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