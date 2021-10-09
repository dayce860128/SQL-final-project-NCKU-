<?php
include("connect.php");
if(isset($_POST["action"])&&($_POST["action"]=="update")){
    $sql_query = "DELETE FROM 交換學校基本資料表 WHERE 交換學校ID=?";
    $stmt = $db_link -> prepare($sql_query);
    $stmt -> bind_param("i",$_POST["交換學校ID"]);
    $stmt -> execute();
    $stmt -> close();
    $db_link -> close();
    header("Location: 1.php");
}
$sql_select = "SELECT 交換學校ID,校名,所在國家,承辦人,承辦人電話, 學校地址 FROM 交換學校基本資料表 WHERE 交換學校ID= ?";
$stmt = $db_link ->prepare($sql_select);
$stmt -> bind_param("i", $_GET["id"]);
$stmt -> execute();
$stmt -> bind_result($交換學校ID,$校名,$所在國家,$承辦人,$承辦人電話,$學校地址);
$stmt -> fetch();
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>刪除資料</title>
</head>
<body>
    <h1 align="center">刪除資料</h1>
     <p align="center"><a href="1.php">取消</a></p>
    <form action=""method="post" name ="formFix" number="formFix">
    <table border="1" aligin="center" cellpadding="4">
        <!--表格表類-->
        <tr>
            <th>欄位</th>
            <th>資料</th>
        </tr>

        <tr>
            <td>交換學校ID</td>
            <td><input type="text" name="交換學校ID" id="交換學校ID" value="<?php echo $交換學校ID;?>"></td>
        </tr>
         <tr>
            <td>校名</td>
            <td><input type="text" name="校名" id="校名" value="<?php echo $校名;?>"></td>
        </tr>
        
        <tr>
            <td>所在國家</td>
            <td><input type="text" name="所在國家" id="所在國家" value="<?php echo $所在國家;?>"></td>
        </tr>
       <tr>
            <td>承辦人</td>
            <td><input type="text" name="承辦人" id="承辦人" value="<?php echo $承辦人;?>"></td>
        </tr>
         
        <tr>
            <td>承辦人電話</td>
            <td><input type="text" name="承辦人電話" id="承辦人電話" value="<?php echo $承辦人電話;?>"></td>
        </tr>
        
        <tr>
            <td>學校地址</td>
            <td><input type="text" name="學校地址" id="學校地址" value="<?php echo $學校地址;?>"></td>
        </tr>

        <tr>
            <td colspan="2" align="center">
            <input name="編號" type="hidden" value="<?php echo $編號;?>">
            <input name="action" type="hidden" value="update">
            <input type="submit" type="button" value="刪除資料">
            <input type="reset" type="button2" value="重新填寫">    
</td>
</tr>
</table>
</form>
</body>
</html>
<?php
$stmt ->close();
$db_link -> close();
?>