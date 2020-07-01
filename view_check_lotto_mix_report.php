<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(empty($_SESSION['loginflag']))
    {
        header("location: loginpage.php");
    }
    include("aplottofunction.php");
?> 
    
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AP Lotto Manager</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style>
    <?php printcss(); ?>
</style>
</head>

<body>
<div class="container-fluid">
    
    <?php 
    showheader();
    //shownav($_SESSION['user_type']); 
   
    $big_prize=$_POST['big_prize'];
    $_SESSION['big_prize']=$_POST['big_prize'];
    $_SESSION['four_prize1']=$_POST['four_prize1'];
    $_SESSION['four_prize2']=$_POST['four_prize2'];
    $_SESSION['four_prize3']=$_POST['four_prize3'];
    $_SESSION['four_prize4']=$_POST['four_prize4'];
    $_SESSION['lower_prize']=$_POST['lower_prize'];
    $four_prize1=$_POST['four_prize1'];
    $four_prize2=$_POST['four_prize2'];
    $four_prize3=$_POST['four_prize3'];
    $four_prize4=$_POST['four_prize4'];
    $lower_prize=$_POST['lower_prize'];
    
    

    ?>   
    
    <div class="row-fluid">
        
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2 text-center">
                    <a href="reg_allinone.php" id="Go Home" name="Go To Home" class="btn btn-warning">Go To Home..</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $all_income=showuserdetail($_SESSION['user_name'], $_SESSION['user_type']) ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php showmixwinner($_SESSION['user_name'], $_SESSION['user_type'],$big_prize,$_POST['four_prize1'],$_POST['four_prize2'],$_POST['four_prize3'],$_POST['four_prize4'],$lower_prize,$all_income); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2 text-center">
                    <a href="reg_allinone.php" id="Go Home" name="Go To Home" class="btn btn-warning">Go To Home..</a>
                </div>
            </div>
        </div>
        
        
        <div class="row-fluid">
            <div class="col-md-12 text-center">
            <br>    
            <p>เฮง ๆ รวย ๆ มาซื้อหวยกับเรา</p>
            <p> <a href="#">Home</a>| <a href="#"> About Us </a>| <a href="#"> Contact </a></p>
            </div>
        </div>    
    
    </div>
</div>   
    
</body>

</html>

