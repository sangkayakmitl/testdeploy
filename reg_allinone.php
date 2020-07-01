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
        <div class="col-md-7">
            <div class="row-fluid">
                <div class="col-md-12">
                    <?php showuserdetail($_SESSION['user_name'], $_SESSION['user_type']) ?>
                </div>
                <div class="col-md-12">                        
                    <?php showhistory($_SESSION['user_name'], $_SESSION['user_type']); ?>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row-fluid">
                <div class="col-md-12">
                    <?php showlasterror($_SESSION['user_name'], $_SESSION['user_type']); ?>
                </div>
                <form action="reg_allinone_action.php" method="post">
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="tong-head"><h1>หัว</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="tong-head" class="form-control input-aplotto" id="tong-head">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="tong-tail"><h1>ท้าย</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="tong-tail" class="form-control input-aplotto" id="tong-tail">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="head-tail"><h1>หัว-ท้าย</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="head-tail" class="form-control input-aplotto" id="head-tail">
                        </div>
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="tod-head"><h1>โต๊ดหัว</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="tod-head" class="form-control input-aplotto" id="tod-head">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="tod-tail"><h1>โต๊ดท้าย</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="tod-tail" class="form-control input-aplotto" id="tod-tail">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="tod-head-tail"><h1>โต๊ดหัวท้าย</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="tod-head-tail" class="form-control input-aplotto" id="tod-head-tail">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="four-time"><h1>สี่ครั้ง</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="four-time" class="form-control input-aplotto" id="four-time">
                        </div>
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="headx"><h1>หัวคูณ</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="headx" class="form-control input-aplotto" id="headx">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="tailx"><h1>ท้ายคูณ</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="tailx" class="form-control input-aplotto" id="tailx">
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="head-tailx"><h1>หัวท้ายคูณ</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="head-tailx" class="form-control input-aplotto" id="head-tailx">
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="3door"><h1>3 ประตู</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="3door" class="form-control input-aplotto" id="3door">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="5door"><h1>5 ประตู</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="5door" class="form-control input-aplotto" id="5door">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="upper-lower"><h1>บน-ล่าง</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="upper-lower" class="form-control input-aplotto" id="upper-lower">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="upper"><h1>บน</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="upper" class="form-control input-aplotto" id="upper">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default form-group" id="input-info">
                        <div class="panel-heading"><label for="lower"><h1>ล่าง</h1></label></div>
                        <div class="panel-body">
                            <input type="text" name="lower" class="form-control input-aplotto" id="lower">
                        </div>
                    </div>
                </div>    
                <div class="col-md-12">
                    <div class="text-center">
                    <br><button type="Submit" class="btn btn-success text-center">บันทึก</button>&nbsp;&nbsp 
                    <button type="reset" class="btn btn-danger" value="clear">ล้างข้อมูล</button>
                    </div>
                </div>
                </form>    
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
    
</body>

</html>

