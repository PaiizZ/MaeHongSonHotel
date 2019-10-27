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

mysql_select_db($database_connect, $connect);
$query_airroom = "SELECT * FROM airroom, `forms` ORDER BY forms.ID desc limit 1";
$airroom = mysql_query($query_airroom, $connect) or die(mysql_error());
$row_airroom = mysql_fetch_assoc($airroom);
$totalRows_airroom = mysql_num_rows($airroom);

mysql_free_result($airroom);
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
    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
      <div class="site-section bg-light">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <td nowrap align="right"><b>First Name:</b></td>
                  <td class="form-control"><?php echo $row_airroom['fname']; ?></td>
                </div>
                <div class="form-group col-md-4">
                  <td nowrap align="right"><b>Last Name:</b></td>
                  <td class="form-control"><?php echo $row_airroom['lname']; ?></td>
                </div>
                <div class="form-group col-md-2">
                  <td nowrap align="right"><b>Gender:</b></td>
                  <?php echo $row_airroom['gender']; ?><br>
                </div>
                <div class="row">
                  <div class="form-grounp col-md-6">
                    <label for="checkin"><b>Check In:</b></label>
                    <td class="form-control"><?php echo $row_airroom['In']; ?></td>
                  </div>
                  <div class="form-grounp col-md-6">
                    <label for="checkin"><b>Check Out:</b></label>
                    <td class="form-control"><?php echo $row_airroom['Out']; ?></td>
                  </div>
                  <div class="form-grounp col-md-6">
                    <label for="checkin"><b>Adults:</b></label>
                    <td class="form-control"><?php echo $row_airroom['Adult']; ?></td>
                  </div>
                  <div class="cform-grounp col-md-6">
                    <label for="checkin"><b>Children:</b></label>
                    <td class="form-control"><?php echo $row_airroom['Child']; ?></td>
                  </div>
                </div>
              </div>
              <b>Arddress:</b><br>
              <td><?php echo $row_airroom['arddress']; ?></td><br>
              <b>Arddress2:</b><br>
              <td><?php echo $row_airroom['arddress2']; ?></td><br>
              <b>Tel:</b><br>
              <td><?php echo $row_airroom['tel']; ?></td>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <tr valign="baseline">
                <td nowrap align="right"><b>City:</b></td><br>
                <td class="form-control"><?php echo $row_airroom['city']; ?></td>
              </tr>
            </div>
            <div class="form-group col-md-4">
              <tr valign="baseline">
                <td nowrap align="right"><b>State:</b></td><br>
                <td class="form-control"><?php echo $row_airroom['state']; ?></td>
              </tr>
            </div>
            <div class="form-group col-md-2">
              <tr valign="baseline">
                <td nowrap align="right"><b>Zip:</b></td><br>
                <td class="form-control"><?php echo $row_airroom['zip']; ?></td>
              </tr>

            </div>
          </div>

        </div>
      </div>
      </div>
      </div>
      </div>
      </div>
    </form>
    <footer class="footer">
      <div class="row" style="align-content: center; justify-content: center;">
        <h1 style="color: white;">@MaeHongSon Hotel.com</h1>
      </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


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