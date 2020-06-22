<?php
    $gp = $_POST['gp'];
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    $repassword = md5(trim($_POST['repassword']));
    $realname = trim($_POST['realname']);
    $tel = trim($_POST['tel']);

if(!$username||!$realname||!$gp||!$password||!$repassword||!$tel){
		echo '您的注册信息未填写完整，请返回重试。';
		exit;
	}

	if (trim($_POST['password']) != trim($_POST['repassword'])) {
		echo '两次密码不一致,请返回重试。';
		exit;
    }

$conn = mysqli_connect('localhost', 'root', '123456789');

$sql = "INSERT INTO user(username,password,realname,tel) VALUES('{$username}','{$password}','{$realname}','{$tel}')";

if (mysqli_errno($conn)) {

    echo mysqli_error($conn);

    exit;
}

mysqli_select_db($conn, 'member');   //选择数据库

mysqli_set_charset($conn, 'utf8');   //选择字符集

$result = mysqli_query($conn, $sql);


if ($result) {
    echo '<p>新客户注册成功</p>';
} else {
    echo '<p>新客户注册失败</p>';

}

echo '<p>当前用户插入的ID为</p>' . mysqli_insert_id($conn);

echo '<p>用户名：</p>' . $username;
echo '<p>用户电话：</p>' . $tel;
echo '<p>真实姓名：</p>' . $realname;
echo '<p>您的身份：</p>' . $gp;
echo '<p>请妥善保存您的和密码为日后登录使用。</p>';

error_reporting(E_ERROR|E_WARNING|E_PARSE);
error_reporting(E_ALL);
mysqli_close($conn);
?>