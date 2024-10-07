<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashbordController extends Controller
{
    public function index(){

        $posts = Auth::user()->posts()->latest()->paginate(6);

        return view('users.dashbord' , ['posts' => $posts]);
    }
    public function userPosts(User $user){
        $userPosts = $user->posts()->latest()->paginate(6);
        return view('users.posts', [
            'posts' => $userPosts,
            'user' => $user
        ]);
    }
}
