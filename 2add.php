<?php
if(isset($_POST["action"])&&($_POST["action"]=="add")){
    include("connect.php");
    $sql_query = "INSERT INTO 交換學生基本資料表 (學生姓名,性別, 學號,系級, 學生聯絡電話, GPA, 交換學校ID,狀態,緊急聯絡人 ) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $db_link -> prepare($sql_query);
    $stmt -> bind_param("sssssssss",$_POST["學生姓名"],$_POST["性別"], $_POST["學號"],$_POST["系級"],$_POST["學生聯絡電話"],$_POST["GPA"],$_POST["交換學校ID"],$_POST["狀態"],$_POST["緊急聯絡人"]);
    $stmt -> execute();
    $stmt -> close();
    $db_link -> close(); //重新導回主畫面
    header("Location: 2.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>新增資料</title>
</head>
<body>

<h1 align="center">新增資料</h1>
    <p align="center"><a href="2.php">取消</a></p>
    <form action="" method="post" name ="formAdd" number="formAdd">
    <table border="1" aligin="center" cellpadding="4">
        <!--表格表類-->
        <tr>
            <th>欄位</th>
            <th>資料</th>
        </tr>
         <tr>
            <td>學生姓名</td>
            <td><input type="text" name="學生姓名" id="學生姓名"></td>
        </tr> 

        <tr>
            <td>性別</td>
            <td><input type="radio" name="性別" id="radio" value="女" checked>女
            <input type="radio" name="性別" id="radio" value="男">男
            </td>
        </tr> 
        <tr>
            <td>學號</td>
            <td><input type="text" name="學號" id="學號"></td>
        </tr> 
        <tr>
            <td>系級</td>
            <td><input type="text" name="系級" id="系級"></td>
        </tr> 
        <tr>
            <td>學生聯絡電話</td>
            <td><input type="text" name="學生聯絡電話" id="學生聯絡電話"></td>
        </tr> 
        <tr>
            <td>GPA</td>
            <td><input type="text" name="GPA" id="GPA"></td>
        </tr> 
         <tr>
            <td>交換學校ID</td>
            <td><input type="交換學校ID" name="交換學校ID" id="交換學校ID"></td>
        </tr>
         <tr>
            <td>狀態</td>
            <td><input type="radio" name="狀態" id="radio" value="交換中" checked>交換中
            <input type="radio" name="狀態" id="radio" value="尚未交換">尚未交換
            </td>
        </tr> 
        <tr>
            <td>緊急聯絡人</td>
            <td><input type="text" name="緊急聯絡人" id="緊急聯絡人"></td>
    
           
           
        </tr>
           
        
       


       
<tr>
        <td colspan="2" align="center"> 
        <input name="action" type="hidden" value="add">
        <input type="submit" type="button" value="新增資料">
        <input type="reset" type="button2" value="重新填寫">  
        
    </td>

</tr>
</table>
</form>
</body>
</html>