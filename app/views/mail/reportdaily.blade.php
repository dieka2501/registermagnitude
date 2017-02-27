<!DOCTYPE html>
<html>
  	<head>
    <title>Email Template</title>
    <style type="text/css">
    body {
    	background: #fff;
    	margin: 0px;
    	padding: 0px;
    	font-family: Arial,sans-serif;
    }
    .header {
    	width: 500px;
    	padding: 20px 0px;
    	margin: 0 auto;
    }
    .header img {
    	max-height: 60px;
    }
    .wrapper {
    	width: 500px;
    	min-height: 400px;
    	margin: 0px auto;
    	border: 1px solid #dddddd;
    	border-radius: 10px;
    	-webkit-border-radius: 10px;
    	-moz-border-radius: 10px;
    }
    .content {
    	padding: 20px;
    }
    .content p {
    	font-size: 11px;
    	color: #555555;
    }
    .details {
    	background: #E9F0FA;
    	padding: 20px;
    }
    p.title-detail {
    	margin-top: 0px;
    }
    p.content-detail {
    	margin-top: 5px;
    	margin-left: 30px;
    	margin-bottom: 0px;
    }
    .copyright {
    	margin-top: 50px;
    }
    .copyright p {
    	line-height: 5px;
    }
    </style>
  	</head>
  	<body style="background: #fff;
    	margin: 0px;
    	padding: 0px;
    	font-family: Arial,sans-serif;">
  		<div class="header" style="width: 500px;
    	padding: 20px 0px;
    	margin: 0 auto;">
  			<img src="<?php echo Config::get('app.url') ?>/assets/image/ctc.jpg" alt="logo" style="max-height: 60px;">
  		</div>
	  	<div class="wrapper" style="width: 500px;
    	min-height: 400px;
    	margin: 0px auto;
    	border: 1px solid #dddddd;
    	border-radius: 10px;
    	-webkit-border-radius: 10px;
    	-moz-border-radius: 10px;">
	  		<div class="content" style="padding: 20px;">
	  			<h4>Laporan Harian, tanggal <?php echo date('d m Y')?></h4>
	  			<p style="font-size: 11px;
    	color: #555555;">Jumlah Registrasi : <?php echo $total_registrasi?></p>
	  			<p style="font-size: 11px;
    	color: #555555;">Jumlah Check In : <?php echo $checkin?> </p>
	  			<p style="font-size: 11px;
    	color: #555555;">Jumlah Verifikasi Email : <?php echo $verifikasi?></p>
        <p style="font-size: 11px;
        color: #555555;">Jumlah Data Visitor: <?php echo $total_visitor?></p>

	  			<div class="details" style="background: #E9F0FA;
    	padding: 20px;">
	  				

	  			<p>Jangan balas email ini..</p>
	  			<div class="copyright" style="margin-top: 50px;">
	  			<p style="line-height: 5px;">Terima Kasih,</p>
	  			<p style="line-height: 5px;">CeMAT Southeast Asia 2017</p>
                <p style="line-height: 5px;">Powered By Data Driven Asia</p>
	  			</div>
	  		</div>
	  	</div>
  	</body>
</html>