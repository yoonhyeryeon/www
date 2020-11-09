// JavaScript Document

$(document).ready(function(){
  var cnt=4;  //탭메뉴개수  *** /var cnt=$('.tabs h3 .tab').length ;=>를 사용해도 됨 한태그에 두개의 탭을 연                                            결할 수는 없음. 태그이름을 다르게하고 변수이름도 다르게 해줘야함.
                                            //->css/common에 연결해서 쓸 수 있음.
  $('.tabs .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.tabs .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.tabs .contlist:eq('+index+')').show(); ;
	  for(var i=1;i<=cnt;i++){
           $('.tab'+i).removeClass('on');
      }//모든 탭메뉴 비활성화
      $(this).addClass('on')
   });
  });
});
