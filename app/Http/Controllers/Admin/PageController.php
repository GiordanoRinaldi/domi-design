<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.index');
    }
}
