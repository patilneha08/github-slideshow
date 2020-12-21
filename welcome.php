<?php
    session_start();
    //include '.php';
    $con=mysqli_connect("localhost","root","");
    
        if(!$con){
            die(mysqli_connect_error());
         }
         $db=mysqli_select_db($con,'internship_management');
         if(!$db){
             die(mysqli_connect_error());
         }
        $UID=$_SESSION['uid'];
        $name=$_SESSION['name'];
        echo $UID;
        $query= "SELECT * FROM details WHERE UID='$UID'";
        $result=mysqli_query($con,$query);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Internship Portal</title>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
    <div class="container">
        <img class="bgimg" src="gitlogo.jpg" alt="GIT">
        <h1>Welcome to Internship Management Portal</h1>
        
        <p>KLS Gogte Institute Of Technology, Belgaum</p>
        
    </div>
    <div class="menu">
        <a href="log.php"><button>Logout</button></a>
        <a href="details.php"><button>Add Internship</button></a>
    </div>

    
    <div class="body">
         <!--<h2>Welcome User</h2>-->
        <?php
            echo '<h2>WELCOME </h2> '. $_SESSION['name']. ".<br>";
        ?>
        
        <?php 
        echo '<h2>UID:-</h2>'. $_SESSION['uid']; 
        ?>
        
        <p>You can add your completed Internship here.
        <br>(Internship period should be of atleast 8 weeks) </p>
         
            <table align="center" border="1px">
                <tr>
                    <td>UID</td>
                    <td>Name</td>
                    <td>Company_name</td>
                    <td>Area</td>
                    <td>Title</td>
                    <td>Guide_industry</td>
                    <td>Guide_local</td>
                    <td>From_date</td>
                    <td>To_date</td>
                    <td>Key_words</td>
                    <td>Certificate</td>
                </tr>
                <?php 
                    
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $file=$row['certificate'];
                ?>
                       <tr>
                            <td><?php echo $row['UID'];  ?>
                            <td><?php echo $row['student_name'];  ?>
                            <td><?php echo $row['company_name'];  ?>
                            <td><?php echo $row['area'];  ?>
                            <td><?php echo $row['title'];  ?>
                            <td><?php echo $row['guide_industry'];  ?>
                            <td><?php echo $row['guide_local'];  ?>
                            <td><?php echo $row['from_date'];  ?>
                            <td><?php echo $row['to_date'];  ?>
                            <td><?php echo $row['key_words'];  ?>
                            
                            <td><?php echo '<a href="download.php?dow=$file">download</a>' ;?> 
                            
                    
                        </tr>
                <?php
                    }
                 ?>   

                
            </table> 
        
       
    </div>
</body>
</html>