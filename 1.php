<?php
    include("connect.php");
     $sql_query = "SELECT * FROM 交換學校基本資料表 ";
     $result = $db_link->query($sql_query);
     $total_records = $result->num_rows;
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>交換學校基本資料表</title>
</head>
<body>
    <h1 align="center">交換學校基本資料表</h1>
    <p align="center">目前學校數:<?php echo $total_records;?> , <a href="1add.php">新增學校資料</a>,<a href="1print.php">列印學校資料</a>,<a href="1search.php">搜尋學校資料</a>,
        <a href="table.php">----回主畫面</a> </p>
    <table border="1" aligin="center">
        <!--表格表類-->
        <tr>
            <th>交換學校ID</th>
            <th>校名</th>
            <th>所在國家</th> 
            <th>承辦人</th>
            <th>承辦人電話</th>
            <th>學校地址</th>
           
        </tr>
        <!--資料內容-->
<?php 
    while($row_result=$result->fetch_assoc()){
        
        echo"<tr>";
        
        echo"<td>".$row_result["交換學校ID"]."</td>";
        echo"<td>".$row_result["校名"]."</td>";
        echo"<td>".$row_result["所在國家"]."</td>";
        echo"<td>".$row_result["承辦人"]."</td>";
        echo"<td>".$row_result["承辦人電話"]."</td>";
        echo"<td>".$row_result["學校地址"]."</td>";
        
       




        echo "<td><a href='1update.php?id=".$row_result["交換學校ID"]."'>修改</a>";
        echo "<a href='1delete.php?id=".$row_result["交換學校ID"]."'>刪除</a></td>";
        echo"</tr>";
    }
?>
</table>
</body>

</html>