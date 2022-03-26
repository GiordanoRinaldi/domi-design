<?php

namespace App\Http\Services;

use App\Models\Project;

class ProjectService
{
    protected $photoService;

    /**
     * @param Photoservice $photoService
     */
    public function __construct(Photoservice $photoService)
    {
        $this->photoService = $photoService;
    }

    /**
     * @param array $array
     * @return mixed
     */
    public function create(array $array)
    {
        return Project::create($array);
    }

    /**
     * @param Project $project
     * @param array $array
     * @return bool
     */
    public function update(Project $project, array $array):bool
    {
        $project->update($array);

        return true;
    }

    /**
     * @param Project $project
     * @return bool
     */
    public function destroy(Project $project): bool
    {
        foreach ($project->photos as $photo){
            $this->photoService->destroy($photo);
        }
        return $project->delete();
    }

    /**
     * @return int
     */
    public function getLastProject(): int
    {
       return Project::latest()->value('id');
    }
}
