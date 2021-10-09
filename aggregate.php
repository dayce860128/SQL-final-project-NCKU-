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

<!--COUNT-->
<?php
include("connect.php");?>
<form method ="post">
<p>學生中男生和女生的個數
</p>
<input type= "submit" name ='gobtn5' value="COUNT"/>
</p>
</form>
<?php
$data5 = mysqli_query($db_link, "SELECT * FROM 交換學生基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['gobtn5']))
{
  $data5g = mysqli_query($db_link,"SELECT COUNT(性別) AS value_b  FROM 交換學生基本資料表 WHERE 性別 = '男'"); 
  $data5b = mysqli_query($db_link,"SELECT COUNT(性別) AS value_g  FROM 交換學生基本資料表 WHERE 性別 = '女'"); 
  while($row = mysqli_fetch_assoc($data5g)) {
    echo "男生人數 : ". $row["value_b"] ."&nbsp;&nbsp; <br>";
      }
  while($row = mysqli_fetch_assoc($data5b)) {
        echo "女生人數 : ". $row["value_g"] ."&nbsp;&nbsp;";
          }

}
 ?>

<!--SUM-->
<?php
include("connect.php");?>

<form method ="post"><br><br>
<p>所有交換生GPA加總
</p>
<input type= "submit" name ='gobtn' value="SUM"/>
</p>
</form>
<?php
$datal = mysqli_query($db_link, "SELECT * FROM 交換學生基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['gobtn']))
{
  $datal = mysqli_query($db_link,"SELECT SUM(GPA) AS value_sum FROM 交換學生基本資料表"); 

  while($row = mysqli_fetch_assoc($datal)) {
    echo "GPA加總 : ". $row["value_sum"] ."&nbsp;&nbsp;";

      }

}
 ?>

<!--MAX-->
<?php
include("connect.php");?>

<form method ="post"><br><br>
<p>最高的學生GPA
</p>
<input type= "submit" name ='gobtn3' value="MAX"/>
</p>
</form>
<?php
$data3 = mysqli_query($db_link, "SELECT * FROM 交換學生基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['gobtn3']))
{
  $data3 = mysqli_query($db_link,"SELECT MAX(GPA) AS value_sum FROM 交換學生基本資料表"); 

  while($row = mysqli_fetch_assoc($data3)) {
    echo "學生GPA最高 : ". $row["value_sum"] ."&nbsp;&nbsp;";

      }

}
 ?>

<!--MIN-->
<?php
include("connect.php");?>
<form method ="post"><br><br>
<p>最低的學生GPA
</p>
<input type= "submit" name ='gobtn4' value="MIN"/>
</p>
</form>
<?php
$data4 = mysqli_query($db_link, "SELECT * FROM 交換學生基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['gobtn4']))
{
  $data4 = mysqli_query($db_link,"SELECT MIN(GPA) AS value_sum FROM 交換學生基本資料表"); 

  while($row = mysqli_fetch_assoc($data4)) {
    echo "學生GPA最低 : ". $row["value_sum"] ."&nbsp;&nbsp;";

      }

}
 ?>

<!--AVG-->
<?php
include("connect.php");?>

<form method ="post"><br><br>
<p>所有交換生GPA平均
</p>
<input type= "submit" name ='gobtn2' value="AVG"/>
</p>
</form>
<?php
$data2 = mysqli_query($db_link, "SELECT * FROM 交換學生基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['gobtn2']))
{
  $data2 = mysqli_query($db_link,"SELECT AVG(GPA) AS value_sum FROM 交換學生基本資料表"); 

  while($row = mysqli_fetch_assoc($data2)) {
    echo "GPA平均 : ". $row["value_sum"] ."&nbsp;&nbsp;";

      }

}
 ?>

<!--HAVING-->
<?php
include("connect.php");?>

<form method ="post"><br><br>
<p>學生GPA平均大於四，或者小於等於四的學校
</p>
<input type= "submit" name ='gobtn6' value="HAVING"/><br><br>
</p>
<a href="table.php">----回主畫面</a>
</form>
<?php
$datal = mysqli_query($db_link, "SELECT * FROM 交換學生基本資料表 IN ('')");
$r = array(
  '','','','','',''
  );
if (isset($_POST['gobtn6']))
{
  $datalgood = mysqli_query($db_link,"SELECT AVG(GPA),交換學校ID AS value_good  FROM 交換學生基本資料表 GROUP BY 交換學校ID HAVING AVG(GPA)>4"); 
  $datalbad = mysqli_query($db_link,"SELECT AVG(GPA),交換學校ID AS value_bad  FROM 交換學生基本資料表 GROUP BY 交換學校ID HAVING AVG(GPA)<=4"); 
  while($row = mysqli_fetch_assoc($datalgood)) {
    echo "學生平均GPA大於四的學校 : ". $row["value_good"] ."&nbsp;&nbsp; <br>";
      }
  while($row = mysqli_fetch_assoc($datalbad)) {
        echo "學生平均GPA小於等於四的學校 : ". $row["value_bad"] ."&nbsp;&nbsp;";
          }

}
 ?>


