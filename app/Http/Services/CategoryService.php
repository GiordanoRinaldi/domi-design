<?php

namespace App\Http\Services;

use App\Models\Category;

class CategoryService
{
    /**
     * @param array $array
     * @return mixed
     */
    public function create(array $array)
    {
        return Category::create($array);
    }

    /**
     * @param Category $category
     * @param array $array
     * @return mixed
     */
    public function update(Category $category,array $array):bool
    {
        $category->update($array);

        return true;
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function destroy(Category $category): bool
    {
        return $category->delete();
    }
}
