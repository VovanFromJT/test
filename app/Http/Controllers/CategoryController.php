<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->where('status', 1);
        return view('categories.index', compact('categories'));
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Category has been deleted successfully !');

        return redirect()->back();
    }

    public function getCategory($id)
    {
        if ($id != 0) {
            $item = Category::find($id);
        } else {
            $item = (object) [
                'id' => null,
                'name' => null,
                'description' => null,
                'parent_id' => null,
                'status' => null,
                'created_at' => null,
            ];
        }
        $categories = Category::all();
        return view('categories.category', compact('item', 'categories'));
    }

    public function parentCategory($id)
    {
        if ($id == "0") {
            return redirect('/categories');
        } else {
            $item = Category::find($id);
            $categories = Category::all();
            return view('categories.category', compact('item', 'categories'));
        }
    }

    public function updateOrCreateCategory(Request $request)
    {
        if ($request->id == 0) {
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'parent_id' => $request->parent_id,
                'status' => $request->status,
            ]);
        } else {
            $category = Category::find($request->id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            $category->status = $request->status;
            $category->save();
        }

        return redirect('/categories');
    }
}
