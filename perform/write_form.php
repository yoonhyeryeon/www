<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table='concert'
    //수정 => $table='concert' $mode=modify  $num=1  $page=1


	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysqli_query($conn , $sql);

		$row = mysqli_fetch_array($result);       
	
		$item_subject  = $row[subject];
		$item_content  = $row[content];
        
        $item_period = $row[period];
        $hour = $row[hours];
        $place = $row[palce];
        $age = $row[age];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta charset="utf-8">
    <link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/perform_write.css" rel="stylesheet" type="text/css" media="all">
    <script>
        function check_input() {
            if (!document.board_form.subject.value) {
                alert("제목을 입력하세요!");
                document.board_form.subject.focus();
                return;
            }

            if (!document.board_form.content.value) {
                alert("내용을 입력하세요!");
                document.board_form.content.focus();
                return;
            }
            if (!document.board_form.period.value) {
                alert("기간을 입력하세요!");
                document.board_form.period.focus();
                return;
            }
            if (!document.board_form.hour.value) {
                alert("시간을 입력하세요!");
                document.board_form.hour.focus();
                return;
            }
            if (!document.board_form.place.value) {
                alert("장소를 입력하세요!");
                document.board_form.place.focus();
                return;
            }
            if (!document.board_form.age.value) {
                alert("관람연령을 입력하세요!");
                document.board_form.age.focus();
                return;
            }

            document.board_form.submit();

        }

    </script>
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
                        <div class="col col2"><textarea rows="15" cols="79" name="content" placeholder="상세정보입력"><?=$item_content?></textarea></div>

                        <div class="col col3"><textarea rows="2" cols="79" name="period" placeholder="기간"><?=$item_period?></textarea></div>
                        <div class="col col4"><textarea rows="2" cols="79" name="hour" placeholder="시간입력"><?=$hour?></textarea></div>
                        <div class="col col5"><textarea rows="2" cols="79" name="place" placeholder="장소"><?=$place?></textarea></div>

                        <div class="col col6"><textarea rows="2" cols="79" name="age" placeholder="관람연령"><?=$age?></textarea></div>
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
