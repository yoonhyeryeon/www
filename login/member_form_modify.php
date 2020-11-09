<? 
	session_start(); 

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="css/modify.css">
	
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	
	<script>
	 $(document).ready(function() {
     
        $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
        var nick = $('#nick').val();

        $.ajax({
            type: "POST",
            url: "../member/check_nick.php",
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
	
	function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
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
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysqli_query($conn , $sql);

    $row = mysqli_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close();
?>
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
              <form name="member_form" method="post" action="modify.php"> 

                 <ul class="join_box">
                    
                    <li class="id_box"><?= $row[id] ?></li>
                    
                    <li class="pass_box">
                       <label for="pass" class="hidden">비밀번호</label>
                       <input type="password" id="pass" name="pass" title="비밀번호" placeholder="비밀번호를 입력하세요." required>
                       

                    </li>
                    
                    <li class="passconfirm_box">
                    <label for="pass_confirm" hidden>비밀번호재확인</label>
                       <input type="password" id="pass_confirm" name="pass_confirm" title="비밀번호재확인" placeholder="비밀번호를 다시 입력하세요." required>
                    </li>
                    <li class="name_box"><?= $row[name] ?></li>
                    <li class="nick_box">
                        <label for="nick" class="hidden">닉네임</label>
                       <input type="text" id="nick" name="nick" value="<?= $row[nick] ?>" title="닉네임" placeholder="닉네임을 입력하세요." required>
                        <span id="loadtext2"></span>
                    </li>
                    <li class="tel_box">
                        <label for="tel" class="hidden">핸드폰번호</label>
                       <label class="hidden" for="hp1">전화번호 앞3자리</label>
                         <select name="hp1" value="<?= $hp1 ?>" id="hp1">
                             <option class="number" value="010">010</option>
                             <option class="number" value="011">011</option>
                             <option class="number" value="017">017</option>
                         </select>-
                         <label class="hidden" for="hp2">전화번호 두번째자리</label>
                         <input type="text" id="hp2" name="hp2" value="<?= $hp2 ?>" title="전화번호가운데"  maxlength="4" required>-
                         <label class="hidden" for="hp3">전화번호 마지막자리</label>
                         <input type="text" id="hp3" name="hp3" value="<?= $hp3 ?>" title="전화번호마지막"  maxlength="4" required>
                    </li>
                    <li class="email_box">
                        <label class="hidden" for="email1">이메일</label>
                        <input type="text" id="email1" value="<?= $email1 ?>" title="이메일 앞자리" name="email1" required>@
                        <label class="hidden" for="email2">이메일주소</label>
                        <input type="text" name="email2" id="email2" value="<?= $email2 ?>" title="이메일 뒷자리" required>
                    </li>
                    <li class="button_wrap">
                    <div class="button">
                         <a href="#" onclick="check_input()">OK</a>&nbsp;&nbsp;
                         <a href="#" onclick="reset_form()">RESET</a>
                     </div>
                    </li>
                 </ul>
                
         
         </form>

        </article>
    </div>
	 <? include "../common/sub_foot.html" ?>
</body>
</html>


