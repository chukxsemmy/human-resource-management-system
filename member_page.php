<?php  session_start();
    if(!$_SESSION['username'])
    {
        header("location:login.php");
    }
    include ("connection.php");
    $sql= "SELECT * FROM `profile` JOIN users ON `staffid`=`staff_id` WHERE `user_id`=`profile_id`";
    $result=mysqli_query($dbcon, $sql);
    $th=mysqli_fetch_array($result);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFILE</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
</head>
<style>
    .cl_white{
        color:black;
        position:absolute;
        top:72px;
    }
    section{
        width:100%;
        height:100%;
        padding:70px;
    }
    .asteriskField{
        color:red;
    }
    label{
        color:brown;
    }

</style>
<body  content="width=device=width">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid"> 
            <div class="navbar-header">
                <img src="cdel.png" height="70"/>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li ><a href="member.php">Home</a></li>
                <li class="active"><a href="member_page.php">View Profile</a></li>
                <li><a class="btn btn-danger active" href="./logout.php" target="_self" role="button">Log-out</a></li>
            </ul>
        </div>
    </div>
    </nav>
    <section id="home" style="background-color:; background-size:100% 100%;" class="cl_white text-center">
    <br><br><br>
    <div class="col-xs-12 row"> 
        <h2 style="font-family:Algerian; color:brown;"><strong>BIODATA</strong></h2>
        <hr>
        </div>
        
        <?php 
       /* include ("connection.php");
        if(isset($_POST['upload']))
        {
            $image=$_FILES['profile']['name'];
            $tmp_dir=$_FILES['profile']['tmp_name'];
            $imagesize=$_FILES['profile']['size'];

            $uploads_dir='uploads';
            $imgext=strtolower(pathinfo($image,PATHINFO_EXTENSION));
            $valid_extensions=array('jpeg', 'jpg', 'png', 'gif');
            $picprofile=rand(1000, 1000000).".".$imgext;
            move_uploaded_file($tmp_dir, $uploads_dir.$picprofile);
            $stmt=$dbcon->prepare('INSERT INTO profile(images) VALUES (:upic)');
            $stmt->bind_param(':upic' , $picprofile);
            if($stmt->execute())
            {
                ?>
                <script>
                alert("profile uploaded");
                window.location.href=('member_page.php')
                </script>
                <?php
            }else
            
            echo "<script>alert('error')</script>";
        }*/
        ?>
   
        <div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="profile" class="form-control" required="" accept="*/image">
    <input type="submit" value="Upload Image" name="submit">
</form>
    </div>
 <div class="container">
  <div class="row">
   <form class="form-horizontal" action="insert.php" method="post">
   <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="name">
       First Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <input  class="form-control" width="120px" id="name" value="<?php $th['firstname'];?>" name="name" type="text"/>
      </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8">
      <label class="control-label col-sm-2" for="name1">
       Middle Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <input class="form-control" id="name1" value="<?php $th['middlename'];?>" name="middlename" type="text"/>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="surname">
       Surname
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <input class="form-control" id="surname" name="surname" type="text"/>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="email">
       Email
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <input class="form-control" id="email" name="email"  type="text"/>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="select">
       Gender
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <select  class="select form-control" id="select" name="gender">
       <option value="male">
        MALE
       </option>
       <option value="O-">
        FEMALE
       </option>
       </select>
        </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="tel">
       Phone number
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <input class="form-control" id="tel" name="tel" placeholder="+2347849488456" type="text" required/>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="name2">
       Address
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <input class="form-control" id="name2" name="address" type="text" required/>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="date">
       Date of Birth
       <span class="asteriskField">
        *
       </span>
      </label>
        
       <div class="col-sm-10">
       <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="date"/>
      </div>
      </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="select">
       Blood Group
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <select class="select form-control" id="select" name="blood">
       <option value="O+">
        O+
       </option>
       <option value="O-">
        O-
       </option>
       <option value="A+">
        A+
       </option>
       <option value="A-">
        A-
       </option>
       <option value="AB+">
        AB+
       </option>
       <option value="AB-">
        AB-
       </option>
       <option value="B+">
        B+
       </option>
       <option value="B-">
        B-
       </option>
      </select>
     </div>
     </div>
     </div>
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="select1">
       Genotype
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <select class="select form-control" id="select1" name="geno">
       <option value="AA">
        AA
       </option>
       <option value="AS">
        AS
       </option>
       <option value="SS">
        SS
       </option>
      </select>
    </div>
      </div>
      </div>
      <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="select2">
       Nationality
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <select class="select form-control" id="select2" name="nation">
       <option value="Nigerian">
        Nigerian
       </option>
       <option value="Foreign">
        Foreign
       </option>
      </select>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="date1">
       Date of Appointment
       <span class="asteriskField">
        *
       </span>
      </label>
      
       <div class="col-sm-10 ">
       <input class="form-control" id="date1" name="date1" placeholder="MM/DD/YYYY" type="date"/>
      </div>
      </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="select3">
       Staff Type
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <select class="select form-control" id="select3" name="staff">
       <option value="Temporal">
        Temporal
       </option>
       <option value="Third Choice">
        Permanent
       </option>
      </select>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="select4">
       Designation
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <select class="select form-control" id="select4" name="desi">
       <option value="New">
        System Anaylst
       </option>
       <option value="Lecturer 1">
        Lecturer 1
       </option>
       <option value="Lecturer 2">
        Lecturer 2
       </option>
       <option value=" A-Tutor">
        A-Tutor
       </option>
       <option value="HTO">
        HTO
       </option>
       <option value="e-Facilitator">
        e-Facilitator
       </option>
      </select>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="form-group col-xs-8 ">
      <label class="control-label col-sm-2" for="number">
       Staff Number
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
      <input  class="form-control" id="number" name="nnumber" type="text"  />
     </div>
     </div>
     </div>
   <!-- <div class="form-group col-xs-8" >
      <label class="control-label col-sm-2">
       Medical History
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class=" ">
       <label class="checkbox-inline">
        <input name="his" type="checkbox" value="Diabetes"/>
        Diabetes
       </label>
       <label class="checkbox-inline">
        <input name="his" type="checkbox" value="Asthma"/>
        Asthma
       </label>
       <label class="checkbox-inline">
        <input name="his" type="checkbox" value="Hypertension"/>
        Hypertension
       </label>
       <label class="checkbox-inline">
        <input name="his" type="checkbox" value="Previous Surgery"/>
        Previous Surgery
       </label>
       <label class="checkbox-inline">
        <input name="his" type="checkbox" value="Allergies"/>
        Allergies
       </label>
       <label class="checkbox-inline">
        <input name="his" type="checkbox" value="none"/>
        none
       </label>
      </div>
     </div>-->
     <div class="form-group ">
      <textarea class="form-control" cols="40" placeholder="OTHER MEDICAL FLAWS" id="message" name="mmessage" rows="10"></textarea>
     </div>
     <div class="row">
     <div class="form-group col-xs-8">
      <div class="col-sm-10 col-sm-offset-2">
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
      </div>
     </div>
      <?php  ?>   
    </form>

				
            
        

    </section>
<!--<footer class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <p class="text-center">Copyright - Reserved IT Students 2018</p>
    </div>
</footer>-->
</body>
</html>
