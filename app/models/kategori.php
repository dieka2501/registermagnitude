<?php
class kategori Extends Eloquent{
	protected $table = "kategori";
	function __construct(){

	}
	function get_all(){
		return DB::table($this->table)->orderBy('nama_kategori','ASC')->get();
	}
}