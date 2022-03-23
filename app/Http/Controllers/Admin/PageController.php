<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.index',[
            'categories' => Category::all(),
            'projects' => Project::all(),
        ]);
    }
}
