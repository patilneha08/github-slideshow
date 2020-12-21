<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome o Internship Portal</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="KLS GIT">
    <h1><center>Registration Form</center>></h1>>
    <div class="container">
        <h2>Welcome to KLS Gogte Institute of technology</h2>
        <p>Enter your Details and submit</p>
        <div class="bb">
           <a href="log.php"><button class="btn2">back</button> </a> 
        </div>
        

        <form action="reg.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your full name">
            <input type="text" name="UID" id="UID" placeholder="Enter your UID">
            <input type="text" name="dept" id="dept" placeholder="Enter your dept">
            <input type="text" name="div" id="div" placeholder="Enter your div">
            <input type="email" name="email" id="email" placeholder="Enter your email" >
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone.no">
            <input class="btn" type="submit" name="submit" id="button" value="Submit"> 
            
        </form>
        
    </div>
   
     
</body>
</html>

<?php
     if(isset($_POST['submit'])){

        $con=mysqli_connect("localhost","root","");
    
        if(!$con){
            die(mysqli_connect_error());
         }
         $db=mysqli_select_db($con,'internship_management');
         if(!$db){
             die(mysqli_connect_error());
         }

   
        $name= $_POST['name'];
        $UID= $_POST['UID'];
        $dept= $_POST['dept'];
        $div= $_POST['div'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];

        if($name==''){
            echo "<script>alert('Enter your name')</script>";
        }
        if ($UID==''){
            echo "<script>alert('Enter your UID')</script>";
        }
        if ($dept==''){
            echo "<script>alert('Enter your dept')</script>";
        }
        if ($div==''){
            echo "<script>alert('Enter your div')</script>";
        }
        if ($email==''){
            echo "<script>alert('Enter your email')</script>";
        }
        if ($phone==''){
            echo "<script>alert('Enter your phone')</script>";
        }
        else{
            $query= "insert into reg(name,UID,dept,divi,email,phone) values ('$name','$UID','$dept','$div','$email','$phone')";
            if(mysqli_query($con,$query)){
                echo "<script>alert('Registered Successfully')</script>";
            }
            else{
                echo "Error: $con->error";
            }
        }

        
        
    
        $con->close();
    }

?>