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
<p>不想去的國家	：
<input type ="text" name="searchnotin"/>
</p>
<input type= "submit" value="GO"/>
</p>
</form>
<?php
$datal = mysqli_query($db_link, "SELECT * FROM 交換學校基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['searchnotin']))
{
  if($_POST['searchnotin']!='')
  {
    $temp = $_POST['searchnotin'];
    
    $datal = mysqli_query($db_link,"SELECT * FROM 交換學校基本資料表 where 所在國家 NOT IN ('$temp')");

    while($row = mysqli_fetch_assoc($datal)) {
        echo "交換學校ID : ". $row["交換學校ID"] ."  ";
        echo '<br>';
        echo "校名 : ". $row["校名"] ."  ";
        echo '<br>';
        echo "所在國家 : ". $row["所在國家"] ."  ";
        echo '<br>';
        echo "承辦人 : ". $row["承辦人"] ."  ";
        echo '<br>';        
        echo "承辦人電話 : ". $row["承辦人電話"] ."  ";
        echo '<br>';        
        echo "學校地址 : ". $row["學校地址"] ."<br><br>";

      }


   }
 else
 {
    echo '請輸入搜尋內容' ;
 }

}
 ?>
 
<?php
include("connect.php");?>

<form method ="post">
<p>想去的國家	：
<input type ="text" name="searchin"/>
</p>
<input type= "submit" value="GO"/><br>
</p>
<a href="table.php">----回主畫面</a>
</form>
<?php
$data2 = mysqli_query($db_link, "SELECT * FROM 交換學校基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['searchin']))
{
  if($_POST['searchin']!='')
  {
    $temp = $_POST['searchin'];
    
    $data2 = mysqli_query($db_link,"SELECT * FROM 交換學校基本資料表 where 所在國家 IN ('$temp')");

    while($row = mysqli_fetch_assoc($data2)) {
        echo "交換學校ID : ". $row["交換學校ID"] ."  ";
        echo '<br>';
        echo "校名 : ". $row["校名"] ."  ";
        echo '<br>';
        echo "所在國家 : ". $row["所在國家"] ."  ";
        echo '<br>';
        echo "承辦人 : ". $row["承辦人"] ."  ";
        echo '<br>';
        echo "承辦人電話 : ". $row["承辦人電話"] ."  ";
        echo '<br>';
        echo "學校地址 : ". $row["學校地址"] ."<br><br>";

      }


   }
 else
 {
    echo '請輸入搜尋內容' ;
 }

}
 ?>
