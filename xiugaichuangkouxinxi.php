<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>窗口管理页面</title>
 </head>
 <body>
 	<h1>
 		窗口管理页面——修改窗口信息
 	</h1>
 	<hr>
<center>
    <form action="chuangkouguanli.php" method="post">
            <input type="submit" value="返回到管理主页面">
    </form> 


    <form action="xiugaichuangkouxinxi1.php"method="post">
        <table border="0">
            <tr>
                <td>窗口名称：</td>
                <td><input type="wname"name="wname"maxlength="10"size="10"></td>
            </tr>
            <tr>
                <td>窗口地点：</td>
                <td><input type ="location" name="location"maxlength="50"size="50"></td>
            </tr>
            <tr>
                <td>窗口介绍：</td>
                <td><input type ="intro" name="intro"maxlength="50"size="50"></td>
            </tr>
            <tr>
                <td colspan="2"><input type ="submit"value="提交"></td>
            </tr>
        </table>
    </form>


<?php
session_start();
//检测是否登录

if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "当前登录的窗口是: ".$_SESSION['wnum'];
   $wnum =$_SESSION['wnum'];
}
else {
    echo "失败";
}

$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, $wnum);   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集
if (mysqli_errno($conn)) {

    echo mysqli_error($conn);

    exit;
}


$sql="SELECT wname, location,intro FROM information";


echo ('<p>当前窗口信息如下：</p>');
echo "<table border='1'>
<tr>
<th>窗口名称</th>
<th>窗口地点</th>
<th>窗口介绍</th>
</tr>";


foreach($conn -> query($sql) as $row){
  echo "<tr>";
  echo "<td>" . $row['wname'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['intro'] . "</td>";
  echo "</tr>";
  echo "</table>";}

mysqli_close($conn);

?>


</center>
 </body>
 </html>