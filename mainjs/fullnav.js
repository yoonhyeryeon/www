// JavaScript Document

$(document).ready(function() {
    $('.park_perform .btn_left').hide();
    
    $('.park_perform .btn_right').on('click', function(){
          $('.calendar_bottom').stop().animate({left:[0]},1000);
          $('.calendar_bottom').css('background','rgba(255,255,255,.9)')
          $(this).hide();
          $('.park_perform .btn_left').fadeIn();
        
         
          
    });
     
    $('.park_perform .btn_left').on('click',function(){
          $('.calendar_bottom').stop().animate({left:[-750]},1000);
          $('.calendar_bottom').css('background','rgba(255,255,255,.5)');
          $('.park_perform .btn_right').fadeIn();
          $('.park_perform .btn_left').hide();
        
          
        });
    });    
    

         