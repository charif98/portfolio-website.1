<?php  

include ("connect.php");

session_start();

if (isset($_GET['action']) && $_GET['action'] == "logout"){
  session_destroy();
  header("location: portfolio1.php");
}




if(isset($_POST['loginform'])){ 

  $gebruikersnaam = filter_var($_POST['gebruikersnaam'],FILTER_SANITIZE_STRING);
  $wachtwoord = filter_var($_POST['wachtwoord'],FILTER_SANITIZE_STRING);

  $query = $conn->prepare("
    SELECT COUNT(`ID`) FROM `users`
    WHERE `gebruikersnaam` = :gebruikersnaam
    AND `wachtwoord` = :wachtwoord
  "); 
  $query->bindValue(':gebruikersnaam', $gebruikersnaam);
  $query->bindValue(':wachtwoord', $wachtwoord);
  $query->execute();
  $count = $query->fetchColumn();

  if($count == "1"){
    $_SESSION['login_user'] = $gebruikersnaam;
    header('Location: portfolio1.php');
    exit;
  } else{
    echo "verkeerde gebruikersnaam";
  }
}

// register
if(isset($_POST['registerform'])){ 

  $gebruikersnaam = filter_var($_POST['gebruikersnaam'],
    FILTER_SANITIZE_STRING);
  $wachtwoord = filter_var( $_POST['wachtwoord'],
    FILTER_SANITIZE_STRING);
  // anti hack filter

  $query = $conn->prepare("
    INSERT INTO `users` (gebruikersnaam,wachtwoord) 
    VALUES (:gebruikersnaam, :wachtwoord)
    ");

  $query->execute(array('gebruikersnaam' => $gebruikersnaam,
    'wachtwoord' => $wachtwoord));

  if($query){
    echo "gelukt";
  } else {
    echo "nope";
  }
}








?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
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
      background-color: red;
      color: #f5f5f5;
      padding: 32px;
      position: absolute;
      right: 0;
      bottom: 0;
      left: 0;
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
      
 
       
            <li><a href="#">LOG UIT</a></li>
          </ul>
        </li>
       
      </ul>
    </div>
  </div>
</nav>

 

   
<center>
<div id="band" class="container text-center">

<form action="" method="POST">
<input type="hidden" name="loginform" value="1">
<input type="text" name="gebruikersnaam" placeholder="Je gebruikersnaam">
<input type="password" name="wachtwoord" placeholder="Je wachtwoord">
<input type="submit" name="submit" value="login">
</form>
<br>
<br>
<br>
<br>

<form action="" method="POST">
<input type="hidden" name="registerform" value="1">
<label for="txt_gebruikersnaam">gebruikersnaam</label>
<input type="text" id="text_gebruikersnaam" name="gebruikersnaam"> 
  <br/> 
  <label for="txt_wachtwoord">wachtwoord</label>
  <input type="password" id"txt_wachtwoord" name="wachtwoord" placeholder="een wachtwoord">
  <br/>
  <input type="submit" name="submit" value="registeren">
</form>









<!-- Footer -->
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
</center>
</body>
</html>

