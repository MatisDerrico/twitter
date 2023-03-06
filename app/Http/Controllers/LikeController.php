<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        //dd(auth()->user()->i);
        Like::firstOrCreate([
            'tweet_id'=>$tweet->id,
            'user_id'=>auth()->user()->id
        ]);

        return redirect(url()->previous());
    }

}
