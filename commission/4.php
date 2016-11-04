<!DOCTYPE.html>
<html>
<meta charset="UTF-8">
<head></head>
<body>
	<title>查询系统</title>
 </head>
 <body>
 <h1 align="center">管理员查询系统</h1>
<?php 
$id=$_GET['id'];//获取用户ID
@$db=new mysqli('localhost', 'zhangsan', '123', 'aaa'); //连接数据库
if(mysqli_connect_errno())
     {
      echo '错误：不能连接到数据库，请重试';
      exit;
     }   
$query="select * from volumn";
$result=$db->query($query);
$num_result=$result->num_rows;
echo '<p align="center">数据行数：'.$num_result.'<p>';
echo '<table width="577" border="1" cellpadding="1" cellspacing="1" bordercolor="#0000FF" align="center">';
echo '<tr>';
echo '<td width="200" align="center"></strong>订单号</td>';
echo '<td width="200" align="center"></strong>人员编号</td>';
echo '<td width="200" align="center"></strong> Date</td>';
echo '<td width="200" align="center"></strong> Locks</td>';
echo '<td width="200" align="center"></strong> Stocks</td>';
echo '<td width="200" align="center"></strong> Barrels</td>';
echo '<tr />';
for($i=0;$i<$num_result;$i++)
{
$row=$result->fetch_assoc();
echo '<tr>';
echo '<td align="center">'.stripcslashes($row['orderid']).'</td>';

echo '<td align="center">'.stripcslashes($row['salesmanid']).'</td>';

echo '<td align="center">'.stripcslashes($row['date']).'</td>';

echo '<td align="center">'.stripcslashes($row['locks']).'</td>';

echo '<td align="center">'.stripcslashes($row['stocks']).'</td>';

echo '<td align="center">'.stripcslashes($row['barrels']).'</td>';
echo '<tr>';
}
echo '</table>';
echo '<br />';
mysqli_close($db);

 ?>
<table align="center">
 <td colspan="2" align="center"><a href="6.php">
 <input align="center" type="submit" value="工资表"></a></td>
</table>
  </tr>
</form>

</body>
</html>