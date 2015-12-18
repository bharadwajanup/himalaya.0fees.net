<?php
include "header.php";
$package = $_GET['package'];
$query = "select * from itinerary where description='$package' LIMIT 1";
$res = $connection->query($query);
$values = $res->fetch();
?>
<script type="text/javascript">
            $(function() {
				$('.hoverChange').hover(function()
				{
					$(this).addClass('active');
				},function(){ $(this).removeClass('active');});
				

			})
			</script>
<div class="container">
<div class="jumbotron">
  <h1><?php echo $package ?><small> Tour Code: NA</small><small> Number of Days: <?php echo $values['Number_of_days']; ?></small></h1>
  <button class="btn btn-info pull-right">Book Now!!</button>
  
</div> 
<div class="page-header">
  <h1>Places Covered</h1>
</div>
<div class="row">
<div class="col-md-9 EvenHeight">






  <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
     
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <?php
	$query_count = "select count(*) from places p, package_names pn, package2places pp where p.ID = pp.places_id and pn.ID = pp.package_id and pn.description = '$package'";
	$res = $connection->prepare($query_count);
	$res->execute();
	$count = $res->fetch();
	for($i=1; $i<$count[0];$i++)
	{
		print "<li data-target=\"#myCarousel\" data-slide-to=\"$i\"></li>\n";
	} 
	 ?>
      </ol>
      <div class="carousel-inner">
      <?php
	  
	  	$query = "select place_name, place_description, photo_location from places p, package_names pn, package2places pp where p.ID = pp.places_id and pn.ID = pp.package_id and pn.description = '$package'";	
		 $res = $connection->prepare($query);
		$res->execute();
		$first = $res->fetch();
		  $i = 1;
		  echo "<div class=\"item active\">
          <img src=\"$first[2]\"  alt=\"First slide\">
          <div class=\"container\">
            <div class=\"carousel-caption\" style=\"background: rgba(0,0,0,0.5);\">
              <h1>".$first['place_name']."</h1>
              <p>".$first['place_description']."</p>
              <!--<p><a class=\"btn btn-large btn-primary\" href=\"packages.php?package=$first[1]\">Book Now!</a></p>-->
            </div>
          </div>
        </div>";$i+=1;
		 while(($first = $res->fetch()))
		  {
			  echo "<div class=\"item\" >
          <img src=\"$first[2]\" alt=\"Second slide\">
          <div class=\"container\">
            <div class=\"carousel-caption\" style=\"background: rgba(0,0,0,0.5);\" >
              <h1 style=\"color:white;\">".$first['place_name']."</h1>
              <p style=\"color:white;\">".$first['place_description']."</p>
              <!--<p><a class=\"btn btn-large btn-primary\" href=\"packages.php?package=$first[1]\">Learn more</a></p>-->
            </div>
          </div>
        </div>"; $i+=1;
		  }
		  $i=0;
	  
	  
	  ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->














</div>
<div class="col-md-3">
<!--<div class="panel panel-default">
<div class="panel-body" style="min-height:400px;"> -->
<?php
$query = "select place_name, place_description, photo_location from places p, package_names pn, package2places pp where p.ID = pp.places_id and pn.ID = pp.package_id and pn.description = '$package'";
foreach($connection->query($query) as $values1)
{
	echo "<a href=\"#\" class=\"list-group-item hoverChange\" data-target=\"#myCarousel\" data-slide-to=\"$i\"><h4>$values1[0]</h4></a>";
	$i+=1;
}
?>
<!--</div></div> -->
</div>
</div>
<hr />
<div class="row">
<div class="col-md-6">
<div class="alert alert-info"><h3>Please Note:</h3> <?php echo $values['note'];?></div>
</div>
<div class="col-md-6">
<h2>Price <small>(INR)</small></h2>
<table class="table table-bordered">
<tr>
<th colspan="2">On Season</th>
<th colspan="2">Off Season</th>
</tr>
<tr>
<th>Standard</th>
<th>Deluxe</th>
<th>Standard</th>
<th>Deluxe</th>
</tr>
<tr>
<td><?php echo $values[7] ?></td>
<td><?php echo $values[8] ?></td>
<td><?php echo $values[9] ?></td>
<td><?php echo $values[10] ?></td>
</tr>
</table>
<button class="btn btn-lg btn-info pull-right">Book Now!!</button>
</div>
</div>
<hr />
<table class="table table-bordered table-hover table-striped">
<tr>
<th>Day</th>
<th>Schedule</th>
</tr>
<?php
$file_contents = file_get_contents("admin/$package");
$array_of_events = unserialize($file_contents);
for($j=0;$j<count($array_of_events);$j+=1)
	{
		echo "<tr><td><p>".($j+1)."</p></td><td><p>$array_of_events[$j]</p></td></tr>";
	}
?>
</table>
<hr />
<div class="row">
<div class="col-md-6">
<div class="alert alert-success"><h3>Cost Includes:</h3><?php echo $values['cost_includes']; ?></div>
</div>
<div class="col-md-6">
<div class="alert alert-danger"><h3>Cost Excludes:</h3><?php echo $values['cost_includes']; ?></div>
</div>
</div>
<hr />
<?php
/*foreach($connection->query($query) as $values1)
{
echo "<div class=\"panel panel-default\"><div class=\"panel-body\" id=\"$values1[0]\"><div class=\"col-md-3\"><img src=\"http://placehold.it/250x170\" /></div><h4>$values1[0]</h4><p>$values1[1]</p></div></div>";
} */
?>
<button class="btn btn-lg btn-info pull-right">Book Now!!</button>
<div style="height:70px;"></div>
</div>
<?php include "footer.php" ?>

