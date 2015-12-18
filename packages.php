<?php
include "header.php";
$package = $_GET['package'];
?>

<div class="container">
<div class="page-header">
  <h1>Himalayan India Tours and travels <small><?php echo $package; ?></small></h1>
</div>

<div class="carousel slide" id="carousel-example-generic" >
 <ol class="carousel-indicators"> <!-- indicators -->
 <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
 <?php
$query ="select count(*) from package_pictures where name='$package'";
	$res = $connection->prepare($query);
	$res->execute();
	$count = $res->fetch();
	for($i=1; $i<$count[0];$i++)
	{
		print "<li data-target=\"#carousel-example-generic\" data-slide-to=\"$i\"></li>\n";
	} 
	 ?>
	
 </ol>
 <!-- Wrapper for slides -->
  <div class="carousel-inner">
  
  <?php
  $query = "select * from package_pictures where name='$package'";
  $res = $connection->prepare($query);
	$res->execute();
	$values = $res->fetch();
  echo " <div class=\"item active\">
      <img src=\"$values[2]\" class=\"img-responsive\" />
      <div class=\"carousel-caption\">
        <h3>$values[4]</h3>
		<p>$values[5]</p>
      </div></div>";
	while(($values = $res->fetch()))
	{
	echo " <div class=\"item\">
      <img src=\"$values[2]\" class=\"img-responsive\" />
      <div class=\"carousel-caption\">
        <h3>$values[4]</h3>
		<p>$values[5]</p>
      </div></div>";	
	}
	
 ?>
 </div>
 <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="icon-next"></span>
  </a>
</div>
<div class="empty" style="height:50px;"></div>
<div class="row">
<?php
function get_packages($heading)
{
	global $connection;
	$query ="select * from package_names where heading='$heading'";
	foreach($connection->query($query) as $values)
	{
		echo " <p><a href=\"itinerary.php?package=$values[2]\">$values[2]</a></p>";
	}
}
$query = "select heading,photo_location from info where name='$package'";
$res1 = $connection->prepare($query);
$res1->execute();
while($values = $res1->fetch())
{
	echo " <div class=\"col-md-6\">  
 <div class=\"panel panel-default\">
  <div class=\"panel-heading\">
    <h3 class=\"panel-title\">$values[0]</h3>
  </div>
  <div class=\"panel-body\">
  <div class=\"col-md-6\">
  <div class=\"panel panel-default\">
  <div class=\"panel-body\">";
  get_packages($values[0]);
  echo "</div></div></div>
<div class=\"col-md-6\">
<div class=\"panel panel-default\">
  <div class=\"panel-body\">
  <img src=\"$values[1]\" />
  </div>
  </div>
  </div>
</div></div></div>
";
	
}
?>
</div><!-- row -->

</div> <!--End of Container -->
<?php include "footer.php";?>