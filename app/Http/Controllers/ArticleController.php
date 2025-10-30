<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles'));
    }
}
