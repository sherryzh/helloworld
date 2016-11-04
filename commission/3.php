 <!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Rifle销售管理系统</title>
</head>
<body>
<?php 
$id=$_COOKIE['ID'];//获取用户ID
$orderid=$_COOKIE['orderid'];
setcookie('orderid',$orderid);
setcookie('ID',$id);
?>
  <h2 align="center">销售单提交</h2>
  <form action="saler1.php" method="POST">
  <table border="0" align="center">
     <tr bgcolor="#cccccc">
      <td width="300">Item</td>
      <td width="100">Quantity</td>
     </tr>
     
     <tr>
      <td>locks</td>
      <td align="center"><input type="int" name="Locks" size="3" maxlength="70"></td>
     </tr>
     <tr>
      <td>stocks</td>
      <td align="center"><input type="int" name="Stocks" size="3" maxlength="80"></td>
     </tr>
     <tr>
      <td>barrels</td>
      <td align="center"><input type="int" name="Barrels" size="3" maxlength="90"></td>
     </tr>
<br/>
	<tr>
     <td></td>
     </tr>
     <tr>
      <td colspan="2" align="center"><input type="submit" value="Submit Sales Order"></td>
     </tr>
  </table>
 
</form>
</body>
</html>
       