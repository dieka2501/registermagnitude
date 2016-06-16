<?php
class registerController Extends BaseController{
	function __construct(){
		$this->profile 	= new profileVisitor;
		$this->user 	= new User;
		$this->kategori = new kategori;
		$this->curl 	= new curl;
		$this->region 	= new region;
		$this->position = new position;
		$this->business = new business;
		$this->purpose 	= new purpose;
		$this->info 	= new sourceInfo;
		$this->log 		= new logtime;
	}
	function index(){
		// Session::reflash();
		// var_dump(Session::all());
		$getregion 				= $this->region->get_all();
		$arr_region[] 			= '-- Select City / Region --';
		foreach ($getregion as $regions) {
			$arr_region[strtolower($regions->region_name)] = ucfirst($regions->region_name);
		}
		// $arr_region['other'] 	= 'Other';
		$view['region'] 		= Input::get('region');
		$view['arr_region'] 	= $arr_region;

		$getposition 			= $this->position->get_all();
		$arr_position[] 		= "-- Select Position --";
		foreach ($getposition as $positions) {
			$arr_position[strtolower($positions->position_name)] = ucfirst($positions->position_name);
		}
		$arr_position['other'] 	= 'Other';
		$view['position']		= Input::get('position');
		$view['arr_position']	= $arr_position;

		$getbusiness 			= $this->business->get_all();
		$arr_business[] 		= "-- Select Business --";
		foreach ($getbusiness as $bisnis) {
			$arr_business[strtolower($bisnis->business_name)] 	= ucfirst($bisnis->business_name);
		}
		$arr_business['other'] 	= "Other";
		$view['lob'] 			= Input::get('lob');
		$view['nb']				= Input::get('nb');
		$view['arr_business'] 	= $arr_business;

		$getpurpose 			= $this->purpose->get_all();
		$arr_purpose[] 			= "-- Select Purpose / Need --";
		foreach ($getpurpose as $need) {
			$arr_purpose[strtolower($need->purpose_name)] = ucfirst($need->purpose_name);
		}
		$arr_purpose['other'] 	= "Other";
		$view['purpose']		= Input::get('purpose');
		$view['arr_purpose']	= $arr_purpose;

		$getinfo 				= $this->info->get_all();
		$arr_info[]				= "-- Select Source Infomation --";
		foreach ($getinfo as $info) {
			$arr_info[strtolower($info->info_name)] = ucfirst($info->info_name);
		}
		$arr_info['other']		= "-- Other --";
		$view['source']			= Input::get('source');
		$view['arr_source']		= $arr_info;
		$view['ids'] 			= Input::get('ids');
		$view['name'] 			= Input::get('name');
		$view['address'] 		= Input::get('address');
		$view['company'] 		= Input::get('company');
		$view['phone_number'] 	= Input::get('phone_number');
		$view['email'] 			= Input::get('email');
		$view['category']		= Input::get('kategori');
		$view['country']		= Input::get('country');	
		$view['kategori'] 		= $this->kategori->get_all();
		return View::make('register/index',$view);
	}
	function add(){
		if(Input::has('name') && Input::has('email')){
			if(Input::has('ids')){
				$ids 			= Input::get('ids');
				$name  			= Input::get('name');
				$address 		= Input::get('address');
				$company 		= Input::get('company');
				$region 		= Input::get('region');
				$phone_number 	= Input::get('phone_number');
				$email 			= Input::get('email');
				$kategori 		= Input::get('kategori');
				$lob 			= Input::get('lob');
				$country 		= Input::get('country');
				$nb 			= Input::get('nb');
				$purpose 		= Input::get('purpose');
				$position 		= Input::get('position');
				$source 		= Input::get('source');
				$date_start 	= Input::get('date_start');
				$date_end 		= Input::get('date_end');
				$keyactive 		= md5($email.date('Ymdhis'));

				$profile['interest_product']	= implode(',', $kategori);
				$profile['bidang'] 				= $lob;
				$profile['username'] 			= $email;
				$profile['nama_visitor']		= $name;
				$profile['perusahaan'] 			= $company;
				$profile['region'] 				= $region;
				$profile['email']	 			= $email;
				$profile['alamat']	 			= $address;
				$profile['phone']	 			= $phone_number;
				$profile['country']	 			= $country;
				$profile['nature_business']		= $nb;
				$profile['purpose']				= $purpose;
				$profile['jabatan']				= $position;
				$profile['source_information']	= $source;
				$profile['key'] 		 		= $keyactive;
				$profile['date_modified']		= date('Y-m-d H:i:s');
				$profile['updated_at']			= date('Y-m-d H:i:s');
				$idsprofile = $this->profile->edit($ids,$profile);
				$getdata 	= $this->profile->getid($ids);
				// $json = array('status'=>true,
				// 			'alert'=>'Proses Registasi Berhasil.',
				// 			'data'=>$getdata);
				//Generate QRCODE
				QrCode::format('png')->size(100)->generate($ids,'../assets/qr/'.str_replace(" ",'',$getdata->nama_visitor).'.png');
				//END Generare QRCODE
				//Generate PDF
				$view['name'] 					= $getdata->nama_visitor;
				$view['perusahaan'] 			= $getdata->perusahaan;
				$view['posisi'] 				= $getdata->jabatan;
				
				$viewhtml = View::make('pdf.indexa8',$view);
				// $html ="<table>"
				PDF::SetTitle($getdata->nama_visitor);
				PDF::AddPage('P');
				PDF::SetFont('times','B',20);
				PDF::Image(Config::get("app.url").'assets/image/bagde-kosong.jpg', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
				// // PDF::setX(50);
				PDF::writeHTML($viewhtml,true, false, true, false,'');
				PDF::Output(public_path().'/pdf/'.str_replace(" ",'',$getdata->nama_visitor).'.pdf','F');
				//END Generate PDF
				$data 	= ['nama'=>$getdata->nama_visitor,'link'=>Config::get('app.url').'public/registration/confirm?key='.$keyactive];
				$detail = ['email'=>$getdata->email,'subject'=>'REGISTRATION CONFIRM '.$getdata->nama_visitor,'nama'=>$getdata->nama_visitor];

				Mail::send('mail.linkverify',$data,function($message) use ($detail){
					$message->from('no-reply@data-driven.asia','Admin');
					// $message->getSwiftMessage()->getHeaders()->addTextHeader('MIME-version: 1.0\n', 'Content-type: text/html; charset= iso-8859-1\n');

					$message->to($detail['email'])->subject($detail['subject']);
					// ->attach(public_path().'/pdf/'.str_replace(" ",'',$detail['nama']).'.pdf');
				});

				//Log
				$logtime['user_id'] 		= $ids;
				$logtime['logtime_start'] 	= $date_start;
				$logtime['logtime_end'] 	= $date_end;
				$logtime['created_at'] 		= date('Y-m-d H:i:s');
				$this->log->add($logtime);
				//End log
				//Generate undian
				// $last = 1 ;
				// if($getdata->undian == ""){
				// 	$getlast = $this->profile->get_one();
				// 	if(count($getlast) > 0){
				// 		if($getlast->undian == ""){
				// 			$last += 0;
				// 		}else{
				// 			$last = $getlast->undian + 1;
				// 		}	
				// 	}
					
				// }
				// $viewundian 		= "";
				// if($last <= 10){
				// 	$undian['undian'] 		= $last;
				// 	$undian['updated_at'] 	= date('Y-m-d H:i:s');
				// 	$this->profile->edit($getdata->id,$undian);
				// 	$viewundian 			= $last;
				// }

				$json = array('status'=>true,
								'alert'=>'Proses Registrasi Berhasil.',
								'data'=>$getdata);
			}else{
				$name  			= Input::get('name');
				$address 		= Input::get('address');
				$company 		= Input::get('company');
				$region 		= Input::get('region');
				$phone_number 	= Input::get('phone_number');
				$email 			= Input::get('email');
				$kategori 		= Input::get('kategori');
				$lob 			= Input::get('lob');
				$country 		= Input::get('country');
				$nb 			= Input::get('nb');
				$purpose 		= Input::get('purpose');
				$position 		= Input::get('position');
				$source 		= Input::get('source');
				$date_start 	= Input::get('date_start');
				$date_end 		= Input::get('date_end');
				$keyactive 		= md5($email.date('Ymdhis'));
				$pass 			= substr(md5($email.date('Ymdhis')), 0,5);
				// $cekemail 		= $this->profile->get_email($email);
				if(true){
					$this->profile->delete_email($email);
					//Generate undian
					$last = 1 ;
					if(true){
						$getlast = $this->profile->get_one();
						if(count($getlast) > 0){
							if($getlast->undian == ""){
								$last += 0;
							}else{
								$last = $getlast->undian + 1;
							}	
						}
						
					}
					$viewundian 		= "";
					if($last <= 10){
						$profile['undian'] 		= $last;
						$viewundian 			= $last;
					}else{
						$profile['undian'] 		= "";
					}
					$profile['interest_product']    = implode(',', $kategori);
					$profile['bidang'] 				= $lob;
					$profile['username'] 			= $email;
					$profile['nama_visitor']		= $name;
					$profile['perusahaan'] 			= $company;
					$profile['region'] 				= $region;
					$profile['email']	 			= $email;
					$profile['alamat']	 			= $address;
					$profile['phone']	 			= $phone_number;
					$profile['country']	 			= $country;
					$profile['nature_business']		= $nb;
					$profile['purpose']				= $purpose;
					$profile['jabatan']				= $position;
					$profile['verify']	 			= $pass;
					$profile['key']		 			= md5($email.date('Ymdhis'));;
					$profile['source_information']	= $source;
					$profile['date_created']	= date('Y-m-d H:i:s');
					$profile['created_at']		= date('Y-m-d H:i:s');
					$idsprofile = $this->profile->add($profile);
					//Generate QRCODE
					QrCode::format('png')->size(100)->generate($idsprofile,'../assets/qr/'.str_replace(" ",'',$name).'.png');
					//END Generare QRCODE
					//Generate PDF
					$view['name'] 					= $name;
					$view['perusahaan'] 			= $company;
					$view['posisi'] 				= $position;
					$view['undian'] 				= 000000;
					
					$viewhtml = View::make('pdf.indexa8',$view);
					// $html ="<table>"
					PDF::SetTitle($name);
					PDF::AddPage('P');
					PDF::SetFont('times','B',20);
					PDF::Image(Config::get("app.url").'assets/image/bagde-kosong.jpg', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
					// // PDF::setX(50);
					PDF::writeHTML($viewhtml,true, false, true, false,'');
					PDF::Output(public_path().'/pdf/'.str_replace(" ",'',$name).'.pdf','F');
					//END Generate PDF
					if($idsprofile > 0){
						$user['username'] 		= $email;
						$user['password'] 		= md5($pass);
						$user['email'] 			= $email;
						$user['group'] 			= 3;
						$user['date_created']	= $profile['date_created'];
						// $this->user->add($user);
						$data 	= ['nama'=>$name,'link'=>Config::get('app.url').'public/registration/confirm?key='.$keyactive];
						$detail = ['email'=>$email,'subject'=>'REGISTRATION CONFIRM '.$name,'nama'=>$name];
						Mail::send('mail.linkverify',$data,function($message) use ($detail){
							$message->from('no-reply@data-driven.asia','Admin');
							// $message->getSwiftMessage()->getHeaders()->addTextHeader('MIME-version: 1.0\n', 'Content-type: text/html; charset= iso-8859-1\n');
							$message->to($detail['email'])->subject($detail['subject']);
							// ->attach(public_path().'/pdf/'.str_replace(" ",'',$detail['nama']).'.pdf');
						});
						$getprofile = $this->profile->getid($idsprofile);
						$curl['name'] 					= $getprofile->nama_visitor;
						$curl['email'] 					= $getprofile->email;
						$curl['region'] 				= $getprofile->region;
						$curl['position'] 				= $getprofile->jabatan;
						$curl['country'] 				= $getprofile->country;
						$curl['lob'] 					= $getprofile->bidang;
						$curl['interest_product'] 		= $getprofile->interest_product;
						$curl['purpose'] 				= $getprofile->purpose;
						$curl['phone'] 					= $getprofile->phone;
						$curl['source']					= $getprofile->source_information;
						$curl['address']				= $getprofile->alamat;
						$curl['company']				= $getprofile->perusahaan;
						$jsoncurl 						= json_encode($curl);
						$this->curl->post(Config::get('app.url_mailblast').'public/api/receiver/create',$jsoncurl);
						//Log
						$logtime['user_id'] 		= $idsprofile;
						$logtime['logtime_start'] 	= $date_start;
						$logtime['logtime_end'] 	= $date_end;
						$logtime['created_at'] 		= date('Y-m-d H:i:s');
						$this->log->add($logtime);
						//End log
						
						$json = array('status'=>true,
								'alert'=>'Proses Registrasi Berhasil.',
								'data'=>$getprofile);	
					}else{
						$json = array('status'=>false,
								'alert'=>'Profile visitor tidak masuk, ulangi.',
								'data'=>null);	
					}	
				}else{
					$json = array('status'=>false,
								'alert'=>'Duplikat.',
								'data'=>null);	
				}
				
			}
		}else{
			$json = array('status'=>false,
							'alert'=>'Nama dan Email Visitor Harus Diisi.',
							'data'=>null);
		}
		return Response::json($json);
	}

	function valid_email(){
		$email 		= Input::get('email');
		$getemail 	= $this->profile->get_email($email);
		$count 		= count($getemail);
		if($count > 0 ){
			$json = array('status'=>true,
							'alert'=>'Email sudah terdaftar!',
							'data'=>$getemail);
		}else{
			$json = array('status'=>false,
							'alert'=>'Email belum terdaftar!',
							'data'=>"");
		}
		return Response::json($json);	
	}
}