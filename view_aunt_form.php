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

        <?php

            if(isset($_SESSION['tong-head-aunt-value']))
            {
                $tong_head_value=$_SESSION['tong-head-aunt-value'];
            }
            else
            {
                $tong_head_value='10000';
            }
            if(isset($_SESSION['tong-tail-aunt-value']))
            {
                $tong_tail_value=$_SESSION['tong-tail-aunt-value'];
            }
            else
            {
                $tong_tail_value='10000';
            }
            if(isset($_SESSION['tod-head-aunt-value']))
            {
                $tod_head_value=$_SESSION['tod-head-aunt-value'];
            }
            else
            {
                $tod_head_value='10000';
            }
            if(isset($_SESSION['tod-tail-aunt-value']))
            {
                $tod_tail_value=$_SESSION['tod-tail-aunt-value'];
            }
            else
            {
                $tod_tail_value='10000';
            }
            if(isset($_SESSION['upper-aunt-value']))
            {
                $upper_value=$_SESSION['upper-aunt-value'];
            }
            else
            {
                $upper_value='10000';
            }
            if(isset($_SESSION['lower-aunt-value']))
            {
                $lower_value=$_SESSION['lower-aunt-value'];
            }
            else
            {
                $lower_value='10000';
            }
            if(isset($_SESSION['four-time-value']))
            {
                $fourtime_value=$_SESSION['four-time-value'];
            }
            else
            {
                $fourtime_value='10000';
            }

        ?>
        
        <div class="col-md-12">
            <div class="row-fluid">
                
                <div class="col-md-12">
                        <div class="panel panel-danger" id="report-info">
                            <div class="panel-heading text-center"><h1>กรอกรายละเอียดการอั้น</h1></div>
                            <div class="panel-body">
                                <div class="col-md-12 form-group well">
                
                                    <form class="form-inline text-center" action="view_aunt_report.php" method="post">
                                       
                                        <label for="tong-head-aunt-value"><p>อั้นหัว</p></label>
                                        <input class="form-control input-aplotto" value=<?php echo $tong_head_value; ?> name="tong-head-aunt-value"  style="width: 110px" id="tong-head-aunt-value" placeholder="ตรง">
                                        &nbsp;&nbsp                      
                                        <label for="tong-tail-aunt-value"><p>อั้นท้าย</p></label>
                                        <input class="form-control input-aplotto" value=<?php echo $tong_tail_value; ?> name="tong-tail-aunt-value"  style="width: 110px" id="tong-tail-aunt-value" placeholder="ตรง">
                                        &nbsp;&nbsp                      
                                        <label for="tod-head-aunt-value"><p>อั้นโต๊ดหัว</p></label>
                                        <input class="form-control input-aplotto" value=<?php echo $tod_head_value; ?> name="tod-head-aunt-value"  style="width: 110px" id="tod-head-aunt-value" placeholder="โต๊ด">
                                        &nbsp;&nbsp        
                                        <label for="tod-tail-aunt-value"><p>อั้นโต๊ดท้าย</p></label>
                                        <input class="form-control input-aplotto" value=<?php echo $tod_tail_value; ?> name="tod-tail-aunt-value"  style="width: 110px" id="tod-tail-aunt-value" placeholder="โต๊ด">
                                        &nbsp;&nbsp        
                                        <label for="upper-aunt-value"><p>อั้นบน</p></label>
                                        <input class="form-control input-aplotto" value=<?php echo $upper_value; ?> name="upper-aunt-value"  style="width: 110px" id="upper-aunt-value" placeholder="สองตัวบน">
                                        &nbsp;&nbsp
                                        <label for="lower-aunt-value"><p>อั้นล่าง</p></label>
                                        <input class="form-control input-aplotto" value=<?php echo $lower_value; ?> name="lower-aunt-value"  style="width: 110px" id="lower-aunt-value" placeholder="สองตัวล่าง">
                                        &nbsp;&nbsp
                                        <label for="4time-aunt-value"><p>อั้นสี่ครั้ง</p></label>
                                        <input class="form-control input-aplotto" value=<?php echo $fourtime_value; ?> name="4time-aunt-value"  style="width: 110px" id="4time-aunt-value" placeholder="สี่ครั้ง">
                                        
                                        <br><br><button type="Submit" class="btn btn-success input-aplotto">ไปยังหน้ารายงานการอั้น.</button>&nbsp;&nbsp 

                                    </form>
                                </div>    
                            </div>
                        </div>
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

