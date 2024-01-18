<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
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


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // Add other validation rules as needed
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('journalist.dashboard')->with('success', 'Article updated successfully.');
    }

    public function editStatus($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit_status', compact('article'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'status_message' => 'nullable|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update([
            'status' => $request->status,
            'status_message' => $request->status_message,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article status updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('journalist.dashboard');
    }



    public function index()
    {
        $articles = Article::where('status', 'approved')->get();
        return view('index', compact('articles'));
    }

}

