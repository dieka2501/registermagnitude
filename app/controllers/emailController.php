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
                    $m->from('no-reply@indobuildtech')
                        ->to($getvisitor->email,$getvisitor->nama_visitor)
                        ->subject('Terima Kasih Atas Kedatangannya');
                });
            }
        }

	}
}