<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = ForumPost::orderBy('created_at','desc')->get(); //récupérer tous les articles de blog de DB
        $users = User::all();
        foreach($posts as $post){
            $user_id = $post->user_id;
            $post->user_name = $users->find($user_id)->name;
        }
           
        return view('forum.index', [
            'posts' => $posts,
            'users' => $users
        ]); //renvoie les messages récupérés
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
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
            'titre' => 'required',
            'body' => 'required',  
        ]);
        $forum_post = new ForumPost;
        $forum_post->titre = $request->input("titre");
        $forum_post->body = $request->input("body");
        $forum_post->user_id = Auth::id();
        $forum_post->save();
        return redirect()->route('forum.index')->withSuccess(__("lang.success_post_add"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function show(ForumPost $forumPost)
    {
        $user = User::find($forumPost->user_id);
        return view('forum.show',[
            'forumPost' => $forumPost,
            'user' => $user
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumPost $forumPost)
    {
        return view('forum.edit',[
            'forumPost' => $forumPost
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumPost $forumPost)
    {
        $request->validate([
            'titre' => 'required', 
            'body' => 'required',
        ]);
        $forumPost->titre = $request->input("titre");
        $forumPost->body = $request->input("body");
        $forumPost->update();
        return redirect()->route('forum.index')->withSuccess(__("lang.success_post_update"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumPost $forumPost)
    {
        $forumPost->delete();
        return redirect()->route('forum.index')->withSuccess(__("lang.success_post_delete"));
    }
}
