<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'link.php' ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="book" id="book">

<h1 class="heading">
    <span>b</span>
    <span>o</span>
    <span>o</span>
    <span>k</span>
    <span class="space"></span>
    <span>n</span>
    <span>o</span>
    <span>w</span>
</h1>

<div class="row">

    <div class="image">
        <img src="images/book-img.svg" alt="">
    </div>

    <form action="" method="POST">
        <div class="inputBox">
            <h3>where to</h3>
            <input type="text" name="where_to" placeholder="place name">
        </div>
        <div class="inputBox">
            <h3>how many</h3>
            <input type="number" name="how_many" placeholder="number of guests">
        </div>
        <div class="inputBox">
            <h3>arrivals</h3>
            <input type="date" name="arrivals">
        </div>
        <div class="inputBox">
            <h3>leaving</h3>
            <input type="date" name="d_arrivals">
        </div>
        <input type="submit" name="submit" class="btn" value="book now">
    </form>

</div>

</section>
<?php

include "connection.php";

if(isset($_POST['submit'])){
    $arivalp = ($_POST['where_to']);
    $spend = ($_POST['how_many']);
    $arival = ($_POST['arrivals']);
    $leaving = ($_POST['d_arrivals']);

    $insertq = "insert into registration(whereto, howmany, Arrivals, Leaving) values('$arivalp','$spend','$arival','$leaving')";

    $ress = mysqli_query($conn, $insertq);

    if($ress){
        ?>
        <script>
    alert("Your Trip has booking successfully");
        </script>
<?php 
        
    }else{
        ?>
        <script>
    alert("Your Trip has not book");
        </script>
<?php 
    }
}

?>

</body>
</html>
