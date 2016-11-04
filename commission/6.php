<!DOCTYPE.html>
<html>
<meta charset="UTF-8">
<head></head>
<body>
	<title>查询系统</title>
 </head>
 	<form action='3.php' method='post'>
 <body>
 <h1>用户查询系统</h1>
<?php 

$date = date('Y-m-d');
@$db=new mysqli('localhost', 'root', '', 'aaa'); //连接数据库
if(mysqli_connect_errno())
     {
      echo '错误：不能连接到数据库，请重试';
      exit;
     }   
$query="select * from salery";
$result=$db->query($query);
$num_result=$result->num_rows;
echo '<p>数据行数：'.$num_result.'<p>';
echo '<table width="577" border="1" cellpadding="1" cellspacing="1" bordercolor="#0000FF" >';
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
echo '<tr>';
echo '<td align="center">'.stripcslashes($row['salesmanid']).'</td>';

echo '<td align="center">'.stripcslashes($row['lastdate']).'</td>';

echo '<td align="center">'.stripcslashes($row['locks']).'</td>';

echo '<td align="center">'.stripcslashes($row['stocks']).'</td>';

echo '<td align="center">'.stripcslashes($row['barrels']).'</td>';

echo '<td align="center">'.stripcslashes($row['salary']).'</td>';
echo '<tr>';
}
echo '</table>';
echo '<br />';
mysqli_close($db);
 ?>

</form>

</body>
</html>