<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<style>
  .mcart{
      margin-top: 20px;

    
  }
  .cart{
    margin-top: 220px;
     
 
  }
  .cart img{
    height: 200px;
    width: 100%;
    margin-top: 10px;

  }
  .text p{
    width: 60%;
  height: 40%;

  }
  .text button{
     margin-top: -55px;
  float: right;
  width: 40%;
  padding-left: 0px;
  border-radius: 10px;

  }

   
</style>


 <div class="mcart container">
  <div class="row">
<?php

include 'conn.php';

$Select="select * from product where Page=1 ORDER BY Name";
$qurey = mysqli_query($con, $Select);
$Row= mysqli_num_rows($qurey);

while ($b=mysqli_fetch_array($qurey)) {
   ?>
 
  



 
    <div class="cart col-sm-3">
       <img src="../fv_admin/IMG/<?php echo $b['Img_file']; ?>" alt="sumit"><!--  <?php echo $b['Img_file']; ?> -->
       <!--  <img src="fv_admin/fv_img/Onion.jpg">   -->
       <h4> <?php echo $b['Name']; ?>
        <span style="font-size: 15px;"> (<?php echo $b['Descriptoin']; ?>)</span>
      </h4>
       <h6><?php echo $b['Quantity']; ?></h6>
       <div class="text">
           <p style="font-size: 20px;"><b><?php echo $b['Price']; ?></b>
          <span style="text-decoration: line-through;padding-left: 2px;color: #E44236;font-size: 15px ;"><?php echo $b['M_Price']; ?>₹</span></p>
        <a href="InsertLogic.php?ProductID=<?php echo $b['id']; ?>"> <button  type="button" class="btn btn-success" name="cart">Add to Cart</button></a>
       </div>
    </div>
  
     
<?php  
}
 // echo $_SESSION['Username'];
?>

  </div>
</div>
    
</body>
</html>
