<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\FacadesPaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;




class PostController extends Controller
{

    //gestion de lauthentification
    public function __construct(){
        $this->middleware('auth')->only('comments');
    }
    /**
     * Show the form for creating the resource.
     */
    public function index(Request $request)
    {
       return $this->postView($request->search ?['search' => $request->search]:[]);
    }



    /**
     * Store the newly created resource in storage.
     */
    public function postByCategorie($id)
    {

        // return view('posts.index', [

        //     // 'posts'=>$category->Posts()->paginate(10),
        //     'posts'=>Post::where(
        //         'category_id', $id
        //     )->latest()->paginate(20),
        // ]);

        return $this->postView(['category'=>$id]);
    }


    public function postByTag($id)
    {

        // return view('posts.index', [

        //     // 'posts'=>$category->Posts()->paginate(10),
        //     'posts'=>Post::whereRelation(
        //         'tags', 'tags.id', $id
        //     )->latest()->paginate(20),
        // ]);
        return $this->postView(['tag'=>$id]);
    }

    /**
     * Display the resource.
     */
    public function show($id)
    {
        //affichage d'un contenu
        $posts = Post::find($id);
        return view('posts.show', ['post'=>$posts]);


    }

    //fonction pour la vu index
    protected function postView(array $filters){
        return view('posts.index',
            ['posts'=>Post::filters($filters)->latest()->paginate(5)]);

    }

    //gestion de ma fonction de commentaire
    public function comments($id, Request $request){
        $validated = $request->validate([
            //validation de notre comment
            'comment' =>['required', 'string', 'between:2,255'],
        ]);

        Comment::create([
            'content' => $validated['comment'],
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return back()->withStatus('Commentaire publié !');

    }


    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
