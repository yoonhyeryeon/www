$(document).ready(function(){
  $(".menu_depth .walk a,arrow").click(function(){
    
    $('.answer').eq(0).slideToggle("slow");
   
  });
  $(".menu_depth .incar a,arrow").click(function(){
    $('.answer').eq(1).slideToggle("slow");
  });
  $(".menu_depth .outcar a,arrow").click(function(){
    $('.answer').eq(2).slideToggle("slow");
  });      

});


