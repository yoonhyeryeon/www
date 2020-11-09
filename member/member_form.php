<? 
    session_start(); 
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>회원가입</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="css/member_form.css">
	
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	
	
	
	
	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시
    var id = $('#id').val(); //aaa

    $.ajax({
        type: "POST", //get방식으로 써도 됨 아이디라서.
        url: "check_id.php", //실제 처리되는 php의 경로
        data: "id="+ id,  //?이후에 넘어가는 값=>아이디라는 매개변수에 들어가는 값 (변수에 들어간값  넘긴다.) 
        cache: false, //저장되는 값 (기록), flase는 기록을 남기지 말라는 것.
        success: function(data) //check_id안에 있는 echo문안에 있는 값을 data가 받는다.
        {
             $("#loadtext").html(data);
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
	<script>
   

  
   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<body>
     
     <!-- subhead와 subfoot 삭제 가능-> 한페이지로 만들어도 됨. 로고는 있어야함.  --> 

    <div id="wrap">
        <div class="background"><img src="../common/images/forest.jpg" alt=""></div>
        <h1>
            <a href="../index.html">
                <img src="../common/images/logo.png" alt="">
            </a>
        </h1>
            <article id="content">  

              <!-- <h2>회원가입</h2> -->
              <form name="member_form" method="post" action="insert.php"> 

                 <ul class="join_box">
                    <li class="id_box">
                       <label for="id" class="hidden" >아이디</label>
                       <input type="text" autofocus id="id" name="id" title="아이디" placeholder="아이디를 입력하세요." maxlength="10" required>
                       <span id="loadtext"></span>

                    </li>
                    <li class="pass_box">
                       <label for="pass" class="hidden">비밀번호</label>
                       <input type="password" id="pass" name="pass" title="비밀번호" placeholder="비밀번호를 입력하세요." required>
                       

                    </li>
                    
                    <li class="passconfirm_box">
                    <label for="pass_confirm" hidden>비밀번호재확인</label>
                       <input type="password" id="pass_confirm" name="pass_confirm" title="비밀번호재확인" placeholder="비밀번호를 다시 입력하세요." required>
                    </li>
                    <li class="name_box">
                        <label for="name" class="hidden">이름</label>
                       <input type="text" id="name" name="name" title="이름" placeholder="이름을 입력하세요." required>
                    </li>
                    <li class="nick_box">
                        <label for="nick" class="hidden">닉네임</label>
                       <input type="text" id="nick" name="nick" title="닉네임" placeholder="닉네임을 입력하세요." required>
                        <span id="loadtext2"></span>
                    </li>
                    <li class="tel_box">
                        <label for="tel" class="hidden">핸드폰번호</label>
                       <label class="hidden" for="hp1">전화번호 앞3자리</label>
                         <select name="hp1" id="hp1">
                             <option class="number" value="010">010</option>
                             <option class="number" value="011">011</option>
                             <option class="number" value="017">017</option>
                         </select>-
                         <label class="hidden" for="hp2">전화번호 두번째자리</label>
                         <input type="text" id="hp2" name="hp2" title="전화번호가운데"  maxlength="4" required>-
                         <label class="hidden" for="hp3">전화번호 마지막자리</label>
                         <input type="text" id="hp3" name="hp3" title="전화번호마지막"  maxlength="4" required>
                    </li>
                    <li class="email_box">
                        <label class="hidden" for="email1">이메일</label>
                        <input type="text" id="email1" title="이메일 앞자리" name="email1" required>@
                        <label class="hidden" for="email2">이메일주소</label>
                        <input type="text" name="email2" id="email2" title="이메일 뒷자리" required>
                    </li>
                    <li class="button_wrap">
                    <div class="button">
                         <a href="#" onclick="check_input()">JOIN</a>&nbsp;&nbsp;
                         <a href="#" onclick="reset_form()">RESET</a>
                     </div>
                    </li>
                 </ul>
         
         </form>

        </article>
    </div>
	 <? include "../common/sub_foot.html" ?>



