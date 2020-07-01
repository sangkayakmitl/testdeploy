<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(empty($_SESSION['loginflag']))
    {
        header("location: loginpage.php");
    }
    if($_SESSION['user_type']!='superuser')
    {
        header("location: logoff.php");
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

            $newuser_pasword='';
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
            $sql="SELECT * FROM user_tbl where user_id=".$_POST['user_id'];
            mysqli_query($link,$sql);
            if(mysqli_affected_rows($link))
            {
                $result = mysqli_query($link,$sql);
                $row= mysqli_fetch_assoc($result);
                $olduser_password=$row['user_password'];
            }
            mysqli_free_result($result);
            mysqli_close($link);
            if($olduser_password!=$_POST['newuser_password'])
            {
                $newuser_password=md5($_POST['newuser_password']);
            }
            else
            {
                $newuser_password=$olduser_password;
            } 
           
            $link = mysqli_connect('localhost', 'aplottodba', '4^g-ksbo','aplottodb');
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            if (!mysqli_set_charset($link, "utf8")) {
                printf("Error loading character set utf8: %s\n", mysqli_error($link));
            } else {
                //printf("Current character set: %s\n", mysqli_character_set_name($link));
            }
          
            $sql="UPDATE `user_tbl` SET `user_type`='".$_POST['newuser_type']."', `user_name`='".$_POST['newuser_name']."', `user_password`='".$newuser_password."' , `user_phone`='".$_POST['newuser_phone']."' WHERE `user_id`='".$_POST['user_id']."'";

            mysqli_query($link,$sql);
            mysqli_close($link); 
    
        echo ' <br><br><br>
                <div class="row-fluid">
                    <div class="col-md-6 offset3 text-center">
                        <div class="panel panel-primary">
                            <div class="panel-heading">กำลังดำเนินการแก้ไข กรุณารอสักครู่</div>
                            <div class="panel-body">
                                แก้ไขข้อมูลสำเร็จแล้ว
                            </div>
                        </div>
                    </div>
                </div>';
       
        header( "refresh: 1; url=manage_user.php" );
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