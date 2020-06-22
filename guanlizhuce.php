<?php
    $realname = trim($_POST['realname']);
    $password = md5(trim($_POST['password']));
    $repassword = md5(trim($_POST['repassword']));
    $tel = trim($_POST['tel']);
    $wnum = trim($_POST['wnum']);echo $wnum;

if(!$realname||!$tel||!$wnum||!$password||!$repassword){
		echo '您的注册信息未填写完整，请返回重试。';
		exit;
	}

	if (trim($_POST['password']) != trim($_POST['repassword'])) {
		echo '两次密码不一致,请返回重试。';
		exit;
	}

$conn = mysqli_connect('localhost', 'root', '123456789'); 
if (mysqli_errno($conn)) {

    echo mysqli_error($conn);

    exit;
}
mysqli_select_db($conn, 'member');   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集

$sql="SELECT count(*) FROM manager WHERE wnum = '".$wnum."'";
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

echo '当前管理员插入的ID为' . mysqli_insert_id($conn);
echo '<p>姓名：</p>' . $realname;
echo '<p>电话：</p>' . $tel;

echo '<p>请妥善保存您的管理窗口号和密码为日后登录使用</p>';
mysqli_close($conn);

?>