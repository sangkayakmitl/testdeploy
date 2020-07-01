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
    //shownav($_SESSION['user_type']); 
   
    $big_prize=$_POST['big_prize'];
    $_SESSION['big_prize']=$_POST['big_prize'];
    $_SESSION['four_prize1']=$_POST['four_prize1'];
    $_SESSION['four_prize2']=$_POST['four_prize2'];
    $_SESSION['four_prize3']=$_POST['four_prize3'];
    $_SESSION['four_prize4']=$_POST['four_prize4'];
    $_SESSION['lower_prize']=$_POST['lower_prize'];

    $head_prize=$big_prize[0].$big_prize[1].$big_prize[2];
    $tail_prize=$big_prize[3].$big_prize[4].$big_prize[5];
    $tod_head_prize=$big_prize[0].$big_prize[1].$big_prize[2];
    $tod_tail_prize=$big_prize[3].$big_prize[4].$big_prize[5];
    $four_prize1=$_POST['four_prize1'];
    $four_prize2=$_POST['four_prize2'];
    $four_prize3=$_POST['four_prize3'];
    $four_prize4=$_POST['four_prize4'];
    $upper_prize=$big_prize[4].$big_prize[5];
    $lower_prize=$_POST['lower_prize'];
    
    $all_income=0;
    
    $headpay=0;
    $tailpay=0;
    $todheadpay=0;
    $todtailpay=0;
    $fourtimepay=0;
    $upperpay=0;
    $lowerpay=0;
    $sumarypay=0;
    
    $multitong=550;
    $multitod=100;
    $multifourtime=120;
    $multitwonum=65;

    ?>   
    
    <div class="row-fluid">
        
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2 text-center">
                    <a href="reg_allinone.php" id="Go Home" name="Go To Home" class="btn btn-warning">Go To Home..</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $all_income=showuserdetail($_SESSION['user_name'], $_SESSION['user_type']) ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $headpay=showwinner($_SESSION['user_name'], $_SESSION['user_type'],'หัว',$head_prize); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $tailpay=showwinner($_SESSION['user_name'], $_SESSION['user_type'],'ท้าย',$tail_prize); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $todheadpay=showtodwinner($_SESSION['user_name'], $_SESSION['user_type'],'โต๊ดหัว',$tod_head_prize); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $todtailpay=showtodwinner($_SESSION['user_name'], $_SESSION['user_type'],'โต๊ดท้าย',$tod_tail_prize); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $fourtimepay=showfourtimewinner($_SESSION['user_name'], $_SESSION['user_type'],'สี่ครั้ง',$four_prize1,$four_prize2,$four_prize3,$four_prize4); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $upperpay=showwinner($_SESSION['user_name'], $_SESSION['user_type'],'บน',$upper_prize); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2">
                    <?php $lowerpay=showwinner($_SESSION['user_name'], $_SESSION['user_type'],'ล่าง',$lower_prize); ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-6 offset3">
                    <div class="panel panel-primary text-center" id="report-info">
                        <div class="panel-heading"><h1>สรุปยอดจ่ายทั้งหมด</h1></div>
                        <div class="panel-body">
                                <p> หัว: <?php echo $headpay; ?> x <?php echo $multitong; ?> =  <?php echo $headpay*$multitong; ?>  บาท </p>
                                <p> ท้าย: <?php echo $tailpay; ?> x <?php echo $multitong; ?> =  <?php echo $tailpay*$multitong; ?>  บาท </p>
                                <p> โต๊ดหัว: <?php echo $todheadpay; ?> x <?php echo $multitod; ?> =  <?php echo $todheadpay*$multitod; ?>  บาท </p>
                                <p> โต๊ดท้าย: <?php echo $todtailpay; ?> x <?php echo $multitod; ?> =  <?php echo $todtailpay*$multitod; ?>  บาท </p>
                                <p> สี่ครั้ง: <?php echo $fourtimepay; ?> x <?php echo $multifourtime; ?> =  <?php echo $fourtimepay*$multifourtime; ?>  บาท </p>
                                <p> บน: <?php echo $upperpay; ?> x <?php echo $multitwonum; ?> =  <?php echo $upperpay*$multitwonum; ?>  บาท </p>
                                <p> ล่าง: <?php echo $lowerpay; ?> x <?php echo $multitwonum; ?> =  <?php echo $lowerpay*$multitwonum; ?>  บาท </p>
                        </div>
                        <?php    $summarypay=($headpay*$multitong)+($tailpay*$multitong)+($todheadpay*$multitod)+($todtailpay*$multitod)+($fourtimepay*$multifourtime)+($upperpay*$multitwonum)+($lowerpay*$multitwonum);?>
                        <div class="panel-footer text-center">
                            <p>รวมจ่ายทั้งหมด : <?php echo $summarypay; ?> </p>
                            <p>รายได้ทั้งหมดประมาณ : <?php echo $all_income ?> - <?php echo $summarypay ?> = <?php echo ($all_income-$summarypay) ?></p>
                            <p>กำไรทั้งหมดประมาณ : <?php echo $all_income*0.7; ?> - <?php echo $summarypay; ?> = <?php echo ($all_income*0.7)-$summarypay; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-8 offset2 text-center">
                    <a href="reg_allinone.php" id="Go Home" name="Go To Home" class="btn btn-warning">Go To Home..</a>
                </div>
            </div>
        </div>
        
        <?php
            $returnofthisround=($all_income*0.7)-$summarypay;
            $Message="";
            $Message.="\nหวยออกแล้วจ้า"."\n";
            $Message.="รางวัลที่ 1 => ".$big_prize."\n";
            $Message.="สี่ครั้ง => ".$four_prize1.":".$four_prize2.":".$four_prize3.":".$four_prize4."\n";
            $Message.="ล่าง => ".$lower_prize."\n";
            $Message.="\nReport Summary"."\n";
            $Message.="Out : ".$summarypay."\n";
            $Message.="In : ".$all_income."\n";
            $Message.="Summary : ".$returnofthisround."\n";
            send_line_topong($Message)
        ?>

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

