<?php
class profileVisitor Extends Eloquent{
	protected $table = "profile_visitor";
	function add($data){
		return DB::table($this->table)->insertGetId($data);
	}
	function get_email($email){
		return DB::table($this->table)->where('email',$email)->first();
	}
	function getid($id){
		return profileVisitor::find($id);
	}
	
	function get_verify($code){
		return DB::table($this->table)->where('verify',$code)->first();
	}
	function edit($id,$data){
		return DB::table($this->table)->where('id',$id)->update($data);
	}
	function delete_email($email){
		return profileVisitor::where('email',$email)->delete();
	}
	function get_key($key){
		return profileVisitor::where('key',$key)->first();
	}
}