<!DOCTYPE html>
     <html>
     <head>
    <meta charset="utf-8">
       <title>完善订单</title>
       <script type="text/javascript" src="D:\购物车1\js">
        
       </script>
     </head>
     <body>
  

<?php
session_start();
//检测是否登录
if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "当前登录的顾客账号是: ".$_SESSION['id'];
   $id =$_SESSION['id'];
   $time=$_SESSION['time'];
}
else {
    echo "失败";
}
$date=date('H:i,jS F Y');
  echo "<p>您的订单开始时间为".date('H:i,jS F Y')."</p>";
?>

<?php

$fid = trim($_POST['fid']);
$amount = trim($_POST['amount']);
$wnum = trim($_POST['wnum']);
$conn = mysqli_connect('localhost', 'root', '123456789'); 

mysqli_select_db($conn, $wnum);   //选择数据库
mysqli_set_charset($conn, 'utf8');   //选择字符集

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

$sql2="INSERT INTO `orders`(`id`,`ordertime`)VALUES('{$id}','{$date}')";
$result2=mysqli_query($conn,$sql2);
if ($result2)
  {
  echo "<p>成功进入订单</p>";}
  else{
echo "<p>失败</p>";}


$sql3="SELECT `oid` FROM `orders` WHERE `id`='{$id}'AND`ordertime`='{$date}'";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    // 输出数据
    while($row = $result3->fetch_assoc()) {
       echo "<tr>";
       echo "<td>您的订单编号为：" . $row['oid'] . "</td>";
       $oid=$row['oid'];
    }
} else {
    echo "失败";
}

$sql="SELECT name,price FROM food WHERE `fid`='$fid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
$Price=$row['price']; 
$Name=$row['name'];
    }
} else {
    echo "失败";
}


$sql4="INSERT INTO `ordersdetail`(`oid`,`fid`,`Name`,`Price`,`amount`)VALUES ('{$oid}','{$fid}','{$Name}','{$Price}','{$amount}')";
$result4=mysqli_query($conn,$sql4);
if ($result4)
  {
  echo "<p>成功增加商品到订单中</p>";}
  else{
echo "<p>失败</p>";}



  $sql5="SELECT `fid`,`Name`,`Price`,`amount` FROM ordersdetail WHERE `oid`='$oid'";


echo ('<p>现在已选择的食物信息如下：</p>');
echo "<table border='1'>
<tr>
<th>食物id</th>
<th>食物名称</th>
<th>单价</th>
<th>数量</th>
</tr>";

foreach($conn -> query($sql5) as $row){
  echo "<tr>";
  echo "<td>" . $row['fid'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Price'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "</tr>";}
  echo "</table>";

    session_start();
    $_SESSION['logined']=1;   //判断是否已经登录的依据。
    $_SESSION['wnum']=$wnum;  //记录当前登录用户。
    $_SESSION['oid']=$oid; 

$sql6="SELECT `fid`,`name`,`time`,`price`,`wnum`,`stock` FROM `food` WHERE `time`= '$time'";

echo ('<p>所选窗口的在售商品如下：</p>');
echo "<table border='1'>
<tr>
<th>食物id</th>
<th>食物名称</th>
<th>上架时间</th>
<th>单价</th>
<th>窗口编号</th>
<th>余量</th>
</tr>";

foreach($conn -> query($sql6) as $row){
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

<tr><td>添加商品</td></tr>
<form action="zjsp.php" method="post">
              <tr>
                <td>食物id：</td>
                <td><input type="fid"name="fid"maxlength="10"size="10"></td>
            </tr>
            <tr>
                <td>数量：</td>
                <td><input type ="amount"name="amount"maxlength="10"size="10"></td>
            </tr>
            <input type="submit" value="确认">
</form>

<tr><td>删除商品</td></tr>
<form action="shanchusp.php"method="post">

             <tr>
                <td>食物id：</td>
                <td><input type="fid"name="fid"maxlength="10"size="10"></td>
            </tr>
                  <input type ="submit"value="确认"></td>
</form>
<form action="diancan.php" method="post">
             <tr>
                <td>都不想要？换一个窗口吧</td>
            <input type="submit" value="返回查看其它窗口商品">
</form>

<form action="tijiaodindan.php" method="post">
    <a href="a"><font size="5"><font color="red">请选择今日送达时间</font></font>
    <select name="duetime">
      <option value="a01">6:50</option>
      <option value="a02">7:20</option>
      <option value="a03">7:50</option>
      <option value="a04">8:20</option>
      <option value="a05">8:50</option>
      <option value="a06">9:20</option>
      <option value="a07">9:50</option>
      <option value="b01">10:20</option>
      <option value="b02">11:00</option>
      <option value="b03">11:15</option>
      <option value="b04">11:30</option>
      <option value="b05">11:45</option>
      <option value="b06">12:00</option>
      <option value="b07">12:15</option>
      <option value="b08">12:30</option>
      <option value="a04">12:45</option>
      <option value="a05">13:00</option>
      <option value="a06">17:00</option>
      <option value="a07">17:20</option>
      <option value="b01">17:40</option>
      <option value="b02">18:00</option>
      <option value="b03">18:20</option>
      <option value="b04">18:40</option>
      <option value="b05">19:00</option>
      <option value="b06">19:20</option>
      <option value="b07">19:40</option>
      <option value="b08">20:00</option>
    </select><br/>

<center>

        <br> 
        <br>
        <br>
        <legend>请完善订单信息</legend>
   <table>


          是否打包带走:
    <select name="package">
      <option value="否">否，我在食堂就餐。</option>
      <option value="是">是，我不在食堂就餐，要求带走或配送。</option>
    </select><br/>


          是否配送:
    <select name="delivery">
      <option value="否">否，我到食堂取餐</option>
      <option value="是">是,我会正确填写送达地点</option>
    </select><br/>

          送达地点:<input type="destination" name="destination"maxlength="20"size="20"><br/>
          电话号码:<input type="tel" name="tel"maxlength="11"size="11"><br/>
   </table>
            <input type="submit" value="提交订单">
</form> 

<center>
</body>
</html>