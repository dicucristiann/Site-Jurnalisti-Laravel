<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalistController extends Controller
{


    public function dashboard()
    {
        if (!Auth::check()) {
            // Handle the unauthenticated case, perhaps redirecting to login
            return redirect()->route('login');
        }
        $authorId = Auth::id();
        $articles = Article::where('author_id', $authorId)->orderBy("created_at","desc")->get();

        return view('journalist.dashboard',compact("articles"));
    }



}
