<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
    public function dashboard(): RedirectResponse
    {
        return redirect()->route('admin.user.index');
    }
}
