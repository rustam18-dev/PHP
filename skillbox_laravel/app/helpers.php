<?php

if (! function_exists('flash')) {

    /**
     * @param $message
     * @param string $type
     * @return void
     */
    function flash($message, $type = 'success'): void
    {
        session()->flash('message', $message);
        session()->flash('message_type', $type);
    }

}