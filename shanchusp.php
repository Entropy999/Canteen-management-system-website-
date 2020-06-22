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


$conn = mysqli_connect('localhost', 'root', '123456789'); 
mysqli_select_db($conn, $wnum);

if (mysqli_errno($conn)) {

    echo mysqli_error($conn);

    exit;
}

mysqli_set_charset($conn, 'utf8');   //选择字符集

$sql1="DELETE FROM `food` WHERE fid='$fid'";

if(mysqli_query($conn,$sql1))
  {
  echo "<p>成功删除该商品</p>";
  }
  else{
echo "<p>删除失败</p>";}

mysqli_close($conn);

?>
    <form action="xiugaishangping.php" method="post">
            <input type="submit" value="返回 查看最新窗口食物信息">
    </form> 

</center>
 </body>
 </html>