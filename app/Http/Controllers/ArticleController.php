<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use AuthorizesRequests;
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
        $check = old('check', false);  // Par défaut, on suppose que l'utilisateur n'a pas coché la case.
        return view('articles.create', compact('check'));
        // return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Initialiser les données à sauvegarder
        $data = $request->validated(); // Récupère uniquement les champs validés

        // Ajouter l'ID de l'utilisateur
        $data['user_id'] = $user->id;
        // dd($data);

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }


        // Vérifier si l'utilisateur a choisi d'ajouter un contenu
        if ($request->check) {
            // Si le contenu est sélectionné, le fichier PDF n'est pas requis
            $data['file_path'] = null;
        } else {
            // Si un fichier PDF est sélectionné, le contenu n'est pas requis
            $data['content'] = null;

            // Gérer l'upload du fichier PDF
            if ($request->hasFile('filepdf')) {
                $data['file_path'] = $request->file('filepdf')->store('articles', 'public');
            }
        }
        // Créer l'article
        Article::create($data);

        // // Redirection avec un message de succès
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
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);

        $data = $request->validated();


        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Vérifier si l'utilisateur a choisi d'ajouter un contenu
        if ($request->check) {
            // Si le contenu est sélectionné, le fichier PDF n'est pas requis
            $data['file_path'] = null;
        } else {
            // Si un fichier PDF est sélectionné, le contenu n'est pas requis
            $data['content'] = null;

            // Gérer l'upload du fichier PDF
        if ($request->hasFile('filepdf')) {
            $data['file_path'] = $request->file('filepdf')->store('articles', 'public');
        }
        }

        $article->update($data);
        return redirect('/articles')->with(['success_message' => 'L\'article a été modifié !']);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();
        return redirect('/articles')->with(['success_message' => 'L\'article a été supprimée !']);

    }
}
