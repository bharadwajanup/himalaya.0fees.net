<?php include('header.php'); 
?>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script>
	 $(function() {
		 
		 $("#featurettes").click(function(){
			 window.location.replace("http://localhost/carousel/admin/modify.php?action=new&type=featurettes"); 
		 })
				

			})
	
	
	</script>

    <div id="content">
    <div class="page-header">
  <h1>Navigation Menus <small>Appears in all the pages</small></h1>
</div>
<table class="table table-hover table-bordered" id="navigation_table">
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>Last Modified</th>
<th>Action</th>
</tr>
<?php 
$query = "select * from navigation";
foreach($connection->query($query) as $values)
{
 echo "<tr><td>$values[0]</td><td>$values[1]</td><td>$values[2]</td><td>$values[4]</td><td><a href=\"modify.php?type=navigation&action=edit&id=$values[0]\">Edit</a> <a  href=\"#\">Delete</a></td></tr>";	
}
?>
</table>
<a href="addnew.php?table=navigation"><button type="button" class="btn btn-primary">Add New</button></a>
<div class="page-header">
  <h1>Featurettes <small>HomePage</small></h1>
</div>
<table class="table table-hover table-bordered" id="featurettes_table">
<tr>
<th>ID</th>
<th>Heading</th>
<th>Sub-Heading</th>
<th>Description</th>
<th>Image Link</th>
<th>Actions</th>
</tr>
<?php 
$query = "select * from featurettes";
foreach($connection->query($query) as $values)
{
 echo "<tr><td>$values[0]</td><td>$values[1]</td><td>$values[2]</td><td>$values[3]<td>$values[4]</td><td><a href=\"modify.php?type=featurettes&action=edit&id=$values[0]\">Edit</a> <a href=\"modify.php?type=featurettes&action=delete&id=$values[0]\">Delete</a></td></tr>";	
}
?>
</table>
<a href="addnew.php?table=featurettes"><button type="button" class="btn btn-primary" id="featurettes">Add New</button></a>

   
    </div>
    
    </div>
    
    

<div class="panel-footer">
 <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Himalayan India Tours and Travels, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
</div>
</body>
</html>