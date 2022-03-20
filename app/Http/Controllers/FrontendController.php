<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Show the single work.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('frontend.show');
    }

    /**
     * Show the all projects.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function projects()
    {
        return view('frontend.university-project');
    }
}
