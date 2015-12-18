<!DOCTYPE html>
<html>
  <head>
    <title>Himalayan Tours and Travels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen" >
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    
     <script type="text/javascript">
            $(function() {
				$('.carousel').carousel()

			})
			</script>
            <style>
			html
			{
				
			}
			.panel-body
			{
				min-height:200px;
			}
			</style>
      
    
  </head>
  <body>

      <div class="navbar navbar-default">
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
         include "includes/connection.php";
		  $query ="select * from navigation";
		 
		 foreach($connection->query($query) as $values)
		  {
			  echo "<li><a href=\"packages.php?package=".$values['name']."\">".$values['name']."</a></li>";
		  }
          ?>
               
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.html">Home</a></li>
            <li data-toggle="modal" data-target="#myModal"><a href="#">Contact Us</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  