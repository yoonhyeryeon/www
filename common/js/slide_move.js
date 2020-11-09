    $(document).ready(function () {
//              var th=$('headerArea').height() + 헤더가 비쥬얼을 덮고 있으니까 비쥬얼의 높이만 쓰면됨. 서브는 다르다.
                   $('visual').height(1200);
              $('.topMove').hide();
           
             $(window).on('scroll',function(){  //스크롤의 거리가 발생되면
                  var scroll = $(window).scrollTop();
                 //스크롤이 움직이며 ㄴ그해당 스크롤탑의 값이 저장된다.
                 
//                  $('.text').text(scroll);
                  if(scroll>500){
                      $('.topMove').fadeIn('slow');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
             });
           
              $('.topMove').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });
           /*   $('.slideMenu a').click(function(){   //필요없으면 짤라라
                  var value=0;
                  if($(this).hasClass('link1')){
                     value= $('.content section:eq(0)').offset().top;   
                  }else if($(this).hasClass('link2')){
                     value= $('.content section:eq(1)').offset().top; 
                  }else if($(this).hasClass('link3')){
                     value= $('.content section:eq(2)').offset().top; 
                  }else if($(this).hasClass('link4')){
                     value= $('.content section:eq(3)').offset().top; 
                  }
                  
                $("html,body").stop().animate({"scrollTop":value},1000);
              });*/
       });