
  $(document).ready(function(){
	  $('.boxgrid').hover(function(){
		  $(".boxcaption", this).stop().animate({top:70},500);
	  }, function() {
		  $(".boxcaption", this).stop().animate({top:200},500);
	  });
  });

		