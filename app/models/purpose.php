<?php
class purpose Extends Eloquent{
	protected $table 		= "purpose";
	protected $primaryKey 	= "id_purpose";
	function get_all(){
		return purpose::orderBy('purpose_name','ASC')->get();
	}
}