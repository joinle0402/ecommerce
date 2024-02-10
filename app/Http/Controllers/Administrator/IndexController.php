<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function dashboard(): View
    {
        return view('administrator.index');
    }
}
