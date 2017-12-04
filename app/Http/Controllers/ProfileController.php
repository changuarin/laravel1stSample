<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;

class ProfileController extends Controller
{
    public function profile($username)
    {
    	$user = User::whereUsername($username)->First();
    	//$article = Article::findOrFail(2);

    	//return $article;
    	//dd($user);
    	//return $user;
    	return view('user.profile', compact('user'));
    }
}
