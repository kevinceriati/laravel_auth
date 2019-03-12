<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(["index", "show"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $articles = Article::all();

        return view('article.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article['user_id'] = auth()->id();
       $article->save();
        return redirect(route('article.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (\Gate::allows('article', $article)){
            return view('article.edit', [
                'article' => $article
            ]);
        }

        elseif(\Gate::denies('article', $article)){
           return redirect (route('article.index'));
        }
                                                        //abort_if(! auth()->user()->owns($article), 403);   //   seul l'ustilisateur en question peut modifier
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();

        return redirect(route('article.show', ['article' => $article]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
