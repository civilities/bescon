<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PhotoController extends Controller
{

    /**
     * @return string
     */
    public function getValidatesRequestErrorBag(): string
    {
        return $this->validatesRequestErrorBag;
    }


}
