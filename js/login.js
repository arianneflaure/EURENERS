var ajax = '_ajax/';
function login() {
	var domain;
	user = jQuery('#user').val();
	pass = jQuery('#pass').val();
	jQuery('#message').html('<span></span>Authenticating...');
	//alert(user);
	  jQuery.ajax({
		  type: "POST",
		  url: ajax+"login.php",
		  data: "user="+user+"&pass="+pass,
		  cache: false,
		  success: function(html){
			if(html == 'true') {
				jQuery('#message').html('<span></span>Authentication succesful! You will be redirect shortly.');
				jQuery('#message').removeClass('blue');
				jQuery('#message').removeClass('red');
				jQuery('#message').addClass('green');
				setTimeout(function() {
					window.location='dashboard.php'
				}, 2000);
			} else {
				jQuery('#message').html('<span></span>Bad credentials!!!');
				jQuery('#message').removeClass('blue');
				jQuery('#message').addClass('red');
			}
		  }
		});
}