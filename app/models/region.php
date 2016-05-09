<?php
class region Extends Eloquent{
	protected $table 			= 'region';
	protected $primaryKey 		= "id_region";
	function __construct(){

	}
	function get_all(){
		return region::orderBy('region_name','ASC')->get();
	}

}