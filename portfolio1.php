<?php

include ('connect.php');

if(isset($_POST['submit']) && isset($_POST['titel']) && isset($_POST['content'])){


  $titel = $_POST['titel'];
  $content = $_POST['content'];

  $sql = "INSERT INTO `portfolio_items` (titel, content, date, active) VALUES (:titel, :content, NOW(),1)";

  $query = $conn->prepare($sql);
  $query->bindParam (':titel', $titel, PDO::PARAM_STR);
  $query->bindParam (':content', $content, PDO::PARAM_STR);
  $query->execute();

  echo"opgeslagen !";
}



$sql = "select titel, content FROM `portfolio_items`";
$query = $conn->prepare($sql);
$query->execute();
$items = $query->fetchAll();





foreach($items as $item){

 echo  $item['content'];


}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>C.C portfolio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  html,body {
 
 
  text-align:center;
}

h1 {
  font-size: 3em;
  font-weight: 200;
  margin: 0.5em 0 0.2em 0;
}

p {
  margin: 1.5em 0;
 
}

.thumbnail {
  max-width: 40%;
}


/** LIGHTBOX MARKUP **/

.lightbox {
  /** Default lightbox to hidden */
  display: none;

  /** Position and style */
  position: fixed;
  z-index: 999;
  width: 100%;
  height: 100%;
  text-align: center;
  top: 100px;
  left: 0;
  
}

.lightbox img {
  /** Pad the lightbox image */
  max-width: 200%;
  max-height: 190%;
  margin-top: 2%;
  text-align: center;
}

.lightbox:target {
  /** Remove default browser outline */
  outline: none;

  /** Unhide lightbox **/
  display: block;
}
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myPage">Charif Cherkaoui</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      
        <li><a href="#band">OVER MIJ</a></li>
        <li><a href="#tour">REACTIES</a></li>
        <li><a href="#contact">CONTACT</a></li>
       
           
          </ul>
        </li>
       
      </ul>
    </div>
  </div>
</nav>

 

   

<div id="band" class="container text-center">
  <h3>OVER MIJ</h3>
  <p><em>Charif Cherkaoui</em></p>
  <p>Mijn naam is Charif Cherkaoui ik ben 18 jaar oud ik zit op het Grafisch lyceum in utrecht ik volg de opleiding mediadeveloper. Dit is mijn tweede jaar van de studie dat houd in dat ik eind januari stage moet lopen waarop ik me verheug. Mijn intresse met het maken van websites begon toen ik 16 jaar was nadat ik me verdiepte in Web development. Het was meer dan logisch om een voor een studie te kiezen waar ik zou leren om te progammeren. Nu is het tijd om wat ik heb geleerd 







 
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong></strong></p><br>
   
      <div id="demo" class="collapse">
        <p>Guitarist and Lead Vocalist</p>
        <p>Loves long walks on the beach</p>
        <p>Member since 1988</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong></strong></p><br>
    
      <div id="demo2" class="collapse">
        <p>Drummer</p>
        <p>Loves drummin'</p>
        <p>Member since 1988</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong></strong></p><br>
   
      <div id="demo3" class="collapse">
        <p>Bass player</p>
        <p>Loves math</p>
        <p>Member since 2005</p>
      </div>
    </div>
  </div>
</div>


<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">REACTIES</h3>
  
  

 <center> 
 <?php
 $sql = "select titel, content FROM `portfolio_items`";
$query = $conn->prepare($sql);
$query->execute();
$items = $query->fetchAll();





foreach($items as $item){
?>
  <div class="media">
    <div class="media-left media-top">
      <img src="img_avatar1.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">

      <h4 class="media-heading"><?php echo  $item['titel']; ?></h4>
      <?php echo  $item['content']; ?>
    </div>
  </div>
  <hr>

<?php
 


}
?>



<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">zie hier de code</button> 


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Klik op de foto om in te zoomen</h4>
        </div>
        <div class="modal-body">

          <p><strong>dit is de code die ik heb gemaakt om reacties achter te laten op de website</strong></p>
           <a href="#img1">
  <img src="toevoegen.png" class="thumbnail">
</a>


<a href="#_" class="lightbox" id="img1">
  <img src="toevoegen.png">
</a>

       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
        </div>
      </div>
      
    </div>
  </div>

</div>





    <center>
    <form method="POST">
<input type="text" name="titel" placeholder="Titel">
<br/>
<textarea rows="5" name="content" placeholder="Content"></textarea>
 <input type="submit" name="submit" value="Submit">
  </div>
</div> </center>
  


<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  

  <div class="row">
    <div class="col-md-4">
      
      <p><span class="glyphicon glyphicon-map-marker"></span>Utrecht</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +06 34109624</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: charifcherkaoui@hotmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <h3 class="text-center">LOCATIE</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Charif</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Charif Cherkaoui, </h2>
      <p>dit is waar ik op school zit</p>
      <br>
      Kon. Wilhelminalaan 7, 3527 LA Utrecht
    </div>
   </div>
</div>

<div id="googleMap"></div>

<!--Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(52.0770376, 5.1040529);

function initialize() {
var mapProp = {
center:myCenter,
zoom:15,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
position:myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>


<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Copyright &copy; Charif Cherkaoui 2016</p>
</footer>

<script>
$(document).ready(function(){

  $('[data-toggle="tooltip"]').tooltip();
  

  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

  
    if (this.hash !== "") {

  
      event.preventDefault();

      var hash = this.hash;


      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
      
        window.location.hash = hash;
      });
    } 
  });
})
</script>

</body>
</html>

