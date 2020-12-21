<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Details</title>
    <link rel="stylesheet" href="details.css">
</head>
<body>
    <img class="logo" src="logo.jpeg" alt="KLS GIT">
    <br><br><br><br><br><br><br><br><br>
    <div class="container">
        <h1>Add Internship Details</h1>
        <div class="btns">
            <a href="welcome.php"><button>Back</button></a>
            <a href="log.php"><button>Logout</button></a>
        </div>

    </div>
    
    <div>
        <form action="details.php" method="post">
            <table>
                <tr>
                    <td>Student UID *</td>
                    <td><input type="text" name="UID" id="UID" placeholder="Enter your UID" size="50px"></td>
                </tr>
                <tr>
                    <td>Student name *</td>
                    <td><input type="text" name="name" id="name" placeholder="Enter your name" size="50px"></td>
                </tr>
                <tr>
                    <td>Company name *</td>
                    <td><input type="text" name="Cname" id="Cname" placeholder="Enter Company name" size="50px"></td>
                </tr>
                <tr>
                    <td>Area *</td>
                    <td><input type="text" name="area" id="area" placeholder="Enter area you worked on" size="50px"></td>
                </tr>
                <tr>
                    <td>Title * </td>
                    <td><input type="text" name="title" id="title" placeholder="Enter major project title" size="50px"></td>
                </tr>
                <tr>
                    <td>Guide Industry * </td>
                    <td><input type="text" name="IGname" id="IGname" placeholder="Enter industry guide name" size="50px"></td>
                </tr>
                <tr>
                    <td>Guide Local * </td>
                    <td><input type="text" name="LGname" id="LGname" placeholder="Enter local guide name" size="50px"></td>
                </tr>
                <tr>
                    <td>From Date * </td>
                    <td><input type="date" name="Fdate" id="Fdate" placeholder="Enter internship start date " size="50px"></td>
                </tr>
                <tr>
                    <td>To Date * </td>
                    <td><input type="date" name="Tdate" id="Tdate" placeholder="Enter internship end date" size="50px"></td>
                </tr>
                <tr>
                    <td>Key words * </td>
                    <td><input type="text" name="key" id="key" placeholder="Mention Key words of your internship" size="50px"></td>
                </tr>
                <tr>
                    <td>Certificate PDF * </td>
                    <td><input type="file" name="certificate" id="certificate" placeholder="Add internship certificate" size="50px"></td>
                </tr>


            </table>
            <div class="footer">
            
            <input class="btn" type="submit" name="submit" id="button" value="Submit">

            </div>

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
         
    

        $UID= $_POST['UID'];
        $name= $_POST['name'];
        $Cname= $_POST['Cname'];
        $area= $_POST['area'];
        $title= $_POST['title'];
        $IGname= $_POST['IGname'];
        $LGname=$_POST['LGname'];
        $Fdate=$_POST['Fdate'];
        $Tdate=$_POST['Tdate'];
        $key=$_POST['key'];
        $certificate=$_POST['certificate'];
        echo "$UID";

        if($UID==''){
            echo "<script>alert('Enter your UID')</script>";
        }
        if ($name==''){
            echo "<script>alert('Enter your name ')</script>";
        }
        if ($Cname==''){
            echo "<script>alert('Enter Company name')</script>";
        }
        if ($area==''){
            echo "<script>alert('Enter area')</script>";
        }
        if ($title==''){
            echo "<script>alert('Enter title')</script>";
        }
        if ($IGname==''){
            echo "<script>alert('Enter industry guide name')</script>";
        }
        if ($LGname==''){
            echo "<script>alert('Enter local guide name')</script>";
        }
        if ($Fdate==''){
            echo "<script>alert('Enter From_date')</script>";
        }
        if ($Tdate==''){
            echo "<script>alert('Enter To_date')</script>";
        }
        if ($key==''){
            echo "<script>alert('Enter key elements of your Enternship')</script>";
        }
        if ($certificate==''){
            echo "<script>alert('select a pdf file of your certificate')</script>";
        }

        else{
            $query= "insert into details(UID,student_name,company_name,area,title,guide_industry,guide_local,from_date,to_date,key_words,certificate) values ('$UID','$name','$Cname','$area','$title','$IGname','$LGname','$Fdate','$Tdate','$key','$certificate')";

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