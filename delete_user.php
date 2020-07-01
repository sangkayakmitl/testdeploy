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

            $result=mysqli_query($link,$sql);
            if(mysqli_affected_rows($link))
            {
                $result = mysqli_query($link,$sql);
                $row= mysqli_fetch_assoc($result);
                $old_user_type=$row['user_type'];
                $old_user_name=$row['user_name'];
                $old_user_password=$row['user_password'];
                $old_user_phone=$row['user_phone'];
            }
            mysqli_free_result($result);
            mysqli_close($link); 
            
            echo '<div class="row-fluid">
                    <div class="col-md-8 offset2 text-center"><br><br>
                        <div class="panel panel-danger">
                            <div class="panel-heading"><h3>กำลังจะทำการลบ User : '.$old_user_name.' ที่ทำหน้าที่เป็น ( '.$old_user_type.' )</h3></div>
                                <div class="panel-body">

                                    <div class="row-fluid">
                                        <h3>ซึ่งมีรายละเดียดดังนี้</h3>
                                      <form class="form-inline" action="delete_user_action.php" method="post">
                                        <br>
                                        <div class="form-group">
                                          <label for="old_user_name">User Name:</label>
                                          <input type="text" value="'.$old_user_name.'" class="form-control" id="old_user_name" name="old_user_name" disabled="">
                                        </div><br><br>
                                        <div class="form-group">
                                          <label for="old_user_type">User Type:</label>
                                          <input type="text" value="'.$old_user_type.'" class="form-control" id="old_user_type"  name="old_user_type" disabled="">
                                        </div><br><br>
                                        <div class="form-group">
                                          <label for="old_user_phone">Phone Number:</label>
                                          <input type="text" value="'.$old_user_phone.'" class="form-control" id="old_user_phone" name="old_user_phone" disabled="">
                                        </div><br><br>
                                        <div class="form-group">
                                          <label for="old_user_password">Password Hash:</label>
                                          <input type="text" value="'.$old_user_password.'" class="form-control" id="old_user_password"  name="old_user_password" disabled="">
                                        </div><br><br>
                                        
                                        <input type="hidden" name="user_id" value="'.$_GET['user_id'].'" />                                        
                                        <input type="hidden" name="user_type" value="'.$old_user_type.'" />
                                   
                                        
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <a href="manage_user.php" id="cancel" name="cancel" class="btn btn-warning">Cancel</a>
                                       
                                      </form>
                                    </div>
                                </div>
                         </div>
                    </div>
             </div>';
        }
        
        //header( "refresh: 0.2; url=reg_3door.php" );
       
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



