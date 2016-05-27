<?php
class previewController Extends BaseController{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		$ids 				= Input::get('ids');
		$name  				= Input::get('name');
		$address 			= Input::get('address');
		$company 			= Input::get('company');
		$region 			= (Input::get('country')!= 'other' ) ? Input::get('region'):Input::get('region-text');
		$phone_number 		= Input::get('phone_number');
		$email 				= Input::get('email');
		$kategori 			= Input::get('kategori');
		$lob 				= (Input::get('lob') != 'other')?Input::get('lob'):Input::get('lob-text');
		$country 			= (Input::get('country') != 'other') ? Input::get('country'):Input::get('country-text');
		$nb 				= (Input::get('nb') != 'other')?Input::get('nb'):Input::get('nb-text');
		$purpose 			= (Input::get('purpose') != 'other')? Input::get('purpose'): Input::get('purpose-text');
		$position 			= (Input::get('position') != 'other') ? Input::get('position'):Input::get('position-text');
		$source 			= (Input::get('source') != 'other')?Input::get('source'):Input::get('source-text');
		// Session::flash('ids',$ids);
		// Session::flash('name',$name);
		// Session::flash('address',$address);
		// Session::flash('company',$company);
		// Session::flash('region',$region);
		// Session::flash('phone_number',$phone_number);
		// Session::flash('email',$email);
		// Session::flash('kategori',$kategori);
		// Session::flash('lob',$lob);
		// Session::flash('country',$country);
		// Session::flash('nb',$nb);
		// Session::flash('purpose',$purpose);
		// Session::flash('position',$position);
		
		$view['ids'] 			= $ids;
		$view['name'] 			= $name;
		$view['address'] 		= $address;
		$view['company'] 		= $company;
		$view['region'] 		= $region;
		$view['phone_number'] 	= $phone_number;
		$view['email'] 			= $email;
		$view['kategori'] 		= $kategori;
		$view['lob'] 			= $lob;
		$view['country']		= $country;
		$view['nb']				= $nb;
		$view['purpose']		= $purpose;
		$view['source']			= $source;
		$view['position']		= $position;
		// var_dump(Session::all());
		return View::make('preview/index',$view);

	}
}