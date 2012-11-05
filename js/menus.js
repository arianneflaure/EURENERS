
function updateMenu(idform) {
	var name = jQuery('#name').val();
	var description = jQuery('#descripcion').val();
	var data = $("#"+idform).serialize();
	
	if(name=='') {
		alert('You should provide a name for the menu!');
		return false;
	}
	if(description=='') {
		alert('You should provide a description for the menu!');
		return false;
	}
	
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMenu.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Menu successfully Updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);
				//resetForm($('#userform'));
			}
		}
	});
}

function addMenu(idform) {
	var name = jQuery('#name').val();
	var description = jQuery('#descripcion').val();
	var data = $("#userform").serialize();
	//alert(data);
	if(name=='') {
		alert('You should provide a name for the menu!');
		return false;
	}
	if(description=='') {
		alert('You should provide a description for the menu!');
		return false;
	}
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMenu.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Menu successfully created.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);
				resetForm($('#userform'));
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

function deleteMenu(id) {
	if (confirm("You want to delete the menu?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delMenu.php",
		  data: "id="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				//jQuery('.message').val('<span></span>User successfully created.');
				jQuery('#response').html('<span></span>User successfully created.');
				jQuery('#message').fadeIn("slow");
				//jQuery('.message').fadeIn("slow");
				// setTimeout(function() {
					// jQuery('#response').fadeOut("slow");
				// }, 2000);
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