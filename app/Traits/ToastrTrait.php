<?php

namespace App\Traits;
use TJGazel\Toastr\Facades\Toastr;


trait ToastrTrait
{
    public function messageValidator($validator = null, $time = 5000){
        $message = null;
        foreach ($validator as $key => $value) {
            $message = $message . '<p>* ' . $value . '</p> ';
        }
        $this->messageToastr('error', $message, $time);
    }

    public function messageToastr($type = null, $message = null, $time = 10000, $title = null){
        switch ($type) {
            case 'success':
                toastr()->success($message, $title, ['timeOut' => $time]);
                break;
            
            case 'error':
                toastr()->error($message, $title, ['timeOut' => $time]);
                break;
            
            case 'info':
                toastr()->info($message, $title, ['timeOut' => $time]);
                break;
            
            case 'warning':
                toastr()->warning($message, $title, ['timeOut' => $time]);
                break;
            
            default:
                # code...
                break;
        }
    }
}
