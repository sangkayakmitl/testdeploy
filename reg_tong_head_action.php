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

    
    <?php 
        showheader();
        if(($_POST['reg-detail'])!='')
        {    
            //var_dump($_POST);
            $pieces = explode("\n",$_POST['reg-detail']);
            foreach ($pieces as $value) 
            {
                if(strlen($value)>2)
                {
                    tongheadinsert($_SESSION['user_name'],$value);
                    //echo $value."<br>";
                }
            }
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
        
        header( "refresh: 0.2; url=reg_tong_head.php" );
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



