<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Blog, Tag};

class BlogController extends Controller
{
	public function index()
	{
		$blogs = Blog::leftJoin('tags as t', 't.id', 'blogs.tag_id')
					->leftJoin('users as u', 'u.id', 'blogs.created_by')
					->select('blogs.*', 't.name', 'u.name as author_name')
					->paginate(3);
		
		return view('blog.old_index', compact('blogs'));
	}

	public function create()
	{
		$tags = Tag::get();
		return view('blog.create', compact('tags'));
	}

	public function store(Request $request)
	{
		$request->validate([
		    'title' => 'required',
		    'content' => 'required',
		    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$blog = new Blog;
		$blog->title = $request->title;
		$blog->content = $request->content;
		$blog->tag_id = $request->tag_id;
		$blog->created_by = auth()->user() ? auth()->user()->id : 1;
		$blog->save();

		if ($request->file('image')) 
		{
			$fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

            $blog->image = time().'_'.$request->image->getClientOriginalName();
            $blog->save();
		}

		return redirect('blog')->with('success', 'Blog added successfully');
	}

	public function show($id)
	{
		$blog = Blog::leftJoin('tags as t', 't.id', 'blogs.tag_id')
					->leftJoin('users as u', 'u.id', 'blogs.created_by')
					->select('blogs.*', 't.name', 'u.name as author_name')
					->findOrFail($id);
		return view('blog.show', compact('blog'));
	}
}
