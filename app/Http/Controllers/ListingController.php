<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\List_;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstArticle = Listing::first();
        $query = Listing::query();
        $articles = $query->offset(1)->limit(9)->get();
        return view('index', [
            'firstArticle' => $firstArticle,
            'articles' => $articles
        ]);
    }
    public function allArticles()
    {
        return view('all', [
            'articles' => Listing::all()
        ]);
    }
    public function dashboard()
    {
        $articles = Listing::where('user_id', Auth::user()->id)->get();
        return view('dashboard', [
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
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:255 |unique:listings,title',
            'description' => 'required|max:800',
            'tag' => 'required|max:255',
        ]);
        $article = Listing::create($validation);
        $article->user_id = Auth::user()->id;
        $article->slug = Str::slug($article->title);
        $article->save();

        if ($request->hasFile('image')) {
            $article->addMediaFromRequest('image')
                ->usingName(Str::slug($article->title))
                ->toMediaCollection('images');
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Listing::find($id);
        return view('details', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Listing::find($id);
        return view('edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'required|max:255 |unique:listings,title',
            'description' => 'required|max:800',
            'tag' => 'required|max:255',
        ]);
        $article = Listing::find($id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->tag = $request->tag;
        $article->slug = Str::slug($request->title);
        $article->save();
        if ($request->hasFile('image')) {
            $article->addMediaFromRequest('image')
                ->usingName(Str::slug($article->title))
                ->toMediaCollection('images');
        }
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Listing::find($id);
        $article->delete();
        return redirect()->route('dashboard');
    }
}
