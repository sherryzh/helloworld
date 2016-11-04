<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
<?php     
         
    $mysql_server_name="localhost"; //数据库服务器名称     
    $mysql_username=$_POST['Name']; // 连接数据库用户名     
    $mysql_password=$_POST['Password']; // 连接数据库密码     
    $mysql_database="aaa"; // 数据库的名字     
         
    // 连接到数据库     
    @$db=new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);     
     if(mysqli_connect_errno())
     {
      echo '错误：不能连接到数据库，请重试';
      exit;
     } 
     else
     {
      $query="select salesmanid from salesman where name like '%$mysql_username%'";
      $result=$db->query($query);
      if($result!='false')
      {
        $row=$result->fetch_assoc();
        $id=stripslashes($row['salesmanid']);
        if($id!=0)
          header("location:2.php?id=".$id);//header跳转
        else
         header("location:4.php?id=".$id);//header跳转         
      }
     }
    echo "</table></b>";     
    echo "</font>";     
     
?>    
 </body>
</html>
