<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    /**
     * Display blog management overview.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs', compact('blogs'));
    }

    /**
     * Store new blog article.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $imagePath = 'uploads/blogs/' . $filename;
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'author_name' => $request->author_name,
            'status' => $request->status,
            'image_path' => $imagePath
        ]);

        return back()->with('success', 'Blog article created successfully.');
    }

    /**
     * Update active blog details.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $blog->image_path;
        if ($request->hasFile('image')) {
            // Delete old file
            if ($imagePath && file_exists(public_path($imagePath)) && is_file(public_path($imagePath))) {
                @unlink(public_path($imagePath));
            }

            $file = $request->file('image');
            $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $imagePath = 'uploads/blogs/' . $filename;
        }

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'author_name' => $request->author_name,
            'status' => $request->status,
            'image_path' => $imagePath
        ]);

        return back()->with('success', 'Blog article details updated.');
    }

    /**
     * Delete blog article.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete old file
        if ($blog->image_path && file_exists(public_path($blog->image_path)) && is_file(public_path($blog->image_path))) {
            @unlink(public_path($blog->image_path));
        }

        $blog->delete();

        return back()->with('success', 'Blog article deleted.');
    }
}
