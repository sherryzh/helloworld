<!DOCTYPE.html>
<html>
<meta charset="UTF-8">
<head></head>
<body>
	<title>查询系统</title>
 </head>
 	
 <body>
 <h1 align="center">用户查询系统</h1>
<?php 
$id=$_GET['id'];//获取用户ID
setcookie('ID',$id);

@$db=new mysqli('localhost', 'zhangsan', '123', 'aaa'); //连接数据库
if(mysqli_connect_errno())
     {
      echo '错误：不能连接到数据库，请重试';
      exit;
     }   
$query="select * from volumn where salesmanid like '%".$id."%'";
$result=$db->query($query);
$num_result=$result->num_rows;
echo '<p align="center">已提交订单数：'.$num_result.'<p>';
echo '<table width="577" border="1" cellpadding="1" cellspacing="1" bordercolor="#0000FF" align="center">';
echo '<tr>';
echo '<td width="200" align="center"></strong>订单号</td>';
echo '<td width="200" align="center"></strong> Date</td>';
echo '<td width="200" align="center"></strong> Locks</td>';
echo '<td width="200" align="center"></strong> Stocks</td>';
echo '<td width="200" align="center"></strong> Barrels</td>';
echo '<tr />';
for($i=0;$i<$num_result;$i++)
{
echo '<tr>';
$row=$result->fetch_assoc();
//echo '<td></strong>订单号:</td>';
echo '<td align="center">'.stripcslashes($row['orderid']).'</td>';
//echo '<td></strong><br />Date:</td>';
echo '<td align="center">'.stripcslashes($row['date']).'</td>';
//echo '<td></strong> Locks:</td>';
//$locaks[$i]=stripcslashes($row['locks']);
echo '<td align="center">'.stripcslashes($row['locks']).'</td>';
//echo '<td></strong> Stocks:</td>';
//$stocks[$i]=stripcslashes($row['stocks']);
echo '<td align="center">'.stripcslashes($row['stocks']).'</td>';
//echo '<td></strong> Barrels:</td>';
//$barrels[$i]=stripcslashes($row['barrels']);
echo '<td align="center">'.stripcslashes($row['barrels']).'</td>';
echo '<tr />';
}
echo '</table>';
$orderid=stripcslashes($row['orderid'])+1;
setcookie('orderid',$orderid);
/*$sum=0;
for($i=0;$i<$num_result;$i++)
{
	$sum=$sum+45*$locaks[$i]+30*$stocks[$i]+25*$barrels[$i];
}
$salery=0;
if($sum>1800)
{
	$salery=($sum-1800)*0.2;
	$sum=1800;
}
if($sum>1000)
{
	$salery=$salery+($sum-1000)*0.15;
	$sum=1000;
}

	$salery=$salery+$sum*0.1;

echo '</strong> Salery:';
echo $salery;*/
echo '<br />';
mysqli_close($db);
 ?>
<table align="center">
<td colspan="2" align="center"><a href="3.php">
<input type="submit" value="输入"></a></td>

 <td colspan="2" align="center"><a href="5.php">
<input type="submit" value="结算"></a></td>
  </tr>
</table>
</form>

</body>
</html>