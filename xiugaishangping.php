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


$sql="SELECT fid,name,`time`,price,wnum,stock FROM food";


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

foreach($conn -> query($sql) as $row){
  echo "<tr>";
  echo "<td>" . $row['fid'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['time'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['wnum'] . "</td>";
  echo "<td>" . $row['stock'] . "</td>";
  echo "</tr>";}
  echo "</table>";

mysqli_close($conn);
?>
    <tr><td>增加商品</td></tr>
<form action="zengjiasp.php"method="post">
        <table border="0">
            <tr>
                <td>食物名称：</td>
                <td><input type="name"name="name"maxlength="15"size="15"></td>
            </tr>

            <tr><td>请选择上架时间:</td><td>
        <select name="time">
            <option value="早餐">早餐</option>
            <option value="中餐">中餐</option>
            <option value="晚餐">晚餐</option>
        </select></td></tr>
            <tr>
                <td>单价：</td>
                <td><input type ="price"name="price"maxlength="9"size="9"></td>
            </tr>
            <tr>
                <td>余量：</td>
                <td><input type ="stock"name="stock"maxlength="15"size="15"></td>
            </tr>
            <tr>
                <td colspan="2"><input type ="submit"value="提交"></td>
            </tr>
        </table>
</form>


<tr><td>修改商品</td></tr>
<form action="xiugaisp.php"method="post">
        <table border="0">
             <tr>
                <td>食物id：</td>
                <td><input type="fid"name="fid"maxlength="10"size="10"></td>
            </tr>           
            <tr>
                <td>食物名称：</td>
                <td><input type="name"name="name"maxlength="15"size="15"></td>
            </tr>

            <tr><td>请选择上架时间:</td><td>
        <select name="time">
            <option value="早餐">早餐</option>
            <option value="中餐">中餐</option>
            <option value="晚餐">晚餐</option>
        </select></td></tr>

            <tr>
                <td>单价：</td>
                <td><input type ="price"name="price"maxlength="9"size="9"></td>
            </tr>
            <tr>
                <td>余量：</td>
                <td><input type ="stock"name="stock"maxlength="15"size="15"></td>
            </tr>
            <tr>
                <td colspan="2"><input type ="submit"value="提交"></td>
            </tr>
        </table>
</form>

<tr><td>删除商品</td></tr>
<form action="shanchusp.php"method="post">
        <table border="0">
             <tr>
                <td>食物id：</td>
                <td><input type="fid"name="fid"maxlength="10"size="10"></td>
            </tr>
            <tr>
                <td colspan="2"><input type ="submit"value="确认"></td>
            </tr>           
        </table>
</form>

</center>
 </body>
 </html>