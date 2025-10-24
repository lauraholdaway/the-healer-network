<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function index()
    {
        dd('testing Online server');
        $blogs = Blog::latest()->paginate(12);
        return view('admin.blogs.index', compact('blogs'));
    }


    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'subscription' => 'nullable|string|max:100',
            'time' => 'nullable|string|max:100',

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('blogs', 'public');
            $data['image'] = $path;
        }

        Blog::create($data);

        return redirect()->route('Blogs.index')->with('success', 'Blog created.');
    }



    public function edit(Blog $Blog)
    {
        return view('admin.blogs.update', compact('Blog'));
    }

    public function update(Request $request, Blog $Blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'subscription' => 'nullable|string|max:100',
            'time' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            // delete old
            if ($Blog->image && Storage::disk('public')->exists($Blog->image)) {
                Storage::disk('public')->delete($Blog->image);
            }

            $path = $request->file('image')->store('blogs', 'public');
            $data['image'] = $path;
        }

        $Blog->update($data);

        return redirect()->route('Blogs.index')->with('success', 'Blog updated.');
    }

    public function destroy(Blog $Blog)
    {
        if ($Blog->image && Storage::disk('public')->exists($Blog->image)) {
            Storage::disk('public')->delete($Blog->image);
        }
        $Blog->delete();

        return redirect()->route('Blogs.index')->with('success', 'Blog deleted.');
    }


    public function blogs(Request $request)
    {
        $blogs = Blog::latest()->get();
        return response()->json($blogs);

    }
    public function blogone(Request $request, $id)
    {
        $blog = Blog::where('id',$id)->first();
        return response()->json($blog);
    }
}
