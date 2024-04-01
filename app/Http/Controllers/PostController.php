<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);

        // dd($posts);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/posts')->with('successAlert', 'Add new post Successfully');
    }

    /**
     * Display the specified resource.<input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Post Title" value="{{ $post->title ?? old('title') }}" id="title" name="title">

     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/posts')->with('successAlert','You Have successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        POST::find($id)->delete();

        return redirect('/posts')->with('successAlert', 'Delete Successfully');
    }
}
