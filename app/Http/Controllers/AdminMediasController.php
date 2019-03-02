<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Post;
use App\User;

class AdminMediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $photos = Photo::all();
        return view('admin.media.index', ['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = time().$file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file' => $name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();    
        unlink(public_path() . '/images/' . $photo->file);
        $post = Post::findOrFail($photo->post->id);
        $post->photo_id = 2;
        $post->save();   
        return redirect()->back();
    }

    public function deleteMedia(Request $request){
        // dd($request);
        if(isset($request->delete_single)){
            $photo = Photo::findOrFail($request->photo_id);
            if($photo->from == 'post'){
                $photo->delete();    
                unlink(public_path() . '/images/' . $photo->file);
                $post = Post::findOrFail($photo->post->id);
                $post->photo_id = 2;
                $post->save();   
            }
            elseif($photo->from == 'user'){
                $photo->delete();    
                unlink(public_path() . '/images/' . $photo->file);
                $user = User::findOrFail($photo->user->id);
                $user->photo_id = 1;
                $user->save(); 
            }
            return redirect()->back()->with('success', 'Photo has been deleted successfly.');
        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach ($photos as $photo) {
                if($photo->from == 'post'){
                    $photo->delete();    
                    unlink(public_path() . '/images/' . $photo->file);
                    $post = Post::findOrFail($photo->post->id);
                    $post->photo_id = 2;
                    $post->save();   
                }
                if($photo->from == 'user'){
                    $photo->delete();    
                    unlink(public_path() . '/images/' . $photo->file);
                    $user = User::findOrFail($photo->user->id);
                    $user->photo_id = 1;
                    $user->save();  
                }
            }
            return redirect()->back()->with('success', 'Photo has been deleted successfly.');
        }else{
            return redirect()->back()->with('error', 'Please select photo to delete.');            
        }

        // dd($request);
        // $photos = Photo::findOrFail($request->checkBoxArray);
        // foreach ($photos as $photo) {
        //     $photo->delete();    
        //     unlink(public_path() . '/images/' . $photo->file);
        //     $post = Post::findOrFail($photo->post->id);
        //     $post->photo_id = 2;
        //     $post->save();   
        // }
        // return redirect()->back();

    }
}
