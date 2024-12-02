<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Initialiser les données à sauvegarder
        $data = $request->validated(); // Récupère uniquement les champs validés

        // Ajouter l'ID de l'utilisateur
        $data['user_id'] = $user->id;

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Gérer l'upload du fichier PDF
        if ($request->hasFile('filepdf')) {
            $data['file_path'] = $request->file('filepdf')->store('articles', 'public');
        }

        // dd($data);
        // Créer l'article
        Article::create($data);

        // Redirection avec un message de succès
        return redirect('/articles')->with('success_message', 'Article créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::with('user')->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        
        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Gérer l'upload du fichier PDF
        if ($request->hasFile('filepdf')) {
            $data['file_path'] = $request->file('filepdf')->store('articles', 'public');
        }
        $article->update($data);
        return redirect('/articles')->with(['success_message' => 'L\'article a été modifié !']);

   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articles')->with(['success_message' => 'L\'article a été supprimée !']);

    }
}
