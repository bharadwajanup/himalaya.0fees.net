<?php include('header.php'); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script>
	 $(function() {
		 $("#Number_of_days").focus(function()
		 {
			 $("#day_entry").html("");
		 })
		 
		 $("#Number_of_days").blur(function(){
			var days = $("#Number_of_days").val();
			for(i=1; i<=days; i++)
			{
				var eachDay = "<div class=\"form-group\"><label>Day "+i+"</label><textarea class=\"form-control\" name=\"day"+i+"\" id=\"day"+i+"\" rows=\"3\"></textarea></div>";
				$("#day_entry").append(eachDay);
				$("#day1").focus();
				
			}
			//$("#day_entry").append("<button id=\"serialize\" class=\"btn btn-danger\">Serialize </button>");
		 })
		 
				

			})
	
	
	</script>



<?php
if(isset($_GET['msg']))
{
	if($_GET['msg'] == 'success')
	{
		echo "<div class=\"alert alert-success alert-dismissable\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
  <strong>Success!</strong> New Entry was successfully inserted!
</div>";
	}
	else
	{
		echo "<div class=\"alert alert-danger alert-dismissable\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
  <strong>Oops!Insert Fail!</strong> Please check whether your data is proper or not.
</div>";
	}
} 
$table = $_GET['table'];
$query = "select * from $table";
$select = $connection->query($query);
$i=0;
?>
<div class="container">
<div class="page-header">
  <h1>Add New Entry to <?php echo $table;?></h1>
</div>
<div class="col-md-10">
<form role="form" action="insert.php?table=<?php echo $table?>" method="post">
<?php
while(($meta = $select->getColumnMeta($i)))
{
	$temp = $select->getColumnMeta($i);
	if($temp['name'] == 'ID')
	{
		
	}
	else if($temp['name'] == 'description')
	{
		
		$query = "select description from package_names";
		echo "<div class=\"form-group\">
    <label>".$temp['name']."</label>
	<a href=\"addnew.php?table=package_names\">Add New Package</a>
    <select class=\"form-control\" name=\"".$temp['name']."\">
  </div>";
  foreach($connection->query($query) as $v)
  {
	  echo "<option value=\"$v[0]\">$v[0]</option>";
  }
  echo "</select>";
	}
	else if($temp['name'] == 'Number_of_days')
	{
		echo "<div class=\"form-group\">
    <label>".$temp['name']."</label>
    <input type=\"text\" class=\"form-control\" name=\"".$temp['name']."\" id=\"".$temp['name']."\">
  </div>";
  		echo "<div id=\"day_entry\"></div><div id=\"store_msg\"></div>";
		
	}
	else
	{
		echo " <div class=\"form-group\">
    <label>".$temp['name']."</label>
    <input type=\"text\" class=\"form-control\" name=\"".$temp['name']."\" id=\"".$temp['name']."\">
  </div>";
	}
	$i+=1;
}

?>
<button type="submit" class="btn btn-primary btn-lg">Submit</button>
</form> 
</div>
</div>
</body>
</html>