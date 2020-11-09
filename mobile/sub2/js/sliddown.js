$(document).ready(function(){
  $(".menu_depth .gumdo a").click(function(){
    
    $('.answer').eq(0).slideToggle("slow");
   
  });
  $(".menu_depth .golf a").click(function(){
    $('.answer').eq(1).slideToggle("slow");
  });
  $(".menu_depth .basketball a").click(function(){
    $('.answer').eq(2).slideToggle("slow");
  });  
  $(".menu_depth .billards a").click(function(){
    $('.answer').eq(3).slideToggle("slow");
  });   

});