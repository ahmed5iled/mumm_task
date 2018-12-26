<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    /**
     * BlogsController constructor.
     */
    public function __construct()
    {
        return $this->middleware('auth')->except('singleBlog', 'categories');
    }

    /**
     * Handel the request to list blogs
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Category $category)
    {
        Session::flash('sidebar', 'categories');

        return view('admin.blog.index', compact('category'));
    }

    /**
     * Handel the request to return add blog page
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Category $category)
    {
        Session::flash('sidebar', 'categories');

        return view('admin.blog.add', compact('category'));
    }

    /**
     * Handel the request to add blog
     *
     * @param CreateBlogRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateBlogRequest $request, Category $category)
    {
        $image = Storage::disk('public')->put('blogs/images', $request->file('image'));

        $category->blogs()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'slug' => $request->slug
        ]);

        return redirect()->route('listBlogs', ['category' => $category->id])->with(['success' => 'blog added successfully to this category']);
    }

    /**
     * Handel the request to return edit blog page
     *
     * @param Category $category
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category, Blog $blog)
    {
        Session::flash('sidebar', 'categories');

        return view('admin.blog.edit', compact('category', 'blog'));
    }

    /**
     * Handel the request to update blog
     *
     * @param UpdateBlogRequest $request
     * @param Category $category
     * @param Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogRequest $request, Category $category, Blog $blog)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($blog->image);
            $image = Storage::disk('public')->put('blogs/images', $request->file('image'));
        }
        $category->blogs()->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => isset($image) ? $image : $blog->image,
            'slug' => $request->slug
        ]);
        return redirect()->route('listBlogs', ['category' => $category->id])->with(['success' => 'blog updated successfully to this category']);

    }

    /**
     * Handel the request to delete blog
     *
     * @param Category $category
     * @param Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category, Blog $blog)
    {
        Storage::disk('public')->delete($blog->image);
        $blog->delete();
        return redirect()->route('listBlogs', ['category' => $category->id])->with(['success' => 'blog deleted successfully']);

    }

    /**
     * Handel the request to return single blog page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singleBlog(Request $request)
    {
        $blogss = Blog::where('slug', '=', $request->blogs)->get();
        return view('front.singleBlog', compact('blogss'));
    }

    /**
     * Handel the request to return blogs at categories page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categories(Request $request)
    {
        $categoriess = Category::where('slug', '=', $request->categories)->get();

        return view('front.blogs', compact('categoriess'));
    }
}
