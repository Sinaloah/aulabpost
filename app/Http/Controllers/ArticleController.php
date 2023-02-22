<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter = 0;
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);
        return view('article.index', compact('articles', 'counter'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required:articles|min:5',
            'subtitle'=>'required|unique:articles|min:5',
            'body'=>'required|min:10',
            'image'=>'image|required',
            'category'=>'required',
            'tags' => 'required',
        ]);

        $article = Article::create([
            'title'=> $request->title,
            'subtitle'=> $request->subtitle,
            'body'=> $request->body,
            'image'=> $request->file('image')->store('public/images'),
            'category_id'=> $request->category,
            'user_id'=> Auth::user()->id,
            'slug' => Str::slug($request->title),

        ]);

        $tags = explode(', ', $request->tags);

        foreach($tags as $tag){
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            $article->tags()->attach($newTag);
        }

        return redirect(route('welcome'))->with('message', "articolo creato correttamente");
    }

    public function __construct() {
         $this->middleware('auth')->except('index', 'show', 'articleSearch', 'byCategory', 'byUser');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'=>'required:articles|min:5',
            'subtitle'=>'required:articles|min:5',
            'body'=>'required|min:10',
            'image'=>'image',
            'category'=>'required',
            'tags' => 'required',
        ]);

        $article->update([
            'title'=> $request->title,
            'subtitle'=> $request->subtitle,
            'body'=> $request->body,
            'category_id'=> $request->category,
            'slug' => Str::slug($request->title),
        ]);

        if($request->image){
            Storage::delete($article->image);
            $article->update([
                'image'=> $request->file('image')->store('public/images'),
            ]);
        }

        $tags = explode(', ', $request->tags);
        $newTags = [];

        foreach($tags as $tag){
            $newTag = Tag::updateOrCreate([
                'name'=> $tag,
            ]);
            $newTags[] = $newTag->id;
        }

        $article->tags()->sync($newTags);

        $article->update([
            'is_accepted' => NULL,
        ]);

        return redirect(route('writer.dashboard'))->with('message', "Hai correttamente aggiornato l'articolo scelto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag){
            $article->tags()->detach($tag);
        }

        $article->delete();
        Storage::delete($article->image);

        return redirect(route('writer.dashboard'))->with('message', "Hai correttamente cancellato l'articolo scelto");
    }

    public function byCategory(Category $category)
    {
        $counter = 0;
        $articles = $category->articles->sortbyDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.by-category', compact('category', 'articles', 'counter'));
    }

    public function byUser (User $user)
    {
        $counter = 0;
        $articles = $user->articles->sortbyDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.by-user', compact('user', 'articles', 'counter'));
    }
    
    public function articleSearch(Request $request)
    {
        $counter = 0;

        $query = $request->input('query');

        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);

        if($query == []){
            return redirect()->back();
        } else{
            return view('article.search-index', compact('articles', 'query', 'counter'));
        }
    }
}
