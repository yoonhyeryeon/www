$(document).ready(function () {

    
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
    

        $('.text').text(scroll);
       

        

        if(scroll>400){ 
            $('.intro_text').addClass('intro_textOn');
           
        }

        if(scroll>400){ 
            $('.intro_img').addClass('intro_imgOn');
            
        }
        
        
        
        if(scroll>550){ 
            $('.mid_text').addClass('mid_textOn');
         
        }

        if(scroll>550){ 
            $('.mid_img').addClass('mid_imgOn');
            
        }
        
        
        
        if(scroll>900){ 
            $('.bottom_text').addClass('bottom_textOn');
            
        }

        if(scroll>900){ 
            $('.bottom_img').addClass('bottom_imgOn');
           
        }
        
        if(scroll>1300){ 
            $('.content_bottom img').addClass('imgOn');
            
        }
        
        
        
    });
});