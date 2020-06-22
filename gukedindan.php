<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8"> 
<title>用户订单页面</title> 
</html>
<head>
    <style type="text/css">
h1 {text-align: center}
</style>
<ul>
<li><a href="default.asp">回到上一步</a></li>
</ul>

<body>
<h1>用户订单</h1>


</head>
<style type="text/css">
body {background-image: url(timg.jpg);}
body {background-color: #FF0033}
h1 {background-color: #FF6633}
h2{background-color:#FF9933}
table{background-color:#FFCC33}

</style>

</head>
<style type="text/css">
#customers
  {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  width:100%;
  border-collapse:collapse;
  }

#customers td, #customers th 
  {
  font-size:1em;
  border:1px solid #98bf21;
  padding:3px 7px 2px 7px;
  }

#customers th 
  {
  font-size:1.1em;
  text-align:left;
  padding-top:5px;
  padding-bottom:4px;
  background-color:#A7C942;
  color:#ffffff;
  }

#customers tr.alt td 
  {
  color:#FF0033;
  background-color:#EAF2D3;
  }
</style>
</head>


<?php
session_start();
//检测是否登录
if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "当前登录的窗口是: ".$_SESSION['wnum'];
   $wnum=$_SESSION['wnum'];  //记录当前登录用户。

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


$sql4="SELECT `oid`,`id`,`duetime`,`ordertime`,`package`,`delivery`,`destination`,`tel`,`payment` FROM `orders` WHERE `finish`='1' AND `complete`= '是'";

echo ('<p>未完成的订单信息如下：</p>');
echo "<table border='1'>
<tr>
<th>订单编号</th>
<th>顾客账号</th>
<th>送达时间</th>
<th>下单时间</th>
<th>是否打包</th>
<th>是否配送</th>
<th>配送地点</th>
<th>顾客电话</th>

<th>总金额</th>

</tr>";

foreach($conn -> query($sql4) as $row){
  echo "<tr>";
  echo "<td>" . $row['oid'] . "</td>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['duetime'] . "</td>";
  echo "<td>" . $row['ordertime'] . "</td>";
  echo "<td>" . $row['package'] . "</td>";
  echo "<td>" . $row['delivery'] . "</td>";
  echo "<td>" . $row['destination'] . "</td>";
  echo "<td>" . $row['tel'] . "</td>";
  echo "<td>" . $row['payment'] . "</td>";
  echo "</tr>";}
  echo "</table>";


$sql1="SELECT od.oid, `fid`,`Name`,`Price`,`amount` FROM `ordersdetail` AS od join `orders` as os  on od.oid=os.oid WHERE `finish`='1'";

echo ('<p>未完成的顾客详细订单信息如下：</p>');
echo "<table border='1'>
<tr>
<th>订单编号</th>
<th>食物id</th>
<th>食物名称</th>
<th>单价</th>
<th>数量</th>
</tr>";

foreach($conn -> query($sql1) as $row){
  echo "<tr>";
  echo "<td>" . $row['oid'] . "</td>";
  echo "<td>" . $row['fid'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Price'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "</tr>";}
  echo "</table>";


$sql5="SELECT `oid`,`duetime`,`ordertime` FROM `orders` WHERE `finish`= '是'";
echo ('<p>已经完成的订单信息如下：</p>');
echo "<table border='1'>
<tr>
<th>订单编号</th>
<th>送达时间</th>
<th>下单时间</th>
</tr>";

foreach($conn -> query($sql5) as $row){
  echo "<tr>";
  echo "<td>" . $row['oid'] . "</td>";
  echo "<td>" . $row['duetime'] . "</td>";
  echo "<td>" . $row['ordertime'] . "</td>";
  echo "</tr>";}
  echo "</table>";

mysqli_close($conn);

  ?>

</body>
    <form action="wancheng.php" method="post">
      <table border="0">
            <tr>
                <td>请输入已完成的订单编号：</td>
                <td><input type="oid"name="oid"maxlength="10"size="10"></td>
            </tr>
        </table>
            <input type="submit" value="确认">
    </form> 

</body>
</html>
