
function updateMaquinarias(idform) {
	var data = $('#'+idform).serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMaquinarias.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Maquinarias successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addMaquinarias(idform) {
	var data = $('#'+idform).serialize();
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMaquinarias.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Machine successfully created.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
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
function deleteMaquinarias(id, name) {
	if (confirm('You want to delete the '+name+' ?')) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delMaquinarias.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>'+name+'  succesfully deleted.');
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