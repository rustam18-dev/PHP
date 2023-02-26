<?php

if (! function_exists('flash')) {
    /**
     * @param $message
     * @param $type
     * @return void
     */
    function flash($message, $type = 'success')
    {
        session()->flash('message', $message);
        session()->flash('message_type', $type);
    }
}
