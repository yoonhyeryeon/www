 $(document).ready(function () {	
       
	  $('.tooltip_btn:eq(0)').hover(function(){ 
		  $('.tooltip:eq(0)').animate({left:620, top:110, opacity:1},'slow').clearQueue();
	  },function(){ 	  						 
		  $('.tooltip:eq(0)').animate({left:600,top:110 , opacity:0},'fast');
	  });
       
       $('.tooltip_btn:eq(1)').hover(function(){ 
		  $('.tooltip:eq(1)').animate({right:100, top:215, opacity:1},'slow').clearQueue();
	  },function(){ 	  						 
		  $('.tooltip:eq(1)').animate({right:-300,top:215 , opacity:0},'fast');
	  }); 
       
       $('.tooltip_btn:eq(2)').hover(function(){ 
		  $('.tooltip:eq(2)').animate({right:80, top:400, opacity:1},'slow').clearQueue();
	  },function(){ 	  						 
		  $('.tooltip:eq(2)').animate({right:-300,top: 400 , opacity:0},'fast');
	  }); 
       
       $('.tooltip_btn:eq(3)').hover(function(){ 
		  $('.tooltip:eq(3)').animate({left:410, top:400, opacity:1},'slow').clearQueue();
	  },function(){ 	  						 
		  $('.tooltip:eq(3)').animate({left:300,top:400,opacity:0},'fast');
	  });    
       
   });