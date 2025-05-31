<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PsikologiController extends Controller
{
    public function create()
    {

        return view('admin.psikologi.create');
    }

}