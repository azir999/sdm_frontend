<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WawancaraController extends Controller
{
    public function create()
    {
        $jabatanOptions = [
            '1',
            '2',
            '3',
            '4'
        ];
        return view('admin.wawancara.create', compact('jabatanOptions'));
    }
}