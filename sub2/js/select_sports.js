$(document).ready(function () {
  function sports_choice(e){
  var menu = new Array("tab_1","tab_2","tab_3","tab_4"); // 객체 배열로 지정
  for(var i=0;i < menu.length;i++){
   if("sports_"+e==menu[i]){
    document.all[menu[i]].style.display="block";
   }else{
    document.all[menu[i]].style.display="none";
   }
   }
   }  
});