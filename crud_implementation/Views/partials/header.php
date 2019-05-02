<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Hamro website</title>
    <meta name="description" content="Welcome to Hamro website">
    <meta name="author" content="Saurabh">

    <link rel="stylesheet" href="public/stylesheets/styles.css">
    <link rel="stylesheet" href="public/stylesheets/forms.css">

    <?php
        if(isset($_GET['page'])){
            $arr = explode('/',$_GET['page']);
            if(sizeof($arr) == 2){
                $sheet=htmlspecialchars('public/stylesheets/'.strtolower($arr[0]).'/'.strtolower($arr[1]).'.css');
                if(file_exists($sheet)){
                    echo '<link rel="stylesheet" href="'.$sheet.'">';
                }
            }
        }
    ?>

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
</head>

<body>
<header>
    <div class="row top">
        <div class="logo-container">
            <img src="public/images/logo.png" id="logo">
        </div>
       <!-- <div class="search-container">
           <!-- <form action="/search">
                <button type="submit"><i class="fas fa-search"></i></i></button>
                <input type="text" placeholder="Search.." name="search">
            </form>-->
        </div>
    </div>
    <div class="row bottom">
        <div class="col-left">
            <i id="home-btn" class="fas fa-home"></i>
        </div>
        <div class="col-right">
            <h1 class="text-red">HAMRO WEBSITE</h1>
        </div>
        <div class="col-cart">
            <i class="fas fa-shopping-basket"></i>
            <p>
                Total: <span>0</span>€
            </p>
            <form id="shopping-cart" method="POST">
                <div class="shopping-items">
                </div>
                <button type="submit" name="btn-pay-invoice" id="btn-pay">Pay</button>
            </form>
        </div>
    </div>
</header>
<div id="content-wrapp">
    <nav id="main-nav-bar">
        <?php
            if(isset($_SESSION['email'])){
                echo '<a id="logout" href="index.php?logout=true&page=site/login">Logout</a>';
            }else {
                echo '<a id="login" href="index.php?page=site/login">Login</a>';
                echo' <a href="index.php?page=site/signup">Registration</a>';
            }
        ?>
        
        <?php
            if(isset($_SESSION['email'])){
                echo '<a id="home" href="index.php">Welcome '.$_SESSION['email'].'</a>';
               echo '<a href="index.php?page=Item/index">Item List</a>';
            }else {
                //echo '<a id="home" href="index.php">Home</a>';
            }
 
                {
            
            }
      
       ?>
        <?php
            if(isset($_SESSION['admin_flag'])==1){
               
               
               echo '<a href="index.php?page=Item/new">New Item</a>';
            }else {
                echo '<a id="home" href="index.php">Home</a>';
            }
 
                {
            
            }
      
       ?>
       
        <!--<a href="index.php">Home</a>-
        <a href="index.php?page=Item/new">New Item</a>
        <a href="index.php?page=Item/index">Item List</a>
       -->
       
     
        <a href="index.php?page=site/aboutus">About us</a>
    </nav>