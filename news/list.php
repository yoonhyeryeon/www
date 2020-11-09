<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "news"; // 해당 게시판의 테이블명
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="css/news.css" rel="stylesheet">
</head>
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysqli_query($conn , $sql);

	$total_record = mysqli_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>

<body>
    <div id="wrap">
        <!-- 헤더 인클루드 넣는곳 -->
        <? include "../common/sub_head.html" ?>
        <!-- 메인 비주얼 영역 -->
        <div class="visual">

            <img src="../sub6/common/images/main.jpg" alt="">

        </div>
        <!-- 서브네비영역 -->
        <div class="subnav_box">

            <div class="subNav">
                <ul>
                    <li><a id="nav1" href="../event/list.php">고객의소리</a></li>
                    <li><a class="current" id="nav2" href="../news/list.php">공원소식</a></li>
                    <li><a id="nav3" href="../sub6/sub6_3.html">홍보영상</a></li>
                    <li><a id="nav4" href="../sub6/sub6_4.html">오시는길</a></li>

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

            <div id="col2">

                <form name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search">
                    <div>
                        <ul class="list_search">
                            <!--                <li class="list_total">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.</li>-->
                            <li>
                                <select name="scale" onchange="location.href='list.php?scale='+this.value">
                                    <option value=''>보기</option>
                                    <option value='5'>5</option>
                                    <option value='10'>10</option>
                                    <option value='15'>15</option>
                                    <option value='20'>20</option>
                                </select>
                            </li>
                            <li>
                                <p>SELECT</p>
                            </li>
                            <li>
                                <select name="find">
                                    <option value='subject'>제목</option>
                                    <option value='content'>내용</option>
                                    <!--                    <option value='nick'>별명</option>-->
                                    <!--                    <option value='name'>이름</option>-->
                                </select>
                            </li>
                            <li>
                                <label for="search" class="hidden">검색</label>
                                <input type="text" autofocus id="search" name="search" placeholder="search">
                            </li>
                            <li>
                                <label for="search_button" class="hidden">검색버튼</label>
                                <input type="submit" id="search_button" name="search_button" value="검색">
                            </li>
                        </ul>
                    </div>
                </form>



                <div class="clear"></div>

                <!--		<div id="list_top_title">
			<ul class="list_title">
				<li id="list_title1">번호</li>
				<li id="list_title2">제목</li>
				<li id="list_title3">작성자</li>
				<li id="list_title4">날짜</li>
				<li id="list_title5">조회</li>
			</ul>		
		</div>-->

                <div id="list_content">
                    <?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysqli_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysqli_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
      $item_content = str_replace(" ", "&nbsp;", $row[content]);
        
      if($row[file_copied_0]){ //첫번째 첨부이미지가 있으면
        $item_img = './data/'.$row[file_copied_0];  //./data/2020_10_12_10_40_51_0.jpg
      }else{ //첨부된 이미지가 없으면
        $item_img = './data/default.jpg'  ;
      }
      
?>
                    <ul id="list_item">
                        <li>
                            <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                                <?= $item_subject ?>
                            </a>
                        </li>
                        <li>
                            <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                                <img src="<?=$item_img?>">
                            </a>
                        </li><!-- width 와 height css에 써라 -->
                        <li>
                            <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                                <?= $item_content ?>
                            </a>
                        </li>
                        <li><?= $item_date ?></li>
                        <!--				<li><?= $item_hit ?></li>-->
                        <!--				<li><?= $item_nick ?></li>-->
                        <!--				<li class="number"><?= $number ?></li>-->
                    </ul>
                    <?
   	   $number--;
   }
?>
                    <div id="page_button">
                        <div id="page_num"> ◀ &nbsp;&nbsp;&nbsp;&nbsp;
                            <?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
            
          if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
          }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
            
          
		}      
   }
?>
                            &nbsp;&nbsp;&nbsp;&nbsp; ▶
                        </div>
                        </div>
                        <div id="button">
                            <a class="list" href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
                            <? 
	if($userid=='yhr')//관리자의 아이디를 넣어서 관리자만 수정삭제글쓰기가 되도록한다. ($userid=='관리자의아이디')
	{
?>
                            <a class="write" href="write_form.php?table=<?=$table?>">글쓰기</a>
                            <?
	}
?>
                        </div>
                     <!-- end of page_button -->
                </div> <!-- end of list content -->
                <div class="clear"></div>

            </div> <!-- end of col2 -->

        </article>



        <? include "../common/sub_foot.html" ?>
