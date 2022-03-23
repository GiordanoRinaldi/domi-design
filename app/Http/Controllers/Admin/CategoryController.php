<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    protected $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $this->categoryService->create($request->validated());
        return redirect()->route('admin.home')->with('success',
        'Nuova categoria creata!');
    }

    /**
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit',[
            'category' => $category
        ]);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        if ($this->categoryService->update($category, $request->validated())) {
            return redirect()->route('admin.home')->with('success',
                'Categoria aggiornata!');
        }

        return redirect()->route('admin.home')->with('danger',
            'Qualcosa è andato storto.');
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($this->categoryService->destroy($category)) {
            return redirect()->route('admin.home')->with('success',
                'Categoria eliminata!');
        }

        return redirect()->route('admin.home')->with('danger',
            'Qualcosa è andato storto.');
    }
}
