<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;

use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {


        $this->middleware('auth', ['only' => ['create', 'edit']]); // Require a logged in user on specified routes
        $this->middleware('manager', ['only' => ['create', 'edit']]); // Require a manager on specified routes

        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$articles = Article::where(['status' => ['published']])->latest()->get();

    	// return $articles;

        return view('articles.index', compact('articles'));
    }





    public function show(Article $article, $slug)
    {
    	// $article = Article::findOrFail($id);
    	return view('articles.show', compact('article'));
    }




    public function create()
    {
    	// $games = Game::all();
    	// $options = array();

    	// foreach($games as $game){
    	// 	$options[$game->slug] = $game->title;
    	// }

    	return view('articles.create');
    }



    public function edit(Article $article)
    {
    	// $article = Article::findOrFail($id);
    	// $games = Game::all();
    	// $options = array();

    	// foreach($games as $game){
    	// 	$options[$game->slug] = $game->title;
    	// }

    	return view('articles.edit', compact('article'));
    }




    public function store(ArticleRequest $request)
    {
    	$article = Article::create($request->all());
    	
    	// return redirect('articles/' . $article->slug . '/' . $article->id);
        return redirect(route('articles.edit', ['article' => $article->id]));
    }




    public function update(Article $article, ArticleRequest $request)
    {
    	// $article = Article::findorFail($id);
    	$article->update($request->all());
    	
    	return redirect(route('articles.show', ['article' => $article->id, 'slug' => $article->slug]));
    }



    public function addImage(Article $article, Request $request)
    {

        $this->validate($request, [

                'image' => 'required|mimes:jpg,jpeg,png'

            ]);

        // $article = Article::findOrFail($id);

        $image = $request->file('image');

        $name = $article->id . '-' . $article->slug . '-' . time() . '-' . random_int(10000000,99999999) . '.' . $image->getClientOriginalExtension();

        $image->move('files/images/articles', $name);

        $article->images()->create(['path' => '/files/images/articles/' . $name]);

        return 'Done';

    }





}
