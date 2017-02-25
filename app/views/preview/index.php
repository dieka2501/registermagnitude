<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Magnitude Visitor's Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
/* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-right: 15px;
  padding-left: 15px;
}

/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  padding-bottom: 19px;
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}

/* Custom page footer */
.footer {
  padding-top: 19px;
  color: #777;
  border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-right: 0;
    padding-left: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 30px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}
    </style>
    
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-left ">
			<img src="<?php echo Config::get('app.url')?>assets/image/ctc.jpg" width="800" class='img-responsive'>
		</div>
 		
	</div>
</div>
<div class="container">
    <h1 class="well">Preview Visitor's Identity</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form id='frm-preview'>
					<div id='notip'></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" placeholder="Enter Email Address Here.." class="form-control" name='email' id='email' value="<?php echo $email ?>" readonly="readonly">
							<input type="hidden" placeholder="" class="form-control" name='ids' id='ids' readonly="readonly" value="<?php echo $ids ?>">
						</div>	
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Name Visitor</label>
								<input type="text" placeholder="Enter Visitor Name Here.." class="form-control" name='name' id='name' readonly="readonly" value="<?php echo $name ?>">
							</div>
						</div>					
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Company</label>
								<input type="text" placeholder="Enter Company Name Here.." class="form-control" name='company' id='company' readonly="readonly" value="<?php echo $company ?>">
							</div>
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input type="text" placeholder="Enter Phone Number Here.." class="form-control" name='phone_number' id="phone_number" readonly="readonly" value="<?php echo $phone_number ?>">
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address Here.." rows="3" class="form-control" name='address' id='address' readonly="readonly"><?php echo $address ?></textarea>
						</div>
						<div class="row">		
							<div class="col-sm-12 form-group">
								<label>Country</label>
								<input type="text" placeholder="Enter Country Here.." class="form-control" name="country" id='country' readonly="readonly" value="<?php echo $country ?>">
							</div>	
						</div>
						<div class="form-group">
							<label>City / Region</label>
							<!-- <textarea placeholder="Enter city / region Here.." rows="3" class="form-control" name='region' id='region'></textarea> -->
							<input type="text" placeholder="Enter city / region Here.." class="form-control" name="region" id='region' readonly="readonly" value="<?php echo $region ?>">
						</div>		
						
						<div class="row">		
							<div class="col-sm-12 form-group">
								<label>Position</label>
								<input type="text" placeholder="Enter Your Position Here.." class="form-control" name="position" id='position' readonly="readonly" value="<?php echo $position ?>">
							</div>	
						</div>						
						
						<div class="form-group">
							<label>Line Of Bussiness</label>
							<input type="text" placeholder="Enter Line Of Bussiness Here.." class="form-control" name='lob' id="lob" readonly="readonly" value="<?php echo $lob ?>">
						</div>
						<!-- <div class="form-group">
							<label>Nature Bussiness</label>
							<input type="text" placeholder="Enter Nature Bussiness Here.." class="form-control" name='nb' id="nb" readonly="readonly" value="<?php //echo $nb ?>">
						</div> -->
						<div class="form-group">
							<label>Purpose / Need</label>
							<input type="text" placeholder="Enter Your Purpose / Need Here.." class="form-control" name='purpose' id="purpose" readonly="readonly" value="<?php echo $purpose ?>">
						</div>
						<div class="form-group">
							<label>Source Information</label>
							<input type="text" placeholder="Enter Your Source Information" class="form-control" name='source' id="source" readonly="readonly" value="<?php echo $source?>">
						</div>
						
							<input type="hidden" placeholder="Enter Your Source Information" class="form-control" name='date_start' id="date_start" readonly="readonly" value="<?php echo $date_start?>">
						
						
							<input type="hidden" placeholder="Enter Your Source Information" class="form-control" name='date_end' id="date_end" readonly="readonly" value="<?php echo $date_end?>">
						
							<label>Interest Product</label>
							<?php if(count($kategori) > 0):?>
								<?php foreach($kategori as $kat): ?>
									<div class="form-group">
										<input type='text' class='form-control kategori'  name='kategori[]' value='<?php echo $kat?>' readonly="readonly">
									</div>
								<?php endforeach; ?>		
							<?php endif;?>	
						
						<div class='row'>
							<div class='col-sm-6'>
								
								<button type="button" class="btn btn-lg btn-danger" id='btn-back'>Back</button>
							</div>
							<div class='col-sm-6 text-right'>
								<!-- <a href="<?php echo Config::get('app.url')?>public/" class="btn btn-lg btn-danger" >Back</a>							 -->
								<button type="button" class="btn btn-lg btn-info" id='btn-submit'>Confirm</button>							
							</div>
						</div>
					
					</div>
				</form> 
				</div>
	</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#email').change(function(){
			var email = $(this).val();
			$.post('<?php echo Config::get("app.url")?>public/validemail',{
				'email':email
			},function(data){
				// console.log(data);
				if(data.status){

					$('#name').val(data.data.nama_visitor);
					$('#address').val(data.data.alamat);
					$('#company').val(data.data.perusahaan);
					$('#phone_number').val(data.data.phone);
					$('#region').val(data.data.region);
					// $('#country').val(data.data.country);	
					$('#position').val(data.data.jabatan);	
					$('#lob').val(data.data.bidang);
					$('#nb').val(data.data.nature_business);
					$('#purpose').val(data.data.purpose);
					$('#ids').val(data.data.id);

				}
			});
		});

		$('#btn-submit').click(function(){
			var name 		= $('#name').val();
			var email 		= $('#email').val();
			var address 	= $('#address').val();
			var company 	= $('#company').val();
			var phone 		= $('#phone_number').val();
			var region 		= $('#region').val();
			var ids 		= $('#ids').val();
			var lob 		= $('#lob').val();
			var country 	= $('#country').val();
			var company 	= $('#company').val();
			var nb 			= $('#nb').val();
			var purpose 	= $('#purpose').val();
			var position 	= $('#position').val();
			var source  	= $('#source').val();
			var date_start 	= $('#date_start').val();
			var date_end 	= $('#date_end').val();
			var kat 		= [];
			$('.kategori').each(function(){
				if($(this).val() != 'undefined'){
					kat.push($(this).val()); 	
				}
			});
			$.post('<?php echo Config::get("app.url")?>public/register',{
				'name' : name,
				'address' : address,
				'company' : company,
				'email' : email,
				'phone_number':phone,
				'region':region,
				'ids':ids,
				'kategori':kat,
				'lob':lob,
				'country':country,
				'nb':nb,
				'purpose':purpose,
				'position':position,
				'company':company,
				'source':source,
				'date_start':date_start,
				'date_end':date_end

			},function(data){
				// console.log(data);
				if(data.status){
					var htmlalert = "<div class='alert alert-success' role='alert'>"+data.alert+"</div>";
					$('.kategori').prop('checked',false);
					$('#notip').html(htmlalert).show().fadeOut(10000);
					// $('#name').val('');
					// $('#email').val('');
					// $('#address').val('');
					// $('#company').val('');
					// $('#region').val('');
					// $('#phone_number').val('');
					// $('#country').val('');
					// $('#nb').val('');
					// $('#purpose').val('');
					// $('#position').val('');
					// $('#company').val('');
					// $('#source').val('');
					// $('#ids').val('');
					var win = window.open('<?php Config::get("app.url")?>print/'+data.data.id,'__blank');

					if(win){
						win.focus();	
						window.open('<?php Config::get("app.url")?>print/'+data.data.id,'__blank');
						window.location.href= "<?php echo Config::get("app.url")?>public/";

					}else{
						alert('Please Allow Popups For This Site');
						// window.location.href= "<?php echo Config::get("app.url")?>public/print/"+data.data.id;
					}
					
				}else{
					var htmlalert = "<div class='alert alert-danger' role='alert'>"+data.alert+"</div>";
					// $('#notip').html(htmlalert);
					alert(data.alert);

				}	
			});
		});

		$(this).ajaxStart(function(data){
			$('#btn-submit').html('Loading....');
		}).ajaxStop(function(data){
			$('#btn-submit').html('Confirm');
		});

	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn-back').click(function(){
			$('#frm-preview').attr('method','POST');
			$('#frm-preview').attr('action','<?php echo Config::get("app.url")?>public/');
			$('#frm-preview').submit();
		})
	});
</script>
</body>
</html>
