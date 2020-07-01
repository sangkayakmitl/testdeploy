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
</head>

<body>
<div class="container-fluid">
    
    <?php
        showheader();
        shownav($_SESSION['user_type']);
        if($_GET['trasectionid']!='')
        {    
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
            
            $sql="SELECT * FROM lotto_tbl where lotto_id=".$_GET['trasectionid'];

            mysqli_query($link,$sql);
            if(mysqli_affected_rows($link))
            {
                $result = mysqli_query($link,$sql);
                $row= mysqli_fetch_assoc($result);
                $oldlotto_type=$row['lotto_type'];
                $oldlotto_number=$row['lotto_number'];
                $oldlotto_price=$row['lotto_price'];
            }
            mysqli_free_result($result);
            mysqli_close($link); 
            
            echo '<div class="row-fluid">
                    <div class="col-md-8 offset2 text-center"><br><br>
                        <div class="panel panel-danger">
                            <div class="panel-heading">กำลังทำการลบ record '.$_GET['trasectionid'].' ที่มีปัญหา ( '.$oldlotto_type.' )</div>
                                <div class="panel-body">

                                    <div class="row-fluid">
                                      <form class="form-inline" action="deletelotto_action.php" method="post">
                                        <div class="form-group">
                                          <label for="old_lotto_number">Lotto Number:</label>
                                          <input type="text" value="'.$oldlotto_number.'" class="form-control" id="new_lotto_number" name="old_lotto_number" disabled="">
                                        </div>
                                        <div class="form-group">
                                          <label for="old_lotto_price">Lotto Price:</label>
                                          <input type="text" value="'.$oldlotto_price.'" class="form-control" id="new_lotto_price"  name="old_lotto_price" disabled="">
                                        </div><br><br>
                                        
                                        <input type="hidden" name="transection_id" value="'.$_GET['trasectionid'].'" />                                        
                                        <input type="hidden" name="lotto_type" value="'.$oldlotto_type.'" />
                                   
                                        
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <a href="view_error_all.php" id="cancel" name="cancel" class="btn btn-warning">Cancel</a>
                                       
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



