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
        
        $lotto_status_todb='ok';
        
        if($_POST['lotto_type']=='หัว'||$_POST['lotto_type']=='ท้าย'||$_POST['lotto_type']=='โต๊ดหัว'||$_POST['lotto_type']=='โต๊ดท้าย'||$_POST['lotto_type']=='สี่ครั้ง' )
        {
            if(strlen($_POST['new_lotto_number'])!=3)
            {
                $lotto_status_todb='not ok';
            }
        }
        else
        {
            if(strlen($_POST['new_lotto_number'])!=2)
            {
                $lotto_status_todb='not ok';
            }
        }
        
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
          
            $sql="UPDATE `lotto_tbl` SET `lotto_number`='".$_POST['new_lotto_number']."', `lotto_price`='".$_POST['new_lotto_price']."', `lotto_status`='".$lotto_status_todb."' WHERE `lotto_id`='".$_POST['transection_id']."'";
       
            mysqli_query($link,$sql);
            
            mysqli_close($link); 
    
        echo ' <br><br><br>
                <div class="row-fluid">
                    <div class="col-md-6 offset3 text-center">
                        <div class="panel panel-primary">
                            <div class="panel-heading">แจ้งผลการแก้ไข</div>
                            <div class="panel-body">
                                แก้ไขสำเร็จ
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



