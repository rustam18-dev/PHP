<?php
if (! function_exists('flash')) {

    function flash($message, $type)
    {
        session()->flash('message', $message);
        session()->flash('message_type', $type);
    }

}
