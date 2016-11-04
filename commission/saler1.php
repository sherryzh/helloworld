<!DOCTYPE html>
<html>
<head>
	<title>rifle销售管理系统</title>
</head>
<body>
	<h1>rifle销售管理系统</h1>


	<?php
	//创建变量名
	$id=$_COOKIE['ID'];//获取用户ID
	$orderid=$_COOKIE['orderid'];
	$userID=$id;
	$Locks = $_POST['Locks'];
	$Stocks = $_POST['Stocks'];
	$Barrels = $_POST['Barrels'];

	if(!$userID||!$Locks||!$Stocks||!$Barrels){
		echo 'You bave not entered all the required details.<br/>'.'Please go back and try again.';
		exit ;
	}

	
	
	if (!get_magic_quotes_gpc()) {
		$userID=addslashes($userID);
		$Locks=addslashes($Locks);
		$Stocks=addslashes($Stocks);
		$Barrels=addslashes($Barrels);
	}

	//连接数据库
	@ $db=new mysqli('localhost','zhangsan','123','aaa');


	if (mysqli_connect_errno()!=0)
	{
		echo "Error:Could not connect to datebase. Please try again later.";
		exit;
	}
	else
	{
		$time = date('Y-m-d');
	 $query="insert into volumn values('".$orderid."','".$userID."','".$time."','".$Locks."','".$Stocks."','".$Barrels."')";
	//$query="insert into volumn (`orderid`,`salesmanid`, `locks`, `stocks`, `barrels`) values ('.$orderid'.$userID','.$Locks','.$Stocks','.$Barrels')";

	 echo "插入".$query."</br>";
	 $result= $db->query($query);

	//echo "jieguoshi".$result."<br/>";
	if ($result!=false) 
	{
		echo $db->affected_rows.'sales inserted into database.';
		header("location:2.php?id=".$userID);//header跳转	
	}
	

	 $db->close();
	}

 	?>
</body>
</html>
