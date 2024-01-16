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

    public function createArticle(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required|max:50',
            'status' => 'required|in:waiting,approved,rejected',
        ]);

        // Assuming the author's ID is available via auth (authenticated user)
        $authorId = auth()->id();

        Article::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'category' => $validatedData['category'],
            'status' => $validatedData['status'],
            'author_id' => $authorId,
            // 'status_message' can be added based on your application logic
        ]);

        return redirect()->route('journalist.dashboard');
    }
}

