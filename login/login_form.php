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
<link rel="stylesheet" href="../common/css/common.css"> <!-- 헤더 푸터 공통으로 쓰는 -->
<link rel="stylesheet" href="css/member.css">
</head>

<body>
<div id="wrap">
  <div id="col2">
      <div class="background"><img src="../common/images/forest.jpg" alt=""></div>
       <h2><a href="../index.html"><img src="../common/images/logo.png" alt=""></a></h2>
          
     <div class="login_box" >        
        <form  name="member_form" method="post" action="login.php"> 
		       <div id="login_form">
		          
                  <ul id="login2">
		              <li>
		                  <p>LOGIN</p>
                      </li>
		              <li>
                          <label for="id" class="hidden">아이디</label>
                          <input type="text" id="id" name="id" class="login_input" placeholder="아이디" maxlength="10">
		                  
		              </li>
		              <li>
                          <label for="pass" class="hidden">비밀번호</label>
                          <input type="password" id="pass" name="pass" class="login_input" placeholder="비밀번호">
		                  
		              </li>
		              <li id="login_button">
		                  <input type="submit" value="LOGIN">
		              </li>
		              <li>
		                  <a href="../member/join.html"><span>JOIN</span></a>
		              </li>
		          </ul>
		          
		      </div>
					
		
            </form>
            
           
      </div>        
        </div>

	    
	
 
</div> 

</body>
</html>