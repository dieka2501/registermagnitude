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
			  height: 1000px;
			}
			p{
				margin: 0px;
			}
	</style>
	<title></title>
</head>
<body>

	<div style="margin-top:500px; padding-top: 50px">
		<table border="0" width="90%" >
			<tr>
				<td  width="50%" align="center" valign="top" height="400px"> 		
				</td>
				<td width="50%">
				</td>
			</tr>
			<tr>
				<td  width="50%" align="center" valign="top" height=""> 		
				</td>
				<td width="50%">
				</td>
			</tr>
			<tr>
				<td  width="50%" align="center" valign="top" height=""> 		
				</td>
				<td width="50%">
				</td>
			</tr>
			<tr>
				<td  width="50%" align="center" valign="top" height=""> 
					<p style="font-size: 39px"><strong><?php echo $name?></strong></p>
					<p style="font-size: 39px"><strong><?php echo $perusahaan?></strong></p>
					<p style="font-size: 39px"><strong><?php echo $posisi?></strong></p>
					<p style="font-size: 39px"><strong><?php echo $undian?></strong></p>
				</td>
				<td width="50%">
					<img src="<?php echo Config::get('app.url')?>assets/qr/<?php echo str_replace(' ','',$name).'.png' ?>" width="600px" height="600px">
				</td>
			</tr>
		</table>
		
	</div>
</body>
</html>