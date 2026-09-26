<?php

namespace App\Exceptions;

use Exception;

class customexception extends Exception
{

    public function report()
    {
        \Log::error($this->getMessage());
    }

    public function render($request)
    {
        return response()->view('error', ['message' => $this->getMessage()], 500);
    }
}
