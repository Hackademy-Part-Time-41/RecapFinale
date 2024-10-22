<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('articles.create',compact('users','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // $article = new Article;
        // $article->title = $request->title;
        // $article->body = $request->body;

        // $article->save();

        $validated = $request->validate([
            'title'=>'required|max:255',
            'body'=>'required|max:500',
            'user_id'=>'required'
        ]);

        $article = Article::create($validated);

        $article->categories()->attach($request->categories);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $fileName = $article->id.'cover.'.$request->file('image')->getClientOriginalExtension();

            $request->file('image')->storeAs('images/'.$article->id.'/',$fileName,'public');
            $article->image = 'images/'.$article->id.'/'.$fileName;
            $article->save();
        }

        return redirect()->back()->with('success','Articolo creato');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $users = User::all();
        $categories = Category::all();
        return view('articles.edit',compact('article','users','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if($request->hasFile('image') && $article->image){
            Storage::delete($article->image);
        }
        

        $validated = $request->validate([
            'title'=>'required|max:255',
            'body'=>'required|max:500'
        ]);
        $article->update($validated);

        $article->categories()->sync($request->categories);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $fileName = $article->id.'cover.'.$request->file('image')->getClientOriginalExtension();

            $request->file('image')->storeAs('images/'.$article->id.'/',$fileName,'public');
            $article->image = 'images/'.$article->id.'/'.$fileName;
            $article->save();
        }
        return redirect()->back()->with('success','Modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if($article->image){
            Storage::delete($article->image);
        }
        $article->categories()->detach();
        $article->delete();
        return redirect()->back()->with('success','Eliminato correttamente');
    }
}
