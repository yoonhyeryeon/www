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

    $('.down').click(function(){
          screenHeight = $(window).height();
          $('html,body').animate({'scrollTop':screenHeight}, 1000);
   });          
          
}); 
    
    
