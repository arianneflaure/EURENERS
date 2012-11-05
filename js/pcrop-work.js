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

function updateEwork(user) {
	var data = $("#userform :input[name][name!='consumo'][name!='conso']").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateWorks.php",
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

function addEwork() {
	var data = $("#userform :input[name][name!='consumo'][name!='conso']").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEwork.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Work successfully added.');
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

function deleteCropWork(idc) {
	if (confirm("You want to delete the Labor?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delCropWork.php",
		  data: "labor="+idc,
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