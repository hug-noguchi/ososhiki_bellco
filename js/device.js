/*
 *
 *	device
 *
***************************************************************************/

function isSmartPhone(){
	// true:smartphone  false:pc
	if(navigator.userAgent.indexOf('iPhone')!=-1 || navigator.userAgent.indexOf('iPod')!=-1 || (navigator.userAgent.indexOf('Android')!=-1 && navigator.userAgent.indexOf('Mobile')!=-1)){
		return true;
	}else{
		return false;
	}
}


function isAndroid(){
	// true:android smartphon
	if((navigator.userAgent.indexOf('Android')!=-1 && navigator.userAgent.indexOf('Mobile')!=-1)){
		return true;
	}else{
		return false;
	}
}

function isTablet(){
	// true:tablet
	if(navigator.userAgent.indexOf('iPad')!=-1 || (navigator.userAgent.indexOf('Android')!=-1 && navigator.userAgent.indexOf('Mobile')==-1)){
		return true;
	}else{
		return false;
	}
}


if(isSmartPhone()){
	var vpval='width=360, user-scalable=1';
}else if(isTablet()){
	var vpval='width=768px, user-scalable=1';
}else{
	var vpval='width=device-width, user-scalable=1';
}
(function(d){
	var c = d.createElement('meta');
	c.name = 'viewport';
	c.content = vpval;
	var s = d.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(c, s);
})(document);
