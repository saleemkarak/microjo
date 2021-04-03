<?php
use App\Models\Setting;
class Helper{

public static function userDefaultImage(){
    return asset( 'frontend/img/account.png');
}
public static function setting(){
    $setting = Setting::where(['status'=>'active'])->limit('1')->first();

    return $setting;
}

}
