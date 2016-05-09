<?php
class business Extends Eloquent{
	protected $table 		= "business";
	protected $primaryKey 	=  "id_business";
	function get_all(){
		return business::orderBy('business_name','ASC')->get();
	}
}