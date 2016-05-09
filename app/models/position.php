<?php
class position extends Eloquent{
	protected $table 		= 'position';
	protected $primaryKey 	= "id_position";
	function add ($data){
		return position::insertGetId($data);
	}
	function get_all(){
		return position::orderBy('position_name','ASC')->get();
	}
}