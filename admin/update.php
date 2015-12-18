<?php include('header.php');
$table = $_GET['table'];
$id= $_GET['id'];
$sql = "UPDATE $table SET ";
$query = "select * from $table";
$res = $connection->query($query);
$i=0;
while($meta = $res->getColumnMeta($i))
{
	if($meta['name'] == 'timestamp' || $meta['name'] == 'ID' )
	{
	}
	else
	{
	$sql = $sql.$meta['name']."= '".$_POST[$meta['name']]."',";
	
	}
	$i+=1;
}
$sql = rtrim($sql, ",");
$sql.=" where ID=$id";
try
{
if($sql=$connection->query($sql))
{
	echo "success";
	header("location:modify.php?msg=success&type=$table&id=$id");
}
else
{
	echo "failure";
	header("location:modify.php?msg=fail&type=$table&id=$id");
}
}catch(exception $e)
{
	echo "could not Perform the transaction.\n".$e;
}
?>