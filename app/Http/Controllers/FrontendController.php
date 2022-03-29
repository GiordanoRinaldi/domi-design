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
        return view('frontend.index', [
            'projects' => Project::where('in_homepage', true)->get()
        ]);
    }


    /**
     * @return View
     */
    public function show($slug): View
    {
        return view('frontend.show', [
            'project' => Project::where('slug', $slug)->first()
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

    /**
     * @return View
     */
    public function bio(): View
    {
        return view('frontend.about-me');
    }
}
