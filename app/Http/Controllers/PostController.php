<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    //Public Data Table
    public function index()
    {
        //Show 1st 8 posts with Descending Order
        // $lists =Post::with('category')->orderBy('id', 'DESC')->take(6)->get();
        $lists = Post::with('category')->whereNotNull('approve')->orderBy('id', 'DESC')->paginate(6);

        // $lists = Post::paginate(6);

        return view('posts.index', compact('lists'));
    }

    //Public Show Specific Data Table
    public function publicshow($id)
    {
        $list = Post::where('id', $id)->get();

        return view('posts.publicshow', compact('list'));
    }

    //Public Show Filterable Post
    public function filterblogs(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->input('category_id');

        if ($selectedCategoryId) {
            $post = Post::where('category_id', $selectedCategoryId)->get();
        } else {
            $post = Post::all();
        }

        return view('posts.filterblogs', compact('post', 'categories', 'selectedCategoryId'));
    }




    //Dashboard Data Table
    public function allpost()
    {
        // $list = (Post::all());
        $list = Post::paginate(10);

        return view('posts.allpost', compact('list'));
    }

    //Input Form
    public function create()
    {
        $user = Auth::user();
        $category = Category::all();

        return view('posts.create', compact('user', 'category'));
    }

    //Input Data Store (Back-End)
    public function store(Request $request)
    {
        //Blade page input validation - Request Method
        // $request->validate([
        //     'author' => 'required',
        //     'title' => 'required|string',
        //     'article' => 'required',
        //     'image_path' => 'required'
        // ],[
        //     'author.required' => 'Please type your mame!',
        //     'title.required' => 'Please type your blog title!',
        //     'article.required' => 'Please type your article!',
        //     'image_path.required' => 'Please select your blog image!'
        // ]);

        //Blade page input validation - Validator Facades Method
        $validator = Validator::make($request->all(), [
            'author' => 'required',
            'title' => 'required|string',
            'article' => 'required',
            'image_path' => 'required'
        ], [
            'author.required' => 'Please type your name!',
            'title.required' => 'Please type your blog title!',
            'article.required' => 'Please type your article!',
            'image_path.required' => 'Please select your blog image!'
        ]);
        if ($validator->fails()) {
            // If validation fails, redirect back with the error messages
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $post = $request->all();
        // Post::create($post);       
        // // return redirect()->route('posts.allpost');
        // return redirect()->route('posts.allpost')->with('success', 'Post Submitted Successfully');

        //Image section
        $post = $request->except(['image_path']);
        //dd($post); 

        if ($request->file('image_path')) {
            $file_name = $request->file('image_path')->getClientOriginalName();
            $request->image_path->move(public_path('post_images'), $file_name);
            $post['image_path'] = 'post_images/' . $file_name;
            // dd($file_name);

            Post::create($post);

            //return redirect()->route('posts.allpost');
            return redirect()->route('posts.allpost')->with('success', 'Post Submitted Successfully');
        } else {
            return back();
        }
    }

    //Show Specific Data Table
    public function show($id)
    {
        $list = Post::where('id', $id)->get();
        return view('posts.show', compact('list'));
    }

    //Edit Specific Data Table
    public function edit($id)
    {
        $item = Post::find($id);
        $category = Category::all();

        return view('posts.edit', compact('item', 'category'));
    }

    //Update Specific Data Table
    public function update($id, Request $request)
    {
        $item = Post::find($id);
        $item->update($request->all());

        //return redirect()->route('posts.allpost');
        //return redirect()->back()->with('success', 'Post Updated Successfully');
        return redirect()->route('posts.allpost')->with('success', 'Post Updated Successfully');
    }

    //Delete Specific Data Table
    public function destroy($id)
    {
        Post::destroy($id);

        //return redirect()->route('posts.index');
        return redirect()->back()->with('destroy', 'Post Deleted Successfully');
    }
}
