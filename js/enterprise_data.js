
function updateEnterprise(id) {
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	var finicio = jQuery('#fecha_inicio').val();
	if(finicio != '') {
		date1 = new Array;
		date1 = finicio.split(".");
		finicio = date1[2]+"-"+date1[0]+"-"+date1[1];
	}
	var ffin = jQuery('#fecha_fin').val();
	if(ffin != '') {
		date1 = new Array;
		date1 = ffin.split(".");
		ffin = date1[2]+"-"+date1[0]+"-"+date1[1];
	}
	var es_agricola = $('#es_agricola:checked').val(); if(es_agricola != '1') es_agricola = 0;
	var es_transformacion = $('#es_transformacion:checked').val(); if(es_transformacion != '1') es_transformacion = 0;
	var es_ganadera = $('#es_ganadera:checked').val(); if(es_ganadera != '1') es_ganadera = 0;
	if(es_agricola == 0 && es_transformacion == 0 && es_ganadera == 0) {
		alert('Please check at least one option for the enterprise Agricola, Ganadera or Transformacion!');
		return false;
	}
	
	
	var data = 'identificador='+$('#identificador').val()+'&nombre='+$('#nombre').val()+'&codigo='+$('#codigo').val()+'&municipio='+$('#municipio').val()+'&provincia='+$('#provincia').val()+'&direccion='+$('#direccion').val()+'&telefono='+$('#telefono').val()+'&numero='+$('#numero').val()+'&codigo_postal='+$('#codigo_postal').val()+'&es_agricola='+es_agricola+'&es_transformacion='+es_transformacion+'&es_ganadera='+es_ganadera+'&fecha_inicio='+finicio+'&fecha_fin='+ffin;
	//var data = $('#dataenterprise').serialize();
	
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEnterprise.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Enterprise successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addEnterprise() {
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	var finicio = jQuery('#fecha_inicio').val();
	if(finicio != '') {
		date1 = new Array;
		date1 = finicio.split(".");
		finicio = date1[2]+"-"+date1[0]+"-"+date1[1];
	}
	var ffin = jQuery('#fecha_fin').val();
	if(ffin != '') {
		date1 = new Array;
		date1 = ffin.split(".");
		ffin = date1[2]+"-"+date1[0]+"-"+date1[1];
	}
	var es_agricola = $('#es_agricola:checked').val(); if(es_agricola != '1') es_agricola = 0;
	var es_transformacion = $('#es_transformacion:checked').val(); if(es_transformacion != '1') es_transformacion = 0;
	var es_ganadera = $('#es_ganadera:checked').val(); if(es_ganadera != '1') es_ganadera = 0;
	if(es_agricola == 0 && es_transformacion == 0 && es_ganadera == 0) {
		alert('Please check at least one option for the enterprise Agricola, Ganadera or Transformacion!');
		return false;
	}
	
	var data = 'nombre='+$('#nombre').val()+'&codigo='+$('#codigo').val()+'&municipio='+$('#municipio').val()+'&provincia='+$('#provincia').val()+'&direccion='+$('#direccion').val()+'&telefono='+$('#telefono').val()+'&numero='+$('#numero').val()+'&codigo_postal='+$('#codigo_postal').val()+'&es_agricola='+es_agricola+'&es_transformacion='+es_transformacion+'&es_ganadera='+es_ganadera+'&fecha_inicio='+finicio+'&fecha_fin='+ffin;
	//var data = $('#dataenterprise').serialize();
	
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEnterprise.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Enterprise successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	resetForm($('#dataenterprise'));	
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
function deleteEmpresas(id) {
	if (confirm("You want to delete Empresas?")) {
		
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delEnterprise.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			//alert('succesfully');
			if(html==""){
				jQuery('#response').html('<span></span>Enterprise succesfully deleted.');
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