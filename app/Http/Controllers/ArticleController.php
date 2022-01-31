<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::sortable()->paginate(20);
        $categories = Category::all();


        return view('article.index', ['articles'=>$articles, 'categories'=>$categories]);
    }

    public function list()
    {
        $articles = Article::sortable()->paginate(20);
        $categories = Category::all();

        return view('article.list', ['articles'=>$articles, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'article_title' => 'required|min:3',
            'article_description' => 'required|min:6',
            'article_content' => 'required|min:10',
            'category_id' => 'required',
        ]);

        $article = new Article;
        $input_date = Carbon::now()->format("Y-m-d");


        $article->title = $request->article_title;
        $article->content = $request->article_content;
        $article->description = $request->article_description;
        // $article->category_id = $request->category_id;
        $article->date = $input_date;

        $article->save();

        $category_id = array();
        $category_id = $request->input('category_id');
        $category = Category::find($category_id);
        $article->categories()->attach($category);

        return redirect()->route('article.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $comments = Comment::where('article_id', "=", $article->id)->orderBy('date', 'DESC')->get();
        $comment_count = Comment::all()->where('article_id', '=', $article->id)->count();

        return view('article.show', ['article'=>$article, 'comments'=>$comments, 'comment_count'=>$comment_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('article.edit', ['article'=>$article,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $input_date = Carbon::now()->format("Y-m-d");

        $validate = $request->validate([
            'article_title' => 'required|min:3',
            'article_description' => 'required|min:6',
            'article_content' => 'required|min:10',
            'category_id' => 'required',
        ]);

        $article->title = $request->article_title;
        $article->content = $request->article_content;
        $article->description = $request->article_description;
        $article->date = $input_date;

        $article->save();

        $category_id = array();
        $category_id = $request->input('category_id');
        $category = Category::find($category_id);
        $article->categories()->sync($category);

        return redirect()->route('article.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('article.list');
    }
}
