 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>窗口管理页面——修改窗口信息</title>
 </head>
 <body>
 	<h1>
 		窗口管理页面——修改窗口信息
 	</h1>
 	<hr>
<center>
    <form action="chuangkouguanli.php" method="post">
            <input type="submit" value="返回到管理主页">
    </form>
    
<?php
$realname = trim($_POST['realname']);

$conn = mysqli_connect('localhost', 'root', '123456789'); 
if (mysqli_errno($conn)) {

    echo mysqli_error($conn);

    exit;
}
mysqli_select_db($conn, 'member');   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集

$sql="SELECT count(*) FROM manager WHERE wnum = '".$wnum."'";echo $sql;
$result=mysqli_query($conn,$sql);
$num1=mysqli_fetch_array($result);
 echo $num1[0];

if($num1[0]>0){
    echo ('该窗口管理员已注册，请检查窗口号输入是否正确，另选其他窗口号。');
    exit;
}
$sql = "INSERT INTO `manager` (wnum,realname,password,tel) VALUES('{$wnum}','{$realname}','{$password}', '{$tel}')";
    $result = mysqli_query($conn, $sql);

if ($result) {
    echo '<p>新客户注册成功</p>';
} else {
    echo '<p>新客户注册失败</p>';
}
?>

 	 <table>
        <tr>
            <td>菜品名称</td> <td>菜品余量</td> <td>食堂名</td> <td>食堂窗口</td>
        </tr>
        <tr>
            <td><input type="text"></td> <td><input type="text"></td> <td><input type="text"></td> <td><input type="text"></td> 
        </tr>

    </table>
</center>
 </body>
 </html>