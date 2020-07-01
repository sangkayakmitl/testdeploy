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
</head>

<body>
<div class="container-fluid">
        
    <div class="row-fluid">
    <div class="col-md-12 text-center"></div>
    <br>
    <br>
    </div>

    <div class="row-fluid">
        <div class="col-md-10 offset1 text-center"><img src="Image/aplottomgr.png" style="width:70% ;height:70%"></div>
    </div>
            
    <div class="row-fluid">
        <div class="col-md-12 text-center"></div>
        <br>
    </div>
    
    <?php 
        
        showheader();
    
        if(($_POST['tong-head'])!='')
        {    
            tongheadinsert($_SESSION['user_name'],$_POST['tong-head']);
        }
        if(($_POST['tong-tail'])!='')
        {    
            tongtailinsert($_SESSION['user_name'],$_POST['tong-tail']);
        }
        if(($_POST['head-tail'])!='')
        {    
            headtailinsert($_SESSION['user_name'],$_POST['head-tail']);
        }
        if(($_POST['tod-head'])!='')
        {    
            todheadinsert($_SESSION['user_name'],$_POST['tod-head']);
        }
        if(($_POST['tod-tail'])!='')
        {    
            todtailinsert($_SESSION['user_name'],$_POST['tod-tail']);
        }
        if(($_POST['tod-head-tail'])!='')
        {    
            todheadtailinsert($_SESSION['user_name'],$_POST['tod-head-tail']);
        }
        if(($_POST['four-time'])!='')
        {    
            fourtimeinsert($_SESSION['user_name'],$_POST['four-time']);
        }
        if(($_POST['headx'])!='')
        {    
            headmulti36insert($_SESSION['user_name'],$_POST['headx']);
        }
        if(($_POST['tailx'])!='')
        {    
            tailmulti36insert($_SESSION['user_name'],$_POST['tailx']);
        }
        if(($_POST['head-tailx'])!='')
        {    
            headtailmulti36insert($_SESSION['user_name'],$_POST['head-tailx']);
        }
        if(($_POST['3door'])!='')
        {    
            threedoorinsert($_SESSION['user_name'],$_POST['3door']);
        }
        if(($_POST['5door'])!='')
        {    
            fivedoorinsert($_SESSION['user_name'],$_POST['5door']);
        }
        if(($_POST['upper'])!='')
        {    
            upperinsert($_SESSION['user_name'],$_POST['upper']);
        }
        if(($_POST['lower'])!='')
        {    
            lowerinsert($_SESSION['user_name'],$_POST['lower']);
        }
        if(($_POST['upper-lower'])!='')
        {    
            upperlowerinsert($_SESSION['user_name'],$_POST['upper-lower']);
        }
        
        echo '<div class="row-fluid">
                    <div class="col-md-6 offset3 text-center">
                        <div class="panel panel-primary">
                            <div class="panel-heading">ผลการบันทึก</div>
                            <div class="panel-body">
                                บันทึกสำเร็จ
                            </div>
                        </div>
                    </div>
                </div>';
        
        header( "refresh: 0.2; url=loginpage.php" );
        exit(0);
    ?>
    
    <div class="row-fluid">
        <div class="col-md-12 text-center">
        <br>    
        <p>เฮง ๆ รวย ๆ มาซื้อหวยกับเรา</p>
        <p> <a href="#">Home</a>| <a href="#"> About Us </a>| <a href="#"> Contact </a></p>
        </div>
        
    </div>    
</div>
</body>

</html>



