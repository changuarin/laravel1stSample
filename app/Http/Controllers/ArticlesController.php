<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use DB;
use App\User;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);
      
        return view('articles.index', compact('articles'));
        //$article = Article::whereLive(1)->get();

        // QUERY BUILDER
        //$article = DB::table('articles')->whereLive(1)->get();
        //

        //return $article;
    }

    
    public function create()
    {
        return view('articles.create');


    }

    public function store(Request $request)
    {   
        /*
        $article = new Article;

        $article->user_id = Auth::user()->id;
        $article->content = $request->content;
        $article->live = (boolean)$request->live;
        $article->post_on = $request->post_on;

        $article->save();
        */

        Article::create($request->all());

        //Another REDIRECT CODE ..
        //return redirect()->action('ArticlesController@index');

        return redirect('/articles/');

        // QUERY BUILDER !
        //DB::table('articles')->insert($request->except('_token'));
        //
        /*
        Article::create([
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'live'    => (boolean)$request->live,
            'post_on' => $request->post_on
        ]);
        */

    }

   
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        if(! isset($request->live))
            $article->update(array_merge($request->all(), ['live' => FALSE]));
        else
            $article->update($request->all());

        return redirect('/articles/');
    }

    public function destroy($id)
    {
         $article = Article::find($id);
         $article->delete();

         return redirect('/articles/');
    }
}
