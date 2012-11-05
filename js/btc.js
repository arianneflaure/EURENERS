function checktype() {
	var cat;
	cat = jQuery('#cat:checked').val();
	//alert(cat);
	if(cat=='basic') {
		jQuery('#btip').hide();
		jQuery('#desc').hide();
	} else {
		jQuery('#btip').show();
		jQuery('#desc').show();
	}

}

function updateBtc(identificador) {
	var name = jQuery('#nombre').val();
	var descripcion = jQuery('#descripcion').val();
	var bt = jQuery('#bt').val();
	var cat = jQuery('#cat:checked').val();
	if(name=='') {
		alert('You should provide a name for the category!');
		return false;
	}
	
	if(cat == 'basic'){
		jQuery.ajax({
			type: "POST",
			url: ajax+"addBtype.php",
			data: "nombre="+name+"&identificador="+identificador,
			cache: false,
			success: function(html){
				if(html==""){
					jQuery('#response').html('<span></span>Basic type successfully updated.');
					jQuery('#message').fadeIn("slow");
					setTimeout(function() {
						jQuery('#response').fadeOut("slow");
					}, 2000);	
				}
			}
		});
	} else {
		jQuery.ajax({
			type: "POST",
			url: ajax+"addCat.php",
			data: "nombre="+name+"&identificador="+identificador+"&descripcion="+descripcion+"&tipo_basico="+bt,
			cache: false,
			success: function(html){
				if(html==""){
					jQuery('#response').html('<span></span>Category successfully updated.');
					jQuery('#message').fadeIn("slow");
					//jQuery('.message').fadeIn("slow");
					setTimeout(function(){
						jQuery('#response').fadeOut("slow");
					}, 2000);
				}
			}
		});
	}
//	resetForm($('#userform'));
}

function addBtc() {
	var name = jQuery('#nombre').val();
	var descripcion = jQuery('#descripcion').val();
	var cat = jQuery('#cat:checked').val();
	// alert(name);
	// alert(description);
	// alert(cat);
	if(name=='') {
		alert('You should provide a name fot the category or Basic type!');
		return false;
	}
	if(cat == 'basic'){
		jQuery.ajax({
			type: "POST",
			url: ajax+"addBtype.php",
			data: "nombre="+name,
			cache: false,
			success: function(html){
				if(html==""){
					jQuery('#response').html('<span></span>Basic type successfully added.');
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
		if(bt=='') {
			alert('You should select a Basic type!');
			return false;
		}
		jQuery.ajax({
			type: "POST",
			url: ajax+"addCat.php",
			data: "nombre="+name+"&descripcion="+descripcion+"&tipo_basico="+bt,
			cache: false,
			success: function(html){
				if(html==""){
					jQuery('#response').html('<span></span>Category successfully created.');
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
function deleteBtc(id) {
	if (confirm("You want to delete the Category?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delCat.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Category succesfully deleted.');
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
function deleteBtyp(id){
	if (confirm("You want to delete the Basic type?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delBtyp.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Category succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#'+id).fadeOut("slow");
				setTimeout(function() {
					$('#'+id).remove();
				}, 1000);
			}
		  }
		});	
	} else {
	}		
}