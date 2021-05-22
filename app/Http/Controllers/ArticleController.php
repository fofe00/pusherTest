<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(6);
        return response()->json($articles);
    }

    public function articleId($id)
    {
     $article=Article::find($id);
     return response()->json($article);
    }
}
