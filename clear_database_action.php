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

            $lotto_datein=$_POST['lotto_date'];
            $clearcommandin=$_POST['clear_command'];
            
            if($clearcommandin!='clear')
            {
                echo ' <br><br><br>
                    <div class="row-fluid">
                        <div class="col-md-6 offset3 text-center">
                            <div class="panel panel-primary">
                                <div class="panel-heading">คำสั่ง clear ไม่ถูกต้อง</div>
                                <div class="panel-body">
                                    กรุณาพิมพ์คำสั่ง clear ใหม่
                                </div>
                            </div>
                        </div>
                    </div>';
                header( "refresh: 1; url=manage_user.php" );
                exit(0);
            }
            else 
            { 
                echo ' <br><br><br>
                    <div class="row-fluid">
                        <div class="col-md-6 offset3 text-center">
                            <div class="panel panel-primary">
                                <div class="panel-heading">กำลังทำการ Clear ข้อมูลใน Database </div>
                                <div class="panel-body">
                                    กรุณารอสักครู่ ขณะนี้ระบบกำลังทำการ clear ข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>';    
                //$sql="INSERT INTO `user_tbl` (`user_type`, `user_name`, `user_password`, `user_phone`) VALUES ('$newuser_typein', '$newuser_nameIn', '$newuser_passwordin', '$newuser_phonein')";
                $sql="SELECT * FROM lotto_tbl";
                $result = mysqli_query($link,$sql);
                if(mysqli_affected_rows($link))
                {
                    $result = mysqli_query($link,$sql);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $lotto_seller_todb=$row['lotto_seller'];
                        $lotto_type_todb=$row['lotto_type'];
                        $lotto_number_todb=$row['lotto_number'];
                        $lotto_price_todb=$row['lotto_price'];
                        $lotto_detail_todb=$row['lotto_detail'];
                        $lotto_status_todb=$row['lotto_status'];
                        $date_todb=$row['date'];
                        $lotto_date_todb=$lotto_datein;
                        $insertsql="INSERT INTO `lotto_tbl_old` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`, `lotto_date`) VALUES ('$lotto_seller_todb', '$lotto_type_todb', '$lotto_number_todb', '$lotto_price_todb', '$lotto_detail_todb', '$lotto_status_todb', '$date_todb', '$lotto_date_todb' )";
                        //echo $insertsql."<br>";
                        if (!mysqli_query($link,$insertsql))
                        {
                        die('Error: ' . mysqli_error());
                        }                        
                    }
                    $truncatesql="TRUNCATE `lotto_tbl`;";
                    if (!mysqli_query($link,$truncatesql))
                    {
                    die('Error: ' . mysqli_error());
                    }  
                }
                mysqli_free_result($result);
                mysqli_close($link); 
                
                header( "refresh: 1; url=manage_user.php" );
                exit(0);
            }
          
            
    
            
        
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