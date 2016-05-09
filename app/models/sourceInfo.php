<?php
class sourceInfo Extends Eloquent{
	protected $table 		= "source_info";
	protected $primaryKey 	= "id_info";
	function get_all(){
		return sourceInfo::orderBy('info_name','ASC')->get();
	}
}