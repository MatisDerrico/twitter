<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TweetController extends Controller
{
    /**
     * Affichage de la page mestweets contenant mes tweets
     */
    public function display(): View
    {
        $tweets = Tweet::where('user_id', Auth::id())->orderBy('created_at', 'ASC')->paginate(4);
        return view('home.tweet', compact('tweets'));
    }

    /**
     * Création d'un tweet
     */
    public function create(Request $request): RedirectResponse
    {

        // Validation des champs

        $this->validate($request, [
            'title' => 'required',
            'message' =>'required',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:400'

        ]);

        // Créer l'objet (variable) $tweet en fonction du model Tweet

        $tweet= Tweet::create([
            'title' => $request->title,
            'message' => $request->message,
            'user_id' => Auth::user()->id
            ]);

        // stockage de l'image si elle existe

        if($request->hasFile('image')){
            $path = Storage::url($request->file('image')->store('tweet', 'public'));
            $tweet->image = $path;

        }

        // Va stocker le tweet dans la db

        $tweet->save();

        // Redirection vers la page mestweets

        return Redirect::route('tweet')->with('status', 'tweet');
    }

    // Rechercher des utilisateurs + tweet

    public function search(Request $request): View
    {
        $this->validate($request, [
            'search' => 'required',
        ]);



        $tweets = Tweet::where('title', 'like', '%' . $request->search . '%')->orwhere('message', 'like', '%' . $request->search . '%')->orderBy('created_at', 'ASC')->paginate(4);
        $user = User::where('name', 'like', '%' . $request->search . '%')->orderby('created_at', 'ASC')->paginate(4);
        return view('home.search-user', compact('tweets', 'user'));

    }

     /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        $user = $tweet->user;
        return view('tweet.tweet-show', compact('tweet', 'user'));
    }



}


