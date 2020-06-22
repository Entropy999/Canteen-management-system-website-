<html>
<body>
<?php

$id = trim($_POST['id']);
$password = md5(trim($_POST['password']));

$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, 'member');   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集

$sql="SELECT count(*) FROM user WHERE id = '$id' and password ='$password'";
$result=mysqli_query($conn,$sql);
$num1=mysqli_fetch_array($result);
echo $num1[0];

if($num1[0]>0){
	echo ('dengluchenggong');
	session_start();
    $_SESSION['logined']=1;   //判断是否已经登录的依据。
    $_SESSION['id']=$id;  //记录当前登录用户。
    echo "登录成功";header("Location: diancan.php");

}else{
    echo "登录失败，不记录SESSION值";
}	

mysqli_close($conn);
?>
	
</body>
</html>
