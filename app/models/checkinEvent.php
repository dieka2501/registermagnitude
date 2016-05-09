<?php
class checkinEvent Extends Eloquent{
	protected $table 		= "checkin_event";
	protected $primaryKey 	= "id";
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
	}
	function get_checkin_today(){
		return checkinEvent::where('date_checkin','like','%'.date('Y-m-d').'%')->get();
	}
	function get_not_checkin(){
		return checkinEvent::select(DB::raw('*,profile_visitor.id as id_pengunjung'))->join('profile_visitor','checkin_event.id_visitor','=','profile_visitor.id','right')->where('checkin_event.id_visitor',NULL)->get();
	}
}