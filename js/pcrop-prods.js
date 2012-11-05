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

function addCprod() {
	var data = $("#userform :input[name][name!='prod']").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addCprod.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Producto successfully added.');
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
function deletePprod(idc) {
	if (confirm("You want to delete the Product?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"deletePprod.php",
		  data: "identificador="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Product succesfully deleted.');
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