<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    if(isset($_SESSION['loginflag']))
    {
        if($_SESSION['user_type']=='seller')
        {
            header("location: reg_allinone.php");
        }
        else if($_SESSION['user_type']=='master')
        {
            header("location: reg_allinone.php");
        }
        else if($_SESSION['user_type']=='superuser')
        {
            header("location: manage_user.php");
        }
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
        <div class="col-md-12 text-center"><br><br></div>
    </div>

    <div class="row-fluid">
        <div class="col-md-10 offset1 text-center"><img src="Image/aplottomgr.png" style="width:70% ;height:70%"></div>
    </div>
    
     <div class="row-fluid">
        <div class="col-md-12 text-center"><br><br></div>
    </div>
    
<?php

		

	if( ! ( isset($_POST['username']) && isset($_POST['password']) ) ) 
	{ 
    		showloginpage();
	}       
        else
        {
            //checl log in process
            //$loginflag=logincheck($_POST['username'],$_POST['password']);
            $LOGININFO=checklogin($_POST['username'],md5($_POST['password']));
            
            if ($LOGININFO['authen_flag']=='true')
            {    
                $_SESSION['loginflag']='true';
                $_SESSION['user_name']=$LOGININFO['user_name'];
                $_SESSION['user_type']=$LOGININFO['user_type'];
                $_SESSION['user_phone']=$LOGININFO['user_phone'];
                header("location: loginpage.php");
                exit(0);
            }
            else
            {
                echo  
                '<div class="row-fluid text-center">
                    <div class="col-md-6 offset3" style="height: auto" >
                    <br><br>  
                        <div class="well text-center">
                
                        Username หรือ Password ผิด
                        <br><br> 
                        กรุณาใส่ Username และ password ใหม่.
                        
                        </div>
             
                    </div>
                </div>';
               
                header( "refresh: 2; url=loginpage.php" );
                exit(0);
            }
 
        }
?>

            
        
    
</div>
       
</body>

</html>



