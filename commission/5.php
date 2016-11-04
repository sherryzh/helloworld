<!DOCTYPE.html>
<html>
<meta charset="UTF-8">
<head></head>
<body>
	<title>查询系统</title>
 </head>
 	<form action='3.php' method='post'>
 <body>
 <h1 align="center">用户查询系统</h1>
<?php 
$id=$_COOKIE['ID'];//获取用户ID
setcookie('ID',$id);
$date = date('Y-m-d');
@$db=new mysqli('localhost', 'root', '', 'aaa'); //连接数据库
if(mysqli_connect_errno())
     {
      echo '错误：不能连接到数据库，请重试';
      exit;
     }   
$query="select * from volumn where salesmanid like '%".$id."%'";
$result=$db->query($query);
$num_result=$result->num_rows;
//echo '<p>数据行数：'.$num_result.'<p>';
echo '<table width="577" border="1" cellpadding="1" cellspacing="1" bordercolor="#0000FF" align="center">';
echo '<tr>';
echo '<td width="200" align="center"></strong>用户编号</td>';
echo '<td width="200" align="center"></strong> Date</td>';
echo '<td width="200" align="center"></strong> Locks</td>';
echo '<td width="200" align="center"></strong> Stocks</td>';
echo '<td width="200" align="center"></strong> Barrels</td>';
echo '<td width="200" align="center"></strong> Salary</td>';
echo '<tr />';
for($i=0;$i<$num_result;$i++)
{
$row=$result->fetch_assoc();

$locaks[$i]=stripcslashes($row['locks']);

$stocks[$i]=stripcslashes($row['stocks']);

$barrels[$i]=stripcslashes($row['barrels']);
}
$sum=0;
$sumlocaks=0;
$sumstocks=0;
$sumbarrels=0;
for($i=0;$i<$num_result;$i++)
{
	$sumlocaks=$sumlocaks+$locaks[$i];
	$sumstocks=$sumstocks+$stocks[$i];
	$sumbarrels=$sumbarrels+$barrels[$i];
	$sum=$sum+45*$locaks[$i]+30*$stocks[$i]+25*$barrels[$i];
}

$orderid=stripcslashes($row['orderid'])+1;
setcookie('orderid',$orderid);
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
echo '<tr>';
echo '<td align="center">'.$id.'</td>';
echo '<td align="center">'.$date.'</td>';
echo '<td align="center">'.$sumlocaks.'</td>';
echo '<td align="center">'.$sumstocks.'</td>';
echo '<td align="center">'.$sumbarrels.'</td>';
echo '<td align="center">'.$salery.'</td>';
echo '<tr/>';
echo '</table>';
echo '<br />';


$ch=mysqli_query($db,"UPDATE aaa.salery SET lastdate='".$date."', locks=".$sumlocaks.", 
	stocks=".$sumstocks.", barrels=".$sumbarrels.", salary=".$salery." where salesmanid='".$id."' ");
if($ch)
	echo '<p style="margin-left:800px;">已申请结算，等待管理员审核...</p>';
else 
	echo "修改失败，SQL:错误：".mysql_error();
mysqli_close($db);



 ?>

</form>

</body>
</html>