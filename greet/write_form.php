<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta charset="utf-8">
    <link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
    <link href="../greet/css/greet_write_form.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
      <div id="wrap">
        <!-- 헤더 인클루드 넣는곳 -->
        <? include "../common/sub_head.html" ?>
        <!-- 메인 비주얼 영역 -->
        <div class="visual">

            <img src="../sub3/common/images/visual.jpg" alt="">

        </div>


        <div class="subnav_box">

            <div class="subNav">
                <ul>
                    <li><a class="current" id="nav1" href="../perform/list.php">공연&#8226;행사</a></li>
                    <li><a id="nav2" href="../sub3/sub3_2.html">평생교육원</a></li>
                    <li><a id="nav3" href="../sub3/sub3_3.html">문화&#8226;예술시설</a></li>
                    <li><a id="nav4" href="../sub3/sub3_4.html">조각작품갤러리</a></li>
                </ul>
            </div>


        </div>


<?
	if($mode=="modify") //수정모드일때
	{

?>
        <form class="board_form" name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
<?
	}
	else //새글쓰기모드
	{
?>
            <form class="board_form" name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">

<?
        // enctype를 쓰지 않으면 이미지가 안넘어감. 일반텍스트가 아니고 데이터가 클때 사용. 첨부/삽입 파일일때 사용. 
	}
?>
                
                
                <div class="write_wrap">
                    <div id="write_row2">
                        <div class="col1"> <span>제목</span> </div>
                        <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>"></div>
                    </div>
                    <div id="write_form">
                    <!--			<div class="write_line"></div>-->
                    <!--			<div id="write_row1"><div class="col1"> 별명 </div><div class="col2"><?=$usernick?></div>-->
                    <?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>
                   <div id="write_row3">
                     <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
                   </div> 
<?
	}
?>
                </div>
            
                    <div class="write_line"></div>
                    <div id="write_row4">
                        <div class="col1"><span> 내용 </span></div>
                        <div class="col col2"><textarea rows="25" cols="79" name="content"><?=$item_content?></textarea></div>
                        </div>
                </div>
                <div class="file_wrap">
                <div id="write_row4" class="file_box">
                    <div class="col col1"> <span>이미지파일1</span></div>
                    <div class="col2"><input type="file" name="upfile[]"></div>
                </div>
                <div class="clear"></div>
                <? 	if ($mode=="modify" && $item_file_0)
	{
?>
                    <div class="delete_ok"><?=$item_file_0?> <span>파일이 등록되어 있습니다.</span> <input type="checkbox" name="del_file[]" value="0">
                    <span class="delete_text"> 삭제</span></div>
                <div class="clear"></div>
                <?
	}
?>
               
                <div id="write_row5" class="file_box">
                    <div class="col col1"><span> 이미지파일2</span> </div>
                    <div class="col2"><input type="file" name="upfile[]"></div>
                </div>
                <? 	if ($mode=="modify" && $item_file_1)
	{
?>
                    <div class="delete_ok"><?=$item_file_1?><span> 파일이 등록되어 있습니다.</span> <input type="checkbox" name="del_file[]" value="1"><span class="delete_text"> 삭제</span></div>
                <div class="clear"></div>
                <?
	}
?>
               
                <div id="write_row6" class="file_box">
                    <div class="col col1"><span> 이미지파일3</span> </div>
                    <div class="col2"><input type="file" name="upfile[]"></div>
                </div>
                </div>
                <? 	if ($mode=="modify" && $item_file_2)
	{
?>
                <div class="delete_ok"><?=$item_file_2?><span> 파일이 등록되어 있습니다. </span><input type="checkbox" name="del_file[]" value="2">
                <span class="delete_text"> 삭제</span></div>
                <div class="clear"></div>
                <?
	}
?>
                <div class="write_line"></div>

                <div class="clear"></div>



               


            </form> 
        </form>
           <div id="write_button"><a href="#" onclick="check_input()">저장</a>&nbsp;
                    <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
                </div>

            

            <? include "../common/sub_foot.html" ?>
