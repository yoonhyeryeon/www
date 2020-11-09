// JavaScript Document

   $(document).ready(function () {
         var pcnt=1;
		 
	 $('.RightBtn').click(function () {
		 pcnt++;
		 if(pcnt>3){
		    pcnt=1;
		 }
		 $('.num strong').text(pcnt);
         $('.gallery_box_container ul').first().appendTo('.gallery_box .gallery_box_container');
         });


         $('.leftBtn').click(function () {
		   pcnt--;	
		   if(pcnt<1){
		    pcnt=3;
		   }
		   $('.num strong').text(pcnt); 
           $('.gallery_box_container ul').last().prependTo('.gallery_box .gallery_box_container');  //prependTo 가장 위로 보낸다
         });
   });