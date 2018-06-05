<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Article;
use App\Tag;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        foreach($projects as $project){
            $project->role;
            $project->tags;
        }
        return response()->json($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project;
        $project->title = $request->title;
        $project->body = $request->body;
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $project->role;
        $project->tags;

        return response()->json($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

            $project->role_id = $request->role_id;

            $project->save();

            if ($project->role_id === 6)
            {   
                $article = new Article;
                $article->title = $project->name;
                $article->body = $project->body;
                $tags = $project->tags;
                $article->save();
                $article->tags()->attach($tags);
            }
        
            return response()->json($project);
    }
    public function updateProject(Request $request, $id)
    {
        $tags = [];
        foreach($request->tags as $tag){
            
            $tag = $tag['id'];
            
            array_push($tags, $tag);
        }

        
        $project = Project::find($request->id);
        $project->tags()->sync($tags);
        $project->title = $request->title;
        $project->body = $request->body;
        $project->save();


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
