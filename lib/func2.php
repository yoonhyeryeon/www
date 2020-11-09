   
  <?
   
   
   function latest_article($table, $loop, $char_limit, $char_limit2) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysqli_query($conn , $sql);

		while ($row = mysqli_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];
            $len_content = mb_strlen($row[content], 'utf-8');
            $content = $row[content];

			if ($len_subject > $char_limit)
			{
				$subject = str_replace( "&#039;", "'", $subject);               
                $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
                $content = str_replace( "&#039;", "'", $content);
                $content = mb_substr($content, 0, $char_limit2, 'utf-8');
                $content = $content."...";
			}
            
            if ($len_content > $char_limit2)
			{
               $content = str_replace( "&#039;", "'", $content);
                $content = mb_substr($content, 0, $char_limit2, 'utf-8');
                $content = $content."...";  
            }
			$regist_day = substr($row[regist_day], 0, 7);
            $regist_date = substr($row[regist_day], 8,2 );

             //목록 이미지 경로 불러오기
			$img_name = $row[file_copied_0]; //첨부된 첫번째 날짜로 되어 있는, 실제 업로드된 파일명
             //2020_10_12_13_15_49_0.jpg
			
            
                
            if($img_name){ //삽입된 첫번째 이미지가 있으면 
				$img_name = "./$table/data/".$img_name;
			}else{
				$img_name = "./$table/data/default.jpg"; 
			}
           
                
            echo " 
                
                    <li class='content1'>
                           <span class='year'>$regist_day<span class='date'>$regist_date</span></span>
                          <a class='effect_border' href='./$table/view.php?table=$table&num=$num'><img
                           src='$img_name'></a>

                           <a href='./$table/view.php?table=$table&num=$num'>   
                                <dl>
                                   <dt>$subject</dt>
                                   <dd>$content</dd>
                                </dl> 

                            </a>
                    </li>
                  
            ";
            
          
            
            
            
            
           
		  }
        
		mysqli_close();
   }

          
                                /*  
                        <ul>
                          <li class='content1'>
                               <span class='year'>2020.5. <span class='date'>30</span></span>
                              <a href='./$table/view.php?table=$table&num=$num'><img
                               src='$img_name'></a>

                               <a href='./$table/view.php?table=$table&num=$num'>   
                                    <dl>
                                       <dt>$subject</dt>
                                       <dd>$content</dd>
                                    </dl> 
                                    
                                </a>
                           </li>
                          <li class='content2'>
                               <span class='year'>2020.5. <span class='date'>30</span></span>
                              <a href='./$table/view.php?table=$table&num=$num'><img
                               src='$img_name'></a>

                               <a href='./$table/view.php?table=$table&num=$num'>   
                                    <dl>
                                       <dt>$subject</dt>
                                       <dd>$content</dd>
                                    </dl> 
                                    
                                </a>
                           </li>
                           <li class='content3'>
                               <span class='year'>2020.5. <span class='date'>30</span></span>
                              <a href='./$table/view.php?table=$table&num=$num'><img
                               src='$img_name'></a>

                               <a href='./$table/view.php?table=$table&num=$num'>   
                                    <dl>
                                      <dt>$subject</dt>
                                       <dd>$content</dd>
                                    </dl> 
                                    
                                </a>
                           </li>
                         </ul> */                        
                         
?>