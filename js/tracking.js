function filter() {
	var user = $('#user').val();
	var datemin = $('#date1').val();
	var datemax = $('#date2').val();
	var query = "";
	if(datemin != '') {
		date1 = new Array;
		date1 = datemin.split(".");
		datemin = date1[2]+"-"+date1[0]+"-"+date1[1];
		query = "from="+datemin;
	}
	if(datemax != '') {
		date1 = new Array;
		date1 = datemax.split(".");
		datemax = date1[2]+"-"+date1[0]+"-"+date1[1];
		if(query != '') { query = query+"&to="+datemax; } else { query = "to="+datemax; }
	}
	if(user != "") {
		if(query != '') { query = query+"&user="+user; } else { query = "to="+user; }
	}
	
	window.location = '?view=tracking&'+query;
	
}

function restet(){
	resetForm($('#filter'));
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
