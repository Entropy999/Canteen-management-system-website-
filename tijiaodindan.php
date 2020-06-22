<!DOCTYPE html>
     <html>
     <head>
    <meta charset="utf-8">
       <title>完成订单</title>
     </head>
     <body>
<?php
session_start();
//检测是否登录
if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "当前登录的顾客账号是: ".$_SESSION['id'];
   $id =$_SESSION['id'];
   $wnum=$_SESSION['wnum'];  //记录当前登录用户。
   $oid=$_SESSION['oid'];
   $time=$_SESSION['time'];
}
else {
    echo "失败";
}

$duetime = trim($_POST['duetime']);
$package = trim($_POST['package']);
$destination = trim($_POST['destination']);
$delivery = trim($_POST['delivery']);
$tel = trim($_POST['tel']);
$complete = '是';
$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, $wnum);   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

  $sql1="SELECT `fid`,`Name`,`Price`,`amount` FROM ordersdetail WHERE `oid`='$oid'";

echo ('<p>您的订单信息如下：</p>');
echo "<table border='1'>
<tr>
<th>食物id</th>
<th>食物名称</th>
<th>单价</th>
<th>数量</th>
</tr>";

foreach($conn -> query($sql1) as $row){
  echo "<tr>";
  echo "<td>" . $row['fid'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Price'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "</tr>";}
  echo "</table>";



  $sql2="SELECT Price,amount FROM ordersdetail WHERE `oid`='$oid'";
  $payment='4.1';
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    // 输出数据
    while($row = $result2->fetch_assoc()) {
     $Price = $row['Price']; 
     $amount = $row['amount'];  
      
    }
} else {
    echo "失败";
}

 echo "<td>您的付款金额为：" . $payment . "</td>";
mysqli_set_charset($conn, 'utf8');   //选择字符集

$sql3="UPDATE `orders` set `duetime`='$duetime',`package`='$package',`delivery`='$delivery',`destination`='$destination',`tel`='$tel',`complete`='$complete',`payment`='$payment',`finish`='1' WHERE `oid`='$oid'";
$result3=mysqli_query($conn,$sql3);
if ($result3)
  {
  echo "<p>成功更改</p>";
  }
  else{
echo "<p>失败</p>";}

$sql4="SELECT `oid`,`id`,`duetime`,`ordertime`,`package`,`delivery`,`destination`,`tel`,`payment` FROM `orders` WHERE `oid`= '$oid'";

echo ('<p>订单信息如下：</p>');
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



  mysqli_close($conn);
?>

<form action="diancan.php" method="post">
             <tr>
                <td>再看看其他美味？</td>
            <input type="submit" value="返回到食堂">
</form>

<center>
</body>
</html>