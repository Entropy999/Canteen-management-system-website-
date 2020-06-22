<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>窗口管理页面</title>
 </head>
 <body>
 	<h1>
 		窗口管理页面——查看商品评价
 	</h1>
 	<hr>
<center>
    <form action="chuangkouguanli.php" method="post">
            <input type="submit" value="返回到管理主页面">
    </form> 

 	<table>
        商品评价
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
   
$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, $wnum);   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集
if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}
       $sql="SELECT r.fid,f.name,score,review FROM reviews as r join food as f on r.fid=f.fid";
echo ('<p>当前窗口的食物评价信息如下：</p>');
echo "<table border='1'>
<tr>
<th>食物id</th>
<th>食物名称</th>
<th>打分</th>
<th>评价内容</th>
</tr>";

foreach($conn -> query($sql) as $row){

  echo "<tr>";
  echo "<td>" . $row['fid'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['score'] . "</td>";
  echo "<td>" . $row['review'] . "</td>";
  echo "</tr>";}
  echo "</table>";

mysqli_close($conn);
?>
    
    </form>

    </table>
</center>
 </body>
 </html>