<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    //Input Form
    public function create(){
        return view('category.create');
    }

    //Input Data Store (Back-End)
    public function store(Request $request){
        $category = $request->all();
        Category::create($category);

        //return redirect()->back()->with('success', 'Category Created Successfully');
        return redirect()->route('category.allcategory')->with('success', 'Category Created Successfully');
    }

    //Show Specific Data Table
    public function show($id){
        //$category = Post::with('category')->get();

        //$category = Post::where('category_id', 15)->get();

        //Selected Category show all post
        $category = Post::where('category_id', $id)->get();

        return view('category.show', compact('category'));
    } 

    //Dashboard Data Table
    public function allcategory(){
        $list = (Category::all());
        return view('category.allcategory', compact('list'));
    }

    //Edit Specific Data Table
    public function edit($id){ 
        $item = Category::find($id);
        
        return view('category.edit', compact('item'));
    }

    //Update Specific Data Table
    public function update($id, Request $request){
        $item = Category::find($id);
        $item->update($request->all());
        
        //return redirect()->back()->with('success', 'Category Updated Successfully');
        return redirect()->route('category.allcategory')->with('success', 'Category Updated Successfully');
    }

    //Delete Specific Data Table
    public function destroy($id){
        Category::destroy($id);

        return redirect()->back()->with('destroy', 'Category Deleted Successfully');
    }
}
