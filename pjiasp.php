<!DOCTYPE html>
     <html>
     <head>
    <meta charset="utf-8">
       <title>完善订单</title>
     </head>
     <body>
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
$fid = trim($_POST['fid']);
$score = trim($_POST['score']);
$review = trim($_POST['review']);

$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, $wnum);   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}
$sql2="INSERT INTO `reviews`(`fid`,`score`,`review`)VALUES('{$fid}','{$score}','{$review}')";
$result2=mysqli_query($conn,$sql2);
if ($result2)
  {
  echo "<p>成功评价商品</p>";}
  else{
echo "<p>失败</p>";}

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