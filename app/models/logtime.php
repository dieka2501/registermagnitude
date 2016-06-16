<?php
class logtime Extends Eloquent{
	protected $table 		= "logtime";
	protected $primaryKey 	= "id_logtime";
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
	}
	function add($data){
		return logtime::insertGetId($data);
	}
}