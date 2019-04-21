<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 4/18/19
 * Time: 4:21 AM
 */

namespace App\Http;


class flash
{

    public function create($title,$message,$level,$key='flash_message')
    {
        return session()->flash($key,[
            'title'     =>$title,
            'message'   => $message,
            'level'     =>$level


        ]);
    }


    public function info($title,$message)
    {
       return $this->create($title,$message,'info');
    }

    public function success($title,$message)
    {
        return $this->create($title,$message,'success');
    }

    public function warning($title,$message)
    {
        return $this->create($title,$message,'warning');
    }

    public function error($title,$message)
    {
        return $this->create($title,$message,'error');
    }

    public function overlay($title,$message,$level='success')
    {
        return $this->create($title,$message,$level,'flash_message_overlay');
    }
}