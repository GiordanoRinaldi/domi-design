<?php

namespace App\Http\Services;

use App\Models\Project;

class ProjectService
{
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
        return $project->delete();
    }
}
