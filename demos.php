<?php
error_reporting(E_ALL);
$uploaddir = 'uploads/';

define('HOST_STUNNEL', '127.0.0.1');    // Secure connection, slower performance
                                        // All data is encrypted
                                        // Use '127.0.0.1' and not 'localhost'
 
define('DB_HOST', '127.0.0.1');         // Choose HOST_DIRECT or HOST_STUNNEL, depending on your application's requirements
 
define('DB_USER', 'root');    // MySQL account username
define('DB_PASS', 'root');    // MySQL account password
define('DB_NAME', 'cyberman');     // Name of database

  $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Some error occurred during connection " . mysqli_error($con));  
 
// if(!empty($_FILES)){
//   $uploadfile = $uploaddir . basename($_FILES['file']['name']);
//   $qu = "INSERT INTO images (id, name, path) VALUES (NULL," . $uploadfile.", uploads/".$uploadfile.")");
//   $result = mysqli_query($con, $query);
//   if (!$result) {
//         $message  = 'Invalid query: ' . mysql_error() . "\n";
//         $message .= 'Whole query: ' . $query;
//         echo($message . "before die");
//         die($message);
//     }

// }

  $query = "select * from cyberman.images";
  $result = mysqli_query($con, $query);
  if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        echo($message . "before die");
        die($message);
    }

  $query2 = "select * from cyberman.jobs";
  $result2 = mysqli_query($con, $query2);
  if (!$result2) {
        $message2  = 'Invalid query: ' . mysql_error() . "\n";
        $message2 .= 'Whole query: ' . $query2;
        echo($message2 . "before die");
        die($message2);
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Predictive Data Analytics for CyberManufacturing (3D Printing Scenario)</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Predictive Data Analytics for CyberManufacturing </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="#">Dataset Upload/Browse (3D images & printing jobs)</a></li>
            <li><a href="#">Analytics Repositories (Upload/Browse)</a></li>
            <li><a href="#">Runtime statistics</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="boot.html">Dataset Upload/Browse (3D images & printing jobs)<span class="sr-only">(current)</span></a></li>
            <li><a href="analytics.html">Analytics Repositories (upload/browse)</a></li>
            <li class="active"><a href="demos.php">Runtime Statistics</a></li>
            <!-- <li><a href="#">3D Images</a></li> -->
            <!-- <li><a href="printing.html">3D Printing Service</a></li> -->
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Demo Scenarios</h1>
          <h2 class="sub-header"></h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Image ID</th>
            <th>Image Preview</th>
            <th>Geometry</th>
            <th>Material Type</th>
            <th>Material Volume</th>
            <th>Lead Time Estimate</th>
            <!-- <th>Price</th> -->
          </tr>
        </thead>
        <tbody>
      <?php while($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td>
        <img src="<?php echo $row['name']; ?>" alt="" border=3 height=60 width=60></img></td>

          </td>
        <td><?php echo $row['geometry']; ?></td>
        <td><?php echo $row['material']; ?></td>
        <td><?php echo $row['volume']; ?></td>
        <td><?php echo $row['time']; ?></td>
        <!-- <td><?php echo $row['price']; ?></td> -->
      </tr>
                  <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Jobs</h1>
          <h2 class="sub-header"></h2>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Job ID</th>
            <th>User ID</th>
            <th>Image ID</th>
            <th>Price</th>
            <th>Printer ID</th>
          </tr>
        </thead>
        <tbody>
      <?php while($row = mysqli_fetch_array($result2)) { ?>
      <tr>
        <td><?php echo $row['jobid']; ?></td>
        <td><?php echo $row['userid']; ?></td>
        <td><?php echo $row['imageid']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['printerid']; ?></td>
      </tr>
            <?php } ?>
            <?php mysqli_close($con);?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/bootstrap.min.js"></script>
  </body>
</html>
      
