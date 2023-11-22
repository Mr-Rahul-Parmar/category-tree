<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
//        $categories = Category::with('children')->get();
//        return view('categories.index', compact('categories'));

        $params['categories'] = Category::where('parent_id', '=', 0)->get();
        $params['allCategories'] = Category::pluck('name','id')->all();
        return view('categories.index', $params);
    }

    public function show(Request $request)
    {
        $category = Category::where('id', $request->id)->first();

        return view('categories.show', compact('category'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Category::create($input);

        Session::put('success', 'Category created successfully');
        $redirect = route('category.index');
        return ['status' => 1, 'redirect' => $redirect];
    }

    public function edit(Request $request)
    {
        $params['category'] = Category::where('id', $request->id)->first();
        $params['categories'] = Category::pluck('name', 'id')->all();

        return view('categories.edit', $params);
    }

    public function update(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        $category->update($request->all());

        Session::put('success', 'Category updated successfully');
        $redirect = route('category.index');
        return ['status' => 1, 'redirect' => $redirect];
    }

    public function delete(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        $category->delete();
        Session::put('success', 'Category deleted successfully');
        $redirect = route('category.index');
        return ['status' => 1, 'redirect' => $redirect];
    }

}
