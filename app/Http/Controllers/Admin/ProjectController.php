<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Services\PhotoService;
use App\Http\Services\ProjectService;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    protected $projectService;
    protected $photoService;


    /**
     * @param ProjectService $projectService
     * @param PhotoService $photoService
     */
    public function __construct(ProjectService $projectService, PhotoService $photoService)
    {
        $this->projectService = $projectService;
        $this->photoService = $photoService;
    }



    public function create()
    {
        if (Category::all()->isEmpty()) {
            return redirect()->back()->with('warning',
            'Non puoi creare un progetto senza avere una categoria da collegare.');
        }
        return view('admin.projects.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProjectRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $this->projectService->create($request->validated());
        $this->photoService->create($request->img, $this->projectService->getLastProject());

        return redirect()->route('admin.home')->with('success',
            'Nuovo post creato!');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//

    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project' => $project,
            'categories' => Category::all()
        ]);
    }


    /**
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        if ($this->projectService->update($project, $request->validated())){
            $this->photoService->update($request->img, $project->id, $project->photos);
            return redirect()->route('admin.home')->with('success',
                'Progetto aggiornato!');
        }

        return redirect()->route('admin.home')->with('danger',
            'Qualcosa è andato storto.');
    }

    /**
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {

        if ($this->projectService->destroy($project)) {
            return redirect()->route('admin.home')->with('success',
                'Categoria eliminata!');
        }

        return redirect()->route('admin.home')->with('danger',
            'Qualcosa è andato storto.');
    }
}
