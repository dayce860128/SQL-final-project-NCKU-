<?php
$db_host = "localhost";
$db_name = "exchangestudent";
$db_user = "exchangestudent";
$db_passwd = "1234";

$db_link = @new mysqli($db_host, $db_user, $db_passwd, $db_name);
if($db_link->connect_error !=""){
  echo "資料庫連結失敗";
}else{
$db_link->query("SET NAMES 'utf8'");
}
?>
 

<?php
include("connect.php");?>

<form method ="post">
<p>SHOW EXIST GPA > 4.0
</p>
<input type= "submit" name ='gobtn2' value="GO"/>
</p>
</form>
<?php
$datal = mysqli_query($db_link, "SELECT * FROM 交換學生基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['gobtn2']))
{
  $datal = mysqli_query($db_link,"SELECT * FROM 交換學生基本資料表 where exists (SELECT * FROM 交換學校基本資料表 WHERE 交換學校基本資料表.交換學校ID = 交換學生基本資料表.交換學校ID and  GPA > 4.0)");

  while($row = mysqli_fetch_assoc($datal)) {
    echo "學生姓名 : ". $row["學生姓名"] ."&nbsp;&nbsp;";
    echo "性別 : ". $row["性別"] ."&nbsp;&nbsp;";
    echo "學號 : ". $row["學號"] ."&nbsp;&nbsp;";
    echo "系級 : ". $row["系級"] ."&nbsp;&nbsp;";
    echo "學生聯絡電話 : ". $row["學生聯絡電話"] ."&nbsp;&nbsp;";
    echo "GPA : ". $row["GPA"] ."&nbsp;&nbsp;";
    echo "交換學校ID : ". $row["交換學校ID"] ."&nbsp;&nbsp;";
    echo "狀態 : ". $row["狀態"] ."&nbsp;&nbsp;";
    echo "緊急聯絡人 : ". $row["緊急聯絡人"] ."  <br>";

      }

}
 ?>


<?php
include("connect.php");?>

<form method ="post">
<p>SHOW NOT EXIST GPA > 4.0
</p>
<input type= "submit" name ='gobtn' value="GO"/><br>
</p>
<a href="table.php">----回主畫面</a>
</form>
<?php
$data2 = mysqli_query($db_link, "SELECT * FROM 交換學生基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['gobtn']))
{
  $data2 = mysqli_query($db_link,"SELECT * FROM 交換學生基本資料表 where not exists (SELECT * FROM 交換學校基本資料表 WHERE 交換學校基本資料表.交換學校ID = 交換學生基本資料表.交換學校ID and  GPA > 4.0)");

  while($row = mysqli_fetch_assoc($data2)) {
    echo "學生姓名 : ". $row["學生姓名"] ."&nbsp;&nbsp;";
    echo "性別 : ". $row["性別"] ."&nbsp;&nbsp;";
    echo "學號 : ". $row["學號"] ."&nbsp;&nbsp;";
    echo "系級 : ". $row["系級"] ."&nbsp;&nbsp;";
    echo "學生聯絡電話 : ". $row["學生聯絡電話"] ."&nbsp;&nbsp;";
    echo "GPA : ". $row["GPA"] ."&nbsp;&nbsp;";
    echo "交換學校ID : ". $row["交換學校ID"] ."&nbsp;&nbsp;";
    echo "狀態 : ". $row["狀態"] ."&nbsp;&nbsp;";
    echo "緊急聯絡人 : ". $row["緊急聯絡人"] ."  <br>";

      }


}
 ?>