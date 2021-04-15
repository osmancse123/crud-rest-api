<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $post=DB::table('posts')->get();
        // return response()->json($post);
        // echo "<pre>";
        // print_r($post);
        return Post::all(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required|unique:posts|max:255',
        ]);

        // $data=array();
        // $data['title']=$request->title;
        // $data['content']=$request->content;
        // $insert=DB::table('posts')->insert($data);
        Post::create($request->all());
        return response('successfully done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Post::findorfail($id);
        return response()->json($show);
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
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required|unique:posts|max:255',
        ]);

        // $data=array();
        // $data['title']=$request->title;
        // $data['content']=$request->content;
        // $post=DB::table('posts')->where('id', $id)->update($data);
        // return response('updated');

        $post=Post::findorfail($id);
        $post->update($request->all());
        return response('updated done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('posts')->where('id',$id)->delete();
        // Post::where('id',$id)->delete();
        $delete=Post::findorfail($id)->delete();
        return response('deleted');
    }
}
