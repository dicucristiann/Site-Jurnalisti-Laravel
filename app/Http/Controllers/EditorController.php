<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class EditorController extends Controller
{
    public function dashboard()
    {
        // Assuming the editor can see all articles
        $articles = Article::all();

        return view('editor.dashboard', compact('articles'));
    }
}
