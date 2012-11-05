function addline() {
	jQuery('<div class="line"><div class="finput"><label>User</label><input type="text" class="small" value="" /></div><div class="finput"><label>Name</label>	<input type="text" class="small" value="" /></div><div class="finput"><label>Phone</label><input type="text" class="small" value="" /></div><div class="finput"><label>Enterprise</label><input type="text" class="small" value="" /><span class="list" style="opacity: 1;">Last</span></div></div><div class="nextline"><div class="finput"><label>Pass</label><input type="text" class="small" value="" /></div><div class="finput"><label>Surname</label><input type="text" class="small" value="" /></div><div class="finput"><label>Email</label><input type="text" class="small" value="" /></div><div class="finput"><label>Group</label><input type="text" class="small" value="" /><span class="list" style="opacity: 1;">Last</span></div></div>').appendTo('#lesinputs');
	$(".line:odd").css({
        "border-top": "2px solid #f2f4f7"
    });
	$(".nextline:odd").css({
        "border-bottom": "2px solid #f2f4f7"
    });
    $(".line:first-child").css({
        "border-top": "none"
    });
    $(".line:last-child").css({
        "border-bottom": "none"
    });
	
	$(function() {
        $("span.list").hover(
        function() {
            $(this).fadeTo(200, 0.85).end();
        }, function() {
            $(this).fadeTo(200, 1).end();
        });
    });
}

function updateMachine(user) {
	var username = jQuery('#username').val();
	var pass = jQuery('#pass').val();
	var name = jQuery('#name').val();
	var phone = jQuery('#phone').val();
	var enterprise = jQuery('#enterprises').val();
	var surname = jQuery('#surname').val();
	var email = jQuery('#email').val();
	var group = jQuery('#group').val();
	var idioma = jQuery('#idioma').val();
	//alert(enterprise);
	if(username=='') {
		alert('You should provide a usernane!');
		return false;
	}
	if(name=='') {
		alert('You should provide a name for the user!');
		return false;
	}
	//alert(phone);
		
	jQuery.ajax({
		type: "POST",
		url: ajax+"editUser.php",
		data: "login="+username+"&pass="+pass+"&nom="+name+"&phone="+phone+"&email="+email+"&enterprise="+enterprise+"&groupe="+group+"&surname="+surname+"&idioma="+idioma,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>User successfully updated.');
				jQuery('#message').fadeIn("slow");
				//jQuery('.message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);
			}
		}
	});
//	resetForm($('#userform'));
}

function addMachine() {
	var username = jQuery('#username').val();
	var pass = jQuery('#pass').val();
	var name = jQuery('#name').val();
	var phone = jQuery('#phone').val();
	var enterprise = jQuery('#enterprises').val();
	var surname = jQuery('#surname').val();
	var email = jQuery('#email').val();
	var group = jQuery('#group').val();
	var idioma = jQuery('#idioma').val();
	//alert(username);
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	if(username=='') {
		alert('You should provide a usernane!');
		return false;
	}
	if(name=='') {
		alert('You should provide a name for the user!');
		return false;
	}
	if(email=='') {
		alert('You should provide an email for the user!');
		return false;
	}
	if(pass=='') {
		alert('You should provide a password for the user!');
		return false;
	}
	if(group=='') {
		alert('You should provide a group for the user!');
		return false;
	}
	
	
	jQuery.ajax({
		type: "POST",
		url: ajax+"addUsers.php",
		data: "login="+username+"&pass="+pass+"&nom="+name+"&phone="+phone+"&email="+email+"&enterprise="+enterprise+"&groupe="+group+"&surname="+surname+"&lang="+idioma,
		cache: false,
		success: function(html){
			if(html==""){
				//jQuery('.message').val('<span></span>User successfully created.');
				jQuery('#response').html('<span></span>User successfully created.');
				jQuery('#message').fadeIn("slow");
				//jQuery('.message').fadeIn("slow");
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
function deleteMachine(usuario) {
	if (confirm("You want to delete the user?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delUser.php",
		  data: "user="+usuario,
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
				jQuery('#'+usuario).fadeOut("slow");
				setTimeout(function() {
					$('#'+usuario).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}