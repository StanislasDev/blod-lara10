<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
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

    public function postsByCategory(Category $category): View
    {
        return view('posts.index', [
            // 'posts' => $category->posts()->latest()->paginate(10)
            'posts' => Post::where(
                'category_id', $category->id
            )->latest()->paginate(10),
        ]);
    }

    public function postsByTag(Tag $tag): View
    {
        return view('posts.index', [
            // 'posts' => $tag->posts()->latest()->paginate(10)
            'posts' => Post::whereRelation(
                'tags', 'tags.id', $tag->id
            )->latest()->paginate(10),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}