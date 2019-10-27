<?php require_once('../Connections/connect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO airroom2 (`In`, `Out`, Adult, Child) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['In'], "text"),
                       GetSQLValueString($_POST['Out'], "text"),
                       GetSQLValueString($_POST['Adult'], "text"),
                       GetSQLValueString($_POST['Child'], "text"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect) or die(mysql_error());

  $insertGoTo = "forms2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Maehongson Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css"> 
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container" style="background-color: #333333">
      <a class="navbar-brand" href="../index.html">Maehongson Hotel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="../index.html" class="nav-link">Home</a></li>
          <li class="nav-item active"><a href="rooms.html" class="nav-link">Rooms</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About Us</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            
            <div class="block-3 d-md-flex">
              <div class="image" style="background-image: url('../images/7385.jpg'); "></div>
              <div class="text">

                <h2 class="heading">Air Room</h2>
                <div class="price"><sup>฿</sup><span class="number">500</span><sub>/per night</sub></div>
                <ul class="specs mb-5">
                  <li><strong>Facilities:</strong> Closet with hangers, TV, Wifi, air conditioner, Water heater</li>
                  <li><strong>Size:</strong> 20m<sup>2</sup></li>
                  <li><strong>Bed Type:</strong> Two bed</li>
                </ul>
              </div>
              </div>
		  </div>
		</div>  
	  </div>
    </div>
	<div class="block-32">
    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
      <div class="row">
      <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
      <label for="checkin">Check In</label>
      <td><input type="date" name="In" value="" class="form-control"></td>
      </div>
      <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
      <label for="checkin">Check Out</label>
      <td><input type="date" name="Out" value="" class="form-control"></td>
 	  </div>
      <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
      <div class="row">
      <div class="col-md-6 mb-3 mb-md-0">
      <label for="checkin">Adults</label>
      <td><select name="Adult" class="form-control">
        <option value="1" >1</option>
        <option value="2" >2</option>
        <option value="3" >3</option>
        <option value="4" >4</option>
      </select></td>
    </div>
    <div class="col-md-6 mb-3 mb-md-0">
    <label for="checkin">Children</label>
      <td><select name="Child" class="form-control">
        <option value="0" >0</option>
        <option value="1" >1</option>
        <option value="2" >2</option>
        <option value="3" >3</option>
      </select></td>
    </div>
    </div>
    </div>     
    <div class="col-md-6 col-lg-3 align-self-end">
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Check Availability" class="btn btn-primary btn-block" class="form-control"></td>
    </tr>
  <input type="hidden" name="MM_insert" value="form1" class="form-control">
  </div>
  </div>
</form>
</div>
<p>&nbsp;</p>
</div>
    <footer class="footer">
      <div class="row" style="align-content: center; justify-content: center;">
        <h1 style="color: white;">@MaeHongSon Hotel.com</h1>
      </div>
    </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-migrate-3.0.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/jquery.waypoints.min.js"></script>
<script src="../js/jquery.stellar.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
  
<script src="../js/aos.js"></script>
<script src="../js/jquery.animateNumber.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="../js/google-map.js"></script>
<script src="../js/main.js"></script>

</body>
</html>