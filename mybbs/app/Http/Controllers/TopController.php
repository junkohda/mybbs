<?php

namespace App\Http\Controllers;

class TopController extends Controller
{
    public function index()
    {
        return $this->buildView('bbs');
    }

}
