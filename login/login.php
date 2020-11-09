<?
   session_start();
?>
<meta charset="UTF-8">
<?
   @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
   //$id(POST) 넘어오는 값
   //$pass(POST) 넘어오는 값
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   // $id=>입력id값    $pass=>입력 pass
   
  

   if(!$id) {   //아무값도 입력되지 않았냐?
     echo("
           <script>
             window.alert('아이디를 입력하세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

   if(!$pass) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

 

   include "../lib/dbconn.php";

   $sql = "select * from member where id='$id' "; //aaa
//   $result = mysql_query($sql, $connect); //aaa -> 값이 있으면 1 없으면 NULL     
    $result = mysqli_query($conn , $sql); //aaa -> 값이 있으면 1 없으면 NULL     
//   $num_match = mysql_num_rows($result);
   $num_match = mysqli_num_rows($result);  //1 null

   if(!$num_match) //검색 레코드가 없으면 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.');
             history.go(-1);
           </script>
         ");
    }
    else    //해당 아이디가 검색되었으면..
    {
//		 $row = mysql_fetch_array($result); 
        $row = mysqli_fetch_array($result); 
          //$row[id] ,.... $row[level]
         $sql ="select * from member where id='$id'";// and pass=password('$pass')";

        //넘어온 아이디를 가져오고 넘어온 pass값을 다시 암호화 된 pass가 맞는지를 검색하는 것.
        //암호화된 패스값을 다시 원래의 패스값으로 바꿀 수 없기 대문에 원래의 패스값을 암호화된 패스값으로 변경한 후 비교해서 계산. 
//         $result = mysql_query($sql, $connect);
//         $num_match = mysql_num_rows($result);
          $result = mysqli_query($conn,$sql);
         $num_match = mysqli_num_rows($result);
    

        if(!$num_match)  //작성한 패스워드와 디비 패스워드가 같지않을때
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다.');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else    // 입력 pass 와 테이블에 저장된 pass 일치한다.
        {
           $userid = $row[id];
		   $username = $row[name];
		   $usernick = $row[nick];
		   $userlevel = $row[level];
  
            
           //세션변수에 id~level 값을 저장한다(로그인상태) / 필요한 세션변수를 생성한다.
           $_SESSION['userid'] = $userid;//$_SESSION['userid'] = $row[id];
           $_SESSION['username'] = $username;//$_SESSION['username'] = $row[name];
           $_SESSION['usernick'] = $usernick;//$_SESSION['usernick'] = $row[nick];
           $_SESSION['userlevel'] = $userlevel;//$_SESSION['userlevel'] = $row[level];

           echo("
              <script>
			    alert('로그인이 되었습니다.');
                location.href = '../index.html';
              </script>
           ");
        }
   }          
?>
