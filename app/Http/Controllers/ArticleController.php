<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'approved')->get(); // Asumând că ai un câmp 'status'
        return view('index', compact('articles'));
    }
}

