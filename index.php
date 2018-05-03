!DOCTYPE html>
<html lang="en">
<head>

  <title>Smart Agriculture</title>
  <?php include("main.php")?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  </style>
<script type="text/javascript">
  function displayQuote() {
document.getElementById("xv").value = "I came, I saw, I conquered";
}


</script>
</head>
<body>

<!-- Navbar -->
<div class="container-fluid bg-3">
<nav class="navbar  navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a  style="font-weight:bold; font-size:20px;color:red;" class=" navbar-brand" href="#">Smart Agriculture Dashboard</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="opv.html">Our Project Vision</a></li>
        <li><a href="opg.html">Our Project Guide</a></li>
      </ul>
    </div>
  </div>
</nav>

</div>


<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-4">
      <p class="imageTop" >Temperature</p>

      <img src="images/mythermo.png" class="img-responsive img-rounded" style="width:100%;" alt="temperature">
      <p class="sensorValue"><?php echo $temprature?>*C</p>
   </div>

    <div class="col-sm-4">
      <p class="imageTop">Humidity</p>

      <img src="images/hum.png" class="img-rounded img-responsive" ="width:100%" alt="humidity">
      <p class="sensorValue"> <?php echo round($humi,1)?>%</p>

    </div>
    <div class="col-sm-4">
      <p class="imageTop" >Soil Moisture</p>
      <img src="images/mymoist.png" id="xv" class="img-responsive img-rounded" style="width:100%" alt="Moisture"  onmouseover="displayQuote();">
      <p class="sensorValue"> <?php echo $statement ?> </p>
    </div>

    <a href="#" style="font-weight:bold; margin-top:70px;"class="btn btn-default btn-lg">
    <span style="font-size:30px; padding-top:10px;" class="glyphicon glyphicon-facetime-video"></span><br>Histogram <br> Analysis</a>


  </div>
</div>










<!-- Footer -->
<footer class="container-fluid bg-4  text-center">

<p  style="font-size: 15px">Follow as at</p>
<div class="container footer text-center">
    <a  href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-youtube"></i></a>
    <a href="#"><i class="fa fa-instagram"></i></a>
  </div>

<p  style="font-size: 13px">Crafted by <a style="font-size:12px" href="#">#smarbuddy group</a></p>

</footer>



</body>
</html>

