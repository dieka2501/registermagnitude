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
	function get_one(){
		return profileVisitor::orderBy('id','DESC')->where('undian','!=','')->first();
	}
	function get_today(){
		return profileVisitor::orderBy('id','DESC')->where('created_at','like','%'.date('Y-m-d').'%')->get();
	}
	function get_all(){
		return profileVisitor::all();
	}

	function status_verify(){
		return profileVisitor::orderBy('id','DESC')->where('status',1)->get();
	}

	function delete_email_name_phone($email,$name,$phone){
		return profileVisitor::where('email',$email)->where('nama_visitor',$name)->where('phone',$phone)->delete();
	}
}