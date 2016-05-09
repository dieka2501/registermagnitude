<?php
class tesController extends BaseController{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		$view['name'] 		= "Dikdik Kusdinar";
		$view['perusahaan'] = "Data Driven Asia";
		$view['posisi'] 	= "Product Manager";
		
		return View::make('pdf.index'$view);

	}
}