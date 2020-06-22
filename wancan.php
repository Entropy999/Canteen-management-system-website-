<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>智慧食堂网上订餐</title>
<style>
	a{text-decoration: none;}
</style>
</head>
<body>
<body background="背景.jpg">
<center>
<marquee direction=right><h2><font color="gray">简单生活，从不简单，指尖舞蹈，时尚品味。</font></h2></marquee>
</br>
<h2><font color="black">校园食堂网上订餐</font></h2>
<a href="2"><font color="red">开始订餐</font></a> <a href="3"><font color="red">查询订单</font></a> <a href="4"><font color="red">帮助中心</font></a> <a href="5"><font color="red">我的购物车</font></a></h3> </center></center>


<form action="wancan.php"method="post">
<a href="a"><font size="5"><font color="red">早餐</font></font>
请选择食堂窗口:
		<select name="wnum">
			<option value="a01">第二食堂01窗口</option>
			<option value="a02">第二食堂02窗口</option>
			<option value="a03">第二食堂03窗口</option>
			<option value="a04">第二食堂04窗口</option>
			<option value="a05">第二食堂05窗口</option>
			<option value="a06">第二食堂06窗口</option>
			<option value="a07">第二食堂07窗口</option>
			<option value="b01">第三食堂01窗口</option>
			<option value="b02">第三食堂02窗口</option>
			<option value="b03">第三食堂03窗口</option>
			<option value="b04">第三食堂04窗口</option>
			<option value="b05">第三食堂05窗口</option>
			<option value="b06">第三食堂06窗口</option>
			<option value="b07">第三食堂07窗口</option>
			<option value="b08">第三食堂08窗口</option>
		</select><br/>
		<tr>
                <td colspan="2"><input type ="submit"value="提交"></td>
            </tr>
</form>

<?php
session_start();
//检测是否登录

if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "当前登录的顾客账号是: ".$_SESSION['id'];
   $id =$_SESSION['id'];
}
else {
    echo "失败";
}
$wnum = trim($_POST['wnum']);
$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, $wnum);   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集
if (mysqli_errno($conn)) {

    echo mysqli_error($conn);

    exit;
}


$sql="SELECT fid,name,`time`,price,wnum,stock FROM food WHERE `time`='晚餐'";


echo ('<p>当前窗口的食物信息如下：</p>');
echo "<table border='1'>
<tr>
<th>食物id</th>
<th>食物名称</th>
<th>上架时间</th>
<th>单价</th>
<th>窗口编号</th>
<th>余量</th>
</tr>";

foreach($conn -> query($sql) as $row){
  echo "<tr>";
  echo "<td>" . $row['fid'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['time'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['wnum'] . "</td>";
  echo "<td>" . $row['stock'] . "</td>";
  echo "</tr>";}
  echo "</table>";

mysqli_close($conn);
?>


</center>
</body>
</html>