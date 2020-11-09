$(document).ready(function() {
   

    $('ul.dropdownmenu').hover(
        function() { 
            $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();});
	       $('#headerArea').animate({height:350},'fast').clearQueue();
                 },
        function() {
	    
	      $('ul.dropdownmenu li.menu ul').fadeOut('fast');
          $('#headerArea').animate({height:120},'fast').clearQueue();
    });
           /*   
            $('ul.dropdownmenu li.menu').hover(
            function() { 
	         $('a.depth1', this).animate({top:-22},'fast').clearQueue();
                 },
            function() {
	        $('a.depth1', this).animate({top:0},'fast').clearQueue();
        });*/
       //tab키처리
         $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
                $('ul.dropdownmenu li.menu ul').slideDown('fast');
                $('#headerArea').animate({height:350},'fast').clearQueue();  
          });

         $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
                  $('ul.dropdownmenu li.menu ul').slideUp('fast');
                 $('#headerArea').animate({height:120},'fast').clearQueue();
         });
      
      
      //스크롤 헤더 처리
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다

            
            if(scroll>335){ 
                $('#headerArea').css('background','#fff');
                $('#headerArea').css('border-bottom','4px solid #becd2d');
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            }else{
               $('#headerArea').css('background','rgba(255,255,255, .9)');
                $('#headerArea').css('border-bottom','none');
                //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
            }
            
        });
       
});

