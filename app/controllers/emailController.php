<?php
class emailController Extends BaseController{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
        $this->ce       = new checkinEvent;
        $this->visitor  = new profileVisitor;
	}

	function comming(){
		$getce = $this->ce->get_checkin_today();
        foreach ($getce as $ces) {
            $getvisitor         = $this->visitor->getid($ces->id_visitor);
            if(filter_var($getvisitor->email,FILTER_VALIDATE_EMAIL)){
                $detail['name']     = $getvisitor->nama_visitor;
                echo $getvisitor->nama_visitor."<br>";
                Mail::send('mail.thanks',$detail,function($m) use ($getvisitor){
                    $m->from('no-reply@data-driven.asia');
                    $m->to($getvisitor->email,$getvisitor->nama_visitor);
                    $m->subject('Terima Kasih Atas Kedatangannya');
                });
            }
        }

	}

	function not_coming(){
        $getce = $this->ce->get_not_checkin();
        foreach ($getce as $ces) {
            $getvisitor         = $this->visitor->get_id($ces->id_pengunjung);
            if(filter_var($getvisitor->email,FILTER_VALIDATE_EMAIL)){
                $detail['name']     = $getvisitor->nama_visitor;
                echo $getvisitor->nama_visitor."<br>";
                Mail::send('mail.thanks',$detail,function($m) use ($getvisitor){
                    $m->from('no-reply@data-driven.asia')
                        ->to($getvisitor->email,$getvisitor->nama_visitor)
                        ->subject('Anda melewatkan hari ini, semoga anda dalam keadaan baik.');
                });    
            }
               
        }
    }
}