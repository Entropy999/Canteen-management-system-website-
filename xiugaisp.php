<!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>窗口管理页面</title>
 </head>
 <body>
  <h1>
    窗口管理页面——修改商品信息
  </h1>
  <hr>
<center>
    <form action="chuangkouguanli.php" method="post">
            <input type="submit" value="返回到管理主页面">
    </form> 
<?php
session_start();
//检测是否登录
if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "当前登录的窗口是:".$_SESSION['wnum'];
   $wnum =$_SESSION['wnum'];
}
else {
    echo "<p>失败</p>";
}
$fid = trim($_POST['fid']);
$name = trim($_POST['name']);
$time = trim($_POST['time']);
$price = trim($_POST['price']);
$stock = trim($_POST['stock']);

$conn = mysqli_connect('localhost', 'root', '123456789'); 
mysqli_select_db($conn, $wnum);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_set_charset($conn, 'utf8');   //选择字符集

$sql="UPDATE `food` set name='$name',`time`='$time',price='$price',stock='$stock' WHERE fid='$fid'";
$result=mysqli_query($conn,$sql);

if ($result)
  {
  echo "<p>成功更改一条商品信息</p>";
  }
  else{
echo "<p>失败</p>";}

mysqli_close($conn);

?>
    <form action="xiugaishangping.php" method="post">
            <input type="submit" value="返回 查看最新窗口食物信息">
    </form> 

</center>
 </body>
 </html>