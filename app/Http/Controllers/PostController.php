<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Role;
use App\User;
use App\Photo;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact(['categories']));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $user_id = Auth::id();
        $post = new Post();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $post->photo_id = $photo->id;          
        }
        else
        {
            $post->photo_id = 1;
        }

        // $user->posts()->create($input);
        $post->user_id = $user_id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        $post->categories()->attach($request->input('category') === null ? [] : $request->input('category'));
        
        return redirect()->route('posts.index')->with('success', 'Post Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        // return $post;
        return view('admin.posts.edit', compact(['post', 'categories']));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        // $user_id = Auth::id();
        // $post = Auth::user()->posts()->whereId($id)->first();
        $post = Post::findOrFail($id);
        if($file = $request->file('photo_id')){
            if($post->photo->file != 'default.jpg'){
                unlink(public_path() . '/images/' . $post->photo->file);
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $post->photo_id = $photo->id;   
            
        }

        // $user->posts()->create($input);
        // $post->user_id = $user_id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        $post->categories()->sync($request->input('category') === null ? [] : $request->input('category'));
        
        return redirect()->route('posts.index')->with('success', 'Post Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->photo->file != 'default.jpg'){
            unlink(public_path() . '/images/' . $post->photo->file);
            $post->photo->delete();
        }
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post Deleted.');
    }


    // public function post($id){
    //     $post = Post::findOrFail($id);
    //     $comments = $post->comments()->whereIsActive(1)->get();
    //     return view('post', compact('post', 'comments'));
    // }
}
