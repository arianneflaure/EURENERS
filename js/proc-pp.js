function checktype() {
	var cat;
	
	//alert(cat);
	

}

function updateProdP(user) {
	var data = $("#userform").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateProdP.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Transformation of producto final successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addProdP() {
	var data = $("#userform").serialize();
	
	var producto_final = jQuery('#producto_final').val();
	if(producto_final == '') {
		alert('You must fill the producto final!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addProdP.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Transformation of producto final successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	resetForm($('#userform'));	
}

function addMatP() {
	var data = $("#userform2").serialize();
	
	var producto_final = jQuery('#producto_final').val();
	if(producto_final == '') {
		alert('You must fill the producto final!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMatP.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Materia prima of producto final successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	resetForm($('#userform2'));	
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