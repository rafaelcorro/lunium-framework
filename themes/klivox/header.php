<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo constant('TITLE');?></title>
  
    <?php
    $baseurl=constant('PROTOCOL')."://" . $_SERVER['SERVER_NAME'] . "/".constant('DIRECTORY')."/";
    echo "<base href='".$baseurl."' />";
    ?>

  <!-- Bootstrap core CSS -->
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template 
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
-->
  <!-- Custom styles for this template -->
  <link href="themes/klivox/css/klivox.css" rel="stylesheet">
  <!--JQuery-->
  <link href="vendor/components/jqueryui/themes/base/jquery-ui.min.css" rel="stylesheet">
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="vendor/components/jqueryui/jquery-ui.min.js"></script>
  <!--Bootstrap-->
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--toogle Switches  require jquery-->
  <link href="vendor/nostalgiaz/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
  <script src="vendor/nostalgiaz/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
  <!--fortawesome icons-->
  <link href="vendor/fortawesome/font-awesome/css/all.min.css" rel="stylesheet">
  <script src="vendor/fortawesome/font-awesome/js/all.min.js"></script>
  <!----------------------------------->
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><?php echo constant("TITLE"); ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
          
        <?php 
        $navbar=new Navbar();
        echo $navbar->menu();
        ?>
     
      </div>
    </div>
  </nav> 
  <section id="content">