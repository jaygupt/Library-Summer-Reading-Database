<?php 
  include_once "includes/session.php"; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
    crossorigin="anonymous">

    <style>
        <?php include "site.css";?>
    </style>
    
    <title>SBL - <?php echo $title ?></title>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="index.php">
          <img src="images/sbl.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          SBL Summer Reading Program
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mr-auto">
            <a class="nav-link" href="index.php">Register <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="viewstudents.php">View Students</a>
          </div>
          <div class="navbar-nav ml-auto">
            <?php
              // if not logged in yet 
              if(!isset($_SESSION['userid'])) {
                
            ?>
              <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
            <?php } else { ?>
              <span class="nav-link">Hello, <?php echo $_SESSION['username']?>!</span>
              <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
            <?php } ?>
          </div>
        </div>
      </nav>
      <br>
      <br>
    