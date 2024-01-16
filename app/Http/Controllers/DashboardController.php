<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $articles = Article::where('status', 'approved')->get();

        return view('dashboard',compact("articles"));
    }
}
