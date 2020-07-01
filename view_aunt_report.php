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
   
    $aunt_tong_head_value=$_POST['tong-head-aunt-value'];
    $aunt_tong_tail_value=$_POST['tong-tail-aunt-value'];
    $aunt_tod_head_value=$_POST['tod-head-aunt-value'];
    $aunt_tod_tail_value=$_POST['tod-tail-aunt-value'];
    $aunt_upper_value=$_POST['upper-aunt-value'];
    $aunt_lower_value=$_POST['lower-aunt-value'];
    $aunt_4time_value=$_POST['4time-aunt-value'];

    $_SESSION['tong-head-aunt-value']=$_POST['tong-head-aunt-value'];
    $_SESSION['tong-tail-aunt-value']=$_POST['tong-tail-aunt-value'];
    $_SESSION['tod-head-aunt-value']=$_POST['tod-head-aunt-value'];
    $_SESSION['tod-tail-aunt-value']=$_POST['tod-tail-aunt-value'];
    $_SESSION['upper-aunt-value']=$_POST['upper-aunt-value'];
    $_SESSION['lower-aunt-value']=$_POST['lower-aunt-value'];
    $_SESSION['four-time-value']=$_POST['4time-aunt-value'];
    
    $headerstartsize="<h4>";
    $headerendsize="</h4>";
    

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
                    
                    <div class="panel panel-primary" id="report-info">
                        <div class="panel-heading text-center"><h1>รายงานการอั้นหัว ( <?php echo $aunt_tong_head_value; ?> ) </h1></div>
                        <div class="panel-body">
                            <?php
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

                                    $sql="select *, a.sum_price-".$aunt_tong_head_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='หัว'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_tong_head_value;


                                    $result = mysqli_query($link,$sql);
                                    if(mysqli_affected_rows($link))
                                    {
                                        $i=0;
                                        $result = mysqli_query($link,$sql);
                                        echo '
                                                  <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th class="text-center"><p>Number</p></th>
                                                        <th class="text-center"><p>อั้น</p></th>
                                                        <th class="text-center"><p>|</p></th>
                                                        <th class="text-center"><p>Number</p></th>
                                                        <th class="text-center"><p>อั้น</p></th>
                                                        <th class="text-center"><p>|</p></th>
                                                        <th class="text-center"><p>Number</p></th>
                                                        <th class="text-center"><p>อั้น</p></th>
                                                        <th class="text-center"><p>|</p></th>
                                                        <th class="text-center"><p>Number</p></th>
                                                        <th class="text-center"><p>อั้น</p></th>
                                                        <th class="text-center"><p>|</p></th>
                                                        <th class="text-center"><p>Number</p></th>
                                                        <th class="text-center"><p>อั้น</p></th>
                                                      </tr>
                                                    </thead>
                                                    <tbody class="text-center">';
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            if(($i%5)=='0'){echo '<tr>';}
                                            echo '<td><p><b>'.$row['lotto_number'].'</p></b></td>';
                                            echo '<td><p><b>'.$row['diff'].'</p></b></td>';
                                            if(($i%5)=='4'){echo '</tr>';}else{echo '<td><p>|</p></td>';}
                                            $i++;
                                        }

                                        echo '</tbody>
                                              </table>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($link); 
                             ?>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div> 
        <div class="col-md-12">
            <div class="row-fluid">
                
                <div class="col-md-12">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"><h1> รายงานการอั้นท้าย ( <?php echo $aunt_tong_tail_value; ?> ) </h1> </div>
                            <div class="panel-body">
                                <?php
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

                                        $sql="select *, a.sum_price-".$aunt_tong_tail_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='ท้าย'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_tong_tail_value;
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                            $i=0;
                                            $result = mysqli_query($link,$sql);
                                            echo '
                                                      <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody class="text-center">';
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                if(($i%5)=='0'){echo '<tr>';}
                                                echo '<td><p><b>'.$row['lotto_number'].'</p></b></td>';
                                                echo '<td><p><b>'.$row['diff'].'</p></b></td>';
                                                if(($i%5)=='4'){echo '</tr>';}else{echo '<td><p><b>|</p></b></td>';}
                                                $i++;
                                            }
                                            
                                            echo '</tbody>
                                                  </table>';
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>
                
            </div>
        </div> 
        <div class="col-md-12">
            <div class="row-fluid">
                
                <div class="col-md-12">
                        <div class="panel panel-default" id="report-info">
                             <div class="panel-heading text-center"><h1> รายงานการอั้นโต๊ดหัว ( <?php echo $aunt_tod_head_value; ?> ) </h1> </div>
                            <div class="panel-body">
                                <?php
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

                                        $sql="select *, a.sum_price-".$aunt_tod_head_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='โต๊ดหัว'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_tod_head_value;
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                            $i=0;
                                            $result = mysqli_query($link,$sql);
                                            echo '
                                                      <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody class="text-center">';
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                if(($i%5)=='0'){echo '<tr>';}
                                                echo '<td><p><b>'.$row['lotto_number'].'</p></b></td>';
                                                echo '<td><p><b>'.$row['diff'].'</p></b></td>';
                                                if(($i%5)=='4'){echo '</tr>';}else{echo '<td><p><b>|</p></b></td>';}
                                                $i++;
                                            }
                                            
                                            echo '</tbody>
                                                  </table>';
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>
                
            </div>
        </div> 
        <div class="col-md-12">
            <div class="row-fluid">
                
                <div class="col-md-12">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"><h1> รายงานการอั้นโต๊ดท้าย ( <?php echo $aunt_tod_tail_value; ?> ) </h1> </div>
                            <div class="panel-body">
                                <?php
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

                                        $sql="select *, a.sum_price-".$aunt_tod_tail_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='โต๊ดท้าย'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_tod_tail_value;
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                            $i=0;
                                            $result = mysqli_query($link,$sql);
                                            echo '
                                                      <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody class="text-center">';
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                if(($i%5)=='0'){echo '<tr>';}
                                                echo '<td><p><b>'.$row['lotto_number'].'</p></b></td>';
                                                echo '<td><p><b>'.$row['diff'].'</p></b></td>';
                                                if(($i%5)=='4'){echo '</tr>';}else{echo '<td><p><b>|</p></b></td>';}
                                                $i++;
                                            }
                                            
                                            echo '</tbody>
                                                  </table>';
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>
                
            </div>
        </div> 
        <div class="col-md-12">
            <div class="row-fluid">
                
                <div class="col-md-12">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"><h1> รายงานการอั้นสองตัวบน ( <?php echo $aunt_upper_value; ?> ) </h1> </div>
                            <div class="panel-body">
                                <?php
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

                                        $sql="select *, a.sum_price-".$aunt_upper_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='บน'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_upper_value;
                                        
                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                            $i=0;
                                            $result = mysqli_query($link,$sql);
                                            echo '
                                                      <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody class="text-center">';
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                if(($i%5)=='0'){echo '<tr>';}
                                                echo '<td><p><b>'.$row['lotto_number'].'</p></b></td>';
                                                echo '<td><p><b>'.$row['diff'].'</p></b></td>';
                                                if(($i%5)=='4'){echo '</tr>';}else{echo '<td><p><b>|</p></b></td>';}
                                                $i++;
                                            }
                                            
                                            echo '</tbody>
                                                  </table>';
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>
                
            </div>
        </div> 
        <div class="col-md-12">
            <div class="row-fluid">
                
                <div class="col-md-12">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"><h1> รายงานการอั้นสองตัวล่าง ( <?php echo $aunt_lower_value; ?> ) </h1> </div>
                            <div class="panel-body">
                                <?php
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

                                        $sql="select *, a.sum_price-".$aunt_lower_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='ล่าง'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_lower_value;
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                            $i=0;
                                            $result = mysqli_query($link,$sql);
                                            echo '
                                                      <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody class="text-center">';
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                if(($i%5)=='0'){echo '<tr>';}
                                                echo '<td><p><b>'.$row['lotto_number'].'</p></b></td>';
                                                echo '<td><p><b>'.$row['diff'].'</p></b></td>';
                                                if(($i%5)=='4'){echo '</tr>';}else{echo '<td><p><b>|</p></b></td>';}
                                                $i++;
                                            }
                                            
                                            echo '</tbody>
                                                  </table>';
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>
                
            </div>
        </div> 
        <div class="col-md-12">
            <div class="row-fluid">
                
                <div class="col-md-12">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"><h1> รายงานการอั้นสี่ครั้ง ( <?php echo $aunt_4time_value; ?> ) </h1> </div>
                            <div class="panel-body">
                                <?php
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

                                        $sql="select *, a.sum_price-".$aunt_4time_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='สี่ครั้ง'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_4time_value;
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                            $i=0;
                                            $result = mysqli_query($link,$sql);
                                            echo '
                                                      <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                            <th class="text-center"><p>|</p></th>
                                                            <th class="text-center"><p>Number</p></th>
                                                            <th class="text-center"><p>อั้น</p></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody class="text-center">';
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                if(($i%5)=='0'){echo '<tr>';}
                                                echo '<td><p><b>'.$row['lotto_number'].'</p></b></td>';
                                                echo '<td><p><b>'.$row['diff'].'</p></b></td>';
                                                if(($i%5)=='4'){echo '</tr>';}else{echo '<td><p><b>|</p></b></td>';}
                                                $i++;
                                            }
                                            
                                            echo '</tbody>
                                                  </table>';
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>
                
            </div>
        </div> 
        <div class="col-md-12">
            <div class="row-fluid">
                
                <div class="col-md-3">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"> <h1> รวมเงินที่อั้นหัว </h1> </div>
                            <div class="panel-body text-center">
                                <?php
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

                                        $sql="select *,sum(b.diff) as bdiff from (select *, a.sum_price-".$aunt_tong_head_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='หัว'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_tong_head_value.") b";
                                        
                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                           
                                            $result = mysqli_query($link,$sql);
                                           
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                               
                                                echo '<td><p>'.$row['bdiff'].'</p></td>';
                                               
                                            }
                                            
                                            
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>

                <div class="col-md-3">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"> <h1>รวมเงินที่อั้นท้าย</h1>  </div>
                            <div class="panel-body text-center">
                                <?php
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

                                        $sql="select *,sum(b.diff) as bdiff from (select *, a.sum_price-".$aunt_tong_tail_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='ท้าย'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_tong_tail_value.") b";
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                           
                                            $result = mysqli_query($link,$sql);
                                           
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                               
                                                echo '<td><p>'.$row['bdiff'].'</p></td>';
                                               
                                            }
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>

                <div class="col-md-3">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"> <h1>รวมเงินที่อั้นโต๊ดหัว</h1> </div>
                            <div class="panel-body text-center">
                                <?php
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

                                        $sql="select *,sum(b.diff) as bdiff from (select *, a.sum_price-".$aunt_tod_head_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='โต๊ดหัว'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_tod_head_value.") b";
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                           
                                            $result = mysqli_query($link,$sql);
                                           
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                               
                                                echo '<td><p>'.$row['bdiff'].'</p></td>';
                                               
                                            }
                                            
                                            
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>

                <div class="col-md-3">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"> <h1>รวมเงินที่อั้นโต๊ดท้าย</h1> </div>
                            <div class="panel-body text-center">
                                <?php
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

                                        $sql="select *,sum(b.diff) as bdiff from (select *, a.sum_price-".$aunt_tod_tail_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='โต๊ดท้าย'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_tod_tail_value.") b";
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                           
                                            $result = mysqli_query($link,$sql);
                                           
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                               
                                                echo '<td><p>'.$row['bdiff'].'</p></td>';
                                               
                                            }
                                            
                                            
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"> <h1>รวมเงินที่อั้นสี่ครั้ง</h1> </div>
                            <div class="panel-body text-center">
                                <?php
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

                                        $sql="select *,sum(b.diff) as bdiff from (select *, a.sum_price-".$aunt_4time_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='สี่ครั้ง'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_4time_value.") b";
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                           
                                            $result = mysqli_query($link,$sql);
                                           
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                               
                                                echo '<td><p>'.$row['bdiff'].'</p></td>';
                                               
                                            }
                                            
                                            
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"> <h1>รวมเงินที่อั้นสองตัวบน</h1> </div>
                            <div class="panel-body text-center">
                                <?php
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

                                        $sql="select *,sum(b.diff) as bdiff from (select *, a.sum_price-".$aunt_upper_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='บน'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_upper_value.") b";
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                           
                                            $result = mysqli_query($link,$sql);
                                           
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                               
                                                echo '<td><p>'.$row['bdiff'].'</p></td>';
                                               
                                            }
                                            
                                            
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
                            </div>
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="panel panel-default" id="report-info">
                            <div class="panel-heading text-center"> <h1>รวมเงินที่อั้นสองตัวล่าง</h1> </div>
                            <div class="panel-body text-center">
                                <?php
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

                                        $sql="select *,sum(b.diff) as bdiff from (select *, a.sum_price-".$aunt_lower_value." as diff from (SELECT lotto_type,lotto_number,sum(lotto_price) as sum_price FROM lotto_tbl where lotto_type='ล่าง'  group by lotto_number order by sum_price desc) a where a.sum_price >".$aunt_lower_value.") b";
                                        

                                        $result = mysqli_query($link,$sql);
                                        if(mysqli_affected_rows($link))
                                        {
                                           
                                            $result = mysqli_query($link,$sql);
                                           
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                               
                                                echo '<td><p>'.$row['bdiff'].'</p></td>';
                                               
                                            }
                                            
                                            
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link); 
                                 ?>
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

