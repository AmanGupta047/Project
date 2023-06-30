<?php
 include 'conn.php';
// include 'nev.php'; 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    *{
      margin: 0;
      padding: 0;

    }
    .Ragitration{
      /* background: url(images/.jpg); no-repeat; */
      background-size: cover;
      background-color: aqua;
      
    }
    
     .container{
      width: 400px;
      height: 630px;
      position: relative;
      top: 20px;
      left: ;
      border: 2px solid black ;
      border-bottom: 2px solid black;
      background-color: white;
     }
     .container input{
      background: none;
      outline: none;
      border: none;
      border: 2px solid red;
      width: 100%;
      margin: 0 0px 15px;
      padding: 8px;
      font-size: 14px;
     }
     .lo
  </style>
   
</head>
<body class="Ragitration">
 
<div  > 

<div class="container"   >
  <h2 style="text-align: center;">Registration Form</h2><br>
  <form autocomplete="off" action="" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="<?php if(isset($_POST['Name'])){echo(htmlentities($_POST['Name']));}  ?>" placeholder="Enter name"   name="Name"   required><br>

      <label for="email">Email:</label>
      <input type="email" class="form-control" 
      value="<?php if(isset($_POST['Email'])){echo(htmlentities($_POST['Email']));}  ?>" id="email" placeholder="Enter email" name="Email" required><br>
  
      <label for="phone">phone:</label>
      <input type="text" class="form-control" value="<?php if(isset($_POST['Phone'])){echo(htmlentities($_POST['Phone']));}  ?>" id="phone" placeholder="Enter phone" name="Phone" required><br>

      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password"   name="Pass" required><br>
      

      <label for="pwd">Repeat Password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Enter Repeat password" name="RPass" requiredx><br>

   
    </div>
   
    <button type="submit" id="submit"  class="btn btn-success" name="submit" style="position:  relative;left:150px;">Submit</button>

    <a href="login.php"> 
 
<button type="button" id="login" class="btn btn-primary" style="margin-left:0px;">Login</button> 
</a>
<a href="index.php">
    <button style="margin-left: 100px;" type="button" class="btn btn-outline-secondary">Cancel</button>
  </a>
  </form>
</div>
 
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>
<script>
 
</script>
</body>
</html>
<?php
function phpAlert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}

function ISEmailAlreadyExist($Email,$con){
 $Emailquery="select * from registration where Email='$Email'";
  $Equery=mysqli_query($con,$Emailquery);
  $EmailCount = mysqli_num_rows($Equery);
  return $EmailCount;
}

 
if (isset($_POST['submit'])) {
  $Name=$_POST['Name'];
  $Email=$_POST['Email'];
  $Phone=$_POST['Phone'];
  $Password=$_POST['Pass'];
  // $HPassword=password_hash($Password,PASSWORD_BCRYPT);
  $RPassword=$_POST['RPass'];
  // $_SESSION['Username']=$fetch['Name'];
  // $HRPassword=password_hash($RPassword,PASSWORD_BCRYPT);
  if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
if(preg_match("/^[789]\d{9}$/", $Phone)) {
 $EmailCount = ISEmailAlreadyExist($Email,$con);
  if ($EmailCount>0) {
    phpAlert ("email are alredy exists");
    unset($_POST);
    return;
  }
    if ($Password===$RPassword) {
      $query="insert into registration (Name,Email,Number,Password)values('$Name','$Email','$Phone','$Password')";
  $Res=mysqli_query($con,$query);
  if ($Res) {
   
    echo "<script>
alert('Account Has been Created!');
window.location.href='login.php';
</script>";
   
  }else{
     phpAlert('Something went wrong! Please try again');
  }
    }else{
       phpAlert('password are not mach');
    }


}else
{
  phpAlert('Please enter a valid Phone number!');
}
  //  end of phone validateion
}else{
 phpAlert('Please enter a valid Email Address!'); 
}

}
      
  
   
    
  

?>