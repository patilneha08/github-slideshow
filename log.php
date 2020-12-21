<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome o Internship Portal</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <img class="bg2" src="bg2.jpg" alt="KLS GIT">
    <div class="container">
        <h2>Student Login</h2>
        <form action="log.php" method="post">
           <div> 
               
               <input type="text" name="UID" id="UID" placeholder="Enter UID" >
           </div>
            <div>
                
                <input type="text" name="name" id="name" placeholder="Enter name">

            </div>
            <input class="btn" type="submit" name="login" id="button" value="login">;
        </form>
        <div class="footer">
            <p>New User? Register below!</p>
            <a href="reg.php"><button class="btn2">Register</button></a>

        </div>

        
    </div>
</body>
</html>

<?php 
    //ob_start();
    session_start();
    $_SESSION['name']='';
    $_SESSION['uid']='';
    
    if(isset($_POST['login'])){

        try{

        $pdocon = new PDO("mysql:host=localhost;dbname=internship_management", 'root', '');
        }
        catch(PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }
       

       $UID= $_POST['UID'];
       $name= $_POST['name'];
      
       
       if($name==''){
           echo "<script>alert('Enter your name')</script>";
       }
       if ($UID==''){
           echo "<script>alert('Enter your UID')</script>";
       }
       
       else{
           $query= "SELECT name FROM reg WHERE UID='$UID' AND name='$name'";
           $result=$pdocon->query($query);
           $rowcount=$result->rowCount();
           echo 'ERROR WRONG USER!!!' ;
           if($rowcount>0){
            $_SESSION['name']=$name;
            $_SESSION['uid']=$UID;
            header("location:welcome.php");
        }



        
        }
    }
    
    
    
    
    
    //ob_end_flush();
   // mysqli_close($con);
?>


