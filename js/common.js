/*
 *
 *	common
 *
***************************************************************************/

var cssBreakPoint=[360,768];

$(function(){
	
	navPosReset();
	$(window).resize(function(){
		navPosReset();
	});
	
	
	
	
	// スマホグローバルメニュー展開
	$("nav .btn").bind("touchstart click",function(e){
		e.preventDefault();
		$("nav").addClass("open");
	});
	// スマホ画面外タップ
	$("#contents").bind("touchstart click",function(){
		if($("nav").hasClass("open")){
			$("nav").removeClass("open");
		}
	});
	
	
	
	// Social Btns
	$("li.fb a").attr("href","https://www.facebook.com/sharer/sharer.php?u="+encodeURI(location.href));
	$("li.tw a").attr("href","https://twitter.com/intent/tweet?url="+encodeURI(location.href)+"&text="+encodeURI(document.title));
	$("li.ln a").attr("href","line://msg/text/"+encodeURI(document.title)+"%20"+encodeURI(location.href));
	
});

function navPosReset(){
	// g-nav移動
	if(cssBreakPoint[0]<$(window).innerWidth()){
		// Tab,PC
		if($("footer>.nav_tool").size()!=0){
			$("#nav_tool").clone(true).appendTo($("header>.wrap"));
			$("footer>.nav_tool").remove();
		}
	}else{
		if($("header .nav_tool").size()!=0){
			$("#nav_tool").clone(true).prependTo($("footer"));
			$("header .nav_tool").remove();
		}
	}
}






