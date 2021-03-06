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
            $getvisitor         = $this->visitor->getid($ces->id_pengunjung);
            if(filter_var($getvisitor->email,FILTER_VALIDATE_EMAIL)){
                $detail['name']     = $getvisitor->nama_visitor;
                echo $getvisitor->nama_visitor."<br>";
                Mail::send('mail.missyu',$detail,function($m) use ($getvisitor){
                    $m->from('no-reply@data-driven.asia')
                        ->to($getvisitor->email,$getvisitor->nama_visitor)
                        ->subject('Anda melewatkan hari ini, semoga anda dalam keadaan baik.');
                });    
            }
               
        }
    }

    function report_daily(){
        $chekin_today   = $this->ce->get_checkin_today();
        $regis_today    = $this->visitor->get_today();
        $regis_all      = $this->visitor->get_all();
        $valid_email    = $this->visitor->status_verify();
        $view['total_registrasi']   = count($regis_today);
        $view['checkin']            = count($chekin_today);
        $view['verifikasi']         = count($valid_email);
        $view['total_visitor']      = count($regis_all);
        $receiver                   = ['dieka.koes@gmail.com','dikdik@data-driven.asia','bagja@data-driven.asia','bintang0274@gmail.com','vibiadhisp@gmail.com',
                                        'vibiadhisp@data-driven.asia','bintang@data-driven.asia','imran@data-driven.asia'];
        
        Mail::send('mail.reportdaily',$view,function($m) use ($receiver){
                    $m->from('no-reply@data-driven.asia','Admin')
                        ->to($receiver)
                        ->subject('Laporan Harian Magnitude.');
                });    
        return View::make('mail.reportdaily',$view);
    }
}