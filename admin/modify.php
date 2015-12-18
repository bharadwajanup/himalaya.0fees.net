<?php include('header.php'); 

if(isset($_GET['action']))
{
	$action=$_GET['action'];
}
$table = $_GET['type'];
$id = $_GET['id'];

$query ="select * from $table where ID=$id";
$i=0;
if(isset($_GET['msg']))
{
	if($_GET['msg'] == 'success')
	{
		echo "<div class=\"alert alert-success alert-dismissable\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
  <strong>Success!</strong> The Changes are successfully Updated!
</div>";
	}
	else
	{
		echo "<div class=\"alert alert-danger alert-dismissable\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
  <strong>Oops!</strong>Update Fail!
</div>";
	}
}
?>
<div class="container">
<div class="col-md-10">
<form role="form" action="update.php?table=<?php echo $table ?>&id= <?php echo $id?>" method="post">
<?php
$select = $connection->query($query);
$values = $select->fetch();
while(($meta = $select->getColumnMeta($i)))
{
	$temp = $select->getColumnMeta($i);
	if($temp['name'] == 'timestamp' || $temp['name'] == 'ID' )
	{
		echo "<div class=\"form-group\">
    <label>".$temp['name']."</label>
     <p class=\"form-control-static\">".$values[$temp['name']]."</p>
  </div>";
	}
	else
	{
	echo "<div class=\"form-group\">
    <label>".$temp['name']."</label>
    <input type=\"text\" class=\"form-control\" id=\"exampleInputEmail1\" value=\"".$values[$temp['name']]."\" name=\"".$temp['name']."\">
  </div>";
	}
  $i+=1;
}
?>
<button type="submit" class="btn btn-primary btn-lg">Submit</button>
</form>
</div>
</div>
<?php include('../footer.php');?>