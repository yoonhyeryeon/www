$(document).ready(function () {

    $(window).on('scroll', function () {
         var scroll = $(window).scrollTop();
       
         console.log(scroll);

         
         if (scroll > 700) {
             $('#content .about .about_back').css('background', 'rgba(0,0,0,.6)').css('transition', '1s');
         } else {

             $('#content .about .about_back').css('background', 'rgba(0,0,0,0)').css('transition', '1s');
         }


        

     });
    
    
    // toTop script
      $(window).on("scroll",function(){
        //�꾩옱 �ㅽ겕濡ㅻ컮�� top媛�
        var scrollTops = $(this).scrollTop();
        //    0  = �ㅽ겕濡ㅻ컮 �꾩튂媛� +     �덈룄�� �믪씠媛�    -   �명꽣 top �꾩튂
        var view = scrollTops + $(window).height() - $("footer").offset().top;
        // foot �몄텧�섎㈃ view�� �묒닔 
        if(view > 0){
            $(".toTop").addClass('toTopAni').fadeIn();
        }else{
            $(".toTop").removeClass('toTopAni').fadeOut();
        }
   
        $(".toTop").click(function(e){
            e.preventDefault();
            $("html, body").stop().animate({"scrollTop": 0},1000);
       });
     }); 
    
    //hover
    
     function init() {
		var speed = 330,
			easing = mina.backout;

            [].slice.call ( document.querySelectorAll( '#grid a' ) ).forEach( function( el ) {
                var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
                    pathConfig = {
                        from : path.attr( 'd' ),
                        to : el.getAttribute( 'data-path-hover' )
                    };

                el.addEventListener( 'mouseenter', function() {
                    path.animate( { 'path' : pathConfig.to }, speed, easing );
                } );

                el.addEventListener( 'mouseleave', function() {
                    path.animate( { 'path' : pathConfig.from }, speed, easing );
                } );
            } );
        }
	init();
    
    //gnb
    
    
    $(".menuOpen").toggle(function() {
	 $("#gnb").slideDown('slow');
    }, function() {
	 $("#gnb").slideUp('fast');
    });
    
    var current=0;
    $(window).resize(function(){  //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    var screenSize = $(window).width();
    if( screenSize > 768 ){   // 팝업메뉴로 바뀌는 해상도 640-17(스크롤의너비)=623
    current=1;
    $("#gnb").show();
    }
    if(current==1 && screenSize < 768 ){
    $("#gnb").hide();
    current=0;
    }
});

    
    
    
//------------------------------------------------
 });