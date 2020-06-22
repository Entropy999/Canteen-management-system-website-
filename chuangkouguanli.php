 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>窗口管理页面</title>
 </head>
 <body>
 	<h1>
 		窗口管理页面
 	</h1>
 	<hr>
<center>
    <form action="xiugaichuangkouxinxi.php" method="post">
            <input type="submit" value="修改窗口信息">
    </form> 
     <form action="xiugaishangping.php" method="post">
            <input type="submit" value="修改今日菜系">
    </form> 
    <form action="gukedindan.php" method="post">
            <input type="submit" value="管理顾客订单">
    </form> 
    <form action="pingjia.php" method="post">
            <input type="submit" value="查看商品评价">
    </form> 
</center>

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
?>

 </body>
 </html>