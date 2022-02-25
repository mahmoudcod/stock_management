<?php


require_once 'php_action/core.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>stock management system</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/font/css/all.min.css">
    <link rel="stylesheet" href="assets/font/css/fontawesome.min.css">
    <link rel="stylesheet" href="custom/css/custom.css">
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput.min.css">
    <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput-rtl.min.css">

<!-- ad the script file -->
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <!--  jquery ui -->
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
    <script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
    <!-- bootstrap javascript -->
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- start work -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
        
      </ul>
      <ul class="nav navbar-nav navbar-right" id="navSettings">
         <li id="navDashboard"><a href="index.php"> <i class="glyphicon glyphicon-list-alt"></i>Dashboard</a></li>
        <li id="navBrand"><a href="brand.php"> <i class="glyphicon glyphicon-btc"></i>Brand</a></li>
         <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i>Categories</a></li>
         <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i>Product</a></li>
         <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i>Report</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavSettings"><a href="settings.php"><i class="glyphicon glyphicon-wrench"></i>settings</a></li>
            <li id="topNavLogout"><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
