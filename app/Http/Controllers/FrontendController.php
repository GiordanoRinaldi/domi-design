<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Contracts\View\View;

class FrontendController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        return view('frontend.index');
    }


    /**
     * @return View
     */
    public function show(Project $project): View
    {
        return view('frontend.show', [
            'project' => $project
        ]);
    }

    /**
     * @return View
     */
    public function projects(): View
    {
        return view('frontend.university-project', [
            'categories' => Category::all()
        ]);
    }
}
