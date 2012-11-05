function checktype() {
	var cat;
	
	//alert(cat);
	

}

function updateProdA(user) {
	var data = $("#userform :input[name][name!='temp']").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateProdA.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Animal successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addProdA() {
	var data = $("#userform :input[name][name!='temp']").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addProdA.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Animal successfully added.');
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
function deleteAnimal(idc) {
	if (confirm("You want to delete the Animal inventario?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delAnimal.php",
		  data: "animal="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Inventario Animal succesfully deleted.');
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