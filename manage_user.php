<!DOCTYPE html>
<html lang="en">

<?php    
    session_start();
    if(empty($_SESSION['loginflag'])&&($_SESSION['user_type']!='superuser'))
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

    <div class="row-fluid">
        <div class="col-md-8 offset2 text-center">
            <div class="panel panel-primary">
                    <div class="panel-heading">หน้าบริหารจัดการ User & Pasword &nbsp;&nbsp;&nbsp;<a href="add_user.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></button></a></div>
                    <div class="panel-body">
                        <?php 
                            showusertable();
                        ?>
                    </div>
            </div>
        </div>
    </div>
    
    <div class="row-fluid">
        <div class="col-md-6 offset3 text-center"><br><br>
            <div class="panel panel-danger">
                <div class="panel-heading"> Clear Database </div>
                    <div class="panel-body">
                            <br>
                            <div class="form-group row">
                              <div class="text-center">
                                <a href="clear_database.php" id="ClearDB" name="ClearDB" class="btn btn-danger">Clear All Database.</a>
                              </div>
                            </div>
                    </div>
             </div>
        </div>
    </div>';


    <div class="row-fluid">
        <div class="col-md-6 offset3 text-center"><br><br>
            <div class="panel panel-success">
                <div class="panel-heading"> Logoff Link </div>
                    <div class="panel-body">
                            <br>
                            <div class="form-group row">
                              <div class="text-center">
                                <a href="logoff.php" id="Logoff" name="Logoff" class="btn btn-success">Super Log off</a>
                              </div>
                            </div>
                    </div>
             </div>
        </div>
    </div>

</div>
       
</body>

</html>



