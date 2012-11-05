function $m(theVar){
	return document.getElementById(theVar)
}
function remove(theVar){
	var theParent = theVar.parentNode;
	theParent.removeChild(theVar);
}
function addEvent(obj, evType, fn){
	if(obj.addEventListener)
	    obj.addEventListener(evType, fn, true)
	if(obj.attachEvent)
	    obj.attachEvent("on"+evType, fn)
}
function removeEvent(obj, type, fn){
	if(obj.detachEvent){
		obj.detachEvent('on'+type, fn);
	}else{
		obj.removeEventListener(type, fn, false);
	}
}
function isWebKit(){
	return RegExp(" AppleWebKit/").test(navigator.userAgent);
}
function ajaxUpload(form){
	Element.show('AreaUploading');
	jQuery('#AreaUploading').css('opacity', '0.8');
	var html_error_http = '<img src=\'images/error.gif\' width=\'16\' height=\'16\' border=\'0\' /> Error in Upload, check settings and path info in source code.';
	var id_element = 'AreaUploading';
	var html_show_loading = '<div style="position: relative;z-index : 10px;color:white;"><div style="position:absolute; z-index:-1; top:0; left:0; right:0; bottom:0; opacity:0.2;"></div><br />File Uploading Please Wait...<br /><img src=\'images/loader.gif\' border=\'0\' /></div>';
	var url_action = 'scripts/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=http://localhost/pagify/uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300';
	var detectWebKit = isWebKit();
	form = typeof(form)=="string"?$m(form):form;
	var erro="";
	if(form==null || typeof(form)=="undefined"){
		erro += "The form of 1st parameter does not exists.\n";
	}else if(form.nodeName.toLowerCase()!="form"){
		erro += "The form of 1st parameter its not a form.\n";
	}
	if($m(id_element)==null){
		erro += "The element of 3rd parameter does not exists.\n";
	}
	if(erro.length>0){
		alert("Error in call ajaxUpload:\n" + erro);
		return;
	}
	var iframe = document.createElement("iframe");
	iframe.setAttribute("id","ajax-temp");
	iframe.setAttribute("name","ajax-temp");
	iframe.setAttribute("width","0");
	iframe.setAttribute("height","0");
	iframe.setAttribute("border","0");
	iframe.setAttribute("style","width: 0; height: 0; border: none;");
	form.parentNode.appendChild(iframe);
	window.frames['ajax-temp'].name="ajax-temp";
	var doUpload = function(){
		removeEvent($m('ajax-temp'),"load", doUpload);
		var cross = "javascript: ";
		cross += "window.parent.$m('"+id_element+"').innerHTML = document.body.innerHTML; void(0);";
		$m(id_element).innerHTML = html_error_http;
		$m('ajax-temp').src = cross;
		if(detectWebKit){
        	remove($m('ajax-temp'));
        }else{
        	setTimeout(function(){ remove($m('ajax-temp'))}, 250);
        }
    }
	addEvent($m('ajax-temp'),"load", doUpload);
	form.setAttribute("target","ajax-temp");
	form.setAttribute("action",url_action);
	form.setAttribute("method","post");
	form.setAttribute("enctype","multipart/form-data");
	form.setAttribute("encoding","multipart/form-data");
	if(html_show_loading.length > 0){
		$m(id_element).innerHTML = html_show_loading;
		
	}
	form.submit();
	setTimeout("Effect.toggle('AreaUploading');", 9000);
}