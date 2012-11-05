var bool = true;
var ajax = '_ajax/';
function cacher(cache){
	if(bool==true){
		document.getElementById(cache).style.display='block';
		bool=false;
	}else{
		document.getElementById(cache).style.display='none';
		bool=true;
	}
}

function startLoading() {
	new Effect.Appear($('AreaLoading'), {duration: 0.2});
	Element.hide('etape');
}

function finishLoading(id) {
	
	
	if(id == 1) {
		Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
	} else if(id == 2) {
		Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
	} else if(id == 3){
		
		
	} else if(id == 4) {
		//Element.show('etape');
		
	} else if(id == 5) {
		
	} else if(id == 6) {
		Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
	} else if(id == 7) {
		
	}
	//setTimeout("Effect.toggle('AreaLoading');", 500);

}

function plutard(id) {
	Effect.Fade('msg');
	Effect.Fade('choice');
	if(id == 2) {
		jQuery('#status').val(2);
		jQuery('#inputprev').html('<p class="notification"><a onclick="plutard(3); return false;">Je remplirai plus tard</a></p>');
		loadContent(id);
	} else if(id == 3) {
		jQuery('#inputprev').html('<p class="notification"><a onclick="plutard(5); return false;">Je remplirai plus tard</a></p>');
		loadContent(id);
	}
	
}
			
function loadContent(id) {
	
	if(id == 1) Element.show('legend');
	
	
	if(id==2) {
		startLoading();
		var status = "";
		
		jQuery('#stepTitle').html('What is your activity ?');
		new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
		// jQuery('#progress_text').html('6% Complete');
		// jQuery('#progress').css('width','59px');
		jQuery('#navigation0').html('');
		Element.show('legend');
		//jQuery('#navigation0').css('display', 'none');
		jQuery('#navigation1').css('display', 'block');
		Element.show('submit');
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(1);" type="button" id="submit" value="&lt;&lt; Previous step" />');
		jQuery('#inputnext').html('<input class="submit" onClick="loadContent(3);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
	} else if(id==3) {
		startLoading();
		// new Ajax.Request("<?php echo AJAX_F; ?>checkStep1.php", { 
			// method: 'post', 
			// parameters : {},//,
		status = jQuery('#status').val();
		if(status == "0") {
			jQuery('#msg').html('<p class="">Merci de selectionner votre activite</p>');
			jQuery('#msg').css('display', 'block');
			new Effect.Shake('msg'); 
			finishLoading(id);
			jQuery('#inputnext').html('<input class="submit" onClick="loadContent(2);" type="button" id="submit2-1" value="Plus tard &gt;&gt;"/>');
			jQuery('#status').val(2);
			return false;
		}
		
		new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
		jQuery('#navigation1').html('');
		jQuery('#navigation2').css('display', 'block');
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(2);" type="button" id="submit" value="&lt;&lt; Previous step" />')
		jQuery('#inputnext').html('<input class="submit" onClick="loadContent(4);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		jQuery('#stepTitle').html('Thank you for helping us to know your company...');
		Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
		updateDomains();
	//	jQuery('#navigation2').css('display', 'none');
	} else if(id==4) {
		//alert('4');
		var cname = '';
		cname = jQuery('#companyName').val();
		cdesc = jQuery('#describeCompany').val();
		cf1 = jQuery('#firstStrength').val();
		cf2 = jQuery('#secondStrength').val();
		cf3 = jQuery('#thirdStrength').val();
		//alert(cdesc);
		if(cname == '' || cdesc == '' || cf1 == '' || cf2 == '' || cf3 == '') {
			//alert('');
			if( cname == '' ) jQuery("#companyName").addClass('error');
			if( cdesc == '' ) jQuery("#describeCompany").addClass('error');
			if( cf1 == '' ) jQuery("#firstStrength").addClass('error');
			if( cf2 == '' ) jQuery("#secondStrength").addClass('error');
			if( cf3 == '' ) jQuery("#thirdStrength").addClass('error');
			if( cname == '' )
				new Effect.Shake('companyName');
			else if( cdesc == '' )
				new Effect.Shake('describeCompany');
			else if( cf1 == '' )
				new Effect.Shake('firstStrength');
			else if( cf2 == '' )
				new Effect.Shake('secondStrength');
			else if( cf3 == '' )
				new Effect.Shake('thirdStrength');
				//alert('hh');
			jQuery('#msg').html('<p class="">Merci de remplir les champs en rouge!</p>');
			jQuery('#msg').css('display', 'block');
			//jQuery('#inputnext').html('<input class="submit" onClick="loadContent(4);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
			return false;
		}
		//jQuery('#etape').css('height', '0');
		saveCompanyDetails(cname, cdesc, cf1, cf2, cf3);
		jQuery('#stepTitle').html('What is the predominant color you want for your website ?');
		new Effect.Appear($('AreaLoading'), {duration: 0.2});
		jQuery('#navigation1').css('display', 'none');
		jQuery('#navigation2').css('display', 'block');
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(3);" type="button" id="submit" value="&lt;&lt; Previous step" />')
		jQuery('#inputnext').html('<input class="submit" onClick="loadContent(5);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
		//alert(jQuery('#inputnext').val());
		
		//alert(jQuery('#inputnext').val());
		// jQuery('#progress_text').html('12% Complete');
		// jQuery('#progress').css('width','90px');
		Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
		// jQuery('#inputnext').html('<input class="submit" onClick="loadContent(5);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
	} else if(id==5) {
		jQuery('#msg').css('display', 'none');
		new Effect.Appear($('AreaLoading'), {duration: 0.2});
		//jQuery('#etape').html('');
		jQuery('#etape').css('display', 'none');
		jQuery('#domains').css('display', 'block');
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(4);" type="button" id="submit" value="&lt;&lt; Previous step" />');
		jQuery('#inputlater').html('<input class="submit" type="submit" id="none" value="Choose Later" onClick="loadContent(6);" />');
		jQuery('#inputnext').html('<input class="submit" onClick="loadContent(6);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		jQuery('#stepTitle').html('What domain name you want ?');
		jQuery('#none').css('display', 'block');
		//Element.hide('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
	} else if(id==6) {
		new Effect.Appear($('AreaLoading'), {duration: 0.2});
		jQuery('#domains').css('display', 'none');
		jQuery('#etape').css('min-height', '300');
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(5);" type="button" id="submit" value="&lt;&lt; Previous step" />');
		jQuery('#inputnext').html('<input class="submit" onClick="loadContent(7);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
		jQuery('#none').css('display', 'none');
		jQuery('#stepTitle').html('Are you now on social network or youtube ?');
		jQuery('#etape').css('display', 'block');
		finishLoading(id);
	} else if(id==7) {
		new Effect.Appear($('AreaLoading'), {duration: 0.2});
		jQuery('#stepTitle').html('Which pages you want to see on your site ?');
		saveNetwork();
		//initializePages();
		jQuery('#etape').css('display', 'none');
		jQuery.ajax({
			  type : "POST",
			  url: "steps.php",
			  data: "content="+id,
			  cache: false,
			  success: function(html){
				//alert(html);
				jQuery('#etape').html(html);
				 jQuery('ul.pages li').focusin( function() {
					jQuery(this).addClass('focus');
				  }
				  );

				  // Remove the "focus" value to class attribute 
				  jQuery('ul.pages li').focusout( function() {
					jQuery(this).removeClass('focus');
				  }
				  );
				  
				  jQuery(function() {
						jQuery("#customize ul.pages").sortable({ opacity: 0.6, cursor: 'move', update: function() {
							var order = jQuery(this).sortable("serialize") + '&action=updateRecordsListings'; 
							jQuery.post(ajax+"update_pages_order.php", order, function(theResponse){
								//jQuery("#contentRight").html(theResponse);
							}); 															 
						}								  
						});
					});
			  }
			});
		//new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(6);" type="button" id="submit" value="&lt;&lt; Previous step" />');
		jQuery('#inputnext').html('<input class="submit" onClick="loadContent(8);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		jQuery('#etape').css('display', 'block');
		
		
			Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
	} else if(id==8) {
		//jQuery('#inputlater').css('display', 'none');
		new Effect.Appear($('AreaLoading'), {duration: 0.2});
		jQuery('#stepTitle').html('What content would you put on each page ?');
		//jQuery('#etape').css('min-height', '300');
		jQuery('#etape').css('display', 'none');
		new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
		
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(7);" type="button" id="submit" value="&lt;&lt; Previous step" />');
		jQuery('#inputnext').html('<input class="submit" onClick="loadContent(9);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		jQuery('#etape').css('display', 'block');
		Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
	} else if(id==9) {
		// etape 8 Affichage de la page des informations de paiement
		new Effect.Appear($('AreaLoading'), {duration: 0.1});
		new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
		// changement du titre
		jQuery('#stepTitle').html('Please type your informations and option payment');
		// mise a jour du bouton
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(8);" type="button" id="submit" value="&lt;&lt; Previous step" />');
		jQuery('#inputnext').html('<input class="submit active" onClick="loadContent(10);" type="button" id="submit2-2" value="Pay my website &gt;&gt;"/>');
		// mise a jour 
		jQuery("input").click(function() {
		  alert(jQuery(":checked").val());
		});
		jQuery('#etape').css('display', 'block');
		Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
	} else if(id==10) {
		
		pay();
		window.location='http://www.paypal.com/?api=';
	
	}
	
}
			
function loadPrevious(id) {
	//if(id == 1) {
		startLoading();
		//alert(id);
		new Ajax.Updater('etape', ajax+'loadPrevious.php', {method: 'post', postBody:'id='+ id +''});
		
		
		setTimeout("Effect.toggle('AreaLoading');", 1000);
		if(id==1) {
			Element.hide('legend');
			//Element.show('submit');
			Element.hide('submit');
			//jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(0);" type="button" id="submit" value="&lt;&lt; Previous step" />');
			jQuery('#inputnext').html('<input class="submit" onClick="loadContent(2);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
			new Effect.Appear($('etape'), {duration: 0.5});
		} else if(id==2) {
			jQuery('#stepTitle').html('What is your activity ?');
			jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(1);" type="button" id="submit" value="&lt;&lt; Previous step" />');
			jQuery('#inputnext').html('<input class="submit" onClick="loadContent(3);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
			new Effect.Appear($('etape'), {duration: 0.5});
		} else if(id==3) {
			loadContent(3);
			new Effect.Appear($('etape'), {duration: 0.5});
		} else if(id==4){
			new Effect.Appear($('AreaLoading'), {duration: 0.2});
			Element.hide('domains');
			Element.hide('none');
			Element.show('etape');
			jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(3);" type="button" id="submit" value="&lt;&lt; Previous step" />')
			jQuery('#inputnext').html('<input class="submit" onClick="loadContent(5);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
			jQuery('#stepTitle').html('What is the predominant color you want for your website ?');
			finishLoading(id);
			new Effect.Appear($('etape'), {duration: 0.5});
		}else if(id==5) {
			loadContent(5);
			// new Effect.Appear($('AreaLoading'), {duration: 0.2});
			// Element.show('etape');
		//	jQuery('#etape').css('min-height', '300');
			//jQuery('#etape').css('display', 'none');
			// jQuery('#domains').css('display', 'block');
			// jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(4);" type="button" id="submit" value="&lt;&lt; Previous step" />')
			// jQuery('#inputnext').html('<input class="submit" onClick="loadContent(5);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
			// jQuery('#stepTitle').html('What domain name you want ?');
			//new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
			// finishLoading(id);
		}else if(id==6) {
			loadContent(6);
			// new Effect.Appear($('AreaLoading'), {duration: 0.2});
			// jQuery('#etape').css('min-height', '300');
		//	jQuery('#etape').css('display', 'none');
		//	jQuery('#domains').css('display', 'block');
			// jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(5);" type="button" id="submit" value="&lt;&lt; Previous step" />')
			// jQuery('#inputnext').html('<input class="submit" onClick="loadContent(6);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
			// jQuery('#stepTitle').html('Are you now on social network or youtube ?');
			//new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
			// finishLoading(id);
			// new Effect.Appear($('etape'), {duration: 0.5});
		} else if(id==7) {
			new Effect.Appear($('AreaLoading'), {duration: 0.2});
		jQuery('#stepTitle').html('Which pages you want to see on your site ?');
		saveNetwork();
		//initializePages();
		jQuery('#etape').css('display', 'none');
		jQuery.ajax({
			  type : "POST",
			  url: "steps.php",
			  data: "content="+id,
			  cache: false,
			  success: function(html){
				//alert(html);
				jQuery('#etape').html(html);
				 jQuery('ul.pages li').focusin( function() {
					jQuery(this).addClass('focus');
				  }
				  );

				  // Remove the "focus" value to class attribute 
				  jQuery('ul.pages li').focusout( function() {
					jQuery(this).removeClass('focus');
				  }
				  );
				  
				  jQuery(function() {
						jQuery("#customize ul.pages").sortable({ opacity: 0.6, cursor: 'move', update: function() {
							var order = jQuery(this).sortable("serialize") + '&action=updateRecordsListings';
							jQuery.post(ajax+"update_pages_order.php", order, function(theResponse){
								//jQuery("#contentRight").html(theResponse);
							}); 															 
						}								  
						});
					});
			  }
			});
		//new Ajax.Updater('etape', 'steps.php', {method: 'post', postBody:'content='+ id +''});
		jQuery('#inputprev').html('<input class="submit" onClick="loadPrevious(6);" type="button" id="submit" value="&lt;&lt; Previous step" />');
		jQuery('#inputnext').html('<input class="submit" onClick="loadContent(8);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		jQuery('#etape').css('display', 'block');
		
		
			Element.show('etape');
		setTimeout("Effect.toggle('AreaLoading');", 1000);
		} else if(id==8) {
			loadContent(8);
		}
		
}
				
function selectionneActivite(cl) {
	//alert(cl);
	var myArr = new Array(); 
	myArr = cl.split(" ");
	// alert(myArr[1]);
	// alert(myArr.length);
	// if(myArr[1] != "")
		// return false;
	var newClassName = "selectedActivity";
	var job = '';
	//if ( $("#about").hasClass("opened") ) {}
	jQuery(function(){
		jQuery('#activities').children().removeClass('selectedActivity');
	});
	jQuery("."+cl).addClass('selectedActivity');
	if(cl == 'activity') {
		job = jQuery('#job').val();
		//alert(job);
	}
	var status = "";
	new Ajax.Request(ajax+"save_activity.php?other="+job, { 
		method: 'post', 
		parameters : {classe: cl},//,
		
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			if(response == 0 || response == 1) {
				jQuery('#progress_text').html('15% Complete');
				jQuery('#progress').css('width','15%');
				jQuery('#msg').css('display', 'none');
				//status = jQuery('#status').val();
				jQuery('#status').val(1);
				//jQuery('#inputnext').html('<input class="submit" onClick="loadContent(2);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
				//alert(status);
			}
		}
	});
	
	jQuery('#navigation0').css('display', 'none');
	jQuery('#navigation1').css('display', 'block');
	//var status = 0;
	
}

function saveCompanyDetails(name, desc, f1, f2, f3) {
	new Ajax.Request(ajax+"save_company.php", { 
		method: 'get', 
		parameters : {name: name, description: desc, f1: f1, f2: f2, f3: f3},//,
		
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			if(response == 0 || response == 1) {
				//jQuery('#progress_text').html('19% Complete');
				//jQuery('#progress').css('width','19%');
				jQuery('#msg').css('display', 'none');
				//status = jQuery('#status').val();
				jQuery('#status').val(1);
				
				//alert(status);
			}
		}
	});
}
			
function selectionneActivite2(cl) {
	var newClassName = "selectedActivity2";
	jQuery(function(){
		jQuery('#colors').children().removeClass('selectedActivity2');
	});
	jQuery("."+cl).addClass('selectedActivity2');
	new Ajax.Request(ajax+"save_color.php", { 
		method: 'post', 
		parameters : {classe: cl},//,
		
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			if(response == 0 || response == 1) {
				jQuery('#progress_text').html('25% Complete');
				jQuery('#progress').css('width','25%');
				//jQuery('#msg').css('display', 'none');
				//status = jQuery('#status').val();
				jQuery('#status').val(1);
			//	jQuery('#inputnext').html('<input class="submit" onClick="loadContent(4);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
				//alert(status);
			}
		}
	});
}	

function editePage(idB, idpage) {
	var newClassName = "active";
	jQuery(function(){
		jQuery('#eachPages').children().removeClass('active');
	});
	jQuery("#"+idpage).addClass('active');
	loadform(idpage, idB);	
}	

function loadform(idpage, idB) {
	//alert(idpage);
	
	new Ajax.Updater('editing', ajax+'editpage.php', {method: 'post', postBody:'content='+ idpage +'&idB='+idB});
	
	
	jQuery('#editing').fadeIn("slow");	//alert('yo1');
	jQuery('#none2').css('display', 'none');
	jQuery('#inputprev').css('display', 'none');
	jQuery('#inputnext').css('display', 'none');
	//if (!jQuery.browser.opera) {
		//alert('yo');
	setTimeout(function(){
		jQuery('select.select').each(function(){
			
			var title = jQuery(this).attr('title');
			if( jQuery('option:selected', this).val() != '') title = jQuery('option:selected',this).text();
			jQuery(this)
				.css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
				.after('<span class="select">' + title + '</span>')
				.change(function(){
					val = jQuery('option:selected',this).text();
					jQuery(this).next().text(val);
					})
		});
	}, 500);
	//alert("id de la page "+idpage);
}

function updateform() {
	var text = jQuery('#textOfPage').val();
	var type = jQuery('#typeSite').val();
	//alert(text);
	new Ajax.Updater('particular', ajax+'changeform.php', {method: 'post', postBody:'type='+ type + '&text=' + text});
	//alert(type);
	jQuery("#home").removeClass();
	jQuery("#home").addClass(type);
	if(type == 'gallery') {
		        rotate();	
	
   	            var item_width = jQuery('#slides li').outerWidth(); 
   	            var left_value = item_width * (0); 
        
   	            jQuery('#slides li:first').before(jQuery('#slides li:last'));
	
   	            jQuery('#slides ul').css({'left' : left_value});

   	            jQuery('#prev').click(function() {

	                var left_indent = parseInt(jQuery('#slides ul').css('left')) + item_width;

   		            jQuery('#slides ul').animate({'left' : left_indent}, 200,function(){     

   		    	        jQuery('#slides li:first').before(jQuery('#slides li:last'));           

   		                jQuery('#slides ul').css({'left' : left_value});
		
   	                });

   	                return false;
            
	            });
  
	            jQuery('#next').click(function() {
		
		            var left_indent = parseInt(jQuery('#slides ul').css('left')) - item_width;
		
	    	        jQuery('#slides ul').animate({'left' : left_indent}, 200, function () {
            
    		    	    jQuery('#slides li:last').after(jQuery('#slides li:first'));                 	
			
		    	        jQuery('#slides ul').css({'left' : left_value});
		
		            });
		         
		            return false;
		
	            });        
            
	} else if(type == 'contact') {
		jQuery("#home").addClass(type);
	} else if(type == 'map') {
		jQuery("#home").addClass(type);
	} else {
		jQuery("#home").addClass(type);
	}
}
function rotate() {
	            jQuery('#next').click();
            }
function closeform() {
	jQuery('#inputprev').css('display', 'block');
	jQuery('#inputnext').css('display', 'block');
	jQuery('#editing').fadeOut("slow");
}

function saveform(idB) {
	//alert('sauvegarde');
	var title = jQuery('#titleOfPage').val();
	var type = jQuery('#typeSite').val();
	var id = jQuery('#idpage').val();
	//var idB = jQuery('#id').val();
	if(type == 'gallery') {
		//alert('galerie');
		jQuery.ajax({
			url: ajax+"update_page.php?type="+type+"&idpage="+id,
			cache: false,
			success: function(html){

			}
		});
	} else if(type == 'contact') {
		//alert(type);
		var text = jQuery('#textOfPage').val();
		jQuery.ajax({
			type : "POST",
			data : "content="+text+"&type="+type,
			url: ajax+"update_page.php?title="+title+"&id="+id,
			cache: false,
			success: function(html){
				updatePageButton(idB, id);
			}
		});
	} else if(type == 'map') {
		alert('map');
	} else {
	//	alert('text');
		var text = jQuery('#textOfPage').val();
		jQuery.ajax({
			type : "POST",
			data : "content="+text+"&type="+type,
			url: ajax+"update_page.php?title="+title+"&id="+id,
			cache: false,
			success: function(html){
				updatePageButton(idB, id);
			}
		});
	}
	closeform();
}

function updatePageButton(idB, id) {
	new Ajax.Updater(idB, ajax+'update_button_page.php', {method: 'post', postBody:'id='+id});
}

function getProgressBar() {
	new Ajax.Request(ajax+"getProgressBar.php", { 
		method: 'post', 
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			if(response == 0 || response == 1) {
				jQuery('#progress_text').html('15% Complete');
				jQuery('#progress').css('width','15%');
			}
		}
	});
}

function updateDomains() {
	jQuery.getJSON(ajax+"getFreeDomains.php", function(data){
		// jQuery('#inputnext').html('<input class="submit" onClick="loadContent(4);" type="button" id="submit2-1" value="Next &gt;&gt;"/>');
		// alert('');
		jQuery('#dom1').text(data.dom1);
		jQuery('#dom2').text(data.dom2);
		jQuery('#dom3').text(data.dom3);
		jQuery('#dom4').text(data.dom4);
		// jQuery('#dom3').val(data.designation);
		// 
	});
	
}

function selectionneDomaine(d) {
	//alert(d);
	
	//var newClassName = "selectedDomaine";
	jQuery(function(){
		jQuery('#listdomain').children().removeClass('selectedDomain');
	});
	jQuery("li."+d).addClass('selectedDomain');
	jQuery.ajax({
		url: ajax+"select_domain.php?d="+d,
		cache: false,
		success: function(html){

		}
	});
	// switch(d){
		// case 'dcom':
			// alert('1');
		  // jQuery(".d-fr").removeClass('selectedDomain');
		  // jQuery(".d-com").removeClass('selectedDomain');
		  // jQuery(".dnet").removeClass('selectedDomain');
		  // alert('2');
		  // break;
		// case 'd-fr':
		  // jQuery(".dcom").removeClass('selectedDomain');
		  // jQuery(".d-com").removeClass('selectedDomain');
		  // jQuery(".dnet").removeClass('selectedDomain');
		  // break;
		// default:
		  //code to be executed if n is different from case 1 and 2
		// }
	
	// jQuery('#progress_text').html('6% Complete');
	// jQuery('#progress').css('width','59px');
	// jQuery('#navigation0').css('display', 'none');
	// jQuery('#navigation1').css('display', 'block');
}

function selectionneDom(d) {
	//alert(d);
	
	//var newClassName = "selectedDomaine";
	jQuery(function(){
		jQuery('#listdom').children().removeClass('selectedDomain');
	});
	jQuery("li."+d).addClass('selectedDomain');
}

function getLastStep() {


}

function checkDomain() {
	var domain;
	domain = jQuery('#check').val();
	jQuery('#checkDomain').html('<p><img src="./images/checking2.gif" alt="Checking for the domain..." /></p>');
  jQuery('#checkDomain').load("./_ajax/checkDomain.php?d="+domain);
}

function saveDomain() {
	var domain;
	domain = jQuery('#have').val();
	jQuery('#saveDomain').html('<p><img src="./images/checking2.gif" alt="Saving domain..." /></p>');
  jQuery('#saveDomain').load("./_ajax/saveDomain.php?d="+domain);
}

function saveNetwork() {
	var p1 = jQuery('#wantPack1').val();
	var p2 = jQuery('#wantPack2').val();
	var f = jQuery('#facebook').val();
	var t = jQuery('#tweeter').val();
	var y = jQuery('#youtube').val();
	var g = jQuery('#googleplus').val();
	
	jQuery.ajax({
		type: 'POST',
		url: ajax+'save_network.php',
		data: 'p1='+p1+'&p2='+p2+'&f='+f+'&t='+t+'&y='+y+'&g='+g, 
		statusCode: {404: function() {
			alert('Error. Please Retry');
		}},
	});
}

function selectionnePack1(id) {
	value = jQuery('#wantPack1').val();
	if(value == 'I want this pack') {
		jQuery("#"+id).addClass('active');
		jQuery('#wantPack1').val('Remove this pack');
	} else {
		jQuery("#"+id).removeClass('active');
		jQuery('#wantPack1').val('I want this pack');
	}
}

function selectionnePack2(id) {
	//alert(id);
	value = jQuery('#wantPack2').val();
	if(value == 'I want this pack') {
		jQuery("#"+id).addClass('active');
		jQuery('#wantPack2').val('Remove this pack');
	} else {
		jQuery("#"+id).removeClass('active');
		jQuery('#wantPack2').val('I want this pack');
	}
}

///////////////////////////////////////////// etape 2.4

function addPage() {
	jQuery.ajax({
	  url: ajax+"add_page.php",
	  cache: false,
	  success: function(html){
		//alert(html);
		jQuery('.pages').append(html);
		 jQuery('ul.pages li').focusin( function() {
			jQuery(this).addClass('focus');
		  }
		  );

		  // Remove the "focus" value to class attribute 
		  jQuery('ul.pages li').focusout( function() {
			jQuery(this).removeClass('focus');
		  }
		  );
		  
		  jQuery(function() {
				jQuery("#customize ul.pages").sortable({ opacity: 0.6, cursor: 'move', update: function() {
					var order = jQuery(this).sortable("serialize") + '&action=updateRecordsListings'; 
					jQuery.post(ajax+"updateDB.php", order, function(theResponse){
						//jQuery("#contentRight").html(theResponse);
					}); 															 
				}								  
				});
			});
	  }
	});
}

function deletePage(idpage, iddiv) {
	jQuery('#'+iddiv).hide("slow");
	jQuery.ajax({
	  type: "POST",
	  url: ajax+"delete_page.php",
	  data: "idp="+idpage,
	  cache: false,
	  success: function(html){}
	});
}

function pay() {
	var cname = jQuery('#company').val();
	var fname = jQuery('#firstName').val();
	var lname = jQuery('#lastName').val();
	var address = jQuery('#address').val();
	var pcode = jQuery('#postalCode').val();
	var city = jQuery('#city').val();
	var email = jQuery('#email').val();
	var telephone = jQuery('#telephone').val();
	var conditions = jQuery('#conditions').val();
	var option1 = jQuery('#option1').val();
	var option2 = jQuery('#option2').val();
	
	//alert(pcode);
	//alert(conditions);
	jQuery.ajax({
	  type: "POST",
	  url: ajax+"save_infos.php",
	  data: "idp=",
	  cache: false,
	  success: function(html){}
	});
	
}

function updatePages(type) {
	jQuery.ajax({
	  url: ajax+"update_pages.php?type="+type,
	  cache: false,
	  success: function(html){
		
	  }
	});
}
function updatepage(id) {
	var title;
	title = jQuery('#'+id).val();
	// alert(title);
	// alert(id);
	jQuery.ajax({
	  url: ajax+"update_page.php?title="+title+"&id="+id,
	  cache: false,
	  success: function(html){
		
	  }
	});
}
// function border(){
	// jQuery('#menuCustom').css('border', '2px solid #999');
	// jQuery('#customizeButton').css('display', 'inline');
	// jQuery('#customizeButton1').css('display', 'inline');
	// jQuery('#customizeButton2').css('display', 'inline');
	// jQuery('#customizeButton3').css('display', 'inline');
	// jQuery('#customizeButton4').css('display', 'inline');
	// jQuery('#customizeButton5').css('display', 'inline');
	// jQuery('#customizeButton6').css('display', 'inline');
// }	
	

// function displayTooltips1(){
	// jQuery('#tt-left').slideDown();
	// jQuery('#tt-right').css('display', 'none');
	// jQuery('#tt-up').css('display', 'none');
	// jQuery('#tt-down').css('display', 'none');
	// jQuery('#tt-plus').css('display', 'none');
	// jQuery('#tt-corbeille').css('display', 'none');
// }  
// function displayTooltips2(){
	// jQuery('#tt-left').css('display', 'none');
	// jQuery('#tt-right').slideDown();
	// jQuery('#tt-up').css('display', 'none');
	// jQuery('#tt-down').css('display', 'none');
	// jQuery('#tt-plus').css('display', 'none');
	// jQuery('#tt-corbeille').css('display', 'none');
// }   
// function displayTooltips3(){
	// jQuery('#tt-left').css('display', 'none');
	// jQuery('#tt-right').css('display', 'none');
	// jQuery('#tt-up').slideDown();
	// jQuery('#tt-down').css('display', 'none');
	// jQuery('#tt-plus').css('display', 'none');
	// jQuery('#tt-corbeille').css('display', 'none');
// }   
// function displayTooltips4(){
	// jQuery('#tt-left').css('display', 'none');
	// jQuery('#tt-right').css('display', 'none');
	// jQuery('#tt-up').css('display', 'none');
	// jQuery('#tt-down').slideDown();
	// jQuery('#tt-plus').css('display', 'none');
	// jQuery('#tt-corbeille').css('display', 'none');
// }   
// function displayTooltips5(){
	// jQuery('#tt-left').css('display', 'none');
	// jQuery('#tt-right').css('display', 'none');
	// jQuery('#tt-up').css('display', 'none');
	// jQuery('#tt-down').css('display', 'none');
	// jQuery('#tt-plus').slideDown();
	// jQuery('#tt-corbeille').css('display', 'none');
// }   
// function displayTooltips6(){
	// jQuery('#tt-left').css('display', 'none');
	// jQuery('#tt-right').css('display', 'none');
	// jQuery('#tt-up').css('display', 'none');
	// jQuery('#tt-down').css('display', 'none');
	// jQuery('#tt-plus').css('display', 'none');
	// jQuery('#tt-corbeille').slideDown();
// }
// function displayNone(){
	// jQuery('#tt-left').css('display', 'none');
	// jQuery('#tt-right').css('display', 'none');
	// jQuery('#tt-up').css('display', 'none');
	// jQuery('#tt-down').css('display', 'none');
	// jQuery('#tt-plus').css('display', 'none');
	// jQuery('#tt-corbeille').css('display', 'none');
// }

function choosen1() {
	updatePages('standard');
	jQuery('#standard').addClass('choosen');
	jQuery('#customize').removeClass('choosen');
}
function choosen2() {
	updatePages('custom');
	jQuery('#customize').addClass('choosen');
	jQuery('#standard').removeClass('choosen');
}
jQuery(document).ready( function() {
  // Add the "focus" value to class attribute 
	  jQuery('ul.pages li').focusin( function() {
		jQuery(this).addClass('focus');
	  }
  );

  // Remove the "focus" value to class attribute 
	  jQuery('ul.pages li').focusout( function() {
		jQuery(this).removeClass('focus');
	  }
  );

});
jQuery(document).ready(function(){ 
	jQuery(function() {
		jQuery("#customize ul.pages").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = jQuery(this).sortable("serialize") + '&action=updateRecordsListings'; 
			jQuery.post("updateDB.php", order, function(theResponse){
				//jQuery("#contentRight").html(theResponse);
			}); 															 
		}								  
		});
	});

});