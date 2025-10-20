$(function(){
  $(".header__search--closesp").on('click', function(e) {
    e.preventDefault();
    $(".header__search").fadeOut(250);
  });
  $(".mv__search").on('click', function(e) {
    e.preventDefault();
    $(".header__search").fadeIn(250);
  });
});

$(function(){
  $(".mv__humberger").on('click', function(e){
    e.preventDefault();
    $(".header__nav").fadeIn(250);
  });
  $(".header__nav--close").on('click', function(e){
    e.preventDefault();
    $(".header__nav").fadeOut(250);
  });
});

$(function(){
  const bodyHeight = $(document).height();
  $(".side-sns").css('height', bodyHeight);
  $(".sidebar__nav>li>span").on('click', function(){
    $(this).next(".sidebar__navchild").stop().slideToggle(250);
    $(this).stop().toggleClass('open');
  });
});


$(function() {
  $('.to-top>a[href^="#"]').click(function(){
    var href = $(this).attr('href');
    var target = $(href == '#' || href === '' ? 'html' : href);
    var position = target.offset().top;
    $('html,body').animate({scrollTop : position}, 500);
    return false;
  });
});

$(".facebook").attr("href","https://www.facebook.com/sharer/sharer.php?u="+encodeURI(location.href));
$(".twitter").attr("href","https://twitter.com/intent/tweet?url="+encodeURI(location.href)+"&text="+encodeURI(document.title));