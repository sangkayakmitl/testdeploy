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

            if(isset($_SESSION['big_prize']))
            {
                $big_prize=$_SESSION['big_prize'];
            }
            else
            {
                $big_prize='123456';
            }
            if(isset($_SESSION['four_prize1']))
            {
                $four_prize1=$_SESSION['four_prize1'];
            }
            else
            {
                $four_prize1='123';
            }
            if(isset($_SESSION['four_prize2']))
            {
                $four_prize2=$_SESSION['four_prize2'];
            }
            else
            {
                $four_prize2='456';
            }
            if(isset($_SESSION['four_prize3']))
            {
                $four_prize3=$_SESSION['four_prize3'];
            }
            else
            {
                $four_prize3='321';
            }
            if(isset($_SESSION['four_prize4']))
            {
                $four_prize4=$_SESSION['four_prize4'];
            }
            else
            {
                $four_prize4='654';
            }
            if(isset($_SESSION['lower_prize']))
            {
                $lower_prize=$_SESSION['lower_prize'];
            }
            else
            {
                $lower_prize='69';
            }

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
                        <div class="panel panel-success" id="report-info">
                            <div class="panel-heading text-center"> <h1>กรอกข้อมูลหวยที่ออก</h1> </div>
                            <div class="panel-body">
                                <div class="col-md-6 col-md-offset-3 form-group well">
                
                                    <form class="form-inline text-center" action="view_check_lotto_mix_report.php" method="post">
                                        <H1>รางวัลที่หนึ่ง</H1><br>             
                                        <label for="big_prize"></label>
                                        <input class="form-control input-aplotto text-center" value=<?php echo $big_prize; ?> name="big_prize"  style="width: 150px" id="big_prize" placeholder="รางวัลที่ 1">
                                        <br><br>
                                        <H1>สี่ครั้ง</H1><br>                                               
                                        <label for="four_prize1">  </label>
                                        <input class="form-control input-aplotto text-center" value=<?php echo $four_prize1; ?> name="four_prize1"  style="width: 100px" id="four_prize1" placeholder="สี่ครั้ง">
                                        &nbsp;&nbsp &nbsp;&nbsp                                       
                                        <label for="four_prize2">  </label>
                                        <input class="form-control input-aplotto text-center" value=<?php echo $four_prize2; ?> name="four_prize2"  style="width: 100px" id="four_prize2" placeholder="สี่ครั้ง">
                                        <br><br>                  
                                        <label for="four_prize3">  </label>
                                        <input class="form-control input-aplotto text-center" value=<?php echo $four_prize3; ?> name="four_prize3"  style="width: 100px" id="four_prize3" placeholder="สี่ครั้ง">
                                        &nbsp;&nbsp &nbsp;&nbsp  
                                        <label for="four_prize4">  </label>
                                        <input class="form-control input-aplotto text-center" value=<?php echo $four_prize4; ?> name="four_prize4"  style="width: 100px" id="four_prize4" placeholder="สี่ครั้ง">
                                        <br><br>

                                        <H1>ล่าง</H1><br>                                               
                                        <label for="lower_prize">  </label>
                                        <input class="form-control input-aplotto text-center" value=<?php echo $lower_prize; ?> name="lower_prize"  style="width: 100px" id="lower_prize" placeholder="ล่าง">
                                        <br>    
                                        <br><br><button type="Submit" class="btn btn-success"> ไปยังหน้าตรวจหวย </button>&nbsp;&nbsp 

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

