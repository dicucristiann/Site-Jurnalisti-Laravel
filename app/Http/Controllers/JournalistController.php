<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalistController extends Controller
{


    public function showJournalistDashboard()
    {
        if (!Auth::check()) {
            // Handle the unauthenticated case, perhaps redirecting to login
            return redirect()->route('login');
        }
        $authorId = Auth::id();
        $articles = Article::where('author_id', $authorId)->get();

        return view('journalist.dashboard',compact("articles"));
    }
    public function showJournalistCreate(){
        return view("journalist.create");
    }


}
