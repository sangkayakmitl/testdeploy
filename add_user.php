<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(empty($_SESSION['loginflag']))
    {
        header("location: loginpage.php");
    }
    include("aplottofunction.php");
    if($_SESSION['user_type']!='superuser')
    {
        header("location: logoff.php");
    }
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
                    
            echo '<div class="row-fluid">
                    <div class="col-md-6 offset3 text-center"><br><br>
                        <div class="panel panel-primary">
                            <div class="panel-heading">กำลังทำการเพิ่มข้อมูล User ใหม่</div>
                                <div class="panel-body">
                                    <form class="form-group" action="add_user_action.php" method="post">
                                        <div class="form-group row">
                                          <label for="inputtype" class="col-sm-4 col-form-label">User Type</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="newuser_type"  class="form-control" id="inputtype" placeholder="User Type" required>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="inputname" class="col-sm-4 col-form-label">User Name</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="newuser_name"  class="form-control" id="inputname" placeholder="User Name" required>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="inputphone" class="col-sm-4 col-form-label">User Phone</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="newuser_phone"  class="form-control" id="inputphone" placeholder="User Phone Number" required>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="inputpassword" class="col-sm-4 col-form-label">User Password</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="newuser_password"  class="form-control" id="inputpassword" placeholder="User Password" required>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <div class="text-center">
                                            <button type="submit" class="btn btn-success">Add New User</button>
                                            <a href="manage_user.php" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                         </div>
                    </div>
             </div>';

             echo '<div class="row-fluid">
                        <div class="col-md-6 offset3 text-center"><br><br>
                            <div class="panel panel-danger">
                                <div class="panel-heading"> Logoff Link </div>
                                    <div class="panel-body">
                                            <br>
                                            <div class="form-group row">
                                              <div class="text-center">
                                                <a href="logoff.php" id="Logoff" name="Logoff" class="btn btn-warning">Super Log off</a>
                                              </div>
                                            </div>
                                    </div>
                             </div>
                        </div>
                    </div>';
        
        
        
        
       
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



