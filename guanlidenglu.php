<html>
<body>
	<?php

$wnum = trim($_POST['wnum']);
$password = md5(trim($_POST['password']));


$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, 'member');   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集

$sql="SELECT count(*) FROM manager WHERE wnum = '$wnum' and password ='$password'";
$result=mysqli_query($conn,$sql);
$num1=mysqli_fetch_array($result);

if($num1[0]>0){
	echo ('dengluchenggong');
session_start();
    $_SESSION['logined']=1;   //判断是否已经登录的依据。
    $_SESSION['wnum']=$wnum;  //记录当前登录用户。
    echo "登录成功";header("Location: chuangkouguanli.php");

}else{
    echo "登录失败，不记录SESSION值";
}




mysqli_close($conn);
?>
</body>

<html>