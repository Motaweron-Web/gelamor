<?php

use Illuminate\Support\Facades\Config;

if(!function_exists('returnMessageError')){


    function returnMessageError($message,$code){


        return response()->json([

            "message" => $message,
            "code" => $code

        ]);
    }
}


if(!function_exists('returnMessageSuccess')){


    function returnMessageSuccess($message,$code){


        return response()->json([

            "message" => $message,
            "code" => $code

        ]);
    }

}


if(!function_exists('returnDataSuccess')){


    function returnDataSuccess($message,$code,$key,$value){


        return response()->json([

            "message" => $message,
            "code" => $code,
            $key => $value

        ]);
    }


}



//check current language
if(!function_exists('lang')){

    function lang(){

        return Config::get('app.locale');

    }
}


if (!function_exists('get_file')) {
    function getFile($image): string
    {
        if ($image!= null){
            if (!file_exists($image)){
                return asset('img_default/default.png');
            }else{
                return asset($image);
            }
        }else{
            return asset('img_default/default.png');
        }
    }
}

if(!function_exists('accept_language')) {

    function accept_language()
    {
        return request()->header('Accept-Language');
    }
}

