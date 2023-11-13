<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Auth;
use App\Models\Blance;
class Helper
{
    public static function check_login()
    {
        if (Auth::user()!=null) {
            $id =  Auth::user()->id;
            // return session()->put('session_id',$id);

        }else{
            if(session()->get('session_id')!=null){
                return session()->get('session_id');
            }else{
                $session_id = rand(000123,929999);
                session()->put('session_id',$session_id);
                return $session_id;
            }

        }
    }
   
   
    public static function check_blance(){
        if (Auth::user()!=null) {
            // return Auth::user()->id;
            $Blance = Blance::where('userId',Auth::user()->id)->first();
            if($Blance!=null){
            return 'Blance  $'. $Blance->blance; 
            }
                
            
            
            
        }
        else{
            
        }
    }
    
    
}
