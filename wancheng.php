<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>窗口管理页面</title>
 </head>
 <body>
 	<h1>
 		窗口管理页面——完成顾客订单
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

$oid = trim($_POST['oid']);

$conn = mysqli_connect('localhost', 'root', '123456789'); 
mysqli_select_db($conn, $wnum);

if (mysqli_errno($conn)) {

    echo mysqli_error($conn);

    exit;
}

mysqli_set_charset($conn, 'utf8');   //选择字符集


$sql="UPDATE `orders` set finish='是' WHERE `oid`='$oid'";

$result=mysqli_query($conn,$sql);

if ($result)
  {
  echo "<p>成功更改一条商品信息</p>";header("Location: gukedindan.php");
  }
  else{
echo "<p>失败</p>";}



mysqli_close($conn);

?>

</center>
 </body>
 </html>