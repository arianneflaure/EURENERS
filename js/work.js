function updateWork() {
	var data = $("#userform :input[name][name!='maquinaria'][name!='nombrem'][name!='labor']").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateWork.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Work successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addWork() {
	var data = $("#userform :input[name][name!='maquinaria'][name!='nombrem']").serialize();
	//alert(data);
	//return false;
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	var maquinaria = $("#maquinaria").val();
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addWork.php",
		data: data,
		cache: false,
		success: function(html){
			html = parseInt(html);
		//	return false;
			if(isInt(html)){
				jQuery('#response').html('<span></span>Work successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);
				addM(html, maquinaria);				
			}
		}
	});
	resetForm($('#userform'));	
}

function addM(labor, maquinaria) {
	
	//alert(maquinaria); //alert();
	//var labor = $("#labor").val();
	var maqName = $("#m"+maquinaria).val();

	//alert(idm); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"associateMachine.php",
		data: "maquinaria="+maquinaria+"&labor="+labor,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Machine successfully associated.');
				jQuery('#message').fadeIn("slow");
				var id = jQuery("tr").last().attr('id');
				if(id = 'NaN') {
					var i; i = id + 1;
				} else {
					var i; i = 0;
				}
				
				//alert(i); //return false;
				jQuery("tr").last().after("<tr id='"+i+"'><td><input type='checkbox' name='check' /></td><td><a href=''>"+maqName+"</a></td><td style='padding:5px 4px;'><a style='margin-left:2px;float:left' href='#' onclick='deleteMaquinarias(, )><img src='gfx/icon-delete.png' alt='delete' title='Delete maquinaria' /></a></td></tr>");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	//resetForm($('#associate'));
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

function deleteWork(id) {
	if (confirm("Do you want to delete the work?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delWork.php",
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

function addMachine() {
	var maquinaria = $("#maquinaria").val();
	var labor = $("#labor").val();
	var maqName = $("#m"+maquinaria).val();

	//alert(idm); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"associateMachine.php",
		data: "maquinaria="+maquinaria+"&labor="+labor,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Machine successfully associated.');
				jQuery('#message').fadeIn("slow");
				var id = jQuery("tr").last().attr('id');
				if(id = 'NaN') {
					var i; i = id + 1;
				} else {
					var i; i = 0;
				}
				
				//alert(i); //return false;
				jQuery("tr").last().after("<tr id='"+i+"'><td><input type='checkbox' name='check' /></td><td><a href=''>"+maqName+"</a></td><td style='padding:5px 4px;'><a style='margin-left:2px;float:left' href='#' onclick='deleteMaquinarias(, )><img src='gfx/icon-delete.png' alt='delete' title='Delete maquinaria' /></a></td></tr>");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	//resetForm($('#associate'));
}

function deleteMaquinarias(id, i) {
	if (confirm("Do you want to delete the associated machine?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delAssociatedMachine.php",
		  data: "maquinaria="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Association succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#'+id).fadeOut("slow");
				setTimeout(function() {
					$('#'+i).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}

function isInt(n) {
   return n % 1 === 0;
}