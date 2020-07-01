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
        if($_GET['user_id']!='')
        {    
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
            
            $sql="SELECT * FROM user_tbl where user_id=".$_GET['user_id'];

            mysqli_query($link,$sql);
            if(mysqli_affected_rows($link))
            {
                $result = mysqli_query($link,$sql);
                $row= mysqli_fetch_assoc($result);
                $olduser_type=$row['user_type'];
                $olduser_name=$row['user_name'];
                $olduser_password=$row['user_password'];
                $olduser_phone=$row['user_phone'];
            }
            mysqli_free_result($result);
            mysqli_close($link); 
            
            echo '<div class="row-fluid">
                    <div class="col-md-6 offset3 text-center"><br><br>
                        <div class="panel panel-primary">
                            <div class="panel-heading">กำลังทำการแก้ไขข้อมูลของ '.$olduser_name.'</div>
                                <div class="panel-body">

                                    <form class="form-group" action="edit_user_action.php" method="post">

                                        <input type="hidden" name="user_id" value="'.$_GET['user_id'].'" />
                                             
                                        <div class="form-group row">
                                          <label for="inputtype" class="col-sm-4 col-form-label">User Type</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="newuser_type" value='.$olduser_type.' class="form-control" id="inputtype" placeholder="user Type">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="inputname" class="col-sm-4 col-form-label">User Name</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="newuser_name" value='.$olduser_name.' class="form-control" id="inputname" placeholder="user name">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="inputphone" class="col-sm-4 col-form-label">User Phone</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="newuser_phone" value='.$olduser_phone.' class="form-control" id="inputphone" placeholder="user Phone">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="inputpassword" class="col-sm-4 col-form-label">User Password</label>
                                          <div class="col-sm-8">
                                            <input type="password" name="newuser_password" value='.$olduser_password.' class="form-control" id="inputpassword" placeholder="user Password">
                                          </div>
                                        </div>

                                            
                                        <div class="form-group row">
                                          <div class="text-center">
                                            <button type="submit" class="btn btn-success">Let Go! to Edit.</button>
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



