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
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="well">Visitor Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form method="POST" action='<?php echo Config::get("app.url") ?>public/preview'>
					<div id='notip'></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label>Email Address</label>
							<input type="email" placeholder="Enter Email Address Here.." class="form-control" name='email' id='email' value="<?php echo $email?>" required> 
							<input type="hidden" placeholder="" class="form-control" name='ids' id='ids' value="<?php echo $ids?>">
						</div>	
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Name Visitor</label>
								<input type="text" placeholder="Enter Visitor Name Here.." class="form-control" name='name' id='name' value="<?php echo $name?>"  required>
							</div>
						</div>					
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Company</label>
								<input type="text" placeholder="Enter Company Name Here.." class="form-control" name='company' id='company' value="<?php echo $company?>">
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address Here.." rows="3" class="form-control" name='address' id='address'><?php echo $address?></textarea>
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input type="text" placeholder="Enter Phone Number Here.." class="form-control" name='phone_number' id="phone_number" value="<?php echo $phone_number?>" required>
						</div>
						<div class="row">		
							<div class="col-sm-12 form-group">
								<label>Country</label>
								<div class="form-group">
								<?php echo Form::select('country',['indonesia'=>'Indonesia','other'=>'Other'],$country,['class'=>'form-control','id'=>'country'])?>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Enter Country Here.." class="form-control" name="country-text" id='country-text' value="<?php echo $country?>">	
								</div>
								
							</div>	
						</div>
						<div class="form-group">
							<label>City / Region</label>
							<!-- <textarea placeholder="Enter city / region Here.." rows="3" class="form-control" name='region' id='region'></textarea> -->
							<div class="form-group">
								<?php echo Form::select('region',$arr_region,$region,['class'=>'form-control','id'=>'region'])?>
							</div>
							<div class="form-group">
								<input type="text" placeholder="Enter city / region Here.." class="form-control" name="region-text" id='region-text' value="<?php echo $region?>">	
							</div>
							
						</div>		
						
						<div class="row">		
							<div class="col-sm-12 form-group">
								<label>Position</label>
								<div class="form-group">
									<?php echo Form::select('position',$arr_position,$position,['class'=>'form-control','id'=>'position'])?>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Enter Your Position Here.." class="form-control" name="position-text" id='position-text' value="<?php echo $position?>">
								</div>
							</div>	
						</div>						
						
						<div class="form-group">
							<label>Line Of Bussiness</label>
							<div class="form-group">
								<?php echo Form::select('lob',$arr_business,$lob,['class'=>'form-control','id'=>'lob'])?>
							</div>
							<div class="form-group">
								<input type="text" placeholder="Enter Line Of Bussiness Here.." class="form-control" name='lob-text' id="lob-text" value="<?php echo $lob?>">
							</div>
						</div>
						<div class="form-group">
							<label>Nature Bussiness</label>
							<div class="form-group">
								<?php echo Form::select('nb',$arr_business,$nb,['class'=>'form-control','id'=>'nb'])?>
							</div>
							<div class="form-group">
								<input type="text" placeholder="Enter Nature Bussiness Here.." class="form-control" name='nb-text' id="nb-text" value="<?php echo $nb?>">
							</div>
						</div>
						<div class="form-group">
							<label>Purpose / Need</label>
							<div class="form-group">
								<?php echo Form::select('purpose',$arr_purpose,$purpose,['class'=>'form-control','id'=>'purpose'])?>
							</div>
							<div class="form-group">
								<input type="text" placeholder="Enter Your Purpose / Need Here.." class="form-control" name='purpose-text' id="purpose-text" value="<?php echo $purpose?>">	
							</div>
							
						</div>
						<div class="form-group">
							<label>Source Information</label>
							<div class="form-group">
								<?php echo Form::select('source',$arr_source,$source,['class'=>'form-control','id'=>'source'])?>
							</div>
							<div class="form-group">
								<input type="text" placeholder="Enter Your Source Information" class="form-control" name='source-text' id="source-text" value="<?php echo $source?>">	
							</div>
							
						</div>
							<label>Interest Product</label>
							<?php foreach($kategori as $kat): ?>
								<div class="form-group">
									<div class='input-group text-left'>	
									<?php if($category != NULL):?>
										<?php if(in_array($kat->nama_kategori, $category)):?>
										<span class="">
											<input type='checkbox' class='form-contro kategori' id="<?php echo str_replace([' ','&',','],'', $kat->nama_kategori)?>" name='kategori[]' value='<?php echo $kat->nama_kategori?>' checked>
										</span>
										<?php echo $kat->nama_kategori ?>
										<?php else:?>
											<span class="">
												<input type='checkbox' class='form-contro kategori' id="<?php echo str_replace([' ','&',','],'', $kat->nama_kategori)?>" name='kategori[]' value='<?php echo $kat->nama_kategori?>' >
											</span>
										
										<?php echo $kat->nama_kategori ?>
										<?php endif?>
									<?php else:?>
										 <span class="">
											<input type='checkbox' class='form-contro kategori' name='kategori[]' id="<?php echo str_replace([' ','&',','],'', $kat->nama_kategori)?>" value='<?php echo $kat->nama_kategori?>' >
										</span>
										<?php echo $kat->nama_kategori ?>
									<?php endif;?>
									</div>	
								</div>
							<?php endforeach; ?>		
								
						
						<div class='row'>
							<div class='col-sm-6'>
								<button type="submit" class="btn btn-lg btn-info">Preview</button>							
							</div>
							<div class='col-sm-6 text-right'>
								<button type="button" class="btn btn-lg btn-danger" id='btn-reset'>Reset</button>							
							</div>
						</div>
					
					</div>
				</form> 
				</div>
	</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#country-text').hide();
		$('#region-text').hide();

		$('#country').change(function(){
			var country = $(this).val();
			if(country == 'other'){
				$('#region').hide();
				$('#country-text').show();				
				$('#region-text').show();
				$('#region').val('other');
			}else{
				$('#region').show();
				$('#country-text').hide();				
				$('#region-text').hide();
			}
		});

		$('#region').change(function(){
			var region = $(this).val();
			if(region == 'other'){
				$('#region-text').show();				
			}else{
				$('#region-text').hide();				
			}
		});

		$('#position-text').hide();
		$('#position').change(function(){
			var position = $(this).val();
			if(position == 'other'){
				$('#position-text').show();				
			}else{
				$('#position-text').hide();				
			}
		});

		$('#position-text').hide();
		$('#position').change(function(){
			var position = $(this).val();
			if(position == 'other'){
				$('#position-text').show();				
			}else{
				$('#position-text').hide();				
			}
		});

		$('#lob-text').hide();
		$('#lob').change(function(){
			var lob = $(this).val();
			if(lob == 'other'){
				$('#lob-text').show();				
			}else{
				$('#lob-text').hide();				
			}
		});						

		$('#nb-text').hide();
		$('#nb').change(function(){
			var nb = $(this).val();
			if(nb == 'other'){
				$('#nb-text').show();				
			}else{
				$('#nb-text').hide();				
			}
		});

		$('#purpose-text').hide();
		$('#purpose').change(function(){
			var purpose = $(this).val();
			if(purpose == 'other'){
				$('#purpose-text').show();				
			}else{
				$('#purpose-text').hide();				
			}
		});						

		$('#source-text').hide();
		$('#source').change(function(){
			var source = $(this).val();
			if(source == 'other'){
				$('#source-text').show();				
			}else{
				$('#source-text').hide();				
			}
		});						

		$('#email').change(function(){
			var email = $(this).val();
			$.post('<?php echo Config::get("app.url")?>public/validemail',{
				'email':email
			},function(data){
				
				if(data.status){
					$('#name').val(data.data.nama_visitor);
					$('#address').val(data.data.alamat);
					$('#company').val(data.data.perusahaan);
					$('#phone_number').val(data.data.phone);

					if($('#country option[value="'+data.data.country+'"]').length != 0 ){
						$('#country').val(data.data.country);	
						$('#region').val(data.data.region);
					}else{
						$('#country').val('other');
						$('#region').val(0);
						$('#region-text').val(data.data.region);
						$('#country-text').val(data.data.country);	
						$('#region-text').show();
						$('#country-text').show();
						$('#region').hide();
					}

					
					
					
					if($('#position option[value="'+data.data.jabatan+'"]').length != 0 ){
							$('#position').val(data.data.jabatan);		
					}else{
						$('#position').val('other');
						$('#position-text').val(data.data.jabatan);	
						$('#position-text').show();
					}

					if($('#lob option[value="'+data.data.bidang+'"]').length != 0 ){
						$('#lob').val(data.data.bidang);
					}else{
						$('#lob').val('other');
						$('#lob-text').val(data.data.bidang);
						$('#lob-text').show();
					}
					
					if($('#nb option[value="'+data.data.nature_business+'"]').length != 0 ){
							$('#nb').val(data.data.nature_business);
					}else{
						$('#nb').val('other');
						$('#nb-text').val(data.data.nature_business);
						$('#nb-text').show();
					}

					if($('#purpose option[value="'+data.data.purpose+'"]').length != 0 ){
						$('#purpose').val(data.data.purpose);
					}else{
						$('#purpose').val('other');
						$('#purpose-text').val(data.data.purpose);
						$('#purpose-text').show();
					}
				
					if($('#source option[value="'+data.data.source_information+'"]').length != 0 ){
						$('#source').val(data.data.source_information);
					}else{
						$('#source').val('other');
						$('#source-text').val(data.data.source_information);
						$('#source-text').show();
					}
					
					
					$('#ids').val(data.data.id);
					var interest 		= data.data.interest_product;
					var expint 	 		= interest.split(',');
					var countinterest   = expint.length;
					// console.log(interest);
					// console.log(expint[0]);
					// console.log(countinterest);
					for (var i = 0; i < countinterest; i++) {
						var idinterest = expint[i].replace(/ |&|,/gi, "");
						// console.log(idinterest);
						$("#"+idinterest).prop( "checked", true );
					}



				}
			});
		});

		// $('#btn-submit').click(function(){
		// 	var name 		= $('#name').val();
		// 	var email 		= $('#email').val();
		// 	var address 	= $('#address').val();
		// 	var company 	= $('#company').val();
		// 	var phone 		= $('#phone_number').val();
		// 	var region 		= $('#region').val();
		// 	var ids 		= $('#ids').val();
		// 	var lob 		= $('#lob').val();
		// 	var country 	= $('#country').val();
		// 	var company 	= $('#company').val();
		// 	var nb 			= $('#nb').val();
		// 	var purpose 	= $('#purpose').val();
		// 	var position 	= $('#position').val();
		// 	var source  	= $('#source').val();
		// 	var kat 		= [];
		// 	$('.kategori:checked').each(function(){
		// 		if($(this).val() != 'undefined'){
		// 			kat.push($(this).val()); 	
		// 		}
		// 	});
		// 	$.post('<?php echo Config::get("app.url")?>public/register',{
		// 		'name' : name,
		// 		'address' : address,
		// 		'company' : company,
		// 		'email' : email,
		// 		'phone_number':phone,
		// 		'region':region,
		// 		'ids':ids,
		// 		'kategori':kat,
		// 		'lob':lob,
		// 		'country':country,
		// 		'nb':nb,
		// 		'purpose':purpose,
		// 		'position':position,
		// 		'company':company,
		// 		'source':source

		// 	},function(data){
		// 		console.log(data);
		// 		if(data.status){
		// 			var htmlalert = "<div class='alert alert-success' role='alert'>"+data.alert+"</div>";
		// 			$('.kategori').prop('checked',false);
		// 			$('#notip').html(htmlalert).show().fadeOut(10000);
		// 			$('#name').val('');
		// 			$('#email').val('');
		// 			$('#address').val('');
		// 			$('#company').val('');
		// 			$('#region').val('');
		// 			$('#phone_number').val('');
		// 			$('#country').val('');
		// 			$('#nb').val('');
		// 			$('#lob').val('');
		// 			$('#purpose').val('');
		// 			$('#position').val('');
		// 			$('#company').val('');
		// 			$('#ids').val('');
		// 			var win = window.open('<?php Config::get("app.url")?>print/'+data.data.id,'__blank');
		// 			if(win){
		// 				win.focus();
		// 			}else{
		// 				alert('Please Allow Popups For This Site');
		// 			}
		// 		}else{
		// 			var htmlalert = "<div class='alert alert-danger' role='alert'>"+data.alert+"</div>";
		// 			$('#notip').html(htmlalert);
		// 		}	
		// 	});
		// });

		$(this).ajaxStart(function(data){
			$('#btn-submit').html('Loading....');
		}).ajaxStop(function(data){
			$('#btn-submit').html('Submit');
		});
	});
	$(document).ready(function(){
		$('#btn-reset').click(function(){
			$('.kategori').prop('checked',false);
			$('#name').val('');
			$('#email').val('');
			$('#address').val('');
			$('#company').val('');
			$('#region').val('');
			$('#phone_number').val('');
			$('#country').val('');
			$('#nb').val('');
			$('#lob').val('');
			$('#purpose').val('');
			$('#position').val('');
			$('#company').val('');
			$('#ids').val('');
		});
	});
</script>
</body>
</html>