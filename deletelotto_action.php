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
</head>
    

<body>
<div class="container-fluid">
        
    <?php 
        
        showheader();
        
            $link = aplottodbconnect();
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            if (!mysqli_set_charset($link, "utf8")) {
                printf("Error loading character set utf8: %s\n", mysqli_error($link));
            } else {
                //printf("Current character set: %s\n", mysqli_character_set_name($link));
            }
          
            
            $sql="DELETE FROM `lotto_tbl` WHERE lotto_id='".$_POST['transection_id']."' and lotto_type='".$_POST['lotto_type']."';";
       
            mysqli_query($link,$sql);
           
            mysqli_close($link); 
    
        echo ' <br><br><br>
                <div class="row-fluid">
                    <div class="col-md-6 offset3 text-center">
                        <div class="panel panel-primary">
                            <div class="panel-heading">แจ้งผลการลบ</div>
                            <div class="panel-body">
                                ลบสำเร็จ
                            </div>
                        </div>
                    </div>
                </div>';
        
       
        header( "refresh: 1; url=view_error_all.php" );
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



