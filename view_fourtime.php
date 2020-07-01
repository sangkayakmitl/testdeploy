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
    shownav($_SESSION['user_type']); 
    ?>   
    
    <div class="row-fluid">
        <br>
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-12">
                    <?php showuserdetail($_SESSION['user_name'], $_SESSION['user_type']) ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-12">
                    <?php showerrorreport($_SESSION['user_name'], $_SESSION['user_type'],'สี่ครั้ง'); ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-12">
                    <?php showreport($_SESSION['user_name'], $_SESSION['user_type'],'สี่ครั้ง'); ?>
                </div>
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

