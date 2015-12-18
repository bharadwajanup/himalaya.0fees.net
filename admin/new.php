<?php include('header.php');

?>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script>
	 $(function() {
		 
		$("#navbar").change(function(){
		if($("#navbar").val() == "Add New")
		{
			//alert("Populate new entry creation for navigation");
			$("#navigation_filler").load("addnew.php?table=navigation");
		}
		else
		{
			alert("Populate the form according to the entry "+$("#navbar").val());
		}
			
		})
				

			})
	
	
	</script>

<div class="container">
<form action="" method="post" role="form">
<div class="form-group">
<label for="navigation">Navigation Menu</label>
<select class="form-control" id="navbar">
<?php
$query = "select name from navigation";
foreach($connection->query($query) as $values)
{
	echo "<option value=\"$values[0]\">$values[0]</option>";
}
?>
<option value="Add New">Add New</option>
</select>
</div>
<div id="navigation_filler">
</div>
</form>
</div>