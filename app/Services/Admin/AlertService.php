<?php
namespace App\Services\Admin;

use RealRashid\SweetAlert\Facades\Alert;

class AlertService{
    public function getAlertMessage($title,$msg)
    {
        Alert::success($title,$msg);
        return redirect()->back();
    }

    public function getAlertMessageError($title,$msg){
        Alert::error($title,$msg);
        return redirect()->back();
    }
}
