<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'ASC')->get();
        return view('admin.blog.index')->with('blogs', $blogs);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {

        $user_id = Auth::user()->id;


        $blog_id = Blog::Create([
            'user_id' => $user_id,
            'title' => $request->title,
            'post' => $request->post
        ])->id;

        return redirect()->route('admin.blog.edit', ['id' => $blog_id]);
    }


    public function edit($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->back();
        }

        return view('admin.blog.edit')->with('blog', $blog);
    }


    public function update(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->update([
            'title' => $request->title,
            'post' => $request->post
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $items = Blog::find($id);
        $items->delete();

        return redirect()->back();
    }
}
