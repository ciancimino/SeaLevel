<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sea Level Builders</title>
    <!-- <link href="css/normalize.ccs" type="text/css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="css/styles.css" type="text/css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="___"> --> 
</head>
<body>
    <header>
        <img src="images/slblogo2.png" alt="Company Logo" class="logo">
    </header>
    <div class="topnav">
      <div class="topnav-wrapper">
        <p class="active">Menu</p>
        <!-- Navigation links (hidden by default) -->
        <div id="myLinks">
          <a href="index.php">Home</a>
          <a href="about.php">About</a>
          <a href="portfolio.php">Portfolio</a>
          <a href="testimonials.php">Testimonials</a>
          <a href="contact.php">Contact</a>
          <a href="careers.php">Careers</a>
        </div>
        <!-- end active -->
        <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      <!-- end top nav wrapper -->
    </div>
    <!-- end top nav -->

      <script>
            function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
        x.style.display = "none";
        } else {
        x.style.display = "block";
        }
        }
      </script>
      <!-- end dropdown script -->

