<?php
class pdfController Extends BaseController{
	function __construct(){
		$this->profile = new profileVisitor;
	}
	function index($id){
		// error_reporting(0);
		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

		$data 	= $this->profile->getid($id);
		$json 	= json_encode($data);	

		if($data->url_qr == ""){
			$qr 	= QrCode::format('png')->size(100)->generate($id,'../assets/qr/'.str_replace(" ",'',$data->nama_visitor).'.png');
			$getqr  = Config::get('app.url').'assets/qr/'.str_replace(" ",'',$data->nama_visitor).'.png';	
			$updateqr['url_qr'] = str_replace(" ",'',$data->nama_visitor).'.png';
			$this->profile->edit($data->id,$updateqr);
		}else{
			$getqr  = Config::get('app.url').'assets/qr/'.$data->url_qr;	
		}
		
		
		$view['name'] 					= $data->nama_visitor;
		$view['perusahaan'] 			= $data->perusahaan;
		$view['posisi'] 				= $data->jabatan;
		
		$viewhtml = View::make('pdf.index',$view);
		// $html ="<table>"
		PDF::SetTitle($data->nama_visitor);
		PDF::setPrintHeader(false);
		PDF::setPrintFooter(false);
		PDF::AddPage('P',"A6");
		// PDF::SetFont('times','B',20);
		// PDF::Image(Config::get("app.url").'assets/image/bagde-kosong.jpg', 0, 0, 286, 400, '', '', '', true, 300, '', false, false, 0);
		// PDF::setX(1000);
		PDF::writeHTML($viewhtml,true, false, true, false,'L');
		PDF::Output(public_path().'/pdf/'.str_replace(" ",'',$data->nama_visitor).'.pdf','FI');
		// return View::make('pdf.indexa8',$view);

	}
}