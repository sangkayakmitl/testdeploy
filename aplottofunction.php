<?php

date_default_timezone_set('Asia/Bangkok');

const line_pong_token="CDz7uy3yvzP40v3sfo0tthZyJV4RGqQsU47xdPV56rX";


function send_line_tocloud($Message)
{
    $response=send_line_notify(line_cloudteam_token, $Message);
    return $response;
}

function send_line_tomail($Message)
{
    $response=send_line_notify(line_mailteam_token, $Message);
    return $response;
}

function send_line_toerp($Message)
{
    $response=send_line_notify(line_erpteam_token, $Message);
    return $response;
}

function send_line_toad($Message)
{
    $response=send_line_notify(line_adteam_token, $Message);
    return $response;
}

function send_line_topong($Message)
{
    $response=send_line_notify(line_pong_token, $Message);
    return $response;
}
function send_line_notify($My_Token,$My_Message)
{
    $res="";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set("Asia/Bangkok");

    $chOne = curl_init(); 
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt( $chOne, CURLOPT_POST, 1); 
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$My_Message); 
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$My_Token.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
    $result = curl_exec( $chOne );

    if(curl_error($chOne)) 
    { 
            $res= 'error:' . curl_error($chOne); 
    } 
    else { 
            $result_ = json_decode($result, true); 
            $res= "status : ".$result_['status']."\nmessage : ". $result_['message'];
    } 
    return $res;
    curl_close( $chOne );   
}

function aplottodbconnect()
{
    return mysqli_connect('d6ybckq58s9ru745.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'jxvcknko9wobuwli', 'kkty6pzatbu3ejp7','lywcfi7s9d5nqwzc');
}

function printcss()
{
    echo '  
            #user-info h1
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
              font-weight: bold;
            }
            #user-info p
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
            }
            #history-info h1
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
              font-weight: bold;
            }
            #history-info p
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
            }
            #error-info h1
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
              font-weight: bold;
            }
            #error-info p
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
            }
            #input-info h1
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 30px;
              font-weight: bold;
            }
            #input-info p
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
            }
            #report-info h1
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 30px;
              font-weight: bold;
            }
            #report-info p
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
            }
            .input-aplotto
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 23px;
              font-weight: bold;
            }
            .dropdown-menu li
            {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 25px;
              font-weight: bold;
              color: blue;
            }
            .nav b {
              font-family: Verdana,Helvetica,sans-serif;
              font-size: 25px;
              font-weight: bold;
              color: blue;
            }
    ';
}

function showloginpage()
{
    echo    ' 
    <div class="row-fluid">
        <div class="col-md-12 text-center"></div>
        <div class="row-fluid">
                    <div class="col-md-8 offset2" style="height: auto" >
                        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Sign In</div>
                                    <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                                </div>     
                                <div style="padding-top:30px" class="panel-body" >
                                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                    <form id="loginform" class="form-horizontal" action="loginpage.php" method="post" role="form">
                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Your Username.">                                        
                                        </div>
                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Your Password.">
                                        </div>
                                        <div class="input-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input id="login-remember" type="hidden" name="remember" value="1"> Are you ready.
                                                </label>
                                                <label>
                                                    <button type="Submit" class="btn btn-success">Let`s Go.</button>&nbsp;&nbsp
                                                </label>
                                                <label>
                                                    <button type="reset" class="btn btn-danger" value="clear">Clear.</button>
                                                </label>                      
                                        </div>
                                        <div style="margin-top:10px" class="form-group">
                                            <!-- Button -->
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                                    เฮง ๆ รวย ๆ มาซื้อหวยกับเราสิครับ
                                                    <a href="setuploginpage.php"><span><i class="glyphicon glyphicon-home"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>                     
                            </div>  
                        </div>
                    </div>
                </div>
        </div>
    </div>
            ';
}

function showheader()
{
   echo '  
            <div class="row-fluid">
                <div class="col-md-12 text-left"><img src="Image/aplottomgr.png" style="width:30% ;height:30%"></div>
            </div>
            <div class="row-fluid">
                <div class="col-md-12"><br></div>
            </div>';
    
    /*echo '  

            <div class="row-fluid">
                <div class="col-md-12 text-center"><p class="bg-info">................................Ap lotto Manager ................................Ap lotto Manager ................................  Ap lotto Manager ................................  Ap lotto Manager ................................ </p></div>
            </div>

            ';*/
}

//***************************************************Show navigate**************************************************
//input :   $userrole
//output:   NONE
//******************************************************************************************************************
function shownav($role)
{    
    $currenturl=explode('/', $_SERVER["PHP_SELF"]);    
    if($role=="master")
    {
        $showreportlink='<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>ดูข้อมูล</b><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="view_allinone.php"> ดูข้อมูลภาพรวม </a></li>
                        <li><a href="view_tong_head.php">ดูข้อมูลหัว</a></li>
                        <li><a href="view_tong_tail.php">ดูข้อมูลท้าย</a></li>
                        <li><a href="view_tod_head.php">ดูข้อมูลโต๊ดหัว</a></li>
                        <li><a href="view_tod_tail.php">ดูข้อมูลโต๊ดท้าย</a></li>
                        <li><a href="view_fourtime.php">ดูข้อมูลสี่ครั้ง</a></li>
                        <li><a href="view_upper.php">ดูข้อมูลบน</a></li>
                        <li><a href="view_lower.php">ดูข้อมูลล่าง</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="view_error_all.php">ดูข้อมูลที่มีปัญหาทั้งหมด</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="view_aunt_form.php">อั้น</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="view_check_lotto_form.php">ตรวจหวยถูก</a></li>
                        <li><a href="view_check_lotto_mix_form.php">ตรวจหวยถูก(แบบรวม)</a></li>
                      </ul>
                    </li>';
    }
    else 
    {
        $showreportlink='<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>ดูข้อมูล</b><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="view_allinone.php"> ดูข้อมูลภาพรวม </a></li>
                        <li><a href="view_tong_head.php">ดูข้อมูลหัว</a></li>
                        <li><a href="view_tong_tail.php">ดูข้อมูลท้าย</a></li>
                        <li><a href="view_tod_head.php">ดูข้อมูลโต๊ดหัว</a></li>
                        <li><a href="view_tod_tail.php">ดูข้อมูลโต๊ดท้าย</a></li>
                        <li><a href="view_fourtime.php">ดูข้อมูลสี่ครั้ง</a></li>
                        <li><a href="view_upper.php">ดูข้อมูลบน</a></li>
                        <li><a href="view_lower.php">ดูข้อมูลล่าง</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="view_error_all.php">ดูข้อมูลที่มีปัญหาทั้งหมด</a></li>
                      </ul>
                    </li>';
    }
    
    
    echo '
    <div class="row-fluid">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li '.ifcurrentnav($currenturl[2],'reg_allinone.php').'><a href="reg_allinone.php"><h4><b> รวม </b></h4></a></li>
                <li '.ifcurrentnav($currenturl[2],'reg_tong_head.php').'><a href="reg_tong_head.php"><h4><b> ห </b></h4></a></li>   
                <li '.ifcurrentnav($currenturl[2],'reg_tong_tail.php').'><a href="reg_tong_tail.php"><h4><b> ท </b></h4></a></li>
                <li '.ifcurrentnav($currenturl[2],'reg_head_tail.php').'><a href="reg_head_tail.php"><h4><b> ห-ท </b></h4></a></li>
                <li '.ifcurrentnav($currenturl[2],'reg_tod_head.php').'><a href="reg_tod_head.php"><h4><b> ตห </b></h4></a></li>   
                <li '.ifcurrentnav($currenturl[2],'reg_tod_tail.php').'><a href="reg_tod_tail.php"><h4><b> ตท </b></h4></a></li>   
                <li '.ifcurrentnav($currenturl[2],'reg_tod_head_tail.php').'><a href="reg_tod_head_tail.php"><h4><b> ตหท </b></h4></a></li>  
                <li '.ifcurrentnav($currenturl[2],'reg_fourtime.php').'><a href="reg_fourtime.php"><h4><b> 4ค </b></h4></a></li>
                <li '.ifcurrentnav($currenturl[2],'reg_head_multi36.php').'><a href="reg_head_multi36.php"><h4><b> หX </b></h4></a></li>     
                <li '.ifcurrentnav($currenturl[2],'reg_tail_multi36.php').'><a href="reg_tail_multi36.php"><h4><b> ทX </b></h4></a></li>
                <li '.ifcurrentnav($currenturl[2],'reg_head_tail_multi36.php').'><a href="reg_head_tail_multi36.php"><h4><b> ห-ทX </b></h4></a></li>
                <li '.ifcurrentnav($currenturl[2],'reg_fourtime_multi36.php').'><a href="reg_fourtime_multi36.php"><h4><b> 4ครั้งX </b></h4></a></li>     
                <li '.ifcurrentnav($currenturl[2],'reg_3door.php').'><a href="reg_3door.php"><h4><b> 3ป </b></h4></a></li> 
                <li '.ifcurrentnav($currenturl[2],'reg_4door.php').'><a href="reg_4door.php"><h4><b> 4ป </b></h4></a></li>     
                <li '.ifcurrentnav($currenturl[2],'reg_5door.php').'><a href="reg_5door.php"><h4><b> 5ป </b></h4></a></li>     
                <li '.ifcurrentnav($currenturl[2],'reg_upper.php').'><a href="reg_upper.php"><h4><b> บน </b></h4></a></li>   
                <li '.ifcurrentnav($currenturl[2],'reg_lower.php').'><a href="reg_lower.php"><h4><b> ล่าง </b></h4></a></li>    
                <li '.ifcurrentnav($currenturl[2],'reg_upper_lower.php').'><a href="reg_upper_lower.php"><h4><b> ล่าง-บน </b></h4></a></li> 
                '.$showreportlink.'
                <li '.ifcurrentnav($currenturl[2],'logoff.php').'><a href="logoff.php"><h4><b> Log Off </b></h4></a></li>
            </ul>
        </div>
    </div>';    
}

function ifcurrentnav($currentpage,$navipage)
{    
    $returnval='';
    if ($currentpage==$navipage)
    {
        $returnval='class="active"';
    }
    return $returnval;
}

function checklogin($username,$password)
{
    $login_info['authen_flag']="false";
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
    $sql="SELECT * FROM user_tbl where user_name='".$username."'";
        
    $result = mysqli_query($link,$sql);
    if(mysqli_affected_rows($link))
    {
        $result = mysqli_query($link,$sql);
        $row= mysqli_fetch_assoc($result);
        if ($row['user_password']==$password)
        {
            $login_info['authen_flag']="true";
            $login_info['user_type']=$row['user_type'];
            $login_info['user_name']=$row['user_name'];
            $login_info['user_phone']=$row['user_phone'];
        }
        return $login_info;
    }
    mysqli_free_result($result);
    mysqli_close($link); 
}

function showusertable()
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
    $sql="SELECT * FROM user_tbl";
        
    $result = mysqli_query($link,$sql);
    if(mysqli_affected_rows($link))
    {
        $result = mysqli_query($link,$sql);
        echo '
                  <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th class="text-center">อันดับที่</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">ชื่อผู้ใช้</th>
                        <th class="text-center">Hash Pasword</th>
                        <th class="text-center">เบอร์โทรศัพท์</th>
                        <th class="text-center">ปุ่มแก้ไข</th>
                        <th class="text-center">ปุ่มลบ</th>
                      </tr>
                    </thead>
                    <tbody>';
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo '<td>'.$row['user_id'].'</td>';
            echo '<td>'.$row['user_type'].'</td>';
            echo '<td>'.$row['user_name'].'</td>';
            echo '<td>'.$row['user_password'].'</td>';
            echo '<td>'.$row['user_phone'].'</td>';
            echo '<td><a href="edit_user.php?user_id='.$row['user_id'].'"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button></a></td>';
            echo '<td><a href="delete_user.php?user_id='.$row['user_id'].'"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
            echo '</tr>';     
            echo '</tr>';
        }
        
        echo '</tbody>
              </table>';
    }
    mysqli_free_result($result);
    mysqli_close($link); 
}

function showhistory($username,$role)
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
    
    if($role=='master')
    {
        $sql="SELECT * FROM lotto_tbl where lotto_status='ok' order by lotto_id desc limit 0,10;";
    }
    else
    {
        $sql="SELECT * FROM lotto_tbl where lotto_seller='$username' and lotto_status='ok' order by lotto_id desc limit 0,10;";
    }
        
    $result = mysqli_query($link,$sql);
    if(mysqli_affected_rows($link))
    {
        $result = mysqli_query($link,$sql);
        echo '
                <div class="panel panel-success" id="history-info">
                    <div class="panel-heading"><h1>History Last Record</h1></div>
                    <div class="panel-body">
                        <table class="table table-condensed text-center text-lg">
                            <thead>
                                <tr>
                                    <th class="text-center"><p><b>Seller</b></p></th>
                                    <th class="text-center"><p><b>Type</b></p></th>
                                    <th class="text-center"><p><b>Number</b></p></th>
                                    <th class="text-center"><p><b>Price</b></p></th>
                                    <th class="text-center"><p><b>Detail</b></p></th>
                                    <th class="text-center"><p><b>Date</b></p></th>
                                </tr>
                            </thead>
                            <tbody>';
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo '<td><p>'.$row['lotto_seller'].'</p></td>';
            echo '<td><p>'.$row['lotto_type'].'</p></td>';
            echo '<td><p>'.$row['lotto_number'].'</p></td>';
            echo '<td><p>'.$row['lotto_price'].'</p></td>';
            echo '<td><p>'.$row['lotto_detail'].'</p></td>';
            echo '<td><p>'.$row['date'].'</p></td>';
            echo '</tr>';
        }
        
            echo '          </tbody>
                        </table>
                     </div>
                </div>';
    }
    mysqli_free_result($result);
    mysqli_close($link); 
}

function showuserdetail($username,$role)
{
    $allprice=0;
    $headprice=0;
    $tailprice=0;
    $todheadprice=0;
    $todtailprice=0;
    $fourtimeprice=0;
    $upperprice=0;
    $lowerprice=0;
    if ($role=='master')
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
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $allprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_type='หัว'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $headprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_type='ท้าย'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $tailprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_type='โต๊ดหัว'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $todheadprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_type='โต๊ดท้าย'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $todtailprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_type='สี่ครั้ง'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $fourtimeprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_type='บน'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $upperprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_type='ล่าง'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $lowerprice=$row['sumprice']; }
            }
        }
        echo ' <div class="panel panel-primary" id="user-info">
                    <div class="panel-heading"><H1> สวัสดีคุณ : '.$username.' ('.$role.')</H1></div>
                        <div class="panel-body">
                              <table class="table table-condensed text-center">
                                <thead>
                                  <tr>
                                    <th class="text-center bg-primary"><p><b>รวม</b></p></th>
                                    <th class="text-center bg-warning"><p><b>หัว</b></p></th>
                                    <th class="text-center bg-warning"><p><b>ท้าย</b></p></th>
                                    <th class="text-center bg-info"><p><b>โต๊ดหัว</b></p></th>
                                    <th class="text-center bg-info"><p><b>โต๊ดท้าย</b></p></th>
                                    <th class="text-center bg-danger"><p><b>สี่ครั้ง</b></p></th>
                                    <th class="text-center bg-success"><p><b>บน</b></p></th>
                                    <th class="text-center bg-success"><p><b>ล่าง</b></p></th>
                                  </tr>
                                 </thead>
                                  <tr>
                                    <td class="bg-primary"><p>'.$allprice.'</p></td>
                                    <td class="bg-warning"><p>'.$headprice.'</p></td>
                                    <td class="bg-warning"><p>'.$tailprice.'</p></td>
                                    <td class="bg-info"><p>'.$todheadprice.'</p></td>
                                    <td class="bg-info"><p>'.$todtailprice.'</p></td>
                                    <td class="bg-danger"><p>'.$fourtimeprice.'</p></td>
                                    <td class="bg-success"><p>'.$upperprice.'</p></td>
                                    <td class="bg-success"><p>'.$lowerprice.'</p></td>
                                  </tr>
                              </table>
                        </div>
                </div>';
        return $allprice;
    }
    else if($role=='seller')
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
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_seller='$username'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $allprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_seller='$username' and lotto_type='หัว'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $headprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_seller='$username' and lotto_type='ท้าย'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $tailprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_seller='$username' and lotto_type='โต๊ดหัว'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $todheadprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_seller='$username' and lotto_type='โต๊ดท้าย'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $todtailprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_seller='$username' and lotto_type='สี่ครั้ง'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $fourtimeprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_seller='$username' and lotto_type='บน'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){ $upperprice=$row['sumprice']; }
            }
        }
        $sql="SELECT sum(lotto_price)as sumprice FROM lotto_tbl where lotto_seller='$username' and lotto_type='ล่าง'";        
        $result=mysqli_query($link,$sql);
        if(mysqli_affected_rows($link))
        {
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_assoc($result))
            {
                if($row['sumprice']!=NULL){                $lowerprice=$row['sumprice']; }
            }
        }
        
        echo ' <div class="panel panel-primary" id="user-info">
                    <div class="panel-heading"><H1> สวัสดีคุณ : '.$username.' ('.$role.')</H1></div>
                        <div class="panel-body">
                              <table class="table table-condensed text-center">
                                <thead>
                                  <tr>
                                    <th class="text-center bg-primary"><p><b>รวม</b></p></th>
                                    <th class="text-center bg-warning"><p><b>หัว</b></p></th>
                                    <th class="text-center bg-warning"><p><b>ท้าย</b></p></th>
                                    <th class="text-center bg-info"><p><b>โต๊ดหัว</b></p></th>
                                    <th class="text-center bg-info"><p><b>โต๊ดท้าย</b></p></th>
                                    <th class="text-center bg-danger"><p><b>สี่ครั้ง</b></p></th>
                                    <th class="text-center bg-success"><p><b>บน</b></p></th>
                                    <th class="text-center bg-success"><p><b>ล่าง</b></p></th>
                                  </tr>
                                 </thead>
                                  <tr>
                                    <td class="bg-primary"><p>'.$allprice.'</p></td>
                                    <td class="bg-warning"><p>'.$headprice.'</p></td>
                                    <td class="bg-warning"><p>'.$tailprice.'</p></td>
                                    <td class="bg-info"><p>'.$todheadprice.'</p></td>
                                    <td class="bg-info"><p>'.$todtailprice.'</p></td>
                                    <td class="bg-danger"><p>'.$fourtimeprice.'</p></td>
                                    <td class="bg-success"><p>'.$upperprice.'</p></td>
                                    <td class="bg-success"><p>'.$lowerprice.'</p></td>
                                  </tr>
                              </table>
                        </div>
                </div>';
        return $allprice;
    }
    else
    {
        
    }
}

function showlasterror($username,$role)
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
    
    if($role=='master')
    {
        $sql="SELECT * FROM lotto_tbl where lotto_status='not ok' limit 0,10;";
    }
    else
    {
        $sql="SELECT * FROM lotto_tbl where lotto_seller='$username' and lotto_status='not ok' limit 0,10;";
    }
        
    $result=mysqli_query($link,$sql);
    echo '<div class="panel panel-warning" id="error-info">
            <div class="panel-heading"><h1>Last Error Record</h1></div>
            <div class="panel-body text-center">';
    if(mysqli_affected_rows($link))
    {
        echo '  <p> ขณะนี้มีการใส่ข้อมูลที่ไม่ถูกต้องเกิดขึ้น 
                    <a href="view_error_all.php"><button type="button" class="btn btn-danger">
                        <span class="glyphicon glyphicon-edit"></span> คลิ๊กเพื่อแก้ไข
                    </button>
                    </a>
                </p>';
    }
    else
    {
        echo '  <p> ข้อมูลถูกต้อง
                </p>';
    }
    echo '  </div>
          </div>'  ;
    mysqli_free_result($result);
    mysqli_close($link); 
}

function showdetail($username,$role,$type,$rownum=7)
{
    $summaryprice=0;
    $endrownum=$rownum-1;
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
    
    if($role=='master')
    {
        $sql="SELECT lotto_type,lotto_number,sum(lotto_price) FROM lotto_tbl where lotto_type='$type' group by lotto_number order by sum(lotto_price) desc";
    }
    else
    {
        $sql="SELECT lotto_type,lotto_number,sum(lotto_price) FROM lotto_tbl where lotto_type='$type' and lotto_seller='$username' group by lotto_number order by sum(lotto_price) desc";
    }
    
    $result = mysqli_query($link,$sql);
    if(mysqli_affected_rows($link))
    {
        $i=0;
        $result = mysqli_query($link,$sql);
        echo '<div class="panel panel-danger" id="report-info">
                <div class="panel-heading text-center"><h1>ดูรายละเอียดการแทง'.$type.'</h1></div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>';
        
        for ($x = 0; $x < $endrownum; $x++) 
        {
            echo '  <th class="text-center"><p>Number</p></th>
                    <th class="text-center"><p>Price</p></th>
                    <th class="text-center"><p>|</p></th>';
        }  
                       
        echo ' <th class="text-center"><p>Number</p></th>
                <th class="text-center"><p>Price</p></th>  ';
                       
        echo '      </tr>
                    </thead>
                    <tbody class="text-center">';
        
        while ($row = mysqli_fetch_assoc($result))
        {
            if(($i%$rownum)=='0'){echo '<tr>';}
            //echo '<td>'.$row['lotto_type'].'</td>';
            echo '<td><p>'.$row['lotto_number'].'</p></td>';
            echo '<td><p>'.$row['sum(lotto_price)'].'</p></td>';
            $summaryprice=$summaryprice+$row['sum(lotto_price)'];
            if(($i%$rownum)==$endrownum){echo '</tr>';}else {echo '<td class="text-center"><p>|</p></td>';}
            $i++;
        }
        
        echo '</tbody>
              </table>
              </div>
              <div class="panel-footer text-center"><h1>รวมเป็นเงิน : '.$summaryprice.'</h1></div>
              </div>';
    }
    mysqli_free_result($result);
    mysqli_close($link); 
}

function tongheadinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $type="หัว";
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $detail="direct";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', '$type', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
    
}

function tongtailinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $type="ท้าย";
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $detail="direct";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', '$type', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
    
}

function todheadinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $type="โต๊ดหัว";
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $detail="direct";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', '$type', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
    
}

function todtailinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $type="โต๊ดท้าย";
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $detail="direct";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', '$type', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
    
}

function fourtimeinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $type="สี่ครั้ง";
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $detail="direct";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', '$type', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
    
}

function upperinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $type="บน";
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $detail="direct";
    if(strlen($number)==2){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', '$type', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
}

function lowerinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $type="ล่าง";
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $detail="direct";
    if(strlen($number)==2){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', '$type', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
    
}

function headtailinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $price=$price/2;
    $detail="หัว-ท้าย";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
}

function todheadtailinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $price=$price/2;
    $detail="โต๊ดหัว-โต๊ดท้าย";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'โต๊ดหัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'โต๊ดท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
}


function upperlowerinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $price=$price/2;
    $detail="บน-ล่าง";
    if(strlen($number)==2){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'บน', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ล่าง', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    mysqli_close($link);
}

function threedoorinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $price=$price/3;
    $detail="สามประตู";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    mysqli_close($link);
}

function headmulti36insert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $number1=$number[0].$number[1].$number[2];
    $number2=$number[1].$number[2].$number[0];
    $number3=$number[2].$number[0].$number[1];
    $number4=$number[0].$number[2].$number[1];
    $number5=$number[1].$number[0].$number[2];
    $number6=$number[2].$number[1].$number[0];
    $price=$piecesstr[1];   

    $detail="หัวx3x6";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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

    if($number[0]==$number[1]||$number[1]==$number[2]||$number[2]==$number[0])
    {
       
        $price=$price/3;

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
    }
    else
    {

        $price=$price/6;

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number4', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number5', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number6', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
    }
    mysqli_close($link);
}

function tailmulti36insert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $number1=$number[0].$number[1].$number[2];
    $number2=$number[1].$number[2].$number[0];
    $number3=$number[2].$number[0].$number[1];
    $number4=$number[0].$number[2].$number[1];
    $number5=$number[1].$number[0].$number[2];
    $number6=$number[2].$number[1].$number[0];
    $price=$piecesstr[1];   

    $detail="ท้ายx3x6";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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

    if($number[0]==$number[1]||$number[1]==$number[2]||$number[2]==$number[0])
    {
       
        $price=$price/3;

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
    }
    else
    {

        $price=$price/6;

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number4', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number5', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number6', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
    }
    mysqli_close($link);
}

function headtailmulti36insert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $number1=$number[0].$number[1].$number[2];
    $number2=$number[1].$number[2].$number[0];
    $number3=$number[2].$number[0].$number[1];
    $number4=$number[0].$number[2].$number[1];
    $number5=$number[1].$number[0].$number[2];
    $number6=$number[2].$number[1].$number[0];
    $price=$piecesstr[1];   

    $detail="หัว-ท้ายx3x6";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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

    if($number[0]==$number[1]||$number[1]==$number[2]||$number[2]==$number[0])
    {
       
        $price=$price/6;

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }

    }
    else
    {

        $price=$price/12;

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number4', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number5', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number6', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number4', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number5', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number6', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
    }
    mysqli_close($link);
}

function fourtimemulti36insert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $number1=$number[0].$number[1].$number[2];
    $number2=$number[1].$number[2].$number[0];
    $number3=$number[2].$number[0].$number[1];
    $number4=$number[0].$number[2].$number[1];
    $number5=$number[1].$number[0].$number[2];
    $number6=$number[2].$number[1].$number[0];
    $price=$piecesstr[1];   

    $detail="สี่ครั้งx3x6";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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

    if($number[0]==$number[1]||$number[1]==$number[2]||$number[2]==$number[0])
    {
       
        $price=$price/3;

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
    }
    else
    {

        $price=$price/6;

        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number2', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number3', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number4', '$price', '$detail', '$status', '$selldate')";
    
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number5', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
        
        $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number6', '$price', '$detail', '$status', '$selldate')";
        
        if (!mysqli_query($link,$sql))
        {
        die('Error: ' . mysqli_error());
        }
    }
    mysqli_close($link);
}

function fourdoorinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $price=$price/4;
    $detail="สี่ประตู";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'โต๊ดหัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'โต๊ดท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
            
    mysqli_close($link);
}

function fivedoorinsert($seller,$regdetail)
{
    $piecesstr = explode(".",$regdetail);
    $number=$piecesstr[0];
    $price=$piecesstr[1];
    $price=$price/5;
    $detail="ห้าประตู";
    if(strlen($number)==3){$status="ok";}else{$status="not ok";}
    $selldate=date('Y-m-d H:i:s');
    
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
   
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'หัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'ท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'โต๊ดหัว', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'โต๊ดท้าย', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    $sql="INSERT INTO `lotto_tbl` (`lotto_seller`, `lotto_type`, `lotto_number`, `lotto_price`, `lotto_detail`, `lotto_status`, `date`) VALUES ('$seller', 'สี่ครั้ง', '$number', '$price', '$detail', '$status', '$selldate')";
    
    if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error());
    }
    
    mysqli_close($link);
}

function showreport($username,$role,$type)
{
    $summaryprice=0;
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
    
    if($role=='master')
    {
        $sql="SELECT * FROM lotto_tbl where lotto_type='$type' and lotto_status='ok' order by date desc";
    }
    else
    {
        $sql="SELECT * FROM lotto_tbl where lotto_type='$type' and lotto_seller='$username' and lotto_status='ok' order by date desc";
    }
        
    $result = mysqli_query($link,$sql);
    if(mysqli_affected_rows($link))
    {
        $result = mysqli_query($link,$sql);
        echo '
              <div class="panel panel-success" id="report-info">
                <div class="panel-heading text-center"><h1>ดูรายละเอียดการแทง'.$type.'</h1></div>
                <div class="panel-body">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th class="text-center"><p>Seller</p></th>
                        <th class="text-center"><p>Type</p></th>
                        <th class="text-center"><p>Number</p></th>
                        <th class="text-center"><p>Price</p></th>
                        <th class="text-center"><p>รายละเอียด</p></th>
                        <th class="text-center"><p>สถานะ</p></th>
                        <th class="text-center"><p>วันที่บันทึก</p></th>
                      </tr>
                    </thead>
                    <tbody>';
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo '<td><p>'.$row['lotto_seller'].'</p></td>';
            echo '<td><p>'.$row['lotto_type'].'</p></td>';
            echo '<td><p>'.$row['lotto_number'].'</p></td>';
            echo '<td><p>'.$row['lotto_price'].'</p></td>';
            echo '<td><p>'.$row['lotto_detail'].'</p></td>';
            echo '<td><p>'.$row['lotto_status'].'</p></td>';
            echo '<td><p>'.$row['date'].'</p></td>';
            echo '</tr>';
            $summaryprice=$summaryprice+$row['lotto_price'];
        }
        
        echo '</tbody>
              </table>
              </div>
              <div class="panel-footer text-center"><h1>รวมเป็นเงิน : '.$summaryprice.'</h1></div>
              </div>';
    }
    mysqli_free_result($result);
    mysqli_close($link); 
}

function showerrorreport($username,$role,$type)
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
    
    if($role=='master')
    {
        $sql="SELECT * FROM lotto_tbl where lotto_type='$type' and lotto_status='not ok' order by date desc";
    }
    else
    {
        $sql="SELECT * FROM lotto_tbl where lotto_type='$type' and lotto_seller='$username' and lotto_status='not ok' order by date desc";
    }
        
    $result=mysqli_query($link,$sql);
    
    if(mysqli_affected_rows($link))
    {
        echo '<div class="panel panel-danger">
                <div class="panel-heading text-center"><h4>ขณะนี้มีการใส่ข้อมูลที่ไม่ถูกต้องเกิดขึ้นในการแทง'.$type.'</h4></div>
                <div class="panel-body text-center bg-danger">
                <p> 
                    <a href="view_error_all.php"><button type="button" class="btn btn-danger">
                        <span class="glyphicon glyphicon-edit"></span> คลิ๊กเพื่อแก้ไข
                    </button>
                    </a>
                </p>
                </div>
              </div>'  ;
    }
    else
    {
        
    }
    
    mysqli_free_result($result);
    mysqli_close($link); 
}

function showwinner($username,$role,$type,$winnum)
{
    $summaryprice=0;
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
    
    $sql="SELECT * FROM lotto_tbl where lotto_type='$type' and lotto_status='ok' and lotto_number='$winnum'";
    
    $result = mysqli_query($link,$sql);

                    if(mysqli_affected_rows($link))
                    {
                        $result = mysqli_query($link,$sql);
                                
                        echo '
                            <div class="panel panel-danger" id="report-info">
                                <div class="panel-heading"><h1>แจ้งสถานะผู้ถูกรางวัล'.$type.'</h1></div>
                                <div class="panel-body text-center">
                                  <table class="table text-center">
                                    <thead>
                                      <tr>
                                        <th class="text-center"><p>Name</p></th>
                                        <th class="text-center"><p>Type</p></th>
                                        <th class="text-center"><p>Number</p></th>
                                        <th class="text-center"><p>Price</p></th>
                                        <th class="text-center"><p>รายละเอียด</p></th>
                                        <th class="text-center"><p>สถานะ</p></th>
                                        <th class="text-center"><p>วันที่บันทึก</p></th>
                                      </tr>
                                    </thead>
                                    <tbody>';
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo '<tr>';
                            echo '<td><p>'.$row['lotto_seller'].'</p></td>';
                            echo '<td><p>'.$row['lotto_type'].'</p></td>';
                            echo '<td><p>'.$row['lotto_number'].'</p></td>';
                            echo '<td><p>'.$row['lotto_price'].'</p></td>';
                            echo '<td><p>'.$row['lotto_detail'].'</p></td>';
                            echo '<td><p>'.$row['lotto_status'].'</p></td>';
                            echo '<td><p>'.$row['date'].'</td>';
                            echo '</tr>';
                            $summaryprice=$summaryprice+$row['lotto_price'];
                        }
                        
                        echo '</tbody>
                              </table>
                              </div>
                              <div class="panel-footer text-center"><h1>รวมเป็นเงิน : '.$summaryprice.'</h1></div>
                            </div>
                       ';
                    }
                    else 
                    {
                        echo '
                            <div class="panel panel-success" id="report-info">
                                <div class="panel-heading"><h1>แจ้งสถานะผู้ถูกรางวัล'.$type.'</h1></div>
                                <div class="panel-body text-center">
                                    <h1>ไม่มีผู้ที่ถูกรางวัล'.$type.'เลย</h1>
                                </div>
                            </div>
                        ';
                    }
                    mysqli_free_result($result);
                    mysqli_close($link); 
                    return $summaryprice;
}

function showtodwinner($username,$role,$type,$winnum)
{
    $tod_prize1=$winnum[0].$winnum[1].$winnum[2];
    $tod_prize2=$winnum[0].$winnum[2].$winnum[1];
    $tod_prize3=$winnum[1].$winnum[0].$winnum[2];
    $tod_prize4=$winnum[1].$winnum[2].$winnum[0];
    $tod_prize5=$winnum[2].$winnum[0].$winnum[1];
    $tod_prize6=$winnum[2].$winnum[1].$winnum[0];
    $summaryprice=0;
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
    
    $sql="SELECT * FROM lotto_tbl where lotto_type='$type' and lotto_status='ok' and (lotto_number='$tod_prize1' or lotto_number='$tod_prize2' or lotto_number='$tod_prize3' or lotto_number='$tod_prize4' or lotto_number='$tod_prize5' or lotto_number='$tod_prize6')";
    
    $result = mysqli_query($link,$sql);

                    if(mysqli_affected_rows($link))
                    {
                        $result = mysqli_query($link,$sql);
                                
                        echo '
                            <div class="panel panel-danger" id="report-info">
                                <div class="panel-heading"><h1>แจ้งสถานะผู้ถูกรางวัล'.$type.'</h1></div>
                                <div class="panel-body text-center">
                                  <table class="table text-center">
                                    <thead>
                                      <tr>
                                        <th class="text-center"><p>Name</p></th>
                                        <th class="text-center"><p>Type</p></th>
                                        <th class="text-center"><p>Number</p></th>
                                        <th class="text-center"><p>Price</p></th>
                                        <th class="text-center"><p>รายละเอียด</p></th>
                                        <th class="text-center"><p>สถานะ</p></th>
                                        <th class="text-center"><p>วันที่บันทึก</p></th>
                                      </tr>
                                    </thead>
                                    <tbody>';
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo '<tr>';
                            echo '<td><p>'.$row['lotto_seller'].'</p></td>';
                            echo '<td><p>'.$row['lotto_type'].'</p></td>';
                            echo '<td><p>'.$row['lotto_number'].'</p></td>';
                            echo '<td><p>'.$row['lotto_price'].'</p></td>';
                            echo '<td><p>'.$row['lotto_detail'].'</p></td>';
                            echo '<td><p>'.$row['lotto_status'].'</p></td>';
                            echo '<td><p>'.$row['date'].'</td>';
                            echo '</tr>';
                            $summaryprice=$summaryprice+$row['lotto_price'];
                        }
                        
                        echo '</tbody>
                              </table>
                              </div>
                              <div class="panel-footer text-center"><h1>รวมเป็นเงิน : '.$summaryprice.'</h1></div>
                            </div>
                       ';
                    }
                    else 
                    {
                        echo '
                            <div class="panel panel-success" id="report-info">
                                <div class="panel-heading"><h1>แจ้งสถานะผู้ถูกรางวัล'.$type.'</h1></div>
                                <div class="panel-body text-center">
                                    <h1>ไม่มีผู้ที่ถูกรางวัล'.$type.'เลย</h1>
                                </div>
                            </div>
                        ';
                    }
                    mysqli_free_result($result);
                    mysqli_close($link); 
                    return $summaryprice;
}

function showfourtimewinner($username,$role,$type,$winnum1,$winnum2,$winnum3,$winnum4)
{
    $summaryprice=0;
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
    
    $sql="SELECT * FROM lotto_tbl where lotto_type='$type' and lotto_status='ok' and (lotto_number='$winnum1' or lotto_number='$winnum2' or lotto_number='$winnum3' or lotto_number='$winnum4')";
    
    $result = mysqli_query($link,$sql);

                    if(mysqli_affected_rows($link))
                    {
                        $result = mysqli_query($link,$sql);
                                
                        echo '
                            <div class="panel panel-danger" id="report-info">
                                <div class="panel-heading"><h1>แจ้งสถานะผู้ถูกรางวัล'.$type.'</h1></div>
                                <div class="panel-body text-center">
                                  <table class="table text-center">
                                    <thead>
                                      <tr>
                                        <th class="text-center"><p>Name</p></th>
                                        <th class="text-center"><p>Type</p></th>
                                        <th class="text-center"><p>Number</p></th>
                                        <th class="text-center"><p>Price</p></th>
                                        <th class="text-center"><p>รายละเอียด</p></th>
                                        <th class="text-center"><p>สถานะ</p></th>
                                        <th class="text-center"><p>วันที่บันทึก</p></th>
                                      </tr>
                                    </thead>
                                    <tbody>';
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo '<tr>';
                            echo '<td><p>'.$row['lotto_seller'].'</p></td>';
                            echo '<td><p>'.$row['lotto_type'].'</p></td>';
                            echo '<td><p>'.$row['lotto_number'].'</p></td>';
                            echo '<td><p>'.$row['lotto_price'].'</p></td>';
                            echo '<td><p>'.$row['lotto_detail'].'</p></td>';
                            echo '<td><p>'.$row['lotto_status'].'</p></td>';
                            echo '<td><p>'.$row['date'].'</td>';
                            echo '</tr>';
                            $summaryprice=$summaryprice+$row['lotto_price'];
                        }
                        
                        echo '</tbody>
                              </table>
                              </div>
                              <div class="panel-footer text-center"><h1>รวมเป็นเงิน : '.$summaryprice.' บาท</h1></div>
                            </div>
                       ';
                    }
                    else 
                    {
                        echo '
                            <div class="panel panel-success" id="report-info">
                                <div class="panel-heading"><h1>แจ้งสถานะผู้ถูกรางวัล'.$type.'</h1></div>
                                <div class="panel-body text-center">
                                    <h1>ไม่มีผู้ที่ถูกรางวัล'.$type.'เลย</h1>
                                </div>
                            </div>
                        ';
                    }
                    
                    mysqli_free_result($result);
                    mysqli_close($link); 
                    return $summaryprice;
}

function showmixwinner($username,$role,$bigwinnum,$fourtimewinnum1,$fourtimewinnum2,$fourtimewinnum3,$fourtimewinnum4,$lowerwinnum,$allincome)
{
    $summarypay=0;
    $headpay=0;
    $tailpay=0;
    $todheadpay=0;
    $todtailpay=0;
    $fourtimepay=0;
    $upperpay=0;
    $lowerpay=0;
    
    $multitong=550;
    $multitod=100;
    $multifourtime=120;
    $multitwonum=65;
        
    $headwinnum=$bigwinnum[0].$bigwinnum[1].$bigwinnum[2];
    $tailwinnum=$bigwinnum[3].$bigwinnum[4].$bigwinnum[5];
    $todheadwinnum1=$bigwinnum[0].$bigwinnum[1].$bigwinnum[2];
    $todheadwinnum2=$bigwinnum[0].$bigwinnum[2].$bigwinnum[1];
    $todheadwinnum3=$bigwinnum[1].$bigwinnum[0].$bigwinnum[2];
    $todheadwinnum4=$bigwinnum[1].$bigwinnum[2].$bigwinnum[0];
    $todheadwinnum5=$bigwinnum[2].$bigwinnum[1].$bigwinnum[0];
    $todheadwinnum6=$bigwinnum[2].$bigwinnum[0].$bigwinnum[1];
    $todtailwinnum1=$bigwinnum[3].$bigwinnum[4].$bigwinnum[5];
    $todtailwinnum2=$bigwinnum[3].$bigwinnum[5].$bigwinnum[4];
    $todtailwinnum3=$bigwinnum[4].$bigwinnum[3].$bigwinnum[5];
    $todtailwinnum4=$bigwinnum[4].$bigwinnum[5].$bigwinnum[3];
    $todtailwinnum5=$bigwinnum[5].$bigwinnum[3].$bigwinnum[4];
    $todtailwinnum6=$bigwinnum[5].$bigwinnum[4].$bigwinnum[3];
    $upperwinnum=$bigwinnum[4].$bigwinnum[5];
    
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
    
    $sql="SELECT * FROM lotto_tbl where (lotto_type='หัว' and lotto_status='ok' and lotto_number='$headwinnum')
                                                or (lotto_type='ท้าย' and lotto_status='ok' and lotto_number='$tailwinnum')
                                                or (lotto_type='โต๊ดหัว' and lotto_status='ok' and lotto_number='$todheadwinnum1')
                                                or (lotto_type='โต๊ดหัว' and lotto_status='ok' and lotto_number='$todheadwinnum2')
                                                or (lotto_type='โต๊ดหัว' and lotto_status='ok' and lotto_number='$todheadwinnum3')
                                                or (lotto_type='โต๊ดหัว' and lotto_status='ok' and lotto_number='$todheadwinnum4')
                                                or (lotto_type='โต๊ดหัว' and lotto_status='ok' and lotto_number='$todheadwinnum5')
                                                or (lotto_type='โต๊ดหัว' and lotto_status='ok' and lotto_number='$todheadwinnum6')
                                                or (lotto_type='โต๊ดท้าย' and lotto_status='ok' and lotto_number='$todtailwinnum1')
                                                or (lotto_type='โต๊ดท้าย' and lotto_status='ok' and lotto_number='$todtailwinnum2')
                                                or (lotto_type='โต๊ดท้าย' and lotto_status='ok' and lotto_number='$todtailwinnum3')
                                                or (lotto_type='โต๊ดท้าย' and lotto_status='ok' and lotto_number='$todtailwinnum4')
                                                or (lotto_type='โต๊ดท้าย' and lotto_status='ok' and lotto_number='$todtailwinnum5')
                                                or (lotto_type='โต๊ดท้าย' and lotto_status='ok' and lotto_number='$todtailwinnum6')
                                                or (lotto_type='สี่ครั้ง' and lotto_status='ok' and lotto_number='$fourtimewinnum1')
                                                or (lotto_type='สี่ครั้ง' and lotto_status='ok' and lotto_number='$fourtimewinnum2')
                                                or (lotto_type='สี่ครั้ง' and lotto_status='ok' and lotto_number='$fourtimewinnum3')
                                                or (lotto_type='สี่ครั้ง' and lotto_status='ok' and lotto_number='$fourtimewinnum4')
                                                or (lotto_type='บน' and lotto_status='ok' and lotto_number='$upperwinnum')
                                                or (lotto_type='ล่าง' and lotto_status='ok' and lotto_number='$lowerwinnum')
                                                order by lotto_seller
                                                ";    
    $result = mysqli_query($link,$sql);
    if(mysqli_affected_rows($link))
    {
        $result = mysqli_query($link,$sql);
        echo '
            <div class="panel panel-danger" id="report-info">
                <div class="panel-heading"><h1>แจ้งสถานะผู้ถูกรางวัลทั้งหมด</h1></div>
                <div class="panel-body text-center">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th class="text-center"><p>Name</p></th>
                        <th class="text-center"><p>Type</p></th>
                        <th class="text-center"><p>Number</p></th>
                        <th class="text-center"><p>Price</p></th>
                        <th class="text-center"><p>รายละเอียด</p></th>
                        <th class="text-center"><p>สถานะ</p></th>
                        <th class="text-center"><p>วันที่บันทึก</p></th>
                      </tr>
                    </thead>
                    <tbody>';
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo '<td><p>'.$row['lotto_seller'].'</p></td>';
            echo '<td><p>'.$row['lotto_type'].'</p></td>';
            echo '<td><p>'.$row['lotto_number'].'</p></td>';
            echo '<td><p>'.$row['lotto_price'].'</p></td>';
            echo '<td><p>'.$row['lotto_detail'].'</p></td>';
            echo '<td><p>'.$row['lotto_status'].'</p></td>';
            echo '<td><p>'.$row['date'].'</td>';
            echo '</tr>';
            
            if($row['lotto_type']=='หัว')
            {
                $headpay=$headpay+$row['lotto_price'];
            }
            elseif ($row['lotto_type']=='ท้าย') 
            {
                $tailpay=$tailpay+$row['lotto_price'];
            }
            elseif ($row['lotto_type']=='โต๊ดหัว') 
            {
                $todheadpay=$todheadpay+$row['lotto_price'];
            }
            elseif ($row['lotto_type']=='โต๊ดท้าย') 
            {
                $todtailpay=$todtailpay+$row['lotto_price'];
            }
            elseif ($row['lotto_type']=='สี่ครั้ง') 
            {
                $fourtimepay=$fourtimepay+$row['lotto_price'];
            }
            elseif ($row['lotto_type']=='บน') 
            {
                $upperpay=$upperpay+$row['lotto_price'];
            }
            elseif ($row['lotto_type']=='ล่าง') 
            {
                $lowerpay=$lowerpay+$row['lotto_price'];
            }
        }

        echo '</tbody>
              </table>
              </div>
            </div>
       ';
        
        $summarypay=($headpay*$multitong)+($tailpay*$multitong)+($todheadpay*$multitod)+($todtailpay*$multitod)+($fourtimepay*$multifourtime)+($upperpay*$multitwonum)+($lowerpay*$multitwonum);
        echo '
                <div class="panel panel-primary text-center" id="report-info">
                        <div class="panel-heading"><h1>สรุปยอดจ่ายทั้งหมด</h1></div>
                        <div class="panel-body">
                                <p> หัว: '.$headpay.' x '.$multitong.' =  '.$headpay*$multitong.' บาท </p>
                                <p> ท้าย: '.$tailpay.' x '.$multitong.' =  '.$tailpay*$multitong.' บาท </p>
                                <p> โต๊ดหัว: '.$todheadpay.' x '.$multitod.' =  '.$todheadpay*$multitod.' บาท </p>
                                <p> โต๊ดท้าย: '.$todtailpay.' x '.$multitod.' =  '.$todtailpay*$multitod.' บาท </p>
                                <p> สี่ครั้ง: '.$fourtimepay.' x '.$multifourtime.' =  '.$fourtimepay*$multifourtime.' บาท </p>
                                <p> บน: '.$upperpay.' x '.$multitwonum.' =  '.$upperpay*$multitwonum.' บาท </p>
                                <p> ล่าง: '.$lowerpay.' x '.$multitwonum.' =  '.$lowerpay*$multitwonum.' บาท </p>
                        </div>
                        <div class="panel-footer text-center">
                            <h1>รวมจ่ายทั้งหมด : '.$summarypay.' </h1>
                            <p>รายได้ทั้งหมดประมาณ : '.$allincome.' - '.$summarypay.' = '.($allincome-$summarypay).'</p>
                            <p>กำไรทั้งหมดประมาณ : '.$allincome*0.7.' - '.$summarypay.' = '.($allincome*0.7-$summarypay).'</p>
                        </div>
                    </div>
                ';
    }
    else 
    {
        echo '
            <div class="panel panel-success">
                <div class="panel-heading"><h4>แจ้งสถานะผู้ถูกรางวัลทั้งหมด</h4></div>
                <div class="panel-body text-center">
                    <h4>ไม่มีผู้ที่ถูกรางวัลใด ๆ เลย</h4>
                </div>
            </div>
        ';
    }
        
    $returnofthisround=($allincome*0.7)-$summarypay;
    $Message="";
    $Message.="\nหวยออกแล้วจ้า"."\n";
    $Message.="รางวัลที่ 1 => ".$bigwinnum."\n";
    $Message.="สี่ครั้ง => ".$fourtimewinnum1.":".$fourtimewinnum2.":".$fourtimewinnum3.":".$fourtimewinnum4."\n";
    $Message.="ล่าง => ".$lowerwinnum."\n";
    $Message.="\nReport Summary"."\n";
    $Message.="Out : ".$summarypay."\n";
    $Message.="In : ".$allincome."\n";
    $Message.="Summary : ".$returnofthisround."\n";
    send_line_topong($Message);
    
    mysqli_free_result($result);
    mysqli_close($link); 
    return $summarypay;
}

function showallerror($username,$role)
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
    
    if($role=='master')
    {
        $sql="SELECT * FROM lotto_tbl where lotto_status='not ok'";
    }
    else
    {
        $sql="SELECT * FROM lotto_tbl where lotto_seller='$username' and lotto_status='not ok'";
    }
        
    $result = mysqli_query($link,$sql);
    if(mysqli_affected_rows($link))
    { 
        $result = mysqli_query($link,$sql);
        echo '
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Number</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">รายละเอียด</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">วันที่บันทึก</th>
                        <th class="text-center">ปุ่มแก้ไข</th>
                        <th class="text-center">ปุ่มลบ</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">';
        while ($row = mysqli_fetch_assoc($result))
        {        
            echo '<tr>';
            echo '<td>'.$row['lotto_seller'].'</td>';
            echo '<td>'.$row['lotto_type'].'</td>';
            echo '<td>'.$row['lotto_number'].'</td>';
            echo '<td>'.$row['lotto_price'].'</td>';
            echo '<td>'.$row['lotto_detail'].'</td>';
            echo '<td>'.$row['lotto_status'].'</td>';
            echo '<td>'.$row['date'].'</td>';
            echo '<td><a href="editlotto.php?trasectionid='.$row['lotto_id'].'"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>';
            echo '<td><a href="deletelotto.php?trasectionid='.$row['lotto_id'].'"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button></td>';
            echo '</tr>';
        }
        echo '</tbody>
              </table>';
    }
    mysqli_free_result($result);
    mysqli_close($link); 
}

function encode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}

?>

