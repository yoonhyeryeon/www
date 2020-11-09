 $(document).ready(function () {
        
        $('.navBox ul li:eq(0)').find('a').addClass('spy');
        //첫번째 서브메뉴 활성화
        
         
       
      
        
        
        //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
            
            
            //sicky메뉴를 처리한 if문
            if(scroll>355){ 
                 
                   
                   $('.navBox').addClass('navOn');
                   $('header').hide();
                  
            }else{
                
                $('.navBox').removeClass('navOn');
                $('header').show();
            }
            
            $('.navBox ul li').find('a').removeClass('spy');
              
           
            
            
            
            
            if(scroll>=0 && scroll<1900){
                $('.navBox ul li:eq(0)').find('a').addClass('spy');
                
            }else if(scroll>=1900 && scroll<2600){
               $('.navBox ul li:eq(1)').find('a').addClass('spy');
                
            }else if(scroll>=2600 && scroll<3450){
                $('.navBox ul li:eq(2)').find('a').addClass('spy');
                
                
            }else if(scroll>=3450){
                $('.navBox ul li:eq(3)').find('a').addClass('spy');
                
            }
            
            //스크롤의 거리의 범위를 처리  //50% 70%정도로 많이 잡지만  마음대로~ 
            
            /*  if(scroll>=0 && scroll<500){
                $('.subNav li:eq(0)').find('a').addClass('spy');
                //첫번째 서브메뉴 활성화
                
                $('#content div:eq(0)').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }else if(scroll>=500 && scroll<1100){
                $('.subNav li:eq(1)').find('a').addClass('spy');
                //두번째 서브메뉴 활성화
                
                 $('#content div:eq(1)').addClass('boxMove');
            }else if(scroll>=1100 && scroll<1500){
                $('.subNav li:eq(2)').find('a').addClass('spy');
                //세번째 서브메뉴 활성화
                
                 $('#content div:eq(2)').addClass('boxMove');
            }else if(scroll>=1500){
                $('.subNav li:eq(3)').find('a').addClass('spy');
                //네번째 서브메뉴 활성화
                
                 $('#content div:eq(3)').addClass('boxMove');*/
            });  
            


 $('.subBox ul li a').click(function(){
           var value=0;
            
            if($(this).hasClass('link1')){
                value=1000;
            }else if($(this).hasClass('link2')){
                value=2000;
            }else if($(this).hasClass('link3')){
                value=2720;
            }else if($(this).hasClass('link4')){
                value=3580;
            }
     
            $("html,body").stop().animate({"scrollTop":value},400);
        });
});


    