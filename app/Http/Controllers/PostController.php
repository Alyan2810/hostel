<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $search_text =  null;
        $posts = Post::with('tags', 'category')->latest()->paginate(10);

        return view('posts.index', compact('posts', 'search_text'));
    }

    public function show($id)
    {
        $post = Post::with('tags')->findOrFail($id);
        
        return view('posts.show', compact('post'));
    }
    public function search( Request $request)
    {
       
      // echo "<pre>";
       //print_r($request->all());
      // echo "</pre>";
      // die;
      $search_text =  $request->search_text;
        $posts = Post::where('title','LIKE','%'.$search_text.'%')->orWhere('post','LIKE','%'.$search_text.'%')->with('category', 'tags')->take(5)->latest()->get();
      if(count($posts) > 0)
      return view('posts.index', compact('posts' , 'search_text'));
      else
      {
        $posts = null;
        return view('posts.index', compact('posts', 'search_text'));
      }
      
     
    }
}
