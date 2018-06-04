<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $posts= Post::count();
        $categories= Category::count();
        $comments= Comment::count();
        return view('admin.index', compact('posts','categories','comments'));
    }
}
