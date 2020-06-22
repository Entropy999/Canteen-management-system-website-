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
<h2><font color="black">精品菜单：</font></h2>
<marquee>
<img src="zy.jpg" width="300" height="300">
<img src="timg-10.jpg" width="300" height="300">
<img src="timg-11.jpg" width="300" height="300">
<img src="timg-12.jpg" width="300" height="300">
<img src="timg-9.jpg" width="300" height="300">
</marquee>
</br></br>
<center>
<form action="<?php print $_SERVER['PHP_SELF']?>"method="post">
我要点：
        <select name="time">
			<option value="早餐">早餐</option>
			<option value="中餐">中餐</option>
			<option value="晚餐">晚餐</option>
		</select><br/>

请选择食堂窗口:
<table border="0">
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
              </table>
</form>

<?php
session_start();
//检测是否登录

if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "当前登录的顾客账号是: ".$_SESSION['id']."<br>";
   $id =$_SESSION['id'];
}
else {
    echo "失败";
}



$wnum = trim($_POST['wnum']);    
$time = trim($_POST['time']);    $_SESSION['time']=$time;
$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, $wnum);   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集
if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}
$sql1="SELECT wname,location,intro from information where `wnum`='$wnum'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "欢迎光临第 $wnum 号窗口: " . $row["wname"]. "<br>";
        echo "地址:" . $row["location"]. "<br>";
        echo "". $row["intro"]. "<br>";
    }
} else {
    echo "欢迎光临第 $wnum 号窗口<br>";
}


$sql2="SELECT fid,name,`time`,price,wnum,stock FROM food WHERE `time`='$time'";


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

foreach($conn -> query($sql2) as $row){
  echo "<tr>";
  echo "<td>" . $row['fid'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['time'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['wnum'] . "</td>";
  echo "<td>" . $row['stock'] . "</td>";
  echo "</tr>";}
  echo "</table>";

$sql3="SELECT r.fid,f.name,score,review FROM reviews as r join food as f on r.fid=f.fid WHERE `time`='$time'";
echo ('<p>当前窗口的食物评价信息如下：</p>');
echo "<table border='1'>
<tr>
<th>食物id</th>
<th>食物名称</th>
<th>打分</th>
<th>评价内容</th>
</tr>";

foreach($conn -> query($sql3) as $row){
  echo "<tr>";
  echo "<td>" . $row['fid'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['score'] . "</td>";
  echo "<td>" . $row['review'] . "</td>";
  echo "</tr>";}
  echo "</table>";

mysqli_close($conn);


?>

	<tr><td>开始你的订单吧！</td></tr></br>
		<tr><td>注意：一次订单只能选择同一窗口的商品哦~</td></tr></br>

<form action="gouwuche.php"method="post">
        <table border="0">
        	请选择购物窗口:<table border="0">
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
                <td>食物id：</td>
                <td><input type="fid"name="fid"maxlength="10"size="10"></td>
            </tr>
            <tr>
                <td>数量：</td>
                <td><input type ="amount"name="amount"maxlength="10"size="10"></td>
            </tr>
            <tr>
                <td colspan="2"><input type ="submit"value="提交"></td>
            </tr>
        </table>
</form>

</center>

<form action="pjiasp.php" method="post">
        	我要评价这个窗口的某个商品:
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
                <td>食物id：<input type="fid"name="fid"maxlength="10"size="10"></td>
            </tr>

           评分:<table border="0">
		<select name="score">
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			<option value="0">0</option>
		</select><br/>
            <tr>
                <td>说说你的看法吧：</td>
                <td><input type ="review"name="review"maxlength="250"size="100"></td>
            </tr>
            <tr>
                <td colspan="2"><input type ="submit"value="提交"></td>
            </tr>
        </table>
</form>

</body>
</html>
