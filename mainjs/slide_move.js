    $(document).ready(function () {
//              var th=$('headerArea').height() + 헤더가 비쥬얼을 덮고 있으니까 비쥬얼의 높이만 쓰면됨. 서브는 다르다.
                   $('visual').height(1200);
              $('.topMove').hide();
           
             $(window).on('scroll',function(){  //스크롤의 거리가 발생되면
                  var scroll = $(window).scrollTop();
                 //스크롤이 움직이며 ㄴ그해당 스크롤탑의 값이 저장된다.
                 
//                  $('.text').text(scroll);
                  if(scroll>800){
                      $('.topMove').fadeIn('slow');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
             });
           
              $('.topMove').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });
          
       });