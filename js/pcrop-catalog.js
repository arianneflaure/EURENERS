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

function updateEcrop(user) {
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

function addEcrop() {
	var data = $("#userform :input[name][name!='production']").serialize();
	
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addECultivos.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Crop successfully added.');
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
function deleteCrop(idc) {
	if (confirm("You want to delete the Cultivos?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delCrop.php",
		  data: "cultivo="+idc,
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