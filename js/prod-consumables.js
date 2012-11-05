function checktype() {
	var cat;
	
	//alert(cat);
	

}

function updateEResiduo(user) {
	var data = $("#userform :input[name][name!='production']").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateCultivos.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Crop successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addEconsumible() {
	var data = $("#userform").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEconsumible.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Consumible successfully added.');
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
function deleteCcons(idc, idm) {
	if (confirm("You want to delete the Consumible?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"deleteCcons.php",
		  data: "consumible="+idc+"&maquinaria="+idm,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Consumible succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#c'+idc+"m"+idm).fadeOut("slow");
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