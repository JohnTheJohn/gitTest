<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {

    }

    public function about($id)
    {

        try
        {
            $post = Post::findOrFail($id);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception)
        {
            abort(404, 'The post you are looking for does not exist');
        }

        return view('about')->with('post', $post);
    }
}
