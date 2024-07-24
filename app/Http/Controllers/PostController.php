<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(7);
        $total = Post::count();
        // $posts = Post::all();
// return view('posts.index',[
// 'posts' => $posts,
// 'total' => $total
// ]);
        return view('posts.index', compact(['posts', 'total']));
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}