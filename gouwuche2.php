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
   $wnum=$_SESSION['wnum'];  //记录当前登录用户。
   $oid=$_SESSION['oid'];
   $time=$_SESSION['time'];
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

$sql2="SELECT `fid`,`name`,`time`,`price`,`wnum`,`stock` FROM `food` WHERE `time`= '$time'";

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

foreach($conn -> query($sql2) as $row){
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
<form action="scsp.php"method="post">
             <tr>
                <td>食物id：</td>
                <td><input type="fid"name="fid"maxlength="10"size="10"></td>
            </tr>
            <input type ="submit"value="确认">
</form>


<form action="tijiaodindan.php" method="post">
    <a href="a"><font size="5"><font color="red">请选择今日送达时间</font></font>
    <select name="duetime">
      <option value="6:50">6:50</option>
      <option value="7:20">7:20</option>
      <option value="7:50">7:50</option>
      <option value="8:20">8:20</option>
      <option value="8:50">8:50</option>
      <option value="9:20">9:20</option>
      <option value="9:50">9:50</option>
      <option value="10:20">10:20</option>
      <option value="11:00">11:00</option>
      <option value="11:15">11:15</option>
      <option value="11:30">11:30</option>
      <option value="11:45">11:45</option>
      <option value="12:00">12:00</option>
      <option value="12:15">12:15</option>
      <option value="12:30">12:30</option>
      <option value="12:45">12:45</option>
      <option value="13:00">13:00</option>
      <option value="17:00">17:00</option>
      <option value="17:20">17:20</option>
      <option value="17:40">17:40</option>
      <option value="18:00">18:00</option>
      <option value="18:20">18:20</option>
      <option value="18:40">18:40</option>
      <option value="19:00">19:00</option>
      <option value="19:20">19:20</option>
      <option value="19:40">19:40</option>
      <option value="20:00">20:00</option>
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