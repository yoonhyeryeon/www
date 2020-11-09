<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysqli_query($conn , $sql);

    $row = mysqli_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysqli_query($conn,$sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta charset="utf-8">
    <link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
    <link href="../css/greet.css" rel="stylesheet" type="text/css" media="all">
    <script>
        function del(href) {
            if (confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
            }
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

        <article id="content">
            <div class="title_area">
                <div class="lineMap">
                    <span>HOME</span>&gt;고객센터&gt;<strong>공원소식</strong>
                </div>
                <h2>공원소식</h2>

            </div>



            <div id="view_comment"> &nbsp;</div>

            <div id="view_title">

                <ul id="view_title1">
                   <li><?= $item_subject ?></li>
                    <li><?= $item_nick ?></li>
                    <li>조회 :<?= $item_hit ?></li>
                    <li> <?= $item_date ?></li>
                </ul>
                
            </div>

            <div id="view_content">

                <ul class="view_list">
                    <li>

<?
                
    
                    
	for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name; 
             // ./data/2019_03_22_10_07_15_0.jpg
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>"; //이미지사이의 간격 <br>
		}
	}
            
?>
                    </li>
                    <li><?=$item_content?></li>
                    
                </ul>
                <!--                <div><?=$item_content?></div>-->
                
                
            <div id="view_button">
                <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
                <? 
	if($userid==$item_id || $userid=="yhr" || $userlevel==1 )
	{
?>
                <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
                <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">지우기</a>&nbsp;
                <?
	}
?>
                <? 
	if($userid)
	{
?>
                <a href="write_form.php?table=<?=$table?>">글쓰기</a>
                <?
	}
?>
            </div>

            <div class="clear"></div>
            </div>
        </article>
    </div>


    <? include "../common/sub_foot.html" ?>
