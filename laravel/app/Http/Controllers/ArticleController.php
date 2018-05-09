<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();



        foreach ($articles as $article) {
          $array = [];
          
          foreach($article->tags as $tag){
              array_push($array, $tag->name);
          }
          $article->tags = null;
          $article->articleTags = $array;
        }
        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article(); 
        $article->title = $request->title; 
        $article->body = $request->body; 


        //$article->tags()->attach($request->parameters->tags);

        return response($article);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tags = [];
        foreach($request->tags as $tag){
            $tag = Tag::where('name', $tag)->first();
            $tag = $tag->id;
            array_push($tags, $tag);
        }

        
        $article = Article::find($request->id);
        $article->tags()->sync($tags);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
