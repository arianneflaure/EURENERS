
function updateProd(user) {
	var data = $('#dataenterprise').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addProd.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Final product transform successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addProd() {
	var cat = jQuery('#categoria').val();
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	if(cat == '') {
		alert('Please select the Category');
		return false;
	}
	var data = $('#dataenterprise').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addProd.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Final product transform successfully added.');
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
function deleteProd(id) {
	if (confirm("You want to delete End product transform?")) {
		
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delPr.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			//alert('succesfully');
			if(html==""){
				jQuery('#response').html('<span></span>Final product transform succesfully deleted.');
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