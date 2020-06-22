<!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>增加商品到购物车</title>
<center>

<?php
session_start();
//检测是否登录
if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "当前登录的顾客账号是: ".$_SESSION['id'];
   $id =$_SESSION['id'];
   $wnum=$_SESSION['wnum'];  //记录当前登录用户。
   $oid=$_SESSION['oid'];
}
else {
    echo "<p>失败</p>";
}

$fid = trim($_POST['fid']);
$amount = trim($_POST['amount']);

$conn = mysqli_connect('localhost', 'root', '123456789'); 
mysqli_select_db($conn, $wnum);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_set_charset($conn, 'utf8');   //选择字符集

$sql="SELECT name,price FROM food WHERE `fid`='$fid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
$Price=$row['price']; 
$Name=$row['name'];

    }
} else {
    echo "失败";
}

$sql4="INSERT INTO `ordersdetail`(`oid`,`fid`,`Name`,`Price`,`amount`)VALUES ('{$oid}','{$fid}','{$Name}','{$Price}','{$amount}')";echo $sql4;
$result4=mysqli_query($conn,$sql4);
if ($result4)
  {
  echo "<p>成功增加商品到订单中</p>";header("Location:gouwuche2.php");}
  else{
echo "<p>失败</p>";}


mysqli_close($conn);

?>
    <form action="gouwuche2.php" method="post">
            <input type="submit" value="kk">
    </form> 

</center>
 </body>
 </html>