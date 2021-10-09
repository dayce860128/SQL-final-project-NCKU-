<?php
    include("connect.php");
     $sql_query = "SELECT * FROM 學生緊急聯絡人資料表 ";
     $result = $db_link->query($sql_query);
     $total_records = $result->num_rows;
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>學生緊急聯絡人資料表</title>
</head>
<body>
    <h1 align="center">學生緊急聯絡人資料</h1>
    <p align="center">目前聯絡人數:<?php echo $total_records;?> , <a href="studentadd.php">新增聯絡人資料</a>,<a href="1print.php">列印聯絡人資料</a>,<a href="1search.php">搜尋聯絡人資料</a>,
        <a href="table.php">----回主畫面</a> </p>
    <table border="1" aligin="center">
        <!--表格表類-->
        <tr>
            <th>學生姓名</th> 
            <th>學號</th>
            <th>緊急聯絡人</th> 
            <th>連絡人電話</th>
            <th>關係</th>
            <th>聯絡人地址</th>
            
           
        </tr>
        <!--資料內容-->
<?php 
    while($row_result=$result->fetch_assoc()){
        
        echo"<tr>";
        
        echo"<td>".$row_result["學生姓名"]."</td>";
        echo"<td>".$row_result["學號"]."</td>";
        echo"<td>".$row_result["緊急聯絡人"]."</td>";
        echo"<td>".$row_result["連絡人電話"]."</td>";
        echo"<td>".$row_result["關係"]."</td>";
        echo"<td>".$row_result["聯絡人地址"]."</td>";
       







        echo "<td><a href='1update.php?id=".$row_result["學號"]."'>修改</a>";
        echo "<a href='1delete.php?id=".$row_result["學號"]."'>刪除</a></td>";
        echo"</tr>";
    }
?>
</table>
</body>

</html>