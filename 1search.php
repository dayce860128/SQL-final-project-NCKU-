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
<p>交換學校ID	：
<input type ="text" name="search"/>
</p>
<input type= "submit" value="GO"/>
<a href="1.php">----回交換學校資料</a>
</p>
</form>

<?php
$datal = mysqli_query($db_link, "SELECT * FROM 交換學校基本資料表 WHERE 1");
$r = array(
  '','','','','',''
  );
if (isset($_POST['search']))
{
  if($_POST['search']!='')
  {
    $temp = $_POST['search'];
    $datal = mysqli_query($db_link,"SELECT * FROM 交換學校基本資料表 where 交換學校ID like '%$temp%'");
    $r=mysqli_fetch_row($datal);

   }
 else
 {
    echo '請輸入搜尋內容' ;
 }

}
 ?>
 
 <table width="900" border="1">
  <tr>
   <td><?php echo $r[0]?></td>
   <td><?php echo $r[1]?></td>
   <td><?php echo $r[2]?></td>
   <td><?php echo $r[3]?></td>
   <td><?php echo $r[4]?></td>
   <td><?php echo $r[5]?></td>
   
  </tr>
</table>