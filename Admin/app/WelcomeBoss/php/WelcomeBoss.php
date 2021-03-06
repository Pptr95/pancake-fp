<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Welcome Boss</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" title="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="../css/WelcomeBoss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style media="screen">
  #drop {
    background-color: white;
  }

  #logout {
    color:black;
  }
</style>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['admin']["email"])) {
  header("location: ../../../../Users/login.php");
}

 ?>
<div class="container">
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <span onclick="Logout()" class="glyphicon glyphicon-log-out"><p id="logout">Logout</p></span>
  </div>
  <div class="row">
  <br/>
  <br/>
     <nav class="navbar navbar-inverse">
      <div class="container-fluid">
       <div class="navbar-header">
        <img id="logo" src="https://fpwealth.com/wp-content/uploads/2015/09/fp-logo-large.png" width="50" height="50" alt="logo">
       </div>
       <div class="navbar-header">
        <a class="navbar-brand" href="#">Welcome Boss</a>
       </div>
       <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span id="mail" class="glyphicon glyphicon-envelope" style="font-size:20px;"></span></a>
         <ul id="drop" class="dropdown-menu">
           <li class="divider"></li>
         </ul>
        </li>
       </ul>
      </div>
     </nav>
   </div>

  <div class="row2">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <a href="../../ManageMarket/html/ManageMarket.php" class = "btn btn-default btn-lg" role="button">Manage Market</a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <a href="../../ManageStaff/php/ManageStaff.php" class = "btn btn-default btn-lg" role="button">Manage Staff</a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <a href="../../NewNotification/html/NewNotification.php" class = "btn btn-default btn-lg" role="button">New Notification</a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <a href="../../ViewOrders/html/AllOrders.php" class = "btn btn-default btn-lg" role="button">View Orders</a>
    </div>
  </div>
  <div class="row3">

  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }

  load_unseen_notification();

 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){
  load_unseen_notification();
}, 1000);

});

function GoToOrder(id) {
  window.location.href ="../../ViewOrders/ViewSpecificOrder/php/ViewSpecificOrderNotification.php?" + "id=" + id;
}

function DeleteNotification(id){
  //Ajax request
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        load_unseen_notification();
      }
  };
  var PageToSendTo = "DeleteNotification.php?";
  var VariablePlaceholder = "id=";
  var UrlToSend = PageToSendTo + VariablePlaceholder + id;
  xmlhttp.open("GET", UrlToSend, true);
  xmlhttp.send();
}

function ViewAllNotification() {
    window.location.href ="ViewAllNotification.php";
}


  function Logout() {
    window.location.href = "../../DeliveryMan/php/DestroySession.php";
  }

</script>
</body>
</html>
