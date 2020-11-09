// JavaScript Document
 $(document).ready(function() {
   var position=0;  //최초위치(목적지)
   var movesize=$('.slide_gallery li').width(); //이미지 하나의 너비
 //  var timeonoff;
   
    $('.slide_gallery ul').after($('.slide_gallery ul').clone());
       //슬라이드 겔러리를 한번 복제

   $('.button').click(function(event){
	var $target=$(event.target); //클릭한 해당버튼 
	clearInterval(timeonoff);
	
	if($target.is('.m1')){ //왼쪽버튼을 클릭?
	     if(position==-1000){
	         $('.slide_gallery').css('left',0);
	          position=0;
	      }
		
	     position-=movesize;  // 150씩 감소
    	     $('.slide_gallery').stop().animate({left:position}, 'fast',
		  function(){							
		    if(position==-1000){
			   $('.slide_gallery').css('left',0);
			   position=0;
		    }
	      });
	}else if($target.is('.m2')){ //오른쪽 버튼을 클릭?
        
        
	      if(position==0){
	           $('.slide_gallery').css('left',-1000);
	                 position=-1000;
                   }

          position+=movesize; // 150씩 증가
    	  $('.slide_gallery').stop().animate({left:position}, 'fast',
		  function(){							
		    if(position==0){
			   $('.slide_gallery').css('left',-1000);
			   position=-1000;
		    }
	       });
	  }
   });
   
   //최초 자동 슬라이드 기능
    timeonoff= setInterval(function () {
        position-=movesize;
    	$('.slide_gallery').stop().animate({left:position}, 'fast',
	         function(){							
		    if(position==-1000){
			   $('.slide_gallery').css('left',0);
			   position=0;
		    }
	 });
     }, 2000);
   
 });

