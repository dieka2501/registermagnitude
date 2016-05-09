<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		div { 
			  background: url('<?php echo Config::get('app.url')?>assets/image/bagde-kosong.jpg') no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			  width: 700px;
			  height: 900px;
			}
			p{
				margin: 0px;
			}
	</style>
	<title></title>
</head>
<body>

	<div>
		<table border="0" width="40%" >
			<tr>
				<td  width="50%" align="center" valign="top" height=""> 
					<p><strong><?php echo $name?></strong></p>
					<p><strong><?php echo $perusahaan?></strong></p>
					<p><strong><?php echo $posisi?></strong></p>
				</td>
				<td width="50%">
					<img src="<?php echo Config::get('app.url')?>assets/qr/<?php echo str_replace(' ','',$name).'.png' ?>" width="600px" height="600px">
				</td>
			</tr>
		</table>
		
	</div>
</body>
</html>