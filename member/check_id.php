﻿<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);
  
    if(!$id) 
   {
      echo("아이디를 입력하세요.");
   }
   else
   {
      include "../lib/dbconn.php";
 
      $sql = "select * from member where id='$id' ";

       //$result = mysql_query($sql, $connection);
      $result = mysqli_query($conn , $sql);
      //$num_record = mysql_num_rows($result);
       $num_record = mysqli_num_rows($result);


     
      if ($num_record)
      {
       
         echo "<span style='color:red'>다른 아이디를 사용하세요.</span>";
      }
      else
      {
         echo "<span style='color:green'>사용가능한 아이디입니다.</span>";
      }
    
 
      //mysql_close();
       mysqli_close();
   }

?>

