<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		

	</style>
	<title></title>
</head>
<body>

	<div>
		<table border="1" width="90%" style="margin-top:0px; margin-left:50px; font-size: 50px ; padding: 0px;" >
			<tr>
				<td align="center" valign="center" width="50%" height="10px" style=""> 
					<p><strong><?php echo $name?></strong></p>
					<p><strong><?php echo $perusahaan?></strong></p>
					<p><strong><?php echo $posisi?></strong></p>
				</td>
				<td align="center" valign="center" width="50%">
					<img src="<?php echo Config::get('app.url')?>assets/qr/<?php echo str_replace(' ','',$name).'.png' ?>" width="300px" height="300px">
				</td>
			</tr>
		</table>
		
	</div>
</body>
</html>