create table event (
   num int not null auto_increment,
   id char(15) not null,
   name  char(10) not null,
   nick  char(10) not null,
   subject char(100) not null,
   content text not null,
   regist_day char(20),
   hit int,
   is_html char(1),
   file_name_0 char(40),
   file_name_1 char(40),
   file_name_2 char(40),
   file_name_3 char(40),
   file_name_4 char(40), 
   file_copied_0 char(30),
   file_copied_1 char(30),
   file_copied_2 char(30),
   file_copied_3 char(30),
   file_copied_4 char(30), 
   primary key(num)
);
/* file_name_0 char(40)  =>실제 업로드 되는 실제 파일의 이름

file_copied_4 char(30) => 서버에 실제로 올려져 있는 변형된 이름 (연/월/일/시/분/초/순서로 저장된 파일의 이름).

*/
