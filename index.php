<?php include('includes/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Best Tours and travels in India</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <style>
	body
	{
background: rgb(252,255,244); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(252,255,244,1) 0%, rgba(223,229,215,1) 40%, rgba(179,190,173,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,255,244,1)), color-stop(40%,rgba(223,229,215,1)), color-stop(100%,rgba(179,190,173,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 ); /* IE6-9 */

	}
	#trip {
    -webkit-transform: rotate(270deg);
    -moz-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
}
	</style>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
 <!-- <button type="button" class="btn-lg" style="position:fixed; left:-4%; top:50%; z-index:2;" id="trip">Trip Planner</button>
  <div class="planner" style="position:fixed; top:50%; z-index:2;">
  <form action="" method="get">
  <input type="text" placeholder="From" /><br />
  <input type="text" placeholder="To" /><br />
  <button type="button" class="btn btn-default">Submit</button>
  </form>
  </div> -->
  
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Site Under Construction</h4>
      </div>
      <div class="modal-body">
        Please Contact +91(0)7207299922 or email at care@himalayanindia.com to know more about the Packages and services. Thank you.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
  
  

    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             <a class="navbar-brand" href="index.php">Himalayan</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <?php 
         
		  $query ="select * from navigation";
		 
		 foreach($connection->query($query) as $values)
		  {
			  echo "<li><a href=\"packages.php?package=".$values['name']."\">".$values['name']."</a></li>";
		  }
          ?>
            
        <!--    <li><a href="domestic.html">Domestic Tours</a></li>
            <li><a href="international.html">International Tours</a></li>
            <li data-toggle="modal" data-target="#myModal"><a  href="#">Adventure Tours</a></li>
            <li><a href="honeymoon.html">Honeymoon Packages</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More..<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li data-toggle="modal" data-target="#myModal"><a href="#">Devotional Tours</a></li>
                
                <li data-toggle="modal" data-target="#myModal"><a href="#">Weekend Getaways</a></li> -->
               
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a></li>
            <li data-toggle="modal" data-target="#myModal"><a href="#">Contact Us</a></li>
          </ul>
        </div><!--/.nav-collapse -->
          </div>
        </div>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
     
      <ol class="carousel-indicators"> <!-- Make the indicators dynamic
        <!-- Indicators 
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>-->
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <?php
	$query ="select count(*) from navigation";
	$res = $connection->prepare($query);
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
	  
	  		$query ="select * from navigation";
		 $res = $connection->prepare($query);
		$res->execute();
		$first = $res->fetch();
		  $i = 1;
		  echo "<div class=\"item active\">
          <img src=\"$first[3]\"  alt=\"First slide\">
          <div class=\"container\">
            <div class=\"carousel-caption\" style=\"background: rgba(0,0,0,0.5);\">
              <h1>".$first['name']."</h1>
              <p>".$first['description']."</p>
              <p><a class=\"btn btn-large btn-primary\" href=\"packages.php?package=$first[1]\">Book Now!</a></p>
            </div>
          </div>
        </div>";$i+=1;
		 while(($first = $res->fetch()))
		  {
			  echo "<div class=\"item\" >
          <img src=\"$first[3]\" alt=\"Second slide\">
          <div class=\"container\">
            <div class=\"carousel-caption\" style=\"background: rgba(0,0,0,0.5);\" >
              <h1 style=\"color:white;\">".$first['name']."</h1>
              <p style=\"color:white;\">".$first['description']."</p>
              <p><a class=\"btn btn-large btn-primary\" href=\"packages.php?package=$first[1]\">Learn more</a></p>
            </div>
          </div>
        </div>"; $i+=1;
		  }
		  $i=1;
	  
	  
	  ?>
    <!--  class=\"img-responsive\"  <div class="item active">
          <img src="carousel_images/1.jpg"  alt="First slide">
          <div class="container">
            <div class="carousel-caption" style="background: rgba(0,0,0,0.5);">
              <h1>Domestic Tours</h1>
              <p>Rediscover India with the wide range of domestic tours starting from Bangalore, Hyderabad and Chennai.</p>
              <p><a class="btn btn-large btn-primary" href="domestic.html">Book Now!</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="carousel_images/2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption" >
              <h1 style="color:black;">Honeymoon Packages</h1>
              <p style="color:black;">A series of exotic vacation spots for the lucky newlyweds, at bargain prices!</p>
              <p><a class="btn btn-large btn-primary" href="honeymoon.html">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="carousel_images/3.jpg" >
          <div class="container">
            <div class="carousel-caption" style="background: rgba(0,0,0,0.5);" alt="Third slide" >
              <h1>Adventure Tours</h1>
              <p>Pack your bags and get ready for some Adrenaline Rush</p>
              <p data-toggle="modal" data-target="#myModal"><a class="btn btn-large btn-primary" href="#">Get Started</a></p>
            </div>
          </div>
        </div>
         <div class="item">
          <img src="carousel_images/4.jpg" >
          <div class="container">
            <div class="carousel-caption" style="background: rgba(0,0,0,0.5);" alt="Third slide">
              <h1>Devotional Tours</h1>
              <p>Choose from a variety of tour packages to the pilgrimage centres of India.</p>
              <p data-toggle="modal" data-target="#myModal"><a class="btn btn-large btn-primary" href="#">Book Now</a></p>
            </div>
          </div>
        </div>
         <div class="item">
          <img src="carousel_images/5.jpg"  alt="Third slide">
          <div class="container">
            <div class="carousel-caption" style="background: rgba(0,0,0,0.5);">
              <h1>International Tours</h1>
              <p>Europe or Middle East, Singapore or USA, We have got all the things required for your fun-filled vacation</p>
              <p><a class="btn btn-large btn-primary" href="international.html">Browse Packages</a></p>
            </div>
          </div>
        </div> -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
      
      <?php
	  $query = "select * from featurettes";
	  foreach($connection->query($query) as $values)
	  {
		  if($values[0]%2 == 1)
		  {
			  echo " <div class=\"row featurette\">
        <div class=\"col-md-7\">
          <h2 class=\"featurette-heading\">$values[1]<span class=\"text-muted\">$values[2]</span></h2>
          <p class=\"lead\">$values[3]</p>
        </div>
        <div class=\"col-md-5\">
          <img src=\"$values[4]\" alt=\"Generic placeholder image\">
        </div>
      </div> <hr class=\"featurette-divider\">";
		  }
		  else
		  {
			echo " <div class=\"row featurette\">
			<div class=\"col-md-5\">
          <img src=\"$values[4]\" alt=\"Generic placeholder image\">
        </div>
        <div class=\"col-md-7\">
          <h2 class=\"featurette-heading\">$values[1]<span class=\"text-muted\">$values[2]</span></h2>
          <p class=\"lead\">$values[3]</p>
        </div>
        
      </div> <hr class=\"featurette-divider\">";  
		  }
	  }
	  ?>
      

   <!--   <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Attractive Prices <span class="text-muted">with no compromise in quality</span></h2>
          <p class="lead">Always get your money's worth when you choose Himalayan India Tours and Travels.</p>
        </div>
        <div class="col-md-5">
          <img src="img/domestic/1.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img src="img/domestic/rsz_2.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Multiple Starting points. <span class="text-muted">Easy Accessibility.</span></h2>
          <p class="lead">Almost all the packages have multiple starting points which help you choose the nearest point to start your wonderful vacation.</p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Special Packages. <span class="text-muted">for students and LFC tours.</span></h2>
          <p class="lead">We offer special customized packages to benefit your LFC policies. We also offer special facilities for student tours. </p>
        </div>
        <div class="col-md-5">
          <img src="img/domestic/3.png" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider"> -->

      <!-- /END THE FEATURETTES -->



      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-thumbnail" src="img/rsz_tt.jpg"  alt="Generic placeholder image">
          <h2>Tours and Travels</h2>
          <p>Domestic tours, Local Sightseeing, special student packages, International Tours, We have got them all.</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-thumbnail" src="img/rsz_carcoach.jpg"  alt="Generic placeholder image">
          <h2>Car or Coach Rentals</h2>
          <p>Choose from the wide variety of cars and coaches to suit your travel needs</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-thumbnail" src="img/rsz_hotel.jpg" alt="Generic placeholder image">
          <h2>Hotel Bookings</h2>
          <p>On a Vacation? Need a place to stay? Click the button to know more!</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div> <!-- /.col-lg-4 --> 
      </div><!-- /.row -->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->









    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
   <!-- <script>
	$(document).ready(function(){
		$(".planner").hide();
		$("#trip").click(function(){
		
		$(".planner").toggle(1000);
		$("#trip").animate({left:'150px'},1000);
		})
		
		
		
		});
	</script> -->
  </body>
</html>
<?php $connection = null; ?>
