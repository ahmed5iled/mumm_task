<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * CategoriesController constructor.
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Handel the request to list category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Session::flash('sidebar', 'categories');
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Handel the request to return add category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Session::flash('sidebar', 'categories');

        return view('admin.categories.add');
    }

    /**
     * Handel the request to add category
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('listCategories')->with(['success' => 'Categories added successfully !']);
    }

    /**
     * Handel the request to return edit category page
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        Session::flash('sidebar', 'categories');
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Handel the request to update category
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('listCategories')->with(['success' => 'Categories update successfully !']);
    }

    /**
     * Handel the request to delete category
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with(['success' => 'Category deleted successfully.']);
    }
}
