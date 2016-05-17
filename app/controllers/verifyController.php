<?php
class verifyController Extends BaseController{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->profile 		= new profileVisitor;
	}

	function confirm(){
		if(Input::has('key')){
			$key 				= Input::get('key');
			$get_profile 		= $this->profile->get_key($key);
			if(count($get_profile) >0){
				//Generate QRCODE
				QrCode::format('png')->size(100)->generate($ids,'../assets/qr/'.str_replace(" ",'',$get_profile->nama_visitor).'.png');
				//END Generare QRCODE
				//Generate PDF
				$view['name'] 					= $get_profile->nama_visitor;
				$view['perusahaan'] 			= $get_profile->perusahaan;
				$view['posisi'] 				= $get_profile->jabatan;
				
				$viewhtml = View::make('pdf.indexa8',$view);
				// $html ="<table>"
				PDF::SetTitle($get_profile->nama_visitor);
				PDF::AddPage('P');
				PDF::SetFont('times','B',20);
				PDF::Image(Config::get("app.url").'assets/image/bagde-kosong.jpg', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
				// // PDF::setX(50);
				PDF::writeHTML($viewhtml,true, false, true, false,'');
				PDF::Output(public_path().'/pdf/'.str_replace(" ",'',$get_profile->nama_visitor).'.pdf','F');
				//END Generate PDF
				$data 	= ['nama'=>$get_profile->nama_visitor,'link'=>'#'];
				$detail = ['email'=>$get_profile->email,'subject'=>'PROSES REGISTRASI BERHASIL ','nama'=>$get_profile->nama_visitor];

				Mail::send('mail.confirm',$data,function($message) use ($detail){
					$message->from('no-reply@data-driven.asia','Admin');
					// $message->getSwiftMessage()->getHeaders()->addTextHeader('MIME-version: 1.0\n', 'Content-type: text/html; charset= iso-8859-1\n');

					$message->to($detail['email'])->subject($detail['subject']);
					// ->attach(public_path().'/pdf/'.str_replace(" ",'',$detail['nama']).'.pdf');
				});
				echo "<h1>Verifikasi data anda berhasil, silakan tutup jendela web ini, terima kasih.</h1>";	
			}else{
				echo "<h1>Ada kesalahan proses, <i>key</i> tidak diketemukan.</h1>";	
			}
		}else{
			echo "<h1>Ada kesalahan proses, akun anda tidak dapat diverifikasi.</h1>";
		}
	}
}