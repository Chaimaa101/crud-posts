<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index','show']),
        ];
    }
 

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.welcome', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' =>['nullable','file','max:3000','mimes:png,jpg,webg']
        ]);
        $path = null;
            if($request->hasFile('image')){
            $path = Storage::disk('public')->put('posts_images', $request->image);
        }
        Auth::user()->posts()->create([
            'title' => $request->title,
            'body' =>$request->body,
            'image' => $path
        ]);
        // Post::create(['user_id' => Auth::id(), ...$infos]);
        return back()->with('success', 'Your post was created');
    }
    
    /*
    * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('modify', $post);

        return view('posts.edit', ['post' => $post]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('modify', $post);

        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webg']
        ]);

        $path = $post->image ?? null;
        if ($request->hasFile('image')) {
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $path = Storage::disk('public')->put('posts_images', $request->image);
        }
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);
        
        return redirect()->route('dashbord')->with('update','Your post was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
        Gate::authorize('modify', $post);
        
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return back()->with('delete', 'Your post was deleted!');
    }
}